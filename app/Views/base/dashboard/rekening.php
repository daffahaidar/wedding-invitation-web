<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 
    <?php 
    clearstatcache();
        $kunci = $data[0]->kunci;
    ?>
    <div class="row mb-3">

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Rekening</h6>
                </div>
                <div class="card-body">
                   <?= form_open_multipart(base_url('user/update_rekening')); ?>
                    <div id="konten-rekening" >
                    
                        <?php 
                            $jml_rekening = count($rekening);
                            for($i=0;$i < $jml_rekening;$i++){ 
                        ?>

                            <div id="rekening<?php echo $i+1 ?>">
                                <div class="row align-items-center mt-3">
                                    <div class="col-auto">
                                        <a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#<?php echo $i+1 ?></a>
                                    </div>
                                    <div class="col">
                                        <a id="<?php echo $i+1 ?>" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                                    </div>
                                </div>

                                <div class="row align-items-center">
                                    <div class="col">
                                        <label>Nama Bank</label>
                                        <input name="nama_bank[]" type="text" class="form-control" placeholder="Contoh : BANK NEGARA INDONESIA" value="<?= $rekening[$i]->nama_bank ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>No Rekening</label>
                                        <input name="no_rekening[]" type="text" class="form-control" placeholder="Contoh : 0123456" value="<?= $rekening[$i]->no_rekening  ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>Nama Pemilik</label>
                                        <input name="nama_pemilik[]" type="text" class="form-control" placeholder="Contoh : Admin" value="<?= $rekening[$i]->nama_pemilik  ?>" required>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-3">
                                     <div class="col">
                                        <div class="row">
                                            <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                                                <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                                           
                                                <img  <?php if(!empty($rekening[$i]->qrcode_bank)) { ?> src="<?= base_url() ?>/assets/users/<?= $kunci ?>/rekening/<?= $rekening[$i]->qrcode_bank ?>" <?php } ?> id="img_qrcode<?= $i+1 ?>" style='border-radius: 5px;height: 200px;width: 200px;'> 
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                                                <div class="btn btn-primary">
                                                    <input type="hidden" name="nama_qrcode[]" value="<?= $rekening[$i]->qrcode_bank ?>">
                                                    <input type="file" class="file-upload" id="qrcode<?= $i+1 ?>"  name="qrcode_picture[]" accept="image/*" onchange="preview_image(event)" > Upload Foto
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>  

                        <?php 
                            }
                        ?>

                    </div>

                    <div class="row mt-2" >
                        <div class="col text-center">
                            <a id="addRekening" class="btn btn-primary btn-order btn-order-secondary btn-block" style="color:#fff">Tambah Rekening</a>
                        </div>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    <?= form_close() ?>     
                </div>
                


            </div>
        </div>

    </div>
    <!--Row-->
</div>

<script>
    function preview_image(event) 
    {
    var id = event.target.id;
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('img_'+id);
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    var i = <?php echo $jml_rekening ?>;

    $(document).on('click', '.btn_remove', function(){  

       var button_id = $(this).attr("id");
       $('#rekening'+button_id+'').remove();  
       i--;

       if(i == 0){
        $("..form-control").prop('required',true);
       }

     });  

    $('#addRekening').click(function(){  

      i++;  

      $('#konten-rekening').append('<div id="rekening'+i+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+i+'</a></div><div class="col"><a id="'+i+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;">Hapus</a></div></div><div class="row align-items-center"><div class="col"><label>Nama Bank</label><input name="nama_bank[]" type="text" class="form-control" placeholder="Contoh : BANK NEGARA INDONESIA " required></div></div><div class="row align-items-center mt-3"><div class="col"><label>No Rekening</label><input name="no_rekening[]" type="text" class="form-control" placeholder="Contoh : 123456" required></div></div><div class="row align-items-center mt-3"><div class="col"><label>Nama Pemilik</label><input name="nama_pemilik[]" type="text" class="form-control" placeholder="Contoh : Admin " required></div></div><div class="row align-items-center mt-3"><div class="col"><div class="row"><div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center"><div class="upload-area" style="height: 100%;padding: 5px 5px;"><img id="img_qrcode'+i+'" style="border-radius: 5px;height: 200px;width: 200px;"></div></div><div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3"><div class="btn btn-primary"><input type="hidden" name="nama_qrcode[]"><input type="file" class="file-upload" id="qrcode'+i+'"  name="qrcode_picture[]" accept="image/*" onchange="preview_image(event)"> Upload Foto</div></div></div></div></div></div>');  
        $(".form-control").prop('required',false);
    });

</script>
