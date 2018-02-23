@extends('layouts.blogLayout')

@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h5 class="text-warning">Procédure de récupération du mots de passe : </h5>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'put','class'=>'form-horizontal','url'=>route('reset.target.store')]) !!}
                <div class="form-group">
                    {{ Form::label('target',"veuillez indiquez votre nom d'utilisateur ou votre adresse email:",
                    ['class'=>'text-secondary']) }}
                    <input type="text" name="target" id="target" value="{{old('target')}}" class="form-control bg-secondary text-warning {{$errors->has('target') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
            @if ($errors->has('target'))
                <span class="form-text text-danger">
                    <em>{{ $errors->first('target') }}</em>
                </span>
            @endif
                <div class="form-group">
                    {{ Form::submit('Cibler',['class'=>'btn btn-outline-warning float-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop