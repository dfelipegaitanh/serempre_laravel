@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Listado de Clientes</div>

                    <div class="card-body">
                        @include('partials.messages')

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
@endsection
