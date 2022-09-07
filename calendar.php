<?php
session_start();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
require_once 'koneksi.php';

$user   = $_SESSION['nama'];
$status = $_SESSION['status'];
$id_user= $_COOKIE['IDUSR'];

if($status != "login_user"){
  header('location: login');
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Bootstrap CSS -->
  <link href="assets/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendors/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/responsive.css" rel="stylesheet">
  <link href="assets/css/dark-theme.css" rel="stylesheet">
  <script src="assets/js/jquery-3.6.0.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome-font-awesome.min.css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.css">
  <link rel="stylesheet" href="assets/css/calendar.css">


  <link rel="icon" type="image/png" href="img/logo2.png">
  <!-- OG Tags Start -->
  <meta property="og:url" content="<?php echo $url;?>" />
  <meta property="og:title" content="N.notepad" />
  <meta property="og:image" content="img/logo2.png" />
  <meta property="og:description" content='Free Notepad online.'>
  <meta name="description" content='Free Notepad online la la la la la puf...'>
  <!-- OG Tags end -->
  <title>N.notepad</title>
</head>

<body id="bg-body" class="">
  <section id="header">
    <nav class="navbar-dark bg-nav fixed-top shadow ">
      <div class="container-fluid">
        <div class="row color-white">
          <div class="col-3 nav-left">
            <a class="navbar-brand fw-bold nav-brand-text" href="#">
              <img src="img/logo2.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
              N.notepad
            </a>
          </div>
          <div class="col-9 dropdown dropdown-share nav-right">
            <a class="dropdown-toggle float-end" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="hello-name">Hello </span><?php echo $user;?>!
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
                if (Cdarkmode == "on") {
                  $('input[type=checkbox][name=darkMode]').attr("checked", "checked");
                  $("#bg-body").addClass("dark-theme");
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
            $(".left-content").addClass("left-close");
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
            <span class="color-white d-flex">
              <lottie-player src="img/loading.json" background="transparent" speed="1" style="width: 25px; height: 25px;" loop autoplay></lottie-player>
              <span class="ms-2">Sedang memuat...</span>
            </span>
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
        <div class="row right-main-content g-0">
          <div class="row g-0">
            <div class="col-3">
              <div class="menu-btn">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </div>
            </div>
            <div class="col-12 mt-3">

              <div class="p-0">
                <div class="card">
                  <div class="card-body p-0">
                    <div id="calendar"></div>
                  </div>
                </div>
              </div>

              <!-- calendar modal -->
              <div id="modal-view-event" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-body">
                      <h4 class="modal-title"><span class="event-icon"></span><span class="event-title"></span></h4>
                      <div class="event-body"></div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <div>
                        <button type="button" class="btn btn-outline-secondary border" data-dismiss="modal" id="btnEditEvent" onclick="">Edit</button>
                        <button type="button" class="btn btn-outline-secondary border" data-dismiss="modal">Delete</button>
                      </div>
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

              <div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form id="add-event" action="proses/calendar.php" method="POST">
                      <div class="modal-body">
                        <h4>Add Event Detail</h4>
                        <div class="form-group">
                          <label>Event name</label>
                          <input type="text" class="form-control" name="ename" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Event Date</label>
                          <input type='text' class="datetimepicker form-control" name="edate" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Event Description</label>
                          <textarea class="form-control" name="edesc"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="btn-group mt-3 w-100 dropdown-event" id="eventColor">
                              <button class="btn border bg-white btn-sm dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Event Color
                              </button>
                              <div class="dropdown-menu">
                                <button type="button" class="dropdown-item" onclick="eventColor('default')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg default me-2"></div> Default
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('deepskyblue')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg deepskyblue me-2"></div> Deep sky blue
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('pinkred')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg pinkred me-2"></div> Pink red
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('lightgreen')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg lightgreen me-2"></div> Light green
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('blue')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg blue me-2"></div> Blue
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('cake')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg cake me-2"></div> Cake
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="btn-group mt-3 w-100 dropdown-event" id="eventIcon">
                              <button class="btn border bg-white btn-sm dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Event Icon
                              </button>
                              <div class="dropdown-menu">
                                <button type="button" class="dropdown-item" onclick="eventIcon('circle-thin')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-circle-thin me-2'></i> circle
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('cog')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-cog me-2'></i> cog
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('users')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-users me-2'></i> group
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('suitcase')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-suitcase me-2'></i> suitcase
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('calendar')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-calendar me-2'></i> calendar
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                      <input type="hidden" name="ecolor" value="fc-bg-default">
                      <input type="hidden" name="eicon" value="circle">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Modal edit-->
              <div id="modalEditEvent" class="modal modal-top fade calendar-modal">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <form id="add-event">
                      <div class="modal-body">
                        <h4>Edit Event Detail</h4>
                        <div class="form-group">
                          <label>Event name</label>
                          <input type="text" class="form-control" name="ename">
                        </div>
                        <div class="form-group">
                          <label>Event Date</label>
                          <input type='text' class="datetimepicker form-control" name="edate">
                        </div>
                        <div class="form-group">
                          <label>Event Description</label>
                          <textarea class="form-control" name="edesc"></textarea>
                        </div>
                        <div class="row">
                          <div class="col-6">
                            <div class="btn-group mt-3 w-100 dropdown-event" id="eventColor">
                              <button class="btn border bg-white btn-sm dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Event Color
                              </button>
                              <div class="dropdown-menu">
                                <button type="button" class="dropdown-item" onclick="eventColor('default')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg default me-2"></div> Default
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('deepskyblue')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg deepskyblue me-2"></div> Deep sky blue
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('pinkred')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg pinkred me-2"></div> Pink red
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('lightgreen')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg lightgreen me-2"></div> Light green
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('blue')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg blue me-2"></div> Blue
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventColor('cake')">
                                  <div class="d-flex align-items-center">
                                    <div class="option-bg cake me-2"></div> Cake
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="btn-group mt-3 w-100 dropdown-event" id="eventIcon">
                              <button class="btn border bg-white btn-sm dropdown-toggle d-flex align-items-center justify-content-between" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Event Icon
                              </button>
                              <div class="dropdown-menu">
                                <button type="button" class="dropdown-item" onclick="eventIcon('circle')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-circle me-2'></i> circle
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('cog')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-cog me-2'></i> cog
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('group')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-group me-2'></i> group
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('suitcase')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-suitcase me-2'></i> suitcase
                                  </div>
                                </button>
                                <button type="button" class="dropdown-item" onclick="eventIcon('calendar')">
                                  <div class="d-flex align-items-center">
                                    <i class='fa fa-calendar me-2'></i> calendar
                                  </div>
                                </button>
                              </div>
                            </div>
                          </div>

                        </div>

                      </div>
                      <input type="hidden" name="ecolor" value="fc-bg-default">
                      <input type="hidden" name="eicon" value="circle">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="footer">
    <div class="container-fluid">
      <div class="row border-top border-1">
        <div class="footer mt-2">
          <div class="col-12">
            <ul>
              <li class="title-made">© 2021 nafiswatsiq | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#">Nafis watsiq</a></li>
              <li class="title-made">Report <a href="#">error</a> or <a href="#">bugs</a> </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="assets/js/keySave.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <!-- <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js"></script>


  <script>
    jQuery(document).ready(function() {
      jQuery('.datetimepicker').datepicker({
        timepicker: true,
        language: 'en',
        range: true,
        multipleDates: true,
        multipleDatesSeparator: " - "
      });
      jQuery("#add-event").submit(function() {
        var values = {};
        $.each($('#add-event').serializeArray(), function(i, field) {
          values[field.name] = field.value;
        });
        console.log(
          values
        );
      });
    });

    (function() {
      'use strict';
      // ------------------------------------------------------- //
      // Calendar
      // ------------------------------------------------------ //
      jQuery(function() {
        // page is ready
        jQuery('#calendar').fullCalendar({
          themeSystem: 'bootstrap4',
          // emphasizes business hours
          businessHours: false,
          defaultView: 'month',
          // event dragging & resizing
          editable: true,
          // header
          header: {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'today prev,next'
          },
          events: [
            <?php
              $event = mysqli_query($conn, "SELECT * FROM `calendar` WHERE id_user = '$id_user'");
              foreach($event as $d_event) :
            ?>{
              title: '<?= $d_event['name'] ?>',
              description: '<?= $d_event['description'] ?>',
              start: '<?= $d_event['start'] ?>',
              end: '<?= $d_event['end'] ?>',
              className: '<?= $d_event['color'] ?>',
              icon: "<?= $d_event['icon'] ?>"
            },
            <?php
              endforeach;
            ?>
          ],
          eventRender: function(event, element) {
            if (event.icon) {
              element.find(".fc-title").prepend("<i class='fa fa-" + event.icon + "'></i>");
            }
          },
          dayClick: function() {
            jQuery('#modal-view-event-add').modal();
          },
          eventClick: function(event, jsEvent, view) {
            jQuery('.event-icon').html("<i class='fa fa-" + event.icon + "'></i>");
            jQuery('.event-title').html(event.title);
            jQuery('.event-body').html(event.description);
            // jQuery('.eventUrl').attr('href', event.url);
            jQuery('#btnEditEvent').attr('onclick', `editEvent('${event.title}', '${event.description}', '${event.start}', '${event.end}', '${event.className}', '${event.icon}')`);
            jQuery('#modal-view-event').modal();
          },
        })
      });

    })(jQuery);

    function editEvent(title, description, start, end, className, icon) {
      console.log(end);
      $('#modalEditEvent input[name="ename"]').val(title);
      $('#modalEditEvent input[name="edate"]').val(start +'-'+ end);
      $('#modalEditEvent textarea[name="edesc"]').val(description);
      $('#modalEditEvent input[name="ecolor"]').val(className);
      $('#modalEditEvent input[name="eicon"]').val(icon);
      $('#modalEditEvent').modal('show');
    }

    function eventColor(color) {
      $('#eventColor button.dropdown-toggle').html(`
        <div class="d-flex align-items-center">
          <div class="option-bg ${color} me-2"></div> ${color}
        </div>
      `);

      $('#add-event input[name="ecolor"]').val('fc-bg-' + color);
    }

    function eventIcon(icon) {
      $('#eventIcon button.dropdown-toggle').html(`
        <div class="d-flex align-items-center">
          <i class='fa fa-${icon} me-2'></i> ${icon}
        </div>
      `);

      $('#add-event input[name="eicon"]').val(icon);
    }
  </script>
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
      if (valDark == "off") {
        document.getElementById('toggle5').value = "on";
        $("#bg-body").addClass("dark-theme");
        // cookies
        document.cookie = "darkmode=on; expires=Thu, 31 Dec 2040 12:00:00 UTC";
      } else {
        document.getElementById('toggle5').value = "off";
        $("#bg-body").removeClass("dark-theme");
        document.cookie = "darkmode=off; expires=Thu, 31 Dec 2040 12:00:00 UTC";
      }
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#list_title').load("proses/list_title.php");
      $("#btn_cari").click(function() {
        var getData = $("input[type=search]").val();
        $('#list_title').load("proses/list_title.php?cari=" + getData);
        return false;
      });
    });
  </script>

</body>

</html>