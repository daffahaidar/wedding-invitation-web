<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        
        <a href="<?= SITE_BUKUTAMU ?>/<?= $order[0]->domain ?>" target="_blank" class="btn btn-primary btn-sm">Lihat Website</a>
        
        </div>
    </div>
    <?php 
    clearstatcache();
        $kunci = $data[0]->kunci;
        $background = "/assets/users/".$kunci."/bg-tamu.png";
    ?>
    <div class="row mb-3">

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Slider Buku Tamu</h6>
                </div>
                <div class="card-body">

                    <div class="upload-area-bg">
                        <div class="upload-area do-add-btn">
                            <div class="upload-area-inner">
                                <div class="upload-area-icon-main">
                                    <i class="lni-cloud-download"></i>
                                </div>
                                <h3 class="upload-area-caption">
                                    <span>Drag and drop files here</span>
                                </h3>
                                <p>or</p>
                                <button class="upload-area-button btn " style="z-index:9999;">
                                    <span style="color:#fff">Browse files</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div style="text-align: center;">
                        <img id="loading" src="<?= base_url() ?>/assets/base/img/loading.svg"  style="height: 30px;width: 30px; display: none;" />
                    </div>
                    <div id="previewss">
                        <?php 
                            $kunci = $data[0]->kunci;
                            for($a=1;$a<=10;$a++){
                                $pathName = 'assets/users/'.$kunci.'/slider'.$a.'.png';
                                if(!file_exists($pathName))continue;
                        ?>

                        <div class="preview-uploads" id="preview<?= $a ?>">
                            <div class="preview-slider-img">
                                <span class="preview">
                                <img id="img<?= $a ?>" src="<?= base_url() ?>/assets/users/<?= $kunci ?>/slider<?= $a ?>.png"  style="height: 52px;object-position: center;object-fit: cover;width: 120px;" />
                                </span>
                            </div>
                            <div class="preview-uploads-name">
                            <b><p class="name" style="line-height: revert;font-size: 12px;" >slider<?= $a; ?></p></b>
                            <strong class="error text-danger" style="line-height: revert;font-size: 12px;"  data-dz-errormessage></strong>
                            <p class="size" style="line-height: revert;font-size: 12px;"  >-</p>     
                            </div>
                            <div  class="preview-uploads-delete">
                            <button id="<?= $a ?>" data-dz-remove class="btn btn-danger delete btnhehe">
                                Hapus
                            </button>
                            </div>
                        </div>

                        <?php
                            }
                        ?>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Background Buku Tamu</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <?= form_open_multipart(base_url('user/update_background_bukutamu')); ?>
                    <div class="upload-area-bg" style="text-align: center;">
                        <div class="col">
                            <div class="row">
                                
                                <div class="col-12 col-md-8 col-lg-8 d-flex align-items-center justify-content-center">
                                    <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                    <img <?php if(!empty($background)){ ?> src="<?php echo base_url() ?><?= $background ?>" <?php } ?> id="img-bukutamu" name="img-bukutamu" style='border-radius: 5px;height: 130px;max-width: 300px;'>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-4 d-flex align-items-center justify-content-center mt-3">
                                    <div class="btn btn-primary">
                                        <input type="file" class="file-upload" id="bg-bukutamu"  name="bg-bukutamu" accept="image/*" onchange="preview_image(event)"> Upload Foto
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <?= form_close() ?>  
            </div>
        </div>

    </div>
    <!--Row-->
</div>
<!-- Modal -->
<div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menyimpan perubahan ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanVideo">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
<script>
function preview_image(event){
    var reader = new FileReader();
    reader.onload = function()
    {
      var output = document.getElementById('img-bukutamu');
      output.src = reader.result;
    }
     reader.readAsDataURL(event.target.files[0]);
}

var myDropzone = new Dropzone(document.body, { 
  url: "<?php echo base_url('user/update_slider_bukutamu'); ?>", 
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
      $("#previewss").prepend('<div id="preview'+aql.no+'" class="file-row preview-uploads"><div class="preview-slider-img"><span class="preview"><img id="img3" src="<?= base_url() ?>/assets/users/'+aql.kunci+'/slider'+aql.no+'.png"  style="height: 52px;object-position: center;object-fit: cover;width: 120px;" /></span></div><div class="preview-uploads-name"><p class="name" style="line-height: revert;font-size: 12px;" data-dz-name>slider'+aql.no+'</p><strong class="error text-danger" style="line-height: revert;font-size: 12px;"  ></strong><p class="size" style="line-height: revert;font-size: 12px;" >-</p></div><div  class="preview-uploads-delete"><button id="'+aql.no+'" class="btn btn-danger delete btnhehe">Hapus</button></div></div>');
    }
    $('#loading').hide();
});

myDropzone.on("sending", function(file, xhr, formData) {
  $('.dz-preview').remove();
  formData.append("kunci", "<?= $kunci ?>");
  $('#loading').show();
});


myDropzone.on("error", function(file, response) {
  $('.dz-preview').remove();
  alert('Maximal File = 2MB!');
  $('#loading').hide();
});

$(document).on('click', '.btnhehe', function(){  

  var button_id = $(this).attr("id");
  var kunci = "<?= $kunci ?>";
  $.ajax({
     type: 'POST',
     url: '<?= base_url('user/del_slider_bukutamu') ?>',
     data: {id: button_id,kunci: kunci},
     success: function(data){
        console.log('success: ' + data);
        $('#preview'+button_id).remove();
     }
  });
   
});



</script>