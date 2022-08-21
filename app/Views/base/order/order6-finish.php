<div class="konten" style="display: flex;flex-grow: 1;overflow-x: hidden;flex-direction: row;margin-top: 60px;margin-bottom: 40px;">
  <script type="text/javascript">
    window.setTimeout(function() {
    window.location.href = '<?= base_url('order/save') ?>';
}, 3000);</script>
    <section class="fdb-block" style="padding-top: 20px;flex:1; ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8 col-xl-6">
            <div class="row">
              <div class="col text-center">
              </div>
            </div>
            
            <div class="progress" style="margin-top: 10px;">
              <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
            </div>

            <div id="konten-cerita">
              
              <!-- <form action="" method="post" enctype="multipart/form-data"> -->
                <div class="row align-items-center mt-4">
                   
                  <div class="upload-area-bg">
                    
                    <div class="upload-area do-add-btn">
                      <div style="text-align: center;">
                        <img id="loading" src="<?= base_url() ?>/assets/base/img/loading.svg"  style="height: 80px;width: 80px;" />
                        <h3 class="upload-area-caption mt-3">
                          <span>Memproses data..</span>
                        </h3>
                      </div>
                    </div>

                  </div>

                </div>
              <!-- </form> -->

          </div>

            <form method="post" action="<?= base_url('order/save'); ?>">
              <div class="row justify-content-start mt-3" >
                <div class="col">
                  <div class="row">
                  </div>   
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
</div>
