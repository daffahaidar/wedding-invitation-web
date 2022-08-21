<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div> 
    <div class="row mb-3">
        
        <div class="container">
        <!-- <div class="card h-100">
        <div class="card-body"> -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
              <div class="card h-100 p-0" style="opacity:65%;">
                <figure>
                <!--<ul class="attribute-list"><li><span class="label-coral"><?= $order[0]->nama_theme ?></span></li></ul>-->
                <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $order[0]->nama_theme ?>/preview.png">
                </figure>
                <div class="content p-2 d-flex justify-content-center">
                  <h3><strong><?= $order[0]->nama_theme ?></strong></h3>
                </div>

                <div class="d-flex justify-content-center">
                  <p class="mt-2 mr-2"><a href="#" class="btn btn-success btn-sm disabled" >Active</a></p>  
                </div>
              </div>
            </div>
          <?php foreach ($tema->getResult() as $row){ if($row->nama_theme == $order[0]->nama_theme) continue;?>
            <div class="col-lg-3 col-md-6 col-xs-12 mt-5">
              <div class="card h-100 p-0">
                 <figure>
                <ul class="attribute-list"><li><span class="label-coral"><?= $row->name ?></span></li></ul>
                <img alt="image" class="img-fluid rounded-0" src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png">
                </figure>
                <div class="content p-2 d-flex justify-content-center">
                  <h3><strong><?= $row->nama_theme ?></strong></h3>
                </div>

                <div class="d-flex justify-content-center">
                <?php if ($paket[0]->tema_bebas == 1 && $order[0]->status_bayar == 2){ ?>
                  <p class="mt-2 mr-2">
                            <button class="btn btn-success btn-sm pilih" 
                            data-id="<?= $row->id?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalTema">Pilih</button></p>  <?php } ?>
                  <p class="mt-2"><a target="_blank" href="<?= SITE_UTAMA.'/demo/'.$row->nama_theme ?>" class="btn btn-primary btn-sm">Demo</a></p>
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
<div class="modal fade" id="modalTema" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengubah tema ?
        <input type="hidden" name="idTema" id="idTema" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="pilihBtn">Ya</button>
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

    $('#pilihBtn').on('click', function(event) {

        var idtema = $('#idTema').val();

        $.ajax({
            url : "<?= base_url('user/ganti_tema') ?>",
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