@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Listado de Ciudades') }}</div>

                    <div class="card-body">
                        @include('partials.messages')

                        <div class="pull-right mb-3">
                            <a class="btn btn-block btn-success" href="{{ route('cities.create') }}"> Crear Ciudad</a>
                        </div>

                        <table class="table table-bordered">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Cod</th>
                                <th width="280px">Accion</th>
                            </tr>
                            @each('cities.index.registro_tabla', $cities, 'city')
                        </table>
                        {!! $cities->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
