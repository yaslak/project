@extends('layouts.blogLayout')
@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">Questions Secrètes :</h6>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'post','class'=>'form-horizontal']) !!}
            <div class="form-group">
                {{ Form::label('question','Choix la Question qui vous convient :') }}
                <select name="question" class="form-control bg-secondary text-primary {{$errors->has('response') ? 'border-danger':'border-warning'}}">
                    <option value=""></option>
                    @foreach($questions as $question)
                        <option value="{{$question->id}}">{{$question->question}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                @if($errors->has('question'))
                    <span class="text-danger">{{$errors->first('question')}}</span>
                @endif
            </div>
            <div class="form-group">
                {{ Form::label('response','Votre Réponse :') }}
                <input type="text" id="response" name="response" value="{{old('response')}}" class="form-control bg-secondary text-warning {{$errors->has('response') ? 'border-danger':'border-warning'}}" autofocus required>
            </div>
            <div class="form-group">
                @if($errors->has('response'))
                    <span class="text-danger">{{$errors->first('response')}}</span>
                @endif
            </div>
            <div class="form-group">
                @if($errors)
                    @foreach($errors as $er)
                    <span class="text-danger">{{$er}}</span>
                    @endforeach
                @endif
            </div>
            <div class="form-group">
                {{ Form::submit('envoyer',['class'=>'btn btn-outline-warning float-right']) }}
            </div>
            {!! Form::close() !!}

        </div>
        <div class="card-footer">
            <em class="text-secondary">
                veuillez indiquez la réponse qui vous conviez, il sera obligatoire en cas de pert de votre mot de passe.
            </em>
        </div>
    </div>
@stop