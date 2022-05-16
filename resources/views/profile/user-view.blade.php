@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Users View')
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<!-- users view start -->
<section class="users-view">
  <!-- users view media object start -->
  <div class="row">
    <div class="col-12 col-sm-7">
      <div class="media mb-2">
        <a class="mr-1" href="javascript:void(0);">
          <img src="{{ $users->avatar ? asset('images/profile/user-uploads/' . $users->avatar) : asset('images/portrait/default.png') }}" alt="{{ $users->name }}"
            class="users-avatar-shadow rounded-circle" height="64" width="64">
        </a>
        <div class="media-body pt-25">
          <h4 class="media-heading"><span class="users-view-name">{{ $users->name }}</span><span
              class="text-muted font-medium-1"> @</span><span
              class="users-view-username text-muted font-medium-1 ">{{ $users->login }}</span></h4>
          <span>ID:</span>
          <span class="users-view-id">{{ $users->id }}</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
      <a href="javascript:void(0);" class="btn btn-sm mr-25 border"><i class="bx bx-envelope font-small-3"></i></a>
      <a href="javascript:void(0);" class="btn btn-sm mr-25 border">Profile</a>
      @role('Admin')
      <a href="{{asset('app/users/edit/id' . $users->id)}}" class="btn btn-sm btn-primary">Edit</a>
      @endrole
    </div>
  </div>
  <!-- users view media object ends -->
  <!-- users view card data start -->
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12 col-md-4">
          <table class="table table-borderless">
            <tbody>
              <tr>
                <td>Registered:</td>
                <td>{{ $users->created_at }}</td>
              </tr>
              <tr>
                <td>Role:</td>
                <td class="users-view-role">Staff</td>
              </tr>
              <tr>
                <td>Status:</td>
                <td>
                    <span class="badge badge-light-{{ $users->email_verified_at ? 'success' : 'warning' }} users-view-status">
                        {{ $users->email_verified_at ? 'Active' : 'No active' }}
                    </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-12 col-md-8">
          <div class="table-responsive">
            <table class="table mb-0">
              <thead>
                <tr>
                  <th>Module Permission</th>
                  <th>Read</th>
                  <th>Write</th>
                  <th>Create</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Users</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>No</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td>Articles</td>
                  <td>No</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>Yes</td>
                </tr>
                <tr>
                  <td>Staff</td>
                  <td>Yes</td>
                  <td>Yes</td>
                  <td>No</td>
                  <td>No</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- users view card data ends -->
  <!-- users view card details start -->
  <div class="card">
    <div class="card-body">
      <div class="col-12">
        <table class="table table-borderless">
          <tbody>
            <tr>
              <td>Username:</td>
              <td class="users-view-username">{{ $users->login }}</td>
            </tr>
            <tr>
              <td>Name:</td>
              <td class="users-view-name">{{ $users->name }}</td>
            </tr>
            <tr>
              <td>E-mail:</td>
              <td class="users-view-email">{{ $users->email }}</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- users view card details ends -->

</section>
<!-- users view ends -->
@endsection
{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
