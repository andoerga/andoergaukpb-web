<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
	<base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pendaftaran Uji Kompetensi Reguler Penilik dan Pamong Belajar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <h1>Hai, <?php echo $user->nama; ?></h1>
								<h4>Data anda sedang diverifikasi</h4>
								<?php /*
								<?php if($user->status_approval == 'unset'){ ?>
										<h4>Data anda sedang diverifikasi</h4>
								<?php }elseif($user->status_approval == 'approved'){ ?>
										<h4>Anda diterima sebagai peserta</h4>
								<?php }elseif($user->status_approval == 'rejected'){ ?>
										<h4>Anda tidak lolos verifikasi berkas</h4>
								<?php } ?>
								*/ ?>
                                <div class="form-group form-row">
									<div class="col-4"><strong>Surel (<i>Email</i>) : </strong></div>
									<div class="col-8"><?php echo $user->username; ?></div>
								</div>
								<div class="form-group form-row">
									<div class="col-4"><strong>NIP : </strong></div>
									<div class="col-8"><?php echo $user->nip; ?></div>
								</div>
								<div class="form-group form-row">
									<div class="col-4"><strong>Jabatan : </strong></div>
									<div class="col-8"><?php echo $user->tingkat_name; ?></div>
								</div>
								<div class="form-group form-row">
									<div class="col-4"><strong>Instansi : </strong></div>
									<div class="col-8"><?php echo $user->instansi_name; ?></div>
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
									<div class="col-4"><strong>Scan PAK terakhir : </strong></div>
									<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_sk_pengangkatan; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
								</div>
								<div class="form-group form-row">
									<div class="col-4"><strong>Scan Surat Pengantar : </strong></div>
									<div class="col-8"><a class="btn btn-sm btn-primary" href="<?php echo $user->doc_pengantar; ?>" target="_blank" title="unduh dokumen"><i class="fa fa-download"></i></a></div>
								</div>
								<?php //var_dump($user); ?>
								<div class="row">
									<?php if($user->status_approval == 'unset'){ ?>
										<?php if(time() <= WAKTU_TUTUP){ ?> 
										<a href="<?php echo site_url('change_data'); ?>" class="btn btn-lg btn-primary"><span class="fa fa-edit"></span> Perbaiki Data</a>&nbsp;&nbsp;
										<?php } ?>
									<?php }elseif($user->status_approval == 'perbaikan'){ ?>
										<?php if( in_array($user->tingkat_id, array(21,22,23))){ ?>
										<?php if(time() >= UJIAN_MULAI && time() < UJIAN_SELESAI) { ?>
										<a href="<?php echo base_url() . '_ujian'; ?>" class="btn btn-lg btn-primary"><span class="fa fa-stream"></span> Masuk Ujian</a>&nbsp;&nbsp;
										<?php } ?>	
										<?php } ?>
									<?php } ?>
									<a href="<?php echo site_url('logout'); ?>" class="btn btn-lg btn-danger"><span class="fa fa-sign-out-alt"></span> Keluar</a>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
	<script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
    <script src="plugins/select2/js/select2.full.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.select2').select2();
	});
	</script>
</body>
</html>





