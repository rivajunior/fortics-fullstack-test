<?php

namespace App\Http\Controllers\Backend;

use App\Models\Drink;
use App\Models\DrinkType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $drinks = Drink::with('type');

        if ($request->has('search')) {
            $drinks = Drink::search($request->search);
        }

        return view('backend.drinks.index', ['soft_drinks' => $drinks->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.drinks.create', ['drink_types' => DrinkType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $drink = Drink::create($request->all());

        $drink->save();

        return view(route('admin.drinks.show', $drink->id), [
            'soft_drink' => $drink,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.drinks.show', ['soda' => Drink::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('backend.drinks.edit', [
            'drink_types' => DrinkType::with('type')->all(),
            'soda' => Drink::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Drink::destroy($id);

        return redirect(route('admin.drinks.index'))
            ->withFlashSuccess('Refrigerantes apagados com sucesso!');
    }

    /**
     * Remove multiple specified resources from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroyMultiples(Request $request)
    {
        Drink::destroy($request->id);

        return redirect(route('admin.drinks.index'))
            ->withFlashSuccess('Refrigerantes apagados com sucesso!');
    }
}
