@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">listas_Dato {{ $listas_dato->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/listadatos/listas_-datos') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/listadatos/listas_-datos/' . $listas_dato->id . '/edit') }}" title="Edit listas_Dato"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['listadatos/listas_datos', $listas_dato->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete listas_Dato',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $listas_dato->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $listas_dato->nombre }} </td></tr><tr><th> Marcable </th><td> {{ $listas_dato->marcable }} </td></tr><tr><th> Referenciable </th><td> {{ $listas_dato->referenciable }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
