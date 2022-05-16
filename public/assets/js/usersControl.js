(function(window, undefined) {
  'use strict';

    $("#userEditProfile").on('submit', function(e){
        e.preventDefault();

        var userid = $("input[name='userid']").val();
        var login = $("input[name='login']").val();
        var name = $("input[name='name']").val();
        var email = $("input[name='email']").val();
        var role = $("select[name='roles[]']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault();

        $.ajax({
           type:'post',
           url: "/dashboard/users/update/" + userid,
            data: {
                id:userid,
                login: login,
                name: name,
                email: email,
                role: role
            },
            success: (response) => {
              if (response) {
                $('.alert-success').slideDown().html(response.message);
                setTimeout(function() {
                    $('.alert-success').slideUp();
                    $('.alert-danger').slideUp();
                }, 4000);
              }
            },
            error: function(response) {
                $('.alert-danger').slideDown().html('Ошибка обновления данных');
                setTimeout(function() {
                    $('.alert-success').slideUp();
                    $('.alert-danger').slideUp();
                }, 4000);
            }
        });
    });

})(window);