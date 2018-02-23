@extends('layouts.blogLayout')

@section('content')
    <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6">
        <div class="card border-warning">
            <div class="card-header border-warning">
                <h5 class="text-right align-middle text-warning pol">S'identifier</h5>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-control bg-transparent form-row">
                        <label for="auth"
                               class="col-12 col-form-label text-warning"
                        >
                            Nom d'utilisateur ou email :
                        </label>

                        <div class="col-12">
                            <input id="auth"
                                   type="text"
                                   class="form-control bg-secondary text-light {{ $errors->has('name') ? 'border-danger' : 'border-warning' }}"
                                   name="name"
                                   value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="form-text text-danger">
                                    <em>{{ $errors->first('name') }}</em>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-control bg-transparent form-row">
                        <label for="password"
                               class="col-12 col-form-label text-warning"
                        >
                            Mot de passe :
                        </label>

                        <div class="col-12">
                            <input id="password" type="password"
                                   class="form-control bg-secondary text-light {{ $errors->has('password') ? 'border-danger': 'border-warning' }}"
                                   name="password" required>

                            @if ($errors->has('password'))
                                <span class="form-text text-danger">
                                    <em>{{ $errors->first('password') }}</em>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-control bg-transparent form-row">
                        <div class="col-12">
                            <div class="form-check">
                                <label class="text-warning">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <em class="my-2">Persister ma connexion</em>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-control bg-transparent form-row">
                        <a class="btn btn-link text-justify text-info" href="{{ route('reset.target.show') }}">
                            Mot de passe oublier?
                        </a>
                    </div>

                    <div class="form-control bg-transparent">
                        <button type="submit"
                                class="btn btn-outline-warning col-md-6 offset-md-6 col-sm-8 offset-sm-4">
                            Se connecté
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
