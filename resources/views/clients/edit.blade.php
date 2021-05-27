@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Editar: {{ $client->name }}</div>

                    <div class="card-body">
                        @include('partials.messages')

                        <form action="{{ route('clients.update',$client->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="name" value="{{ old('name') ?: $client->name }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre">

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Codigo:</strong>
                                        <input type="text" name="cod" value="{{ old('cod') ?: $client->cod }}" class="form-control @error('cod') is-invalid @enderror" placeholder="Codigo" maxlength="10">

                                        @error('cod')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Ciudad:</strong>
                                        <select class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                                            <option value="" >Seleccione una ciudad</option>
                                            @foreach(\App\Models\City::all() as $city)
                                                <option value="{{ $city->id }}" @if((int)old('city_id') ?: $client->city_id === (int)$city->id) selected @endif>{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('city_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                                    <button type="submit" class="btn btn-block btn-primary">Salvar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
