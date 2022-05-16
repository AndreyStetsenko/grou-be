@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Roles List')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<section id="basic-checkbox">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Просмотр роли</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="form-group">
                      <label for="basicInput">Название</label><br>
                      {{ $role->name }}
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <ul class="list-unstyled mb-0">
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <li class="d-inline-block mr-2 mb-1">
                                  <fieldset>
                                      {{ $v->name }}
                                  </fieldset>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
