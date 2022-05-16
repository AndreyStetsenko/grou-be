{{-- vertical-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu')
<div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
    <li class="nav-item mr-auto">
      <a class="navbar-brand" href="{{asset('/')}}">
      <div class="brand-logo mt-0">
        <svg width="110" height="25" viewBox="0 0 626 135" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 111V23.5455L24.8416 0H120.896C128.5 1.5 133.586 5.5 133.867 13C133.935 14.7943 133.937 16.8969 133.919 19.3594L134.145 47.0909H110.959V23.5455H24.8416V67.2727V111H110.959V91H84V72.5C100.715 73 134.145 73.7 134.145 72.5C134.145 126 137.5 134.5 120.896 134.5H24.8416L0 111Z" fill="#00FF67"/>
          <path d="M156 24.137V135H180.244V24.137H270.293V56.5184H204.488L185.439 79.6249H227.073L265.171 135H298L259.634 78.8198L293.537 60.8015V12.1797C293.537 12.1797 293.537 0 277.951 0H180.244L156 24.137Z" fill="#00FF67"/>
          <path fill-rule="evenodd" clip-rule="evenodd" d="M439.743 0H341L318 26.5909V112.5C318 125.5 326.054 135 342.929 135H450.313C454.787 133.636 463.353 127.227 461.818 112.5V19.5C461.818 13.3636 453.549 0 439.743 0ZM423.894 24H353L340 39.1364V96.5C341 107 343.5 111 357.311 111H431.884C434.991 110.121 440.939 105.991 439.874 96.5V35.5455C439.874 31.5909 433.482 24 423.894 24Z" fill="#00FF67"/>
          <path d="M482.069 26.8L504.5 0V97.7439C504.5 101.867 506.7 110.113 515.5 110.113H594.892C602.171 110.113 603.991 101.867 603.991 97.7439V0H625.828V112.323C627.284 127.166 619.155 133.626 614.909 135H502.086C484.616 135 481.462 119.882 482.069 112.323V26.8Z" fill="#00FF67"/>
          </svg>
      </div>
      <h2 class="brand-text mb-0 d-none">
        GROU
      </h2>
      </a>
    </li>
        <li class="nav-item nav-toggle">
        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="bx bx-x d-block d-xl-none font-medium-4 primary"></i>
          <i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block primary" data-ticon="bx-disc"></i>
        </a>
        </li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="lines">
      <li class="nav-item {{ Route::currentRouteName() === 'dashboard' ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}">
          <i class="menu-livicon" data-icon="desktop"></i>
          <span class="menu-title text-truncate">{{ __('locale.'.'Dashboard')}}</span>
        </a>
      </li>
      <li class="nav-item {{ Route::currentRouteName() === 'view-profile' ? 'active' : '' }}">
        <a href="{{ route('view-profile') }}">
          <i class="menu-livicon" data-icon="user"></i>
          <span class="menu-title text-truncate">Профиль</span>
        </a>
      </li>
      @can('user-list')
      <li class="nav-item">
        <a href="{{ route('user-list') }}">
          <i class="menu-livicon" data-icon="users"></i>
          <span class="menu-title text-truncate">{{ __('locale.'.'Users')}}</span>
        </a>
      </li>
      @endcan
      @can('role-list')
      <li class="nav-item">
        <a href="{{ url('dashboard/roles') }}">
          <i class="menu-livicon" data-icon="unlock"></i>
          <span class="menu-title text-truncate">{{ __('locale.'.'Roles')}}</span>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a href="{{ route('tasks-list') }}">
          <i class="menu-livicon" data-icon="check-alt"></i>
          <span class="menu-title text-truncate">{{ __('locale.'.'Tasks')}}</span>
        </a>
      </li>
      @role('Admin')
      <li class="nav-item">
        <a href="{{ route('site-settings.index') }}">
          <i class="menu-livicon" data-icon="settings"></i>
          <span class="menu-title text-truncate">{{ __('locale.'.'Site Settings')}}</span>
        </a>
      </li>
      @endrole
    </ul>
  </div>
</div>
@endif
{{-- horizontal-menu --}}
@if($configData['mainLayoutType'] == 'horizontal-menu')
<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-light navbar-without-dd-arrow
@if($configData['navbarType'] === 'navbar-static') {{'navbar-sticky'}} @endif" role="navigation" data-menu="menu-wrapper">
  <div class="navbar-header d-xl-none d-block">
      <ul class="nav navbar-nav flex-row">
      <li class="nav-item mr-auto">
          <a class="navbar-brand" href="{{asset('/')}}">
          <div class="brand-logo">
            <img src="{{asset('images/logo/logo.svg')}}" class="logo" alt="">
          </div>
          <h2 class="brand-text mb-0">
            @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
            {{$configData['templateTitle']}}
            @else
            Frest
            @endif
          </h2>
          </a>
      </li>
      <li class="nav-item nav-toggle">
          <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
          <i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
          </a>
      </li>
      </ul>
  </div>
  <div class="shadow-bottom"></div>
  <!-- Horizontal menu content-->
  <div class="navbar-container main-menu-content" data-menu="menu-container">
      <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="filled">
      @if(!empty($menuData[1]) && isset($menuData[1]))
          @foreach ($menuData[1]->menu as $menu)
          <li class="@if(isset($menu->submenu)){{'dropdown'}} @endif nav-item" data-menu="dropdown">
          <a class="@if(isset($menu->submenu)){{'dropdown-toggle'}} @endif nav-link" href="{{asset($menu->url)}}"
            @if(isset($menu->submenu)){{'data-toggle=dropdown'}} @endif @if(isset($menu->newTab)){{"target=_blank"}}@endif>
              <i class="menu-livicon" data-icon="{{$menu->icon}}"></i>
              <span>{{ __('locale.'.$menu->name)}}</span>
          </a>
          @if(isset($menu->submenu))
              @include('panels.sidebar-submenu',['menu'=>$menu->submenu])
          @endif
          </li>
          @endforeach
      @endif
      </ul>
  </div>
  <!-- /horizontal menu content-->
  </div>
@endif

{{-- vertical-box-menu --}}
@if($configData['mainLayoutType'] == 'vertical-menu-boxicons')
<div class="main-menu menu-fixed @if($configData['theme'] === 'light') {{"menu-light"}} @else {{'menu-dark'}} @endif menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">
    <li class="nav-item mr-auto">
      <a class="navbar-brand" href="{{asset('/')}}">
        <div class="brand-logo">
          <img src="{{asset('images/logo/logo.svg')}}" class="logo" alt="">
        </div>
        <h2 class="brand-text mb-0">
          @if(!empty($configData['templateTitle']) && isset($configData['templateTitle']))
          {{$configData['templateTitle']}}
          @else
          Frest
          @endif
        </h2>
      </a>
    </li>
    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon bx bx-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="bx-disc"></i></a></li>
    </ul>
  </div>
  <div class="shadow-bottom"></div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
      @if(!empty($menuData[2]) && isset($menuData[2]))
      @foreach ($menuData[2]->menu as $menu)
          @if(isset($menu->navheader))
              <li class="navigation-header text-truncate"><span>{{$menu->navheader}}</span></li>
          @else
          <li class="nav-item {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
            <a href="@if(isset($menu->url)){{asset($menu->url)}} @endif" @if(isset($menu->newTab)){{"target=_blank"}}@endif>
            @if(isset($menu->icon))
              <i class="{{$menu->icon}}"></i>
            @endif
            @if(isset($menu->name))
              <span class="menu-title text-truncate">{{ __('locale.'.$menu->name)}}</span>
            @endif
            @if(isset($menu->tag))
              <span class="{{$menu->tagcustom}} ml-auto">{{$menu->tag}}</span>
            @endif
           </a>
          @if(isset($menu->submenu))
            @include('panels.sidebar-submenu',['menu' => $menu->submenu])
          @endif
          </li>
          @endif
      @endforeach
      @endif
  </ul>
  </div>
</div>
@endif
