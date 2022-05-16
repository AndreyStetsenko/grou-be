@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Менеджер ролей')
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

<section class="users-list-wrapper">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ __( session()->get('success') ) }}
      </div>
    @endif

  @role('Admin')
  <div class="users-list-filter px-1">
    <div class="row py-2 mb-2">
        <div class="col-12 col-sm-6 col-lg-6 d-flex align-items-center">
            <h2>Менеджер ролей</h2>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center ml-auto">
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-block glow users-list-clear mb-0">Создать роль</a>
        </div>
    </div>
  </div>
  @endrole
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                  <th>№</th>
                  <th>Название</th>
                  <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                      <div class="dropdown d-flex justify-content-end">
                        <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="{{ route('roles.show',$role->id) }}">
                                <i class="bx bx-show-alt mr-1"></i>
                                просмотр
                            </a>
                            @can('role-edit')
                            <a class="dropdown-item" href="{{ route('roles.edit',$role->id) }}">
                                <i class="bx bx-edit-alt mr-1"></i>
                                редактировать
                            </a>
                            @endcan
                            @can('role-delete')
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id]]) !!}
                                <button type="submit" class="btn"><i class="bx bx-trash mr-1"></i> удалить</button>
                                {!! Form::close() !!}
                            @endcan
                        </div>
                      </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>

{!! $roles->render() !!}
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
