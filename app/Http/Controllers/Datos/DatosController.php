<?php

namespace App\Http\Controllers\Datos;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dato;
use Illuminate\Http\Request;
use Session;

class DatosController extends Controller
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
            $datos = Dato::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('telefono', 'LIKE', "%$keyword%")
				->orWhere('mail', 'LIKE', "%$keyword%")
				->orWhere('celular', 'LIKE', "%$keyword%")
                ->orWhere('lista_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $datos = Dato::paginate($perPage);
        }

        return view('admin.datos.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.datos.create');
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
        
        Dato::create($requestData);

        Session::flash('flash_message', 'Dato added!');

        return redirect('datos/datos');
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
        $dato = Dato::findOrFail($id);

        return view('admin.datos.show', compact('dato'));
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
        $dato = Dato::findOrFail($id);

        return view('admin.datos.edit', compact('dato'));
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
        
        $dato = Dato::findOrFail($id);
        $dato->update($requestData);

        Session::flash('flash_message', 'Dato updated!');

        return redirect('datos/datos');
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
        Dato::destroy($id);

        Session::flash('flash_message', 'Dato deleted!');

        return redirect('datos/datos');
    }
}
