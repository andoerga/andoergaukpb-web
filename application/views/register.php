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
								<?php /*
								<h1 class="text-danger">Maaf, Pendaftaran sudah ditutup</h1>
								*/ ?>
                                
                                <a class="text-center" href="index.html"> <h4>Pembuatan Akun Penilik/Pamong Belajar</h4></a>
        
                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group form-row">
										<strong>Nama</strong><br />
                                        <input name="name" type="text" class="form-control"  placeholder="Nama Lengkap" value="<?php echo !empty($data['name']) ? $data['name'] : ''; ?>" required>
										<?php echo form_error('name') ? '<span class="text-danger"><br />'.form_error('name').'</span>' : ''; ?>
                                    </div>
									<div class="form-group">
										<strong>NIP</strong><br />
                                        <input name="nip" type="text" class="form-control"  placeholder="NIP" value="<?php echo !empty($data['nip']) ? $data['nip'] : ''; ?>" required>
										<?php echo form_error('nip') ? '<span class="text-danger"><br />'.form_error('nip').'</span>' : ''; ?>
                                    </div>
                                    <div class="form-group">
										<strong>Surel (<i>Email</i>)</strong><br />
                                        <input name="username" type="email" class="form-control"  placeholder="Surel" value="<?php echo !empty($data['username']) ? $data['username'] : ''; ?>" required>
										<?php echo form_error('username') ? '<span class="text-danger"><br />'.form_error('username').'</span>' : ''; ?>
                                    </div>
                                    <div class="form-group">
										<strong>Kata Sandi</strong><br />
                                        <input name="password" type="password" class="form-control" placeholder="Kata Sandi" value="<?php echo !empty($data['password']) ? $data['password'] : ''; ?>" required>
										<?php echo form_error('password') ? '<span class="text-danger"><br />'.form_error('password').'</span>' : ''; ?>
                                    </div>
									<div class="form-group">
										<strong>Konfirmasi Kata Sandi</strong><br />
                                        <input name="confirm-password" type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" value="<?php echo !empty($data['confirm-password']) ? $data['confirm-password'] : ''; ?>" required>
										<?php echo form_error('confirm-password') ? '<span class="text-danger"><br />'.form_error('confirm-password').'</span>' : ''; ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="form-submit">Daftar</button>
                                </form>
                                    <p class="mt-5 login-form__footer">Sudah memiliki akun, silakan <a href="<?php echo site_url('login'); ?>" class="text-primary">masuk disini</a></p>
                                    </p>
                                
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
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>





