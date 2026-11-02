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
          
            
          
            <form action="" method="post" class="p-5 bg-white">
				
				<h1>Login</h1>

				<div>
				
				</div>
				<div class="form-group">
					<strong>Email/NIP</strong><br />
					<input name="username" type="text" class="form-control"  placeholder="Masukkan Email atau NIP" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>" required>
					<?php echo form_error('username') ? '<span class="text-danger"><br />'.form_error('username').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Kata Sandi</strong><br />
					<input name="password" type="password" class="form-control" placeholder="Kata Sandi" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>" required>
					<?php echo form_error('password') ? '<span class="text-danger"><br />'.form_error('password').'</span>' : ''; ?>
				</div>

				<div class="row form-group">
				<?php if (isset($message_error)){ ?>
					<div class="col-md-12 text-danger"><?php echo $message_error; ?></div>
				<?php } ?>
					<div class="col-md-12">
						<button class="btn btn-primary pill px-4 py-2" type="submit" name="form-submit">Login</button>
						<?php /*
						<p class="mt-5 login-form__footer">Lupa password? Silakan <a href="<?php echo site_url('reset_password'); ?>" class="text-primary">klik disini</a></p>
						*/ ?>
						<?php if($this->config->item('BUKA_PENDAFTARAN') < time() && time() < $this->config->item('BATAS_PENDAFTARAN')){ ?>
						<p class="login-form__footer">Belum memiliki akun? silakan <a href="<?php echo site_url('registration/register'); ?>" class="text-primary">daftar disini</a></p>
						<?php } ?>
					</div>
				</div>

  
            </form>
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