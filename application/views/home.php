<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $PAGE_TITLE; ?> | <?php echo $this->config->item('APP_NAME'); ?></title>
    
    <?php $this->load->view('parts/top'); ?>
	
  </head>
  <body>
  
  <div class="site-wrap">
	<div style="display:none;">
	<?php var_dump($_SESSION); ?>
	</div>
    <?php $this->load->view('parts/header'); ?>
  
    <div style="height: 113px;"></div>
	
	<?php foreach($pengumuman as $p){ ?>
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">
            <h2 class="mb-5"><a href="<?php echo site_url('registration/pengumuman/'.$p->id); ?>"><?php echo $p->title; ?></h2>
          </div>
        </div>
      </div>
    </div>
	<?php } ?>
	<?php /*
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Kelulusan Uji Kompetensi Kenaikan Jenjang JF Guru, Pamong Belajar, Pengawas Sekolah dan Penilik</h2>
			<ul>
				<li><a href="uploads/Surat-Pengumuman-Kelulusan-a-n-.pdf" target="_blank"><i class="fa fa-download"></i> Surat Pengumuman Kelulusan</a></li>
				<li><a href="uploads/Surat-Rekomendasi-Kenaikan-Jabatan-JF-Guru-JF-PS-2025-an-.pdf" target="_blank"><i class="fa fa-download"></i> Surat Rekomendasi Kenaikan Jenjang</a></li>
				<li><a href="https://drive.google.com/drive/folders/1ATmYnuqYM_F_yDsDjJYYkQ4v_DQ4rJVb?usp=sharing" target="_blank"><i class="fa fa-download"></i> Lampiran Surat</a></li>
			</ul>
          </div>
        </div>
      </div>
    </div>
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Surat Pengumuman Hasil Verifikasi Berkas Uji Kompetensi Kenaikan Jenjang Bagi JF Penilik dan Pamong Belajar Tahun 2025</h2>
			<ul>
				<li><a href="uploads/SrtPengumumanHasVervalBerkas-UKKJ_2025-(Publis).pdf" target="_blank"><i class="fa fa-download"></i> Unduh</a></li>
			</ul>
          </div>
        </div>
      </div>
    </div>
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Surat Pemberitahuan Pelaksanaan Uji Kompetensi Kenaikan Jenjang Bagi JF Guru, Pamong Belajar, Pengawas Sekolah, dan Penilik Tahun 2025</h2>
			<ul>
				<li><a href="uploads/Surat-Pemberitahuan-Uji-Kompetensi-2025.pdf" target="_blank"><i class="fa fa-download"></i> Unduh</a></li>
				<li><a href="<?php echo site_url('login'); ?>"></i> Daftar</a></li>
			</ul>
          </div>
        </div>
      </div>
    </div>
	
	<?php /*
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Hasil Verifikasi Uji Kompetensi Kenaikan Jenjang Jabatan Fungsional Penilik dan Pamong Belajar 2024</h2>
			<ul>
				<li><a href="uploads/Surat-Pengumuman-Hasil-Verval-Berkas-UKKJ-PB-dan-Penilik.pdf" target="_blank"><i class="fa fa-download"></i> Unduh</a></li>
			</ul>
          </div>
        </div>
      </div>
    </div>
	
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover" style="background-image: url(images/reog.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover" style="background-image: url(images/potong-gimbal.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
            </div>
          </div>
        </div>
      </div> 
	  
	  <div class="site-blocks-cover" style="background-image: url(images/tari-kecak.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
            </div>
          </div>
        </div>
      </div> 
    </div>
	*/ ?>
	<?php /*
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pendaftaran Uji Kompetensi Perpindahan Jabatan Lain ke Jabatan Fungsional Penilik dan Pamong Belajar</h2>
            <a class="btn btn-lg btn-primary" href="<?php echo site_url(''); ?>">Daftar Sekarang</a>

			
          </div>
        </div>

      </div>
    </div>
	*/ ?>
	<?php /*
	<div class="site-section">
      <div class="container">
		<div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Kelulusan Uji Kompetensi JF Penilik dan Pamong Belajar</h2>
			<p>Berikut adalah surat pengumuman kelulusan Uji Kompetensi JF Penilik dan Pamong Belajar.<br />
			<ul>
				<li><a href="uploads/surat-pengumuman-ujikom-2021.pdf" target="_blank"><i class="fa fa-download"></i> Unduh surat pengumuman kelulusan uji kompetensi</a></li>
			</ul>
            <p>Selamat kepada para peserta yang telah dinyatakan lulus uji kompetensi. Anda dapat mengunduh sertifikat kelulusan dengan cara login ke dalam portal Uji Komptensi dan masuk ke menu Data Saya -> Status Pendaftaran
			</p>
          </div>
        </div>
      </div>
    </div>
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pelaksanaan Remedial Uji Kompetensi Penilik dan Pamong Belajar</h2>
			<p>Bagi para peserta yang mendapatkan hasil uji kompetensi dibawah kriteria,<br />
			diberikan kesempatan mengikuti Remedial Uji Kompetensi Penilik dan Pamong Belajar yang akan diselenggarakan pada<br />
			Rabu, 17 November 2021, Pukul 08.00 s.d. 12.00 WIB.<br />
			Berikut adalah daftar peserta yang berhak mengikuti remedial:</p>
			<ul>
				<li><a href="uploads/Daftar Peserta Uji Kompetensi Penilik yang Remedial.pdf" target="_blank"><i class="fa fa-download"></i> Peserta Remedial Penilik</a></li>
				<li><a href="uploads/Daftar Peserta Uji Kompetensi PB yang Remedial.pdf" target="_blank"><i class="fa fa-download"></i> Peserta Remedial Pamong Belajar</a></li>
			</ul>
            <p>Panitia juga memberikan kesempatan bagi para peserta untuk dapat memperbaiki hasil uji kompetensi dengan mempelajari kisi-kisi soal Uji Kompetensi Penilik dan Pamong Belajar.
			<br />Berikut adalah kisi-kisi soal Uji Kompetensi Penilik dan Pamong Belajar
			</p>
			<ul>
				<li><a href="uploads/Kisi Kisi Penilik Jenjang Ahli Muda.pdf" target="_blank"><i class="fa fa-download"></i> Kisi-kisi soal ujikom Penilik Pertama ke Muda</a></li>
				<li><a href="uploads/Kisi Kisi Penilik Jenjang Ahli Madya.pdf" target="_blank"><i class="fa fa-download"></i> Kisi-kisi soal ujikom Penilik Muda ke Madya</a></li>
				<li><a href="uploads/Kisi Kisi Penilik Jenjang Ahli Utama.pdf" target="_blank"><i class="fa fa-download"></i> Kisi-kisi soal ujikom Penilik Madya ke Utama</a></li>
				<li><a href="uploads/Kisi-Kisi PB Final (Pertama-Muda).pdf" target="_blank"><i class="fa fa-download"></i> Kisi-kisi soal ujikom Pamong Belajar Pertama ke Muda</a></li>
				<li><a href="uploads/Kisi-Kisi PB Final (Muda-Madya).pdf" target="_blank"><i class="fa fa-download"></i> Kisi-kisi soal ujikom Pamong Belajar Muda ke Madya</a></li>
			</ul>
          </div>
        </div>

      </div>
    </div>
	*/ ?>
	<?php /*
	 <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Hasil Uji Kompetensi Kenaikan Jenjang Jabatan Fungsional Penilik dan Pamong Belajar Tahun 2022</h2>
            <a class="btn btn-lg btn-primary" target="_blank" href="uploads/0970.pdf"><i clas="fa fa-download"></i> Unduh</a>

			
          </div>
        </div>

      </div>
    </div>
	 <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Hasil Verifikasi Berkas Pendaftaran Uji Kompetensi Kenaikan Jenjang Jabatan Fungsional Penilik dan Pamong Belajar Tahun 2022</h2>
            <a class="btn btn-lg btn-primary" target="_blank" href="uploads/pengumuman-pelaksanaan-uji-komptensi.pdf"><i clas="fa fa-download"></i> Unduh</a>

			
          </div>
        </div>

      </div>
    </div>
     <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Pengumuman Pendaftaran Uji Kompetensi Jabatan Fungsional Penilik dan Pamong Belajar</h2>
            <a class="btn btn-lg btn-primary" target="_blank" href="uploads/Dokumen_20158_1651036944.pdf"><i clas="fa fa-download"></i> Unduh</a>

			
          </div>
        </div>

      </div>
    </div>
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-10 mx-auto text-center mb-5 section-heading">

            <h2 class="mb-5">Kisi-kisi Soal Uji Kompetensi Jabatan Fungsional Penilik dan Pamong Belajar</h2>
            <a class="btn btn-lg btn-primary" target="_blank" href="uploads/kisi-kisi.pdf"><i clas="fa fa-download"></i> Unduh</a>

			
          </div>
        </div>

      </div>
    </div>
	*/ ?>
	
	<?php /*
    <div class="site-section">
      <div class="container">
		
        <div class="row align-items-center">
          <div class="col-md-6 mb-5 mb-md-0">
            
              <div class="img-border">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                  <img src="images/about_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
            
          </div>
          <div class="col-md-5 ml-auto">
            <h2 class="h2 mb-3">About Our Church</h2>
            <p class="h5 mb-3">We are helping people with the Cretor!</p>
            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nisi Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit nobis magni eaque velit eum, id rem eveniet dolor possimus voluptas..</p>
            <p><a href="https://vimeo.com/28959265" class="popup-vimeo text-uppercase">Watch Video <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>

    

    <div class="site-section site-block-feature bg-light">
      <div class="container">
        <div class="d-block d-md-flex border-bottom">
          <div class="text-center p-4 item border-right">
            <span class="flaticon-paper-plane display-3 mb-3 d-block text-primary"></span>
            <h2 class="h5 text-uppercase">Our Mission</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item">
            <span class="flaticon-chat-1 display-3 mb-3 d-block text-primary"></span>
            <h2 class="h5 text-uppercase">Testimonies</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
        <div class="d-block d-md-flex">
          <div class="text-center p-4 item border-right">
            <span class="flaticon-speaker display-3 mb-3 d-block text-primary"></span>
            <h2 class="h5 text-uppercase">Listen To Our Sermons</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
          <div class="text-center p-4 item">
            <span class="flaticon-avatar display-3 mb-3 d-block text-primary"></span>
            <h2 class="h5 text-uppercase">Join Our Church</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
            <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
          </div>
        </div>
      </div>
    </div>

    


    <div class="site-section block-15">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto text-center mb-5 section-heading">
            <h2>Recent Events</h2>
          </div>
        </div>


        <div class="nonloop-block-15 owl-carousel">
          

            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Bible Study</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Building Accomplishments in January 2018</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Learn How To Pray</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>

            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Bible Study</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Building Accomplishments in January 2018</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Learn How To Pray</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
            
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_1.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Bible Study</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_2.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Church Building Accomplishments in January 2018</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          
            <div class="media-with-text">
              <div class="img-border-sm mb-4">
                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <img src="images/img_3.jpg" alt="" class="img-fluid">
                </a>
              </div>
              <h2 class="heading mb-0"><a href="#">Learn How To Pray</a></h2>
              <span class="mb-3 d-block post-date">January 20, 2018 &bullet; By <a href="#">Josh Holmes</a></span>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio dolores culpa qui aliquam placeat nobis veritatis tempora natus rerum obcaecati.</p>
            </div>
          


        </div>

        <div class="row">
          
        </div>
      </div>
    </div>
	*/ ?>
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