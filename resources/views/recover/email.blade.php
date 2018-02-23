@extends('layouts.blogLayout')
@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h5 class="text-warning">Code de sécurité :</h5>
        </div>
        <div class="card-body">
            <p class="text-secondary">
                un mail a été envoyer sur votre boite mail veuillez indiquez le code de sécurité
            </p>
            {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','url'=>route('recoverMail.store')]) !!}
            <div class="form-group">
                {{ Form::label('token','Code de sécurité') }}
                <input type="text" name="token" id="token" value="{{old('token')}}" class="form-control bg-secondary text-warning {{$errors->has('token') ? 'border-danger':'border-warning'}}" autofocus required>
                @if($errors->has('token'))
                    <p class="text-danger form-text">
                        {{$errors->first('token')}}
                    </p>
                @endif
            </div>
            <div class="form-group">
                {{ Form::submit('valider',['class'=>'btn btn-outline-warning float-right']) }}
            </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <div class="form-text">
                <em class="text-secondary">
                    Si vous n'avez trouvez aucun mail veuillez verifier votre boite de spam,
                    Si le problème persiste veuillez actualisé la page pour renvoyer le mail a nouveau.
                </em>
            </div>
        </div>
    </div>
@stop