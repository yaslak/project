<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('pswr.target.title-page')}}</span>
    <span id="url-current">/password/target</span>
</div>
<div class="content">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-body login-form">
        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group">{{trans('pswr.target.login-title')}}
                <small class="display-block">{{trans('pswr.target.login-title2')}}</small>
            </h5>
        </div>
        {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-target', 'url'=>route('reset.target.store')]) !!}
        <div class="form-group has-feedback {{ $errors->has('target') ? 'has-feedback-right':'has-feedback-left' }}">
            <input type="text"
                   name="target"
                   class="form-control {{ $errors->has('target') ? 'border-danger':'' }}"
                   placeholder="{{trans('pswr.target.placeholder')}}"
                   value="{{old('target')}}" autofocus required>

            @if($errors->has('target'))
                <div class="form-control-feedback">
                    <i class="icon-cancel-circle2 text-danger-300"></i>
                </div>
                <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.target') }}</font>
                            </font>
                        </span>
            @else
                <div class="form-control-feedback">
                    <i class="icon-user text-muted"></i>
                </div>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.target.btn')}} <i
                        class="icon-arrow-right14 position-right"></i></button>
        </div>

        {!! Form::close() !!}
    </div>
    </div>
</div>