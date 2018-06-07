<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
    {!! Form::label('telefono', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
        {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('fini') ? 'has-error' : ''}}">
    {!! Form::label('fini', 'Fini', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fini', null, ['class' => 'form-control']) !!}
        {!! $errors->first('fini', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('ffin') ? 'has-error' : ''}}">
    {!! Form::label('ffin', 'Ffin', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('ffin', null, ['class' => 'form-control']) !!}
        {!! $errors->first('ffin', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('msg') ? 'has-error' : ''}}">
    {!! Form::label('msg', 'Msg', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('msg', null, ['class' => 'form-control']) !!}
        {!! $errors->first('msg', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
