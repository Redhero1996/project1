<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto nav-flex-icons">
                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if (Auth::user()->avatar == null)
                                <img class="avatar" src="{{ config('view.image_paths.images') }}"> {{ Auth::user()->name }}
                            @else
                                <img class="avatar" src="{{ asset('images/' . Auth::user()->avatar) }}"> {{ Auth::user()->name }}
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-default ml-5" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('users.show', [Auth::user()->name, Auth::user()->id]) }}"><i class="fas fa-user"></i> {{ trans('translate.account') }}</a>
                            <a class="dropdown-item" href="{{ url('/') }}"><i class="fas fa-home"></i> {{ trans('translate.homepage') }}</a>
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt"></i> {{ trans('translate.logout') }}</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link btn-login" href="{{ route('login') }}">{{ trans('translate.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ trans('translate.register') }}</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
