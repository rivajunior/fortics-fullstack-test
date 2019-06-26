@extends('backend.layouts.app')

@section('title', 'Cadastrar Refrigerantes | '.app_name())

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <form action="{{ route('admin.drinks.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="card">
                <h2 class="card-header text-center">Cadastrar Refrigerante</h2>
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand">Marca</label>
                        <input
                            id="brand"
                            name="brand"
                            type="text"
                            maxlength="30"
                            class="form-control"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="flavor">Sabor</label>
                        <input id="flavor" name="flavor" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo</label>
                        <select id="type" name="type" class="custom-select" required>
                            <option></option>

                            @foreach($drink_types as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mililiters">Litragem <small>(em mililitros)</small></label>
                        <div class="input-group">
                            <input
                                id="mililiters"
                                name="mililiters"
                                type="number"
                                step="100"
                                class="form-control"
                                aria-describedby="ml-addon"
                                required
                            >
                            <div class="input-group-append">
                                <span class="input-group-text" id="ml-addon">ml</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Preço <small>(com duas casas decimais)</small></label>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input
                                id="price"
                                name="price"
                                type="text"
                                class="form-control"
                                pattern="(^[1-9][0-9]{0,2}(\.?[0-9]{3})*)?,[0-9]{2}$"
                                required
                            >
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
