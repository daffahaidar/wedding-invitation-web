<!DOCTYPE html>
<html lang="id" >
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
    <link href="<?php echo base_url() ?>/assets/themes/tealflower/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/themes/tealflower/css/jquery.fancybox.css" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/tealflower/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/tealflower/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/undangan/font-awesome/css/all.css">
    <script src="<?php echo base_url() ?>/assets/themes/tealflower/js/jquery.min.js"></script>
</head>

<body oncontextmenu="return false">
<!-- ============== HALAMAN AWAL =============== -->
<div class="thebegining" style="background-image: url('<?php echo base_url() ?>/assets/themes/tealflower/img/texture.png'); background-repeat: repeat;">

		<table style="width: 100%;margin-top:10px"> 
      		<tbody>
            <tr>
                <th style="position: relative;text-align: center;display:block;margin-top:20px">
					<img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png" class="cover-thebegining"/>
					<br><br><span style="margin-top: 15px; margin-bottom: 15px;">The Wedding of <br><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?><br><br></span>
				</th>
			</tr>
      		</tbody>
      	</table>
    <div class="row d-flex justify-content-center text-center">
    <div class="col-md-4 col-sm-12 col-md-offset-4">
	<div class="salam">
		<span style="font-family: 'arial', cursive;font-size: 16px;color: #686868;">Kepada Yth.</span><br>
		<span style="font-family: 'arial', cursive;font-size: 16px;color: #686868;">Bapak/Ibu/Soudara/i</span>
		<br>
		<span style="font-family: 'Dancing Script', cursive;font-weight: bold;color:#362515;font-size:30px;"><?php 
        if(!empty(esc($invite))){
            echo ucwords(esc($invite));
        }else{
        echo "Tamu Undangan";
        }
        ?></span><br>
        <span style="font-family: 'Dancing Script', cursive;font-weight: bold;color:#362515;font-size:20px;"><?php 
        if(!empty(esc($alamat_tamu))){
            echo ucwords(esc($alamat_tamu));
        }
        ?></span><br>
        <br>
		<a style="font-weight: bold;font-size: 12px;color: #604e19;position: absolute;right: 0;left: 0;"><button id="buka-undangan" type="button" class="btn btn-default" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">Buka Undangan</button></a>
	</div>
	</div>
    </div>
</div>	

<div class="dekorasi-all">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/tealflower/img/top_flower.png" class="imgatas">  -->

	<!-- GAMBAR DEKORASI KIRI -->
	<!-- <img src="<?php echo base_url() ?>/assets/themes/tealflower/img/kiri-atas.png" class="imgatas-kiri"> -->
	<!-- GAMBAR DEKORASI KANAN --> 
	<img src="<?php echo base_url() ?>/assets/themes/tealflower/img/kanan-atas.png" class="imgatas-kanan"> 
</div>

<div class="dekorasi-sampul">
	<!-- GAMBAR DEKORASI TENGAH -->
	<!-- <img id="" src="<?php echo base_url() ?>/assets/themes/tealflower/img/top_flower.png" class="imgatas">  -->
	
	<!-- GAMBAR DEKORASI KIRI -->
	<!-- <img src="<?php echo base_url() ?>/assets/themes/tealflower/img/kiri-atas.png" class="imgatas-kiri"> -->
	<!-- GAMBAR DEKORASI KANAN --> 
	<!-- <img src="<?php echo base_url() ?>/assets/themes/tealflower/img/kanan-atas.png" class="imgatas-kanan"> -->
</div>

<div id="konten" style="z-index: 1;">

    <?php foreach ($data->getResult() as $row){
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

	<!-- ============== MUSIK =============== -->
	<audio loop src="<?php echo base_url() ?><?= $musiknya ?>" id="audio" ></audio>

	<!-- ============== SAMPUL =============== -->	
	<div id="sampul-konten" class="konten" >                	
      	<table style="width: 100%;margin-top:-50px"> <!-- tambahkan margin-top:-XX jika kurang ketas -->
      		<tbody>
      		 <tr>
                <th style="text-align: center;">
                    <span class="the-wedding">- THE WEDDING OF -</span>
                </th>
            </tr>
            <tr>
                <th style="position: relative;text-align: center;display:block;margin-top:40px">
					<img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png" class="cover-foto"/>
					
					<!-- image border cover -->
                    <img src="<?= base_url() ?>/assets/themes/tealflower/img/bg-flower.png" class="cover-border" /><br>
					<!-- image border cover -->

                </th>
			</tr>
			<tr>
      			<th style="text-align: center;margin-top:40px;margin-bottom:15px;display: block;">
                    <span class="nama-mempelai"><?php if($posisi_mempelai == 0) echo $nama_panggilan_pria." & ".$nama_panggilan_wanita; else echo $nama_panggilan_wanita." & ".$nama_panggilan_pria;?></span>
                </th>
			</tr>
			<tr>
      			<th style="text-align: center;">
				  <span class="tanggal-weddingnya" id="tanggal-wedding"></span>
				  <input id="tgl_wedding" type="hidden" value="<?= $tgl_acara ?>">
                </th>
      		</tr>
      		</tbody>
      	</table>
    </div>
	
	<!-- ============== MEMPELAI =============== -->
    <div id="mempelai-konten" class="konten" style="display: none;">   
		<img src="<?php echo base_url() ?>/assets/base/img/sw-element-top.png" class="mempelai-salam-pembuka"/><br>
        <p class="mempelai-intermezzo" ><?= $salam_pembuka ?></p>
        <?php if($posisi_mempelai == 0) {  ?>
        <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png" class="mempelai-img" />

        <h1 class="mempelai-pria-nama"><?php echo $nama_lengkap_pria; ?></h1>
        <p class="mempelai-pria-ortu" style="padding:0 15px 0 15px"><?php echo "Putra Bpk ".$nama_ayah_pria . " dan Ibu " .$nama_ibu_pria  ?></p> 
        <h1 class="dengan">dengan</h1>
        <?php } ?>
        <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/bride.png" class="mempelai-img"/>

        <h1 class="mempelai-wanita-nama"><?php echo $nama_lengkap_wanita; ?></h1>
        <p class="mempelai-wanita-ortu" style="padding:0 15px 0 15px"><?php echo "Putri Bpk ".$nama_ayah_wanita . " dan Ibu " .$nama_ibu_wanita  ?></p>
        <?php if($posisi_mempelai == 1) {  ?>
        <h1 class="dengan">dengan</h1>
        <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/groom.png" class="mempelai-img" />

        <h1 class="mempelai-pria-nama"><?php echo $nama_lengkap_pria; ?></h1>
        <p class="mempelai-pria-ortu" style="padding:0 15px 0 15px"><?php echo "Putra Bpk ".$nama_ayah_pria . " dan Ibu " .$nama_ibu_pria  ?></p> 
        <?php } ?>
        <img src="<?php echo base_url() ?>/assets/base/img/sw-element-bottom.png" class="mempelai-salam-pembuka"/>
    </div>
    <!-- ============== QrCode Tamu =============== -->
    <div id="hadir-konten" class="konten" style="display: none;" >
    <div class="container">
		<div class="section-title">
			<h2>QR Code Tamu</h2>
		</div>
		<div class="row">
		        <p style="padding:20px 20%">Silahkan Scan QR Code Berikut untuk Mengisi Buku Tamu:</p>	
	            <span id="qrcode">
		        </span>
	    </div>
	 </div>
    </div>
	<!-- ============== ACARA =============== -->

    <div id="acara-konten" style="display: none;" class="konten">

    	<div class="section-title">
            <h2> Acara </h2>
	    </div>

	    <div class="acaranya" >
	    <?php  $i = 0;
    			foreach($acara as $key => $data){ 
    		$i++;?>
	           <table class="tb-acara">
				<thead>
					<th colspan="4" class="acara-title">
						- <?= strtoupper($data->nama_acara) ?> -
					</th>
				</thead>
				<tbody>
					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-calendar icon-acara" ></th>
						<th class="tb-ket-acara"> Tanggal</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara" id="tanggal-acara<?= $i+1?>"><input id="tgl_acara<?= $i+1?>" type="hidden" value="<?= $data->tgl_acara ?>" ></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-timer icon-acara" ></th>
						<th class="tb-ket-acara"> Jam</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?= $data->waktu_mulai ?> - <?= $data->waktu_akhir ?></th>
					</tr>

					<tr>
						<th class="tb-ic-acara"><i class="mdi mdi-map-marker icon-acara" ></th>
						<th class="tb-ket-acara"> Tempat</th>
						<th class="tb-anu-acara">:</th>
						<th class="tb-isi-acara"><?= $data->tempat_acara ?><br><?= $data->alamat_acara ?></th>
					</tr>


				</tbody>
			</table>
			<?php } ?>
						
		</div>
    </div>


	<!-- ============== ALBUM =============== -->
	<div id="album-konten" style="display: none;">
		<section class="gallery-section section-padding" id="gallery">
				<div class="container">
					<div class="row">
						<div class="col col-xs-12">
							<div class="section-title">
								<h2>Gallery Foto Kami</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col col-xs-12">
							<div class="gallery-grids">

							<?php  foreach($album as $key => $data) {  ?>

								<div class="grid">
									<a href="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album'] ?>.png" class="fancybox" data-fancybox-group="gall-1">
										<img src="<?php echo base_url() ?>/assets/users/<?php echo $kunci.'/'.$data['album']; ?>.png" alt>
									</a>
								</div>

							<?php } ?>

							</div>
							
						</div>
						
						<?php if($youtube != ""){ 
								$embed = str_replace("youtu.be","www.youtube.com/embed","$youtube");
								$unik = str_replace("https://youtu.be","","$youtube");
								$unikfinal = str_replace("/","","$unik");
						?>
						<div class="col col-xs-12">
							<div class="youtube">
									<a href="<?php echo $embed; ?>" data-type="iframe" class="video-play-btn">
										<img src="https://img.youtube.com/vi/<?php echo $unikfinal; ?>/maxresdefault.jpg" alt class="img img-responsive">
										<i class="mdi mdi-play"></i>
									</a>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
		</section>
	</div>
	
	<!-- ============== UACAPAN/KOMENTAR =============== -->
    <div id="ucapan-konten" style="display: none;" class="konten">
    	
    	<div class="col-12 ucapan-field">
            <div class="section-title">
				<h2>Beri Ucapan</h2>
			</div>
	                <div class="row">
	                    <div class="col-12">
		                    <div class="form-group">
		                        <input id="nama" type="text" class="form-control mt-2" placeholder="Nama Anda" value="<?= esc($invite) ?>" required>
		                    </div>
	                    </div>
	                    <div class="col-12">
		                    <div class="form-group">
		                        <textarea id="komentar" class="form-control" id="exampleFormControlTextarea1" placeholder="Pesan anda.." rows="3" required></textarea>
		                    </div>
	                    </div>
	                    <div class="col-12">
	                    	<button id="submitKomen" class="btn btn-primary btn-block" >Kirim</button>
							<img src="<?= base_url() ?>/assets/base/img/loadinga.svg" height="30px" style="display:none;" id="loading_">
	                    </div>
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

	<!-- ============== CERITA =============== -->
    <div id="cerita-konten" style="display: none;" class="konten">
    	
		<section class="cerita section-padding" id="cerita">
			<div class="container">
				<div class="section-title">
						<h2> Cerita Kita </h2>
				</div>

				<div class="row">
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
		</section>

	</div>
	
	<!-- ============== LOKASI =============== -->
    <div id="lokasi-konten" style="display: none;" class="konten">

		<div class="section-title">
			<h2>Denah Lokasi</h2>
		</div>
		<div class="col-12 maps">
			<?= $maps ?>
		</div>
		
	</div>
	<!-- ============== HADIAH =============== -->
    <div id="hadiah-konten" style="display: none;" class="konten">
		<div class="section-title">
			<h2>Berikan Hadah</h2>
		</div>
		<div class="d-flex justify-content-center text-center">
            <div class="col-md-4 col-sm-12 col-md-offset-4">
        		<p class="description">Bagi yang ingin memberikan hadiah untuk pernikahan kami, silahkan transfer ke rekening berikut :</p>	
        		
        		<div class="card">
                <ul class="list-group list-group-flush">
                    <?php $i=1;
                foreach ($rekening->getResult() as $row){ 
                $i++; ?> 
                    <li class="list-group-item"><b><?= $row->nama_bank ?></b><br>
        			<span id="norek<?= $i ?>"><?= $row->no_rekening ?></span> <button class="clipboard" data-clipboard-action="copy" data-clipboard-target="#norek<?= $i ?>"><i class="fa fa-clipboard"></i></button><br>
        			An. <?= $row->nama_pemilik ?>
        			<?php if($row->qrcode_bank !=''){ ?>
                        <div style="display:flex;align-items:center;justify-content:center;">
                            <img src="<?= base_url() ?>/assets/users/<?= $kunci; ?>/rekening/<?= $row->qrcode_bank ?>" alt="Qris" class="img-responsive">
                        </div>
                        <?php } ?>
        			</li>
        			<?php } ?>
                  </ul>
                  
                </div>
                
            </div>
        </div>
	</div>
	<!-- ============== Protokol Kesehatan =============== -->
	<div id="prokes-konten" class="konten" style="display: none;"> 
	  <div class="container">
	<div class="section-title">
		<h2>Protokol Kesehatan</h2>
	</div>
	<p class="description">Cegah Penyebaran Virus Corona dengan Menerapkan Protokol Kesehatan 3M :</p>			
	<div class="row">
        <img src="<?= base_url() ?>/assets/undangan/img/masker.png" class="mempelai-img" />

        <h4 class="description">Memakai Masker</h4>
        <p style="font-size: 10px; padding:0 10px">Selalu gunakan masker dengan benar dan tepat saat berinteraksi dengan orang lain.</p>

        <img src="<?= base_url() ?>/assets/undangan/img/cucitangan.png" class="mempelai-img"/>

        <h4 class="description">Mencuci Tangan</h4>
        <p style="font-size: 10px; padding:0 10px"> Cuci tangan setelah menyentuh benda dan sebelum menyentuh bagian mata, hidung, dan mulut.</p>
        <img src="<?= base_url() ?>/assets/undangan/img/jagajarak.png" class="mempelai-img"/>

        <h4 class="description">Menjaga Jarak</h4>
        <p style="font-size: 10px; padding:0 10px">Selalu menjaga jarak fisik lebih dari 1 meter dengan orang lain.</p>
        </div>
        </div>
    </div>
    
</div>


<!-- ============== BOTTOM NAVIGATION =============== -->
<nav class="mobile-bottom-nav2" id="nav">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;" id="hehe">
            <?php foreach ($rules->getResult() as $row){ ?>
				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="mempelai">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="acara">		
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				<?php 
                if($row->qrcode == 1 && $order[0]->buku_tamu == 1) {
                ?>
				<div class="mobile-bottom-nav__item" id="hadir">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-qrcode"></i>
						QR Code
					</div>
				</div>
				<?php } ?>
				<div class="mobile-bottom-nav__item" id="lain">
					<div class="mobile-bottom-nav__item-content" >
						<i class="navbar-icon mdi mdi-more" id="lain"></i>
						Lain
					</div>		
				</div>

		
			</div>
		</div>	
	</div>
</nav>
<nav class="mobile-bottom-nav2" id="nav2" style="display: none;">

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px; " id="hehe">
			    
				<div class="mobile-bottom-nav__item mobile-bottom-nav__item--active" id="sampul">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-home"></i>
						Sampul
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="mempelai">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-heart"></i>
						Mempelai
					</div>		
				</div>

				<div class="mobile-bottom-nav__item" id="acara">		
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-calendar-text"></i>
						Acara
					</div>
				</div>
				<?php 
                if($row->qrcode == 1 && $order[0]->buku_tamu == 1) {
                ?>
				<div class="mobile-bottom-nav__item" id="hadir">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-qrcode"></i>
						QR Code
					</div>
				</div>
				<?php } ?>
				<div class="mobile-bottom-nav__item" id="ucapan"
				<?php 
                if($row->komen != 1)
                    echo "style=display:none;";
                ?>>

					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-message-bulleted"></i>
						Ucapan
					</div>		
				</div>

		
			</div>
		</div>	
	</div>

	<div class="container-fluid px-0">
	    <div class="row no-gutters">
			<div class="col-12" style="display: flex;margin-bottom: 5px;margin-top: 5px;">
		
				<div class="mobile-bottom-nav__item" id="album" 
                <?php 
                if($row->gallery != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
                        <i class="navbar-icon mdi mdi-image"></i>
                        Album
                    </div>      
				</div>

				<div class="mobile-bottom-nav__item" id="cerita" 
                <?php 
                if($row->cerita != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-chart-bubble" ></i>
						 Cerita Kita
					</div>		
				</div>


				<div class="mobile-bottom-nav__item" id="lokasi"
				<?php 
                if($row->lokasi != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-map-marker"></i>
						Lokasi
					</div>		
				</div>
				<div class="mobile-bottom-nav__item" id="prokes"
                <?php 
                if($row->prokes != 1)
                    echo "style=display:none;"
                ?>>
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-alert-octagram"></i>
						Prokes
					</div>		
				</div>


				<div class="mobile-bottom-nav__item">
					<div class="mobile-bottom-nav__item-content icons">
						<i class="navbar-icon mdi mdi-close-circle" style="color:red;" id="tutup"></i>
						Tutup
					</div>		
				</div>
			</div>
		</div>
	</div>


</nav>

</body>

<div class="dekorasi-all dekorasi-all-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/tealflower/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/tealflower/img/kanan-bawah.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/tealflower/img/kiri-bawah.png" > 
</div>

<div class="dekorasi-sampul dekorasi-sampul-bawah">
	<!-- GAMBAR DEKORASI TENGAH --> 
	<!-- <img class="imgbawah" src="<?php echo base_url() ?>/assets/themes/tealflower/img/bottom_flower.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kanan" src="<?php echo base_url() ?>/assets/themes/tealflower/img/kanan-bawah.png" >  -->
	<!-- GAMBAR DEKORASI KIRI --> 
	<!-- <img class="imgbawah-kiri" src="<?php echo base_url() ?>/assets/themes/tealflower/img/kiri-bawah.png" > -->
</div>
<?php if($row->hadiah == 1 && $order[0]->kirim_hadiah == 1) { ?>
<a id="hadiah" style="cursor:pointer;" class="box-hadiah">
<i  class="fas fa-gift my-hadiah"> BERI HADIAH</i></a> <?php } } ?>
<a id="music-button" style="cursor:pointer;" class="bulat">
<i  class="fas fa-volume-up my-musik"></i></a>

<!-- mengirimkan data php ke javascript -->
<script>var base_url = '<?php echo base_url() ?>';</script>
<!-- JS AREA -->
<script src="<?php echo base_url() ?>/assets/themes/tealflower/js/moment-with-locales.js"></script>
<script src="<?php echo base_url() ?>/assets/themes/tealflower/js/bootstrap.min.js" ></script>
<script src="<?php echo base_url() ?>/assets/themes/tealflower/js/jquery.classyqr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script>
$(document).ready(function() {
var kode = <?=json_encode($qrcode)?>;
$('#qrcode').ClassyQR({
   create:true,
   type:'text',
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
        $('#tanggal-wedding').html(moment(tgl_wedding).format('DD / MM / YYYY'));
    }
var Clipboard = new ClipboardJS('.clipboard');
</script>
<script src="<?php echo base_url() ?>/assets/themes/tealflower/js/jquery-plugin-collection.js"></script>

<script src="<?php echo base_url() ?>/assets/themes/tealflower/js/script.js"></script>

</html>
