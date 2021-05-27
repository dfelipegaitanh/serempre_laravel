<?php


namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Builder;


trait busquedaTrait
{

    function agregarFiltros(Builder &$model){
        if (session()->has('city_id') && trim(session()->get('city_id')) !== "") {
            $model->where('city_id', session()->get('city_id'));
        }

        if (session()->has('filtro') && trim(session()->get('filtro')) !== "") {
            $model
                ->orWhere('name', 'like', '%'.trim(session()->get('filtro')).'%')
                ->orWhere('cod', 'like', '%'.trim(session()->get('filtro')).'%');
        }
    }

}