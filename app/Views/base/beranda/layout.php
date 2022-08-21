<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title> <?php if($title != 'Beranda') { echo $title.' -'; } ?> <?= SITE_NAME ?> | Unik, Murah, Modern
    </title>
    <meta name="theme-color" content="#7ed9fc">
    <meta name="msapplication-navbutton-color" content="#7ed9fc">
    <meta name="apple-mobile-web-app-status-bar-style" content="#7ed9fc">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico">
    <link rel="apple-touch-icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>/assets/base/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>/assets/base/img/favicon.ico">
    <meta name="robots" content="index, follow"/>
    <meta name="description" content="<?= SITE_NAME ?> adalah layanan undangan online. Yaitu undangan yang dikemas dalam bentuk web yang praktis dan mudah untuk digunakan maupun dibagikan. Selain itu kami juga menerima jasa pembuatan undangan cetak maupun Video.">
    <meta name="keywords" content="undangan digital,undangan online,undangan pernikahan,undangan murah, undangan praktis,undangan nikah,undangan website,creative digital,digital marketing lampung, undangan cetak, udangan kartu,undangan lampung murah,undangan online lampung">
    <meta name="author" content="Undangan Online | Unik, Murah, Modern">
    <meta http-equiv="Copyright" content="Undangan Online | Unik, Murah, Modern">
    <meta name="copyright" content="Undangan Online | Unik, Murah, Modern">
    <meta property="og:type" content="article"/>
    <meta property="profile:first_name" content="Undangan Online | Unik, Murah, Modern"/>
    <meta property="profile:last_name" content="Undangan Online | Unik, Murah, Modern"/> 
    <meta property="profile:username" content="Undangan Online | Unik, Murah, Modern"/>
    <!-- facebook -->
    <meta property="og:title" content="Undangan Online | Unik, Murah, Modern"/>
    <meta property="og:type" content="blog">
    <meta property="og:description" content="<?= SITE_NAME ?> adalah layanan undangan online. Yaitu undangan yang dikemas dalam bentuk web yang praktis dan mudah untuk digunakan maupun dibagikan. Selain itu kami juga menerima jasa pembuatan undangan cetak maupun Video."/>
    <meta property="og:image" content="<?php echo base_url() ?>/assets/base/img/favicon.ico"/>
    <meta property="og:url" content="<?php echo base_url() ?>"/>
    <meta property="og:site_name" content="Undangan Online | Unik, Murah, Modern"/>
    <!-- google -->
    <meta itemprop="name" content="Undangan Online | Unik, Murah, Modern"/>
    <meta itemprop="description" content="<?= SITE_NAME ?> adalah layanan undangan online. Yaitu undangan yang dikemas dalam bentuk web yang praktis dan mudah untuk digunakan maupun dibagikan. Selain itu kami juga menerima jasa pembuatan undangan cetak maupun Video."/>
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/beranda/themes/assets/css/sw-main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/beranda/themes/assets/css/sw-responsive.css">
    <!-- </head> -->
  </head>
  <body oncontextmenu="return false">
    <header class="header">
      <nav class="navbar-me navbar navbar-default" id="mainNav">
        <div class="container">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation
            </span>
            <i class="fa fa-bars">
            </i>
          </button>
          <a class="navbar-brand pull-left" href="<?php echo base_url() ?>" title="Undangan Online | Unik, Murah, Modern">
            <img class="img-responsive" src="<?php echo base_url() ?>/assets/base/img/logo4.png" alt="Undangan Online | Unik, Murah, Modern">
          </a>          
          <div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
            <ul class="nav navbar-nav main-navbar-nav">
              <li>
                <a href="<?php if($title !='Beranda') { echo  '/'; } ?>#">Beranda
                </a>
              </li>
              <li>
                <a class="nav-link js-scroll-trigger" href="<?php if($title !='Beranda') { echo  '/'; } ?>#fitur">Fitur
                </a>
              </li>
              <li>
                <a class="nav-link js-scroll-trigger" href="<?php if($title !='Beranda') { echo  '/'; } ?>#themes">Undangan Website
                </a>
              </li>
              <li>
                <a class="nav-link js-scroll-trigger" href="<?php if($title !='Beranda') { echo  '/'; } ?>#themes_video">Undangan Video
                </a>
              </li>
              <li>
                <a class="btn sw-button btn-publish btn-login" href="<?= base_url('login') ?>">
                  <i class="fa fa-user">
                  </i> Login
                </a>
              </li>
              </li>
            </ul> 
          </div> 
          <!-- /.navbar-collapse -->                
        </div>
      </nav>
    </header>

<?php 
            echo view($view);
            ?>
  <div class="navbar-footer text-center">
    <ul>
      <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i><p>Home</p></a></li>
      <li><a href="<?php echo base_url() ?>/tema"><i class="fa fa-globe"></i><p>Tema Web</p></a></li>
      <li><a href="<?php echo base_url() ?>/tema_video"><i class="fa fa-youtube-play "></i><p>Tema Video</p></a></li>
    </ul>
  </div>
  <!-- FOOTER -->
<footer>
  <div class="waves-effect top" style="background: url('<?php echo base_url() ?>/assets/beranda/themes/img/waves-top.png');"></div>
  <div class="waves-effect bottom" style="background: url('<?php echo base_url() ?>/assets/beranda/themes/img/waves-bottom.png');"></div>
    <div class="container">
      <div class="row">
        <div class="footer-widget">
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 clearfix">
            <div class="footer-widget">
              <div class="footer_content">
                <div class="about-us">
                  <img class="img-responsive" src="<?php echo base_url() ?>/assets/base/img/logo4.png" style="max-height:80px" alt="Undangan Online | Unik, Murah, Modern">
                  <p><?= SITE_NAME ?> adalah layanan undangan pernikahan online. Yaitu undangan yang dikemas dalam bentuk web yang praktis dan mudah untuk digunakan maupun dibagikan.
                  </p>
                </div>
                <div class="footer-media">
                  <h3>Follow Us
                  </h3>
                  <ul>
                    <li>
                      <a href="https://fb.me/ngulemind.online" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true">
                        </i>
                      </a>
                    </li>
                    <li>
                      <a href="https://www.instagram.com/ngulemind.online" target="_blank">
                        <i class="fa fa-instagram" aria-hidden="true">
                        </i>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearfix">
            <div class="footer-widget">
              <div class="title_widget">
                <h3>Our Pages
                </h3>
              </div>
              <div class="footer_content">
                <div class="category">
                  <ul>
                    <li>
                      <a href="<?= base_url() ?>/order">
                        <i class="fa fa-angle-right">
                        </i> Mendaftar
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url() ?>/tema">
                        <i class="fa fa-angle-right">
                        </i> Undangan Website
                      </a>
                    </li>
                    <li>
                      <a href="<?= base_url() ?>/tema_video">
                        <i class="fa fa-angle-right">
                        </i> Undangan Video
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 clearfix">
            <div class="footer-widget">
              <div class="title_widget">
                <h3>Informasi
                </h3>
              </div>
              <div class="footer_content">
                <ul class="address">
                  <li>
                    <i class="fa fa-phone">
                    </i>
                    <span>Phone: <?= $setting[0]->no_wa ?>
                    </span>
                  </li>
                  <li>
                    <i class="fa fa-envelope-o">
                    </i>
                    <span>
                      <a href="mailto:<?= $setting[0]->email ?>">Email: <?= $setting[0]->email ?>
                      </a>
                    </span>
                  </li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <div class="copyright">
    <div class="container">
      <div class="row text-center">
        <p>Copyright &#169; 
          <?= date('Y') ?> 
          <?= SITE_NAME ?>. All Rights Reserved
        </p>
      </div>
    </div>
  </div>
</footer>
  <!-- End footer -->
  <!-- LIVE CHAT -->
  
<div id="show_chat_to_top">
  <a href="https://api.whatsapp.com/send?phone=<?= $setting[0]->no_wa; ?>&text=<?= $setting[0]->pesan_wa; ?>" target="_blank" class="live_chat" data-toggle="tooltip" data-placement="top" title="Hubungi Kami"><i class="fa fa-comment-o fa-lg"></i></a>
  <a href="#" id="back-to-top" data-toggle="tooltip" data-placement="top" title="Back to top">↑</a>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/beranda/themes/assets/js/sw-plugins.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js">
</script>
<script src="<?php echo base_url() ?>/assets/beranda/themes/assets/js/sw-main.js">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollReveal.js/2.0.0/scrollReveal.js">
</script>
<script src="<?php echo base_url() ?>/assets/beranda/themes/assets/js/particles.js">
</script>
<script src="<?php echo base_url() ?>/assets/beranda/themes/assets/js/sw-particles.js">
</script>
<script type="text/javascript">
  $('.sw-counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');
    $({
      countNum: $this.text()}
     ).animate({
      countNum: countTo
    }
               ,
               {
      duration: 1000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      }
      ,
      complete: function() {
        $this.text(this.countNum);
        //alert('finished');
      }
    }
              );
  }
    );
    $(document).ready(function(){
    $('.btn-demo').on('click',function(){
            // get data from button edit
            const link_video = $(this).data('link');
            const nama_tema = $(this).data('nama');
            // Set data to Form Edit
            $('.demo-video').html(link_video);
            $('.nama_tema').html(nama_tema)
            // Call Modal Edit
            $('#sw-demo').modal('show');
        });
        $('#sw-demo').on('hide.bs.modal', function(){
        $('.demo-video').html('');
    });
    });
</script>
<!-- Facebook Pixel Code -->
<!-- </body></html> -->
</body>
</html>
