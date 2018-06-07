<?php

namespace App\Http\Controllers\listas;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\lista;
use Illuminate\Http\Request;
use Session;

class listasController extends Controller
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
            $listas = lista::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('marcable', 'LIKE', "%$keyword%")
				->orWhere('referenciable', 'LIKE', "%$keyword%")
				->orWhere('fecha_crea', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $listas = lista::paginate($perPage);
        }

        return view('admin.listas.index', compact('listas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.listas.create');
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
        
        lista::create($requestData);

        Session::flash('flash_message', 'lista added!');

        return redirect('listas/listas');
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
        $lista = lista::findOrFail($id);

        return view('admin.listas.show', compact('lista'));
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
        $lista = lista::findOrFail($id);

        return view('admin.listas.edit', compact('lista'));
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
        
        $lista = lista::findOrFail($id);
        $lista->update($requestData);

        Session::flash('flash_message', 'lista updated!');

        return redirect('listas/listas');
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
        lista::destroy($id);

        Session::flash('flash_message', 'lista deleted!');

        return redirect('listas/listas');
    }
}
