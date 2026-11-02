<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $PAGE_TITLE; ?> | <?php echo $this->config->item('APP_NAME'); ?></title>
    
    <?php $this->load->view('parts/top'); ?>
	
	<link rel="stylesheet" href="plugins/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.structure.css">
	<link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.theme.css">
	
  </head>
  <body>
  
  <div class="site-wrap">

    <?php $this->load->view('parts/header'); ?>
  
    <div style="height: 113px;"></div>


    
    <div class="site-section bg-light">
      <div class="container">
		  
        <div class="row">
          <div class="col-md-12 col-lg-8 mb-5">
          
            
			<?php if((time() > $this->config->item('BATAS_PENDAFTARAN') && $data->registered == '1') && TESTINGMODE == false){ ?>
				<h1>Pendaftaran sudah ditutup</h1>
			<?php }else{ ?>
            <form action="" method="post" class="p-5 bg-white">
				<div class="row mystep">
					<div class="col-4 step passed">1. Registrasi Akun</div>
					<div class="col-4 text-center step passed">2. Informasi Pegawai</div>
					<div class="col-4 text-right step active">3. Unggah Berkas</div>
				</div>
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
					60%
				  </div>
				</div>
				<br />
				<br />
				<br />
				<h1>Silakan Unggah Berkas Persyaratan</h1>
				<?php /*
				<div class="form-group form-row">
					<p class="text-danger">Siapkan file dokumen persyaratan sebelum mendaftar</p>
				</div>
				*/ ?>
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan SK Jabatan Terakhir</label>
					</div>
					<div class="col-6">
						<span class="upload_status doc_sk_terakhir">
							<?php if($data->doc_sk_terakhir){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_sk_terakhir; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/sk_terakhir/'); ?>" data-type="doc_sk_terakhir" data-title="Scan SK Jabatan Terakhir">Upload</button>
						
					</div>
				</div>
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan SK Kenaikan Pangkat/Golongan Terakhir</label>
					</div>
					<div class="col-6">
						<span class="upload_status doc_sk_pengangkatan">
							<?php if($data->doc_sk_pengangkatan){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_sk_pengangkatan; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/sk_pengangkatan/'); ?>" data-type="doc_sk_pengangkatan" data-title="Upload Scan SK Kenaikan Pangkat/Golongan Terakhir">Upload</button>
						
					</div>
				</div>
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan Pakta integritas yang ditandatangani di atas materai</label>
						<br /><a href="<?php echo base_url().'uploads/2026-Pakta-Integritas-Final.docx'; ?>" target="_blank">Unduh Format</a>
					</div>
					<div class="col-6">
						<span class="upload_status doc_pakta">
							<?php if($data->doc_pakta){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_pakta; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/pakta/'); ?>" data-type="doc_pakta" data-title="Upload Scan Pakta integritas yang ditandatangani di atas materai">Upload</button>
						
					</div>
				</div>
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan SK PAK terakhir dalam bentuk integrasi atau konversi </label>
					</div>
					<div class="col-6">
						<span class="upload_status doc_pak">
							<?php if($data->doc_pak){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_pak; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/pak/'); ?>" data-type="doc_pak" data-title="Upload Scan SK PAK terakhir">Upload</button>
						
					</div>
				</div>
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan dokumen penilaian prestasi kerja paling kurang bernilai baik dalam 1 (satu) tahun terakhir</label>
					</div>
					<div class="col-6">
						<span class="upload_status doc_skp">
							<?php if($data->doc_skp){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_skp; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/skp/'); ?>" data-type="doc_skp" data-title="Upload Scan dokumen penilaian prestasi kerja paling kurang bernilai baik dalam 1 (satu) tahun terakhir">Upload</button>
						
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan Surat usulan dari Dinas Pendidikan untuk mengikuti UKKJ</label>
						
						<br /><a href="<?php echo base_url().'uploads/2026-Format-Surat Usulan-Dinas Final.docx'; ?>" target="_blank">Unduh Format</a>
						
					</div>
					<div class="col-6">
						<span class="upload_status doc_pengantar">
							<?php if($data->doc_pengantar){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia
								</span>&nbsp;
								
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_pengantar; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/pengantar/'); ?>" data-type="doc_pengantar" data-title="Upload Scan Surat usulan dari Dinas Pendidikan untuk mengikuti UKKJ">Upload</button>
						
					</div>
				</div>
				<?php /*
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan Sertifikat Uji Kompetensi Perpindahan Jabatan Lain</label>
					</div>
					<div class="col-6">
						<span class="upload_status doc_sertifikat">
							<?php if($data->doc_sertifikat){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia
								</span>&nbsp;
								
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_sertifikat; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/sertifikat/'); ?>" data-type="doc_sertifikat" data-title="Upload Scan Sertifikat Uji Kompetensi Perpindahan Jabatan Lain">Upload</button>
						
					</div>
				</div>
				*/ ?>
				
				<div class="form-group row">
					<div class="col-6">
						<label for="inputName">Scan Surat Penetapan dari Kemenpan RB (*)</label>
						<?php /*
						<br /><a href="<?php echo base_url().'assets/contoh-surat-pengantar.pdf'; ?>" target="_blank">Unduh Format</a>
						*/ ?>
					</div>
					<div class="col-6">
						<span class="upload_status doc_kebutuhan">
							<?php if($data->doc_kebutuhan){ ?>
								<i class="fa fa-check"></i> Dokumen tersedia
								</span>&nbsp;
								
								<a class="btn btn-xs btn-info" href="<?php echo $data->doc_kebutuhan; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
								
							<?php }else{ ?>
								<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
								<br />
							<?php } ?>
						</span>
						<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/kebutuhan/'); ?>" data-type="doc_kebutuhan" data-title="Upload Scan Surat Penetapan Kebutuhan atau rekomendasi dari Dit. Guru Paud Dikmas atau Kemenpan RB">Upload</button>
						
					</div>
				</div>
				
				
				
				
				
				<div class="form-group row">
					<div class="col-12 text-alert">Dokumen diunggah dalam bentuk PDF, max 2MB</div>
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

	<div id="dialog" class="thedialog" title="Basic dialog" role="dialog">
		<form id="upload" method="post" action="<?php echo site_url('upload_process/desain/'); ?>" enctype="multipart/form-data">
		<div id="drop">
		Drop Here

		<a>Browse</a>
		<input type="file" name="upl" multiple />
		</div>

		<ul>
		<!-- The file uploads will be shown here -->
		</ul>

		</form>
	</div>
	
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

	<script src="plugins/knob/jquery.knob.js"></script>
	<script src="plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="includes/js/jquery.ui.widget.js"></script>
	<script src="includes/js/jquery.fileupload.js"></script>
	
	<script>
	$(function(){
		
		$('#dialog').dialog({
			autoOpen: false
		});
		
		$('#data-detail').on('click', '.remove-document', function(){
			var url = $(this).data('action');
			var type = $(this).data('type');
			$.ajax({
				url: url,
				dataType: 'json',
				type: 'get',
				error: function(){
					alert('terjadi kesalahan, silahkan ulangi beberapa saat lagi');
				},
				success: function(response){
					if(response.status){
						alert('dokumen berhasil dihapus');
						$('.upload_status.'+type).html('<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span><br />');
					}else{
						alert('dokumen gagal dihapus');
					}
				}
			});
			return false;
		});
		
		$('.btn-upload').click(function(){
			var title = $(this).data('title');
			var action = $(this).data('action');
			var type = $(this).data('type');
			$('#upload').attr('action', action);
			$('#upload').data('type', type);
			$('#dialog').dialog({
				title: title
			}).dialog('open');
			return false;
		});
		
	});

	/* Upload Script */
	$(function(){

		var ul = $('#upload ul');

		$('#drop a').click(function(){
			// Simulate a click on the file input button
			// to show the file browser dialog
			$(this).parent().find('input').click();
		});

		// Initialize the jQuery File Upload plugin
		$('#upload').fileupload({

			// This element will accept file drag/drop uploading
			dropZone: $('#drop'),

			// This function is called when a file is added to the queue;
			// either via the browse button, or via drag/drop:
			add: function (e, data) {
				var tpl = $('<li class="working"><input type="text" value="0" data-width="48" data-height="48"'+
					' data-fgColor="#0788a5" data-readOnly="1" data-bgColor="#3e4043" /><p></p><span></span></li>');

				// Append the file name and file size
				tpl.find('p').text(data.files[0].name)
							 .append('<i>' + formatFileSize(data.files[0].size) + '</i>');

				// Add the HTML to the UL element
				data.context = tpl.appendTo(ul);

				// Initialize the knob plugin
				tpl.find('input').knob();

				// Listen for clicks on the cancel icon
				tpl.find('span').click(function(){

					if(tpl.hasClass('working')){
						jqXHR.abort();
					}

					tpl.fadeOut(function(){
						tpl.remove();
					});

				});

				// Automatically upload the file once it is added to the queue
				var jqXHR = data.submit();
			},

			progress: function(e, data){

				// Calculate the completion percentage of the upload
				var progress = parseInt(data.loaded / data.total * 100, 10);

				// Update the hidden input field and trigger a change
				// so that the jQuery knob plugin knows to update the dial
				data.context.find('input').val(progress).change();

				if(progress == 100){
					data.context.removeClass('working');
				}
			},

			fail:function(e, data){
				// Something has gone wrong!
				data.context.addClass('error');
			},
			
			done: function (e, data) {
				$('#dialog').dialog('close');
				var type = $("#upload").data('type');
				//var result = $.parseJSON(data.result);
				var result = $.parseJSON(data.result);
				$('.upload_status.'+type).html('<i class="fa fa-check"></i> Dokumen tersedia</span>&nbsp;<a class="btn btn-xs btn-info" href="assets/docs/../'+result.path+'" target="_blank"><span class="fa fa-download"></span></a><br />');
				$('#upload ul li').remove();
			}

		});


		// Prevent the default action when a file is dropped on the window
		$(document).on('drop dragover', function (e) {
			e.preventDefault();
		});

		// Helper function that formats the file sizes
		function formatFileSize(bytes) {
			if (typeof bytes !== 'number') {
				return '';
			}

			if (bytes >= 1000000000) {
				return (bytes / 1000000000).toFixed(2) + ' GB';
			}

			if (bytes >= 1000000) {
				return (bytes / 1000000).toFixed(2) + ' MB';
			}

			return (bytes / 1000).toFixed(2) + ' KB';
		}

	});
	</script>

  </body>
</html>