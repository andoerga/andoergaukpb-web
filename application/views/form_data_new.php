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
          
            
			<?php if((time() > $this->config->item('BATAS_PENDAFTARAN') && $data['registered'] == '1') && TESTINGMODE == false){ ?>
				<h1>Pendaftaran sudah ditutup</h1>
			<?php }else{ ?>
            <form action="" method="post" class="p-5 bg-white">
				<div class="row mystep">
					<div class="col-4 step passed">1. Registrasi Akun</div>
					<div class="col-4 text-center step active">2. Informasi Pegawai</div>
					<div class="col-4 text-right step">3. Unggah Berkas</div>
				</div>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
					30%
				  </div>
				</div>
				<br />
				<br />
				<br />
				<h1>Silakan Lengkapi Data Kepegawaian Anda</h1>
				<?php /*
				<div class="form-group form-row">
					<p class="text-danger">Siapkan file dokumen persyaratan sebelum mendaftar</p>
				</div>
				*/ ?>
				<div class="form-group form-row">
					<strong>Jabatan</strong><br />
					<select name="tingkat_id" class="form-control select2">
						<?php foreach($tingkat as $t){ ?>
							<?php if($t->id != '13'){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
							<?php } ?>
						<?php } ?>
					</select>
					<?php echo form_error('tingkat_id') ? '<span class="text-danger"><br />'.form_error('tingkat_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Golongan :</strong><br />
					<select name="golongan_id" class="form-control select2">
						<?php foreach($golongan as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['golongan_id']) && $data['golongan_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('golongan_id') ? '<span class="text-danger"><br />'.form_error('golongan_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Provinsi :</strong><br />
					<select name="prov_id" class="form-control select2">
						<?php foreach($provinsi as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['prov_id']) && $data['prov_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->nama; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('prov_id') ? '<span class="text-danger"><br />'.form_error('prov_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Kota/Kabupaten :</strong><br />
					<select name="kotkab_id" class="form-control select2">
						<?php foreach($kotkab as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['kotkab_id']) && $data['kotkab_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->nama; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('kotkab_id') ? '<span class="text-danger"><br />'.form_error('kotkab_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Instansi :</strong><br />
					<select name="instansi_id" class="form-control select2">
						<?php foreach($instansi as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['instansi_id']) && $data['instansi_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('instansi_id') ? '<span class="text-danger"><br />'.form_error('instansi_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>TMT Golongan :</strong><br />
					<input name="tmt_golongan" type="text" class="form-control datepicker"  placeholder="TMT Golongan" value="<?php echo !empty($data['tmt_golongan']) ? $data['tmt_golongan'] : ''; ?>" required>
					<?php echo form_error('tmt_golongan') ? '<span class="text-danger"><br />'.form_error('tmt_golongan').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>No. Handphone :</strong><br />
					<input name="handphone" type="text" class="form-control" placeholder="No Handphone" value="<?php echo !empty($data['handphone']) ? $data['handphone'] : ''; ?>" required>
					<?php echo form_error('handphone') ? '<span class="text-danger"><br />'.form_error('handphone').'</span>' : ''; ?>
				</div>
				
				<div class="row form-group">
					<div class="col-md-12 text-center">
						<button class="btn btn-primary pill px-4 py-2" type="submit" name="form-submit">Simpan</button>
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