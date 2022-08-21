<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div>
        <a href="<?= SITE_UNDANGAN ?>/<?= $order[0]->domain ?>" class="btn btn-primary btn-sm">Lihat Website</a>
        </div>
    </div> 

    <div class="row mb-3">

        <div class="col-xl-6 col-lg-6 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Testimonial</h6>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input id="nama" type="text" class="form-control" placeholder="Contoh : reydinda" value="<?= $testimoni[0]->nama_lengkap ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Kota</label>
                        <input id="kota" type="text" class="form-control" placeholder="Contoh : Demak" value="<?= $testimoni[0]->kota ?>" required>
                    </div>
                    <div class="form-group">
                        
                        <input id="status" type="hidden" class="form-control" value="<?php if ($testimoni[0]->status == 0) { echo '1'; } else { echo $testimoni[0]->status ; } ?>" >
                    </div>

                    <div class="form-group">
                        <label>Provinsi</label>
                        <input id="provinsi" type="text" class="form-control" placeholder="Contoh : Jawa Tengah" value="<?= $testimoni[0]->provinsi ?>" required>
                        
                    </div>

                    <div class="form-group">
                        <label>Ulasan</label>
                        <textarea id="ulasan" class="form-control" ><?= $testimoni[0]->ulasan ?></textarea>
                    </div>

                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalUser">Simpan</button>
                </div>
            </div>
        </div>

     
    </div>
    <!--Row-->
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
        <button type="button" class="btn btn-sm btn-primary" id="simpanTesti">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
$('#simpanTesti').on('click', function(event) {

var nama = $('#nama').val();
var kota = $('#kota').val();
var provinsi = $('#provinsi').val();
var ulasan = $('#ulasan').val();
var status = $('#status').val();
$.ajax({
    url : "<?= base_url('user/update_testi') ?>",
    method : "POST",
    data : {nama: nama,kota: kota, provinsi: provinsi, ulasan: ulasan, status:status},
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
<script>
$(function(){
    <?php if(session()->has("success")) { ?>
        Swal.fire({
            icon: 'success',
            title: 'Great!',
            text: '<?= session("success") ?>'
        })
    <?php } ?>
    
     <?php if(session()->has("error")) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= session("error") ?>'
        })
    <?php } ?>
});
</script>