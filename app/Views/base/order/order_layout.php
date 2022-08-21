<!DOCTYPE html>
<html>
  <head>
    <title><?= SITE_NAME ?> - Digital Invitation Indonesia</title>
    <link rel="icon" href="<?php echo base_url() ?>/assets/base/img/favicon.ico">

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

    <?php 
      $jml_cerita = 2;
      if(isset($_SESSION['jml_cerita'])){
        if($_SESSION['jml_cerita'] > 2){
          $jml_cerita = $_SESSION['jml_cerita'];
        }
      }
      $jml_acara = 2;
      if(isset($_SESSION['jml_acara'])){
        if($_SESSION['jml_acara'] > 2){
          $jml_acara = $_SESSION['jml_acara'];
        }
      }

    ?>

    <?php 

    echo view($view);

    ?>

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
                <p class="text-footer">Copyright &#169; <?= date('Y') ?> <?= SITE_NAME ?>. All Rights Reserved</p>
            </div>
            </div>
        </div>
    </footer>

    <!-- modal upload croppie -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Foto Mempelai</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div id="resizer"></div>
                    <hr>
                    <button class="btn btn-block btn-dark" id="upload" > 
                    Upload</button>
                </div>
            </div>
        </div>
    </div>
      
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
<script type="text/javascript">

function nospaces(t){
      if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
      }
    }

$(function () {

  /** croppie shareurcodes.com **/
    var croppie = null;
    var el = document.getElementById('resizer');

    $.base64ImageToBlob = function(str) {
        /** extract content type and base64 payload from original string **/
        var pos = str.indexOf(';base64,');
        var type = str.substring(5, pos);
        var b64 = str.substr(pos + 8);
      
        /* decode base64 */
        var imageContent = atob(b64);
      
        /* create an ArrayBuffer and a view (as unsigned 8-bit) */
        var buffer = new ArrayBuffer(imageContent.length);
        var view = new Uint8Array(buffer);
      
        /* fill the view, using the decoded base64 */
        for (var n = 0; n < imageContent.length; n++) {
          view[n] = imageContent.charCodeAt(n);
        }
      
        /* convert ArrayBuffer to Blob */
        var blob = new Blob([buffer], { type: type });
      
        return blob;
    }

    $.getImage = function(input, croppie) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {  
                croppie.bind({
                    url: e.target.result,
                });
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    var fotonyasiapa = '';
    $(".file-upload").on("change", function(event) {
        $("#myModal").modal();
        fotonyasiapa = $(this).attr("id");
        console.log("foto_"+fotonyasiapa);
        /* Initailize croppie instance and assign it to global variable */
        var boundaryWidth = $(".modal-body").width();
    var boundaryHeight = boundaryWidth;   

    var viewportWidth = boundaryWidth - (boundaryWidth/100*25);

    var viewportHeight = boundaryHeight - (boundaryHeight/100*25);

    croppie = new Croppie(el, {

        viewport: { width: viewportWidth, height: viewportHeight },
        boundary: { width: boundaryWidth, height: boundaryHeight },
        enableOrientation: true
            });
        $.getImage(event.target, croppie); 
    });

    $("#upload").on("click", function() {
        croppie.result('base64').then(function(base64) {
            $("#myModal").modal("hide"); 
            $("#profile-pic").attr("src","/images/ajax-loader.gif");

            var url = "<?php echo base_url('order/imgupload') ?>";
            var formData = new FormData();
            formData.append("foto_"+fotonyasiapa, $.base64ImageToBlob(base64));

            $.ajax({
                type: 'POST',
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                  console.log(data);
                    if (data == "uploadedbride") {
                        $("#profile-pic-bride").attr("src", base64); 
                    } else if(data == "uploadedgroom"){
                        $("#profile-pic-groom").attr("src", base64); 
                    } else if(data == "uploadedsampul"){
                        $("#profile-pic-sampul").attr("src", base64); 
                    } else {
                        $("#profile-pic").attr("src","/images/icon-cam.png"); 
                        console.log(data['profile_picture']);
                    }
                },
                error: function(error) {
                    console.log(error);
                    $("#profile-pic").attr("src","/images/icon-cam.png"); 
                }
            });
        });
    });

    /* To Rotate Image Left or Right */
    $(".rotate").on("click", function() {
        croppie.rotate(parseInt($(this).data('deg'))); 
    });

    $('#myModal').on('hidden.bs.modal', function (e) {
        /* This function will call immediately after model close */
        /* To ensure that old croppie instance is destroyed on every model close */
        setTimeout(function() { croppie.destroy(); }, 100);
    });

    $("#next").prop('disabled', true);

   
    $("#skipCerita").on('change', function() {
      if ($(this).prop('checked')) {
        $("#konten-cerita").hide();
        $("#addCerita").hide();
        $(".form-control").prop('required',false);
      }else{
        $("#konten-cerita").show();
        $("#addCerita").show();
        $("..form-control").prop('required',true);
      }
    });

    $("#skipGallery").on('change', function() {
      if ($(this).prop('checked')) {
        $("#konten-gallery").hide();
        $(".form-control").prop('required',false);
      }else{
        $("#konten-gallery").show(); 
        $("..form-control").prop('required',true);
      }
    });

    var i = <?php echo $jml_cerita ?>;

    $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");
       $('#cerita'+button_id+'').remove();  
       i--;

       if(i == 0){
        $("..form-control").prop('required',true);
       }

     });  

    $('#addCerita').click(function(){  

      i++;  

      $('#konten-cerita').append('<div id="cerita'+i+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+i+'</a></div><div class="col"><a id="'+i+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;">Hapus</a></div></div><div class="row align-items-center"><div class="col"><label>Tanggal</label><input name="tanggal_cerita[]" type="text" class="form-control" placeholder="Contoh : 14 Januari 2020 " required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Judul</label><input name="judul_cerita[]" type="text" class="form-control" placeholder="Contoh : Pertama Bertemu" required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Isi Cerita</label><textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required></textarea></div></div></div>');  
        $(".form-control").prop('required',false);
    });
    
        // =========== ACARA

    var j = <?php echo $jml_acara ?>;
    
    let picker = [];
    for(let a = 1; a < j+1; a++){
        moment.locale('id');
        var tgl = $('#tgl_acara'+a+'').val();
        $('#datepicker'+a+'').val(moment(tgl).format('dddd, Do MMMM YYYY'));
        picker[a] = new Pikaday({ 
          format: 'dddd, Do MMMM YYYY',
          field: $('#datepicker'+a+'')[0],
          onSelect: function() {
            $('#tgl_acara'+a+'').val(this.getMoment().format('YYYY/MM/DD'));
          }
        });
    }
   
    $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");
       $('#acara'+button_id+'').remove();  
       j--;

       if(j == 0){
        $("..form-control").prop('required',true);
       }

     });  

    $('#addAcara').click(function(){  

      j++;  
        var d = new Date();
        var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
      $('#konten-acara').append('<div id="acara'+j+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+j+'</a></div><div class="col"><a id="'+j+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;">Hapus</a></div></div><div class="row align-items-center"><div class="col"><label>Judul Acara</label><input name="nama_acara[]" type="text" class="form-control" placeholder="Contoh : Unduh Mantu"  required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Tanggal </label><input type="text" class="form-control" id="datepicker'+j+'" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required><input type="hidden" name="tgl_acara[]" id="tgl_acara'+j+'" value="'+strDate+'"></div></div><div class="row align-items-center mt-3"><div class="col mt-2"><div class="form-row"><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_mulai[]" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi" required></div><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_akhir[]" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi" required></div></div></div></div><div class="row align-items-center mt-3"><div class="col"><label>Tempat Acara</label><input name="tempat_acara[]" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita" required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Alamat Acara</label><textarea name="alamat_acara[]" type="text" class="form-control" required></textarea></div></div><div class="row align-items-center mt-3"><div class="col"><label>Google Maps</label><textarea name="maps[]" type="text" class="form-control"></textarea><div class="mt-1"><label class="form-check-label "><a href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Maps</a></label></div></div></div></div>');
      var tgl = $('#tgl_acara'+j+'').val();
      moment.locale('id');
      $('#datepicker'+j+'').val(moment(tgl).format('dddd, Do MMMM YYYY'));
        var picker = new Pikaday({ 
          format: 'dddd, Do MMMM YYYY',
          field: $('#datepicker'+j+'')[0],
          onSelect: function() {
            $('#tgl_acara'+j+'').val(this.getMoment().format('YYYY/MM/DD'));
          }
        });
        $(".form-control").prop('required',false);
    });


    
var myDropzone = new Dropzone(document.body, { 
  url: "<?php echo base_url('order/upload'); ?>", 
  paramName: "file",
  acceptedFiles: 'image/*',
  autoQueue: true,
  maxFilesize: 2,  //ukuran maksimal foto 
  clickable: ".do-add-btn" 
});

myDropzone.on("success", function(file,response){
    if(response == ""){
      $('.dz-preview').remove();
      alert('Batas Upload 10 Foto!');

    }else{
      var aql = JSON.parse(response);
      $('.dz-preview').remove();
      $("#previewss").prepend('<div id="preview'+aql.no+'" class="file-row preview-uploads"><div class="preview-uploads-img"><span class="preview"><img id="img3" src="<?= base_url() ?>/assets/users/'+aql.dummy+'/album'+aql.no+'.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;" /></span></div><div class="preview-uploads-name"><p class="name" style="line-height: revert;font-size: 12px;" data-dz-name>album'+aql.no+'</p><strong class="error text-danger" style="line-height: revert;font-size: 12px;"  ></strong><p class="size" style="line-height: revert;font-size: 12px;" >-</p></div><div  class="preview-uploads-delete"><button id="'+aql.no+'" class="btn btn-danger delete btnhehe">Hapus</button></div></div>');
    }
    $('#loading').hide();
});

myDropzone.on("sending", function(file, xhr, formData) {
  $('.dz-preview').remove();
  formData.append("data", "<?php if(isset($_SESSION['dummy'])){ echo $_SESSION['dummy']; } ?>");
  $('#loading').show();
});


myDropzone.on("error", function(file, response) {
  $('.dz-preview').remove();
  alert('Maximal File = 2MB!');
  $('#loading').hide();
});

$(document).on('click', '.btnhehe', function(){  

  var button_id = $(this).attr("id");
  var dummy = "<?php if(isset($_SESSION['dummy'])){ echo $_SESSION['dummy']; } ?>";
  $.ajax({
     type: 'POST',
     url: '<?= base_url('order/del') ?>',
     data: {id: button_id,dummy: dummy},
     success: function(data){
        console.log('success: ' + data);
        $('#preview'+button_id).remove();
     }
  });
   
     

});
    
});

</script>