<div id="user-agent">
    <span id="title-page" class="hidden">{{trans('pswr.mail.title-page')}}</span>
    <span id="url-current">/password/mail/{{$token}}</span>
</div>
<div class="content">
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-lg-4 col-lg-offset-4">
        <div class="panel panel-body login-form">
            <div class="text-center">
                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                <h5 class="content-group">{{trans('pswr.mail.login-title')}}
                    <small class="display-block">{{trans('pswr.mail.login-title2')}}</small>
                </h5>
            </div>
            {!! Form::open(['method'=>'put', 'class'=> 'form-horizontal','data-ajax'=>'true','data-response'=>'#data','id'=>'recover-mail', 'url'=>"password/mail/$token"]) !!}
            <div class="form-group has-feedback {{ $errors->has('code') ? 'has-feedback-right':'has-feedback-left' }}">

                <input type="text"
                       name="code"
                       class="form-control {{ $errors->has('code') ? 'border-danger':'' }}"
                       placeholder="{{trans('pswr.mail.placeholder')}}"
                       value="{{old('code')}}" autofocus required>

                @if($errors->has('code'))
                    <div class="form-control-feedback">
                        <i class="icon-cancel-circle2 text-danger-300"></i>
                    </div>
                    <span class="label label-block mt-5 label-danger">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">{{ trans('pswr.validation.mail') }}</font>
                            </font>
                        </span>
                @else
                    <div class="form-control-feedback">
                        <i class="icon-user text-muted"></i>
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn bg-blue btn-block">{{trans('pswr.mail.btn')}} <i
                            class="icon-arrow-right14 position-right"></i></button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>
<!--
    <div class="card border-warning col-md-8 offset-md-2">
        <div class="card-header border-warning">
            <h6 class="text-warning">Récupération par adresse e-mail :</h6>
        </div>
        <div class="card-body">
            <p class="text-light">
                Votre code de sécurité à été envoyer a votre adresse mail veuillez verifier votre boite mail.
            </p>
            {!! Form::open(['method'=>'put','class'=>'form-horizontal']) !!}
                <div class="form-group">
                    {{ Form::label('code','Votre code de sécurité :',['class'=>'text-secondary']) }}
                    <input type="text" name="code" id="code" value="{{old('code')}}" class="form-control bg-secondary text-warning {{$errors->has('code') ? 'border-danger':'border-warning'}}" autofocus required>
                </div>
            @if($errors->has('code'))
                <em class="text-danger form-text">{{$errors->first('code')}}</em>
            @endif
                <div class="form-group">
                    {{ Form::submit('Soumettre',['class'=>'btn btn-outline-warning float-right']) }}
                </div>
            {!! Form::close() !!}
        </div>
        <div class="card-footer">
            <div class="form-text">
            <em class="text-secondary">
                Si vous n'avez trouvez aucun mail veuillez verifier votre boite de spam,
                Si le problème persiste veuillez actualisé la page pour renvoyer le mail a nouveau.
            </em>
            </div>
        </div>
    </div> -->
