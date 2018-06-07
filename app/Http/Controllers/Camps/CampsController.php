<?php

namespace App\Http\Controllers\Camps;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Camp;
use Illuminate\Http\Request;
use Session;

class CampsController extends Controller
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
            $camps = Camp::where('nombre', 'LIKE', "%$keyword%")
				->orWhere('telefono', 'LIKE', "%$keyword%")
				->orWhere('fini', 'LIKE', "%$keyword%")
				->orWhere('ffin', 'LIKE', "%$keyword%")
				->orWhere('msg', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $camps = Camp::paginate($perPage);
        }

        return view('admin.camps.index', compact('camps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.camps.create');
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
        
        Camp::create($requestData);

        Session::flash('flash_message', 'Camp added!');

        return redirect('camps/camps');
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
        $camp = Camp::findOrFail($id);

        return view('admin.camps.show', compact('camp'));
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
        $camp = Camp::findOrFail($id);

        return view('admin.camps.edit', compact('camp'));
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
        
        $camp = Camp::findOrFail($id);
        $camp->update($requestData);

        Session::flash('flash_message', 'Camp updated!');

        return redirect('camps/camps');
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
        Camp::destroy($id);

        Session::flash('flash_message', 'Camp deleted!');

        return redirect('camps/camps');
    }
}
