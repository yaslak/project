<span id="title-page" class="hidden">Recover</span>
<div class="content">
    <div class="panel panel-primary panel-bordered">
        <div class="panel-heading">
            <h6 class="panel-title">
                Récupération de compte
            </h6>
            <div class="heading-elements">
            </div>
        </div>
        <div class="panel-body">
            <p style="vertical-align: inherit;">
                @if(isset($user)) <b>{{$user->name}}</b> @endif, La procédure de recuperation du mot de passe en cas de
                perte ou de difficulté d'accès a votre compte
                nécessite en première étape de vous envoyer un code de récupération, la validité de votre adresse mail
                est nécessaire a ce stade votre autorisation de valider votre adresse en vous envoyant un code de
                sécurité
                a cette dernière est la bien venu.
            </p>
            <div class="stepy-navigator">
                {!! Form::open(['method'=>'put','class'=>'form-horizontal hidden','id'=>'recover-submit' ,'url' => route('recover.store')])!!}
                <input type="submit" value="Envoyer" class="button-next btn btn-primary ">
                {!! Form::close()!!}
                <a href="#" class="button-next btn btn-primary float-right" onclick="event.preventDefault();
                     document.getElementById('recover-submit').submit();">
                    Logout <i class="icon-arrow-right14 position-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>