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
    <link href="assets/vendors/summernote/summernote-lite.min.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <script src="assets/vendors/Lottie/lottie-player.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>


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
                        <span class="hello-name">By </span>Nafis watsiq!
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
    <section id="body" class="body-public">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 my-4">
                    <div class="card px-4 py-2 shadow">
                        <span class="fw-bolder fs-5">Lorem, ipsum dolor.</span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card px-4 py-2 shadow">
                        Lorem, ipsum dolor.
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
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
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
</body>
</html>