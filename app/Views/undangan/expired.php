<!DOCTYPE html>
<html lang="id" >
<head>
    <?php foreach ($mempelai->getResult() as $row){ ?>
    <title><?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?> </title> 

	<!-- REQUIRED META AREA	 -->
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#f5f6fa" />
    <meta property="og:title" content="<?php echo $row->nama_panggilan_pria." & ".$row->nama_panggilan_wanita; ?>">
    <meta property="og:description" content="<?php
    echo 'Hello ' . esc($invite) . '! Kamu Di Undang..';
    ?>">
    <meta property="og:url" content="<?php echo base_url() ?>">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <meta property="og:type" content="website" />
    <?php }?>

	<!-- CSS STYLE AREA	 -->
	<?php foreach ($data->getResult() as $row){
        $kunci = $row->kunci;
	?>
    <link rel="icon" href="<?= base_url() ?>/assets/users/<?= $kunci; ?>/kita.png">
    <?php } ?>
    <link href="<?php echo base_url() ?>/assets/themes/tealflower/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>/assets/themes/tealflower/css/jquery.fancybox.css" rel="stylesheet">	
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/tealflower/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>/assets/themes/tealflower/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/undangan/font-awesome/css/all.css">
</head>

<body>

<div class="blocked" style="z-index:99999999;background:#f5f6fa;position:absolute;left:0;right:0;top:0;bottom:0;">

<div class="content-thebegining">
	<img src="<?php echo base_url() ?>/assets/base/img/logo3.png" style="width:100px;height: 100px;"> <br>		
</div>

<div class="blocked_message" style="display: flex;justify-content: center;align-items: center;height: 100vh;flex-direction: column;position:absolute;top:0;bottom:0;left:0;right:0;">
	<a style="font-weight: bold;font-size: 22px;color: #e74c3c;">Undangan Tidak Aktif!</a>
	<a style="font-weight: bold;font-size: 13px;color: #34495e;text-align:center;">Segera lakukan pembayaran agar undangan anda bisa aktif kembali!</a>
</div>	

</div>

</html>
