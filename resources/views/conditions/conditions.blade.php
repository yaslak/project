@extends('layouts.blogLayout')

@section('content')
    <div class="card border-warning">
        <div class="card-header border-warning">
            <h5 class="text-warning">
                Conditions
            </h5>
        </div>
        <div class="card-body">
            <p class="text-light">
                vous être le bien venu dans cette app les conditions seront
                bien tôt écrit par mon propriétaire,
                énormément de remerciement pour votre patience.
            </p>
            <a href="{{url('/')}}">
                <button class="btn btn-outline-warning float-right">
                    retour
                </button>
            </a>

        </div>
    </div>
@stop