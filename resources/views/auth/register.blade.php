@extends('layouts.blogLayout')

@section('content')
    <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6">
        <div class="card border-warning">
            <div class="card-header border-warning">
                <h5 class="text-right align-middle text-warning pol">S'enregistrer</h5>
            </div>

            <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}

                    <div class="form-control bg-transparent form-row">
                        <label for="name"
                               class="col-12 col-form-label text-warning"
                        >
                            Nom d'utilisateur :
                        </label>

                        <div class="col-12">
                            <input id="name"
                                   type="text"
                                   class="form-control bg-secondary text-light {{ $errors->has('name') ? 'border-danger' : 'border-warning' }}"
                                   name="name"
                                   value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="form-text text-danger">
                                    {!! $errors->first('name') !!}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-control bg-transparent form-row">
                        <label for="email"
                               class="col-12 col-form-label text-warning"
                        >
                            Adresse email :
                        </label>

                        <div class="col-12">
                            <input id="email"
                                   type="email"
                                   class="form-control bg-secondary text-light {{ $errors->has('email') ? 'border-danger' : 'border-warning' }}"
                                   name="email"
                                   value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="form-text text-danger">
                                    <em>{{ $errors->first('email') }}</em>
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
                        <label for="password-confirm"
                               class="col-12 col-form-label text-warning"
                        >
                            Confirmer votre mots de passe :
                        </label>

                        <div class="col-12">
                            <input id="password-confirm" type="password"
                                   class="form-control bg-secondary text-light {{ $errors->has('password') ? 'border-danger': 'border-warning' }}"
                                   name="password_confirmation" required>

                        </div>
                    </div>

                    <div class="form-control bg-transparent form-row">
                        <div class="col-12">
                            <div class="form-check">
                                <label class="text-warning">
                                    <input type="checkbox" name="conditions">
                                    <em class="my-2">
                                        <a href="{{ route('conditions') }}">
                                            accepter les conditions
                                        </a>
                                    </em>
                                </label>
                                @if ($errors->has('conditions'))
                                    <span class="form-text text-danger">
                                    <em>{{ $errors->first('conditions') }}</em>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-control bg-transparent">
                        <button type="submit"
                                class="btn btn-outline-warning col-md-6 offset-md-6 col-sm-8 offset-sm-4">
                            S'enregistrer
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

