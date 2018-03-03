@extends('layouts.layout')
@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">nouveau mot de passe : </h6>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('password','votre nouveau mot de passe :') }}
                    <input type="password" name="password" id="password" class="form-control bg-secondary text-warning {{$errors->has('password') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
                <div class="form-group">
                    {{ Form::label('password-confirm','Retapez votre mot de passe :') }}
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-secondary text-warning {{$errors->has('password_confirmation') ? 'border-danger':'border-warning'}}" required>
                </div>
            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
                <div class="form-group">
                    {{ Form::submit('Modifier',['class'=>'btn btn-outline-warning float-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <em class="text-secondary">
                pour votre sécurité veuillez indiquez un mot de passe complexe qui dépasse obligatoirement six caractères.
            </em>
        </div>
    </div>
@stop