<div id="user-agent">
    <span id="title-page">{{trans('recover.mail.title-page')}}</span>
    <span id="url-current">/recover/mail</span>
</div>

<div class="content">
    <div class="panel border-slate-300 panel-bordered">
        <div class="panel-heading bg-slate-300">
            <h6 class="panel-title">
                {{trans('recover.mail.title-panel')}}
            </h6>
            <div class="heading-elements">
                <i class="icon-lock text-slate-600 mt-3"></i>
            </div>
        </div>

        <div class="panel-body">
            <p style="vertical-align: inherit;">
                @if(isset($user)) <b>{{$user->name}}</b> @endif, {{trans('recover.mail.text')}}
            </p>
            <div>
                {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','id'=>'recover-mail', 'url'=>route('recoverMail.store')]) !!}
                {{ Form::label('token',trans('recover.mail.label')) }}
                <div class="input-group">
                    <span class="input-group-addon bg-slate-700"><i class="icon-lock2"></i></span>
                    <input type="text" name="token" id="token" value="{{old('token')}}"
                           class="form-control bg-slate-300 {{$errors->has('token') ? 'border-danger':''}}"
                           placeholder="{{trans('recover.mail.placeholder')}}" autofocus required>
                    <span class="input-group-addon bg-slate-700"><i class="icon-help"></i></span>
                </div>
                @if($errors->has('token')) {{ $errors->first('token') }} @endif
                <div class="stepy-navigator mt-5">
                    <button type="submit" class="position-right button-next btn btn-primary">{{trans('recover.mail.btn')}} <i
                                class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>
</div>