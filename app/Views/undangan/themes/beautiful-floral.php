<!DOCTYPE html>
<html lang="id" class="no-js">

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/css/simplelightbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/beautiful-floral.css">
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/jquery-3.1.0.min.js"></script>
</head>

<body oncontextmenu="return false">
    <div id="over-lay-welcome">
        <div class="row" style="margin:0 auto;">
            <div class="col-md-6 col-sm-12 col-md-offset-3">
                <?php foreach ($rules->getResult() as $set) {
                    if ($set->prokes == 1) { ?>
                        <img class="img-responsive" src="<?php echo base_url() ?>/assets/base/img/prokes.png">
                    <?php }
                    ?>
                    <p>Selamat datang di undangan pernikahan Kami.
                        <br>Gunakan browser Chrome atau Safari agar website tampil sempurna. Gunakan tombol icon menu disamping atau scroll untuk memilih halaman selanjutnya.
                    </p>
                    <br>
                    <p><strong>KETUK UNTUK MELANJUTKAN</a></strong></p>
            </div>
        </div>
    </div>
    <?php 
    foreach ($data->getResult() as $row) {
        $kunci = $row->kunci;
        $youtube = $row->video;
        $salam_pembuka = $row->salam_pembuka;
        $musiknya = "/assets/users/" . $kunci . "/musik.mp3";

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

    <audio id="my_audio" loop src="<?php echo base_url() ?><?= $musiknya ?>"></audio>
    <div class="navbar-mobile text-center">
        <ul>
            <li><a href="#1" class="vs-anchor" title="Beranda"><i class="fa fa-home"></i>
                    <p>Home</p>
                </a></li>
            <li><a href="#2" class="vs-anchor" title="Mempelai"><i class="fa fa-user"></i>
                    <p>Mempelai</p>
                </a></li>
            <li><a href="#3" class="vs-anchor" title="Resepsi"><i class="fa fa-cutlery"></i>
                    <p>Resepsi</p>
                </a></li>
            <?php if ($set->cerita == 1) { ?>
                <li><a href="#4" class="vs-anchor" title="Story"><i class="fa fa-file-text-o"></i>
                        <p>Story</p>
                    </a></li>
            <?php }
                    if ($set->gallery == 1) { ?>
                <li><a href="#5" class="vs-anchor" title="Gallery"><i class="fa fa-camera"></i>
                        <p>Gallery</p>
                    </a></li>
            <?php }
                    if ($set->komen == 1) { ?>
                <li><a href="#6" class="vs-anchor" title="Ucapan"><i class="fa fa-comment"></i>
                        <p>Ucapan</p>
                    </a></li>
            <?php }
                    if ($set->qrcode == 1 && $order[0]->buku_tamu == 1) { ?>
                <li><a href="#" data-toggle="modal" data-target="#sw-qrcode" title="QrCode"><i class="fa fa-qrcode"></i>
                        <p>QrCode</p>
                    </a></li>
            <?php }
                    if ($set->hadiah == 1 && $order[0]->kirim_hadiah == 1) { ?>
                <li><a href="#" data-toggle="modal" data-target="#sw-hadiah" title="Hadiah"><i class="fa fa-gift"></i>
                        <p>Hadiah</p>
                    </a></li>
            <?php } ?>
            <li><a href="#" data-toggle="modal" data-target="#sw-share" title="Bagikan"><i class="fa fa-share-alt"></i>
                    <p>Share</p>
                </a></li>
        <?php } ?>
        </ul>
    </div>
    <div class="mainbag">
        <div vs-anchor="1" class="mainview sw-invitation-wrapper">
            <div class="vs-center-wrap">
                <div class="vs-center">
                    <div class="col-md-12">
                        <div class="sw-invitation-home text-center">
                            <div class="sw-content">
                                <h2>The Wedding</h2>
                                <h3><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></h3>
                                <p><span id="tanggal-wedding"></span><input id="tgl_wedding" type="hidden" value="<?= $tgl_acara ?>" ></p>
                                <div id="clock" class="sw-timer"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section vs-anchor="2" class="mainview sw-mempelai-warpper">
            <div class="over"></div>
            <div class="vs-center-wrap">
                <div class="sw-content-inner">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                        <img class="sw-el-top" src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/img/sw-element-top.png">
                        <p class="sw-opening"><?= nl2br($salam_pembuka) ?></p>
                        <div class="row">
                            <?php if($posisi_mempelai == 0) {  ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="sw-mempelai">
									<figure><img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png"></figure>
									<h2><?= $nama_lengkap_pria ?></h2>
									<p class="sw-binti"> Putra dari Bpk. <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="sw-mempelai">
									<figure><img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png"></figure>
									<h2><?= $nama_lengkap_wanita ?></h2>
									<p class="sw-binti"> Putri dari Bpk <?= $nama_ayah_wanita ?> dan Ibu <?=$nama_ibu_wanita ?></p>
								</div>
							</div>
							<?php if($posisi_mempelai == 1) {  ?>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<div class="sw-mempelai">
									<figure><img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png"></figure>
									<h2><?= $nama_lengkap_pria ?></h2>
									<p class="sw-binti"> Putra dari Bpk. <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></p>
								</div>
							</div>
							<?php } ?>
                        </div>
                        <img class="sw-el-bottom" src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/img/sw-element-bottom.png">
                    </div>
                </div>
            </div>
        </section>
        <section vs-anchor="3" class="mainview sw-akad-resepsi-rapper">
            <div class="vs-center-wrap">
                <div class="container">
                    <div class="sw-content-inner">
                        <div class="row">
                            <?php  $i = 0;
						    foreach($acara as $key => $data){ 
						    $i++;?>
                            <div class="sw-ceremony col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <div class="sw-akad-resepsi text-center">
                                    <div class="sw-icon">
                                        <span class="flaticon-wedding"></span>
                                    </div>
                                    <h3><?= $data->nama_acara ?></h3>
									<p><span id="tanggal-acara<?= $i+1?>"></span><input id="tgl_acara<?= $i+1?>" type="hidden" value="<?= $data->tgl_acara ?>" >
										<br> Jam <?= $data->waktu_mulai ?> - <?= $data->waktu_akhir ?>
										<br> <?= $data->tempat_acara ?><br><?= $data->alamat_acara ?></p>
									<?php if($data->set_countdown == 'Y' && !empty($data->maps)){ ?>
									<a href="#" data-toggle="modal" data-target="#sw-maps" title="Lokasi">Buka di google map</a> <?php } ?>
                                </div>
                            </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php foreach ($rules->getResult() as $set) { ?>
            <?php if ($set->cerita == 1) { ?>
                <section vs-anchor="4" class="mainview sw-story-wrapper" style="background:url('<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/img/cover-prewed.jpg') no-repeat;">
                    <div class="over"></div>
                    <div class="vs-center-wrap">
                        <div class="vs-center">
                            <div class="sw-content-inner">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10 col-md-offset-0 col-lg-offset-1">
                                    <div class="sw-story">
                                        <h2>Kisah Cinta</h2>
                                        <div class="col-md-12">
                                            <div class="main-timeline">
                                                <?php
                                                $no = 0;
                                                foreach ($cerita as $key => $data) {
                                                    $no++;
                                                    if ($no % 2 == 0) { ?>

                                                        <div class="timeline">
                                                            <div class="timeline-icon"></div>
                                                            <div class="timeline-content">
                                                                <span class="date"><?php echo $data['tanggal_cerita']; ?></span>
                                                                <h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
                                                                <p class="description">
                                                                    <?php echo $data['isi_cerita']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="timeline">
                                                            <div class="timeline-icon"></div>
                                                            <div class="timeline-content right">
                                                                <span class="date"><?php echo $data['tanggal_cerita']; ?></span>
                                                                <h4 class="title"><?php echo $data['judul_cerita']; ?></h4>
                                                                <p class="description">
                                                                    <?php echo $data['isi_cerita']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    <?php } ?>


                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <?php if ($set->gallery == 1) { ?>
                <section vs-anchor="5" class="mainview sw-akad-resepsi-rapper">
                    <div class="vs-center-wrap">
                        <div class="vs-center sw-content-inner">
                            <div class="container">
                                <div class="row">
                                    <h2>Galeri Prewedding</h2>
                                    <div class="sw-content-gallery">
                                        <?php foreach ($album as $key => $data) {  ?>
                                            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                                                <div class="sw-gallery">
                                                    <a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci . '/' . $data['album'] ?>.png" class="swipebox"><img src="<?php echo base_url() ?>/assets/users/<?php echo $kunci . '/' . $data['album']; ?>.png" class="img-fluid" />
                                                        <div class="sw-gallery-overlay">
                                                            <i class="fa fa-search-plus"></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
            <section vs-anchor="6" class="mainview sw-form-wrapper">
                <div class="vs-center-wrap">
                    <div class="sw-content-inner text-center">
                        <?php if ($set->komen == 1) { ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-lg-offset-2">
                                    <h2>Beri Ucapan/Doa</h2>
                                    <div class="sw-form">
                                        <form id="guestbook" action="javascript:void();" novalidate="true">
                                            <div class="col-md-5 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($invite) ?>" placeholder="Nama" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <textarea name="komentar" id="komentar" class="form-control" rows="5" placeholder="Pesan" required></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <button type="submit" id="submitKomen" class="btn-loading" data-toggle="modal" data-target="#myModal" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Harap Tunggu"><i class="fa fa-paper-plane-o"></i> Kirim Ucapan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div class="sw-logo-kalaujodoh text-center">
                            <p>Terimakasih Telah Mengunjungi Web Undangan Kami</p>
                            <h3><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></h3>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>
    </div>
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Warning</h4>
                </div>
                <div class="modal-body">
                    <p>Terimakasih sudah mengirim pesan / Doa untuk mempelai</p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Bagikan Undangan</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <ul>
                            <li>
                                <a class="facebook" href="http://www.facebook.com/sharer/sharer.php?u=<?= SITE_UNDANGAN ?>/<?= $web ?>" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="twitter" href="http://twitter.com/share?url=<?= SITE_UNDANGAN ?>/<?= $web ?>" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="wa" href="https://api.whatsapp.com/send?text=<?= SITE_UNDANGAN ?>/<?= $web ?>" target="_blank">
                                    <i class="fa fa-whatsapp"></i>
                                </a>
                            </li>
                        </ul>
                        <p>Klik Sosial media diatas untuk membagikan Undangan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-facebook" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-md">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Buku tamu</h4>
                </div>
                <div class="modal-body">
                    <div class="facebook-content">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v5.0"></script>
                        <div class="fb-comments" data-href="janjihati.s-widodo.com/demo/arabian.html" data-width="" data-numposts="5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-qrcode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-sm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">QrCode Tamu</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <span id="qrcode"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Lokasi</h4>
                </div>
                <div class="modal-body">
                    <div class="social-share text-center">
                        <div class="maps">
                            <?= $maps ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sw-hadiah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Hadiah untuk Mempelai</h4>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-3">
                        <img src=<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/img/love.png alt="donation" style="max-width: 60px;">
                        <h5 class="font-bold text-center">Kirim Hadiah<br><small>Untuk <?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></small></h5>
                    </div>
                    <?php
                    $i = 1;
                    foreach ($rekening->getResult() as $row) {
                        $i++;
                    ?>
                        <div class="row">
                            <div class="col-12" style="text-align:center">
                                <b><?= $row->nama_bank ?> </b><br>
                                <span onClick='copyText(this)'><?= $row->no_rekening ?> <img src=<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/beautiful-floral/img/copy.png style="height:13px;margin-top:-5px;cursor:pointer"></span><br>
                                a/n <?= $row->nama_pemilik ?> <br>

                            </div>
                            <?php if ($row->qrcode_bank != '') { ?>
                                <div style="display:flex;align-items:center;justify-content:center;">
                                    <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/rekening/<?= $row->qrcode_bank ?>" alt="Qris" class="img-responsive">
                                </div>
                            <?php } ?>
                        </div>
                        <hr>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/jquery.countdown.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/jquery.mousewheel.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/viewScroller.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/simple-lightbox.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/sw-main.js"></script>
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/moment-with-locales.js"></script>
    <script>
        var base_url = '<?php echo base_url() ?>';
    </script>
    
    <script src="<?php echo base_url() ?>/assets/themes/beautiful-floral/themes-rsvp/sw-vendor-v2/js/jquery.classyqr.js"></script>
    <script>
        addEventListener("click", function() {
            var
                el = document.documentElement,
                rfs =
                el.requestFullScreen ||
                el.webkitRequestFullScreen ||
                el.mozRequestFullScreen;
            rfs.call(el);
        });
        $(document).ready(function() {
            var kode = <?= json_encode($qrcode) ?>;
            $('#qrcode').ClassyQR({
                create: true,
                type: 'text',
                text: kode
            });

        });
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
        $(".komen").slice(0, 4).show();
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".komen:hidden").slice(0, 4).slideDown();
            if ($(".komen:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
            $('html,body').animate({
                scrollTop: $(this).offset().top
            }, 1500);
        });
        /*=================
         ADD KOMENTAR
        ======================= */
        $('#submitKomen').on('click', function(event) {
            var nama = $('#nama').val();
            var komentar = $('#komentar').val();

            $.ajax({
                url: base_url + '/add_komentar',
                method: "POST",
                data: {
                    nama: nama,
                    komentar: komentar
                },
                async: true,
                dataType: 'html',
                success: function(hasil) {
                    var json = JSON.parse(hasil);
                    var status = json.status;
                    var nama = json.nama;
                    var komentar = json.komentar;
                    console.log(json);

                    if (status == 'sukses') {

                        $('.layout-komen').append("<div class='komen' style='display:block'><div class='col-12 komen-nama'>" + nama + "</div><div class='col-12 komen-isi'>" + komentar + "</div></div>");

                        $(".komen:hidden").slice(0, 100).slideDown();
                        $("html, body").animate({
                            scrollTop: $(document).height()
                        }, 1000);
                        $("#loadMore").fadeOut('slow');

                    }

                }
            });

        });
    </script>

    <script type="text/javascript">
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
            } catch (err) {
                alert('Unable to copy number');
            }
        }
        $('#clock').countdown('<?php echo $clock ?>', function(event) {
            $(this).html(event.strftime('%D:%H:%M:%S'));
        });
        $(document).ready(function() {
            $("#over-lay-welcome").click(function() {
                $("#over-lay-welcome").fadeOut(650);
                $("#my_audio").get(0).play(); //play musik;
            });
        });
    </script>
    <!-- </body></html> -->
</body>

</html>