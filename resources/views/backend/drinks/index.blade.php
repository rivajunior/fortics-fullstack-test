@extends('backend.layouts.app')

@section('title', "Refrigerantes".' | '.app_name())

@section('content')
    <form class="py-3">
        <div class="input-group shadow-sm">
            <input
                class="form-control"
                type="search"
                placeholder="Pesquisar"
                aria-label="Pesquisar"
                name="search"
            >
            <div class="input-group-append">
                <button type="submit" aria-label="Pesquisar" class="input-group-text">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <div class="text-right mb-4">
        <form
            action="{{ route('admin.drinks.destroy_multiples') }}"
            method="POST"
            id="form-delete-multiple"
        >
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-link text-danger" id="btn-delete-many" disabled>
                Excluir Selecionados
            </button>
        </form>
    </div>

    <div class="row">
        @foreach($soft_drinks as $soda)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card card-hover card-checkbox">
                    <h5 class="card-header text-center text-uppercase">
                        <a href="{{ route('admin.drinks.show', $soda->id) }}">
                            {{ $soda->brand }}
                        </a>
                    </h5>
                    <input
                        form="form-delete-multiple"
                        type="checkbox"
                        class="sr-only"
                        name="id[]"
                        id="soda-{{ $soda->id }}"
                        aria-label="Selecionar {{ $soda->brand.' '.$soda->flavor }} para exclusão"
                        value="{{ $soda->id }}"
                    >
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="py-2">
                                <strong>Tipo:</strong> {{ $soda->type->name }}
                            </li>
                            <li class="py-2">
                                <strong>Sabor:</strong> {{ $soda->flavor }}
                            </li>
                            <li class="py-2">
                                <strong>Litragem:</strong> {{ $soda->mililiters }} ml
                            </li>
                        </ul>
                        <div class="text-center">
                            <div class="mb-1"><strong>Preço</strong></div>
                            <div class="lead">{{ $soda->price }}</div>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('admin.drinks.edit', $soda->id) }}">
                                Editar <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $soft_drinks->links() }}
    </div>
@endsection
