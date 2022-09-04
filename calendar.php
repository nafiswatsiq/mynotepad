<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="img/logo2.png">
    <!-- OG Tags Start -->
    <meta property="og:url" content="<?php echo $url;?>" />
    <meta property="og:title" content="N.notepad" />
    <meta property="og:image" content="img/logo2.png" />
    <meta property="og:description" content='Free Notepad online.'>
    <meta name="description" content='Free Notepad online la la la la la puf...'>
    <!-- OG Tags end -->
    <title>N.notepad</title>

    <!-- Bootstrap CSS -->
    <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/vendors/summernote/summernote-lite.min.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <script src="assets/vendors/Lottie/lottie-player.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/driver.js/dist/driver.min.css">
    <!-- calendar -->
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />
    <link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />
    <link rel="stylesheet" href="assets/css/calendar.css">
  </head>

<body id="bg-body" class="">
    <div class="loading-screen">
        <div class="main-loading">
            <div class="loading-content">
                <img src="img/Pulse-1.4s-200px.png" alt="loading">
                <p class="text-center">Saving...</p>
            </div>
        </div>
    </div>
    <section id="header">
        <nav class="navbar-dark bg-nav fixed-top shadow ">
            <div class="container-fluid">
                <div class="row color-white">
                    <div class="col-3 nav-left">
                        <a class="navbar-brand fw-bold nav-brand-text" href="#">
                            <img src="img/logo2.png" alt="" width="30" height="30"
                                class="d-inline-block align-text-top">
                            N.notepad
                        </a>
                    </div>
                    <div class="col-9 dropdown dropdown-share nav-right">
                        <a class="dropdown-toggle float-end" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="hello-name">Hello </span><?= $_SESSION['nama'] ?>!
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="proses/logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-user-circle-o" aria-hidden="true"></i> Account</a></li>
                            <li>
                                <div class="dropdown-item switch-dark">
                                    <div class="toggle">
                                        <input type="checkbox" name="darkMode" id="toggle5" value="off">
                                        <label for="toggle5">Dark mode</label>
                                    </div>
                                </div>
                            </li>
                            <script>
                                var Cdarkmode = '<?php echo $_COOKIE['darkmode']; ?>';
                                if(Cdarkmode == "on"){
                                    $('input[type=checkbox][name=darkMode]').attr("checked", "checked");
                                    $( "#bg-body" ).addClass( "dark-theme" );
                                    document.getElementById('toggle5').value = "on";
                                };
                            </script>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <section id="main-content">
        <div class="main-content">
            <div class="left-content">
                <script>
                    const mediaQuery = window.matchMedia('(max-width: 1000px)')
                    // Check if the media query is true
                    if (mediaQuery.matches) {
                        // Then trigger an alert
                        $( ".left-content" ).addClass( "left-close" );
                    }
                </script>
                <div class="row p-3 left-content-list gx-0">
                    <div class="col-12 mb-2">
                        <span class="text-my-note">My note.</span>
                    </div>
                    <div class="col-12 mb-3 cari-note">
                        <form id="cari_note">
                            <input type="search" name="cari" placeholder="Cari Note">
                            <button id="btn_cari">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                    <a href="calendar.php" class="col-12 text-decoration-none color-white mb-2">
                        <div class="list-title">
                            <span>Kalender</span>
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="./" class="col-12 text-decoration-none color-white mb-2">
                        <div class="list-title">
                            <!-- active-list -->
                            <span>New note</span>
                            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                        </div>
                    </a>
                    <div id="list_title">
                        <span class="color-white d-flex"><lottie-player src="img/loading.json"  background="transparent"  speed="1"  style="width: 25px; height: 25px;" loop autoplay></lottie-player>
                             <span class="ms-2">Sedang memuat...</span></span>
                    </div>
                </div>
                <div class="left-content-footer">
                    <div class="col-6">
                        <span>Nafis watsiq</span>
                    </div>
                    <div class="col-6 my-medsos">
                        <a href="/" class="text-decoration-none color-white float-end ms-2" title="Instagram">
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </a>
                        <a href="/" class="text-decoration-none color-white float-end ms-2" title="Telegram">
                            <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a>
                        <a href="/" class="text-decoration-none color-white float-end ms-2" title="Facebook">
                            <i class="fa fa-facebook-square" aria-hidden="true"></i>
                        </a>
                        <a href="/" class="text-decoration-none color-white float-end ms-2" title="Github">
                            <i class="fa fa-github" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="right-content">
                <!-- <form id="form" method="POST"> -->
                    <div class="row right-main-content g-0">
                        <div class="row g-0">
                            <div class="col-3">
                                <div class="menu-btn">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </div>

                            <div class="col-12 mt-3">
                              <div id="menu">
                                <span class="dropdown">
                                  <button id="dropdownMenu-calendarType" class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i id="calendarTypeIcon" class="calendar-icon ic_view_month" style="margin-right: 4px;"></i>
                                    <span id="calendarTypeName">Dropdown</span>&nbsp;
                                    <i class="calendar-icon tui-full-calendar-dropdown-arrow"></i>
                                  </button>
                                  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu-calendarType">

                                    <li role="presentation">
                                      <a class="dropdown-menu-title" role="menuitem" data-action="toggle-monthly">
                                        <i class="calendar-icon ic_view_month"></i>Month
                                      </a>
                                    </li> 

                                  </ul>
                                </span>
                                <span id="me  nu-navi">

                                  <button type="button" class="btn btn-default btn-sm move-day" data-action="move-prev">
                                    <i class="calendar-icon ic-arrow-line-left" data-action="move-prev"></i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-sm move-day" data-action="move-next">
                                    <i class="calendar-icon ic-arrow-line-right" data-action="move-next"></i>
                                  </button>
                                </span>
                                <span id="renderRange" class="render-range"></span>
                              </div>
                              <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid">
            <div class="row border-top border-1">
                <div class="footer mt-2">
                    <div class="col-12">
                        <ul>
                            <li class="title-made">© 2021 nafiswatsiq | Made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="#">Nafis watsiq</a></li>
                            <li class="title-made">Report <a href="#">error</a> or <a href="#">bugs</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/js/keySave.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.18/dist/sweetalert2.all.min.js"></script>

    <!-- calendar -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.13/chance.min.js"></script>

    <script src="https://uicdn.toast.com/tui.code-snippet/latest/tui-code-snippet.js"></script>
    <script src="https://uicdn.toast.com/tui.dom/v3.0.0/tui-dom.js"></script>
    <script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>
    <script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>

    <script>
    'use strict';

    var CalendarList = [];

    function CalendarInfo() {
      this.id = null;
      this.name = null;
      this.checked = true;
      this.color = null;
      this.bgColor = null;
      this.borderColor = null;
      this.dragBgColor = null;
    }

    function addCalendar(calendar) {
      CalendarList.push(calendar);
    }

    function findCalendar(id) {
      var found;

      CalendarList.forEach(function(calendar) {
        if (calendar.id === id) {
          found = calendar;
        }
      });

      return found || CalendarList[0];
    }

    function hexToRGBA(hex) {
      var radix = 16;
      var r = parseInt(hex.slice(1, 3), radix),
        g = parseInt(hex.slice(3, 5), radix),
        b = parseInt(hex.slice(5, 7), radix),
        a = parseInt(hex.slice(7, 9), radix) / 255 || 1;
      var rgba = 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';

      return rgba;
    }

    (function() {
      var calendar;
      var id = 0;

      calendar = new CalendarInfo();
      id += 1;
      calendar.id = String(id);
      calendar.name = 'Important';
      calendar.color = '#ffffff';
      calendar.bgColor = '#9e5fff';
      calendar.dragBgColor = '#9e5fff';
      calendar.borderColor = '#9e5fff';
      addCalendar(calendar);

      calendar = new CalendarInfo();
      id += 1;
      calendar.id = String(id);
      calendar.name = 'Optional';
      calendar.color = '#ffffff';
      calendar.bgColor = '#00a9ff';
      calendar.dragBgColor = '#00a9ff';
      calendar.borderColor = '#00a9ff';
      addCalendar(calendar);

      calendar = new CalendarInfo();
      id += 1;
      calendar.id = String(id);
      calendar.name = 'Compulsory';
      calendar.color = '#ffffff';
      calendar.bgColor = '#ff5583';
      calendar.dragBgColor = '#ff5583';
      calendar.borderColor = '#ff5583';
      addCalendar(calendar);
    })();



    (function(window, Calendar) {

      var cal, resizeThrottled;
      var useCreationPopup = true;
      var useDetailPopup = true;
      var datePicker, selectedCalendar;

      cal = new Calendar('#calendar', {
        defaultView: 'month',
        useCreationPopup: useCreationPopup,
        useDetailPopup: useDetailPopup,
        calendars: CalendarList,
        template: {
          milestone: function(model) {
            return '<span class="calendar-font-icon ic-milestone-b"></span> <span style="background-color: ' + model.bgColor + '">' + model.title + '</span>';
          },
          allday: function(schedule) {
            return getTimeTemplate(schedule, true);
          },
          time: function(schedule) {
            return getTimeTemplate(schedule, false);
          }
        }
      });

      // event handlers
      cal.on({
        'clickMore': function(e) {
          console.log('clickMore', e);
        },
        'clickSchedule': function(e) {
          // var topValue;
          // var leftValue;
          // topValue = (e.event.clientY/2)+45;
          // leftValue = e.event.clientX;
          // if ( e.schedule.calendarId === '1' ) {
          //     console.log('clickSchedule', e.schedule.calendarId);
          // 				$("#post").fadeIn();
          // $("#offer").fadeOut();
          // $("#event").fadeOut();
          // $("#create").fadeOut();
          //     $(".promo_card").css({
          //         top: topValue,
          //         left: leftValue
          //     })
          //     return;
          // }
          // if ( e.schedule.calendarId === '2' ) {
          //     console.log('clickSchedule', e.schedule.calendarId);
          // 				$("#event").fadeIn();
          // $("#post").fadeOut();
          // $("#offer").fadeOut();
          // $("#create").fadeOut();
          //     $(".promo_card").css({
          //         top: topValue,
          //         left: leftValue
          //     })
          //     return;
          // }
          // if ( e.schedule.calendarId === '3' ) {
          //     console.log('clickSchedule', e.schedule.calendarId);
          // 				$("#offer").fadeIn();
          // $("#post").fadeOut();
          // $("#event").fadeOut();
          // $("#create").fadeOut();
          //     $(".promo_card").css({
          //         top: topValue,
          //         left: leftValue
          //     })
          //     return;
          // }
          // console.log('ada ', e.event.clientX)
          // if( e.event.clientX > (window.windth - 200) ) {
          // }
          // console.log('clickSchedule', e);
        },
        'clickDayname': function(date) {
          console.log('clickDayname', date);
        },
        'beforeCreateSchedule': function(e) {

          // $("#create").fadeIn();

          saveNewSchedule(e);
        },
        'beforeUpdateSchedule': function(e) {
          var schedule = e.schedule;
          var changes = e.changes;

          console.log('beforeUpdateSchedule', e);

          cal.updateSchedule(schedule.id, schedule.calendarId, changes);
          refreshScheduleVisibility();
        },
        'beforeDeleteSchedule': function(e) {
          console.log('beforeDeleteSchedule', e);
          cal.deleteSchedule(e.schedule.id, e.schedule.calendarId);
        },
        'afterRenderSchedule': function(e) {
          var schedule = e.schedule;
          // var element = cal.getElement(schedule.id, schedule.calendarId);
          // console.log('afterRenderSchedule', element);
        },
        'clickTimezonesCollapseBtn': function(timezonesCollapsed) {
          console.log('timezonesCollapsed', timezonesCollapsed);

          if (timezonesCollapsed) {
            cal.setTheme({
              'week.daygridLeft.width': '77px',
              'week.timegridLeft.width': '77px'
            });
          } else {
            cal.setTheme({
              'week.daygridLeft.width': '60px',
              'week.timegridLeft.width': '60px'
            });
          }

          return true;
        }
      });

      function getTimeTemplate(schedule, isAllDay) {
        var html = [];
        var start = moment(schedule.start.toUTCString());
        if (!isAllDay) {
          html.push('<strong>' + start.format('HH:mm') + '</strong> ');
        }
        if (schedule.isPrivate) {
          html.push('<span class="calendar-font-icon ic-lock-b"></span>');
          html.push(' Private');
        } else {
          if (schedule.isReadOnly) {
            html.push('<span class="calendar-font-icon ic-readonly-b"></span>');
          } else if (schedule.recurrenceRule) {
            html.push('<span class="calendar-font-icon ic-repeat-b"></span>');
          } else if (schedule.attendees.length) {
            html.push('<span class="calendar-font-icon ic-user-b"></span>');
          } else if (schedule.location) {
            html.push('<span class="calendar-font-icon ic-location-b"></span>');
          }
          html.push(' ' + schedule.title);
        }

        return html.join('');
      }

      function onClickNavi(e) {
        var action = getDataAction(e.target);

        switch (action) {
          case 'move-prev':
            cal.prev();
            break;
          case 'move-next':
            cal.next();
            break;
          case 'move-today':
            cal.today();
            break;
          default:
            return;
        }

        setRenderRangeText();
        setSchedules();
      }

      function onNewSchedule() {
        var title = $('#new-schedule-title').val();
        var location = $('#new-schedule-location').val();
        var isAllDay = document.getElementById('new-schedule-allday').checked;
        var start = datePicker.getStartDate();
        var end = datePicker.getEndDate();
        var calendar = selectedCalendar ? selectedCalendar : CalendarList[0];

        if (!title) {
          return;
        }

        console.log('calendar.id ', calendar.id)
        cal.createSchedules([{
          id: '1',
          calendarId: calendar.id,
          title: title,
          isAllDay: isAllDay,
          start: start,
          end: end,
          category: isAllDay ? 'allday' : 'time',
          dueDateClass: '',
          color: calendar.color,
          bgColor: calendar.bgColor,
          dragBgColor: calendar.bgColor,
          borderColor: calendar.borderColor,
          raw: {
            location: location
          },
          state: 'Busy'
        }]);

        $('#modal-new-schedule').modal('hide');
      }

      function onChangeNewScheduleCalendar(e) {
        var target = $(e.target).closest('a[role="menuitem"]')[0];
        var calendarId = getDataAction(target);
        changeNewScheduleCalendar(calendarId);
      }

      function changeNewScheduleCalendar(calendarId) {
        var calendarNameElement = document.getElementById('calendarName');
        var calendar = findCalendar(calendarId);
        var html = [];

        html.push('<span class="calendar-bar" style="background-color: ' + calendar.bgColor + '; border-color:' + calendar.borderColor + ';"></span>');
        html.push('<span class="calendar-name">' + calendar.name + '</span>');

        calendarNameElement.innerHTML = html.join('');

        selectedCalendar = calendar;
      }

      function createNewSchedule(event) {
        var start = event.start ? new Date(event.start.getTime()) : new Date();
        var end = event.end ? new Date(event.end.getTime()) : moment().add(1, 'hours').toDate();

        if (useCreationPopup) {
          cal.openCreationPopup({
            start: start,
            end: end
          });
        }
      }

      function saveNewSchedule(scheduleData) {
        // console.log('scheduleData ', scheduleData)
        var calendar = scheduleData.calendar || findCalendar(scheduleData.calendarId);
        var schedule = {
          id: '1',
          title: scheduleData.title,
          // isAllDay: scheduleData.isAllDay,
          start: scheduleData.start,
          end: scheduleData.end,
          category: 'allday',
          // category: scheduleData.isAllDay ? 'allday' : 'time',
          // dueDateClass: '',
          color: calendar.color,
          bgColor: calendar.bgColor,
          dragBgColor: calendar.bgColor,
          borderColor: calendar.borderColor,
          location: scheduleData.location,
        };
        if (calendar) {
          schedule.calendarId = calendar.id;
          schedule.color = calendar.color;
          schedule.bgColor = calendar.bgColor;
          schedule.borderColor = calendar.borderColor;
        }

        cal.createSchedules([schedule]);
        console.log(schedule);
        // save
        $.ajax({
            url: "proses/calendar.php",
            type: 'POST',
            dataType: 'JSON',
            data:{'id'    : schedule.id,
                  'title' : schedule.title,
                  'start' : schedule.start,
                  'end'   : schedule.end,
                  },
            cache: false,
            success: function (data) {
              console.log(data);
            }
        });

        refreshScheduleVisibility();
      }


      function refreshScheduleVisibility() {
        var calendarElements = Array.prototype.slice.call(document.querySelectorAll('#calendarList input'));

        CalendarList.forEach(function(calendar) {
          cal.toggleSchedules(calendar.id, !calendar.checked, false);
        });

        cal.render(true);

        calendarElements.forEach(function(input) {
          var span = input.nextElementSibling;
          span.style.backgroundColor = input.checked ? span.style.borderColor : 'transparent';
        });
      }


      function setRenderRangeText() {
        var renderRange = document.getElementById('renderRange');
        var options = cal.getOptions();
        var viewName = cal.getViewName();
        var html = [];
        if (viewName === 'day') {
          html.push(moment(cal.getDate().getTime()).format('MMM YYYY DD'));
        } else if (viewName === 'month' &&
          (!options.month.visibleWeeksCount || options.month.visibleWeeksCount > 4)) {
          html.push(moment(cal.getDate().getTime()).format('MMM YYYY'));
        } else {
          html.push(moment(cal.getDateRangeStart().getTime()).format('MMM YYYY DD'));
          html.push(' ~ ');
          html.push(moment(cal.getDateRangeEnd().getTime()).format(' MMM DD'));
        }
        renderRange.innerHTML = html.join('');
      }

      function setSchedules() {
        cal.clear();
        var schedules = [{
            id: 489273,
            title: 'Workout for 2022-09-05',
            isAllDay: false,
            start: '2022-09-03T11:30:00+09:00',
            end: '2022-09-03T12:00:00+09:00',
            goingDuration: 30,
            comingDuration: 30,
            color: '#ffffff',
            isVisible: true,
            bgColor: '#69BB2D',
            dragBgColor: '#69BB2D',
            borderColor: '#69BB2D',
            calendarId: '1',
            category: 'allday',
            dueDateClass: '',
            customStyle: 'cursor: default;',
            isPending: false,
            isFocused: false,
            isReadOnly: false,
            isPrivate: false,
            location: '',
            attendees: '',
            recurrenceRule: '',
            state: ''
          },
          {
            id: 489273,
            title: 'Workout for 2020-04-05',
            isAllDay: false,
            start: '2022-09-11T11:30:00+09:00',
            end: '2022-09-11T12:00:00+09:00',
            goingDuration: 30,
            comingDuration: 30,
            color: '#ffffff',
            isVisible: true,
            bgColor: '#69BB2D',
            dragBgColor: '#69BB2D',
            borderColor: '#69BB2D',
            calendarId: '2',
            category: 'allday',
            dueDateClass: '',
            customStyle: 'cursor: default;',
            isPending: false,
            isFocused: false,
            isReadOnly: false,
            isPrivate: false,
            location: '',
            attendees: '',
            recurrenceRule: '',
            state: ''
          },

        ];
        // generateSchedule(cal.getViewName(), cal.getDateRangeStart(), cal.getDateRangeEnd());
        cal.createSchedules(schedules);
        // cal.createSchedules(schedules);
        refreshScheduleVisibility();
      }

      function setEventListener() {
        $('#menu-navi').on('click', onClickNavi);
        // $('.dropdown-menu a[role="menuitem"]').on('click', onClickMenu);
        // $('#lnb-calendars').on('change', onChangeCalendars);

        $('#btn-save-schedule').on('click', onNewSchedule);
        $('#btn-new-schedule').on('click', createNewSchedule);

        $('#dropdownMenu-calendars-list').on('click', onChangeNewScheduleCalendar);

        window.addEventListener('resize', resizeThrottled);
      }

      function getDataAction(target) {
        return target.dataset ? target.dataset.action : target.getAttribute('data-action');
      }

      resizeThrottled = tui.util.throttle(function() {
        cal.render();
      }, 50);

      window.cal = cal;

      // setDropdownCalendarType();
      setRenderRangeText();
      setSchedules();
      setEventListener();
    })(window, tui.Calendar);

    // set calendars
    (function() {
      // var calendarList = document.getElementById('calendarList');
      // var html = [];
      // CalendarList.forEach(function(calendar) {
      //     html.push('<div class="lnb-calendars-item"><label>' +
      //         '<input type="checkbox" class="tui-full-calendar-checkbox-round" value="' + calendar.id + '" checked>' +
      //         '<span style="border-color: ' + calendar.borderColor + '; background-color: ' + calendar.borderColor + ';"></span>' +
      //         '<span>' + calendar.name + '</span>' +
      //         '</label></div>'
      //     );
      // });
      // calendarList.innerHTML = html.join('\n');
    })();
  </script>
  <!-- end calendar -->
    <script>
        let sidebar = document.querySelector(".left-content");
        let sidebarBtn = document.querySelector(".fa-bars");
        console.log(sidebarBtn);
        sidebarBtn.addEventListener("click", () => {
            sidebar.classList.toggle("left-close");
        });
    </script>
    <script>
        let dark_mode = document.querySelector("#bg-body");
        let darkBtn = document.querySelector("#toggle5");
        darkBtn.addEventListener("click", () => {
            var valDark = document.getElementById('toggle5').value;
            console.log(valDark);
            if (valDark == "off"){
	            document.getElementById('toggle5').value = "on";
                $( "#bg-body" ).addClass( "dark-theme" );
                // cookies
                document.cookie = "darkmode=on; expires=Thu, 31 Dec 2040 12:00:00 UTC";
            }else{
                document.getElementById('toggle5').value = "off";
                $( "#bg-body" ).removeClass( "dark-theme" );
                document.cookie = "darkmode=off; expires=Thu, 31 Dec 2040 12:00:00 UTC";
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#list_title').load("proses/list_title.php");
            $("#btn_cari").click(function () {
                var getData = $( "input[type=search]" ).val();
                $('#list_title').load("proses/list_title.php?cari="+ getData);
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $( "#form" ).submit(function( event ) {
            $(".loading-screen").show();
            var data = $('#form').serialize();
            $.ajax({
                type: 'POST',
                url: "proses/save.php",
                data: data,

                cache: false,
                success: function (data) {
                    $(".loading-screen").hide();
                }
            });
            <?php
            if(isset($_GET['note'])){
                echo 'return false;';
            }; ?>
        });

        $('#makePublic').click(function() {
            var idNote = '<?php echo $_GET['note'] ?>';
            $(".loading-screen").show();
            $.ajax({
                url: "proses/public.php",
                type: 'POST',
                dataType: 'JSON',
                data:{'idNote':idNote},
                cache: false,
                success: function (data) {
                    if(data == 1){
                        $( "#makePublic" ).html( "<span>Make a private</span>" );
                        $( "#copyLink" ).html( `<a class="dropdown-item" onclick="copyLink()">Copy Link</a>`);
                    }else{
                        $( "#makePublic" ).html( "<span>Make a public</span>" );
                        $( "#copyLink" ).html( ``);
                    }
                    $(".loading-screen").hide();
                }
            });
        });
    </script>
    <script>
        function copyLink(){
            var copyText = document.getElementById("linkShare");

            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            navigator.clipboard.writeText(copyText.value);

            Swal.fire({
              icon: 'success',
              title: 'Suksess',
              text: 'Link Berhasil disalin',
              timer: 1500
            })
        }
    </script>
    <script>
        if(<?php echo $encrypt; ?> == 1){
            $('input[type=checkbox][name=encrypt]').attr("checked", "checked");
        };
    </script>

</body>
</html>