<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        <a href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>" class="btn btn-primary btn-sm">Lihat Website</a>
        </div>
    </div> 

    <div class="row mb-3">

        <!-- ========== MEMPELAI =========== -->
        <?php 
            $kunci = $data[0]->kunci;
            $fotogroom = "/assets/users/".$kunci."/groom.png";
            $fotobride = "/assets/users/".$kunci."/bride.png";
            $fotosampul = "/assets/users/".$kunci."/kita.png";
        ?>
        <div class="row">
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
            <!-- ========== PENGATURAN ========== -->
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
              </div>
            </div>
        
        </div>
        <!-- ========== ACARA ========== -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Acara</h6>
                </div>
                <div class="card-body">
                   
                    <form method="post" action="<?php echo base_url('admin/update_acara'); ?>">
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
                            <div class="col">
                                <a id="<?php echo $i+1 ?>" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a>
                            </div>
                        </div>
                    <!-- CONTENT DISINI -->
                        <div class="col mt-2">
                            <label>Nama Acara</label>
                            <input name="nama_acara[]" type="text" class="form-control" placeholder="Contoh : Akad Nikah" value="<?= $acara[$i]->nama_acara ?>" required>
                        </div>
                        <div class="col mt-2">
                            <label>Tanggal </label>
                            <input type="text" class="form-control" id="datepicker<?= $i+1 ?>"  placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" required>
                            <input type="hidden" name="tgl_acara[]" id="tgl_acara<?= $i+1 ?>" value="<?= $acara[$i]->tgl_acara ?>">
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
                            <a target="_blank" href="<?= SITE_UTAMA ?>/maps" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Maps</a>
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
        <!-- ========== CERITA ========== -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Cerita</h6>
                </div>
                <div class="card-body">
                   
                    <form method="post" action="<?php echo base_url('admin/update_cerita'); ?>">
                    <div id="konten-cerita" >
                    
                        <?php 
                            $jml_cerita = count($cerita);
                            for($i=0;$i < $jml_cerita;$i++){ 
                        ?>

                            <div id="cerita<?php echo $i+1 ?>">
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
                                        <label>Tanggal</label>
                                        <input name="tanggal_cerita[]" type="text" class="form-control" placeholder="Contoh : 20 Februari 2020" value="<?= $cerita[$i]->tanggal_cerita ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>Judul</label>
                                        <input name="judul_cerita[]" type="text" class="form-control" placeholder="Contoh : Ta'aruf" value="<?= $cerita[$i]->judul_cerita  ?>" required>
                                    </div>
                                </div>

                                <div class="row align-items-center mt-3">
                                    <div class="col">
                                        <label>Isi Cerita</label>
                                        <textarea name="isi_cerita[]" type="text" class="form-control" placeholder="Maximal 500 Karakter" maxlength="500" rows="4" required><?= $cerita[$i]->isi_cerita ?></textarea>
                                    </div>
                                </div>
                            </div>  

                        <?php 
                            }
                        ?>

                    </div>

                    <div class="row mt-2" >
                        <div class="col text-center">
                            <a id="addCerita" class="btn btn-primary btn-order btn-order-secondary btn-block" style="color:#fff">Tambah Cerita</a>
                        </div>
                    </div>

                    <div class="col mt-3">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                    </form>        
                </div>
                


            </div>
        </div>

        <!-- ========== GALLERY ========== -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gallery</h6>
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
                                $pathName = 'assets/users/'.$kunci.'/album'.$a.'.png';
                                if(!file_exists($pathName))continue;
                        ?>

                        <div class="preview-uploads" id="preview<?= $a ?>">
                            <div class="preview-uploads-img">
                                <span class="preview">
                                <img id="img<?= $a ?>" src="<?= base_url() ?>/assets/users/<?= $kunci ?>/album<?= $a ?>.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;"  />
                                </span>
                            </div>
                            <div class="preview-uploads-name">
                            <b><p class="name" style="line-height: revert;font-size: 12px;" >album<?= $a; ?></p></b>
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

        <!-- ========== VIDEO  ==========-->
          <div class="col-xl-6 col-lg-6 mb-4">
              <div class="card mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                      <h6 class="m-0 font-weight-bold text-primary">Data Video</h6>
                  </div>
                  <div class="card-body">
                      <label>Youtube Link</label>
                      <textarea id="video" type="text" class="form-control" placeholder="Contoh : https://youtu.be/zlKzyYnhu-s" required><?= $data[0]->video ?></textarea>
                      <div class="mt-1">
                      <label class="form-check-label ">
                        <a href="<?= SITE_UTAMA ?>/youtube" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Video</a>
                      </label>
                      </div>
                      <div class="col mt-3">
                          <button class="btn btn-primary" data-toggle="modal" data-target="#modalVideo">Simpan</button>
                      </div>
                  </div>
              </div>
          </div>

        <div class="col-xl-6 col-lg-6 mb-4">
              <!-- Form Basic -->
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_musik'); ?>">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Musik</h6>
                </div>
                <div class="card-body">

                    <label>Musik Latar (max 2MB)</label>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name="musik" id="musik" accept=".mp3">
                      </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
              </div>
              </form>
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
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setQrcode"
                        <?php if($fitur[0]->qrcode == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setQrcode" >Halaman QrCode</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setProkes"
                        <?php if($fitur[0]->prokes == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setProkes" >Halaman Prokes</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setHadiah"
                        <?php if($fitur[0]->hadiah == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setHadiah" >Halaman Kirim Hadiah</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modalFitur">Simpan</button>
                </div>
            </div>
        </div>

        <!-- ========= PROFIL ========= -->
        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profil Pengguna</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Username</label>
                        <input id="username" type="text" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->username ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input id="password" type="password" class="form-control" placeholder="********" value="" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input id="email" type="email" class="form-control" placeholder="Contoh : reydinda" value="<?= $user[0]->email ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input id="hp" type="number" class="form-control" placeholder="Contoh : 6281234567890" value="<?= $user[0]->hp ?>" required>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUser">Simpan</button>
                </div>
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

<!-- Modal -->
<div class="modal fade" id="modalAkad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanAkad">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalResepsi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanResepsi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMaps" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanMaps">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
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


<!-- Modal -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanUser">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>



<script src="<?php echo base_url() ?>/assets/base/js/croppie.min.js"></script>
<script src="<?php echo base_url() ?>/assets/base/js/dropzone.js"></script>
<script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>

<script>

    // ============= CERITA                        
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
    <?= $jml_acara = count($acara); 
    ?> 
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
        $(".form-control").prop('required',true);
       }

     });  

    $('#addAcara').click(function(){  
      j++;
      var d = new Date();
        var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
      $('#konten-acara').append('<div id="acara'+j+'"><div class="row align-items-center mt-3"><div class="col-auto"><a style="color: #2c3e50;margin-bottom:0px;font-size: 20px;font-weight: 600;display: flex;">#'+j+'</a></div><div class="col"><a id="'+j+'" class="btn btn-sm btn_remove" style="background-color: #dc3545;padding: 5px;font-size: 12px;border-radius: 5px;color:#fff">Hapus</a></div></div><div class="col mt-2"><label>Nama Acara</label><input name="nama_acara[]" type="text" class="form-control" placeholder="Contoh : Akad Nikah" required></div><div class="col mt-2"><label>Tanggal </label><input type="text" class="form-control" id="datepicker'+j+'" placeholder="Tanggal" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" value="Jumat, 17 Januari 2020" required><input type="hidden" name="tgl_acara[]" id="tgl_acara'+j+'" value="'+strDate+'"></div><div class="col mt-2"><div class="form-row"><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_mulai[]" type="time" class="form-control" placeholder="Contoh : 10.00 " required></div><div class="col-md-6"><label>Waktu / Jam </label><input name="waktu_akhir[]" type="time" class="form-control" placeholder="Contoh : 10.00" required></div></div></div><div class="col mt-2"><label>Tempat / Lokasi</label><input name="tempat_acara[]" type="text" class="form-control" placeholder="Contoh : Kediaman Mempelai Wanita" required></div><div class="col mt-2"><label>Alamat</label><textarea name="alamat_acara[]" type="text" class="form-control" placeholder="Contoh : JL. Ahmad Yani No.1"></textarea></div><div class="col mt-2"><label>Google Maps Link</label><textarea id="maps"  name="maps[]" type="text" class="form-control" required></textarea><div class="mt-1"><label class="form-check-label "><a target="_blank" href="<?= SITE_UTAMA ?>/maps" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Cara Menambahkan Maps</a></label></div></div></div>');
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



    // ============= GALLERY

        var myDropzone = new Dropzone(document.body, { 
    url: "<?php echo base_url('admin/update_gallery'); ?>", 
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
        $("#previewss").prepend('<div id="preview'+aql.no+'" class="file-row preview-uploads"><div class="preview-uploads-img"><span class="preview"><img id="img3" src="<?= base_url() ?>/assets/users/'+aql.kunci+'/album'+aql.no+'.png"  style="height: 100%;object-position: center;object-fit: cover;width: 100%;" /></span></div><div class="preview-uploads-name"><p class="name" style="line-height: revert;font-size: 12px;" data-dz-name>album'+aql.no+'</p><strong class="error text-danger" style="line-height: revert;font-size: 12px;"  ></strong><p class="size" style="line-height: revert;font-size: 12px;" >-</p></div><div  class="preview-uploads-delete"><button id="'+aql.no+'" class="btn btn-danger delete btnhehe">Hapus</button></div></div>');
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
        url: '<?= base_url('admin/del_gallery') ?>',
        data: {id: button_id,kunci: kunci},
        success: function(data){
            console.log('success: ' + data);
            $('#preview'+button_id).remove();
        }
    });
    
    });

    $('#simpanVideo').on('click', function(event) {

        var video = $('#video').val();
        $.ajax({
            url : "<?= base_url('admin/update_video') ?>",
            method : "POST",
            data : {video: video},
            async : true,
            dataType : 'html',
            success: function($hasil){
                if($hasil == 'sukses'){
                    location.reload();
                }
            }
        });

    });



    // ========== MEMPELAI
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

                var url = "<?php echo base_url('admin/update_foto_mempelai') ?>";
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
            url : "<?= base_url('admin/update_mempelai') ?>",
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
          url : "<?= base_url('admin/update_mempelai') ?>",
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


    //========== PENGATURAN 
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
        console.log(ucapan);

        $.ajax({
            url : "<?= base_url('admin/update_fitur') ?>",
            method : "POST",
            data : {ucapan: ucapan,album: album, cerita: cerita, lokasi: lokasi, prokes:prokes, qrcode:qrcode, hadiah : hadiah},
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
          url : "<?= base_url('admin/update_domain') ?>",
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

    //=======PROFIL
    $('#simpanUser').on('click', function(event) {

        var username = $('#username').val();
        var hp = $('#hp').val();
        var password = $('#password').val();
        var email = $('#email').val();

        $.ajax({
            url : "<?= base_url('admin/update_user') ?>",
            method : "POST",
            data : {username: username,password: password, hp: hp, email: email},
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