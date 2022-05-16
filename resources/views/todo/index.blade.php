@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Todo Application')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/daterange/daterangepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/editors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/dragula.min.css')}}">
@endsection
{{-- page style --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-todo.css')}}">
@endsection
{{-- sidebar --}}
@include('todo.sidebar')
{{-- page content --}}
@section('content')
<div class="alert alert-success" role="alert" style="display: none"></div>

<div class="app-content-overlay"></div>
<div class="todo-app-area">
  <div class="todo-app-list-wrapper">
    <div class="todo-app-list">
      <div class="todo-fixed-search d-flex justify-content-between align-items-center">
        <div class="sidebar-toggle d-block d-lg-none">
          <i class="bx bx-menu"></i>
        </div>
        <fieldset class="form-group position-relative has-icon-left m-0 flex-grow-1">
          <input type="text" class="form-control todo-search" id="todo-search" placeholder="Искать задачу">
          <div class="form-control-position">
            <i class="bx bx-search"></i>
          </div>
        </fieldset>
        <div class="todo-sort dropdown mr-1">
          <button class="btn dropdown-toggle sorting" type="button" id="sortDropdown" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-filter"></i>
            <span>Sort</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="sortDropdown">
            <a class="dropdown-item ascending" href="javascript:void(0);">Ascending</a>
            <a class="dropdown-item descending" href="javascript:void(0);">Descending</a>
          </div>
        </div>
      </div>
      <div class="todo-task-list list-group">
        <!-- task list start -->
        <ul class="todo-task-list-wrapper list-unstyled" id="todo-task-list-drag">
        @foreach ($tasks ?? '' as $i => $task)
            <li class="todo-item {{ $task->status == '1' ? 'completed' : '' }}" data-id="{{ $task->id }}" data-name="{{ $task->user->name }}">
              <div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">
                <div class="todo-title-area d-flex">
                  <i class='bx bx-grid-vertical handle'></i>
                  <div class="checkbox">
                    <input type="checkbox" class="checkbox-input" data-id="{{ $task->id }}" id="{{ 'task_' . $i }}" {{ $task->status == '1' ? 'checked' : '' }}>
                    <label for="{{ 'task_' . $i }}"></label>
                  </div>
                  <p class="todo-title mx-50 m-0 truncate">{{ $task->title }}</p>
                </div>
                <div class="todo-item-action d-flex align-items-center">
                  <div class="todo-badge-wrapper d-flex">
                    <span class="badge badge-light-primary badge-pill">{{ $task->tag_id ? $task->tags->tag : '' }}</span>
                  </div>
                  <div class="avatar ml-1">
                    <img src="{{ $task->user->avatar ? asset('images/profile/user-uploads/' . $task->user->avatar) : asset('images/portrait/default.png') }}" alt="avatar" height="30"
                      width="30">
                  </div>
                  <a class="todo-item-favorite ml-75 {{ $task->favorite == 1 ? 'warning' : '' }}" data-id="{{ $task->id }}"><i class="bx bx-star {{ $task->favorite == 1 ? 'bxs-star' : '' }}"></i></a>
                  @can('tasks-delete')
                  <a class="todo-item-delete ml-75" data-id="{{ $task->id }}"><i class="bx bx-trash"></i></a>
                  @endcan
                </div>
              </div>
            </li>
        @endforeach
        </ul>
        <!-- task list end -->
        <div class="no-results">
          <h5>No Items Found</h5>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('vendor-scripts')
    <script src="{{asset('vendors/js/extensions/moment.min.js')}}"></script>
    <script src="{{asset('vendors/js/pickers/daterange/daterangepicker.js')}}"></script>
    <script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('vendors/js/editors/quill/quill.min.js')}}"></script>
    <script src="{{asset('vendors/js/extensions/dragula.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-todo.js')}}"></script>
<script src="{{asset('assets/js/tasksControl.js')}}"></script>
@endsection
