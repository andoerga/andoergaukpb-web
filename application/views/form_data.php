<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
	<base href="<?php echo base_url(); ?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Pendaftaran Uji Kompetensi Kenaikan Jenjang Penilik dan Pamong Belajar</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet">
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
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
                                
                                    <a class="text-center" href="index.html"> <h4>Silakan Lengkapi Data Anda</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group form-row">
										<strong>Jabatan :</strong><br />
                                        <select name="tingkat_id" class="form-control select2">
											<?php foreach($tingkat as $t){ ?>
												<option value="<?php echo $t->id; ?>" <?php echo !empty($data['tingkat_id']) && $data['tingkat_id'] == $t->id ? 'selected' : ''; ?>><?php echo $t->name; ?></option>
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
                                    <button class="btn login-form__btn submit w-100" type="submit" name="form-submit"><span class="fa fa-save"></span> Simpan</button>
                                </form>
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
    <script src="plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script>
	$(document).ready(function(){
		$('.select2').select2();
		$('.datepicker').datepicker({
			format:'yyyy-mm-dd'
		});
	});
	</script>
</body>
</html>





