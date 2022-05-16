@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Список пользователей')
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
<!-- users list start -->
<section class="users-list-wrapper">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ __( session()->get('success') ) }}
      </div>
    @endif

  <div class="users-list-filter px-1">
    <div class="row py-2 mb-2">
        <div class="col-12 col-sm-6 col-lg-6 d-flex align-items-center">
            <h2>Список пользователей</h2>
        </div>
        <div class="col-12 col-sm-6 col-lg-3 d-flex align-items-center ml-auto">
            @can('user-create')
            <a href="{{ route('user-create') }}" class="btn btn-primary btn-block glow users-list-clear mb-0">Создать пользователя</a>
            @endcan
        </div>
    </div>
  </div>
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="users-list-datatable" class="table">
            <thead>
              <tr>
                @role('Admin')
                <th>№</th>
                @endrole
                <th>Фото</th>
                <th>Логин</th>
                <th>Имя</th>
                <th>Роль</th>
                @role('Admin')
                {{-- <th>status</th> --}}
                <th>Дата создания</th>
                <th></th>
                @endrole
              </tr>
            </thead>
            <tbody>
              @foreach ($users ?? '' as $i => $user)
                <tr>
                    @role('Admin')
                    <td>#{{ $user->id }}</td>
                    @endrole
                    <td>
                      <div class="avatar mr-1">
                        <img src="{{ $user->avatar ? asset('images/profile/user-uploads/' . $user->avatar) : asset('images/portrait/default.png') }}" alt="avtar img holder" width="32" height="32">
                        <span class="avatar-status-{{ $user->isOnline() ? 'online' : 'busy' }}"></span>
                      </div>
                    </td>
                    <td><a href="{{ route('user-view', $user->id) }}">{{ '@' . $user->login }}</a></td>
                    <td>{{ $user['name'] }}</td>
                    <td>
                        @foreach ($user->getRoleNames() as $role)
                            {{ $role }}
                        @endforeach
                    </td>
                    @role('Admin')
                    {{-- <td>
                        <span class="badge badge-light-{{ $user->email_verified_at ? 'success' : 'warning' }}">
                            {{ $user->email_verified_at ? 'Active' : 'No active' }}
                        </span>
                    </td> --}}
                    <td>{{ $user->created_at }}</td>
                    <td>
                      <div class="dropdown">
                        <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="{{ route('user-edit', $user->id) }}"><i class="bx bx-edit-alt mr-1"></i> редактировать</a>

                          {{ Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) }}
                          <button type="submit" class="btn"><i class="bx bx-trash mr-1"></i> удалить</button>
                          {{ Form::close() }}
                        </div>
                      </div>
                    </td>
                    @endrole
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
<!-- users list ends -->
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
