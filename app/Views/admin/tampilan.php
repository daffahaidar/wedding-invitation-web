<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">Tambah Tema</button>
        
        </div>
    </div>
 
    <div class="row mb-3">
        
        <div class="container">
        <div class="row">
            
          <?php foreach ($tema as $row){ ?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
              <div class="card h-100 p-0 <?php 
                if($row->status == 0)
                    echo "style=opacity:65%";
                ?> ">
                <figure>
                <ul class="attribute-list"><li><span class="label-coral"><?= $row->name ?></span></li></ul>
                <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png">
                </figure>
                <div class="content p-2 d-flex justify-content-center">
                  <h3><strong><?= $row->nama_theme ?></strong></h3>
                </div>
                <div class="d-flex justify-content-center">
                    <?php if($row->status == '0'){?>
                  <p class="mt-2 mr-2">
                            <button class="btn btn-success btn-sm pilih" 
                            data-id="<?= $row->id?>" 
                            data-toggle="modal" data-target="#modalAktif">Aktifkan</button></p>
                    <?php } else { ?>
                    <p class="mt-2 mr-2">
                            <button class="btn btn-danger btn-sm pilih2" 
                            data-id="<?= $row->id?>" 
                            data-toggle="modal" data-target="#modalNonaktif">Nonaktifkan</button></p>
                            <?php } ?>
                  <p class="mt-2 mr-2"><a href="<?= SITE_UTAMA.'/demo/'.$row->nama_theme ?>" target="_blank" class="btn btn-primary btn-sm">Demo</a></p>
                <p class="mt-2 mr-2">
                            <button class="btn btn-danger btn-sm hapus" 
                            data-id="<?= $row->id?>" 
                            data-toggle="modal" data-target="#modalHapus">Hapus</button></p>
                    </div>
              </div>
            </div>
          <?php } ?>
          </div>
        <!-- </div>
          </div> -->
        </div>
       
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<!-- Modal -->
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/upload_theme'); ?>">
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Themes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Tema</label><br>
                    <input type="text"  class="form-control" name="namatema" required size="20" />
                    <input type="hidden"  class="form-control" name="kodetema" value="A<?= sprintf("%03s", $kode); ?>" />
                </div>
                <div class="form-group">
                    <label>Kategori</label><br>
                    <select class="form-control" id="categories" name="categories" required>
                            <option value=''>--Pilih Kategori--</option>                    
                            <?php
                            foreach ($categories as $row):
                                echo "<option value='$row->id'>$row->name</option>";
						endforeach;
							?>
                    </select>
                </div>
                <div class="form-group">
                    <label>File View Undangan (.php)</label><br>
                    <input type="file"  class="form-control" name="viewfile" required size="20" />
                </div>
                 
                <div class="form-group">
                    <label>File Assets (.zip)</label><br>
                    <input type="file"  class="form-control" name="assetfile" required size="20" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
<div class="modal fade" id="modalAktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengaktifkan tema ?
        <input type="hidden" name="idTema" id="idTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihAktif">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalNonaktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menonaktifkan tema ?
        <input type="hidden" name="idTema" id="idTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihNonaktif">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin menghapus tema ?
        <input type="hidden" name="idTema" id="idTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihHapus">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<script>
    
    $('.pilih').on('click', function (event) {
        var idtema = $(this).data('id');
        $(".modal-body #idTema").val( idtema );
    });

    $('#pilihAktif').on('click', function(event) {

        var idtema = $('#idTema').val();

        $.ajax({
            url : "<?= base_url('admin/aktif_tema') ?>",
            method : "POST",
            data : {id: idtema},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });

    });
    
     $('.pilih2').on('click', function (event) {
        var idtema = $(this).data('id');
        $(".modal-body #idTema").val( idtema );
    });

    $('#pilihNonaktif').on('click', function(event) {

        var idtema = $('#idTema').val();

        $.ajax({
            url : "<?= base_url('admin/nonaktif_tema') ?>",
            method : "POST",
            data : {id: idtema},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });

    });
    $('.hapus').on('click', function (event) {
        var idtema = $(this).data('id');
        $(".modal-body #idTema").val( idtema );
    });

    $('#pilihHapus').on('click', function(event) {

        var idtema = $('#idTema').val();

        $.ajax({
            url : "<?= base_url('admin/delete_theme') ?>",
            method : "POST",
            data : {id: idtema},
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
