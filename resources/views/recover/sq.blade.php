<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('recover.recover.title-page')}}</span>
    <span id="url-current">/recover/sq</span>
</div>

<div class="content">
    <div class="panel border-slate-300 panel-bordered">
        <div class="panel-heading bg-slate-300">
            <h6 class="panel-title">
                {{trans('recover.sq.title-panel')}}
            </h6>
            <div class="heading-elements">
                <i class="icon-lock text-slate-600 mt-3"></i>
            </div>
        </div>

        <div class="panel-body">
            <p style="vertical-align: inherit;">
                @if(isset($user)) <b>{{$user->name}}</b> @endif, {{trans('recover.sq.text')}}
            </p>
            {!! Form::open(['method'=>'POST', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-sq', 'url'=>route('recoverSq.store')]) !!}
            <div class="form-group">
                {{ Form::label('question',trans('recover.sq.label'),['class'=>'control-label text-semibold']) }}
            </div>
            <div class="form-group">
                <select name="question" id="question-select" class="form-control {{$errors->has('question') ? 'border-danger':''}}" >
                    <option value="">{{trans('recover.sq.auto-choix')}}</option>
                    @foreach($questions as $question)
                        <option value="{{$question->id}}" {!!  old('question') == $question->id ? 'selected' : '' !!} >{{$question->question}}</option>
                    @endforeach
                </select>
                @if($errors->has('question'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{$errors->first('question')}}</font>
                            </font>
                        </span>
                @endif
            </div>
            <div class="form-group">
                <input type="text" name="response"
                       id="response" class="form-control {{ $errors->has('response') ? 'border-danger':'' }}"
                       value="{!! old('response')!!}"
                       placeholder="{{trans('recover.sq.placeholder')}}"
                       >
                @if($errors->has('response'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{$errors->first('response')}}</font>
                            </font>
                        </span>
                @endif
            </div>
            <div class="stepy-navigator mt-5">
                <button type="submit" class="position-right button-next btn bg-slate-300">
                    {{trans('recover.sq.btn')}} <i class="icon-arrow-right14 position-right"></i>
                </button>
            </div>
            {!! Form::close()!!}
        </div>

        <div class="panel-footer panel-footer-bordered">
            <em class="text-slate-800">{{ trans('recover.sq.footer') }}</em>
        </div>
    </div>
</div>
