@extends('layouts.layout')

@section('content-body')
    <!-- Advanced login -->
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
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
                    <input type="password" name="password"
                           class="form-control @if($errors->has('password')) border-danger @endif"
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
