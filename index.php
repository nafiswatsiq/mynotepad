<?php
session_start();
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
require_once 'koneksi.php';

$user   = $_SESSION['nama'];
$status = $_SESSION['status'];
$id_user= $_COOKIE['IDUSR'];
if($status == "login_user"){
    // session active
} else if(isset($_COOKIE['IDUSR'])){
    $query_login = mysqli_query($conn, "SELECT * FROM user WHERE id_user='$id_user'");
    foreach ($query_login as $dt) :
        $nama   = $dt['nama'];
    endforeach;
    $_SESSION['nama']     = $nama;
    $_SESSION['id_user']  = $id_user;
    $user   = $_SESSION['nama'];
} else{
    header('location: login');
};
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
    <link href="assets/vendors/summernote/summernote-lite.min.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="assets/css/dark-theme.css" rel="stylesheet">
    <script src="assets/vendors/Lottie/lottie-player.js"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/driver.js/dist/driver.min.css">


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
                <form id="form" method="POST">
                    <div class="row right-main-content g-0">
                        <div class="row g-0">
                            <div class="col-3">
                                <div class="menu-btn">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </div>
                        <?php 
                        if(isset($_GET['note'])){
                            $id_note = $_GET['note'];
                            $result = mysqli_query($conn, "SELECT * FROM data_note WHERE id_note='$id_note' AND id_user='$id_user'");
                            // enkripsi
                            $method="AES-128-CTR";
                            $key ="hanyaadmin";
                            $option=0;
                            $iv="1251632135716362";
                            // end
                            //kalau ini melakukan foreach atau perulangan
                            foreach ($result as $data) :
                                $encrypt = $data['encrypt'];
                                $is_public = $data['public'];
                                if($encrypt == 1){
                                    $content_decrypt=openssl_decrypt($data['content'], $method, $key, $option, $iv);
                                }else{
                                    $content_decrypt = $data['content'];
                                };
                            ?>
                                <div class="col-9 text-end">
                                    <div class="dropdown dropdown-share">
                                        <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Share <i class="fa fa-share" aria-hidden="true"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" id="makePublic">Make a <?php echo $is_public == '0' ? 'public' : 'private'; ?></a></li>
                                            <li id="copyLink">
                                                <?php echo $is_public == '1' ? '<a class="dropdown-item" onclick="copyLink()">Copy Link</a>' : ''; ?>
                                            </li>
                                            <input type="text" id="linkShare" name="" value="<?php echo $url ?>/public?note=<?php echo $_GET['note'] ?>" style="display: none;">
                                            <li><a class="dropdown-item" href="#">Facebook</a></li>
                                            <li><a class="dropdown-item" href="#">Twitter</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" name="title" placeholder="Title" class="input-title"
                                    value="<?= $data['title'] ?>">
                            </div>
                            <div class="col-12 mt-3 main-ckeditor">
                                <textarea id="summernote" name="content"><?php echo $content_decrypt;?></textarea>
                                <div class="row">
                                    <div class="col-6">
                                        <input type="checkbox" name="encrypt" id="encrypt" class="input-encrypt" value="1"><label class="label-encrypt" for="encrypt">Make it encrypt</label>
                                    </div>
                                    <div class="col-6 text-end delete-btn">
                                        <a href="proses/delete.php?delete=<?= $data['id_note'] ?>">Delete note</a>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="idNote" value="<?= $data['id_note'] ?>">
                                        <input class="save-btn" type="submit" value="Save">
                                    </div>
                                </div>
                            </div>
                            <?php
                            endforeach;
                        }else{
                        ?>
                            <div class="col-12 mt-2">
                                <input type="text" name="title" placeholder="Title" class="input-title" id="input-title">
                            </div>
                            <div class="col-12 mt-3 main-ckeditor">
                                <div id="textarea">
                                    <textarea id="summernote" name="content"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <input type="checkbox" name="encrypt" id="encrypt" class="input-encrypt" value="1"><label class="label-encrypt" for="encrypt">Make it encrypt</label>
                                    </div>
                                    <div class="col-12">
                                        <input type="hidden" name="idNote" value="">
                                        <div id="btn-save" class="d-inline-flex">
                                            <input class="save-btn" type="submit" value="Save">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                        ?>
                    </div>
                </form>
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
    <script src="https://unpkg.com/driver.js/dist/driver.min.js"></script>
    <script>
    const driver = new Driver();
    // Define the steps for introduction
    driver.defineSteps([
      {
        element: '#input-title',
        popover: {
        //   className: 'first-step-popover-class',
          title: 'Title',
          description: 'Input title note here',
          position: 'bottom'
        }
      },
      {
        element: '#textarea',
        popover: {
          title: 'Writing area',
          description: 'Write your note here',
          position: 'top'
        }
      },
      {
        element: '#btn-save',
        popover: {
          title: 'Save',
          description: "don't forget to save note or use `ctrl+s` to save",
          position: 'top'
        }
      },
    ]);
    // Start the introduction
    if (!localStorage.getItem('introduction')) {
        driver.start();
    
        localStorage.setItem('introduction', true)
    }
    </script>
    <script>
        $('#summernote').summernote({
          callbacks: {
              onImageUpload: function(files) {
                  for(let i=0; i < files.length; i++) {
                      $.upload(files[i]);
                  }
              },
              onMediaDelete : function(target) {
                deleteSNImage(target[0].src);
              }
          },
          height: 600,
        });

        $.upload = function (file) {
          let out = new FormData();
          out.append('file', file, file.name);
        
          $.ajax({
              method: 'POST',
              url: 'proses/uploadImg.php',
              contentType: false,
              cache: false,
              processData: false,
              data: out,
              success: function(url) {
                if(url == 'larger'){
                    alert("Gambar terlalu besar, maksimal 1MB")
                }else{
                    // $('#summernote').summernote("insertImage", url, 'filename');
                    var image = $('<img>').attr('src', url);
                    $('#summernote').summernote("insertNode", image[0]);

                    $(".loading-screen").show();
                    var dataForm = $('#form').serialize();
                    $.ajax({
                        type: 'POST',
                        url: "proses/save.php",
                        data: dataForm,
                        cache: false,
                        success: function (data) {
                            $(".loading-screen").hide();
                        }
                    });
                }
              },
              error: function (jqXHR, textStatus, errorThrown) {
                  console.error(textStatus + " " + errorThrown);
              }
          });
        };

        function deleteSNImage(src) {
            let image = src.replace("<?php echo $url ?>", "");
            $.ajax({
                data: {images : image},
                type: "POST",
                url: "proses/deleteImg.php", 
                cache: false,
                success: function(res) {
                    $(".loading-screen").show();
                    var dataForm = $('#form').serialize();
                    $.ajax({
                        type: 'POST',
                        url: "proses/save.php",
                        data: dataForm,
                        cache: false,
                        success: function (data) {
                            $(".loading-screen").hide();
                        }
                    });
                }
            });
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