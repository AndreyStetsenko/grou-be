@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Создать пользователя')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<!-- user create start -->

<section id="multiple-column-form">
@if (session('success'))
  <div class="alert alert-success" role="alert">
    {{ __('Пользователь создан!') }}
  </div>
@endif
  <div class="row match-height">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Создать пользователя</h4>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('users.store') }}" method="post">
            @csrf
            <div class="form-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="user-name" class="form-control" placeholder="Имя"
                      name="name">
                    <label for="user-name">Имя</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="user-login" class="form-control" placeholder="Логин"
                      name="login">
                    <label for="user-login">Логин</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="email" id="user-email" class="form-control" name="email"
                      placeholder="Email">
                    <label for="user-email">Email</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="password" id="user-password" class="form-control" name="password"
                      placeholder="Пароль">
                    <label for="user-password">Пароль</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        {!! Form::select('roles[]', $roles,[], array('class' => 'select2 form-control')) !!}
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Создать</button>
                  <button type="reset" class="btn btn-light-secondary">Сброс</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- user create ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/forms/select/form-select2.js')}}"></script>
@endsection
