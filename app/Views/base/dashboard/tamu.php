 <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
        <div class="btn-group">
            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Tambah Tamu
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                <button class="dropdown-item" data-toggle="modal" data-target="#modalTambah">Input Data Tamu</button>
                <?php if ($paket[0]->import_datatamu == 1){ ?>
                <button class="dropdown-item" data-toggle="modal" data-target="#modalExcel">Import Tamu (Excel)</button><?php } ?>
            </div>
    </div>
</div>

    <div class="row mb-3">

        <div class="col-xl-12 col-lg-12 mb-4">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                  <h6 class="m-0 font-weight-bold text-light">Data Tamu Undangan</h6>
                </div>
                <?= form_open('user/hapusbanyaktamu', ['class' => 'formhapusbanyak']) ?>
                <p style="padding-top:10px; padding-left:10px">
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-fw fa-trash"></i>Hapus Banyak
                    </button>
                </p>
                <div class="table-responsive p-3">
                  <table class="table table-responsive align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th><input type="checkbox" id="centangSemua"></th>
                        <th>Nama Tamu</th>
                        <th>No Whatsapp</th>
                        <th>Domain Undangan</th>
                        <th>Tgl Kirim Undangan</th>
                        <th>Status Undangan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    foreach($tamu as $row){ 
                    ?>
                      <tr>
                        <td><input type="checkbox" class="centangTamu" name="idTamu[]" value="<?= $row->id_tamu ?>"></td> 
                        <td><?= $row->nama_tamu ?></td>
                        <td><?= $row->no_wa ?></td>
                        <td><a href="<?= SITE_UNDANGAN ?>/<?= $row->domain ?>/<?= $row->id_tamu ?>" target="_blank"><?= DOMAIN_UNDANGAN ?>/<?= $row->domain ?>/<?= $row->id_tamu ?></a></td>
                        <td><?= $row->tgl_kirim ?></td>
                        <td><?= $row->status_kirim ?></td>
                        <td>
                            <?php if ($paket[0]->kirim_whatsapp == 1){ ?>
                            <button 
                            data-id="<?= $row->id_tamu?>" 
                            class="btn btn-sm btn-success kirim" data-toggle="modal" data-target="#modalKirim">Kirim</button><?php } ?>
                            <button 
                            data-id="<?= $row->id_tamu?>" 
                            data-nama="<?= $row->nama_tamu?>" 
                            data-alamat="<?= $row->alamat_tamu?>" 
                            data-no="<?= $row->no_wa?>" 
                            data-tgl="<?= $row->tgl_kirim?>" 
                            class="btn btn-sm btn-primary edit" data-toggle="modal" data-target="#modalEdit">Edit</button>
                            <button 
                            data-id="<?= $row->id_tamu?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
                        </td>
                      </tr>

                    <?php } ?>
                      
                    </tbody>
                  </table>
                 
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <!--Row-->
</div>

        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Tamu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col mt-2">
                        <label>Nama Tamu Undangan</label>
                        <input id="id_user" type="hidden" class="form-control" value="<?=$_SESSION['id'] ?>">
                        <input id="nama_tamu" type="text" class="form-control" placeholder="Contoh : Agus Sukamto" style='text-transform:capitalize' required>
                    </div>
                    <div class="col mt-2">
                        <label>Alamat Tamu Undangan</label>
                        <input id="alamat_tamu" type="text" class="form-control" placeholder="Contoh : Medan Merdeka" style='text-transform:capitalize' required>
                    </div>

                    <div class="col mt-2">
                        <label>No Whatsapp</label>
                        <input id="no_wa" type="text" placeholder="Contoh : 628xxxxx" class="form-control" required>
                    </div>

                    <div class="col mt-2">
                        <label>Tanggal </label>
                        <input name="datepicker" type="text" class="form-control" placeholder="Tanggal" id="datepicker" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" required>
                        <input type="hidden" id="tgl_kirim">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" id="simpanTamu">Simpan</button>
            </div>
            </div>
        </div>
        </div>
        
        <div class="modal fade" id="modalExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Tamu (Excel)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?php echo base_url('user/prosesExcel'); ?>" enctype="multipart/form-data">
            <div class="modal-body">
                
			<div class="form-group">
				<label>File Excel</label>
				<input type="file" name="fileexcel" class="form-control" id="file" required accept=".xls, .xlsx" /></p>
			</div>
		    <label class="form-check-label ">
                <a href="<?php echo base_url('import_tamu'); ?>" target="_blank" style="margin-top: 105px;color: #2c3e50;position: relative;top:3px;color:#17a2b8;"><i class="lni-question-circle" style="color:#17a2b8;"></i>&nbsp Susunan Data Untuk File Data Tamu (Excel)</a>
            </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        
<!-- Modal -->

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Tamu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col mt-2">
                        <label>Nama Tamu Undangan</label>
                        <input id="namaTamu" type="text" class="form-control" placeholder="Contoh : Agus Sukamto" style='text-transform:capitalize' required>
                    </div>
                    <div class="col mt-2">
                        <label>Alamat Tamu Undangan</label>
                        <input id="alamatTamu" type="text" placeholder="Contoh : Tlogosari, Semarang" class="form-control" style='text-transform:capitalize' required>
                    </div>

                    <div class="col mt-2">
                        <label>No Whatsapp</label>
                        <input id="noWa" type="text" placeholder="Contoh : 628xxxxx" class="form-control" required>
                    </div>

                    <div class="col mt-2">
                        <label>Tanggal </label>
                        <input name="datepicker2" type="text" class="form-control" placeholder="Tanggal" id="datepicker2" readonly="readonly" style="cursor:pointer; background-color: #FFFFFF" required>
                        <input type="hidden" id="tglKirim">
                    </div>
        <input type="hidden" id="idTamunya" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="editBtn">Update</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
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
        Apakah kamu yakin ingin menghapus data tamu ini ?
        <input type="hidden" name="idTamu" id="idTamu" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modalKirim" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengirim Undangan ?
        <input type="hidden" name="idTamu" id="idTamu" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="kirimBtn">Kirim</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo base_url() ?>/assets/base/js/pikaday.js"></script>
<script>
$(document).ready(function () {
    
    moment.locale('id');
    
    
    // $('#datepicker').val(moment('<?= date('Y-m-d') ?>').format('dddd, Do MMMM YYYY'));
    var picker = new Pikaday({ 
      
      field: $('#datepicker')[0],
      format: 'dddd, Do MMMM YYYY',
      onSelect: function() {
        $('#tgl_kirim').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });
    var tanggalKirim=  $('#tglKirim').val();
        if(tanggalKirim != ''){
      $('#datepicker2').val(moment(tanggalKirim).format('dddd, Do MMMM YYYY'));
    }
   var picker2 = new Pikaday({ 
      
      field: $('#datepicker2')[0],
      format: 'dddd, Do MMMM YYYY',
      onSelect: function() {
        $('#tglKirim').val(this.getMoment().format('YYYY/MM/DD'));
      }
    });
    $('#simpanTamu').on('click', function(event) {

        var tgl_kirim = $('#tgl_kirim').val();
        var no_wa = $('#no_wa').val();
        var nama_tamu = $('#nama_tamu').val();
        var alamat_tamu = $('#alamat_tamu').val();
        var id_user = $('#id_user').val();

        $.ajax({
            url : "<?= base_url('user/save_tamu') ?>",
            method : "POST",
            data : {tgl_kirim: tgl_kirim,no_wa: no_wa, nama_tamu: nama_tamu, alamat_tamu: alamat_tamu, id_user: id_user},
            async : true,
            dataType : 'html',
            success: function(result){

                    $('#tgl_kirim').val("");
                    $('#no_wa').val("");
                    $('#nama_tamu').val("");
                    $('#alamat_tamu').val("");
                    location.reload();

                
            }
        });

    });

    $('.hapus').on('click', function (event) {
         $('#centangSemua').prop('checked', false);
        $('.centangTamu').prop('checked', false);
        var idTamu = $(this).data('id');
        $(".modal-body #idTamu").val( idTamu );
    });

    $('#hapusBtn').on('click', function(event) {

        var id_tamu = $('#idTamu').val();

        $.ajax({
            url : "<?= base_url('user/hapus_tamu') ?>",
            method : "POST",
            data : {id_tamu: id_tamu},
            async : true,
            dataType : 'html',
            success: function(result){
                 location.reload();
               
            }
        });
    });
    $('.kirim').on('click', function (event) {
         $('#centangSemua').prop('checked', false);
        $('.centangTamu').prop('checked', false);
        var idTamu = $(this).data('id');
        $(".modal-body #idTamu").val( idTamu );
    });

    $('#kirimBtn').on('click', function(event) {

        var id_tamu = $('#idTamu').val();

        $.ajax({
            url : "<?= base_url('user/kirim_undangan') ?>",
            method : "POST",
            data : {id_tamu: id_tamu},
            async : true,
            dataType : 'html',
            success: function(result){
                 location.reload();
            }
        });
    });
    
    
$('.edit').on('click', function (event) {
    $('#centangSemua').prop('checked', false);
    $('.centangTamu').prop('checked', false);
        var idTamu = $(this).data('id');
        var namaTamu = $(this).data('nama');
        var alamatTamu = $(this).data('alamat');
        var noWa = $(this).data('no');
       
        var tglKirim  = $(this).data('tgl');
        
        $("#modalEdit #idTamunya").val(idTamu);
        $("#modalEdit #namaTamu").val(namaTamu);
        $("#modalEdit #alamatTamu").val(alamatTamu);
        $("#modalEdit #noWa").val(noWa);
        $("#modalEdit #datepicker2").val(moment(tglKirim).format('dddd, Do MMMM YYYY'));

        $("#modalEdit #tglKirim").val(tglKirim);
         
    });
$('#editBtn').on('click', function(event) {

var id_tamu = $('#idTamunya').val();
var nama_tamu = $('#namaTamu').val();
var alamat_tamu = $('#alamatTamu').val();
var no_wa = $('#noWa').val();
var tgl_kirim = $('#tglKirim').val();

$.ajax({
    url : "<?= base_url('user/update_tamu') ?>",
    method : "POST",
    data : {id_tamu: id_tamu, nama_tamu:nama_tamu, alamat_tamu:alamat_tamu, no_wa: no_wa, tgl_kirim: tgl_kirim},
    async : true,
    dataType : 'html',
    success: function(result){
        location.reload();
               
    }

});


});
});

</script>
<script>
$(document).ready(function () {
$('#centangSemua').click(function(e){
          if($(this).is(':checked')){
              $('.centangTamu').prop('checked', true);
          }else{
              $('.centangTamu').prop('checked', false);
          }
          
      });
    $('.formhapusbanyak').on('submit',function(e){
        e.preventDefault();
        let jmldata = $('.centangTamu:checked');
        
        if(jmldata.length === 0){
            return false;
        }else {
            Swal.fire({
              title: 'Hapus Banyak Data',
              text: `Yakin data Tamu dihapus sebanyak ${jmldata.length} data ?`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus Data Tamu!'
            }).then((result) => {
                if(result.value) {
              $.ajax({
                  type: "post",
                  url: $(this).attr('action'),
                  data: $(this).serialize(),
                  dataType: "json",
                  success: function(response){
                      if(response.sukses){
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        });
                        location.reload();
                      }
                  },
                  error: function(xhr, ajaxOptions, thrownError){
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                  }
              });
                }
            });
        }
        return false;
    });
});
</script>