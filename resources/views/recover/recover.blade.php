<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('recover.recover.title-page')}}</span>
    <span id="url-current">/recover/recover</span>
</div>
<div class="content">
    <div class="panel border-slate-300 panel-bordered">
        <div class="panel-heading bg-slate-300">
                <h6 class="panel-title">
                    {{ trans('recover.recover.title-panel') }}
                </h6>
            <div class="heading-elements">
                <i class="icon-lock text-slate-600 mt-3"></i>
            </div>
        </div>
        <div class="panel-body">
            <p style="vertical-align: inherit;">
                <b>{{$user->name}}</b>, {{trans('recover.recover.text')}}
            </p>
            <div class="stepy-navigator">
                {!! Form::open(['method'=>'put','class'=>'form-horizontal hidden','id'=>'recover-submit' ,'url' => route('recover.store')])!!}
                <input type="submit" value="Envoyer">
                {!! Form::close()!!}
                <a href="#" class="button-next btn bg-slate-300 float-right" onclick="event.preventDefault();
                     document.getElementById('recover-submit').submit();">
                    {{trans('recover.recover.btn')}} <i class="icon-arrow-right14 position-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>