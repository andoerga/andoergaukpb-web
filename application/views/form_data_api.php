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
          
            
			<?php if(!$this->session->has_userdata('testing') && (time() > $this->config->item('BATAS_PENDAFTARAN'))){ ?>
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
				<h3>Periksa kembali data anda. Apabila ada data yang tidak sesuai, silakan melakukan perbaikan data melalui SIM Tendik</h3>
				<?php /*
				<div class="form-group form-row">
					<p class="text-danger">Siapkan file dokumen persyaratan sebelum mendaftar</p>
				</div>
				*/ ?>
				<div class="form-group form-row">
					<strong>Nama</strong><br />
					<input name="nama" type="text" class="form-control" placeholder="Nama" value="<?php echo !empty($data['nama']) ? $data['nama'] : ''; ?>" disabled>
					<?php echo form_error('nama') ? '<span class="text-danger"><br />'.form_error('nama').'</span>' : ''; ?>
				</div>
				<div class="form-group form-row">
					<strong>NIP</strong><br />
					<input name="nip" type="text" class="form-control" placeholder="NIP" value="<?php echo !empty($data['nip']) ? $data['nip'] : ''; ?>" disabled>
					<?php echo form_error('nip') ? '<span class="text-danger"><br />'.form_error('nip').'</span>' : ''; ?>
				</div>
				<div class="form-group form-row">
					<strong>Email</strong><br />
					<input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo !empty($data['email']) ? $data['email'] : ''; ?>" disabled>
					<?php echo form_error('email') ? '<span class="text-danger"><br />'.form_error('email').'</span>' : ''; ?>
				</div>
				<div class="form-group form-row">
					<strong>Jabatan</strong><br />
					<select name="tingkat_id" class="form-control select2" required>
						<?php if($data['tipe_jabfung'] == 'penilik'){ ?>
							<option value="21" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 21 ? 'selected' : ''; ?>>Penilik Ahli Pertama</option>
							<option value="22" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 22 ? 'selected' : ''; ?>>Penilik Ahli Muda</option>
							<option value="23" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 23 ? 'selected' : ''; ?>>Penilik Ahli Madya</option>
						<?php }else if($data['tipe_jabfung'] == 'pamong_belajar'){ ?>
							<option value="11" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 11 ? 'selected' : ''; ?>>Pamong Belajar Ahli Pertama</option>
							<option value="12" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 12 ? 'selected' : ''; ?>>Pamong Belajar Ahli Muda</option>
							<option value="13" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == 13 ? 'selected' : ''; ?>>Pamong Belajar Ahli Madya</option>
						<?php } ?>
						<?php /*
						<?php foreach($tingkat as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
						<?php } ?>
						*/ ?>
					</select>
					<?php echo form_error('tingkat_id') ? '<span class="text-danger"><br />'.form_error('tingkat_id').'</span>' : ''; ?>
				</div>
				<div class="form-group">
					<strong>Golongan :</strong><br />
					<select name="golongan_id" class="form-control select2" required>
						<?php foreach($golongan as $t){ ?>
							<option value="<?php echo $t->id; ?>" <?php echo !empty($data['golongan_id']) && $data['golongan_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
						<?php } ?>
					</select>
					<?php echo form_error('golongan_id') ? '<span class="text-danger"><br />'.form_error('golongan_id').'</span>' : ''; ?>
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
					<input name="handphone" type="text" class="form-control" placeholder="No Handphone" value="<?php echo !empty($data['handphone']) ? $data['handphone'] : ''; ?>" required disabled>
					<?php echo form_error('handphone') ? '<span class="text-danger"><br />'.form_error('handphone').'</span>' : ''; ?>
				</div>
				
				<div class="form-group">
					<label><input name="checklist" type="checkbox" class="" placeholder="Setuju" value="1" <?php echo !empty($data['checklist']) ? "checked" : ''; ?> required> Data saya sudah sesuai</label>
					<?php echo form_error('checklist') ? '<span class="text-danger"><br />'.form_error('checklist').'</span>' : ''; ?>
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