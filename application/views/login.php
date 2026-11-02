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
                            <div class="card-body pt-5 text-center">
								<img class="" width="100" src="images/logo-tutwuri.png" alt="Tut Wuri Handayani" />
								<h1>Portal Pendaftaran</h1>
                                <h4>Uji Kompetensi Kenaikan Jenjang Penilik dan Pamong Belajar</h4>
								<br />
								<?php if(time() > WAKTU_TUTUP){ ?> 
								<?php /*<h4 class="text-danger">PENDAFTARAN SUDAH DITUTUP</h4>*/ ?>
								<form class="mt-5 mb-5 login-input" action="" method="post">
                                    <div class="form-group">
                                        <input name="username" type="text" class="form-control" placeholder="Masukkan Email atau NIP">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Kata Sandi">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Masuk</button>
                                </form>
								<br />
								<br />
								<h3 class="text-danger"><a href="assets/Pengumumam-Hasil-Uji-Kompetensi-Penilik-dan-PB-2020.pdf" target="_blank" style="color:inherit">Keputusan Hasil Uji Kompetensi Kenaikan Jenjang JF Penilik dan Pamong Belajar</a></h3>
								<h4 class="text-danger"><a href="assets/Pengumumam-Hasil-Uji-Kompetensi-Penilik-dan-PB-2020.pdf" target="_blank" style="color:inherit">Lihat Selengkapnya</a></h4>
								<br />
								<br />
								<h3 class="text-danger"><a href="includes/Pengumuman-Peserta-Ujikom-Kenaikan-Jenjang-2020.pdf" target="_blank" style="color:inherit">Pengumuman Peserta Uji Kompetensi</a></h3>
								<h4 class="text-danger"><a href="includes/Pengumuman-Peserta-Ujikom-Kenaikan-Jenjang-2020.pdf" target="_blank" style="color:inherit">Lihat Selengkapnya</a></h4>
								<br />
								<?php }else{ ?>
                                <form class="mt-5 mb-5 login-input" action="" method="post">
                                    <div class="form-group">
                                        <input name="username" type="text" class="form-control" placeholder="Masukkan Email atau NIP">
                                    </div>
                                    <div class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Kata Sandi">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Masuk</button>
                                </form>
                                <p class="mt-5 login-form__footer">Belum punya akun? <a href="<?php echo site_url('registration/register'); ?>" class="text-primary">Buat Akun</a> sekarang</p>
								<?php } ?>
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





