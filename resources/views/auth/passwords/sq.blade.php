@extends('layouts.blogLayout')
@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">Question Secrète :</h6>
        </div>
        <div class="card-body">
            <p class="form-text text-light">
                question : {{ $question->Question_secrete->question }} <br>
            </p>
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('response','Votre response :') }}
                    <input type="text" name="response" id="response" value="{{old('response')}}" class="form-control bg-secondary text-warning {{$errors->has('response') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
            @if ($errors->has('response'))
                <span class="form-text text-danger">
                    <em>{{ $errors->first('response') }}</em>
                </span>
            @endif
                <div class="form-group">
                    {{ Form::submit('Verifier',['class'=>'btn btn-outline-warning float-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <div class="form-text">
                <em class="text-secondary">
                    Veuillez répondre a votre question secrète.
                </em>
            </div>

        </div>
    </div>
@stop