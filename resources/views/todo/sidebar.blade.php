@section('sidebar-content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="todo-sidebar d-flex" xmlns="http://www.w3.org/1999/html">
  <span class="sidebar-close-icon">
    <i class="bx bx-x"></i>
  </span>
  <!-- todo app menu -->
  <div class="todo-app-menu">
    <div class="form-group text-center add-task">
      <!-- new task button -->
      @can('tasks-create')
      <button type="button" class="btn btn-primary add-task-btn btn-block my-1">
        <i class="bx bx-plus"></i>
        <span>Новая задача</span>
      </button>
      @endcan
    </div>
    <!-- sidebar list start -->
    <div class="sidebar-menu-list">
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0 active" data-filter="all" data-val="all">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: list.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent;"></i>
          </span>
          <span> Все</span>
        </a>
      </div>
      <label class="filter-label mt-2 mb-1 pt-25">Фильтры</label>
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0" data-filter="favorite"  data-val="filter">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: star.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Отмеченные</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0" data-filter="status"  data-val="filter">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: check.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Выполненные</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0 d-none" data-filter="removed"  data-val="filter">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Удаленные</span>
        </a>
      </div>
      <label class="filter-label mt-2 mb-1 pt-25">Теги</label>
      <div class="list-group">
        @foreach ($tags ?? '' as $i => $tag)
            <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between" data-tag="{{ $tag->id }}" data-val="tag">
              <span>{{ $tag->tag }}</span>
              <span class="bullet bullet-sm" style="background-color: {{ $tag->tag_color }}"></span>
            </a>
        @endforeach
      </div>
      <label class="filter-label mt-2 mb-1 pt-25">От рекламодателя</label>
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between" data-reklama="reklama" data-val="reklama">
          <span>От рекламодателя</span>
        </a>
      </div>
    </div>
    <!-- sidebar list end -->
  </div>
</div>
<!-- todo new task sidebar -->
<div class="todo-new-task-sidebar">
  <div class="card shadow-none p-0 m-0">
    <div class="card-header border-bottom py-75">
      <div class="task-header d-flex justify-content-between align-items-center w-100">
        <h5 class="new-task-title mb-0">Новая задача</h5>
        <button class="mark-complete-btn btn btn-light-primary btn-sm" data-id="">
          <i class="bx bx-check align-middle"></i>
          <span class="mark-complete align-middle">Отметить выполненным</span>
        </button>
      </div>
      <button type="button" class="close close-icon">
        <i class="bx bx-x"></i>
      </button>
    </div>
    <!-- form start -->
    <form id="tasksCreate" class="mt-1"  method="delete">
        @csrf
      <div class="card-body py-0 border-bottom">
        <div class="form-group">
          <!-- text area for task title -->
          <textarea class="form-control task-title" cols="1" rows="2" name="task-name" placeholder="Write a Task Name"
            required>
          </textarea>
        </div>
        <div class="assigned d-flex justify-content-between">
          <div class="form-group d-flex align-items-center mr-1">
            <!-- select2  for user name  -->
            <div class="select-box mr-1">
              <select class="form-control" id="select2-users-name" 
                  @can ('tasks-create') '' 
                  @else disabled 
                  @endcan>
                @foreach ($users ?? '' as $i => $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
              </select>
              
            </div>
          </div>
          <div class="form-group d-flex align-items-center position-relative">
            <!-- date picker -->
            <div class="date-icon mr-50">
              <button type="button" class="btn btn-icon btn-outline-secondary round">
                <i class='bx bx-calendar-alt'></i>
              </button>
            </div>
            <div class="date-picker">
              <input type="text" class="pickadate form-control px-0" name="date_todo" placeholder="Due Date"
                  @can ('tasks-create') '' 
                  @else disabled 
                  @endcan>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body border-bottom task-description">
        <!--  Quill editor for task description -->
        <div class="comment-task snow-container border rounded p-50">
          <div class="compose-editor mx-75"></div>
          <div class="d-flex justify-content-end">
            <div class="compose-quill-toolbar pb-0">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
          </div>
        </div>
        <div class="tag d-flex justify-content-between align-items-center pt-1">
          <div class="flex-grow-1 d-flex align-items-center">
            <i class="bx bx-tag align-middle mr-25"></i>
            <select class="form-control" id="select2-assign-label"
                @can ('tasks-create') '' 
                @else disabled 
                @endcan>
              @foreach ($tags ?? '' as $i => $tag)
                  <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="card-body pb-1">
        <div class="d-flex align-items-center mb-1">
          <div class="avatar mr-75">
            <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="Grou" width="38" height="38" style="display: none">
          </div>
          <div class="avatar-content">

          </div>
          <small class="ml-75 text-muted" id="dateCreate"></small>
        </div>
        <div class="comment-task snow-container border rounded p-50 ">
          <div class="comment-editor mx-75"></div>
          <div class="d-flex justify-content-end">
            <div class="comment-quill-toolbar pb-0">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
            <button type="button" class="btn btn-sm btn-primary comment-btn" id="addComment">
              <span>Комментировть</span>
            </button>
          </div>
        </div>
        <div class="comment-comments"></div>
        <div class="comment-wrap"></div>
        <div class="form-group">
          <label>От рекламодателя</label>
          <input type="checkbox" name="from_advertisers" id="from_advertisers" value="from_advertisers">
        </div>
        <div class="mt-1 d-flex justify-content-end">
          @can ('tasks-create')
            <button type="button" class="btn btn-primary add-todo" id="taskFormSend">Добавить задачу</button>
          @endcan
          <button type="button" class="btn btn-primary update-todo" id="taskFormUpdate" data-id="">Сохранить изменения</button>
        </div>
      </div>
    </form>
    <div class="responce-result"></div>
    <!-- form start end-->
  </div>
</div>
@endsection
