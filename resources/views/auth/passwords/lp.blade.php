@extends('layouts.layout')
@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">Last password :</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
            <p class="text-light">
                veuillez indiquez le mot de passe que vous souvenez si possible.
            </p>
            <div class="form-group">
                {{ Form::label('password','last password : ') }}
                <input type="password" name="password" id="password" class="form-control bg-secondary text-warning {{$errors->has('password') ? 'border-danger':'border-warning'}}" autofocus required>
            </div>
            @if ($errors->has('password'))
                <span class="form-text text-danger">
                    <em>{{ $errors->first('password') }}</em>
                </span>
            @endif
            <div class="form-group">
                {{ Form::submit('Examiné',['class'=>'btn btn-outline-warning float-right']) }}
            </div>
            {!! Form::open() !!}
        </div>
        <div class="card-footer">
            <em class="text-secondary">
                Cette étape est optionnel si vous ne souvenez veuillez indiquez six zéro.
            </em>
        </div>
    </div>
@stop