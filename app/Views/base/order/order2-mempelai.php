<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
    <section class="fdb-block" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
                <h1 style="color: #3498db;margin-bottom:0px;">Informasi Mempelai!</h1>
                <p tyle="font-size: 15px;font-weight:500; ">Hai kak! di isi dulu ya datanya </p>
              </div>
            </div>
            
            <div class="progress" style="margin-top: 10px;">
              <div class="progress-bar" role="progressbar" style="width: 15%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" >15%</div>
            </div>
            
            <a class="mt-2" style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">Calon Mempelai Pria</a>

          <form action="<?= base_url('order/3') ?>" method="post">

            <div class="row d-flex align-items-center">
              <div class="col mt-2">
                <label>Foto </label>
                <div class="upload-area-bg" style="text-align: center;">
                  
                  <div class="col">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                       <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                        <?php 
                        $fotogroom = "/assets/base/img/groom.png";
                        $generate = $_SESSION['dummy'];
                        if(isset($_SESSION['foto_groom'])){
                          if($_SESSION['foto_groom'] != '' || $_SESSION['foto_groom'] != 0){
                            $fotogroom = "/assets/users/".$generate."/groom.png";
                          }
                        }
                        ?>
                       <img src="<?= base_url() ?><?= $fotogroom ?>" id="profile-pic-groom" style='border-radius: 5px;height: 200px;width: 200px;' class="img-responsive">
                       </div>

                    </div>
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                      <div class="btn btn-dark">
                        <input type="file" class="file-upload" id="groom"  name="profile_picture" accept="image/*"> Upload Foto
                      </div>
                    </div>
                  </div>   
                </div>
                </div>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col">
                <label>Nama Lengkap</label>
                <input name="nama_lengkap_pria" type="text" class="form-control" placeholder="Contoh : Jack Dawson S.Kom" value="<?php if(isset($_SESSION['nama_lengkap_pria'])) echo $_SESSION['nama_lengkap_pria']; ?>" style='text-transform:capitalize' required>
                 
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Panggilan</label>
                <input name="nama_panggilan_pria" type="text" class="form-control" placeholder="Contoh : Jack" value="<?php if(isset($_SESSION['nama_panggilan_pria'])) echo $_SESSION['nama_panggilan_pria']; ?>" required>
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Ayah</label>
                <input name="nama_ayah_pria" type="text" class="form-control" placeholder="Nama Ayah" value="<?php if(isset($_SESSION['nama_ayah_pria'])) echo $_SESSION['nama_ayah_pria']; ?>" style='text-transform:capitalize' required>
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Ibu</label>
                <input name="nama_ibu_pria" type="text" class="form-control" placeholder="Nama Ibu" value="<?php if(isset($_SESSION['nama_ibu_pria'])) echo $_SESSION['nama_ibu_pria']; ?>" style='text-transform:capitalize' required>
              </div>
            </div>
            <hr>
            <a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;margin-top: 15px;display: flex;">Calon Mempelai Wanita</a>

            <div class="row d-flex align-items-center">
              <div class="col mt-2">
                <label>Foto </label>
                <div class="upload-area-bg" style="text-align: center;">
                  <?php 
                    $fotobride = "/assets/base/img/bride.png";
                    $generate = $_SESSION['dummy'];
                    if(isset($_SESSION['foto_bride'])){

                      if($_SESSION['foto_bride'] != 0 || $_SESSION['foto_bride'] != ''){
                        $fotobride = "/assets/users/".$generate."/bride.png";
                      }

                    }
                   
                    
                  ?>
                  <div class="col">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                       <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                       <img src="<?= base_url() ?><?= $fotobride ?>" id="profile-pic-bride" style='border-radius: 5px;height: 200px;width: 200px;'>
                       </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center mt-3">
                      <div class="btn btn-dark">
                        <input type="file" class="file-upload" id="bride"  name="profile_picture" accept="image/*"> Upload Foto
                      </div>
                    </div>
                  </div>   
                </div>
                </div>
              </div>
            </div>

            <div class="row align-items-center">
              <div class="col">
                <label>Nama Lengkap</label>
                <input name="nama_lengkap_wanita" type="text" class="form-control" placeholder="Contoh : Fatimah Az Zahra" value="<?php if(isset($_SESSION['nama_lengkap_wanita'])) echo $_SESSION['nama_lengkap_wanita']; ?>" style='text-transform:capitalize' required>
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Panggilan</label>
                <input name="nama_panggilan_wanita"  type="text" class="form-control" placeholder="Contoh : Fatimah" value="<?php if(isset($_SESSION['nama_panggilan_wanita'])) echo $_SESSION['nama_panggilan_wanita']; ?>" required>
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Ayah</label>
                <input name="nama_ayah_wanita"  type="text" class="form-control" placeholder="Nama Ayah" value="<?php if(isset($_SESSION['nama_ayah_wanita'])) echo $_SESSION['nama_ayah_wanita']; ?>" style='text-transform:capitalize' required>
                
              </div>
            </div>

            <div class="row align-items-center mt-3">
              <div class="col">
                <label>Nama Ibu</label>
                <input name="nama_ibu_wanita"  type="text" class="form-control" placeholder="Nama Ibu" value="<?php if(isset($_SESSION['nama_ibu_wanita'])) echo $_SESSION['nama_ibu_wanita']; ?>" style='text-transform:capitalize' required>
               
              </div>
            </div>
            <hr>
            <div class="row d-flex align-items-center">
              <div class="col mt-2">
                <label>Foto Sampul</label>
                <div class="upload-area-bg" style="text-align: center;">
                  
                  <div class="col">
                  <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 d-flex align-items-center justify-content-center">
                       <div class="upload-area" style="height: 100%;padding: 5px 5px;">
                        <?php 
                        $fotosampul = "/assets/base/img/kita.png";
                        $generate = $_SESSION['dummy'];
                        if(isset($_SESSION['foto_sampul'])){
                          if($_SESSION['foto_sampul'] != '' || $_SESSION['foto_sampul'] != 0){
                            $fotosampul = "/assets/users/".$generate."/kita.png";
                          }
                        }
                        ?>
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

            <div class="row justify-content-start mt-4" >
              <div class="col">
                <div class="row">
                  
                  <div class="col-auto">
                    <a href="<?= base_url('order/1'); ?>" class="btn btn-secondary btn-order">Kembali</a>
                  </div>
                  <div class="col">
                    <input name="submit" type="submit" class="btn btn-primary btn-order btn-block" style="background-color: #3498db;" value="Lanjut">
                  </div>
                </div>   
              </div>
            </div>
          </form>


          </div>
        </div>
      </div>
    </section>
</div>