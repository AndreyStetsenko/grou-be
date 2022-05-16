(function(window, undefined) {
  'use strict';

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#userAvatarView').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#userAvatar").change(function () {
        readURL(this);
    });

    $('#userAvatarLink').click(function() {
        $('#userAvatar').click();
    });

})(window);