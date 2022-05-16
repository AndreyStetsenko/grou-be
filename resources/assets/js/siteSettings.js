var tag_list = $('#tag_list');

$(document).ready(function () {
  // form repeater jquery
  $('.tags-repeater').repeater({
    show: function () {
      $(this).slideDown();
    },
    hide: function (deleteElement) {
      if (confirm('Are you sure you want to delete this element?')) {
        $(this).slideUp(deleteElement);
      }
    }
  });

});

var headers = $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#tagsCreate').on('click', function(e) {
    var tag_name = $('#tag_name').val();
    var tag_color = $('#tag_color').val();
    console.log(tag_color, tag_name);
    headers;

    e.preventDefault();

    $.ajax({
        type: 'post',
        url: 'settings/tag-create',
        data: {
          tag: tag_name,
          tag_color: tag_color
        },
        success: function(response) {
            var resp = response.responseTask;

            tag_list.append(
              '<div class="row tags-repeater-item" data-repeater-id="' + resp.id + '" data-repeater-item>' +
              '<div class="col-md-7 col-12 form-group d-flex align-items-center">' +
                '<input type="text" class="form-control title" name="tag" placeholder="Название тега" value="' + resp.tag + '">' +
              '</div>' +
              '<div class="col-md-4 col-12 form-group">' +
                '<input type="color" class="form-control color form-control-color" name="tag_color" placeholder="Цвет тега" value="' + resp.tag_color + '">' +
              '</div>' +
              '<div class="col-md-1 col-12 form-group">' +
                '<button class="btn btn-icon btn-danger rounded-circle tag-destroy" type="button" data-id="' + resp.id + '" data-repeater-delete>' +
                  '<i class="bx bx-x"></i>' +
                '</button>' +
              '</div>' +
            '</div>'
            );

            tag_name = '';
            tag_color = '';
        },
        error: function(response) {
            console.log(response);
        }
    });
});

$(tag_list).on('click', '.tag-destroy', function(e) {
  var id = $(this).data('id');

  headers;

  e.preventDefault();

  $.ajax({
      type: 'delete',
      url: 'settings/tag-destroy',
      data: {
        id: id
      },
      success: function(response) {
          console.log(response);
      },
      error: function(response) {
          console.log(response);
      }
  });
});