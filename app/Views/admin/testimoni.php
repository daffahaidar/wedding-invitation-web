<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">


        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Testimonial</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama Lengkap</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Ulasan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    foreach($testimoni as $row){ 
                
                    ?>
                      <tr>
                        <td><?= $row->nama_lengkap?></td>
                        <td><?= $row->kota ?></td>
                        <td><?= $row->provinsi?></td>
                        <td><?= $row->ulasan ?></td>
                        
                        <?php if($row->status == '1'){ ?>    
                        <td><span class="badge badge-warning">Tidak Tampil</span></td>
                        <?php }else if($row->status== '2'){ ?>    
                        <td><span class="badge badge-success">Tampil</span></td>
                       
                       
                        <?php } ?>

                        <td><div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Aksi
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <a href="#" class="dropdown-item aktifBtn" 
                                data-id="<?= $row->id_testi ?>"
                                data-toggle="modal" 
                                data-target="#modalAktif">Aktifkan</a>
                                <a href="#" class="dropdown-item nonaktifBtn" 
                                data-id="<?= $row->id_testi ?>"
                                data-toggle="modal" 
                                data-target="#modalNonaktif">Nonaktifkan</a>
                                <a href="#" class="dropdown-item hapus" 
                                data-id="<?= $row->id_testi ?>"
                               
                                data-toggle="modal" 
                                data-target="#modalHapus">Hapus</a>
                                </div>
                            </div></td>
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
        Apakah kamu yakin ingin mengaktifkan testimonial ini ?
        <input type="hidden" value="" id="idtesti">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="aktiftesti">Ya</button>
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
        Apakah kamu yakin ingin menonaktifkan testimonial ini ?
        <input type="hidden" value="" id="idtesti">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="nonaktiftesti">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
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
        Apakah kamu yakin ingin menghapus Testimonial ini ?<br>
        <strong>DATA TESTIMONIAL AKAN TERHAPUS!!</strong>
        <input type="hidden" id="idtesti" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
  
    $('.aktifBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #idtesti").val( id );
    });

    $('#aktiftesti').on('click', function(event) {

        var id = $('#idtesti').val();

        $.ajax({
            url : "<?= base_url('admin/aktiftesti') ?>",
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
    $('.nonaktifBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #idtesti").val( id );
    });

    $('#nonaktiftesti').on('click', function(event) {

        var id = $('#idtesti').val();

        $.ajax({
            url : "<?= base_url('admin/nonaktiftesti') ?>",
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
    $('.hapus').on('click', function (event) {
        var id= $(this).data('id');
        $(".modal-body #idtesti").val( id );
    });

    $('#hapusBtn').on('click', function(event) {

        var id = $('#idtesti').val();
    
        $.ajax({
            url : "<?= base_url('admin/hapustesti') ?>",
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

</script>