@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактировать пользователя')
{{-- vendor styles --}}
@section('vendor-styles')
{{-- <link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}"> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}"> --}}
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
<!-- users edit start -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<section class="users-edit">

<div class="alert alert-success" role="alert" style="display: none"></div>

@if (session('success'))
  <div class="alert alert-success" role="alert">
    {{ __( session()->get('success') ) }}
  </div>
@endif
@if (session('error'))
  <div class="alert alert-danger" role="alert">
    {{ __( session()->get('error') ) }}
  </div>
@endif
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs mb-2" role="tablist">
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab"
            href="#account" aria-controls="account" role="tab" aria-selected="true">
          <i class="bx bx-user mr-25"></i><span class="d-none d-sm-block">Основное</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab"
            href="#information" aria-controls="information" role="tab" aria-selected="false">
          <i class="bx bx-info-circle mr-25"></i><span class="d-none d-sm-block">Информация</span>
        </a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->
            <form action="{{ route('update-avatar', $users->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="media mb-2">
                    <a class="mr-2" id="userAvatarLink" href="javascript:void(0);">
                      <img src="{{ $users->avatar ? asset('images/profile/user-uploads/' . $users->avatar) : asset('images/portrait/default.png') }}" alt="{{ $users->name }}"
                          class="users-avatar-shadow rounded-circle" id="userAvatarView" height="64" width="64">
                    </a>
                    <input type="file" name="avatar" class="d-none" id="userAvatar">
                    <div class="media-body">
                      <h4 class="media-heading">Фото пользователя</h4>
                      <div class="col-12 px-0 d-flex">
                          <button type="submit" class="btn btn-sm btn-primary mr-25">Сохранить</button>
                      </div>
                    </div>
                </div>
            </form>
            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form id="userEditProfile" method="post">
                @csrf
                {{ method_field('POST') }}
                <input type="hidden" name="userid" value="{{ $users->id }}">
                <div class="row">
                  <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <div class="controls">
                            <label>Логин</label>
                            <input type="text" class="form-control" placeholder="Логин"
                                value="{{ $users->login }}"
                                name="login">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Имя</label>
                            <input type="text" class="form-control" placeholder="Имя"
                                value="{{ $users->name }}"
                                name="name">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email"
                                value="{{ $users->email }}"
                                name="email">
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Роль</label>
                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
                      </div>
                      <div class="form-group">
                        <label>Статус</label>
                        <select class="form-control" name="status">
                            <option value="active">Активный</option>
                            <option value="banned">Заблокирован</option>
                            <option value="close">Закрыть</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Компания</label>
                        <input type="text" class="form-control" placeholder="Название компании">
                      </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Сохранить</button>
                      <button type="reset" class="btn btn-light">Отмена</button>
                  </div>
                </div>
            </form>
            <!-- users edit account form ends -->
        </div>
        <div class="tab-pane fade show" id="information" aria-labelledby="information-tab" role="tabpanel">
            <!-- users edit Info form start -->
            <form class="">
                <div class="row">
                  <div class="col-12 col-sm-6">
                      <h5 class="mb-1"><i class="bx bx-link mr-25"></i>Социальные сети</h5>
                      <div class="form-group">
                        <label>Twitter</label>
                        <input class="form-control" type="text" value="https://www.twitter.com/">
                      </div>
                      <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" type="text" value="https://www.facebook.com/">
                      </div>
                      <div class="form-group">
                        <label>Google+</label>
                        <input class="form-control" type="text">
                      </div>
                      <div class="form-group">
                        <label>LinkedIn</label>
                        <input class="form-control" type="text">
                      </div>
                      <div class="form-group">
                        <label>Instagram</label>
                        <input class="form-control" type="text" value="https://www.instagram.com/">
                      </div>
                  </div>
                  <div class="col-12 col-sm-6 mt-1 mt-sm-0">
                      <h5 class="mb-1"><i class="bx bx-user mr-25"></i>Персональная информация</h5>
                      <div class="form-group">
                        <div class="controls position-relative">
                            <label>Дата рождения</label>
                            <input type="text" class="form-control birthdate-picker"
                                placeholder="Birth date"
                                name="dob">
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Страна</label>
                        <select class="form-control" id="accountSelect">
                            <option>USA</option>
                            <option>India</option>
                            <option>Canada</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Язык</label>
                        <select class="form-control" id="users-language-select2">
                            <option value="English" selected>English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                            <option value="Russian" selected>Russian</option>
                            <option value="German">German</option>
                            <option value="Arabic">Arabic</option>
                            <option value="Sanskrit">Sanskrit</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Телефон</label>
                            <input type="text" class="form-control" placeholder="Phone number"
                                value="(+656) 254 2568" name="phone">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="controls">
                            <label>Адрес</label>
                            <input type="text" class="form-control" placeholder="Address"
                            name="address">
                        </div>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                        <label>Сайт</label>
                        <input type="text" class="form-control" placeholder="Website address"
                        name="website">
                      </div>
                      <div class="form-group">
                        <label>Любимая музыка</label>
                        <select class="form-control" id="users-music-select2">
                            <option value="Rock">Rock</option>
                            <option value="Jazz" selected>Jazz</option>
                            <option value="Disco">Disco</option>
                            <option value="Pop">Pop</option>
                            <option value="Techno">Techno</option>
                            <option value="Folk" selected>Folk</option>
                            <option value="Hip hop">Hip hop</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-12">
                      <div class="form-group">
                        <label>Любимые фильмы</label>
                        <select class="form-control" id="users-movies-select2">
                            <option value="The Dark Knight" selected>The Dark Knight
                            </option>
                            <option value="Harry Potter" selected>Harry Potter</option>
                            <option value="Airplane!">Airplane!</option>
                            <option value="Perl Harbour">Perl Harbour</option>
                            <option value="Spider Man">Spider Man</option>
                            <option value="Iron Man" selected>Iron Man</option>
                            <option value="Avatar">Avatar</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Сохранить</button>
                      <button type="reset" class="btn btn-light">Отмена</button>
                  </div>
                </div>
            </form>
            <!-- users edit Info form ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- users edit ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
{{-- <script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script> --}}
{{-- <script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script> --}}
{{-- <script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script> --}}
@endsection

{{-- page scripts --}}
@section('page-scripts')
{{-- <script src="{{asset('js/scripts/pages/app-users.js')}}"></script> --}}
{{-- <script src="{{asset('js/scripts/navs/navs.js')}}"></script> --}}
<script src="{{asset('assets/js/uploadAvatar.js')}}"></script>
<script src="{{asset('assets/js/usersControl.js')}}"></script>
@endsection
