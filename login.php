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
    <script src="assets/vendors/lordIcon/lord-icon-2.1.0.js"></script>

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
                        <a class="navbar-brand fw-bold nav-brand-text" href="#">
                            <img src="img/logo2.png" alt="Logo" width="30" height="30"
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
                                    <lord-icon
                                        src="https://cdn.lordicon.com/dxjqoygy.json"
                                        trigger="loop"
                                        colors="primary:#9cc2f4,secondary:#3080e8"
                                        style="width:80px;height:80px">
                                    </lord-icon>
                                    <p class="login-title">Login</p>
                                </div>
                                <div class="col-12">
                                    <form class="form" name="login" onSubmit="return validasi()" method="POST" action="proses/auth.php">
                                        <label for="username" class="username">
                                            <input type="text" name="username" id="username"
                                                placeholder="Username/Email">
                                            <span class="">Username/Email</span>
                                        </label>
                                        <label for="password" class="password">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                            <input type="password" name="password" id="password" placeholder="Password">
                                            <span>Password</span>
                                        </label>
                                        <button type="submit" class="">Login <i class="fa fa-circle-o-notch" aria-hidden="true"></i></button>
                                        <!-- loading-active -->
                                    </form>
                                </div>
                                <div id="result" class="mt-2 alert-login">
                                <?php
                                if(isset($_GET['err'])){
                                    if ($_GET['err'] == 1){
                                        echo "Password salah!";
                                    }else if($_GET['err'] == 2){
                                        echo "username tidak ditemukan!";
                                    }else if($_GET['err'] ==3 ){
                                        echo "Mau usil ya!";
                                    }
                                };
                                ?>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-6">
                                            <a href="register" class="login-text-option">Register</a>
                                        </div>
                                        <div class="col-6 text-end">
                                            <a href="/" class="login-text-option">Forgot password?</a>
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
                            <li class="title-made">© 2021 nafiswatsiq | Made with <i class="fa fa-heart"
                                    aria-hidden="true"></i> by <a href="#">Nafis watsiq</a></li>
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
        
            if (document.forms["login"]["username"].value == "") {
                $( ".username" ).addClass( "invalid" );
                $( ".username span" ).addClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
                return false;
            }
            if (document.forms["login"]["password"].value == "") {
                $( ".password" ).addClass( "invalid" );
                $( ".password span" ).addClass( "invalid" );
                $( ".form button" ).removeClass( "loading-active" );
                return false;
            } 
        };
    </script>
</body>

</html>