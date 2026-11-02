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
	<?php if($content == 'list'){ ?>
		<?php foreach($pengumuman as $p){ ?>
		<div class="site-section">
		  <div class="container">
			<div class="row">
			  <div class="col-md-10 mx-auto text-center mb-5 section-heading">
				<h2 class="mb-5"><a href="<?php echo site_url('registration/pengumuman/'.$p->id); ?>"><?php echo $p->title; ?></a></h2>
			  </div>
			</div>
		  </div>
		</div>
		<?php } ?>
	<?php }else{ ?>
		<div class="site-section">
		  <div class="container">
			<div class="row">
			  <div class="col-md-10 mx-auto text-center mb-5 section-heading">
				<h2 class="mb-5"><?php echo $pengumuman->title; ?></h2>
			  </div>
			</div>
			<div class="row">
				<div class="col-md-10 mx-auto mb-5 section-body">
					<?php echo $pengumuman->detail; ?>
				</div>
			</div>
		  </div>
		</div>
	<?php } ?>
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