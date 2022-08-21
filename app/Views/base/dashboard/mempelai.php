<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 
    <?php 
    clearstatcache();
        $kunci = $data[0]->kunci;
        $fotogroom = "/assets/users/".$kunci."/groom.png";
        $fotobride = "/assets/users/".$kunci."/bride.png";
        $fotosampul = "/assets/users/".$kunci."/kita.png";
        
    ?>

    <div class="row mb-3">
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Pria</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="upload-area-bg" style="text-align: center;">
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                    <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                    <img src="<?php echo base_url() ?><?= $fotogroom ?>" id="profile-pic-groom" style='border-radius: 5px;height: 200px;width: 200px;'>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="btn btn-primary">
                                        <input type="file" class="file-upload" id="groom"  name="profile_picture" accept="image/*"> Upload Foto
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <hr>
                    <div class="col mt-2">
                        <label>Nama Lengkap</label>
                        <input id="nama_lengkap_pria" type="text" class="form-control" placeholder="Contoh : Jack Dawson S.Kom" value="<?= $mempelai[0]->nama_pria ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Panggilan</label>
                        <input id="nama_panggilan_pria" type="text" class="form-control" placeholder="Contoh : Jack" value="<?=  $mempelai[0]->nama_panggilan_pria ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Ayah</label>
                        <input id="nama_ayah_pria" type="text" class="form-control" placeholder="Nama Ayah" value="<?= $mempelai[0]->nama_ayah_pria ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Ibu</label>
                        <input id="nama_ibu_pria" type="text" class="form-control" placeholder="Nama Ibu" value="<?= $mempelai[0]->nama_ibu_pria ?>" required>
                    </div>
                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalPria">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Mempelai Wanita</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="upload-area-bg" style="text-align: center;">
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                    <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                    <img src="<?php echo base_url() ?><?= $fotobride ?>" id="profile-pic-bride" style='border-radius: 5px;height: 200px;width: 200px;'>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="btn btn-primary">
                                        <input type="file" class="file-upload" id="bride"  name="profile_picture" accept="image/*"> Upload Foto
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <hr>
                    <div class="col mt-2">
                        <label>Nama Lengkap</label>
                        <input id="nama_lengkap_wanita" type="text" class="form-control" placeholder="Contoh : Fatimah Az Zahra" value="<?= $mempelai[0]->nama_wanita ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Panggilan</label>
                        <input id="nama_panggilan_wanita" type="text" class="form-control" placeholder="Contoh : Fatimah" value="<?=  $mempelai[0]->nama_panggilan_wanita ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Ayah</label>
                        <input id="nama_ayah_wanita" type="text" class="form-control" placeholder="Nama Ayah" value="<?= $mempelai[0]->nama_ayah_wanita ?>" required>
                    </div>

                    <div class="col mt-2">
                        <label>Nama Ibu</label>
                        <input id="nama_ibu_wanita" type="text" class="form-control" placeholder="Nama Ibu" value="<?= $mempelai[0]->nama_ibu_wanita ?>" required>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modalWanita">Simpan</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Foto Sampul</h6>
                </div>
                <div class="card-body">
                    <!-- CONTENT DISINI -->
                    <div class="upload-area-bg" style="text-align: center;">
                        <div class="col">
                            <div class="row">
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                    <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                    <img src="<?= base_url() ?><?= $fotosampul ?>" id="profile-pic-sampul" style='border-radius: 5px;height: 200px;width: 200px;'>
                                    </div>

                                </div>
                                <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                    <div class="btn btn-dark">
                                        <input type="file" class="file-upload" id="sampul"  name="profile_picture" accept="image/*"> Upload Foto
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Posisi Mempelai</h6>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo base_url('user/update_posisi_mempelai'); ?>">
                    <div class="col mt-2">
                        <label>Posisi Mempelai</label>
                        <select class="form-control" id="posisi_mempelai" name="posisi_mempelai" required>
                            <?php
							if ($mempelai[0]->posisi_mempelai == 0) echo "<option value='0' selected>Pria dan Wanita (Putra dan Putri)</option>";
							else echo "<option value='0'>Pria dan Wanita (Putra dan Putri)</option>";

							if ($mempelai[0]->posisi_mempelai == 1) echo "<option value='1' selected>Wanita dan Pria (Putri dan Putra)</option>";
							else echo "<option value='1'>Wanita dan Pria (Putri dan Putra)</option>";
							
							?>
                        </select>
                    </div>
                    <div class="col mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    <!--Row-->
</div>


<!-- Modal -->
<div class="modal fade" id="modalWanita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanWanita">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalPria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanPria">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>



<script src="<?php echo base_url() ?>/assets/base/js/croppie.min.js"></script>
<script>

$(document).ready(function () {
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
            croppie = new Croppie(el, {
                    viewport: {
                        width: 300,
                        height: 300,
                        type: 'square'
                    },
                    boundary: {
                        width: 350,
                        height: 350
                    },
                    
                    enableOrientation: true
                });
            $.getImage(event.target, croppie); 
        });

        $("#upload").on("click", function() {
            croppie.result('base64').then(function(base64) {
                $("#myModal").modal("hide"); 
                $("#profile-pic").attr("src","/images/ajax-loader.gif");

                var url = "<?php echo base_url('user/update_foto_mempelai') ?>";
                var formData = new FormData();
                formData.append("foto_"+fotonyasiapa, $.base64ImageToBlob(base64));
                formData.append("kunci", "<?= $kunci ?>");


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

});


    $('#simpanWanita').on('click', function(event) {

        var datanyaSiapa = 'wanita';
        var nama = $('#nama_lengkap_wanita').val();
        var nama_panggilan = $('#nama_panggilan_wanita').val();
        var nama_ayah = $('#nama_ayah_wanita').val();
        var nama_ibu = $('#nama_ibu_wanita').val();
        console.log(nama);
        $.ajax({
            url : "<?= base_url('user/update_mempelai') ?>",
            method : "POST",
            data : {nama: nama,nama_panggilan: nama_panggilan, nama_ayah: nama_ayah, nama_ibu: nama_ibu, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

    $('#simpanPria').on('click', function(event) {

        var datanyaSiapa = 'pria';
        var nama = $('#nama_lengkap_pria').val();
        var nama_panggilan = $('#nama_panggilan_pria').val();
        var nama_ayah = $('#nama_ayah_pria').val();
        var nama_ibu = $('#nama_ibu_pria').val();

        $.ajax({
            url : "<?= base_url('user/update_mempelai') ?>",
            method : "POST",
            data : {nama: nama,nama_panggilan: nama_panggilan, nama_ayah: nama_ayah, nama_ibu: nama_ibu, datanyaSiapa: datanyaSiapa},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

</script>
