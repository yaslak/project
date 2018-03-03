@extends('layouts.layout')

@section('content-body')
    <!-- Advanced login -->
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="panel panel-body login-form">
                <div class="text-center">
                    <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                    <h5 class="content-group">{{trans('auth.register-title')}}
                        <small class="display-block">{{trans('auth.register-title2')}}</small>
                    </h5>
                </div>

                <div class="content-divider text-muted form-group"><span>{{trans('auth.identity')}}</span></div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="text"
                           name="name"
                           class="form-control {{ $errors->has('name') ? 'border-danger' :'' }}"
                           placeholder="{{trans('validation.attributes.username')}}"
                           value="{{old('name')}}" required>
                    <div class="form-control-feedback">
                        <i class="icon-user-check text-muted"></i>
                    </div>
                    @if($errors->has('name'))
                    <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{$errors->first('name')}}
                    </span>
                        @endif
                </div>

                <div class="content-divider text-muted form-group"><span>{{trans('auth.your-privacy')}}</span></div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="email"
                           name="email"
                           class="form-control {{ $errors->has('email') ? 'border-danger' :'' }}"
                           placeholder="{{trans('validation.attributes.email')}}"
                            value="{{old('email')}}"
                           required
                    >
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @if($errors->has('email'))
                        <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{$errors->first('email')}}
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password"
                           name="password"
                           class="form-control {{ $errors->has('password') ? 'border-danger' :'' }}"
                           placeholder="{{trans('validation.attributes.create-password')}}"
                           required>
                    <div class="form-control-feedback">
                        <i class="icon-user-lock text-muted"></i>
                    </div>
                    @if($errors->has('password'))
                        <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password')}}
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback has-feedback-left">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control {{ $errors->has('password_confirmation') ? 'border-danger' :'' }}"
                           placeholder="{{trans('validation.attributes.confirm-password')}}"
                           required>
                    <div class="form-control-feedback">
                        <i class="icon-mention text-muted"></i>
                    </div>
                    @if($errors->has('password_confirmation'))
                        <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{$errors->first('password_confirmation')}}
                    </span>
                    @endif
                </div>

                <div class="content-divider text-muted form-group"><span>{{trans('auth.additions')}}</span></div>

                <div class="form-group">

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="conditions" class="styled" required>
                            {{trans('auth.accept')}} <a href="#">{{trans('auth.login-conditions-url')}}</a>
                        </label>
                    </div>
                    @if($errors->has('conditions'))
                        <span class="help-block text-danger">
                        <i class="icon-cancel-circle2 position-left"></i> {{$errors->first('conditions')}}
                    </span>
                    @endif
                </div>

                <button type="submit" class="btn bg-teal btn-block btn-lg">{{trans('validation.attributes.register')}} <i
                            class="icon-circle-right2 position-right"></i></button>
            </div>
        </form>
    </div>
    <!-- /advanced login -->
@endsection

