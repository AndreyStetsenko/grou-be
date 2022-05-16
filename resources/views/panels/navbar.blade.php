{{-- navabar  --}}
<div class="header-navbar-shadow"></div>
<nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu
@if(isset($configData['navbarType'])){{$configData['navbarClass']}} @endif"
data-bgcolor="@if(isset($configData['navbarBgColor'])){{$configData['navbarBgColor']}}@endif">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="navbar-collapse" id="navbar-mobile">
        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
          {{-- <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
          </ul>
          <ul class="nav navbar-nav bookmark-icons">
            @role ('Admin')
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('dashboard/chat')}}" data-toggle="tooltip" data-placement="top" title="Чат"><i class="ficon bx bx-chat"></i></a></li>
            @endrole
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('dashboard/tasks')}}" data-toggle="tooltip" data-placement="top" title="Задачи"><i class="ficon bx bx-check-circle"></i></a></li>
            @role ('Admin')
            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="{{asset('dashboard/calendar')}}" data-toggle="tooltip" data-placement="top" title="Календарь"><i class="ficon bx bx-calendar-alt"></i></a></li>
            @endrole
          </ul> --}}
        </div>
        <ul class="nav navbar-nav float-right">
          <li class="dropdown dropdown-language nav-item">
            <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="flag-icon flag-icon-us"></i><span class="selected-language">Русский</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdown-flag">
              <a class="dropdown-item" href="{{url('lang/ru')}}" data-language="ru">
                <i class="flag-icon flag-icon-ru mr-50"></i> Русский
              </a>
              <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">
                <i class="flag-icon flag-icon-us mr-50"></i> English
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>
          <li class="nav-item nav-search"><a class="nav-link nav-link-search"><i class="ficon bx bx-search"></i></a>
            <div class="search-input">
              <div class="search-input-icon"><i class="bx bx-search primary"></i></div>
              <input class="input" type="text" placeholder="Explore Frest..." tabindex="-1" data-search="template-search">
              <div class="search-input-close"><i class="bx bx-x"></i></div>
              <ul class="search-list"></ul>
            </div>
          </li>
          <li class="dropdown dropdown-user nav-item">
            <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
              <div class="user-nav d-sm-flex d-none">
                @if (Route::has('login'))
                    @auth
                        <span class="user-name">{{ '@' . Auth::user()->login }}</span>
                    @else
                        <span class="user-name">No Auth</span>
                    @endauth
                @endif

                @foreach(Auth::user()->getRoleNames() as $role)
                    <span class="user-status text-muted">{{ $role ? $role : '' }}</span>
                @endforeach
              </div>
              <div class="avatar">
                <div class="avatar-content">
                  <img class="round"
                  src="{{ Auth::user()->avatar ? asset('images/profile/user-uploads/' . Auth::user()->avatar) : asset('images/portrait/default.png') }}"
                  alt="{{ Auth::user()->name; }}"
                  height="40"
                  width="40">
                </div>
                <span class="avatar-status-{{ Auth::user()->isOnline() ? 'online' : 'busy' }}"></span>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right pb-0">
              <a class="dropdown-item" href="{{route('view-profile')}}">
                <i class="bx bx-user mr-50"></i> Мой профиль
              </a>
              <a class="dropdown-item" href="{{asset('dashboard/tasks')}}">
                <i class="bx bx-check-square mr-50"></i> Задачи</a>
              <div class="dropdown-divider mb-0"></div>
              <a class="dropdown-item" href="{{route('logout')}}"><i class="bx bx-power-off mr-50"></i> Выход</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
