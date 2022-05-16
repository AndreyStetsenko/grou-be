@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Редактировать профиль')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
@endsection

@section('content')
<!-- account setting page start -->
<section id="page-account-settings">
  <div class="row">
    <div class="col-12">
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
    </div>
    <div class="col-12">
      <div class="row">
        @include('profile.edit-sidebar')
        <!-- right content section -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    @include('profile.edit-main')
                    @include('profile.edit-security')
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- account setting page ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('vendors/js/file-uploaders/dropzone.min.js')}}"></script>
@endsection

@section('page-scripts')
    <script src="{{asset('js/scripts/pages/page-account-settings.js')}}"></script>
    <script src="{{asset('assets/js/uploadAvatar.js')}}"></script>
@endsection
