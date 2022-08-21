<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 

    <div class="row">
        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <label>Setting Pembayaran Manual</label>
                    <div class="form-group">
                        <label>Nama Bank</label>
                        <input id="bank_manual" type="text" class="form-control" value="<?= $setting[0]->bank_manual ?>" required>
                    </div>
                    <div class="form-group">
                        <label>No Rekening</label>
                        <input id="norek_manual" type="number" class="form-control" value="<?= $setting[0]->norek_manual ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Pemilik</label>
                        <input id="nama_manual" type="text" class="form-control" value="<?= $setting[0]->nama_manual ?>" required>
                    </div>
                    <hr>
                    <label>Setting Pembayaran Midtrans</label>
                    <div class="form-group">
                        <label>Url Midtrans</label>
                        <input id="url_midtrans" type="text" class="form-control" placeholder="Masukkan URL untuk snap Midtrans" value="<?= $setting[0]->url_midtrans ?>" required>
                    </div>
                    <div class="form-group">
                        <label>ServerKey Midtrans</label>
                        <input id="serverkey_midtrans" type="text" class="form-control" placeholder="Masukan Server Key Midtrans anda" value="<?= $setting[0]->serverkey_midtrans ?>" required>
                    </div>
                    <div class="form-group">
                        <label>ClientKey Midtrans</label>
                        <input id="clientkey_midtrans" type="text" class="form-control" placeholder="masukkan Client Key Midtrans anda" value="<?= $setting[0]->clientkey_midtrans ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Mode Production</label>
                        <select class="form-control" id="midtrans_production" name="midtrans_production" required>
                            <?php
							//cek data yg dipilih sebelumnya
							if ($setting[0]->midtrans_production == "true") echo "<option value='true' selected>Ya</option>";
							else echo "<option value='true'>Ya</option>";

							if ($setting[0]->midtrans_production == "false") echo "<option value='false' selected>Tidak</option>";
							else echo "<option value='false'>Tidak</option>";
							?>
                            </select>
                    </div>
                    <label>Setting Pembayaran Tripay</label>
                    <div class="form-group">
                        <label>Kode Merchant</label>
                        <input id="merchantcode_tripay" type="text" class="form-control" placeholder="Masukkan Kode Merchant Tripay Anda" value="<?= $setting[0]->merchantcode_tripay ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Api Key</label>
                        <input id="apikey_tripay" type="text" class="form-control" placeholder="Masukan API Key Tripay anda" value="<?= $setting[0]->apikey_tripay ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Private Key</label>
                        <input id="privatekey_tripay" type="text" class="form-control" placeholder="masukkan Private Key Tripay anda" value="<?= $setting[0]->privatekey_tripay ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Url Transaksi Tripay</label>
                        <input id="url_tripay" type="text" class="form-control" placeholder="Masukkan URL untuk Transaksi Tripay Anda" value="<?= $setting[0]->url_tripay ?>" required>
                    </div>
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting1">Simpan</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 mb-4">
            <div class="card mb-4">

                <div class="card-body">
                    <label>Metode Pembayaran Tagihan</label>
                    <div class="form-group">
                        <label>Pilihan Pembayaran</label>
                        <select class="form-control" id="metode_bayar" name="metode_bayar" required>
                            <?php
							//cek data yg dipilih sebelumnya
							if ($setting[0]->metode_bayar == "manual") echo "<option value='manual' selected>Manual</option>";
							else echo "<option value='manual'>Manual</option>";

							if ($setting[0]->metode_bayar == "midtrans") echo "<option value='midtrans' selected>Midtrans</option>";
							else echo "<option value='midtrans'>Midtrans</option>";
							if ($setting[0]->metode_bayar == "tripay") echo "<option value='tripay' selected>Tripay</option>";
							else echo "<option value='tripay'>Tripay</option>";
							?>
                            </select>
                    </div>
                    
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSetting2">Simpan</button>
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
var bank_manual = $('#bank_manual').val();
var norek_manual = $('#norek_manual').val();
var nama_manual = $('#nama_manual').val();
var url_midtrans = $('#url_midtrans').val();
var serverkey_midtrans = $('#serverkey_midtrans').val();
var clientkey_midtrans = $('#clientkey_midtrans').val();
var midtrans_production = $('#midtrans_production').val();
var apikey_tripay = $('#apikey_tripay').val();
var url_tripay = $('#url_tripay').val();
var privatekey_tripay = $('#privatekey_tripay').val();
var merchantcode_tripay = $('#merchantcode_tripay').val();
$.ajax({
    url : "<?= base_url('admin/update_setting_pembayaran_1') ?>",
    method : "POST",
    data : {bank_manual: bank_manual, norek_manual: norek_manual, nama_manual: nama_manual, 
        url_midtrans: url_midtrans, serverkey_midtrans:serverkey_midtrans, clientkey_midtrans:clientkey_midtrans, midtrans_production:midtrans_production, url_tripay:url_tripay, merchantcode_tripay:merchantcode_tripay, privatekey_tripay:privatekey_tripay, apikey_tripay:apikey_tripay },
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
var metode_bayar = $('#metode_bayar').val();
$.ajax({
    url : "<?= base_url('admin/update_setting_pembayaran_2') ?>",
    method : "POST",
    data : {metode_bayar:metode_bayar},
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
