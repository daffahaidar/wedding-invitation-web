<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>
    <div class="row mb-3">
    <div class="col-xl-6 col-lg-6 mb-4">
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('user/set_countdown'); ?>">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pengaturan Acara</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Sebagai Countdown Acara</label>
                    <select class="form-control" id="id_acara" name="id_acara" required>
                            <option value=''>--Pilih Nama Acara--</option>
                            <?php foreach ($acara as $row) : ?>
                                <?php if ($row->set_countdown == 'Y') { ?>
                                    <option value="<?= $row->id_acara ?>" selected><?= $row->nama_acara ?></option>
                                <?php } else { ?>
                                    <option value="<?= $row->id_acara ?>"><?= $row->nama_acara ?></option>
                            <?php
                                }
                            endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
              </div>
              </form>
        </div>
    <div class="col-xl-6 col-lg-6 mb-4">
        <div class="card mb-4">
            <div class="card-body">
            <form method="post" action="<?php echo base_url('user/update_acara'); ?>">
                <div id="konten-acara" >
                                    
                <?php 
                 $jml_acara = count($acara);
                for($i=0;$i < $jml_acara;$i++){ 
                ?>
                    <div id="acara<?php echo $i+1 ?>">
                        <div class="row align-items-center mt-3">
                            <div class="col-auto">
                                <a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#<?php echo $i+1 ?></a>
                            </div>
                            <div class="col-auto">
                                <a id="<?php echo $i+1 ?>" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                            </div>
                            
                        </div>
                    <!-- CONTENT DISINI -->
                        <div class="col mt-2">
                            <label>Nama Acara</label>
                            <input name="nama_acara[]" type="text" class="form-control" placeholder="Contoh : Akad Nikah" value="<?= $acara[$i]->nama_acara ?>" required>
                            <input name="set_countdown[]" type="hidden" class="form-control" value="<?= $acara[$i]->set_countdown ?>">
                        </div>
                        <div class="col mt-2">
                            <label>Tanggal </label>
                            <input type="text" class="form-control" id="datepicker<?= $i+1?>" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required>
                            <input type="hidden" name="tgl_acara[]" id="tgl_acara<?= $i +1 ?>" value="<?= $acara[$i]->tgl_acara ?>">
                        </div>
        
                        <div class="col mt-2">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Waktu / Jam </label>
                                    <input name="waktu_mulai[]" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $acara[$i]->waktu_mulai ?>" required>
                                </div>
                                <div class="col-md-6">
                                  <label>Waktu / Jam </label>
                                  <input name="waktu_akhir[]" type="time" class="form-control" placeholder="Contoh : 10.00 Pagi" value="<?= $acara[$i]->waktu_akhir ?>" required>
                                </div>
                            </div>
                        </div>
                            
                        <div class="col mt-2">
                            <label>Tempat / Lokasi</label>
                            <input name="tempat_acara[]" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita " value="<?= $acara[$i]->tempat_acara ?>" required>
                        </div>
        
                        <div class="col mt-2">
                            <label>Alamat</label>
                            <textarea name="alamat_acara[]" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"><?= $acara[$i]->alamat_acara ?></textarea>
                        </div>
                        <div class="col mt-2">
                            <label>Google Maps Link</label>
                            <textarea id="maps" name="maps[]" type="text" class="form-control"><?= $acara[$i]->maps ?></textarea>
                            <div class="mt-1">
                            <label class="form-check-label ">
                            <a href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Maps</a>
                            </label>
                                
                        </div>
                        </div>
                    </div>
                    <?php 
                }
            ?>
                </div>
           <div class="row mt-2" >
                        <div class="col text-center">
                            <a id="addAcara" class="btn btn-primary btn-order btn-order-secondary btn-block" style="color:#fff">Tambah Acara</a>
                        </div>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalSimpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengubah nama domain ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanDomain">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>
<script>
    
    $(document).ready(function () {
    var i = <?php echo $jml_acara ?>;
    let picker = [];
    for(let a = 1; a < i+1; a++){
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
       i--;

       if(i == 0){
        $(".form-control").prop('required',true);
       }

     });  

    $('#addAcara').click(function(){  

      i++;  
        var d = new Date();
        var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
      $('#konten-acara').append('<div id="acara<?php echo $i+1 ?>"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+i+'</a></div><div class="col"><a id="'+i+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a></div></div><div class="col mt-2"><label>Nama Acara</label><input name="nama_acara[]" type="text" class="form-control" placeholder="Contoh : Akad Nikah" required></div><div class="col mt-2"><label>Tanggal </label><input type="text" class="form-control" id="datepicker'+i+'" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required><input type="hidden" name="tgl_acara[]" id="tgl_acara'+i+'" value="'+strDate+'"></div><div class="col mt-2"><div class="form-row"><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_mulai[]" type="time" class="form-control" placeholder="Contoh : 10.00 " required></div><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_akhir[]" type="time" class="form-control" placeholder="Contoh : 10.00" required></div></div></div><div class="col mt-2"><label>Tempat / Lokasi</label><input name="tempat_acara[]" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita" required></div><div class="col mt-2"><label>Alamat</label><textarea name="alamat_acara[]" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"></textarea></div><div class="col mt-2"><label>Google Maps Link</label><textarea id="maps"  name="maps[]" type="text" class="form-control" required></textarea><div class="mt-1"><label class="form-check-label "><a href="<?php echo base_url('maps'); ?>" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Maps</a></label></div></div></div>');
      var tgl = $('#tgl_acara'+i+'').val();
      moment.locale('id');
      $('#datepicker'+i+'').val(moment(tgl).format('dddd, Do MMMM YYYY'));
        var picker = new Pikaday({ 
          format: 'dddd, Do MMMM YYYY',
          field: $('#datepicker'+i+'')[0],
          onSelect: function() {
            $('#tgl_acara'+i+'').val(this.getMoment().format('YYYY/MM/DD'));
          }
        });
        $(".form-control").prop('required',false);
    });
});
</script>
