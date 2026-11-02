<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $PAGE_TITLE; ?> | <?php echo $this->config->item('APP_NAME'); ?></title>
    
    <?php $this->load->view('parts/top'); ?>
	
  </head>
  <body>
  
  <div class="site-wrap">

    <?php $this->load->view('parts/header'); ?>
  
    <div style="height: 113px;"></div>


    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
			<?php if($success){ ?>
				<h4>Password berhasil diganti</h4>
			<?php }else{ ?>
            <form action="" method="post" class="p-5 bg-white">
				
				<h1>Ubah Kata Sandi</h1>

				<div class="form-group">
					<strong>Kata Sandi lama</strong><br />
					<input name="password" type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Kata Sandi Lama" value="" required>
					<?php echo form_error('password') ? '<span class="text-danger"><br />'.form_error('password').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Kata Sandi Baru <i>(Minimal 8 karakter)</i></strong><br />
					<input name="new_password" type="password" class="form-control <?php echo form_error('new_password') ? 'is-invalid' : ''; ?>" placeholder="Kata Sandi Baru" value="" required>
					<?php echo form_error('new_password') ? '<span class="text-danger"><br />'.form_error('new_password').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Konfirmasi Kata Sandi</strong><br />
					<input name="confirm-password" type="password" class="form-control <?php echo form_error('confirm-password') ? 'is-invalid' : ''; ?>" placeholder="Konfirmasi Kata Sandi" value="" required>
					<?php echo form_error('confirm-password') ? '<span class="text-danger"><br />'.form_error('confirm-password').'</span>' : ''; ?>
				</div>
				
				<div class="row form-group">
					<div class="col-md-12 text-center">
						<button class="btn btn-primary pill px-4 py-2" type="submit" name="form-submit">Reset</button>
					</div>
				</div>

  
            </form>
			<?php } ?>
          </div>

          <div class="col-lg-4">
		  
          </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('parts/footer'); ?>
    
  </div>

  <?php $this->load->view('parts/bottom'); ?>

	
  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>