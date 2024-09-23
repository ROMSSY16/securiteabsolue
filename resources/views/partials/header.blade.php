<header class="main-header">
            <!-- header-top -->
            <div class="header-top">
                <div class="outer-container">
                    <div class="top-inner">
                        <ul class="info-list clearfix">
                            <li><i class="icon-1 gradient-color"></i><a href="mailto:{{$settings->email}}">{{$settings->email}}</a></li>
                            <li><i class="icon-3 gradient-color"></i>{{$settings->horaires}}</li>
                        </ul>
                        <div class="top-right">
                            <!--<div class="login-box"><a href="#"><i class="icon-4 gradient-color"></i> Connexion</a></div>-->
                            <ul class="social-links clearfix">
                                <li><a href="{{$settings->link_fb ?? null}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$settings->link_tw ?? null}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$settings->link_ld ?? null}}"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="{{$settings->link_ld ?? null}}"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- header-lower -->
            <div class="header-lower">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="shape" style="background-image: url({{ asset('assets/images/shape/shape-1.png') }});"></div>
                        <div class="menu-area">
                            <div class="logo-box">
                                <figure class="logo">
                                    <a href="{{route('home')}}">
                                        <img src="{{asset($settings->logo)}}" alt="" style="height:90px">
                                    </a>
                                </figure>
                            </div>
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li class="current dropdown"><a href="{{route('home')}}">Accueil</a> </li> 
                                        <li><a href="about.html">Carrière</a></li>
                                        <li class="dropdown"><a href="#">Services</a>
                                            <ul>
                                                @foreach ($services as $service)
                                                    <li><a href="{{route('service.detail', $service->id)}}">{{$service->name}} </a></li>
                                                @endforeach
                                            </ul>
                                        </li> 
                                        <li><a href="{{route('blog')}}">Blog</a></li>
                                        <li><a href="{{route('contact')}}">Contact</a></li> 
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="support-box">
                                <div class="icon-box gradient-color"><i class="icon-2"></i></div>
                                <a href="tel:{{$settings->no_telephone}}">{{$settings->no_telephone}} / {{$settings->no_telephone2 ?? null}}</a>
                            </div>
                            <div class="btn-box">
                                <a href="{{route('home')}}" class="theme-btn btn-one"><span>Nous Joindre</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="outer-container">
                    <div class="outer-box">
                        <div class="menu-area">
                            <div class="logo-box">
                                <figure class="logo"><a href="{{route('home')}}"><img style="height:110px" src="{{asset($settings->logo)}}" alt=""></a></figure>
                            </div>
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content">
                            <div class="support-box">
                                <div class="icon-box gradient-color"><i class="icon-2"></i></div>
                                <a href="tel:{{$settings->no_telephone}}">{{$settings->no_telephone}} / {{$settings->no_telephone2 ?? null}}</a>
                            </div>
                            <div class="btn-box">
                                <a href="{{route('home')}}" class="theme-btn btn-one"><span>Nous Joindre</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>