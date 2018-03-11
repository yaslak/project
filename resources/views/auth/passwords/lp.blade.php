<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('pswr.lp.title-page')}}</span>
    <span id="url-current">{{ url()->current() }}</span>
</div>
<div class="content">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">{{trans('pswr.lp.login-title')}}
                    <small class="display-block">{{trans('pswr.lp.login-title2')}}</small>
                </h5>
            </div>
            {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-lp', 'url'=>"password/last_password/$token"]) !!}
            <div class="form-group has-feedback {{ $errors->has('password') ? 'has-feedback-right':'has-feedback-left' }}">
                <input type="password"
                       name="password"
                       class="form-control {{ $errors->has('password') ? 'border-danger':'' }}"
                       placeholder="{{trans('pswr.lp.placeholder')}}"
                        autofocus >

                @if($errors->has('password'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.lp') }}</font>
                            </font>
                        </span>
                @else
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.lp.btn')}} <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
