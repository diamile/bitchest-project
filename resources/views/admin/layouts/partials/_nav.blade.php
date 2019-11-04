<nav class="navbar fixed-top navbar-expand-lg navbar-default">
        <a class="navbar-brand" href=""> <img src="images/bitchest_logo.png" width="150" height="50" /></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto"></ul>
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">@lang('Acceuil')</a></li>
          </ul>
          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @guest
              @else
                @include('admin.layouts.partials._nav_dropdown_client')
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                @lang('Déconnexion')
                            </a>
                            <form id="logout-form" action="" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
              @endguest
          </ul>
        </div>
      </nav>
      