<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 
    <div class="row mb-3">
        
        <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pengaturan Undangan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Nama Domain / URL Undangan</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" ><?= DOMAIN_UNDANGAN ?>/</span>
                          </div>
                          <input id="domain" type="text" class="form-control" placeholder="akudandia"  value="<?= $order[0]->domain ?>"   onkeyup="nospaces(this)" required>
                        </div>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalDomain">Simpan</button>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Token Whatsapp Gateway</label>
                    <input id="token_wa" type="text" class="form-control" placeholder="Masukan Token Whatsapp Gateway anda" value="<?= $data[0]->token_wa ?>" required>
                    <?php if ($setting[0]->wa_gateway != "onesender") { ?><small><i>Kosongkan Jika tidak memiliki Token Whatsapp Gateway atau <a target="_blank" href="<?php if ($setting[0]->wa_gateway == 'nusagateway') { echo 'https://nusagateway.com'; }else if($setting[0]->wa_gateway == "starsender") { echo 'https://starsender.online' ;} ?>">Klik Disini</a></i></small>
                        <?php } ?>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalToken">Simpan</button>
                </div>
              </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Musik</h6></h6>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('user/update_musik'); ?>">
                <div class="card-body">
                    <label>Musik Latar (max 2MB)</label>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="musik" id="musik" accept=".mp3">
                      </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
              </div>
              
        </div>
        <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Form Basic -->
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Salam Pembuka</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Salam Pembuka Undangan </label>
                    <div class="form-group">
                      <div class="custom-file">
                        <textarea rows="4" id="salam_pembuka" class="form-control" required><?= $data[0]->salam_pembuka ?></textarea>
                      </div>
                    </div>
                    <label>Salam Pembuka Whatsapp (Atas) </label>
                    <div class="form-group">
                      <div class="custom-file">
                        <textarea rows="4" id="salam_wa_atas" class="form-control" required><?= $data[0]->salam_wa_atas ?></textarea>
                      </div>
                    </div>
                    <label>Salam Pembuka Whatsapp (Bawah) </label>
                    <div class="form-group">
                      <div class="custom-file">
                        <textarea rows="4" id="salam_wa_bawah" class="form-control" required><?= $data[0]->salam_wa_bawah ?></textarea>
                      </div>
                    </div>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalSalam">Simpan</button>
                </div>
              </div>
        </div>
        
    </div>
        <div class="col-xl-6 col-lg-6 mb-4">
         <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Fitur Undangan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setSampul">
                        <label class="custom-control-label" for="setSampul" >Halaman Sampul</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setMempelai">
                        <label class="custom-control-label" for="setMempelai" >Halaman Mempelai</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" disabled checked id="setAcara">
                        <label class="custom-control-label" for="setAcara" >Halaman Acara</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setUcapan" 
                        <?php if($fitur[0]->komen == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setUcapan" >Halaman Ucapan</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setAlbum"
                        <?php if($fitur[0]->gallery == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setAlbum" >Halaman Gallery/Album</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setCerita"
                        <?php if($fitur[0]->cerita == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setCerita">Halaman Cerita</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setLokasi"
                        <?php if($fitur[0]->lokasi == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setLokasi" >Halaman Lokasi</label>
                      </div>
                      <?php if ($paket[0]->buku_tamu == 1){ ?>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setQrcode"
                        <?php if($fitur[0]->qrcode == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setQrcode" >Halaman QrCode</label>
                      </div>
                      <?php } ?>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setProkes"
                        <?php if($fitur[0]->prokes == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setProkes" >Halaman Prokes</label>
                      </div>
                      <?php if ($paket[0]->kirim_hadiah == 1){ ?>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setHadiah"
                        <?php if($fitur[0]->hadiah == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setHadiah" >Halaman Kirim Hadiah</label>
                      </div><?php } ?>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setQuote"
                        <?php if($fitur[0]->quote == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setQuote" >Halaman Quote</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalFitur">Simpan</button>
                </div>
            </div>
        </div>
        
    <!--Row-->
</div>

<!-- Modal -->
<div class="modal fade" id="modalDomain" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="modalToken" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengubah Token Whatsapp Gateway ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="simpanToken">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalFitur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanFitur">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalSalam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanSalam">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalQuote" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanQuote">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalGagal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kesalahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Gagal mengganti nama domain..
        Nama domain sudah dipakai!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script>
    function nospaces(t){
      if(t.value.match(/\s/g)){
        t.value=t.value.replace(/\s/g,'');
      }
    }

    $('#simpanFitur').on('click', function(event) {

        var ucapan = $('#setUcapan').is(":checked") ? 1 : 0;
        var album = $('#setAlbum').is(":checked") ? 1 : 0;
        var cerita = $('#setCerita').is(":checked") ? 1 : 0;
        var lokasi = $('#setLokasi').is(":checked") ? 1 : 0;
        var prokes = $('#setProkes').is(":checked") ? 1 : 0;
        var qrcode = $('#setQrcode').is(":checked") ? 1 : 0;
        var hadiah = $('#setHadiah').is(":checked") ? 1 : 0;
        var quote = $('#setQuote').is(":checked") ? 1 : 0;
        $.ajax({
            url : "<?= base_url('user/update_fitur') ?>",
            method : "POST",
            data : {ucapan: ucapan,album: album, cerita: cerita, lokasi: lokasi, prokes:prokes, qrcode:qrcode, hadiah : hadiah, quote:quote},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });

    $('#simpanDomain').on('click', function(event) {

      var domain = $('#domain').val();      

      $.ajax({
          url : "<?= base_url('user/update_domain') ?>",
          method : "POST",
          data : {domain: domain},
            async : true,
            dataType : 'html',
          success: function($hasil){
              if($hasil == 'sukses'){
                  location.reload();
              }else{
                  $('#modalDomain').modal('hide'); 
                  $('#modalGagal').modal('show'); 
              }

              console.log($hasil);
          }
      });

    });
    
    $('#simpanToken').on('click', function(event) {

      var token_wa = $('#token_wa').val();      

      $.ajax({
          url : "<?= base_url('user/update_wa') ?>",
          method : "POST",
          data : {token_wa: token_wa},
            async : true,
            dataType : 'html',
          success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
      });

    });

    $('#simpanSalam').on('click', function(event) {

      var salam_pembuka = $('#salam_pembuka').val();
      var salam_wa_atas = $('#salam_wa_atas').val();      
      var salam_wa_bawah = $('#salam_wa_bawah').val();      

      $.ajax({
          url : "<?= base_url('user/update_salam') ?>",
          method : "POST",
          data : {salam_pembuka: salam_pembuka, salam_wa_atas:salam_wa_atas, salam_wa_bawah:salam_wa_bawah},
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