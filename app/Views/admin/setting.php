<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row">
        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <label>Setting Undangan</label>
                    <div class="form-group">
                        <label>Waktu Trial Undangan (hari)</label>
                        <input id="trial" type="number" class="form-control" value="<?= $setting[0]->trial ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Salam Pembuka (default)</label>
                        <textarea id="salam_pembuka" class="form-control" required><?= $setting[0]->salam_pembuka ?></textarea>
                    </div>
                    <label>Salam Pembuka Whatsapp (Atas) </label>
                    <div class="form-group">
                      <div class="custom-file">
                        <textarea rows="4" id="salam_wa_atas" class="form-control" required><?= $setting[0]->salam_wa_atas ?></textarea>
                      </div>
                    </div>
                    <label>Salam Pembuka Whatsapp (Bawah) </label>
                    <div class="form-group">
                      <div class="custom-file">
                        <textarea rows="4" id="salam_wa_bawah" class="form-control" required><?= $setting[0]->salam_wa_bawah ?></textarea>
                      </div>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting2">Simpan</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">

                <div class="card-body">
                <label>Contact Admin</label>
                    <div class="form-group">
                        <label>Host Email</label>
                        <input id="host_email" type="text" class="form-control" placeholder="Contoh : smtp.gmail.com atau domain anda" value="<?= $setting[0]->host_email ?>" required>
                        <small><i>Kosongkan Jika tidak membutuhkan notifikasi email </i></small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" placeholder="Masukan Email anda" value="<?= $setting[0]->email ?>" required>
                        <small><i>Kosongkan Jika tidak membutuhkan notifikasi email </i></small>
                    </div>
                    <div class="form-group">
                        <label>Password Email</label>
                        <input id="pass_email" type="text" class="form-control" placeholder="masukkan password email anda" value="<?= $setting[0]->pass_email ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan Pembayaran</label>
                        <select class="form-control" id="wa_gateway" name="wa_gateway" required>
                            <?php
                              //cek data yg dipilih sebelumnya
                              if ($setting[0]->wa_gateway == "nusagateway") echo "<option value='nusagateway' selected>Nusagateway</option>";
                              else echo "<option value='nusagateway'>Nusagateway</option>";

                              if ($setting[0]->wa_gateway == "starsender") echo "<option value='starsender' selected>Starsender</option>";
                              else echo "<option value='starsender'>Starsender</option>";
                              if ($setting[0]->wa_gateway == "onesender") echo "<option value='onesender' selected>Onesender</option>";
                              else echo "<option value='onesender'>Onesender</option>";
                              ?>
                            </select>
                    </div>
                    <div class="form-group">
                        <label>Token Whatsapp Gateway</label>
                        <input id="token_wa" type="text" class="form-control" placeholder="Masukan Token Whatsapp Gateway anda" value="<?= $setting[0]->token_wa ?>" required>
                        <?php if ($setting[0]->wa_gateway != "onesender") { ?><small><i>Kosongkan Jika tidak memiliki Token Whatsapp Gateway atau <a target="_blank" href="<?php if ($setting[0]->wa_gateway == 'nusagateway') { echo 'https://nusagateway.com'; }else if($setting[0]->wa_gateway == "starsender") { echo 'https://starsender.online' ;} ?>">Klik Disini</a></i></small>
                        <?php } ?>
                        </div>
                    <div class="form-group">
                        <label>No Whatsapp</label>
                        <input id="no_wa" type="text" class="form-control" placeholder="contoh : 628xxxxxx" value="<?= $setting[0]->no_wa ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Pesan Whatsapp</label>
                        <textarea id="pesan_wa" class="form-control" required><?= $setting[0]->pesan_wa ?></textarea>
                    </div>
                   
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting1">Simpan</button>
                </div>
            </div>
        </div>    
    </div>
    
    <!--Row-->
</div>

<!-- Modal -->
<div class="modal fade" id="modalSetting1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanSetting1">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalSetting2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanSetting2">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#simpanSetting1').on('click', function(event) {
var no_wa = $('#no_wa').val();
var pesan_wa = $('#pesan_wa').val();
var host_email = $('#host_email').val();
var email = $('#email').val();
var pass_email = $('#pass_email').val();
var wa_gateway = $('#wa_gateway').val();
var token_wa = $('#token_wa').val();
$.ajax({
    url : "<?= base_url('admin/update_setting1') ?>",
    method : "POST",
    data : {host_email: host_email, email: email, pass_email:pass_email, wa_gateway:wa_gateway, token_wa:token_wa, no_wa:no_wa, pesan_wa:pesan_wa},
    async : true,
    dataType : 'html',
    success: function($hasil){
        if($hasil == 'sukses'){
            location.reload();
        }
    }
});

});
$('#simpanSetting2').on('click', function(event) {
var trial = $('#trial').val();
var salam_pembuka = $('#salam_pembuka').val();
var salam_wa_atas = $('#salam_wa_atas').val();
var salam_wa_bawah = $('#salam_wa_bawah').val();

$.ajax({
    url : "<?= base_url('admin/update_setting2') ?>",
    method : "POST",
    data : {trial:trial, salam_pembuka:salam_pembuka, salam_wa_atas:salam_wa_atas, salam_wa_bawah:salam_wa_bawah},
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
