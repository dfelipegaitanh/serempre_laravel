@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Clientes</div>

                    <div class="card-body">
                        @include('partials.messages')

                        <button type="button" class="btn btn-primary  mb-3" data-toggle="modal" data-target="#modalBusqueda">
                            Busqueda
                        </button>

                        <div class="pull-right mb-3">
                            <a class="btn btn-block btn-success" href="{{ route('clients.create') }}"> Crear Cliente</a>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Cod</th>
                                <th>Ciudad</th>
                                <th width="280px">Accion</th>
                            </tr>
                            @each('clients.index.registro_tabla', $clients, 'client')
                        </table>
                        {!! $clients->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalBusqueda" tabindex="-1" aria-labelledby="modalBusqueda" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Busqueda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <form action="{{ route('clients.busqueda') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <strong>Ciudad:</strong>
                                <select class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                                    <option value="">Seleccione una ciudad</option>
                                    @foreach(\App\Models\City::all() as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <strong>Filtro:</strong>
                                <input type="text" name="filtro" class="form-control" placeholder="Ingrese Nombre o Codigo">
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>


@endsection
