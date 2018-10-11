<header>
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="language-area">
                        <ul>
                            <li><img src="{{ asset(config('view.image_paths.flag') . '1.jpg') }}" alt="flag" /><a href="#">English<i class="fa fa-angle-down"></i></a>
                                <div class="header-sub">
                                    <ul>
                                        <li><a href="#"><img src="{{ asset(config('view.image_paths.flag') . '2.jpg') }}" alt="flag" />france</a></li>
                                        <li><a href="#"><img src="{{ asset(config('view.image_paths.flag') . '3.jpg') }}" alt="flag" />croatia</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="account-area text-right">
                        <ul>
                            @auth
                                <li>
                                    <div class="dropdown">
                                        <span id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if(Auth::user()->avatar)
                                                <img src="{{ asset(Auth::user()->avatar) }}" alt="avatar" class="avatar">
                                            @else
                                                <img src="{{ asset(config('view.image_paths.user') . '1.png') }}" alt="avatar" class="avatar">
                                            @endif
                                        </span>
                                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#"><b>{{ Auth::user()->name }}</b></a>
                                            @if ($roles && in_array(config('model.roles.admin'), $roles))
                                                <a class="dropdown-item" href="{{ url('admin') }}">{{ trans('settings.header.dasboard') }}</a>
                                            @endif
                                            <a class="dropdown-item" href="{{ route('my-profile') }}">{{ trans('settings.header.profile') }}</a>
                                            <a class="dropdown-item" href="#">{{ trans('settings.header.book_of_me') }}</a>
                                            <a class="dropdown-item" href="#">{{ trans('settings.header.book_request') }}</a>
                                            {!! Form::open([
                                                'route' => 'logout',
                                                'method' => 'POST',
                                            ]) !!}
                                            <button class="btn btn-dangera">{{ trans('settings.header.logout') }}</button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li><a href="{{ route('framgia.login') }}" class="login_wsm">{{ trans('settings.header.login_wsm') }}</a></li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mid-area ptb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="header-search">
                        {!! Form::open([
                            'method' => 'POST',
                            'id' => 'header-search',
                            'class' => 'form-groupt',
                        ]) !!}
                        {!! Form::text(
                            'req',
                            null,
                            [
                                'placeHolder' => 'Search entire store here...',
                                'required' => 'required',
                                'class' => 'form-control m-input'
                            ]
                        ) !!}
                        <a href="#"><i class="fa fa-search"></i></a>
                        {!! Form::close() !!}
                    </div>
                    <div id="search-suggest" class="s-suggest"></div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                    <div class="logo-area text-center logo-xs-mrg">
                        <a href="#"><img src="{{ asset(config('view.image_paths.logo') . 'logo.png') }}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="my-cart">
                        <ul>
                            <li>
                                <a href="{{ route('my-request.index') }}" class="{{ Auth::check() ? '' : 'login' }}"><i class="fa fa-bell-o" aria-hidden="true"></i>My Request</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area hidden-sm hidden-xs sticky-header-1" id="header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-area">
                        <nav>
                            <ul>
                                <li class="active"><a href="{{ route('home') }}">{{ trans('settings.default.home') }}<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li>
                                    <a href="{{ route('books.index') }}">{{ trans('settings.default.book') }}<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li><a href="#">pages<i class="fa fa-angle-down"></i></a>
                                    <div class="sub-menu sub-menu-2">
                                        <ul>
                                            <li><a href="{{ route('books.create') }}">{{ trans('settings.header.add_your_book') }}</a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
