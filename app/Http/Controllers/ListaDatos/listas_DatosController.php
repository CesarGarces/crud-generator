<?php

namespace App\Http\Controllers\ListaDatos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\listas_Dato;
use Illuminate\Http\Request;
use Session;

class listas_DatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $listas_datos = listas_Dato::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('marcable', 'LIKE', "%$keyword%")
				->orWhere('referenciable', 'LIKE', "%$keyword%")
				->orWhere('fecha_crea', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $listas_datos = listas_Dato::paginate($perPage);
        }

        return view('admin.listas_-datos.index', compact('listas_datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.listas_-datos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        listas_Dato::create($requestData);

        Session::flash('flash_message', 'listas_Dato added!');

        return redirect('listadatos/listas_-datos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $listas_dato = listas_Dato::findOrFail($id);

        return view('admin.listas_-datos.show', compact('listas_dato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $listas_dato = listas_Dato::findOrFail($id);

        return view('admin.listas_-datos.edit', compact('listas_dato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $listas_dato = listas_Dato::findOrFail($id);
        $listas_dato->update($requestData);

        Session::flash('flash_message', 'listas_Dato updated!');

        return redirect('listadatos/listas_-datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        listas_Dato::destroy($id);

        Session::flash('flash_message', 'listas_Dato deleted!');

        return redirect('listadatos/listas_-datos');
    }
}
