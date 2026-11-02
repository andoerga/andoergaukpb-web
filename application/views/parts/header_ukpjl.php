	<div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container-fluid">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
			  <div class="col-lg-1 col-2 col-md-2">
				<img class="img img-fluid" src="images/logo-tutwuri.png" />
			  </div>
              <div class="col-lg-4 col-10 col-md-6">
                <h2 class="mb-0 site-logo"><a href="<?php echo site_url(); ?>"><b><?php echo $this->config->item('APP_NAME');?></b></a></h2>
			  </div>
              <div class="col-lg-7 col-12 col-md-4">
				<div class="row align-items-center top-menu">
					<div class="col-12 text-right <?php echo time(); ?> <?php echo $this->config->item('BATAS_PENDAFTARAN') ?>">
						<?php if($user){ ?>
							<span class="flaticon-user"></span> <?php echo $user->nama; ?>
							| <a href="<?php echo site_url('logout'); ?>"><span class="flaticon-logout "></span> Logout</a>
						<?php }else{ ?>
							<?php if($this->config->item('BUKA_PENDAFTARAN') < time() && time() < $this->config->item('BATAS_PENDAFTARAN')){ ?><span class="flaticon-add-user"></span> <a href="<?php echo site_url('register'); ?>">Daftar</a> | <?php } ?><span class="flaticon-enter"></span> <a href="<?php echo site_url('login'); ?>">Login</a>
						<?php } ?>
					</div>
				</div>
				<div class="row align-items-center">
					<div class="col-12 text-right">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="active">
                        <a href="<?php echo site_url(); ?>">Home</a>
                      </li>
					  <?php /*
                      <li class="has-children">
                        <a href="" data-date="<?php echo date('Y-m-d H:i'); ?>">Pengumuman</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="<?php echo site_url('alur_pendaftaran'); ?>">Alur Pendaftaran</a></li>
                          <li><a href="<?php echo site_url('syarat_pendaftaran'); ?>">Syarat Pendaftaran</a></li>
                        </ul>
                      </li>
					  */ ?>
					  <?php if($user){ ?>
					  <li class="has-children">
                        <a href="">Data Saya</a>
                        <ul class="dropdown arrow-top">
						  <?php if($this->config->item('BUKA_PENDAFTARAN') < time() && time() < $this->config->item('BATAS_PENDAFTARAN')){ ?>
                          <li><a href="<?php echo site_url('change_data'); ?>">Ubah Data</a></li>
						  <?php } ?>
                          <li><a href="<?php echo site_url('change_password'); ?>">Ubah Password</a></li>
                        </ul>
                      </li>
					  <?php }else{ ?>
					  <?php if($this->config->item('BUKA_PENDAFTARAN') < time() && time() < $this->config->item('BATAS_PENDAFTARAN')){ ?>
                      <li><a href="<?php echo site_url('register'); ?>">Pendaftaran</a></li>
					  
					  <?php } ?>
					  <?php } ?>
					  <?php /*
                      <li><a href="<?php echo site_url('kontak'); ?>">Kontak</a></li>
					  */ ?>
                    </ul>
                  </div>
                </nav>
					</div>
				</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>