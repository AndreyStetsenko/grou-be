@extends('layouts.contentLayoutMaster')
{{-- page Title --}}
@section('title','Dashboard E-commerce')
{{-- vendor css --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/charts/apexcharts.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/extensions/swiper.min.css')}}">
@endsection
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/widgets.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-ecommerce.css')}}">
@endsection

@section('content')
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row">

    <div class="col-8">
      <div class="card widget-todo">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap">
          <h4 class="card-title d-flex mb-25 mb-sm-0">
            <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Задачи
          </h4>
          {{-- <ul class="list-inline d-flex mb-25 mb-sm-0">
            <li class="d-flex align-items-center">
              <i class='bx bx-filter font-medium-3 mr-50'></i>
              <div class="dropdown">
                <div class="dropdown-toggle mr-1 cursor-pointer" role="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Фильтр</div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="javascript:void(0);">My Tasks</a>
                  <a class="dropdown-item" href="javascript:void(0);">Due this week</a>
                  <a class="dropdown-item" href="javascript:void(0);">Due next week</a>
                  <a class="dropdown-item" href="javascript:void(0);">Custom Filter</a>
                </div>
              </div>
            </li>
            <li class="d-flex align-items-center">
              <i class='bx bx-sort mr-50 font-medium-3'></i>
              <div class="dropdown">
                <div class="dropdown-toggle cursor-pointer" role="button" id="dropdownMenuButton2"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Сортировка</div>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">
                  <a class="dropdown-item" href="javascript:void(0);">None</a>
                  <a class="dropdown-item" href="javascript:void(0);">Alphabetical</a>
                  <a class="dropdown-item" href="javascript:void(0);">Due Date</a>
                  <a class="dropdown-item" href="javascript:void(0);">Assignee</a>
                </div>
              </div>
            </li>
          </ul> --}}
        </div>
        <div class="card-body px-0 py-1">
          <ul class="widget-todo-list-wrapper mh-100" id="widget-todo-list">
            @if (count($tasks) >= 1)
            @foreach ($tasks as $key => $task)
            <li class="widget-todo-item">
              <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                <div class="widget-todo-title-area d-flex align-items-center">
                  <i class="bx bx-dots-vertical-rounded font-medium-3" style="opacity: 0"></i>
                  <div class="checkbox checkbox-shadow">
                    <input type="checkbox" class="checkbox__input" id="taskId-{{ $task->id }}" 
                    {{ $task->status == '1' ? 'checked' : '' }} disabled>
                    <label for="taskId-{{ $task->id }}"></label>
                  </div>
                  <span class="widget-todo-title ml-50">{{ $task->title ? $task->title : '-' }}</span>
                </div>
                <div class="widget-todo-item-action d-flex align-items-center">
                  <div class="badge badge-pill mr-1" style="background-color: {{ $task->tags->tag_color }}">
                    {{ $task->tag_id ? $task->tags->tag : '' }}
                  </div>
                  <div class="avatar m-0 mr-50">
                    <img src="{{ $task->user->avatar ? asset('images/profile/user-uploads/' . $task->user->avatar) : asset('images/portrait/default.png') }}" alt="img placeholder"
                      height="32" width="32">
                  </div>
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="{{ route('tasks-list') . '?task_id=' . $task->id }}">Открыть детали</a>
                      <a class="dropdown-item" href="javascript:void(0);">Удалить задачу</a>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            @endforeach
            @else
            <li class="w-100">
              <div class="w-100 text-center">
                Задач нет
              </div>
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>

    <div class="col-md-4 col-12">
      <div class="row">
        <div class="col-12">
          <div class="card widget-todo">
            <div class="card-header border-bottom d-flex justify-content-between align-items-center flex-wrap">
              <h4 class="card-title d-flex mb-25 mb-sm-0">
                <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>От Рекламодателя
              </h4>
            </div>
            <div class="card-body px-0 py-1">
              <ul class="widget-todo-list-wrapper mh-100" id="widget-todo-list">
                @if (count($tasks) >= 1)
                @foreach ($tasks as $key => $task)
                @if ($task->from_advertisers == 'true')
                <li class="widget-todo-item">
                  <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                    <div class="widget-todo-title-area d-flex align-items-center">
                      <i class="bx bx-dots-vertical-rounded font-medium-3" style="opacity: 0"></i>
                      <div class="checkbox checkbox-shadow">
                        <input type="checkbox" class="checkbox__input" id="taskId-{{ $task->id }}" 
                        {{ $task->status == '1' ? 'checked' : '' }} disabled>
                        <label for="taskId-{{ $task->id }}"></label>
                      </div>
                      <span class="widget-todo-title ml-50">{{ $task->title ? $task->title : '-' }}</span>
                    </div>
                    <div class="widget-todo-item-action d-flex align-items-center">
                      <div class="avatar m-0 mr-50">
                        <img src="{{ $task->user->avatar ? asset('images/profile/user-uploads/' . $task->user->avatar) : asset('images/portrait/default.png') }}" alt="img placeholder"
                          height="32" width="32">
                      </div>
                      <div class="dropdown">
                        <span
                          class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer icon-light"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="{{ route('tasks-list') . '?task_id=' . $task->id }}">Открыть детали</a>
                          <a class="dropdown-item" href="javascript:void(0);">Удалить задачу</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                @endif
                @endforeach
                @else
                <li class="w-100">
                  <div class="w-100 text-center">
                    Задач нет
                  </div>
                </li>
                @endif
              </ul>
            </div>
          </div>
        </div>
    
        <div class="col-12 dashboard-greetings">
          <div class="card">
            <div class="card-header">
              <h3 class="greeting-text">Привет {{ Auth::user()->name; }}!</h3>
              <p class="mb-0">@if (count($tasks) >= 1) У тебя {{ count($tasks) }} не закрытых задач @else Ура! У тебя нет задач! @endif</p>
            </div>
            <div class="card-body pt-0">
              <div class="d-flex justify-content-between align-items-end">
                <div class="dashboard-content-left">
                  <a href="{{ route('tasks-list') }}" type="button" class="btn btn-primary glow">Перейти к задачам</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
<!-- Dashboard Ecommerce ends -->
@endsection

@section('vendor-scripts')
@endsection

@section('page-scripts')
<script src="{{asset('assets/js/dashboardControl.js')}}"></script>
@endsection
