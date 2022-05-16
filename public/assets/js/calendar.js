$(document).ready(function () {
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const monthNames = ['Январь','Февраль','Март','Апрель','Март','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'];
const dayNames = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
const dayNamesShort = ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'];

const addEventModal = $('#addEventModal');
const viewEventModal = $('#viewEventModal');

$('.disableNewEvent').on('click', () => {
  $('.modal').modal('hide');
});

var calendar = $('#calendar').fullCalendar({
      events: "/dashboard/calendar",
      lang: 'ru',
      firstDay: 1,
      displayEventTime: false,
      editable: false,
      monthNames,
      dayNames,
      dayNamesShort,
      eventBackgroundColor: 'green',
      eventLimit: true,
      eventLimitText: function (numEvents) {
        return 'показать еще ' + numEvents;
      },
      views: {
        timeGrid: {
          dayMaxEventRows: 3
        },
        month: {
          eventLimit: 5
        }
      },
      customButtons: {
        customDeleteEvent: {
          text: 'custom!',
          click: function() {
            alert('clicked the custom button!');
          }
        }
      },
      moreLinkClick: 'popover',
      eventRender: function (event, element, view) {
          if (event.allDay === 'false') {
                  event.allDay = true;
          } else {
                  event.allDay = false;
          }
      },
      selectable: true,
      selectHelper: true,
      select: function (start, end, allDay) {
          
          addEventModal.modal('show');
          $('input[name="start"]').val($.fullCalendar.formatDate(start, "Y-MM-DD"));
          $('input[name="end"]').val($.fullCalendar.formatDate(end, "Y-MM-DD"));

          $('#addNewEvent').on('click', () => {
            var title = $('input[name="title"]').val();
            var start = $('input[name="start"]').val();
            var end = $('input[name="end"]').val();

            $.ajax({
                url: "/dashboard/calendarAjax",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    type: 'add'
                },
                type: "POST",
                success: function (data) {
                    displayMessage("Event Created Successfully");

                    $('.modal-backdrop').remove();
                    addEventModal.removeClass('show').attr('aria-modal', false).attr('aria-hidden', true).hide();

                    calendar.fullCalendar('renderEvent',
                        {
                            id: data.id,
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },true);

                    calendar.fullCalendar('unselect');
                }
            });
          });
      },
      eventDrop: function (event, delta) {
          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

          $.ajax({
              url: '/dashboard/calendarAjax',
              data: {
                  title: event.title,
                  start: start,
                  end: end,
                  id: event.id,
                  type: 'update'
              },
              type: "POST",
              success: function (response) {
                  displayMessage("Event Updated Successfully");
              }
          });
      },
      // eventRender: function (event, element) {
      //   $('#removeThisEvent').on('click', () => {
      //     $.ajax({
      //       type: "POST",
      //       url: '/dashboard/calendarAjax',
      //       data: {
      //               id: event.id,
      //               type: 'delete'
      //       },
      //       success: function (response) {
      //           calendar.fullCalendar('removeEvents', event.id);
      //           displayMessage("Event Deleted Successfully");
      //       }
      //   });
      //   });
      // },
      // eventClick: function (event) {
      //     var deleteMsg = confirm("Do you really want to delete?");
      //     if (deleteMsg) {
      //         $.ajax({
      //             type: "POST",
      //             url: '/dashboard/calendarAjax',
      //             data: {
      //                     id: event.id,
      //                     type: 'delete'
      //             },
      //             success: function (response) {
      //                 calendar.fullCalendar('removeEvents', event.id);
      //                 displayMessage("Event Deleted Successfully");
      //             }
      //         });
      //     }
      // }

      eventClick: (event) => {

        // $('#removeThisEvent').on('click', () => {
        //   const eventId = $('#eventId').val();
        
        //   $.ajax({
        //     type: "POST",
        //     url: '/dashboard/calendarAjax',
        //     data: {
        //             id: eventId,
        //             type: 'delete'
        //     },
        //     success: function (response) {
        //         calendar.fullCalendar('removeEvents', eventId);
        //         displayMessage("Event Deleted Successfully");
        //     }
        //   });
        // });
        
        $.ajax({
          type: 'POST',
          url: '/dashboard/calendarAjax',
          data: {
            id: event.id,
          },
          success: () => {
            // $('body').append(`<div class="modal-backdrop fade show"></div>`);
            viewEventModal.modal('show');
            // viewEventModal.addClass('show').attr('aria-modal', true).attr('aria-hidden', false).show();

            $('#eventId').val(event.id);
            $('#eventTitle').val(event.title);
            $('#eventDateStart').val(event.start._i);
            $('#eventDateEnd').val(event.end._i);
          }
        });
      },

      // dayClick: (day, jsEvent, view) => {
      //   addEventModal.modal();
      // }

  });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
}