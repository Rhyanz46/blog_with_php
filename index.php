<?php 

include 'admin/inc/set_database.php';  
include 'admin/inc/helper.php';  

// $sql = "SELECT * FROM pencegahan ORDER BY JUDUL LIMIT 0,6";

$sql = "SELECT * FROM profil_perusahaan;";
$data_perusahaan = mysqli_query($koneksidb, $sql)or die(mysql_error);

foreach ($data_perusahaan as $aa) {
  $singkatan_perusahaan  = $aa['singkatan'];
  $gambar_perusahaan     = $aa['gambar'];
  $nama_perusahaan       = $aa['nama'];
  $alamat_perusahaan     = $aa['alamat'];
}

$sql_admin = "SELECT * FROM admin;";
$data_admin = mysqli_query($koneksidb, $sql_admin)or die(mysql_error);

foreach ($data_admin as $admin) {
  $email  		= $admin['email'];
}

$sql_slidder = "SELECT * FROM slidder;";
$data_slidder = mysqli_query($koneksidb, $sql_slidder)or die(mysql_error);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title>Pak Guru</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/animate-3.7.0.css">
    <link rel="stylesheet" href="assets/css/font-awesome-4.7.0.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-4.1.3.min.css">
    <link rel="stylesheet" href="assets/css/owl-carousel.min.css">
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .warna-header{
            background: rgb(2,0,36);
background: linear-gradient(23deg, rgba(2,0,36,1) 0%, rgba(54,39,39,1) 29%, rgba(12,88,61,1) 49%, rgba(90,9,121,1) 67%, rgba(39,102,115,1) 100%);
        }
        .kategori-post{
            background: #f9f9ff;
            padding: 30px;
            display: grid;
            grid-template-columns: 33% 33% 33%;
            grid-column-gap: 1%;
            grid-row-gap: 1%;
        }
        .kategori-post > div{
            text-align: center;
            border-bottom: 1px dashed #eeeeee;
            cursor: pointer;
            margin-bottom: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            transition: all 1s;
        }
        .kategori-post > div:hover {
            color: #7f7b78;
            font-weight: bold;
            background: #ffb606;
        }
        .anta{

        }
        #slider-wrapper {
            width: 100%;
            background: #333;
            position: relative;
            display : none;
        }
        .slider-controlls .next, .slider-controlls .prev {
            display: block;
            position: absolute;
            border: none;
            background-color: rgba(51, 51, 51, 0.5);
            color: #fff;
            top: 50%;
            padding: 20px;
            transform: translateY(-50%);
            font-size: 18px;
            z-index: 99999;
        }
        .slider-controlls .next {
            right: 20px;
        }
        .slider-controlls .prev {
            left: 20px;
        }
        .slider-items {
            width: 100%;
            margin: 0px auto;
            height: 70vh;
            position: relative;
            overflow: hidden;
        }
        .slider-items .slider-item {
            width: 100%;
            position: absolute;
            opacity: 1;
        }
        .slider-items .slider-item.active {
            opacity: 1;
        }
        .slider-items .slider-item.active .content h1 {
            opacity: 1;
            bottom: 40%;
            left: 20%;
            z-index: 9999;
            font-weight: normal;
        }
        .slider-items .slider-item.active .content p {
            opacity: 1;
            left: 20%;
            z-index: 9999;
        }
        .slider-items .slider-item.active .content img {
            opacity: 1;
        }
        .slider-items .slider-item .content {
            width: 100%;
            height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .slider-items .slider-item .content h1 {
            position: absolute;
            bottom: 40%;
            left: 10%;
            /* background-color: rgba(51, 102, 153, 0.8); */
            padding: 15px 20px;
            color: #fff;
            opacity: 0;
            transition: all 0.5s;
        }
        .slider-items .slider-item .content p {
            position: absolute;
            bottom: 32%;
            left: 0%;
            background-color: rgba(51, 51, 51, 0.8);
            padding: 10px;
            color: #fff;
            opacity: 0;
            transition: all 0.6s;
            transition-delay: 0.1s;
        }
        .slider-items .slider-item .content img {
            display: block;
            position: absolute;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: all 0.5s;
        }
        .admin-img{
            height: 150px;
            width: 150px;
        }

        img {
            height: auto;
            max-width: 100%;
            vertical-align: middle;
        }
        .btn {
            background-color: white;
            border: 1px solid #cccccc;
            color: #696969;
            padding: 0.5rem;
            text-transform: lowercase;
        }
        .btn--block {
            display: block;
            width: 100%;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            justify-content: center;
        }
        .cards__item {
            display: flex;
            padding: 1rem;
            box-sizing: border-box;
        }
        @media (min-width: 40rem) {
        .cards__item {
            width: 50%;
        }
        }
        @media (min-width: 56rem) {
        .cards__item {
            width: 21.3333%;
            /* width: 33.3333%; */
        }
        }
        .card {
            background-color: white;
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            width: 100%
        }
        .card:hover .card__image {
            filter: contrast(100%);
        }
        .card__content {
            display: flex;
            flex: 1 1 auto;
            flex-direction: column;
            padding: 1rem;
        }
        .card__image {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
            filter: contrast(70%);
            overflow: hidden;
            position: relative;
            transition: filter 0.5s cubic-bezier(0.43, 0.41, 0.22, 0.91);
        }
        .card__image::before {
            content: "";
            display: block;
            padding-top: 56.25%;
        }
        @media (min-width: 40rem) {
        .card__image::before {
            padding-top: 66.6%;
        }
        }
        .card__image--flowers {
            background-image: url(https://unsplash.it/800/600?image=82);
        }
        .card__image--river {
            background-image: url(https://unsplash.it/800/600?image=11);
        }
        .card__image--record {
            background-image: url(https://unsplash.it/800/600?image=39);
        }
        .card__image--fence {
            background-image: url(https://unsplash.it/800/600?image=59);
        }
        .card__title {
            color: #696969;
            font-size: 1.25rem;
            font-weight: 300;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .img-post-trending{
            height: 100px !important;
            width: 100px !important;
        }

        @media (max-width: 1440px) and (min-width: 1200px){
            .header-area {
                width: 99%;
                background: #ffffff29;
                border-radius: 10px;
            }
            .header-area * a{
                color: white;
            }
            .main-menu ul li a{
                color: white;
            }
        }
    </style>
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
	<header class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area text-logonya">
                        <!-- <a href="index.php"><img src="assets/images/logo/logo.png" alt="logo"></a> -->
                        <a href="index.php">GGD Sumba Barat Daya</a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                        <li class="active"><a href="index.php">home</a></li>
                            <li><a href="team.php">Tim Kami</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                            <li><a href="about.php">about</a></li>
                            <li><a href="contact-us.html">contact</a></li>
                            <!-- <li><a href="#">blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-home.html">Blog Home</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li><a href="elements.html">Elements</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
    <section class="food-area section-padding warna-header">
    <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <!-- <img class="img-fluid" src="assets/images/blog-details/feature-img1.jpg" alt=""> -->
                                <div id="slider-wrapper">
	<!-- slider controls -->
                                <div class="slider-controlls">
                                    <button class="next">></button>
                                    <button class="prev"><</button>
                                        </div>
                                    <!-- slider items -->
                                    <div class="slider-items">
                                    <?php
                                        $nomor = 0;
                                        foreach ($data_slidder as $aaa) {
                                            $no = $aaa["no"];
                                            $title = $aaa["title"];
                                            $deskripsi = $aaa["deskripsi"];
                                            $img = $aaa["img"];
                                            echo '<div class="slider-item">
                                                    <div class="content">
                                                        <h1 id="titlenya">'.$title.'</h1>
                                                        <p>'.ambil_kata($deskripsi, 30).'</p>
                                                        <img src="admin/static/slider/'.$img.'">
                                                    </div>
                                                  </div>';
                                        }
                                    ?>
                                    </div>
                                    <!-- slider bullets -->  
                                </div>
                            </div>									
                        </div>
                        
                        
                        <div class="col-lg-12">
                                <?php 
                                if($singkatan_perusahaan != ""){
                                    echo '<div class="quotes">';
                                    echo $singkatan_perusahaan;
                                    echo '</div>';
                                }else{
                                    echo '<div style="margin: 30px">
                                    <hr>
                                    </div>'  ;
                                }
                                ?>
                             <div class="row">
                                <?php 
                                
                                // console_log($data);

                                $nomor = 0;
                                foreach ($post_data as $aaa) {
                                    $id = $aaa["id"];
                                    $post = $aaa["deskripsi"];
                                    $kategori = $aaa["kategori"];
                                    $judul = $aaa["nama"];
                                    $gambar = $aaa["gambar"];

                                    if($nomor++ >= 3){
                                        echo '<div class="col-md-4 col-sm-6" style="margin-top: 30px;">';
                                        // echo '<script>alert('.$nomor.')</script>';
                                    }else{
                                        echo '<div class="col-md-4 col-sm-6">';
                                        // echo '<script>alert('.$nomor.')</script>';
                                    };
                                    echo '
                                        <div class="single-food">
                                            <div class="food-img">
                                                <img src="admin/img/'.$gambar.'" class="img-fluid" alt="">
                                            </div>
                                            <div class="food-content">
                                                <div class="d-flex justify-content-between">
                                                    <h5><a href="blog-details.php?id='. $id .'">'.$judul . '</a></h5>
                                                    <span class="style-change" style="font-size: 10px;">'.$kategori.'</span>
                                                </div>
                                                <p class="pt-3">' . ambil_kata($post, 30)  . '</p>
                                            </div>
                                        </div>
                                    </div>';
                                }
                                ?>
                                <div class="br"></div>
                                <div class="col-sm-12">
                                    <div class="single-food" style="background: white">
                                        <h4 class="widget_title" style="margin-top: 20px;margin-top: 20px;padding: 11px;background: #ffb606; text-align: center;">Post Catgories</h4>
                                        <div class="kategori-post">
                                            <?php 
                                                foreach($kategori_list as $kategori){
                                                    $sql = "SELECT * FROM post_list where kategori='$kategori'";
                                                    $jumlah = mysqli_query($koneksidb, $sql);
                                                    $jumlah = mysqli_num_rows($jumlah);
                                                    echo '<div>'.$kategori.'</div>';
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar" style="background: #51728a9e">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span>
                            </div><!-- /input-group -->
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget author_widget">
                            <img class="author_img rounded-circle admin-img" src="admin/img/profil/<?php echo $gambar_admin ?>" alt="">
                            <!-- <img class="author_img rounded-circle" src="assets/images/blog/author.png" alt=""> -->
                            <h5><?php echo $nama_admin ?></h5>
                            <p><?php echo $job_admin ?></p>
                            <div class="social_icon">
                                <a href="https://<?php echo $fb_link ?>"><i class="fa fa-facebook"></i></a>
                                <a href="https://<?php echo $twitter_link ?>"><i class="fa fa-twitter"></i></a>
                                <a href="https://<?php echo $pinterest_link ?>"><i class="fa fa-pinterest"></i></a>
                                <a href="https://<?php echo $instagram_link ?>"><i class="fa fa-instagram"></i></a>
                            </div>
                            <p><?php echo $deskripsi_admin ?></p>
                            <div class="br"></div>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h4 class="widget_title">Popular Posts</h4>
                            <!-- <img src="assets/images/blog/popular-post/post1.jpg" alt="post"> -->
                            <?php
                            foreach($post_data_trending as $data){
                                $title  = $data['nama'];
                                $gambar = $data['gambar'];
                                $tgl    = $data['tgl'];
                                
                                echo '
                                    <div class="media post_item">
                                        <img src="admin/img/'.$gambar.'" alt="post" class="img-post-trending">
                                        <div class="media-body">
                                            <a href="blog-details.php?id='. $id .'"><h5>'.$title.'</h5></a>
                                            <p>'.$tgl.'</p>
                                        </div>
                                    </div>
                                ';
                            }
                            ?>
                            <div class="br"></div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Food Area End -->

    <!-- Reservation Area Starts -->

    <!-- Testimonial Area Starts -->
    <section class="testimonial-area section-padding4">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Team <span>Kami</span></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-slider owl-carousel">
                        <?php
                            $sql      = "SELECT * FROM soal;";        
                            $hasil     = mysqli_query($koneksidb, $sql)or die(mysql_error);
                            $aaa = 0;
                            foreach ($hasil as $aaadd) {
                                $nama = $aaadd['soal'];
                                $img = $aaadd['img'];
                                $soal = $aaadd['soal'];
                                echo '
                                    <div class="single-slide d-sm-flex">
                                        <div class="customer-img mr-4 mb-4 mb-sm-0">
                                            <img src="admin/img/team/'.$img.'" alt="">
                                        </div>
                                        <div class="customer-text">
                                            <h5>adam nahan</h5>
                                            <span><i>Chief Customer</i></span>
                                            <p class="pt-3">'.$soal.'</p>
                                        </div>
                                    </div>
                                ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonial Area End -->

    <!-- Update Area Starts -->
    <section class="update-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-top2 text-center">
                        <h3>Instansi <span>Kita</span></h3>
                        <p><i>Beberapa post yang sering kali kunjungi.</i></p>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
                <div class="instansi">
                    <ul class="cards">
                    <?php foreach($instansi_data as $instansi): ?>
                    <li class="cards__item">
                        <div class="card">
                        <div class="card__image" style="background: url('admin/static/instansi/<?php echo $instansi['link'] ?>')"></div>
                        <div class="card__content">
                            <div class="card__title">Flex</div>
                            <button class="btn btn--block card__btn">Button</button>
                        </div>
                        </div>
                    </li>
                    <?php endforeach ?>
                    </ul>
                </div>    
            </div>
            </div>
        </div>
    </section>
    <!-- Update Area End -->
    <!-- Table Area End -->

    <!-- Footer Area Starts -->
    <footer class="footer-area">
        <div class="footer-widget section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="single-widget single-widget1">
                            <a href="index.php"><img src="assets/images/logo/logo2.png" alt=""></a>
                            <p class="mt-3">Which morning fourth great won't is to fly bearing man. Called unto shall seed, deep, herb set seed land divide after over first creeping. First creature set upon stars deep male gathered said she'd an image spirit our</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget2 my-5 my-md-0">
                            <h5 class="mb-4">contact us</h5>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="info-text">
                                    <p><?php echo $alamat ?></p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="info-text">
                                    <p><?php echo $hp ?></p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="into-icon">
                                    <i class="fa fa-envelope-o"></i>
                                </div>
                                <div class="info-text">
                                    <p><?php echo $email  ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="single-widget single-widget3">
                            <h5 class="mb-4">opening hours</h5>
                            <p>Monday ...................... Closed</p>
                            <p>Tue-Fri .............. 10 am - 12 pm</p>
                            <p>Sat-Sun ............... 8 am - 11 pm</p>
                            <p>Holidays ............. 10 am - 12 pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="social-icons">
                            <ul>
                                <li class="no-margin">Follow Us</li>
                                <li><a href="<?php echo $fb_link ?>"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="<?php echo $twitter_link ?>"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="<?php echo $pinterest_link ?>"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="<?php echo $instagram_link ?>"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->


    <!-- Javascript -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
	<script src="assets/js/vendor/bootstrap-4.1.3.min.js"></script>
    <script src="assets/js/vendor/wow.min.js"></script>
    <script src="assets/js/vendor/owl-carousel.min.js"></script>
    <script src="assets/js/vendor/jquery.datetimepicker.full.min.js"></script>
    <script src="assets/js/vendor/jquery.nice-select.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        var show = true;
        $(document).ready( function (){
            $('.bullet').first().addClass('active');
            $('.slider-item').first().addClass('active');

            $('.next, .prev').click( function(){
                var $this = $(this);
                var current = $('.slider-items').find('.active');
                var position = $('.slider-items').children().index(current);
                var numItems = $('.slider-item').length;

                if($this.hasClass('next'))
                {
                    if(position < numItems-1 )
                    { 
                        $('.active').removeClass('active').next().addClass('active');
                    } else 
                    { 
                        $('.slider-item').removeClass('active').first().addClass('active'); 
                        $('.bullet').removeClass('active').first().addClass('active'); 
                    }//else
                } else 
                {
                    if(position === 0)
                    {  
                        $('.slider-item').removeClass('active').last().addClass('active');
                        $('.bullet').removeClass('active').last().addClass('active'); 
                    } else 
                    {
                        $('.active').removeClass('active').prev().addClass('active');
                    }        
                }
            }); // click function
            setTimeout(() => {
                document.getElementById("slider-wrapper").style.display = "block"
                document.getElementsByClassName("custom-navbar")[0].addEventListener("click", switch_show);
            }, 1000);
            function switch_show(){
                show = !show
                if(show){
                    document.getElementsByClassName("slider-controlls")[0].style.display = "block"
                }else{
                    document.getElementsByClassName("slider-controlls")[0].style.display = "none"
                }
            }
            setInterval(() => {
                var current = $('.slider-items').find('.active');
                var position = $('.slider-items').children().index(current);
                var numItems = $('.slider-item').length;
                if(position < numItems-1 )
                { 
                    $('.active').removeClass('active').next().addClass('active');
                } else 
                { 
                    $('.slider-item').removeClass('active').first().addClass('active'); 
                    $('.bullet').removeClass('active').first().addClass('active'); 
                }
            }, 5000);
        });// document ready
    </script>
</body>
</html>