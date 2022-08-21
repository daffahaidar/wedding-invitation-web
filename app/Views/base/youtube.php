<!DOCTYPE html>
<html>
  <head>
    <title><?= SITE_NAME ?> - Digital Invitation Indonesia</title>
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Undangan digital berupa website untuk pernikahanmu. Lebih praktis, keren dan kekinian...  ">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#6c5ce7" />
    <meta name="author" content="hambaAllah">

    <!-- Required CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/line-icons.css">
    <link type="text/css" href="<?php echo base_url() ?>/assets/base/css/froala_blocks.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/pikaday.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/base/css/croppie.min.css">

  </head>

  <body oncontextmenu="return false">
    <header>
        <div class="container">
          <nav class="navbar navbar-expand-md fixed-top">
            <div class="container">
              <a class="navbar-brand navbar-order" href="<?php echo base_url() ?>">
                <img src="<?php echo base_url() ?>/assets/base/img/logo.png" height="35" alt="image">
              </a>
            </div>
          </nav>
        </div>
    </header>

    <div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
        <section class="fdb-block" style="padding-top: 20px;flex:1; ">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-md-8 col-lg-8 col-xl-6">

                <div class="row">
                  <div class="col text-center">
                    <h1 style="color: #3498db;margin-bottom:0px;">Tutorial!</h1>
                    <p tyle="font-size: 15px;font-weight:500; ">Cara menambahkan video ke undangan </p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col text-left">
                    <p tyle="font-size: 15px;font-weight:500; ">1. Pastikan video kamu sudah di upload di Youtube.com</p>
                    <p tyle="font-size: 15px;font-weight:500; ">2. Setelah itu buka vide kamu di youtube dan tekan tombol bagikan</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube1.png" width="100%">
                    <p tyle="font-size: 15px;font-weight:500; ">3. Akan muncul tampilan seperti gambar di bawah ini, copy link nya dengan menekan tombol salin</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube2.png" width="100%">
                    <p tyle="font-size: 15px;font-weight:500; ">4. Ingat!! pastikan link youtube nya formatnya sama seperti digambar <strong>https://youtu.be/</strong> </p>
                    <p tyle="font-size: 15px;font-weight:500; ">5. Terakhir tinggal kamu masukkan linknya ke dalam form yang sudah disediakan kemudian simpan</p>
                    <img src="<?= base_url() ?>/assets/base/img/tutorial/youtube3.png" width="100%">
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>
    </div>

    <footer class="fdb-block footer-small footer">
        <div class="container">
        <div class="col-12 text-lg-left">
            <p class="lead footer-social">
              <a href="#" class="mx-2"><i class="lni-twitter-filled" aria-hidden="true"></i></a>
              <a href="#" class="mx-2"><i class="lni-facebook-filled" aria-hidden="true"></i></a>
              <a href="#" class="mx-2"><i class="lni-instagram-filled" aria-hidden="true"></i></a>
            </p>
          </div>
            <div class="row text-center">
            <div class="col">
                <p class="text-footer">Copyright &#169; 2020 <?= SITE_NAME ?>. All Rights Reserved</p>
            </div>
            </div>
        </div>
    </footer>

      
    <script src="<?php echo base_url() ?>/assets/base/js/jquery-min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/jquery.nav.js"></script>    
    <script src="<?php echo base_url() ?>/assets/base/js/jquery.easing.min.js"></script>     
    <script src="<?php echo base_url() ?>/assets/base/js/main.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/moment-with-locales.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
    <script src="<?php echo base_url() ?>/assets/base/js/croppie.min.js"></script>
  </body>
</html>