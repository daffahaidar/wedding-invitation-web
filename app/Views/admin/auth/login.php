<!-- Login Content -->
<div class="container-login d-flex align-items-center justify-content-center">
    <div class="row d-flex flex-column align-items-center">
            
            <div class="d-flex justify-content-center">
                <a href="<?= SITE_UTAMA ?>"><img src="<?= base_url() ?>/assets/base/img/logo.png" height="50px"></a>
            </div>

            <div class="card shadow-sm mt-4" style='width:100%;max-width:400px'>
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-form">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?php 
                                $session = session();
                                $errors = $session->getFlashdata('errors');
                                if($errors != null): ?>
                                    <div class="alert alert-danger" role="alert" id="ikierror">
                                        <span class="mb-0">
                                            <strong>Error!<strong> 
                                            <?php
                                                foreach($errors as $err){
                                                    echo $err;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                <?php endif ?>
                                <form method="post" action="<?php echo base_url('do_auth'); ?>" class="user">
                                    <div class="form-group">
                                        <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                                            <input type="checkbox" class="custom-control-input" onclick="myFunction()" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Show Password</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                </form>
                                <hr>
                                <div class="text-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Login Content -->