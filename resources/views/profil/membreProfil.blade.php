<div id="user-agent">
    <span id="title-page" class="hidden">{{ $user->name }}</span>
    <span id="url-current">/membre/profil</span>
</div>
<!-- Cover area -->
<div class="profile-cover">
    <div class="profile-cover-img" style="background-image: url('{{asset('images/login_cover.jpg')}}')"></div>
    <div class="media">
        <div class="media-left">
            <a href="#" class="profile-thumb">
                @if(isset($output) and !empty($output->photo_profil))
                    <img src="{{ asset($output->photo_profil) }}" class="img-circle" title="{{$user->name}}" alt=""/>
                @else
                    <img src="{{asset('images/profil/profil.png')}}" class="img-circle" title="{{$user->name}}" alt="">
                @endif
            </a>
        </div>

        <div class="media-body">
            <h1>{{ ucfirst($output->first_name) . ' ' . strtoupper($output->last_name) }}
                <small class="display-block">UX/UI designer</small>
            </h1>
        </div>

        <div class="media-right media-middle">
            <ul class="list-inline list-inline-condensed no-margin-bottom text-nowrap">
                <li><a href="#" class="btn btn-default"><i class="icon-user position-left"></i> Profil image</a></li>
                <li><a href="#" class="btn btn-default"><i class="icon-file-picture position-left"></i> Cover image</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /cover area -->
<div class="content mt-10">
    <div class="row">
        <div class="col-lg-9">
            <div class="tab-pane fade active in" id="settings">

                <!-- Profile info -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h6 class="panel-title">
                            Profile information
                            <a class="heading-elements-toggle">
                            </a>
                        </h6>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.name') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <form class="heading-form hidden" action="#">
                                            <div class="form-group">
                                                <label class="checkbox-inline checkbox-switchery checkbox-right switchery-xs">
                                                    <input type="checkbox" class="switchery" checked="checked">
                                                    Enable editable:
                                                </label>
                                            </div>
                                        </form>

                                        <!-- Editable inputs -->
                                        <br><br><br><br><br><br><br><br><br><br><br><br>
                                        <a href="#" id="text-field-help" data-type="text" data-inputclass="form-control" data-pk="1" data-title="Help block">With help block</a>

                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.last_name') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->last_name) ? $output->last_name : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.birth-date') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->dtn) ? Carbon\Carbon::parse($output->dtn)->format('d-m-Y') : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.sex') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->sex) ? $output->sex : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.phone') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->tel) ? $output->tel : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.address') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->adress) ? $output->address : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.house_nbr') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->house_nbr) ? $output->house_nbr : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="col-xs-6">
                                        <span class="text-semibold">{{ trans('validation.attributes.city') }}</span>
                                    </div>
                                    <div class="col-xs-6">
                                        <p class="text-right">{{ ($output->city) ? $output->city : trans('profil.profil.inconnu') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /profile info -->

            </div>
        </div>

        <div class="col-lg-3">

            <!-- Navigation -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Navigation<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <a href="#" class="heading-text">See all →</a>
                    </div>
                </div>

                <div class="list-group no-border no-padding-top">
                    <a href="#" class="list-group-item"><i class="icon-user"></i> My profile</a>
                    <a href="#" class="list-group-item"><i class="icon-cash3"></i> Balance</a>
                    <a href="#" class="list-group-item"><i class="icon-tree7"></i> Connections <span
                                class="badge bg-danger pull-right">29</span></a>
                    <a href="#" class="list-group-item"><i class="icon-users"></i> Friends</a>
                    <div class="list-group-divider"></div>
                    <a href="#" class="list-group-item"><i class="icon-calendar3"></i> Events <span
                                class="badge bg-teal-400 pull-right">48</span></a>
                    <a href="#" class="list-group-item"><i class="icon-cog3"></i> Account settings</a>
                </div>
            </div>
            <!-- /navigation -->


            <!-- Share your thoughts -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Share your thoughts<a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <ul class="icons-list">
                            <li><a data-action="close"></a></li>
                        </ul>
                    </div>
                </div>

                <div class="panel-body">
                    <form action="#">
                        <div class="form-group">
                            <textarea name="enter-message" class="form-control mb-15" rows="3" cols="1"
                                      placeholder="What's on your mind?"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-xs-6">
                                <ul class="icons-list icons-list-extended mt-10">
                                    <li><a href="#" data-popup="tooltip" title="" data-container="body"
                                           data-original-title="Add photo"><i class="icon-images2"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="" data-container="body"
                                           data-original-title="Add video"><i class="icon-film2"></i></a></li>
                                    <li><a href="#" data-popup="tooltip" title="" data-container="body"
                                           data-original-title="Add event"><i class="icon-calendar2"></i></a></li>
                                </ul>
                            </div>

                            <div class="col-xs-6 text-right">
                                <button type="button" class="btn btn-primary btn-labeled btn-labeled-right">Share <b><i
                                                class="icon-circle-right2"></i></b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /share your thoughts -->


            <!-- Balance chart -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Balance changes<a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    </h6>
                    <div class="heading-elements">
                        <span class="heading-text"><i class="icon-arrow-down22 text-danger"></i> <span
                                    class="text-semibold">- 29.4%</span></span>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="chart-container">
                        <div class="chart" id="visits" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <!-- /balance chart -->


            <!-- Connections -->
            <div class="panel panel-flat">
                <div class="panel-heading">
                    <h6 class="panel-title">Latest connections<a class="heading-elements-toggle"><i
                                    class="icon-more"></i></a></h6>
                    <div class="heading-elements">
                        <span class="badge badge-success heading-text">+32</span>
                    </div>
                </div>

                <ul class="media-list media-list-linked pb-5">
                    <li class="media-header">Office staff</li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face1.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">James Alexander</span>
                                <span class="media-annotation">UI/UX expert</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-success"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face2.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Jeremy Victorino</span>
                                <span class="media-annotation">Senior designer</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-danger"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face6.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <div class="media-heading"><span class="text-semibold">Jordana Mills</span></div>
                                <span class="text-muted">Sales consultant</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-grey-300"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face9.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <div class="media-heading"><span class="text-semibold">William Miles</span></div>
                                <span class="text-muted">SEO expert</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-success"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media-header">Partners</li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face3.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Margo Baker</span>
                                <span class="media-annotation">Google</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-success"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face4.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Beatrix Diaz</span>
                                <span class="media-annotation">Facebook</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-warning-400"></span>
                            </div>
                        </a>
                    </li>

                    <li class="media">
                        <a href="#" class="media-link">
                            <div class="media-left"><img src="assets/images/demo/users/face5.jpg"
                                                         class="img-circle img-md" alt=""></div>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Richard Vango</span>
                                <span class="media-annotation">Microsoft</span>
                            </div>
                            <div class="media-right media-middle">
                                <span class="status-mark bg-grey-300"></span>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /connections -->

        </div>
    </div>
</div>

<!-- scripts pages -->

