var headers = $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#dashboardTasksUsers').on('click', '.dropdown-item', function(e) {

    var userId = $(this).attr('data-id');
    var btnText = $(this).html();

    headers;

    e.preventDefault();

    $.ajax({
        type: 'get',
        url: 'dashboard/d/tasks-list',
        data: {
            userId: userId
        },
        success: (response) => {

          console.log(response);

            $('#dashboardTasksList').html('');
            $('#dropdownMenuButtonSec').html(btnText);

            if (response.length == 1) {

              for( var i in response ) {
                $('#dashboardTasksList').append(
                  '<li class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">' +
                    '<div class="list-left d-flex">' +
                      '<div class="list-icon mr-1">' +
                        '<div class="avatar bg-rgba-' + (response[i].status == 1 ? 'success' : 'primary') + ' m-0">' +
                          '<div class="avatar-content">' +
                            '<i class="bx bx-' + (response[i].status == 1 ? 'check text-success' : 'play text-primary') + ' font-size-base"></i>' +
                          '</div>' +
                        '</div>' +
                      '</div>' +
                      '<div class="list-content">' +
                        '<span class="list-title">' + response[i].title + '</span>' +
                        '<small class="text-muted d-block">' + response[i].date_todo + '</small>' +
                      '</div>' +
                    '</div>' +
                    '<small>' + response[i].tag + '</small>' +
                  '</li>');
              }

            } else {
              
              $('#dashboardTasksList').append(`<li class="w-100">
                  <div class="w-100 text-center">
                    Задач нет
                  </div>
                </li>`);
            }
        },
        error: function(response) {
            console.log('No');
            console.log(response);
        }
    });
});