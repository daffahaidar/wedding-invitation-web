
        <section class="sw-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <h2>Undangan Website</h2>
                        <nav class="breadcrumbs text-center">
                            <ul>
                                <li>
                                    <a href="<?php echo base_url() ?>">Beranda</a>
                                </li>
                                <li class="active">Undangan Website</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- PRODUCT -->
        <section class="sw-container">
            <div id="particle-container">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="isotop-nav text-center">
                                <ul>
                                    <li class="btn sw-button <?php if($link =='all'){ echo 'active'; } ?>"><a href="<?= site_url('tema') ?>" >All</a></li>
                                    <?php foreach($categories as $category) : ?>
                    				<li class="btn sw-button <?php if($link == $category['slug']) echo 'active'; ?>"><a href="<?= site_url('tema?category='.$category['slug']) ?>" ><?= $category['name'] ?></a></li>
                    				<?php endforeach; ?>
                				
                			    </ul>
                            </div>
                        </div>
                    <div class="postList">
                        <?php
                                foreach ($tema as $row) { ?>
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            
                            <article class="sw-theme">
                                <figure>
                                    <ul class="attribute-list"><li><span class="label-coral"><?= $row->categoryName ?></span></li></ul>
                                    <img src="<?php echo base_url() ?>/assets/themes/<?= $row->nama_theme ?>/preview.png" alt="<?= htmlentities($row->nama_theme) ?>" class="img-responsive"/>
                                </figure>
                                <div class="desc">
                                    <h3><?= htmlentities($row->nama_theme) ?></h3>
                                    <!--<span class="price">-->
                                    <!--    <ins>-->
                                    <!--        <span class="amount">Rp1.500</span>-->
                                    <!--    </ins>-->
                                    <!--</span>-->
                                    <div class="readmore text-center">
                                        <a href="<?= base_url('demo/' . $row->nama_theme) ?>" target="_blank" class="btn sw-button btn-preview">Demo
                                          </a>
                                          <a href="<?= base_url('order/' . $row->kode_theme) ?>" class="btn sw-button btn-shop">Buat Undangan
                                          </a>
                                    </div>
                                </div>
                            </article>
                         </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="text-center">
               <?= $pager->links('tema', 'bootstrap_pagination') ?>
               </div>
            </div>
        </section>
         <div class="navbar-footer text-center">
    <ul>
      <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i><p>Home</p></a></li>
      <li><a href="<?php echo base_url() ?>/tema"><i class="fa fa-globe"></i><p>Tema Online</p></a></li>
      <li><a href="<?php echo base_url() ?>/tema_video"><i class="fa fa-youtube-play "></i><p>Tema Video</p></a></li>
    </ul>
  </div>
