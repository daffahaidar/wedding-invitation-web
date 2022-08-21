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
        <!-- <div class="card h-100">
        <div class="card-body"> -->
        <div class="row">
            
          <?php foreach ($tema as $row){ ?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
              <div class="card h-100 p-0">
                <figure>
                <ul class="attribute-list"><li><span class="label-coral"><?= $row->name ?></span></li></ul>
                <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes_video/<?= $row->preview ?>">
                </figure>
                <div class="content p-2 d-flex justify-content-center">
                  <h3><strong><?= $row->nama_tema ?></strong></h3>
                  
                </div>
                <div class="content d-flex justify-content-center">
                  <p>Kategori : <?= $row->name ?></p>
                  
                </div>
                
                <div class="d-flex justify-content-center">
                
                <p class="mt-2 mr-2">
                            <button class="btn btn-primary btn-sm btn-demo" data-link="<?= htmlentities($row->url_video); ?>" data-nama="<?= $row->nama_tema; ?>">Demo</button></p>
                
                <p class="mt-2 mr-2">
                            <button class="btn btn-warning btn-sm btn-update" 
                            data-id = "<?= $row->id_theme ?>" data-harga="<?= $row->harga; ?>" data-link="<?= htmlentities($row->url_video); ?>" data-nama="<?= $row->nama_tema; ?>" data-kategori="<?= $row->category_id; ?>">Edit</button></p>
                <p class="mt-2 mr-2">
                            <button class="btn btn-danger btn-sm hapus" 
                            data-id="<?= $row->id_theme?>" data-nama="<?= $row->preview ?>" 
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
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/upload_theme_video'); ?>">
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
                </div>
                <div class="form-group">
                    <label>Kategori</label><br>
                    <select class="form-control" id="categories" name="categories" required>
                            <option value='0'>--Pilih Kategori--</option>                    
                            <?php
                            foreach ($categories as $row):
                                echo "<option value='$row->id'>$row->name</option>";
						endforeach;
							?>
                    </select>
                </div>                
                <div class="form-group">
                    <label>Harga</label><br>
                    <input type="number"  class="form-control" name="hargatema" required size="20" />
                </div>
                <div class="form-group">
                    <label>Url Video</label><br>
                    <textarea class="form-control" name="urltema"></textarea>
                </div>
                <div class="form-group">
                    <label>Preview Undangan Video</label><br>
                    <input type="file"  class="form-control" name="viewfile" required size="20" />
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
<form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_theme_video'); ?>">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Themes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Tema</label><br>
                    <input type="hidden"  class="form-control idTema" name="idTema" required size="20" />
                    <input type="text"  class="form-control namaTema" name="namaTema" required size="20" />
                </div>
                <div class="form-group">
                    <label>Kategori</label><br>
                    <select class="form-control kategoriTema" id="kategoriTema" name="kategoriTema" required>
                            <option value='0'>--Pilih Kategori--</option>                    
                            <?php
                            foreach ($categories as $row):
                                echo "<option value='$row->id'>$row->name</option>";
						endforeach;
							?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Harga</label><br>
                    <input type="number"  class="form-control hargaTema" name="hargaTema" required size="20" />
                </div>
                <div class="form-group">
                    <label>Url Video</label><br>
                    <textarea class="form-control urlTema" name="urlTema"></textarea>
                </div>
                <div class="form-group">
                    <label>Preview Undangan Video</label><br>
                    <input type="file"  class="form-control" name="viewFile" size="20" />
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
        <input type="hidden" name="namaTema" id="namaTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihHapus">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sw-demo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Preview Video <span class="nama_tema" id="nama_tema"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="demo text-center">
					<span class="demo-video" id="demo-video"></span>
				</div>
      </div>
      
    </div>
  </div>
</div>

<script>
    
    $('.hapus').on('click', function (event) {
        var idtema = $(this).data('id');
        var namatema = $(this).data('nama');
        $(".modal-body #idTema").val( idtema );
        $(".modal-body #namaTema").val( namatema );
    });

    $('#pilihHapus').on('click', function(event) {

        var idtema = $('#idTema').val();
        var namatema = $('#namaTema').val();

        $.ajax({
            url : "<?= base_url('admin/delete_theme_video') ?>",
            method : "POST",
            data : {id: idtema, nama: namatema},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });

    });
    $(document).ready(function(){
    $('.btn-demo').on('click',function(){
            // get data from button edit
            const link_video = $(this).data('link');
            const nama_tema = $(this).data('nama');
            // Set data to Form Edit
            $('.demo-video').html(link_video);
            $('.nama_tema').html(nama_tema)
            // Call Modal Edit
            $('#sw-demo').modal('show');
        });
        $('#sw-demo').on('hide.bs.modal', function(){
        $('.demo-video').html('');
    });
     $('.btn-update').on('click',function(){
            // get data from button edit
            const idTema = $(this).data('id');
            const linkVideo = $(this).data('link');
            const namaTema = $(this).data('nama');
            const kategoriTema = $(this).data('kategori');
            const hargaTema = $(this).data('harga');
            // Set data to Form Edit
            $('.idTema').val(idTema);
            $('.namaTema').val(namaTema);
            $('.kategoriTema').val(kategoriTema);
            $('.urlTema').val(linkVideo);
            $('.hargaTema').val(hargaTema)
            // Call Modal Edit
            $('#modalUpdate').modal('show');
        });
    });
</script>
