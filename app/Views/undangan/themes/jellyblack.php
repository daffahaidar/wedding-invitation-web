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
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/jellyblack.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/css/swipebox.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.countdown.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
</head>

<body oncontextmenu="return false">
	<div id="over-lay-welcome" onclick="openFullscreen()">
		<div class="row" style="margin:0 auto;">
			<div class="col-md-6 col-sm-12 col-md-offset-3">
			    <?php foreach ($rules->getResult() as $set){ 
			         if($set->prokes == 1) { ?>
                    <img class="img-responsive" src="<?php echo base_url() ?>/assets/base/img/prokes.png">
                    <?php }
                     ?>
				<p>Selamat datang di undangan pernikahan Kami.
					<br>Gunakan browser Chrome atau Safari agar website tampil sempurna. Gunakan tombol arah di bawah utuk membuka halaman selanjutnya. </p>
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
	<section>
		<div class="sw-custom-wrapper row" id="sw_fullscreen">
			<div id="clock" class="sw-timer"></div>
			<div id="sw-bookblock" class="sw-bookblock">
				<section class="sw-item">
					<div class="sw-content">
						<div class="sw-content-inner sw-content-flex">
							<div class="col-md-12">
								<div class="sw-invitation-home text-center  wow bounceInUp">
									<h3><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></h3>
								<p><span id="tanggal-wedding"></span><input id="tgl_wedding" type="hidden" value="<?= $tgl_acara ?>" ></p>
									<figure><img class="img-responsive" src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-wedding-invitation.png"></figure>
									<p>Kepada Yang Terhormat</p>
									<h3><?php 
                                    if(!empty(esc($invite))){
                                        echo ucwords(esc($invite));
                                    }else{
                                    echo "Tamu Undangan";
                                    }
                                    ?></h3>
                                    <p><?php if(!empty(esc($alamat_tamu))){
                                        echo ucwords(esc($alamat_tamu));
                                    }
                                    ?></p>
							</div>
						</div>
					</div>
				</section>
				<section class="sw-item">
				<div class="sw-content">
					<div class="sw-content-inner">
						
							<div class="sw-ceremony"><img class="sw-el-top"
									src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-top.png">
								<p class="sw-opening"><?= nl2br($salam_pembuka) ?></p>
								<?php if($posisi_mempelai == 0) {  ?>
								<figure>
                                    <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png">
                                </figure>
								<h2><?= $nama_lengkap_pria ?></h2>
								<p class="sw-binti">Putra Bpk <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></p>
								<p class="sw-or">dengan</p>
								<?php } ?>
								<figure>
                                    <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png">
                                </figure>
								<h2><?= $nama_lengkap_wanita ?></h2>
								<p class="sw-binti">Putri Bpk <?= $nama_ayah_wanita ?> dan Ibu <?=$nama_ibu_wanita ?></p>
								<?php if($posisi_mempelai == 1) {  ?>
								<p class="sw-or">dengan</p>
								<figure>
                                    <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png">
                                </figure>
								<h2><?= $nama_lengkap_pria ?></h2>
								<p class="sw-binti">Putra Bpk <?= $nama_ayah_pria ?> dan Ibu <?=$nama_ibu_pria ?></p>
								<?php } ?>
								<img
									class="sw-el-bottom"
									src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/sw-element-bottom.png">
							</div>
						
					</div>
				</div>
			</section>
			<section class="sw-item">
				<div class="sw-content">
						<div class="sw-content-inner ">
							<div class="sw-block">
								<h3>Acara</h3>
							<div class="sw-ceremony">
							    <?php  $i = 0;
    						    foreach($acara as $key => $data){ 
    						    $i++;?>
								<div class="sw-akad-resepsi" >
									<h2><?= $data->nama_acara ?></h2>
									<p><span id="tanggal-acara<?= $i+1?>"></span><input id="tgl_acara<?= $i+1?>" type="hidden" value="<?= $data->tgl_acara ?>" >
										<br> Jam <?= $data->waktu_mulai ?> - <?= $data->waktu_akhir ?>
										<br> <?= $data->tempat_acara ?><br><?= $data->alamat_acara ?></p>
									<?php if($data->set_countdown == 'Y' && !empty($data->maps)){ ?>
									<a href="#" data-toggle="modal" data-target="#sw-maps" title="Lokasi">Buka di google map</a> <?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
			if($set->cerita == 1) { ?>
				<section class="sw-item">
					<div class="sw-content">
						<div class="sw-content-inner">
							<div class="sw-block">
								<h2>Kisah Cinta</h2>
								<div class="col-md-12">
						<div class="main-timeline">

						<?php 
						$no=0;
						foreach($cerita as $key => $data) { 
							$no++;
							if($no % 2 == 0){ ?>

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
							<?php }else{?>
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
				</section>
				<?php }
			    if($set->gallery == 1) { ?>
				<section class="sw-item">
				<div class="sw-content">
					<div class="sw-content-inner">
						<div class="sw-block">
							<h2>Galeri Prewedding</h2>
							<div class="sw-content-gallery">
							    <?php  foreach($album as $key => $data) {  ?>
								<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
									<div class="sw-gallery">
										<a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album'] ?>.png"
											class="swipebox"><img
												src="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png"
												class="img-responsive" />
											<div class="sw-gallery-overlay">
												<i class="fa fa-search-plus"></i>
											</div>
										</a>
									</div>
								</div>
								<?php } ?>
								
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<?php if($youtube != ""){
								$embed = str_replace("youtu.be/","www.youtube.com/watch?v=","$youtube");
								$unik = str_replace("https://youtu.be","","$youtube");
								$unikfinal = str_replace("/","","$unik");
						    ?>
						    <div class="youtube">
						        <a rel="youtube" href="<?php echo $embed; ?>" class="swipebox-video">
										<img src="https://img.youtube.com/vi/<?php echo $unikfinal; ?>/maxresdefault.jpg" class="img img-responsive">
										<div class="youtube-overlay">
												<i class="fa fa-play-circle"></i>
											</div>
									</a>
	                     	</div>
									<?php }?>
						</div>

							</div>
						</div>
					</div>
				</div>
			</section>
			<?php }
			    if($set->komen == 1) { ?>
				<section class="sw-item">
					<div class="sw-content">
						<div class="sw-content-inner">
							<div class="sw-block">
								<h2>Beri Ucapan</h2>
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
							<div class="komen-netizen" >
			
                    			<div class="layout-komen">				
                    				<?php  foreach($komen as $key => $data) { ?>
                    				<div class="komen" >
                    					<div class="col-12 komen-nama">
                    						<?= \esc($data['nama_komentar']); ?>
                    					</div>
                    					<div class="col-12 komen-isi">
                    						<?= \esc($data['isi_komentar']); ?>
                    					</div>
                    				</div>
                    				<?php } ?> 
                    			</div>
                    
                    			<a href="#" id="loadMore" class="btn btn-primary btn-block" role="button">Lebih Banyak.</a>
                            </div>
						</div>
					</div>
				</section>
				<?php }
			}
			?>
			</div>
		<nav>
            <a id="sw-nav-prev" href="#" class="sw-custom-icon sw-custom-icon-arrow-left">Previous</a>
            <a id="sw-nav-next" href="#" class="sw-custom-icon sw-custom-icon-arrow-right">Next</a>
            <a href="#" class="sw-custom-icon sw-custom-icon-share" data-toggle="modal" data-target="#sw-share" title="Bagikan">Share</a>
            <?php foreach ($rules->getResult() as $set){ 
			if($set->qrcode == 1 && $order[0]->buku_tamu == 1) { ?>
            <a href="#" class="sw-custom-icon sw-custom-icon-qrcode" data-toggle="modal" data-target="#sw-qrcode" title="QrCode">QrCode</a>
            <?php } 
            if($set->hadiah == 1 && $order[0]->kirim_hadiah == 1) { ?>
            <a href="#" class="sw-custom-icon sw-custom-icon-gift" data-toggle="modal" data-target="#sw-hadiah" title="Hadiah">Hadiah</a>
            <?php }
            } ?>
            <a href="#" onclick="openFullscreen();" id="fullscreen" class="sw-custom-icon sw-custom-icon-full" title="Fullscreen" data-toggle="tooltip" data-placement="top">Fullscreen</a>
            <a href="#" onclick="closeFullscreen();" id="normalscreen" style="display:none;" class="sw-custom-icon sw-custom-icon-normal" title="Normal Screen" data-toggle="tooltip" data-placement="top">Normal Screen</a>
        </nav>
		</div>
	</section>
	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Warning</h4></div>
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
	<div class="modal fade" id="sw-maps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-keyboard="false"
	data-backdrop="static">
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
                        <img src=<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/love.png alt="donation" style="max-width: 60px;">
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
                                <span onClick='copyText(this)'><?= $row->no_rekening ?> <img src=<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/jellyblack/img/copy.png style="height:13px;margin-top:-5px;cursor:pointer"></span><br>
                                    a/n <?= $row->nama_pemilik ?> <br>
                            
                        </div>
                        <?php if($row->qrcode_bank !=''){ ?>
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
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/modernizr.custom.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquerypp.custom.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.bookblock.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.swipebox.min.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/sw-main.js"></script>
	<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/moment-with-locales.js"></script>
<script>var base_url = '<?php echo base_url() ?>';</script>
<script src="<?php echo base_url() ?>/assets/themes/jellyblack/themes-rsvp/sw-vendor/js/jquery.classyqr.js"></script>
<script>
$(document).ready(function() {
var kode = <?=json_encode($qrcode)?>;
$('#qrcode').ClassyQR({
   create:true,
   type:'text',
   text: kode
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
            }
            catch (err) {
                alert('Unable to copy number');
            }
        }
	var elem = document.documentElement;
        function openFullscreen() {
          if (elem.requestFullscreen) {
            elem.requestFullscreen();
            document.getElementById('fullscreen').style.display = 'none';
            document.getElementById('normalscreen').style.display = '';
          } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
            document.getElementById('fullscreen').style.display = 'none';
            document.getElementById('normalscreen').style.display = '';
          } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
            document.getElementById('fullscreen').style.display = 'none';
            document.getElementById('normalscreen').style.display = '';
          }
        }
        
        function closeFullscreen() {
          if (document.exitFullscreen) {
            document.exitFullscreen();
            document.getElementById('fullscreen').style.display = '';
            document.getElementById('normalscreen').style.display = 'none';
          } else if (document.webkitExitFullscreen) { /* Safari */
            document.webkitExitFullscreen();
            document.getElementById('fullscreen').style.display = '';
            document.getElementById('normalscreen').style.display = 'none';
          } else if (document.msExitFullscreen) { /* IE11 */
            document.msExitFullscreen();
            document.getElementById('fullscreen').style.display = '';
            document.getElementById('normalscreen').style.display = 'none';
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
	Page.init();
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
    $("#loadMore").on('click', function (e) {
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
        var nama =  $('#nama').val();
        var komentar =  $('#komentar').val();

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
                console.log(json);

                if(status == 'sukses'){
                    
                    $('.layout-komen').append("<div class='komen' style='display:block'><div class='col-12 komen-nama'>"+nama+"</div><div class='col-12 komen-isi'>"+komentar+"</div></div>");

                    $(".komen:hidden").slice(0, 100).slideDown();
                    $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                    $("#loadMore").fadeOut('slow');

                }
               
            }
        });

    });
	</script>
</body>

</html>