@extends('backend.layouts.app')

@section('title', $soda->brand.' '.$soda->flavor.' | '.app_name())

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-hover">
                <h5 class="card-header text-center text-uppercase">
                    {{ $soda->brand }}
                </h5>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="py-2">
                            <strong>Tipo:</strong> {{ $soda->type }}
                        </li>
                        <li class="py-2">
                            <strong>Sabor:</strong> {{ $soda->flavor }}
                        </li>
                        <li class="py-2">
                            <strong>Litragem:</strong> {{ $soda->mililiters }} ml
                        </li>
                    </ul>
                    <div class="text-center mb-3">
                        <div class="mb-1"><strong>Preço</strong></div>
                        <div class="lead">{{  $soda->price }}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <a
                                href="{{ route('admin.drinks.edit', $soda->id) }}"
                                class="btn btn-info btn-block"
                            >
                                Editar <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a
                                href="{{ route('admin.drinks.destroy', $soda->id) }}"
                                class="btn btn-light btn-block"
                                data-method="delete"
                                name="delete_item"
                            >
                                Excluir
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
