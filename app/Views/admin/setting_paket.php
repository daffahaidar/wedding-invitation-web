<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 
    <div class="row mb-3">

         <div class="col-xl-4 col-lg-4 mb-4">
         <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Paket 1</h6>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_paket'); ?>">
                <div class="card-body">
                    <div class="form-group">
                    <label>Nama Paket Undangan</label>
                    <input type="hidden" id="id_paket" name="id_paket" value="<?= $setting[0]->id_paket ?>">
                    <input id="nama_paket" name="nama_paket" type="text" class="form-control" placeholder="Masukan Nama Paket Undangan" value="<?= $setting[0]->nama_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Harga Paket Undangan</label>
                    <input id="harga_paket" name="harga_paket" type="text" class="form-control" placeholder="Masukan Harga Paket Undangan" value="<?= $setting[0]->harga_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Masa Aktif Undangan (hari)</label>
                    <input id="masa_aktif" name="masa_aktif" type="text" class="form-control" placeholder="Masa Aktif UNdangan" value="<?= $setting[0]->masa_aktif ?>" required>
                    </div>
                    <div class="form-group">
                      
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTamu" name="setTamu" 
                        <?php if($setting[0]->buku_tamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTamu" >Halaman Bukutamu</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setKirim" name="setKirim"
                        <?php if($setting[0]->kirim_whatsapp == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setKirim" >Kirim Whatsapp</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTema" name="setTema"
                        <?php if($setting[0]->tema_bebas == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTema">Bebas Pilih Tema</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setHadiah" name="setHadiah"
                        <?php if($setting[0]->kirim_hadiah == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setHadiah" >Kirim Hadiah</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setImport" name="setImport"
                        <?php if($setting[0]->import_datatamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setImport" >Import Data Tamu (Excel)</label>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        
        <div class="col-xl-4 col-lg-4 mb-4">
         <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Paket 2</h6>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_paket'); ?>">
                <div class="card-body">
                    <div class="form-group">
                    <label>Nama Paket Undangan</label>
                    <input type="hidden" id="id_paket" name="id_paket" value="<?= $setting[1]->id_paket ?>">
                    <input id="nama_paket" name="nama_paket" type="text" class="form-control" placeholder="Masukan Nama Paket Undangan" value="<?= $setting[1]->nama_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Harga Paket Undangan</label>
                    <input id="harga_paket" name="harga_paket" type="text" class="form-control" placeholder="Masukan Harga Paket Undangan" value="<?= $setting[1]->harga_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Masa Aktif Undangan (hari)</label>
                    <input id="masa_aktif" name="masa_aktif" type="text" class="form-control" placeholder="Masa Aktif UNdangan" value="<?= $setting[1]->masa_aktif ?>" required>
                    </div>
                    <div class="form-group">
                      
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTamu1" name="setTamu" 
                        <?php if($setting[1]->buku_tamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTamu1" >Halaman Bukutamu</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setKirim1" name="setKirim"
                        <?php if($setting[1]->kirim_whatsapp == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setKirim1" >Kirim Whatsapp</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTema1" name="setTema"
                        <?php if($setting[1]->tema_bebas == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTema1">Bebas Pilih Tema</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setHadiah1" name="setHadiah"
                        <?php if($setting[1]->kirim_hadiah == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setHadiah1" >Kirim Hadiah</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setImport1" name="setImport"
                        <?php if($setting[1]->import_datatamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setImport1" >Import Data Tamu (Excel)</label>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 mb-4">
         <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Paket 3</h6>
                </div>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_paket'); ?>">
                <div class="card-body">
                    <div class="form-group">
                    <label>Nama Paket Undangan</label>
                    <input type="hidden" id="id_paket" name="id_paket" value="<?= $setting[2]->id_paket ?>">
                    <input id="nama_paket" name="nama_paket" type="text" class="form-control" placeholder="Masukan Nama Paket Undangan" value="<?= $setting[2]->nama_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Harga Paket Undangan</label>
                    <input id="harga_paket" name="harga_paket" type="text" class="form-control" placeholder="Masukan Harga Paket Undangan" value="<?= $setting[2]->harga_paket ?>" required>
                    </div>
                    <div class="form-group">
                    <label>Masa Aktif Undangan (hari)</label>
                    <input id="masa_aktif" name="masa_aktif" type="text" class="form-control" placeholder="Masa Aktif UNdangan" value="<?= $setting[2]->masa_aktif ?>" required>
                    </div>
                    <div class="form-group">
                      
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTamu2" name="setTamu" 
                        <?php if($setting[2]->buku_tamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTamu2" >Halaman Bukutamu</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setKirim2" name="setKirim"
                        <?php if($setting[2]->kirim_whatsapp == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setKirim2" >Kirim Whatsapp</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setTema2" name="setTema"
                        <?php if($setting[2]->tema_bebas == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setTema2">Bebas Pilih Tema</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setHadiah2" name="setHadiah"
                        <?php if($setting[2]->kirim_hadiah == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setHadiah2" >Kirim Hadiah</label>
                      </div>
                      <div class="custom-control custom-switch mt-2">
                        <input type="checkbox" class="custom-control-input" id="setImport2" name="setImport"
                        <?php if($setting[2]->import_datatamu == '1') echo 'checked'; ?>>
                        <label class="custom-control-label" for="setImport2" >Import Data Tamu (Excel)</label>
                      </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    <!--Row-->
</div>
