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
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dynalight&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link href="<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/style.css?v=1.0.1" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/watercolor1/themes/style.css?v=1.0.1">
</head>
<body>
    <div id="over-lay-welcome">
            <div class="row justify-content-md-center" style="margin:0 auto;">
                <div class="col-md-6 col-sm-12 col-md-offset-3">
                    <?php foreach ($rules->getResult() as $set){ 
			         if($set->prokes == 1) { ?>
                    <img class="img-responsive" src="<?php echo base_url() ?>/assets/base/img/prokes.png">
                    <?php }
                     ?>
                   <p>Selamat datang di undangan pernikahan Kami.
					<br>Gunakan browser Chrome atau Safari agar website tampil sempurna. Scroll untuk melihat detail undangan. </p>
				<br>
                    <p><strong>KETUK UNTUK MELANJUTKAN</a></strong></p>
                </div>
            </div>
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
    <section class="full header pt-0 pb-0">
        <div class="container">
            <div class="justify-content-center mt-3" data-aos="fade-down" data-aos-duration="2000">
                <h5>TOGETHER <br> WITH THEIR FAMILIES</h5>
            </div>
            <div class="col-md-12 header-frame" data-aos="fade-down" data-aos-duration="1000">
                <h1><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." <span>&</span> ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." <span>&</span> ".$nama_panggilan_pria;?></h1>
                                <p class="mt-3"><span id="tanggal-wedding"></span><input id="tgl_wedding" type="hidden" value="<?= $tgl_acara ?>" ></p>
            </div>
                        <div class="col-md-12 to" data-aos="fade-down" data-aos-duration="3000">
                <i>Kepada Yth<br >Bapak/Ibu/Saudara/i</i>
                <h4 class="text-secondary mt-1"><?php 
        if(!empty(esc($invite))){
            echo ucwords(esc($invite));
        }else{
        echo "Tamu Undangan";
        }
        ?></h4>
                <?php 
        if(!empty(esc($alamat_tamu))){
            echo ucwords(esc($alamat_tamu));
        }
        ?>            </div>
                    </div>
        <div class="header-footer"></div>
    </section>
    
    <section>
        <div class="container">
            <div class="col-md-12">
                                    <h2 class="text-secondary">GROOM <span>&</span> BRIDE</h2>
                            </div>
            <div class="col-md-10 offset-md-1">
                <?= nl2br($salam_pembuka) ?><br ><br >
            </div>
            <div class="row mt-5">
                <div data-aos="fade-up" data-aos-delay="100" class="col-md-6 mb-5  <?php if($posisi_mempelai == 0) echo 'order-1'; ?>">
                                        <div class="row">
                        <div class="col-md-12 px-4 couple-ring girl">
                            <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png" alt="Juliet Photo" class="img-fluid">
                        </div>
                    </div>
                                        <h3 class="caption display-4"><?= $nama_lengkap_wanita ?></h3>
                    <p class="font-weight-bold">Putri dari Pasangan <br> Bpk <?= $nama_ayah_wanita ?> dan Ibu <?=$nama_ibu_wanita ?></p>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="col-md-6 mb-5 <?php if($posisi_mempelai == 1) echo 'order-1'; ?>">
                                        <div class="row">
                        <div class="col-md-12 px-4 couple-ring man">
                            <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png" alt="Romeo Photo" class="img-fluid">
                        </div>
                    </div>
                                        <h3 class="caption display-4"><?= $nama_lengkap_pria ?></h3>
                    <p class="font-weight-bold">Putra dari Pasangan <br>  Bpk. <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></p>
              </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container" style="max-width:1100px">
            <div class="row justify-content-md-center">
                <?php  $i = 0;
				    foreach($acara as $key => $data){ 
					$i++;?>
                    <div class="col-md-4 mt-4 information-wrap" data-aos="fade-right">
                        <div class="information">
                            <h4 class="text-secondary mt-5"><?= $data->nama_acara ?></h4>
                            <p><span id="tanggal-acara<?= $i+1?>"></span><input id="tgl_acara<?= $i+1?>" type="hidden" value="<?= $data->tgl_acara ?>" >
                            <br>Jam <?= $data->waktu_mulai ?> - <?= $data->waktu_akhir ?></p>
                            <p class="font-weight-bold"><?= $data->tempat_acara ?><br><?= $data->alamat_acara ?></p>
                            <div class="d-flex justify-content-center mt-4">
                                <img src=<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/images/mahkota.png alt="mahkota" style="max-height:30px">
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
        </div>
    </section>
    <?php if($set->lokasi == 1 && !empty($maps)) {?>
                        <section class="map my-5">
                <div class="container">
                    <div class="col-md-12">
                        <h2 class="text-secondary">Map Location</h2>
                    </div>
                    <div class="col-md-12 mt-4">
                        <div class="mapouter"><div class="gmap_canvas"><?= $maps ?></div></div>
                    </div>
                </div>
            </section>
    <?php }
        if($set->gallery == 1) {?> 
        <section class="gallery">
        <div class="container" style="max-width:1000px">
            <div class="col-md-12">
                <h2 class="text-secondary">Our Gallery</h2>
            </div>
            <div class="row mt-5">
                <?php  foreach($album as $key => $data) {  ?>
                <div class="col-md-3 col-6 py-2 px-2 frame" data-aos="zoom-in" data-aos-delay="100">
                    <a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png"><img src="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png" alt="Gallery 1" class="img-fluid"></a>
                </div>
                     <?php } ?>           
            </div>
        </div>
    </section>
        <?php } if($set->cerita == 1) {?>
        <section>
        <div class="container" style="max-width:1000px">
            <div class="col-md-12 mb-5">
                <h2 class="text-secondary">Our Love Story</h2>
            </div>
            <div class="col-md-12 text-left">
                <div class="owl-carousel">
                    <?php foreach($cerita as $key => $data) { ?> 
                        <div class="p-2" data-aos="fade-up" data-aos-delay="100">
                            <h4 class="mt-0 mb-3"><?php echo $data['judul_cerita']; ?></h4>
                            <small class="pull-right d-block mb-2"><span class="date"><?php echo $data['tanggal_cerita']; ?></span></small>
                            <p><?php echo $data['isi_cerita']; ?></p>
                        </div>
                        <?php } ?> 
                    </div>
            </div>
        </div>
    </section>
        <?php } if (!empty($youtube)) {?>
        <section class="video">
        <div class="container">
            <div class="col-md-12 mb-5">
                <h2 class="text-secondary">Our Video</h2>
            </div>
                        <div class="col-md-12 mb-4">
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
    </section>
        <?php } if($set->quote == 1) {?>
        
        <section>
        <div class="container" data-aos="flip-down">
            <div class="d-flex justify-content-center mb-5">
                <img src=<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/images/mahkota-t.png alt="mahkota" style="max-height:40px">
            </div>
            <div class="col-md-12 pt-4">
                                    <p><span>"</span><?= \esc($quote) ?><span>"</span></p>
                    <h5 class="caption text-secondary"><?= \esc($sumber_quote) ?></h5>
                            </div>
            <div class="d-flex justify-content-center mt-5">
                <img src=<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/images/mahkota-b.png alt="mahkota" style="max-height:40px">
            </div>
        </div>
    </section>
        <?php } ?>
        <section class="countdown">
        <div class="container">
            <div class="col-md-12 mb-5">
                <h2 class="text-secondary">Time To Happy Day</h2>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <span class="expired"></span>
                </div>
                <div class="col-md-3 col-6 mb-2" data-aos="fade-left" data-aos-delay="100">
                    <div class="timer">
                        <span class="days">00</span>
                        <h5 class="timer-caption">Days</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-2" data-aos="fade-left" data-aos-delay="200">
                    <div class="timer">
                        <span class="hours">00</span>
                        <h5 class="timer-caption">Hours</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-2" data-aos="fade-left" data-aos-delay="300">
                    <div class="timer">
                        <span class="minutes">00</span>
                        <h5 class="timer-caption">Minutes</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-2" data-aos="fade-left" data-aos-delay="400">
                    <div class="timer">
                        <span class="seconds">00</span>
                        <h5 class="timer-caption">Seconds</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
            if($set->komen == 1){ ?>
        <div class="container">
        <div class="col-md-12 mb-5">
            <h2 class="text-secondary">Beri Ucapan</h2>
        </div>
    </div>
    <section class="pt-1 block mx-2">
                <div class="container">
            <div class="col-md-12 text-left">
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
                        <button type=submit id="submitKomen" class="btn btn-primary px-5">Kirim <img src=<?php echo base_url() ?>/assets/themes/watercolor1/images/send-w.png alt="send icon" style="width:20px;margin-left:5px"></button>
                    </div>
                </form>
            </div>
        </div>
                
        <div class="show-guest-book px-2 mt-5">
            <div class="container text-left">
                <div class="row justify-content-md-center layout-komen">
                        <?php  foreach($komen as $key => $data) { ?>
                        <div class="col-md-12 mb-3 komen">
                            <div class="media px-3 media-comment">
                                <img class="rounded-circle mr-3 d-none d-sm-block d-md-block d-lg-block" src=https://na.ui-avatars.com/api/?name=<?= str_replace(" ", "-", $data['nama_komentar']); ?>&size=50 alt="Image Avatar">
                                <div class="media-body">
                                    <div class="mb-2">
                                        <h5 class="h6 mb-0"><?= \esc($data['nama_komentar']); ?></h5>
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
            <?php }  ?>
        <footer class="py-4">
    </footer>
<div style="height:50px;width:60px;position: absolute;bottom:0;z-index:-1;visibility: hidden;">
        <audio id="player" loop>
            <source src="<?php echo base_url() ?><?= $musiknya ?>" type="audio/mp3" ></audio>
    </div>
    <div class="play-pause btn-play-pause" id="button-control"><img src=<?php echo base_url() ?>/assets/themes/watercolor1/images/play-pause.svg alt="play pause" width=25px></div>
                <?php if($set->hadiah == 1 && $order[0]->kirim_hadiah == 1) { ?>
                <button type=button class="btn-donation" data-toggle="modal" data-target="#modalGift">
        <img src=<?php echo base_url() ?>/assets/themes/watercolor1/images/gift-donation.png alt="donation" style="width:18px;margin-right:5px"> Kirim Hadiah
    </button>
    <?php } if($set->qrcode == 1 && $order[0]->buku_tamu == 1) { ?>
                <div class="btn-qrcode" id="button-control" data-toggle="modal" data-target="#modalQrCode"><img src=<?php echo base_url() ?>/assets/themes/watercolor1/images/qrcode.png alt="qrcode" width=25px></div>
    <?php } } ?>
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
                        <h5 class="font-bold text-center">Kirim Hadiah<br><small>Untuk <?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></small></h5>
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
        <div class="modal fade" id="modalQrCode" tabindex="-1" role="dialog" aria-labelledby="modalQrCodeLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalQrCodeLabel">QrCode Tamu</h5>
                    <button type=button class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
			    <div class="text-center">
 					<div class="maps">
			            <span id="qrcode"></span>
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
    <script src=<?php echo base_url() ?>/assets/themes/watercolor1/js/musicv2.js?v=1.0.0></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js></script>
     <script src=<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/moment-with-locales.js></script>
     <script src="<?php echo base_url() ?>/assets/themes/watercolor1/themes/watercolor1/jquery.classyqr.js"></script>
<script>var base_url = '<?php echo base_url() ?>';</script>
<script>
$(document).ready(function() {
$("#over-lay-welcome").click(function() {
			$("#over-lay-welcome").fadeOut(650);
			$("#player").get(0).play(); //play musik;
		});
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
                    $(".layout-komen").append("<div class='col-md-12 mb-3 komen'><div class='media px-3 media-comment'><img class='rounded-circle mr-3 d-none d-sm-block d-md-block d-lg-block' src='https://na.ui-avatars.com/api/?name="+nama+"&size=50' alt='Image Avatar'><div class='media-body'><div class='mb-2'><h5 class='h6 mb-0'>"+nama+"</h5></div><p>"+komentar+"</p></div></div></div>");
                    
                    $(".komen:hidden").slice(0, 100).slideDown();
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                }
               
            }
        });

    });
});
</script>
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
        $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
                loop:false
            }
        }
    });

    </script>
        <script>
        
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
