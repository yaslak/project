<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('pswr.Npsw.title-page')}}</span>
    <span id="url-current">/password/newPassword/{{$token}}</span>
</div>
<div class="content">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">{{trans('pswr.Npsw.login-title')}}
                    <small class="display-block">{{trans('pswr.Npsw.login-title2')}}</small>
                </h5>
            </div>
            {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-Npsw', 'url'=>"password/newPassword/$token"]) !!}
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-feedback-right':'has-feedback-left' }}">

                <input type="password"
                       name="password"
                       class="form-control {{ $errors->has('password') ? 'border-danger':'' }}"
                       placeholder="{{trans('pswr.Npsw.placeholder')}}"
                       autofocus required>

                @if($errors->has('password'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.Npsw') }}</font>
                            </font>
                        </span>
                @else
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-feedback-right':'has-feedback-left' }}">

                <input type="password"
                       name="password_confirmation"
                       class="form-control {{ $errors->has('password') ? 'border-danger':'' }}"
                       placeholder="{{trans('pswr.Npsw.placeholder-confirmation')}}"
                       autofocus required>

                @if($errors->has('password'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.Npsw') }}</font>
                            </font>
                        </span>
                @else
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.Npsw.btn')}} <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>


@section('content')
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">nouveau mot de passe : </h6>
        </div>
        <div class="card-body">
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('password','votre nouveau mot de passe :') }}
                    <input type="password" name="password" id="password" class="form-control bg-secondary text-warning {{$errors->has('password') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
                <div class="form-group">
                    {{ Form::label('password-confirm','Retapez votre mot de passe :') }}
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-secondary text-warning {{$errors->has('password_confirmation') ? 'border-danger':'border-warning'}}" required>
                </div>
            @if($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
                <div class="form-group">
                    {{ Form::submit('Modifier',['class'=>'btn btn-outline-warning float-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <em class="text-secondary">
                pour votre sécurité veuillez indiquez un mot de passe complexe qui dépasse obligatoirement six caractères.
            </em>
        </div>
    </div>
@stop