@extends('layouts.layout')

@section('content-body')
    <!-- Advanced login -->
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4 mt-10">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                    <h5 class="content-group">{{trans('auth.login-title')}}
                        <small class="display-block">{{trans('auth.login-title2')}}</small>
                    </h5>
                </div>

                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-feedback-right':'has-feedback-left' }}">
                    <input type="text"
                           name="name"
                           class="form-control {{ $errors->has('name') ? 'border-danger':'' }}"
                           placeholder="{{trans('validation.attributes.username')}}"
                           value="{{old('name')}}"
                    >

                    @if($errors->has('name'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ $errors->first('name') }}</font>
                            </font>
                        </span>
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="form-group has-feedback @if($errors->has('password') OR $errors->has('name')) has-feedback-right @else has-feedback-left @endif">
                    <input type="password" name="password"
                           class="form-control @if($errors->has('password') OR $errors->has('name')) border-danger @endif"
                           placeholder="{{trans('validation.attributes.password')}}" required>

                    @if($errors->has('password') OR $errors->has('name'))
                        <div class="form-control-feedback">
                            <i class="icon-cancel-circle2 text-danger-300"></i>
                        </div>
                        @if($errors->has('password'))
                            <span class="label label-block mt-5 label-danger">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">{{ $errors->first('password') }}</font>
                                </font>
                            </span>
                        @endif
                    @else
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    @endif
                </div>
                <div class="form-group login-options">
                    <div class="row">
                        <div class="col-sm-6">
                            <label class="checkbox-inline">
                                <input type="checkbox" class="styled">
                                {{trans('validation.attributes.remember')}}
                            </label>
                        </div>

                        <div class="col-sm-6 text-right">
                            <a href="{{route('reset.target.store')}}" data-title="target" data-navigation="true">{{trans('validation.attributes.Forgot')}}</a>
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
