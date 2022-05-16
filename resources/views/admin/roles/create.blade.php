@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Create Role')
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

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Упс!</strong> У нас какие то проблемы.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<section id="basic-checkbox">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Создать роль</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="form-group">
                      <label for="basicInput">Название</label>
                      {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <ul class="list-unstyled mb-0">
                        @foreach($permission as $value)
                            <li class="d-inline-block mr-2 mb-1">
                              <fieldset>
                                  <div class="checkbox">
                                      {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'checkbox-input', 'id' => 'checkbox' . $value->id)) }}
                                      <label for="checkbox{{ $value->id }}">{{ $value->name }}</label>
                                  </div>
                              </fieldset>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
{!! Form::close() !!}
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
