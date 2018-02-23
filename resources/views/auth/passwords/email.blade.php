@extends('layouts.blogLayout')

@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">Récupération par adresse e-mail :</h6>
        </div>
        <div class="card-body">
            <p class="text-light">
                Votre code de sécurité à été envoyer a votre adresse mail veuillez verifier votre boite mail.
            </p>
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('code','Votre code de sécurité :',['class'=>'text-secondary']) }}
                    <input type="text" name="code" id="code" value="{{old('code')}}" class="form-control bg-secondary text-warning {{$errors->has('code') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
            @if($errors->has('code'))
                <em class="text-danger form-text">{{$errors->first('code')}}</em>
            @endif
                <div class="form-group">
                    {{ Form::submit('Soumettre',['class'=>'btn btn-outline-warning float-right']) }}
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
@endsection
