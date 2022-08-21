<!DOCTYPE html>
<html lang="id">
<head>
    <?php foreach ($mempelai->getResult() as $row) {
        $nama_panggilan_pria = $row->nama_panggilan_pria;
        $nama_lengkap_pria = $row->nama_pria;
        $nama_ayah_pria = $row->nama_ayah_pria;
        $nama_ibu_pria = $row->nama_ibu_pria;
        $nama_panggilan_wanita = $row->nama_panggilan_wanita;
        $nama_lengkap_wanita = $row->nama_wanita;
        $nama_ayah_wanita = $row->nama_ayah_wanita;
        $nama_ibu_wanita = $row->nama_ibu_wanita;
        $posisi_mempelai = $row->posisi_mempelai;
    }
    ?>
    <?php foreach ($data->getResult() as $row){
        $kunci = $row->kunci;
    }
	?>
    <title><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></title> 
    <!-- REQUIRED META AREA	 -->
	<meta charset="UTF-8">
    <meta name=viewport content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta property="og:title" content="<?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?>">
    <meta property="og:description" content="<?php
    echo 'Hello ' . \esc($invite) . '! Kamu Di Undang..';
    ?>">
    <meta name=keywords content="ngulemind,undangan,pernikahan,online,website,wedding,invitation,digital,video">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image" content="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png" >
    <meta property="og:image:alt" content="<?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?>" >
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="icon" href="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.17.3/simplelightbox.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&family=Quicksand:wght@500;600;700&family=Italianno&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/style.css?v=1.0.1" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/twelve/themes/style.css?v=1.2.1">
</head>
<body oncontextmenu="return false">
        <nav class="navbar navbar-expand-lg fixed-bottom  navbar-light bg-light" id="bot-menu">
        <ul class="navbar-nav mx-auto">
            <li class="nav-item active">
            <a class="nav-link" href="#home">
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-house-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z">
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Home
                </span>
            </a>
            </li>
            <?php foreach ($rules->getResult() as $set){
                    if($set->cerita == 1){ ?>
                        <li class="nav-item">
            <a class="nav-link" href="#story">
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-chat-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Story
                </span>
            </a>
            </li>
            <?php } ?>
                        <li class="nav-item">
            <a class="nav-link" href="#couple">
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-heart-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Couple
                </span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#event">
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-calendar2-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5v-1zm8.854 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Event
                </span>
            </a>
            </li>
            <?php if($set->gallery == 1){ ?>
                        <li class="nav-item">
            <a class="nav-link" href="#gallery">
                <svg width=1.0625em height=1em viewBox="0 0 17 16" class="bi bi-image-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M.002 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-12a2 2 0 0 1-2-2V3zm1 9l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094L15.002 9.5V13a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1v-1zm5-6.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Gallery
                </span>
            </a>
            </li>
            <?php }
            if($set->komen == 1){ ?>
            <li class="nav-item">
            <a class="nav-link" href="#guestbook">
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-chat-left-dots-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z">
                </svg>
                <br>
                <span class="d-none d-lg-block">
                Guest Book
                </span>
            </a>
            </li>
            <?php } 
            if($set->qrcode == 1 && $order[0]->buku_tamu == 1){ ?>
            <li class="nav-item">
            <a class="nav-link" href="#test" data-toggle="modal" data-target="#sw-qrcode" >
                <svg width=1em height=1em viewBox="0 0 16 16" class="bi bi-qrcode-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 2h2v2H2V2Z"/>
  <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
  <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
  <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
  <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
</svg>
                <br>
                <span class="d-none d-lg-block">
                QrCode
                </span>
            </a>
            </li> 
            <?php }  ?>
                    </ul>
    </nav>

    <div class="cover">
        <div class="title text-center">
        <div data-aos="fade-up" data-aos-delay="200">
            <img class="mb-3" src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/flower-2.png width=250>
            <h3>Hello, We Are Getting Married </h3>
            <br>
            <br>
            <h2>- Save the date of our wedding. -</h2>
            <br><br>
            <button type=button class="btn btn-lg btn-light btn-wedding open_invitation px-5">Buka Undangan</button>
        </div>
        </div>
                    <img class="img" src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png">
            </div>
        <?php foreach ($data->getResult() as $row){
        $kunci = $row->kunci;
		$youtube = $row->video;
		$salam_pembuka = $row->salam_pembuka;
		$musiknya = "/assets/users/".$kunci."/musik.mp3";
		$quote = $row->quote;
		$sumber_quote = $row->sumber_quote;
    }
    
	if(!empty($countdown->getResult())){
        foreach ($countdown->getResult() as $row){
        $tgl_acara = $row->tgl_acara;
		$clock = $row->tgl_acara.' '.$row->waktu_mulai;
		$maps = $row->maps;
		
        }
	}else{
	    $tgl_acara = $acara[0]->tgl_acara;
		$clock = $acara[0]->tgl_acara.' '.$acara[0]->waktu_mulai;
		$maps = $acara[0]->maps;
	    }
?>
    <section class="header" id="home">
        <div class="title text-center">
        <div data-aos="fade-up">
            <h4>We Are Getting Married</h4>
                            <h1><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></h1>
                        <h2></span><input id="tgl_wedding" type="hidden" value="<?= $tgl_acara ?>" ></h2>

                            <p class="mt-5">
                <i>Kepada Yth <br> Bapak/Ibu/Saudara/i</i>
                </p>
                <h2><?php 
        if(!empty(esc($invite))){
            echo ucwords(esc($invite));
        }else{
        echo "Tamu Undangan";
        }
        ?></h2>
                <p> <?php 
        if(!empty(esc($alamat_tamu))){
            echo ucwords(esc($alamat_tamu));
        }
        ?> </p>
                    </div>
        </div>
                    <img class="img" src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png" >
            </section>

    <?php 
			         if($set->prokes == 1) { ?>
    <div class="story mask_top text-center">
        <section>
            <div class="container" data-aos="fade-up">
                <div class="col-md-12">
                    <h2>Informasi</h2>                </div>
                <div class="col-md-12 pt-4">
                    <div style="max-width:500px;margin:auto"><div style="font-weight:bold;border-bottom:solid 1px #000;display:inline-block;margin-bottom:10px;font-size:1.1rem;">Protokol Covid-19</div> <br><p>Dalam upaya mengurangi penyebaran Covid 19 pada masa pandemi, kami harapkan kedatangan para tamu undangan agar menjalankan protokol yang berlaku.</p><table style="font-size:0.9rem;margin:auto"><tbody><tr><td width=50%> <img src=https://datengdong.com/image/protocol/masker.png alt="masker" style="max-width:80px"><br> Wajib Menggunakan Masker</td><td width=50%> <img src=https://datengdong.com/image/protocol/distance.png alt="distance" style="max-width:80px"><br> Saling Menjaga Jarak di Dalam Acara</td></tr><tr><td width=50%> <img src=https://datengdong.com/image/protocol/salam.png alt="salam" style="max-width:80px"><br> Menggunakan salam namastee sebagai ganti berjabat tangan</td><td width=50%> <img src=https://datengdong.com/image/protocol/wash.png alt="wash" style="max-width:80px"><br> Jaga Kebersihan dengan Mencuci Tangan atau Handsanitizer</td></tr></tbody></table></div>
                </div>
            </div>
        </section>
                </div>
        <?php }  
        if($set->cerita == 1) {?>
    
        <section class="story right-flower" id="story">
        <div class="container">
        <img class="mb-3" src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/flower.png width=250>
        <h2 class="my-4">Our Love Story</h2>
        <div class="col-lg-8 mx-auto">
            <div class="owl-carousel owl-theme" data-aos="fade-up" data-aos-delay="200">
                <?php foreach($cerita as $key => $data) { ?> 
                                <div class="item">
                    <p class="title-story"><?php echo $data['judul_cerita']; ?></p>
                    <p><?php echo $data['isi_cerita']; ?></p>
                    <small><i><span class="date"><?php echo $data['tanggal_cerita']; ?></span> </i></small>
                </div>
            <?php } ?> 
            </div>
        </div>
        </div>
    </section>
    <?php } ?>
    <section class="bridge mask_top-2 mask_bottom" id="couple">
        <div class="d-flex w-100 align-items-center justify-content-center mb-3" data-aos="flip-up" data-aos-delay="200">
            <img src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/leaves-left.png class="d-none d-lg-block" width=100>
            <h2 class="my-0 mx-5"> Groom & Bride </h2>
            <img src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/leaves-right.png class="d-none d-lg-block" width=100>
        </div>

        <div class="col-lg-7 mx-auto">
            <div data-aos="fade-up">
                <?= nl2br($salam_pembuka) ?><br ><br >
            </div>
        </div>
        <div class="col-lg-7 mx-auto">
            <div class="row">
                <div data-aos="fade-down-left" data-aos-easing="ease-out-cubic" data-aos-duration="1000" class="col-lg-6 text-center couples  <?php if($posisi_mempelai == 0) echo 'order-1'; ?>">
                                        <div class="circle-image">
                        <img src=<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png alt="Juliet Photo">
                    </div>
                                        <h2>
                        - <?= $nama_panggilan_wanita ?> -
                        <span class="d-block mt-3"><?= $nama_lengkap_wanita ?></span>
                    </h2>
                    <p>
                        Putri dari Pasangan <br>
                        <b>Bpk <?= $nama_ayah_wanita ?> dan Ibu <?=$nama_ibu_wanita ?></b>
                    </p>
                                            
                    </div>
                <div data-aos="fade-down-right" data-aos-easing="ease-out-cubic" data-aos-delay="100" data-aos-duration="1000" class="col-lg-6 text-center couples <?php if($posisi_mempelai == 1) echo 'order-1'; ?>">
                                        <div class="circle-image">
                        <img src=<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png alt="Romeo Photo">
                    </div>
                                        <h2>
                        - <?= $nama_panggilan_pria ?> - <br>
                        <span class="d-block mt-3"><?= $nama_lengkap_pria ?></span>
                    </h2>
                    <p>
                        Putra dari Pasangan <br>
                        <b>Bpk. <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></b>
                    </p>
              </div>
            </div>
        </div>
    </section>

    <section class="location left-flower" id="event">
        <div class="container">
        <img class="mb-5" src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/flower.png width=250>
        <div class="row justify-content-center">
            <?php  $i = 0;
				    foreach($acara as $key => $data){ 
					$i++;?>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card information shadow border-0">
                    <div class="card-body">
                    <h3><?= $data->nama_acara ?></h3>
                    <p>
                        <b><span id="tanggal-acara<?= $i+1?>"></span><input id="tgl_acara<?= $i+1?>" type="hidden" value="<?= $data->tgl_acara ?>" >
                            <br>Jam <?= $data->waktu_mulai ?> - <?= $data->waktu_akhir ?>
                        </b>
                    </p>
                    <p class="desc-location">
                        <b><?= $data->tempat_acara ?></b> <br>
                        <?= $data->alamat_acara ?>
                    </p>
                    </div>
                </div>
            </div>
            <?php } ?>
                                   
        </div> <br><br>
            
            <div class="col-lg-8 mt-5 mx-auto">
                <div class="row">
                    <div class="col-lg-3 col-6 text-center"  data-aos="fade-right" data-aos-delay="100">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="timer"><span class="days">00</span></h4>
                            <p class="m-0"><b>Days</b></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center" data-aos="fade-right" data-aos-delay="200">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="timer"><span class="hours">00</span></h4>
                            <p class="m-0"><b>Hours</b></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center" data-aos="fade-right" data-aos-delay="300">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="timer"><span class="minutes">00</span></h4>
                            <p class="m-0"><b>Minutes</b></p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 text-center" data-aos="fade-right" data-aos-delay="400">
                        <div class="card">
                        <div class="card-body">
                            <h4 class="timer"><span class="seconds">00</span></h4>
                            <p class="m-0"><b>Seconds</b></p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <br><br>
                <?php if($set->lokasi == 1 && !empty($maps)) {?>
                                    <a href="#" data-toggle="modal" data-target="#sw-maps" title="Lokasi" class="btn btn-lg btn-light btn-wedding px-5 mt-4" data-aos="fade-up" data-aos-delay="500">Open Google Map</a>
                <?php } ?>
            <br><br><br>
                    </div>
    </section>
        <?php if($set->gallery == 1) {?>
        <section class="gallery mask_top-2 mask_bottom" id="gallery">
                <div class="container">
            <div class="d-flex w-100 align-items-center justify-content-center mb-5">
                <img src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/leaves-left.png class="d-none d-lg-block" width=100>
                <h2 class="my-0 mx-5">Our Gallery</h2>
                <img src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/leaves-right.png class="d-none d-lg-block" width=100>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <?php  foreach($album as $key => $data) {  ?>
                                        <div class="col-md-3 col-6 py-2 px-2 frame" data-aos="zoom-in" data-aos-delay="100">
                        <a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png"><img src=<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png class="img-fluid"></a>
                    </div>
                    <?php } ?>

                                    </div>
            </div>
        </div>
        
        <?php if (!empty($youtube)) {?>
                <div class="container" data-aos="fade-up">
            <div class="col-md-12 mb-5 mt-5">
                <h2 class="text-blue display-4">Our Video</h2>
            </div>
                        <div class="col-md-8 offset-md-2 mb-4">
                <div class="videoWrapper">
                    <?php if($youtube != ""){ 
								$embed = str_replace("youtu.be","www.youtube.com/embed","$youtube");
								$unik = str_replace("https://youtu.be","","$youtube");
								$unikfinal = str_replace("/","","$unik");
						?>
                    	<iframe width=560 height=349 src=<?= $embed ?> frameborder="0" allowfullscreen></iframe>
									<?php }?>
                </div>
                
            </div>
                    </div>
        <?php } ?>
        
            </section>
        <?php } if($set->quote == 1) {?>
    
        <section class="text-center mt-5">
        <div class="container">
            <img class="m-3" src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/flower.png width=250>
            <div class="col-md-12 pt-4">
                    <p><span>"</span><?= \esc($quote) ?><span>"</span></p>
                    <h3 class="caption mb-5"><?= \esc($sumber_quote) ?></h3>
                            </div>
        </div>
    </section>
    
        <?php } if($set->komen == 1) {?>
        <section class="guestbook left-flower right-flower" id="guestbook">
        <div class="container">
            <img class="mb-3" src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/images/content/flower-2.png width=250>
            <h2 class="my-4">Beri Ucapan</h2>
        </div>
                <div class="container">
            <div class="col-lg-9 mx-auto">
                <div class="card border-0 shadow">
                <div class="card-body text-left">
                        <form id="guestbook" action="javascript:void();" novalidate="true">
                       <div class="form-group">
                            <label for="guestName">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($invite) ?>" placeholder="Your Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan/Doa</label>
                            <textarea name="komentar" id="komentar" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" id="submitKomen" class="btn btn-light btn-wedding">Kirim <img src=<?php echo base_url() ?>/assets/themes/twelve/images/send-b.png alt="send icon" style="width:20px;margin-left:5px"></button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
                
                <div class="show-guest-book px-2 mt-5">
            <div class="container text-left shadow">
                <div class="row justify-content-md-center layout-komen">
                    <?php  foreach($komen as $key => $data) { ?>
                                            <div class="col-md-12 mb-3 komen">
                            <div class="media px-3 media-comment">
                                <img class="rounded-circle mr-3 d-none d-sm-block d-md-block d-lg-block" src=https://na.ui-avatars.com/api/?name=<?= str_replace(" ", "-", $data['nama_komentar']); ?>&size=50&background=bf616b&color=ffffff alt="Image Avatar">
                                <div class="media-body">
                                    <div class="mb-2">
                                        <h5 class="h6 mb-0 text-secondary"><?= \esc($data['nama_komentar']); ?></h5>
                                    </div>

                                    <p><?= \esc($data['isi_komentar']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                                    </div>
            </div>
        </div>
            </section>
        <?php } } ?>
        <footer>
        <div class="container">
            <div class="col-md-12">
                <!--<a href="https://datengdong.com" title="Undangan Pernikahan Online"><img src=<?php echo base_url() ?>/assets/themes/twelve/images/logo-color.png alt="Logo datengdong"></a>-->
                <!--                <small>Website Undangan Pernikahan Online</small>-->
                            </div>
        </div>
    </footer>
            <div style="height:50px;width:60px;position: absolute;bottom:0;z-index:-1;visibility: hidden;">
        <audio id="player" loop>
            <source src=<?php echo base_url() ?><?= $musiknya ?> type=audio/mp3 ></audio>
    </div>
    <div class="play-pause btn-play-pause" id="button-control"><img src=<?php echo base_url() ?>/assets/themes/twelve/images/play-pause.svg alt="play pause" width=25px></div>
                <?php foreach ($rules->getResult() as $set){ 
			if($set->hadiah == 1 && $order[0]->kirim_hadiah == 1) { ?><button type=button class="btn-donation" data-toggle="modal" data-target="#modalGift">
        <img src=<?php echo base_url() ?>/assets/themes/twelve/images/gift-donation.png alt="donation" style="width:18px;margin-right:5px"> Kirim Hadiah
    </button><?php } }?>
    <div class="modal fade" id="modalGift" tabindex="-1" role="dialog" aria-labelledby="modalGiftLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalGiftLabel">Kirim Hadiah</h5>
                    <button type=button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src=<?php echo base_url() ?>/assets/themes/twelve/images/love.png alt="donation" style="max-width: 60px;">
                        <h5 class="font-bold text-center">Kirim Hadiah<br><small>Untuk <?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?> </small></h5>
                    </div>
                    <?php 
                    $i=1;
                    foreach ($rekening->getResult() as $row){ 
                    $i++;
                    ?> 
                    <div class="row">
                        <div class="col-12" style="text-align:center">
                            <b><?= $row->nama_bank ?> </b><br>
                                                        <span onClick='copyText(this)'><?= $row->no_rekening ?> <img src=<?php echo base_url() ?>/assets/themes/twelve/images/copy.png style="height:13px;margin-top:-5px;cursor:pointer"></span><br>
                                                        a/n <?= $row->nama_pemilik ?> <br>
                            
                        </div>
                        <?php if($row->qrcode_bank !=''){ ?>
                        <div class="col-sm-10 offset-sm-1">
                            <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/rekening/<?= $row->qrcode_bank ?>" alt="Qris" class="w-100">
                        </div>
                        <?php } ?>
                    </div>
                    <hr>
                    <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="modal fade" id="sw-maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false"
	data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
			    <div class="text-center">
                        <h5 class="font-bold text-center">Lokasi Acara</h5>
					<div class="maps">
			            <?= $maps ?>
		            </div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="sw-qrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false"
	data-backdrop="static">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				
			</div>
			<div class="modal-body">
			    <div class="text-center">
                        <h5 class="font-bold text-center">QrCode Tamu</h5>
					<div class="maps">
			            <span id="qrcode"></span>
		            </div>
				</div>
			</div>
		</div>
	</div>
</div>

    </div>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js></script>
    <script src=https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.17.3/simple-lightbox.min.js></script>
    <script src=https://unpkg.com/aos@2.3.1/dist/aos.js></script>
            <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" >
    <script src=https://cdn.plyr.io/3.6.8/plyr.js></script>
    <script src=<?php echo base_url() ?>/assets/themes/twelve/js/musicv2.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js></script>
        <script src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/custom.js></script>
        <script src=<?php echo base_url() ?>/assets/themes/twelve/themes/twelve/moment-with-locales.js></script>
            <script src="<?php echo base_url() ?>/assets/themes/floral/themes-rsvp/sw-vendor/js/jquery.classyqr.js"></script>
<script>var base_url = '<?php echo base_url() ?>';</script>
<script>
addEventListener("click", function() {
    var
          el = document.documentElement
        , rfs =
               el.requestFullScreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
    ;
    rfs.call(el);
});
$(document).ready(function() {
var kode = <?=json_encode($qrcode)?>;
$("#qrcode").ClassyQR({
   create:true,
   type:'text',
   text: kode
  });
  $("#submitKomen").on('click', function(event) {
        var nama =  $("#nama").val();
        var komentar =  $("#komentar").val();

        $.ajax({
            url : base_url+'/add_komentar',
            method : "POST",
            data : {nama: nama,komentar: komentar},
            async : true,
            dataType : 'html',
            success: function(hasil){
                var json = JSON.parse(hasil);
                var status = json.status;
                var nama = json.nama;
                var komentar = json.komentar;
                if(status == 'sukses'){
                    $(".layout-komen").append("<div class='col-md-12 mb-3 komen'><div class='media px-3 media-comment'><img class='rounded-circle mr-3 d-none d-sm-block d-md-block d-lg-block' src='https://na.ui-avatars.com/api/?name="+nama+"&size=50&background=bf616b&color=ffffff' alt='Image Avatar'><div class='media-body'><div class='mb-2'><h5 class='h6 mb-0 text-secondary'>"+nama+"</h5></div><p>"+komentar+"</p></div></div></div>");
                    $(".komen:hidden").slice(0, 100).slideDown();
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                }
               
            }
        });

    });
});
</script>
    <script>
   var i = <?php echo count($acara) ?>;
     //set indonesian format
    for(let a = 1; a <= i+1; a++){
        moment.locale('id');
        var tgl = $('#tgl_acara'+a+'').val();
        $('#tanggal-acara'+a+'').html(moment(tgl).format('dddd, Do MMMM YYYY'));
        moment.locale('id');
        var tgl_wedding = $('#tgl_wedding').val();
        $('#tanggal-wedding').html(moment(tgl_wedding).format('dddd, Do MMMM YYYY'));
    }
    var countDownDate=new Date('<?php echo $clock ?>').getTime(),x=setInterval(function(){var e=(new Date).getTime(),n=countDownDate-e,t=Math.floor(n/864e5),a=Math.floor(n%864e5/36e5),o=Math.floor(n%36e5/6e4),m=Math.floor(n%6e4/1e3);document.getElementsByClassName("days")[0].innerHTML=t,document.getElementsByClassName("hours")[0].innerHTML=a,document.getElementsByClassName("minutes")[0].innerHTML=o,document.getElementsByClassName("seconds")[0].innerHTML=m,n<0&&(clearInterval(x),document.getElementsByClassName("expired").innerHTML="EXPIRED")},1e3);
        
        AOS.init();
        $('.gallery a').simpleLightbox({
        docClose: false,
        disableScroll: true,
        disableRightClick: true
    });
        window.addEventListener("contextmenu", function(e) {
            e.preventDefault()
        }, !1);
        function copyText(element) {
            var range, selection, worked;

            if (document.body.createTextRange) {
                range = document.body.createTextRange();
                range.moveToElementText(element);
                range.select();
            } else if (window.getSelection) {
                selection = window.getSelection();
                range = document.createRange();
                range.selectNodeContents(element);
                selection.removeAllRanges();
                selection.addRange(range);
            }

            try {
                document.execCommand('copy');
                alert('Number copied');
            }
            catch (err) {
                alert('Unable to copy number');
            }
        }
    
    
    </script>
    </body>
</html>
