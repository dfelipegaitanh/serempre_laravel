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
                            @foreach ($cities as $key => $city)
                                <tr>
                                    <td>{{ $city->id }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->cod }}</td>
                                    <td>
                                        <form action="{{ route('cities.destroy',$city->id) }}" method="POST">
                                            <a class="btn btn-success" href="{{ route('cities.show',$city->id) }}">Mostrar</a>
                                            <a class="btn btn-primary" href="{{ route('cities.edit',$city->id) }}">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $cities->links() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
