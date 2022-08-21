<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">
        <!-- New User Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengunjung Hari Ini</div> 
                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php if($total_pengunjung_today == '') echo '0'; else echo $total_pengunjung_today  ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengunjung</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pengunjung ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung 7 Hari Terakhir</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Invoice Example -->
        <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengunjung</h6>
                </div>
                <div class="table-responsive p-3">
                    <?= form_open('user/hapusbanyakriwayat', ['class' => 'formhapusbanyak']) ?>
                    <p style="padding-top:10px; padding-left:10px">
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-fw fa-trash"></i>Hapus Banyak
                        </button>
                    </p>
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th><input type="checkbox" id="centangSemua"></th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                    foreach($pengunjung as $row){ 
                    ?>
                      <tr>
                        <td><input type="checkbox" class="centangPengunjung" name="idRiwayat[]" value="<?= $row->id ?>"></td> 
                        <td><?= date( "d M Y", strtotime($row->created_at)) ?></td>
                        <td><?= $row->nama_pengunjung ?></td>
                        <td>
                            <button 
                            data-id="<?= $row->id?>" 
                            class="btn btn-sm btn-danger hapus" data-toggle="modal" data-target="#modalHapus">Hapus</button>
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
        Apakah kamu yakin ingin menghapus Riwayat Pengunjung ini ?
        <input type="hidden" name="idPengunjung" id="idPengunjung" value=""/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm text-danger" id="hapusBtn">Hapus</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script>

    var jumlah = [];
    var tanggal = [];
    moment.locale('id');
    var namaBulan  = moment().format('MMMM');
    
    <?php foreach($total_mingguan as $row){ ?>
        jumlah.push(<?= $row->jumlah ?>);
        tanggal.push(<?= $row->tanggal ?>+' '+namaBulan);
    <?php } ?>

</script>
<script>
$(document).ready(function () {
$('.hapus').on('click', function (event) {
         $('#centangSemua').prop('checked', false);
        $('.centangPengunjung').prop('checked', false);
        var idPengunjung = $(this).data('id');
        $(".modal-body #idPengunjung").val( idPengunjung );
    });

    $('#hapusBtn').on('click', function(event) {

        var id_pengunjung = $('#idPengunjung').val();

        $.ajax({
            url : "<?= base_url('user/hapus_riwayat') ?>",
            method : "POST",
            data : {id : id_pengunjung},
            async : true,
            dataType : 'html',
            success: function($hasil){
               if($hasil == 'sukses'){
                location.reload();
               }
            }
        });
    });
    $('#centangSemua').click(function(e){
          if($(this).is(':checked')){
              $('.centangPengunjung').prop('checked', true);
          }else{
              $('.centangPengunjung').prop('checked', false);
          }
          
      });
    $('.formhapusbanyak').on('submit',function(e){
        e.preventDefault();
        let jmldata = $('.centangPengunjung:checked');
        
        if(jmldata.length === 0){
            return false;
        }else {
            Swal.fire({
              title: 'Hapus Banyak Data',
              text: `Yakin data Pengunjung dihapus sebanyak ${jmldata.length} data ?`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus Data Pengunjung!'
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