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
			<?php if(time() > $this->config->item('BATAS_PENDAFTARAN') && 1==2){ ?>
				<h1>Pendaftaran sudah ditutup</h1>
			<?php }else{ ?>
            <form action="" method="post" class="p-5 bg-white">
				<div class="row mystep">
					<div class="col-4 step active">1. Registrasi Akun</div>
					<div class="col-4 text-center step">2. Informasi Pegawai</div>
					<div class="col-4 text-right step">3. Unggah Berkas</div>
				</div>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
					0%
				  </div>
				</div>
				<br />
				<br />
				<br />
				<h1>Pendaftaran Uji Kompetensi Kenaikan Jenjang Penilik dan Pamong Belajar</h1>
				<?php /*
				<div class="form-group form-row">
					<p class="text-danger">Siapkan file dokumen persyaratan sebelum mendaftar</p>
				</div>
				*/ ?>
				<br />
				<br />
				<br />
				<div class="form-group">
					<strong>Jabatan Fungsional</strong><br />
					<label><input name="tipe_jabfung" type="radio" class="" placeholder="Penilik" value="penilik" <?php echo !empty($data['tipe_jabfung']) ? "penilik" : ''; ?> required> Penilik</label><br />
					<label><input name="tipe_jabfung" type="radio" class="" placeholder="Pamong Belajar" value="pamong_belajar" <?php echo !empty($data['tipe_jabfung']) ? "pamong_belajar" : ''; ?> required> Pamong Belajar</label>
					<?php echo form_error('tipe_jabfung') ? '<span class="text-danger"><br />'.form_error('tipe_jabfung').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>NIP</strong><br />
					<input name="nip" type="text" class="form-control <?php echo form_error('nip') ? 'is-invalid' : ''; ?>"  placeholder="NIP" value="<?php echo !empty($data['nip']) ? $data['nip'] : ''; ?>" required>
					<?php echo form_error('nip') ? '<span class="text-danger"><br />'.form_error('nip').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Kata Sandi <i>(Minimal 8 karakter)</i></strong><br />
					<input name="password" type="password" class="form-control <?php echo form_error('password') ? 'is-invalid' : ''; ?>" placeholder="Kata Sandi" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>" required>
					<?php echo form_error('password') ? '<span class="text-danger"><br />'.form_error('password').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Konfirmasi Kata Sandi</strong><br />
					<input name="confirm-password" type="password" class="form-control <?php echo form_error('confirm-password') ? 'is-invalid' : ''; ?>" placeholder="Konfirmasi Kata Sandi" value="<?php echo !empty($data['confirm-password']) ? $data['confirm-password'] : ''; ?>" required>
					<?php echo form_error('confirm-password') ? '<span class="text-danger"><br />'.form_error('confirm-password').'</span>' : ''; ?>
				</div>
				
				
				<div class="row form-group">
					<div class="col-md-12 text-center">
						<button class="btn btn-primary pill px-4 py-2" type="submit" name="form-submit">Daftar</button>
						<p class="mt-2 login-form__footer">Sudah memiliki akun, silakan <a href="<?php echo site_url('login'); ?>" class="text-primary">masuk disini</a></p>
					</div>
				</div>
				
				
				<hr />
				
  
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