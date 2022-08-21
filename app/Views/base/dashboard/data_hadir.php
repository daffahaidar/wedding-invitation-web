<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        
        <a href="<?= SITE_BUKUTAMU ?>/<?= $order[0]->domain ?>" target="_blank" class="btn btn-primary btn-sm">Lihat Website</a>
        
        </div>
    </div>
    <?php $kunci = $data[0]->kunci; ?>
    <div class="row">

    <div class="col-xl-12 col-lg-12 mb-4">
        <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Tamu Undangan</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table table-responsive align-items-center table-flush" id="hadirTamu">
                    <thead class="thead-light">
                      <tr>
                        <th>Nama Tamu</th>
                        <th>Alamat Tamu</th>
                        <th>Domain Undangan</th>
                        <th>Waktu Kehadiran</th>
                        <th>Foto Selfi</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    foreach($hadir as $row){ 
                        $qrcode = $row->qrcode;  
                    ?>
                      <tr>
                        <td><?= $row->nama_tamu ?></td>
                        <td><?= $row->alamat_tamu ?></td>
                        <td><a href="<?= SITE_UNDANGAN ?>/<?= $row->domain ?>/<?= $row->id_tamu ?>" target="_blank"><?= DOMAIN_UNDANGAN ?>/<?= $row->domain ?>/<?= $row->id_tamu ?></a></td>
                        <td><?= $row->waktu_hadir ?></td>
                        <td><img src="<?php echo base_url() ?>/assets/users/<?=$kunci?>/<?=$qrcode?>.png" height="120" width="160"></td>
                        <td>
                            <button 
                            data-id="<?= $row->id_tamu?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->
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
        Apakah kamu yakin ingin menghapus Tamu dari Daftar Hadir ?
        <input type="hidden" name="idTamu" id="idTamu" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihHapus">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
$('.hapus').on('click', function (event) {
        var idtamu = $(this).data('id');
        $(".modal-body #idTamu").val( idtamu );
    });

    $('#pilihHapus').on('click', function(event) {

        var idtamu = $('#idTamu').val();

        $.ajax({
            url : "<?= base_url('user/hapus_hadir') ?>",
            method : "POST",
            data : {id: idtamu},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });

    });
}); 
</script>
