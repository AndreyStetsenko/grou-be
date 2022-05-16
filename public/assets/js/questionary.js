// class quest {
//   constructor() {
//     this.settings();
//     this.bindEvents();
//   }
//   settings() {
//     this.formQuest = document.getElementById('user_profile_at_registration');
//     this.person_aim = document.getElementsByName('person_aim');
//     this.main_chanels = document.getElementsByName('main_chanels');
//   }
//   bindEvents() {

//   }
// }

// new quest();

// (function(window, undefined) {
//   'use strict';

//   const formQuest = document.getElementById('user_profile_at_registration');
//   const person_aim = document.getElementsByName('person_aim');
//   const main_chanels = document.getElementsByName('main_chanels');
//   const btnSend = document.querySelector('a[href="#finish"]');

//   var headers = $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//   });

//   $(btnSend).on('click', (e) => {
//     headers;
//     e.preventDefault;

//     $.ajax({
//       type: 'post',
//       url: 'questionary/store',
//       data: {
//         person_aim: person_aim,
//         main_chanels: main_chanels
//       },
//       // success: (response) => {
//       //   console.log(response)

//       // },
//       // error: (response) => {
//       //   console.log(response);
//       // }
//     });
//   });

// })(window);


(function(window, undefined) {
  'use strict';

  var headers = $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });

    $('a[href="#finish"]').on('click', function(e) {
        headers;
        e.preventDefault();

        const formQuest = document.getElementById('user_profile_at_registration');
        const person_aim = $('[name="person_aim"]').val();
        const main_chanels = $('[name="main_chanels"]').val();
        const btnSend = document.querySelector('a[href="#finish"]');

        console.log(person_aim, main_chanels.toString());

        $.ajax({
            type: 'post',
            url: 'questionary/store',
            data: {
                person_aim,
                main_chanels
            },
            success: (response) => {
                console.log(response);
                document.location.href = '/dashboard';
            },
            error: function(response) {
                console.log('No');
                console.log(response);
            }
        });
    });

})(window);