

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalTambah">Tambah Kategori</button>
        
        </div>
    </div>
    <div class="row mb-3">


        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Kategori Undangan Video</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama Kategori</th>
                        <th>slug</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                    foreach($categories as $row){ 
                    ?>
                      <tr>
                        <td><?= $row->name ?></td>
                        <td><?= $row->slug ?></td>
                        <td>
                            <button class="btn btn-warning btn-sm btn-update" 
                            data-id = "<?= $row->id ?>" data-nama="<?= $row->name; ?>" data-slug="<?= $row->slug; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm hapus" 
                            data-id="<?= $row->id?>" 
                            data-toggle="modal" data-target="#modalHapus">Hapus</button></p>
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
              </div>
        </div>
        <!-- Message From Customer-->
       
    </div>
    <!--Row-->
</div>
<!---Container Fluid-->

<!-- Modal -->
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/add_categoryVideo'); ?>">
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label><br>
                    <input type="text"  class="form-control" name="nama" required size="20" />
                </div>
                
                <div class="form-group">
                    <label>Slug Kategori</label><br>
                    <input type="text"  class="form-control" name="slug" required size="20" />
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
<form method="post" enctype="multipart/form-data" action="<?php echo base_url('admin/update_categoryVideo'); ?>">
        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Nama Kategori</label><br>
                    <input type="hidden"  class="form-control idKategori" name="idKategori" required size="20" />
                    <input type="text"  class="form-control namaKategori" name="namaKategori" required size="20" />
                </div>
                <div class="form-group">
                    <label>Slug</label><br>
                    <input type="text"  class="form-control slugKategori" name="slugKategori" required size="20" />
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
        Apakah kamu yakin ingin menghapus Kategori ?
        <input type="hidden" name="idkategori" id="idkategori" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihHapus">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
  

    $('.hapus').on('click', function (event) {
        var idkategori = $(this).data('id');
        $(".modal-body #idkategori").val(idkategori);
    });

   $('#pilihHapus').on('click', function(event) {

        var id = $('#idkategori').val();
        $.ajax({
            url : "<?= base_url('admin/delete_categoryVideo') ?>",
            method : "POST",
            data : {id: id},
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

     $('.btn-update').on('click',function(){
            // get data from button edit
            const idKategori = $(this).data('id');
            const namaKategori = $(this).data('nama');
            const slugKategori = $(this).data('slug');
            // Set data to Form Edit
            $('.idKategori').val(idKategori);
            $('.namaKategori').val(namaKategori);
            $('.slugKategori').val(slugKategori);
            $('#modalUpdate').modal('show');
        });
    });

</script>