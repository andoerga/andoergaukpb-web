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
    
	<div class="site-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-12 col-lg-8 mb-5">
			<form class="p-5 bg-white">
			<div class="row mystep">
					<div class="col-4 step passed">1. Registrasi Akun</div>
					<div class="col-4 text-center step passed">2. Informasi Pegawai</div>
					<div class="col-4 text-right step passed">3. Unggah Berkas</div>
				</div>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
					100%
				  </div>
				</div>
				<br />
				<br />
				<br />
			<?php /*
            <h2 class="h2 mb-3"><?php echo $PAGE_TITLE; ?></h2>
			*/ ?>
			<h1>Hai, <?php echo $user->nama; ?></h1>
			<?php /*
			<h4>Data Anda sedang diverifikasi</h4>
			*/ ?>
			<?php if($user->status_approval == 'unset'){ ?>
					
					<h4>Pendaftaran telah berhasil</h4>
					<?php /*
					<h4>Periksa kembali data anda. Anda masih dapat memperbaiki data selama masa pendaftaran</h4>
					*/ ?>
					<div class="form-group form-row">
						<div class="col-4"><strong>Surel (<i>Email</i>) : </strong></div>
						<div class="col-8"><?php echo $user->email; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>NIP : </strong></div>
						<div class="col-8"><?php echo $user->nip; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Jabatan yang dituju : </strong></div>
						<div class="col-8">
							<?php 
							if($user->tipe_jabfung == 'penilik'){
								echo "Penilik";
							}else if($user->tipe_jabfung == 'pamong_belajar'){
								echo "Pamong Belajar";
							}
							?>
						</div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Instansi : </strong></div>
						<div class="col-8"><?php echo $user->instansi_name; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Provinsi : </strong></div>
						<div class="col-8"><?php echo $user->nama_provinsi; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Kota/Kabupaten : </strong></div>
						<div class="col-8"><?php echo $user->nama_kotkab; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>TMT : </strong></div>
						<div class="col-8"><?php echo date('d F Y', strtotime($user->tmt_golongan)); ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>No Handphone : </strong></div>
						<div class="col-8"><?php echo $user->handphone; ?></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan SK Jabatan Terakhir : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_sk_terakhir; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan ijazah S-1/D-IV sesuai yang dibutuhkan : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_ijazah; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan Pakta integritas : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_pakta; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan SK Kenaikan Pangkat/Golongan Terakhir : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_sk_pengangkatan; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan surat usulan mengikuti uji Kompetensi dari Dinas Pendidikan kabupaten/kota : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_pengantar; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan Pakta integritas yang ditandatangani di atas materai : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_pakta; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan Dokumen penilaian kinerja dalam 2 tahun terakhir : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_skp; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan surat penetapan kebutuhan JF Penilik atau Pamong Belajar dari Menpan RB : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_kebutuhan; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					<div class="form-group form-row">
						<div class="col-4"><strong>Scan surat keterangan Pengalaman dari Kepala dinas pendidikan kabupaten/kota : </strong></div>
						<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_sertifikat; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
					</div>
					
					
					<?php if(time() < WAKTU_TUTUP || ($user->registered == 0 && $user->status_approval == 'unset')){ ?>
					<h4>Data anda tidak sesuai?</h4>
					
			
					<h4><a href="<?php echo site_url('change_data'); ?>">Klik disini untuk memperbaiki data anda</a></h4>
					<?php } ?>
			<?php }elseif($user->status_approval == 'perbaikan'){ ?>
					<?php
					$batasAwalWaktu = strtotime('2024-08-27 09:05:00');
					$batasAkhirWaktu = strtotime('2024-08-27 12:00:00');
					?>
					<?php /*
					<h4>Selamat, Anda lulus seleksi Administrasi</h4>
					*/ ?>
					<h5>Ujian akan dibuka pada <?php echo date('d F Y, H:i', $batasAwalWaktu); ?> WIB.
					<?php /*
					<h4>Data anda sedang diverifikasi</h4>
					*/ ?>
					<?php
					
					$now = time();
					if($user->tingkat_id == '21' || $user->tingkat_id == '22' || $user->tingkat_id == '23'){ 
						if($batasAkhirWaktu > $now && $now > $batasAwalWaktu){
							?>
						<a class="btn btn-primary btn-lg" href="https://ujikom-paud.kemdikbud.go.id/_ujian">Mulai Ujian</a>
						<?php } ?>
						<?php } ?>
			<?php }elseif($user->status_approval == 'rejected'){ ?>
					<?php /*
					<h4>Maaf Anda tidak lulus seleksi administrasi,<br />Terimakasih atas partisipasinya</h4>
					*/ ?>
					
					<h4>Data anda sedang diverifikasi</h4>
					
			<?php } ?>
			<?php if($user->status_approval == 'approved'){ ?>
			<?php if($user->id > 1521){ ?>
				<?php
					$batasAwalWaktu = strtotime('2025-06-25 09:00:00');
					$batasAkhirWaktu = strtotime('2025-06-25 12:00:00');
					$now = time();
					if($user->tingkat_id == '11' || $user->tingkat_id == '12' || $user->tingkat_id == '13' || $user->tingkat_id == '21' || $user->tingkat_id == '22' || $user->tingkat_id == '23'){ 
						if($batasAkhirWaktu > $now && $now > $batasAwalWaktu){
							?>
					<a class="btn btn-primary btn-lg" href="https://ujikom-paud.kemdikbud.go.id/_ujian">Mulai Ujian</a>
<?php } ?>
						<?php } ?>
			<?php } ?>
			<?php } ?>
			<?php if($user->status_approval == 'approved' || $user->status_approval == 'perbaikan' || $user->status_approval == 'passed'){ ?>
			<?php if($user->sertifikat != ''){ ?>
			<h4>Selamat, anda dinyatakan <strong>LULUS</strong> uji kompetensi</h4>
			<h4>Silakan klik link di bawah ini untuk mengunduh sertifikat kelulusan uji kompetensi</h4>
			<a href="<?php echo $user->sertifikat; ?>" target="_blank" class="btn btn-primary btn-lg">Unduh Sertifikat</a>
			<?php }else{ ?>
				<?php
					$batasAwalWaktu = strtotime('2026-08-05 09:05:00');
					$batasAkhirWaktu = strtotime('2026-08-05 12:00:00');
					?>
					<?php /*
					<h4>Selamat, Anda lulus seleksi Administrasi</h4>
					*/ ?>
					<?php /*
					<h5>Ujian akan dibuka pada <?php echo date('d F Y, H:i', $batasAwalWaktu); ?> WIB.
					*/ ?>
					
					<h4>Data anda sedang diverifikasi</h4>
					
					<?php
					
					$now = time();
					if($user->tingkat_id == '11' || $user->tingkat_id == '12' || $user->tingkat_id == '13' || $user->tingkat_id == '21' || $user->tingkat_id == '22' || $user->tingkat_id == '23'){ 
						if($batasAkhirWaktu > $now && $now > $batasAwalWaktu){
							?>
							<a href="<?php echo base_url() . '_ujian'; ?>" class="btn btn-lg btn-primary"><span class="fa fa-stream"></span> Masuk Ujian</a>&nbsp;&nbsp;
						<?php } ?>
						<?php } ?>
				<?php } ?>
			<?php } ?>
			</div>
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