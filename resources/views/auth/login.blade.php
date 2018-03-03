@extends('layouts.layout')

@section('content-body')
    <!--
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
    -->
    <!-- Advanced login -->
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <form  class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('auth.login-title')}}
                        <small class="display-block">{{trans('auth.login-title2')}}</small>
                    </h5>
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text"
                           name="name"
                           class="form-control @if($errors->has('name')) border-danger @endif"
                           placeholder="{{trans('validation.attributes.username')}}"
                           value="{{old('name')}}"
                    >
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                </div>
                @if ($errors->has('name'))
                    <span class="form-text text-danger">
            <em>{{ $errors->first('name') }}</em>
                                </span>
                @endif
                <div class="form-group has-feedback has-feedback-left">
                    <input type="password" name="password" class="form-control @if($errors->has('password')) border-danger @endif"
                           placeholder="{{trans('validation.attributes.password')}}" required>
                    <div class="form-control-feedback">
                        <i class="icon-lock2 text-muted"></i>
                    </div>
                </div>
                @if ($errors->has('password'))
                    <span class="form-text text-danger">
            <em>{{ $errors->first('password') }}</em>
                                </span>
                @endif
                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled">
                                {{trans('validation.attributes.remember')}}
                            </label>
                        </div>

                        <div class="col-sm-6 text-right">
                            <a href="{{route('reset.target.store')}}">{{trans('validation.attributes.Forgot')}}</a>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn bg-blue btn-block">{{trans('validation.attributes.login')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>

                <div class="content-divider text-muted form-group"><span>{{trans('auth.havent')}}</span></div>
                <a href="{{route('register')}}"
                   class="btn btn-default btn-block content-group">{{trans('validation.attributes.register')}}</a>
                <span class="help-block text-center no-margin">
                    {{trans('auth.login-conditions')}}
                    <a href="{{route('conditions')}}">{{trans('auth.login-conditions-url')}}</a>
                    {{ trans('auth.and') }}
                    <a href="#">{{trans('auth.login-cookie-policy')}}</a>
                </span>
            </div>
        </form>
    </div>
    <!-- /advanced login -->
@endsection
