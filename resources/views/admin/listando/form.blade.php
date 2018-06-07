<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('marcable') ? 'has-error' : ''}}">
    {!! Form::label('marcable', 'Marcable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('marcable', null, ['class' => 'form-control']) !!}
        {!! $errors->first('marcable', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('referenciable') ? 'has-error' : ''}}">
    {!! Form::label('referenciable', 'Referenciable', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('referenciable', null, ['class' => 'form-control']) !!}
        {!! $errors->first('referenciable', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fecha_crea') ? 'has-error' : ''}}">
    {!! Form::label('fecha_crea', 'Fecha Crea', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha_crea', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fecha_crea', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
