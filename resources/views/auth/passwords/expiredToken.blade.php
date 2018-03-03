@extends('layouts.layout')
@section('content')
    <div class="card border-warning">
        <div class="card-header border-warning">
            <h6 class="text-warning">échouez :</h6>
        </div>
        <div class="card-body">
            <p class="text-secondary">
                la procédure de récupération du mot de passe est échouez veuillez ressayer a <a href="{{ route('reset.target.show') }}" title="Mot de passe oublier">nouveau</a>
            </p>
        </div>
        <div class="card-footer">
            <em class="text-secondary">
                la procédure de récupération du mot de passe est limiter en trois minutes.
            </em>
        </div>
    </div>
@stop