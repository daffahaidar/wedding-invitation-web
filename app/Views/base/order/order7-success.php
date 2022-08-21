<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
    <section class="fdb-block" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
                <h1 style="color: #3498db;margin-bottom:0px;">Sukses!</h1>
                <p tyle="font-size: 15px;font-weight:500; ">Hai kak! selamat undangan kamu sudah berhasil dibuat </p>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col mt-5">
                <label>Kode Pesanan</label>
                <div class="upload-area-bg" style="margin-top: 5px;text-align: center;">
                  
                  <div class="col">
                  <div class="row">
                    <div class="col">
                      <a style="font-size: 14px;text-transform: uppercase;color: #2c3e50;" >#<?= $kode ?></a>
                    </div>
                    <div class="col-auto">
                      <?php if($status == 2){ ?>
                       <a href="#" class="btn-success btn-sm" >Lunas</a>
                      <?php }else{ ?> 
                        <a href="#" class="btn-warning btn-sm" >Belum Lunas</a>
                      <?php } ?>
                    </div>
                  </div>   
                </div>
                </div>
              </div>
            </div>

            <div class="row justify-content-start mt-3" >
                <div class="col">
                  <div class="row">
                    <div class="col">
                      <a href="<?= SITE_UNDANGAN?>/<?= $domain ?>" target="_blank" class="btn btn-primary btn-order btn-block" >Review Undangan</a>
                    </div>
                    <div class="col" <?php if($status == 1)echo "style='display:none'" ?>>
<?php $format = 
"Hallo kak,
saya mau aktivasi Undangan *".$kode."*. 
mohon infonya " ?> 
               
				<a href="<?= base_url('user/logout') ?>" target="_blank" class="btn btn-success btn-order btn-block" >Login Dashboard</a>
                    </div>
                  </div>   
                </div>
            </div>

            <div class="form-check mt-4" style="text-align: center;" >
              <h3 class="form-check-label" <?php if($status == 2)echo "style='display:none'" ?>>
                  Untuk melakukan aktifasi silahkan login dengan email dan password yang anda buat atau bisa menghubungi admin via <a href="https://api.whatsapp.com/send?phone=<?= $setting[0]->no_wa; ?>&text=<?php echo urlencode($format) ?>" >Whatsapp</a> dengan menyertakan <strong>kode :<h2 style="color:red; size:30px; text:bold;">#<?= $kode ?></h2></strong>
              </h3>
            </div>

          </div>
        </div>
      </div>
    </section>
</div>