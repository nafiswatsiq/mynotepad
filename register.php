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
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <link href="assets/css/responsive.css" rel="stylesheet">

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

<body id="bg-body">
    <section id="header">
        <nav class="navbar-dark bg-nav fixed-top shadow ">
            <div class="container-fluid">
                <div class="row color-white">
                    <div class="col-12 nav-left">
                        <a class="navbar-brand fw-bold" href="#">
                            <img src="img/logo2.png" alt="" width="30" height="30"
                                class="d-inline-block align-text-top">
                            N.notepad
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section id="login-content">
        <div class="main-login">
            <div class="main-login-content">
                <div class="row g-0">
                    <div class="col-md-6">
                        <div class="left-login">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <p class="login-title">Register</p>
                                    <p>Free onlien Notepad</p>
                                </div>
                                <span class="alert-register">
                                <?php
                                if(isset($_GET['m'])){
                                    if ($_GET['m'] == 1){
                                        echo "Username sudah digunakan!";
                                    }else if($_GET['m'] == 2){
                                        echo "Mau usil ya!";
                                    }
                                };
                                ?>
                                </span>
                                <div class="col-12">
                                    <form class="form" name="register" onSubmit="return validasi()" method="POST" action="proses/register.php">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="first-name" class="first-name">
                                                    <input type="text" id="first-name" name="firstName" placeholder="First Name" maxlength="15">
                                                    <span>First Name</span>
                                                </label>
                                            </div>
                                            <div class="col-6">
                                                <label for="last-name" class="last-name">
                                                    <input type="text" id="last-name" name="lastName" placeholder="Last Name" maxlength="15">
                                                    <span>Last Name</span>
                                                </label>
                                            </div>
                                        </div>
                                        <label for="username" class="username">
                                            <input type="text" id="username" name="username" placeholder="Username/Email" maxlength="25">
                                            <span>Username/Email</span>
                                        </label>
                                        <label for="password" class="password">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <input type="password" id="password" name="password" placeholder="Password" maxlength="15">
                                            <span>Password</span>
                                        </label>
                                        <button type="submit" class="">Register <i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
                                    </form>
                                </div>
                                <div class="col-12 mt-1">
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="login-text-option-have">Already have an account? <a href="login"
                                                    class="login-text-option">Login</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 right-login-box">
                        <div class="right-login">
                            <div class="right-login-layer">
                                <div class="col-10 text-center color-white">
                                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi, quibusdam.
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam. Lorem
                                        ipsum dolor sit amet.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-login-content-layer">
            </div>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid">
            <div class="row border-top border-1">
                <div class="footer-login mt-2">
                    <div class="col-6">
                        <ul>
                            <li class="title-made">© 2021 nafiswatsiq | Made with <i class="fa fa-heart" aria-hidden="true"></i> by <a
                                    href="#">Nafis watsiq</a></li>
                                    <li class="title-made">Report <a href="#">error</a> or <a href="#">bugs</a> </li>
                        </ul>
                    </div>
                    <div class="col-6 icon-footer">
                        <a href="#" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a href="#" title="Github"><i class="fa fa-github" aria-hidden="true"></i></a>
                        <a href="#" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/ckeditor/ckeditor.js"></script>
    <script src="assets/js/my.js"></script>

        <script>
            $( "#first-name" ).click(function() {
                $( ".first-name" ).removeClass( "invalid" );
                $( ".first-name span" ).removeClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
            });
            $( "#last-name" ).click(function() {
                $( ".last-name" ).removeClass( "invalid" );
                $( ".last-name span" ).removeClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
            });
            $( "#username" ).click(function() {
                $( ".username" ).removeClass( "invalid" );
                $( ".username span" ).removeClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
            });
            $( "#password" ).click(function() {
                $( ".password" ).removeClass( "invalid" );
                $( ".password span" ).removeClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
            });
            function validasi() {
                $( ".form button" ).addClass( "loading-active" );

                if (document.forms["register"]["firstName"].value == "") {
                    $( ".first-name" ).addClass( "invalid" );
                    $( ".first-name span" ).addClass( "invalid" );
                    $( ".form button" ).removeClass( "loading-active" );
                    return false;
                }
                if (document.forms["register"]["lastName"].value == "") {
                    $( ".last-name" ).addClass( "invalid" );
                    $( ".last-name span" ).addClass( "invalid" );
                    $( ".form button" ).removeClass( "loading-active" );
                    return false;
                }
                if (document.forms["register"]["username"].value == "") {
                    $( ".username" ).addClass( "invalid" );
                    $( ".username span" ).addClass( "invalid" );
                    $( ".form button" ).removeClass( "loading-active" );
                    return false;
                }
                if (document.forms["register"]["password"].value == "") {
                    $( ".password" ).addClass( "invalid" );
                    $( ".password span" ).addClass( "invalid" );
                    $( ".form button" ).removeClass( "loading-active" );
                    return false;
                } 
            };
        </script>
</body>

</html>