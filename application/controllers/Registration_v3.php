<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function __construct()
	{
		parent::__construct();
	}
	
	public function password()
	{
		echo date('Y-m-d H:i');
	}
	
	public function index()
	{
		
		$user = $this->session->userdata('user');
		
		$output = array();
		$output['user'] = $user;
		$output['PAGE_TITLE'] = 'Beranda';
		$output['message_error'] = false;
		
		$this->load->view('home', $output);
	}
	
	public function login()
	{
		
		$user = $this->session->userdata('user');
		if($user){
			redirect(site_url('switcher'));
		}
		
		$output = array();
		$output['user'] = $user;
		$output['PAGE_TITLE'] = 'Login';
		$output['message_error'] = false;
		if($this->input->post('username')){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			if ($this->form_validation->run() != FALSE){
				$username = $this->input->post('username');
				$password = $this->mytools->encrypt_password($this->input->post('password'));
				$user = $this->peserta_model->check_login($username, $password);
				if(!$user){
					$output['message_error'] = 'Username dan Password tidak cocok';
				}else{
					$this->logging_in($user);
					if(!$user->registered){
						redirect(site_url('switcher'));
					}else{
						redirect(site_url('registration/done'));
					}
					
				}
			}
		}
		$this->load->view('login_new', $output);
	}
	
	public function change_password(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);
		$this->user = $user_detail;
		$output['PAGE_TITLE'] = 'Ubah Password';
		$output['user'] = $user_detail;
		$output['success'] = false;
		
		if($this->input->post('new_password')){
			$this->form_validation->set_message('required', '{field} harap diisi');
			$this->form_validation->set_message('pengecekan_password', 'Password yang anda masukkan salah');
			$this->form_validation->set_rules('password', 'Password Lama', 'trim|required|callback_pengecekan_password');
			$this->form_validation->set_rules('new_password', 'Password Baru', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm-password', 'Konfirmasi Password', 'trim|required|min_length[8]|matches[new_password]', array('matches'=> 'Komfirmasi Kata Sandi tidak sama'));
			if ($this->form_validation->run() != FALSE){
				$new_password = $this->input->post('new_password');
				$password_hash = $this->mytools->encrypt_password($new_password);
				$update = $this->peserta_model->edit($user_detail->id, array('password'=>$password_hash));
				if(!$update){
					
					$output['message_error'] = 'Terjadi kesalahan, silakan coba kembali';
				}else{
					$output['success'] = true;
				}
			}
		}
		
		$this->load->view('change_password', $output);
	}
	
	public function switcher(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);
		if($user_detail->status_approval == 'unset' && $user_detail->registered == 0){
			//if(!$this->session->has_userdata('testing')){
				if(time() > $this->config->item('BATAS_PENDAFTARAN')){
					redirect(site_url('selesai'));
					die();
				}
			//}
			
			switch($user_detail->step){
				case 'document_section' : redirect(site_url('upload_document')); break;
				case 'employee_section' : redirect(site_url('form_data')); break;
				case 'email_verification' : redirect(site_url('email_verification')); break;
				default: redirect(site_url('done')); break;
			}
		}else{
			redirect(site_url('done'));
		}
	}
	
	public function change_data(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);
		if($user_detail->status_approval == 'unset' && $user_detail->registered == 1){
			$user = $this->peserta_model->edit($user->id, array(
				'step' => 'employee_section',
				'registered' => 0
			));
		}else{
			
		}
		redirect(site_url('switcher'));
	}
	
	public function form_data(){
		
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$data = $this->peserta_model->get_row($user->id);
		if($data->step != 'employee_section'){
			redirect(site_url('switcher'));
		}
		$output['PAGE_TITLE'] = "Form Data Kepegawaian";
		$output['user'] = $user;
		$output['data'] = $this->peserta_model->get_row($user->id, true);
		if($this->input->post() && $this->input->post('checklist') == '1'){
			$this->form_validation->set_message('required', 'Silakan periksa dan checklist apabila data anda sudah sesuai');
			$this->form_validation->set_message('min_length', '{field} minimal terdiri dari {param} karakter');
			$this->form_validation->set_message('valid_email', 'Surel {field} tidak valid');
			$this->form_validation->set_message('numeric', '{field} hanya bisa diisi dengan angka');
			$this->form_validation->set_message('is_unique', '{field} sudah digunakan');
			$this->form_validation->set_message('is_unique', '{field} sudah digunakan');
			$this->form_validation->set_rules('checklist', 'Periksa', 'required');
			if($data->tipe_jabfung == 'pamong_belajar'){
				$this->form_validation->set_rules('tingkat_id', 'Jabatan', 'required|numeric');
				$this->form_validation->set_rules('golongan_id', 'Golondang', 'required|numeric');
				$this->form_validation->set_rules('tmt_golongan', 'TMT Golongan', 'required');
			}
			/*
			$this->form_validation->set_rules('tingkat_id', 'Jabatan', 'required|numeric');
			$this->form_validation->set_rules('golongan_id', 'Golondang', 'required|numeric');
			$this->form_validation->set_rules('instansi_id', 'Instansi', 'required');
			$this->form_validation->set_rules('tmt_golongan', 'TMT Golongan', 'required');
			$this->form_validation->set_rules('handphone', 'No Handphone', 'required|numeric');
			*/
			if ($this->form_validation->run() != FALSE){
				$tingkat_id = $this->input->post('tingkat_id');
				$golongan_id = $this->input->post('golongan_id');
				$instansi_id = $this->input->post('instansi_id');
				$tmt_golongan = date('Y-m-d', strtotime($this->input->post('tmt_golongan')));
				$handphone = $this->input->post('handphone');
				/*
				$user = $this->peserta_model->edit($user->id, array(
					//'tingkat_id'=>$tingkat_id,
					//'golongan_id'=>$golongan_id,
					//'instansi_id'=>$instansi_id,
					//'tmt_golongan'=>$tmt_golongan,
					//'handphone' => $handphone,
					'step' => 'document_section'
				));
				*/
				$user = $this->peserta_model->edit($user->id, array(
					'tingkat_id'=>$tingkat_id,
					'golongan_id'=>$golongan_id,
					'tmt_golongan'=>$tmt_golongan,
					'instansi_id'=>$instansi_id,
					'step' => 'document_section'
				));
				
				if(!$user){
					$output['message_error'] = 'Terjadi kesalahan, silakan coba kembali';
				}else{
					redirect(site_url('switcher'));
				}
			}
			$output['data'] = $this->input->post();
			//$user = $this->peserta_model->edit($user->id, array('step' => 'document_section'));
			redirect(site_url('registration/upload_document'));
		}
		$output['golongan'] = $this->golongan_model->get_all();
		$output['tingkat'] = $this->tingkat_model->get_all();
		$output['instansi'] = $this->instansi_model->get_nodes();
		/*
		if($this->input->post()){
			$output['data'] = $this->input->post();
		}else{
			$output['data'] = $data;
		}
		*/
		$this->load->view('form_data_api', $output);
	}
	
	public function upload_document(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$data = $this->peserta_model->get_row($user->id);
		if($data->step != 'document_section'){
			redirect(site_url('switcher'));
		}
		if($this->input->post()){
			if($data->doc_sk_terakhir != '' && $data->doc_pengantar != ''){
				$user = $this->peserta_model->edit($user->id, array('registered' => 1, 'step' => 'done'));
				redirect(site_url('switcher'));
			}
		}
		$output['PAGE_TITLE'] = "Unggah Berkas";
		$output['user'] = $user;
		$output['data'] = $data;
		$output['inputan'] = $this->input->post();
		$this->load->view('upload_document_new', $output);
	}
	
	public function upload_process($type = false)
	{
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$output['data'] = $this->peserta_model->get_row($user->id);
		$id = $user->id;
		if(!is_object($output['data'])){
			die();
		}
		
		$type_array = array('pak', 'sk_pengangkatan', 'sk_terakhir', 'pengantar');
		if(!in_array($type, $type_array)){
			die();
		}
		
		$year = date('Y');
		$month = date('m');
		$date = date('d');
		
		$allowed = array('doc','docx','pdf');

		if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

			$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);
			$baseUploadPath = "/var/www/html/assets/docs/";
			
			if(!is_dir($baseUploadPath.$year)){
				mkdir($baseUploadPath.$year);
			}
			if(!is_dir($baseUploadPath.$year.'/'.$month)){
				mkdir($baseUploadPath.$year.'/'.$month);
			}
			if(!is_dir($baseUploadPath.$year.'/'.$month.'/'.$date)){
				mkdir($baseUploadPath.$year.'/'.$month.'/'.$date);
			}

			if(!in_array(strtolower($extension), $allowed)){
				echo '{"status":"error"}';
				exit;
			}
			$time = time();
			$filename = $id .$time. '_' . $type . '.' . $extension;
			$fileLoc = '../assets/docs/'.$year.'/'.$month.'/'.$date.'/'.$filename;
			$path = $baseUploadPath.$year.'/'.$month.'/'.$date.'/'.$filename;
			$removeLink = site_url('/remove_document/'.$type.'/'.$id);
			if(move_uploaded_file($_FILES['upl']['tmp_name'], $path)){
				
				$data['doc_' . $type] = $fileLoc;
				$insert_id = $this->peserta_model->edit($id, $data);
				
				echo '{"status":"success", "path":"'.$fileLoc.'", "removeLink":"'.$removeLink.'","type":"'.$type.'"}';
				exit;
			}
			
			
			
		}

		echo '{"status":"error"}';
		exit;
	}
	
	public function done(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);
		if($user_detail->step != 'done'){
			redirect(site_url('switcher'));
		}
		$output['user'] = $user_detail;
		$output['PAGE_TITLE'] = "Pendaftaran Berhasil";
		$this->load->view('done_new', $output);
	}
	
	public function selesai(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);

		$output['user'] = $user_detail;
		$output['PAGE_TITLE'] = "Pendaftaran sudah ditutup";
		$this->load->view('register_new', $output);
	}
	
	public function done2(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		$user_detail = $this->peserta_model->get_row($user->id);
		if($user_detail->step != 'done'){
			//redirect(site_url('switcher'));
		}
		$output['user'] = $user_detail;
		$this->load->view('done2', $output);
	}
	
	public function register(){
		die();
		$user = $this->session->userdata('user');
		if($user){
			redirect(site_url('switcher'));
		}
		/*
		if(time() > WAKTU_TUTUP){
			redirect(site_url('home'));
		}
		*/
		
		$output = array();
		$output['user'] = $user;
		$output['PAGE_TITLE'] = 'Pendaftaran';
		$output['message_error'] = false;
		if($this->input->post('username')){
			$this->form_validation->set_message('required', '{field} harap diisi');
			$this->form_validation->set_message('min_length', '{field} minimal terdiri dari {param} karakter');
			$this->form_validation->set_message('valid_email', 'Surel {field} tidak valid');
			$this->form_validation->set_message('numeric', '{field} hanya bisa diisi dengan angka');
			$this->form_validation->set_message('is_unique', '{field} sudah digunakan');
			$this->form_validation->set_message('is_unique', '{field} sudah digunakan');
			$this->form_validation->set_rules('name', 'Nama', 'required');
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[peserta.nip]|numeric');
			$this->form_validation->set_rules('username', 'Surel', 'trim|required|valid_email|is_unique[peserta.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm-password', 'Password', 'trim|required|min_length[8]|matches[password]', array('matches'=> 'Komfirmasi Kata Sandi tidak sama'));
			if ($this->form_validation->run() != FALSE){
				$name = $this->input->post('name');
				$username = $this->input->post('username');
				$nip = $this->input->post('nip');
				$password = $this->mytools->encrypt_password($this->input->post('password'));
				$user = $this->peserta_model->add(array(
					'nama'=>$name,
					'username'=>$username,
					'password'=>$password,
					'nip'=>$nip,
					'email_verification_code' => base64_encode(base64_encode($username.'-'.date('dFyHis'))),
					'email_verification_created' => date('Y-m-d H:i:s'),
					'step' => 'employee_section'
				));
				if(!$user){
					$output['message_error'] = 'Terjadi kesalahan, silakan coba kembali';
				}else{
					$this->logging_in($user);
					//$this->send_verification_mail($user);
					redirect(site_url('form_data'));
				}
			}
		}
		$output['data'] = $this->input->post();
		$this->load->view('register_new', $output);
	}
	
	public function register_api(){
		$this->session->set_userdata('testing', true);
		$user = $this->session->userdata('user');
		if($user){
			redirect(site_url('switcher'));
		}
		
		if(time() > $this->config->item('BATAS_PENDAFTARAN')){
			redirect(site_url('selesai'));
			die();
		}
		
		
		$output = array();
		$output['user'] = $user;
		$output['PAGE_TITLE'] = 'Pendaftaran';
		$output['message_error'] = false;
		if($this->input->post('nip') && $this->input->post('tipe_jabfung')){
			$this->form_validation->set_message('required', '{field} harap diisi');
			$this->form_validation->set_message('min_length', '{field} minimal terdiri dari {param} karakter');
			$this->form_validation->set_message('valid_email', 'Surel {field} tidak valid');
			$this->form_validation->set_message('numeric', '{field} hanya bisa diisi dengan angka');
			$this->form_validation->set_message('is_unique', '{field} sudah digunakan');
			$this->form_validation->set_message('check_nip', 'Data tidak ditemukan di SIM Tendik. Silakan melakukan pembaruan data di SIM Tendik.');
			$this->form_validation->set_message('check_nip_penilik', 'Data tidak ditemukan di data Penilik pada SIM Tendik. Silakan melakukan pembaruan data di SIM Tendik.');
			$this->form_validation->set_message('check_nip_pamong', 'Data tidak ditemukan di data Pamong Belajar pada dapodik. Silakan melakukan pembaruan data di Dapodik.');
			
			//$this->form_validation->set_rules('name', 'Nama', 'required');
			
			$this->form_validation->set_rules('tipe_jabfung', 'Jabatan Fungsional', 'required|in_list[pamong_belajar,penilik]');
			if($this->input->post('tipe_jabfung') == 'penilik'){
				$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[peserta.nip]|callback_check_nip_penilik|numeric');
			}else if($this->input->post('tipe_jabfung') == 'pamong_belajar'){
				$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[peserta.nip]|callback_check_nip_pamong|numeric');
			}else{
				$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[peserta.nip]|callback_check_nip|numeric');
			}
			//$this->form_validation->set_rules('username', 'Surel', 'trim|required|valid_email|is_unique[peserta.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('confirm-password', 'Password', 'trim|required|min_length[8]|matches[password]', array('matches'=> 'Komfirmasi Kata Sandi tidak sama'));
			if ($this->form_validation->run() != FALSE){
				//$name = $this->input->post('name');
				//$username = $this->input->post('username');
				
				$nip = $this->input->post('nip');
				$password = $this->mytools->encrypt_password($this->input->post('password'));
				
				if($this->input->post('tipe_jabfung') == 'penilik'){
					$tipe_jabfung = 'penilik';
					$tendik_data = $this->get_tendik_data_penilik($nip);
				}else if($this->input->post('tipe_jabfung') == 'pamong_belajar'){
					$tendik_data = $this->get_tendik_data_pamong($nip);
					$tipe_jabfung = 'pamong_belajar';
				}
				/*
				$tendik_data = $this->get_tendik_data_penilik($nip);
				$tipe_jabfung = 'penilik';
				if($tendik_data['status'] != 'OK'){
					$tendik_data = $this->get_tendik_data_pamong($nip);
					$tipe_jabfung = 'pamong_belajar';
				}
				*/
				
				$golongan_array = $this->config->item('ID_GOLONGAN');
				$jabatan_array = $this->config->item('ID_JABATAN');
				
				$instansi_data = $this->instansi_model->get_by_tendik_id($tendik_data['data']['lembaga_id']);
				if(!$instansi_data){
					$instansi_insert_data = array(
						'parent_id' => 0,
						'lembaga_id' => $tendik_data['data']['lembaga_id'],
						'name' => $tendik_data['data']['nama_lembaga']
					);
					
					$instansi_id = $this->instansi_model->add($instansi_insert_data);
				}else{
					$instansi_id = $instansi_data->id;
				}
				
				$user_insert_data = array(
					'nama'=>$tendik_data['data']['nama'],
					'username'=>$nip,
					'password'=>$password,
					'nip'=>$nip,
					'email'=>$tendik_data['data']['email'],
					'email_verification_code' => base64_encode(base64_encode($username.'-'.date('dFyHis'))),
					'email_verification_created' => date('Y-m-d H:i:s'),
					'tipe_jabfung' => $tipe_jabfung,
					'tingkat_id'=>$jabatan_array[$tendik_data['data']['jabatan']],
					
					'golongan_id'=>$golongan_array[$tendik_data['data']['golongan']],
					'instansi_id'=>$instansi_id,
					'tmt_golongan'=>$tendik_data['data']['tmt_golongan'],
					'handphone' => $tendik_data['data']['no_hp'],
					
					'step' => 'employee_section'
				);
				
				if($tendik_data['data']['jabatan'] == null){
					if($tipe_jabfung == 'pamong_belajar'){
						$user_insert_data['tingkat_id'] = '11';
					}else{
						$user_insert_data['tingkat_id'] = '21';
					}
				}
				
				$user = $this->peserta_model->add($user_insert_data);
				if(!$user){
					$output['message_error'] = 'Terjadi kesalahan, silakan coba kembali';
				}else{
					$this->logging_in($user);
					//$this->send_verification_mail($user);
					redirect(site_url('form_data'));
				}
			}
		}
		$output['data'] = $this->input->post();
		$this->load->view('register_api', $output);
	}
	
	public function email_test(){
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.kemdikbud.go.id';
		$config['smtp_port'] = '465';
		$config['smtp_crypto'] = 'ssl';
		$config['smtp_user'] = 'inpassing@kemdikbud.go.id';
		$config['smtp_pass'] = 'inpassing#2d1kbud';
		$config['mailtype'] = 'html';
		$config['smtp_timeout'] = '300';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		
		$this->email->from('inpassing@kemdikbud.go.id', 'Admin Ujikom Penilik dan Pamong Belajar');
		$this->email->to('deny.avianto@kemdikbud.go.id');

		$this->email->subject('Verifikasi Email');
		//$link = site_url('account_activate/'.$user->email_verification_code);
		$this->email->message('Terima Kasih Telah melakukan pendaftaran akun Penilik dan Pamong Belajar.<br />Silakan klik link di bawah ini ');

		$this->email->send();
		
	}
	
	private function send_verification_mail($user){
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'mail.kemdikbud.go.id';
		$config['smtp_port'] = '465';
		$config['smtp_crypto'] = 'ssl';
		$config['smtp_user'] = 'inpassing@kemdikbud.go.id';
		$config['smtp_pass'] = 'inpassing#2d1kbud';
		$config['mailtype'] = 'html';
		$config['smtp_timeout'] = '300';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		
		$this->email->from('inpassing@kemdikbud.go.id', 'Admin Ujikom Penilik dan Pamong Belajar');
		$this->email->to($user->username);

		$this->email->subject('Verifikasi Email');
		$link = site_url('account_activate/'.$user->email_verification_code);
		$this->email->message('Terima Kasih Telah melakukan pendaftaran akun Penilik dan Pamong Belajar.<br />Silakan klik link di bawah ini untuk mengaktifkan akun anda<br /><a href="'.$link.'">Atifkan</a>');

		$this->email->send();
		
	}
	
	public function email_verification(){
		$user = $this->session->userdata('user');
		if(!$user){
			redirect(site_url('login'));
		}
		var_dump($this->session->userdata());
		die();
	}
	
	private function logging_in($user){
		$data = array(
			'user_id' => $user->id,
			'user' => $user,
			'tahun_anggaran' => date('Y')
		);
		
		$this->session->set_userdata($data);
	}
	
	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user');
		redirect(site_url('login'));
	}
	
	public function generate(){
		$this->load->model('generate_model');
		$data = $this->generate_model->get_jenis_barang();
		foreach($data as $d){
			echo $d->id . '<br />';
			$this->generate_model->insert($d);
		}
	}
	
	public function testpdf(){
		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		// set font
		$pdf->SetFont('dejavusans', '', 10);

		// add a page
		$pdf->AddPage();

		// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
		// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

		// create some HTML content
		$html = $this->load->view('testpdf', array(), true);
		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		
		$pdf->Output('example_006.pdf', 'I');
		
	}
	
	public function pengecekan_password($password){
		if($this->mytools->encrypt_password($password) == $this->user->password){
			return true;
		}else{
			return false;
		}
	}
	
	private function get_tendik_data_penilik($nip){
		$curl = curl_init();
		
		$url = "https://sim.tendik.kemdikbud.go.id/api/ukkj/penilik/".$nip;
		curl_setopt($curl, CURLOPT_URL, $url);
		
		$headers = array(
			'Authorization: ' . $this->config->item('API_TENDIK_KEY'),
			'Content-Type: application/json'
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		return json_decode($response, true);
	}
	
	private function get_tendik_data_pamong($nip){
		$curl = curl_init();
		
		$url = "https://sim.tendik.kemdikbud.go.id/api/ukkj/pamong/".$nip;
		curl_setopt($curl, CURLOPT_URL, $url);
		
		$headers = array(
			'Authorization: ' . $this->config->item('API_TENDIK_KEY'),
			'Content-Type: application/json'
		);
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
		
		$response = curl_exec($curl);
		
		curl_close($curl);
		
		return json_decode($response, true);
	}
	
	public function check_nip($nip){
		$data = $this->get_tendik_data_penilik($nip);
		//var_dump($data['status']);
		if($data['status'] == 'OK'){
			return true;
		}else{
			$data = $this->get_tendik_data_pamong($nip);
			if($data['status'] == 'OK'){
				return true;
			}else{
				return false;
			}
		}
	}
	
	public function check_nip_penilik($nip){
		$data = $this->get_tendik_data_penilik($nip);
		if($data['status'] == 'OK'){
			return true;
		}else{
			return false;
		}
	}
	
	public function check_nip_pamong($nip){
		$data = $this->get_tendik_data_pamong($nip);
		if($data['status'] == 'OK'){
			return true;
		}else{
			return false;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */