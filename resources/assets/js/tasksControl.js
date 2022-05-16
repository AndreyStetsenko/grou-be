(function(window, undefined) {
    'use strict';

    const todoTaskListWrapper = $(".todo-task-list-wrapper"),
        todoNewTasksidebar = $(".todo-new-task-sidebar"),
        appContentOverlay = $(".app-content-overlay"),
        selectAssignLable = $(".select2-assign-label"),
        liTodoItem = $('li.todo-item');

    const siteUrl = window.location.protocol + "//" + window.location.host + "/";

    const headers = $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var optionsDate = {
        day: 'numeric',
        month: 'numeric',
        year: 'numeric'
    }

    var optionsTime = {
        hour: 'numeric',
        minute: 'numeric'
    }
    
    function getDate(str) {
        var date = new Date(str);
        return date.toLocaleString('ru', optionsDate)
    }

    function getTime(str) {
        var time = new Date(str);
        return time.toLocaleString('ru', optionsTime);
    }

    // Открыть таску если есть url
    function openTaskWithUrl(item) {

        $('.todo-new-task-sidebar #taskFormSend').hide();

        const taskId = $(item).attr('data-id');

        $.ajax({
            type: 'get',
            url: 'tasks/view',
            data: {
                id: taskId
            },
            success: (response) => {
                var resp = response.responseTask;
                var userAvatar = resp.userAvatar ? siteUrl + 'images/profile/user-uploads/' + resp.userAvatar : siteUrl + 'images/portrait/default.png';

                console.log(resp.from_advertisers);
                $('.new-task-title').remove();
                $('#tasksCreate .form-control.task-title').val(resp.title);
                $('#tasksCreate').attr('data-id', resp.taskId);
                $('#tasksCreate #select2-users-name').val(resp.userId);
                $('#tasksCreate #select2-assign-label').val(resp.tagId);
                $('#tasksCreate .task-description .ql-editor p').html(resp.description);
                $('#tasksCreate .avatar img').attr('src', userAvatar).show();
                $('#tasksCreate .avatar-content').html('@' + resp.userLogin + ' создал задачу');
                $("#tasksCreate input[name='date_todo']").val(resp.date_todo);
                $("#tasksCreate #from_advertisers").attr('checked', resp.from_advertisers);
                $("#taskFormUpdate").attr('data-id', resp.taskId);
                $(".mark-complete-btn").attr('data-id', resp.taskId);
                $('#addComment').attr('data-id', resp.taskId);
                $('#tasksCreate .comment-comments').html('');

                resp.comments.forEach((el) => {
                    var a = new Date(el.created_at);

                    $('#tasksCreate .comment-comments').append(`
                    <div class="comment_item">
                        <span class="comment_item-username">${el.user_name}</span>
                        <span class="comment_item-date">${getDate(a)} <b>${getTime(a)}</b></span>
                        <span class="comment_item-cont">${el.comment}</span>
                    </div>`);
                });
            },
            error: function(response) {
                console.log('Error');
                console.log(response);
            }
        });
    }

    var getUrlParams = (function() {
        var a = window.location.search;
        var b = new Object();
        var c = '';
        a = a.substring(1).split("&");
        for (var i = 0; i < a.length; i++) {
          c = a[i].split("=");
            b[c[0]] = c[1];
        }
        return b;
    })();

    document.addEventListener("DOMContentLoaded", function() {

        setTimeout( () => {
            if (getUrlParams.task_id) {
                const liTodoItemWithId = $('li.todo-item[data-id="' + getUrlParams.task_id + '"]');
                liTodoItemWithId.trigger('click');
            }
        }, 500);
    
    });

    $("#tasksCreate #taskFormSend").on('click', function(e) {

        headers;
        e.preventDefault();

        var title = $("#tasksCreate textarea[name='task-name']").val();
        var description = $("#tasksCreate .compose-editor p").html();
        var userDev = $("#tasksCreate #select2-users-name").val();
        var tag = $("#tasksCreate #select2-assign-label").val();
        var dateCreate = $("#tasksCreate input[name='date_todo']").val();
        var from_advertisers = $("#tasksCreate input[name='from_advertisers']").prop('checked');

        $.ajax({
            type: 'post',
            url: "tasks/create",
            data: {
                title: title,
                description: description,
                status: 0,
                userDev: userDev,
                tag: tag,
                date_todo: dateCreate,
                from_advertisers
            },
            success: (response) => {
                console.log(userDev);
                var resp = response.responseTask;
                var userAvatar = resp.userAvatar ? siteUrl + 'images/profile/user-uploads/' + resp.userAvatar : siteUrl + 'images/portrait/default.png';

                todoTaskListWrapper.append(
                    '<li class="todo-item" data-id="' + resp.taskId + '" data-name="' + resp.userName + '">' +
                    '<div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">' +
                    '<div class="todo-title-area d-flex">' +
                    '<i class="bx bx-grid-vertical handle"></i>' +
                    '<div class="checkbox">' +
                    '<input type="checkbox" class="checkbox-input" data-id="' + resp.taskId + '" id="task_' + resp.taskId + '">' +
                    '<label for="task_' + resp.taskId + '"></label>' +
                    '</div>' +
                    '<p class="todo-title mx-50 m-0 truncate">' + resp.title + '</p>' +
                    '</div>' +
                    '<div class="todo-item-action d-flex align-items-center">' +
                    '<div class="todo-badge-wrapper d-flex">' +
                    '<span class="badge badge-light-primary badge-pill">' + resp.tag + '</span>' +
                    '</div>' +
                    '<div class="avatar ml-1">' +
                    '<img src="' + userAvatar + '" alt="' + resp.userName + '" height="30" width="30">' +
                    '</div>' +
                    '<a class="todo-item-favorite ml-75" data-id="' + resp.taskId + '">' +
                    '<i class="bx bx-star"></i>' +
                    '</a>' +
                    '<a class="todo-item-delete ml-75" data-id="' + resp.taskId + '"><i class="bx bx-trash"></i></a>' +
                    '</div>' +
                    '</div>' +
                    '</li>');
                todoNewTasksidebar.removeClass('show');
                appContentOverlay.removeClass('show');
                selectAssignLable.attr("disabled", "true");
            },
            error: function(response) {
                // $('.responce-result').html('Ошибка');
                console.log(userDev);
                console.log(response);
                $('.alert-danger').slideDown().html('Ошибка создания задачи');
                setTimeout(function() {
                    $('.alert-success').slideUp();
                    $('.alert-danger').slideUp();
                }, 4000);
            }
        });
    });

    $("#tasksCreate").on('click', '#taskFormUpdate', function(e) {

        headers;
        e.preventDefault();

        var taskId = $(this).attr('data-id');
        var taskItem = $('#todo-task-list-drag').find('li.todo-item[data-id="' + taskId + '"]');
        var title = $("#tasksCreate .task-title").val();
        var description = $("#tasksCreate .compose-editor p").html();
        var userDev = $("#tasksCreate #select2-users-name").val();
        var tag = $("#tasksCreate #select2-assign-label").val();
        var dateCreate = $("#tasksCreate input[name='date_todo']").val();
        var from_advertisers = $("#tasksCreate #from_advertisers").prop('checked');

        $.ajax({
            type: 'post',
            url: "tasks/update",
            data: {
                id: taskId,
                title: title,
                description: description,
                userDev: userDev,
                tag: tag,
                date_todo: dateCreate,
                from_advertisers
            },
            success: (response) => {
                var resp = response.responseTask;
                var userAvatar = resp.userAvatar ? siteUrl + 'images/profile/user-uploads/' + resp.userAvatar : siteUrl + 'images/portrait/default.png';

                taskItem.find('.todo-title').html(resp.title);
                taskItem.find('.avatar img').attr('src', userAvatar);
                taskItem.find('.badge-pill').html(resp.tagId);

                todoNewTasksidebar.removeClass('show');
                appContentOverlay.removeClass('show');
                selectAssignLable.attr("disabled", "true");
            },
            error: function(response) {
                console.log(response);
                $('.alert-danger').slideDown().html('Ошибка создания задачи');
                setTimeout(function() {
                    $('.alert-success').slideUp();
                    $('.alert-danger').slideUp();
                }, 4000);
            }
        });
    });

    $('#todo-task-list-drag').on('click', '.todo-item-delete', function(e) {

        headers;
        e.preventDefault();

        var taskId = $(this).attr('data-id');

        $.ajax({
            type: 'delete',
            url: 'tasks/destroy',
            data: {
                id: taskId
            },
            success: (response) => {},
            error: function(response) {
                console.log(response);
            }
        });
    });

    $('#todo-task-list-drag').on('click', '.todo-item-favorite', function(e) {

        headers;
        e.preventDefault();

        var taskId = $(this).attr('data-id');
        var favorite = '';

        if ($(this).hasClass('warning')) {
            favorite = 0;
        } else {
            favorite = 1;
        }

        $.ajax({
            type: 'delete',
            url: 'tasks/favorite',
            data: {
                id: taskId,
                favorite: favorite
            },
            success: (response) => {},
            error: function(response) {
                console.log('No');
                console.log(response);
            }
        });
    });

    $('#todo-task-list-drag').on('click', 'li.todo-item label', function(e) {

        headers;
        e.preventDefault();

        const taskItem = $(this).parent().parent().parent().parent();
        const taskId = $(taskItem).attr('data-id');
        var statusComplete = '';

        if ($(taskItem).hasClass('completed')) {
            statusComplete = 0;
        } else {
            statusComplete = 1;
        }

        $.ajax({
            type: 'post',
            url: 'tasks/status',
            data: {
                id: taskId,
                status: statusComplete
            },
            success: (response) => {
                if (statusComplete == 0) {
                    $(taskItem).removeClass('completed');
                    $(taskItem).find('input').attr('checked', false);
                } else {
                    $(taskItem).addClass('completed');
                    $(taskItem).find('input').attr('checked', true);
                }
            },
            error: function(response) {
                console.log('Error');
                console.log(response);
            }
        });

    });

    $('.todo-new-task-sidebar').on('click', '.mark-complete-btn', function(e) {

        headers;
        e.preventDefault();

        const taskId = $(this).attr('data-id');
        const taskItem = $('#todo-task-list-drag').find('li.todo-item[data-id="' + taskId + '"]');
        var statusComplete = '';

        if ($(taskItem).hasClass('completed')) {
            statusComplete = 1;
        } else {
            statusComplete = 0;
        }

        $.ajax({
            type: 'post',
            url: 'tasks/status',
            data: {
                id: taskId,
                status: statusComplete
            },
            success: (response) => {
                if (statusComplete == 0) {
                    $(taskItem).removeClass('completed');
                    $(taskItem).find('input').attr('checked', false);
                } else {
                    $(taskItem).addClass('completed');
                    $(taskItem).find('input').attr('checked', true);
                }
            },
            error: function(response) {
                console.log('Error');
                console.log(response);
            }
        });

    });

    $('#todo-task-list-drag').on('click', 'li.todo-item', function(e) {

        headers;
        e.preventDefault();

        const taskId = $(this).attr('data-id');

        $.ajax({
            type: 'get',
            url: 'tasks/view',
            data: {
                id: taskId
            },
            success: (response) => {
                var resp = response.responseTask;
                var userAvatar = resp.userAvatar ? siteUrl + 'images/profile/user-uploads/' + resp.userAvatar : siteUrl + 'images/portrait/default.png';

                // console.log(response);

                $('#tasksCreate .form-control task-title').val(resp.title);
                $('#tasksCreate').attr('data-id', resp.taskId);
                $('#tasksCreate #select2-users-name').val(resp.userId);
                $('#tasksCreate #select2-assign-label').val(resp.tagId);
                $('#tasksCreate .task-description .ql-editor p').html(resp.description);
                $('#tasksCreate .avatar img').attr('src', userAvatar).show();
                $('#tasksCreate .avatar-content').html('@' + resp.userLogin + ' создал задачу');
                $("#tasksCreate input[name='date_todo']").val(resp.date_todo);
                $("#tasksCreate #from_advertisers").attr('checked', resp.from_advertisers);
                $("#taskFormUpdate").attr('data-id', resp.taskId);
                $(".mark-complete-btn").attr('data-id', resp.taskId);
                $('#addComment').attr('data-id', resp.taskId);
                $('#tasksCreate .comment-comments').html('');

                resp.comments.forEach((el) => {
                    var a = new Date(el.created_at);

                    $('#tasksCreate .comment-comments').append(`
                    <div class="comment_item">
                        <span class="comment_item-username">${el.user_name}</span>
                        <span class="comment_item-date">${getDate(a)} <b>${getTime(a)}</b></span>
                        <span class="comment_item-cont">${el.comment}</span>
                    </div>`);
                });
            },
            error: function(response) {
                console.log('Error');
                console.log(response);
            }
        });
    });

    // Filter

    $('.sidebar-menu-list').on('click', '.list-group-item', function(e) {

        headers;
        e.preventDefault();

        var dataFilter = $(this).attr('data-filter');
        var dataTag = $(this).attr('data-tag');
        var dataAll = $(this).attr('data-all');
        var filter = $(this).attr('data-val');

        $.ajax({
            type: 'get',
            url: 'tasks',
            data: {
                filter: dataFilter,
                tag: dataTag,
                all: dataAll,
                val: filter
            },
            success: (response) => {
                $('li.todo-item').slideUp();

                for (var i in response) {

                    var userAvatar = response[i].userAvatar ? siteUrl + 'images/profile/user-uploads/' + response[i].userAvatar : siteUrl + 'images/portrait/default.png';
                    var liStatus = response[i].status == 1 ? 'completed' : '';
                    var inpStatus = response[i].status == 1 ? 'checked' : '';
                    var starFavoriteOne = response[i].favorite == 1 ? 'warning' : '';
                    var starFavoriteTwo = response[i].favorite == 1 ? 'bxs-star' : '';

                    todoTaskListWrapper.append(
                        '<li class="todo-item ' + liStatus + '" data-id="' + response[i].taskId + '" data-name="' + response[i].userName + '">' +
                        '<div class="todo-title-wrapper d-flex justify-content-sm-between justify-content-end align-items-center">' +
                        '<div class="todo-title-area d-flex">' +
                        '<i class="bx bx-grid-vertical handle"></i>' +
                        '<div class="checkbox">' +
                        '<input type="checkbox" class="checkbox-input" data-id="' + response[i].taskId + '" id="task_' + response[i].taskId + '" ' + inpStatus + '>' +
                        '<label for="task_' + response[i].taskId + '"></label>' +
                        '</div>' +
                        '<p class="todo-title mx-50 m-0 truncate">' + response[i].title + '</p>' +
                        '</div>' +
                        '<div class="todo-item-action d-flex align-items-center">' +
                        '<div class="todo-badge-wrapper d-flex">' +
                        '<span class="badge badge-light-primary badge-pill">' + response[i].tag + '</span>' +
                        '</div>' +
                        '<div class="avatar ml-1">' +
                        '<img src="' + userAvatar + '" alt="' + response[i].userName + '" height="30" width="30">' +
                        '</div>' +
                        '<a class="todo-item-favorite ml-75 ' + starFavoriteOne + '" data-id="' + response[i].taskId + '">' +
                        '<i class="bx bx-star ' + starFavoriteTwo + '"></i>' +
                        '</a>' +
                        '<a class="todo-item-delete ml-75" data-id="' + response[i].taskId + '"><i class="bx bx-trash"></i></a>' +
                        '</div>' +
                        '</div>' +
                        '</li>');
                }
            },
            error: function(response) {
                console.log('No');
                console.log(response);
            }
        });
    });

    // New Task

    $('.add-task-btn').on('click', function() {

        $('#tasksCreate .comment-task').hide();
        $('#tasksCreate .avatar img').hide();
        $('#tasksCreate .avatar-content').hide();
    });

    $('#tasksCreate').on('click', '#addComment', function(e) {

        headers;
        e.preventDefault();

        var comment = $('.comment-editor .ql-editor p').html();
        var commentWrap = $('.comment-comments');
        var tasksId = $(this).attr('data-id');

        console.log(comment, tasksId);

        $.ajax({
            type: 'post',
            url: 'tasks/addcomment',
            data: {
                comment: comment,
                tasksId
            },
            success: (response) => {
                var a = new Date;
                
                $('.comment-editor .ql-editor p').html('')

                commentWrap.prepend(`
                <div class="comment_item">
                    <span class="comment_item-username">${response.response.userName}</span>
                    <span class="comment_item-date">${getDate(a)} <b>${getTime(a)}</b></span>
                    <span class="comment_item-cont">${response.response.comment}</span>
                </div>`);
                console.log(response);
            },
            error: function(response) {
                console.log('No');
                console.log(response);
            }
        });
    });

})(window);