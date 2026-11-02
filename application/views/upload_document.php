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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="plugins/select2/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/jqueryui/jquery-ui.min.css">
	<link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.structure.css">
	<link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.theme.css">
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
                                
                                <h4>Unggah Berkas</h4>
								<?php /*
                                <form class="mt-5 mb-5 login-input" method="post" action="">
                                    <div class="form-group form-row">
										<strong>Scan PAK Terakhir :</strong><br />
                                        <input type="file" name="doc_pak" class="form-control-file">
										<?php echo form_error('doc_pak') ? '<span class="text-danger"><br />'.form_error('doc_pak').'</span>' : ''; ?>
                                    </div>
									<div class="form-group">
										<strong>Scan SK Pengangkatan Penilik/Pamong Belajar :</strong><br />
                                        <input type="file" name="doc_sk_pengangkatan" class="form-control-file">
										<?php echo form_error('doc_sk_pengangkatan') ? '<span class="text-danger"><br />'.form_error('doc_sk_pengangkatan').'</span>' : ''; ?>
                                    </div>
									<div class="form-group">
										<strong>Scan SK Kenaikan Pangkat IIIb, IIId atau IVc :</strong><br />
                                        <input type="file" name="doc_sk_terakhir" class="form-control-file">
										<?php echo form_error('doc_sk_terakhir') ? '<span class="text-danger"><br />'.form_error('doc_sk_terakhir').'</span>' : ''; ?>
                                    </div>
                                    <div class="form-group">
										<strong>Scan Surat Pengantar :</strong><br />
                                        <input type="file" name="doc_pengantar" class="form-control-file">
										<?php echo form_error('doc_pengantar') ? '<span class="text-danger"><br />'.form_error('doc_pengantar').'</span>' : ''; ?>
                                    </div>
                                    <button class="btn login-form__btn submit w-100" type="submit" name="form-submit">Simpan</button>
                                </form>
								*/ ?>
								<?php /*
								<div class="form-group row">
									<div class="col-6">
										<label for="inputName">Scan PAK terakhir</label>
									</div>
									<div class="col-6">
										<span class="upload_status pak">
											<?php if($data->doc_pak){ ?>
												<i class="fa fa-check"></i> Dokumen tersedia &nbsp;<a class="btn btn-xs btn-info" href="<?php echo $data->doc_pak; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
												
											<?php }else{ ?>
												<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
												<br />
											<?php } ?>
										</span>
										<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/pak/'); ?>" data-type="pak" data-title="Upload Scan PAK terakhir">Upload</button>
										
									</div>
								</div>
								*/ ?>
								<div class="form-group row">
									<div class="col-6">
										<label for="inputName">Scan PAK terakhir</label>
									</div>
									<div class="col-6">
										<span class="upload_status sk_pengangkatan">
											<?php if($data->doc_sk_pengangkatan){ ?>
												<i class="fa fa-check"></i> Dokumen tersedia &nbsp;
												<a class="btn btn-xs btn-info" href="<?php echo $data->doc_sk_pengangkatan; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
												
											<?php }else{ ?>
												<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
												<br />
											<?php } ?>
										</span>
										<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/sk_pengangkatan/'); ?>" data-type="sk_pengangkatan" data-title="Upload Scan PAK terakhir">Upload</button>
										
									</div>
								</div>
								<?php /*
								<div class="form-group row">
									<div class="col-6">
										<label for="inputName">Scan SK Kenaikan Pangkat IIIb, IIId atau IVc</label>
									</div>
									<div class="col-6">
										<span class="upload_status sk_terakhir">
											<?php if($data->doc_sk_terakhir){ ?>
												<i class="fa fa-check"></i> Dokumen tersedia
												&nbsp;
												<a class="btn btn-xs btn-info" href="<?php echo $data->doc_sk_terakhir; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
												
											<?php }else{ ?>
												<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
												<br />
											<?php } ?>
										</span>
										<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/sk_terakhir/'); ?>" data-type="sk_terakhir" data-title="Upload SK Kenaikan Pangkat IIIb, IIIc atau IVd">Upload</button>
										
									</div>
								</div>
								*/ ?>
								<div class="form-group row">
									<div class="col-6">
										<label for="inputName">Scan Surat Pengantar</label>
										<br /><a href="<?php echo base_url().'assets/contoh-surat-pengantar.pdf'; ?>" target="_blank">Unduh Format</a>
									</div>
									<div class="col-6">
										<span class="upload_status pengantar">
											<?php if($data->doc_pengantar){ ?>
												<i class="fa fa-check"></i> Dokumen tersedia
												</span>&nbsp;
												
												<a class="btn btn-xs btn-info" href="<?php echo $data->doc_pengantar; ?>" target="_blank" title="unduh dokumen"><span class="fa fa-download"></span></a>
												
											<?php }else{ ?>
												<span class="label label-danger"><i class="fa fa-close"></i>&nbsp;Tidak Ada Dokumen</span>
												<br />
											<?php } ?>
										</span>
										<br /><button class="btn btn-primary btn-upload" data-action="<?php echo site_url('upload_process/pengantar/'); ?>" data-type="pengantar" data-title="Upload Surat Pengantar">Upload</button>
										
									</div>
								</div>
								<form class="mt-5 mb-5 login-input" method="post" action="">
								<button class="btn login-form__btn submit w-100" type="submit" name="form-submit">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	<?php /* Upload Desain */ ?>
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
	<!-- jQuery Knob Chart -->
	<script src="plugins/knob/jquery.knob.js"></script>
	<script src="plugins/jQueryUI/jquery-ui.min.js"></script>
	<script src="includes/js/jquery.ui.widget.js"></script>
	<script src="includes/js/jquery.fileupload.js"></script>
	<script>
	$(document).ready(function(){
		$('.select2').select2();
	});
	
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
				var result = $.parseJSON(data.result);
				$('.upload_status.'+type).html('<i class="fa fa-check"></i> Dokumen tersedia</span>&nbsp;<a class="btn btn-xs btn-info" href="'+result.path+'" target="_blank"><span class="fa fa-download"></span></a><br />');
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





