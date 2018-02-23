<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top">
    <!-- Brand NAV -->
    <a class="navbar-brand text-secondary" href="{{ url('/') }}">
        LY
    </a>
    <ul class="nav">
        <li class="dropdown">
            <a href="#" class="btn p-0" data-toggle="dropdown" role="button" aria-expanded="false"
               aria-haspopup="true">
                <i class="fas fa-flask fa-2x m-0 text-warning"></i>
            </a>

            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="#" class="dropdown-item">français</a>
                </li>
                <li>
                    <a href="#" class="dropdown-item text-right">العربية</a>
                </li>
            </ul>
        </li>
    </ul>
    <form action="/language">
        <input type="hidden" name="_token" id="csrf_token" value="{{csrf_token()}}">
        <select name="language" id="language">
            <option value="fr" {{ app()->getLocale() == 'fr' ? 'selected': '' }}>français</option>
            <option value="ar" {{ app()->getLocale() == 'ar' ? 'selected': '' }}>arabic</option>
        </select>
    </form>
   <!--
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
            aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse offset-sm-7 offset-md-8 offset-lg-9" id="navbarToggler">
        <ul class="navbar-nav mt-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-warning" href="{{ route('login') }}">S'identifier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light btn btn-outline-warning ml-2" href="{{ route('register') }}">S'enregistrer</a>
                </li>
                @else
                    <li class="dropdown">
                        <a href="#" class="btn p-0" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true">
                            <i class="fas fa-address-book fa-2x text-warning m-0"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="{{ route('profil') }}" class="dropdown-item ">
                                    profil
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    comptabilité
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    stock
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    statistique
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    Clients
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    Fournisseurs
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    Calendrier
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item ">
                                    Administration
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="dropdown-item "
                                   onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                    <li class="dropdown ml-2">
                        <a href="#" class="btn p-0" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true">
                            <i class="fas fa-language fa-2x m-0 text-warning"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="#" class="dropdown-item">français</a>
                            </li>
                            <li>
                                <a href="#" class="dropdown-item text-right">العربية</a>
                            </li>
                        </ul>
                    </li>
        </ul>
    </div>
    -->
</nav>
