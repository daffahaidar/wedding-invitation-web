<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    </div>

    <div class="row mb-3">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Keuntungan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= rupiah($totalKeuntungan) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-primary"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Total Pengguna</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($join) ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPending; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Invoice Example -->
            <div class="col-xl-12 col-lg-12 mb-4">
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Invoice</h6>
                  <a class="m-0 float-right btn btn-danger btn-sm" href="<?= base_url('admin/pembayaran') ?>">Lihat Lebih <i
                      class="fas fa-chevron-right"></i></a>
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>No Invoice</th>
                        <th>Pengguna</th>
                        <th>Domain</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php 
                    foreach($setting as $set){
                        $trial = $set->trial;
                    }
                    foreach($setting_bayar as $bayar){
                        $metode_bayar = $bayar->metode_bayar;
                    }
                    $limit = 0;
                    foreach($join as $row){ 
                        $limit++;
                        if($limit > 4){ //limit 4 
                            break;
                        }
                
                    ?>

                      <tr>
                        <td>#<?= $row->invoice ?></td>
                        <td><?= $row->username ?></td>
                        <td><a target="_blank" href="<?= SITE_UNDANGAN.'/'.$row->domain ?>"><?= $row->domain ?></a></td>
                         <?php 
                         $masa_aktif = $row->masa_aktif;
                         $durasi = '+'.$trial.' days';
                          $tglDaftar = $row->tgl_daftar;
                          $tglExp = strtotime($durasi, strtotime($tglDaftar));
                          $tglExpFormated = date("d-m-Y H:i A",$tglExp);
                          $today = strtotime('now');
                          $tglBayar = $row->tgl_bayar;
                          $aktif = '+'.$masa_aktif.' days';
                          $tglNonaktif= strtotime($aktif, strtotime($tglBayar));
                          $tglNonaktifFormated = date("d-m-Y H:i A",$tglNonaktif);
                        ?>

                        <?php if($row->statusPembayaran == '1'){ ?>    
                        <td><span class="badge badge-warning">Menunggu Konfirmasi</span></td>
                        <?php }else if($row->statusPembayaran == 2 && $today >= $tglNonaktif){ ?>    
                        <td><span class="badge badge-danger">Expired</span></span></td>
                        <?php }else if($row->statusPembayaran == 0 ){ ?>    
                        <td><span class="badge badge-secondary">Belum Lunas</span></td>
                        <?php }else{ ?>
                        <td><span class="badge badge-primary">Lunas</span></td>
                        <?php } ?>
                        <?php if($metode_bayar=='manual'){ ?>
                            <td><div class="btn-group mb-1">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Aksi
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                <a href="#" class="dropdown-item" 
                                data-nama="<?= $row->nama_lengkap ?>"
                                data-bank="<?= $row->nama_bank ?>"
                                data-invoice="<?= $row->invoice ?>"
                                data-toggle="modal" 
                                data-target="#modalData">Lihat</a>
                                <a href="#" class="dropdown-item konfirmasiBtn" 
                                data-id="<?= $row->id_user ?>"
                                data-toggle="modal" 
                                data-target="#modalKonfirmasi">Konfirmasi & Aktifkan</a>
                            </div></td>
                        <?php }else{ ?>
                        <td><a href="#" class="btn btn-primary btn-sm konfirmasiBtn" data-id="<?= $row->id_user ?>" data-toggle="modal" data-target="#modalKonfirmasi">Konfirmasi</a>
                        </td>
                        <?php } ?>
                      </tr>
                    <?php } ?>  
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
    </div>
    <!--Row-->

<!---Container Fluid-->
<!-- Modal -->
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah kamu yakin ingin mengkonfirmasi pengguna ?
        <input type="hidden" value="" id="iduser">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-primary" id="konfirmasi">Ya</button>
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col mt-2">
            <label>Nama Lengkap</label>
            <input id="nama_lengkap" type="text" class="form-control" placeholder="Contoh : Dinda Rahma" value="" required>
        </div>
        <div class="col mt-2">
            <label>Nama Bank</label>
            <input id="nama_bank" type="text" class="form-control" placeholder="Contoh : BRI Syariah " value="" required>
        </div>        
        <div class="col mt-2 mb-2">
            <label>Bukti Transfer</label><br>
            <img id="bukti" src="" height="250px">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<script>

    //triggered when modal is about to be shown
$('#modalData').on('show.bs.modal', function(e) {
    var nama = $(e.relatedTarget).data('nama');
    var bank = $(e.relatedTarget).data('bank');
    var invoice = $(e.relatedTarget).data('invoice');
    $('#nama_lengkap').val(nama);
    $('#nama_bank').val(bank);
    $('#bukti').attr('src','<?= base_url() ?>/assets/bukti/'+invoice+'.png');
});

    $('.konfirmasiBtn').on('click', function (event) {
        var id = $(this).data('id');
        $(".modal-body #iduser").val( id );
    });

    $('#konfirmasi').on('click', function(event) {

        var id = $('#iduser').val();

        $.ajax({
            url : "<?= base_url('admin/konfirmasi') ?>",
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