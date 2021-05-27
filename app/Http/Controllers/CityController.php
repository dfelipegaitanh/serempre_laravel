<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Traits\busquedaTrait;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{

    use busquedaTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $cities = City::orderBy('id');
        $this->agregarFiltros($cities);
        $cities = $cities->paginate(config('serempre.pagination'));

        return view('cities.index', compact('cities'))
            ->with('i', (request()->input('page', 1) - 1) * config('serempre.pagination'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        $city = City::create($request->all());
        return redirect()
            ->route('cities.index')
            ->withSuccess('La ciudad \''.$city->name.'\' se creo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(City $city)
    {
        return view('cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(City $city)
    {
        return view('cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CityRequest  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()
            ->route('cities.index')
            ->withSuccess('La ciudad \''.$city->name.'\' se ha sido actualizada');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $name = $city->name;
        try {
            $city->forceDelete();
        } catch (\Throwable $e) {
            return redirect()
                ->route('cities.index')
                ->withDanger('La ciudad \''.$name.'\' ha se ha podido borrar');
        };
        return redirect()
            ->route('cities.index')
            ->withSuccess('La ciudad \''.$name.'\' ha sido borrada');

    }

    public function busqueda(Request $request)
    {
        session()->flash('filtro', $request->get('filtro'));
        return redirect()->route('cities.index');
    }

    public function clear()
    {
        session()->forget(['city_id', 'filtro']);
        return redirect()->route('cities.index');
    }
}
