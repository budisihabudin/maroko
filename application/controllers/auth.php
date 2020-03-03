<?php 

class Auth extends CI_controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->library('form_validation');
		
	}

	public function index()
	{
		/*if ($this->session->userdata('username')) {
			redirect('auth'); 
		}*/

		$this->form_validation->set_message('required','kolom {field} harus diisi');
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');

		if ($this->form_validation->run() ==false )
		 {
			$data['title'] = ' | Login';
			$this->load->view('templates/header_login',$data);
			$this->load->view('frontend/auth/login');
			$this->load->view('templates/footer_login');
		}
		else
		{
			
			$this->_login();
		}
		
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//query
		$pengguna = $this->db->get_where('tb_data_anggota', ['username'=> $username])->row_array();
		//untuk narik data sesuai data user login
		
		if ($pengguna) 
		{

			//jika usernya aktif
			if ($pengguna['status_akun'] ==1) 
			{
				if($pengguna['password']==$password && $pengguna['username']==$username)
				{
					$data = ['username'=> $pengguna['username'],
							 'status_pengguna'=> $pengguna['status_pengguna'],
							 'id_anggota'	=> $pengguna['id_anggota']
							];
							
							$this->session->set_userdata( $data );
							
							if ($pengguna['status_pengguna'] == 1) 
							{
								/*print_r($pengguna);
								die();*/
								redirect('admin');

							}
							else if ($pengguna['status_pengguna'] == 2)
							{
								redirect('user','refresh');
							}
							else if ($pengguna['status_pengguna'] == 3)
							{
								$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Akun Belum Diaktifkan</div>');
								redirect('auth','refresh');
							}

				}
				else
				{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Anda Salah</div>');
				redirect('auth');				
				}
			}
			else
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username blum diaktifkan</div>');
				redirect('auth');		
			}
		}
		else
		{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Anda blum terdaftar daftar pengguna</div>');
						redirect('auth');
		}
	}

	public function registrasi()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim',[
			'required'=>'Kolom {field} Harus Diisi :('
		]);
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[tb_data_anggota.username]',
			[
				'is_unique'=> 'Username sudah terdaftar, coba masukkan Username baru.',
				'required'=> 'Kolom {field} Harus Diisi :(']);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'required'=>'Kolom {field} Harus Diisi :(',
			'matches'=> 'Password Tidak Sama',
			'min_length'=> 'password terlalu pendek']);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]',['required'=>'Kolom Konfirmasi {field} Harus Diisi']);

	//ini untuk mengarahkan benar tidaknya	
		if ($this->form_validation->run()==false) {
			
		$data['title'] = ' | Registrasi';
		$this->load->view('templates/header_login',$data);
		$this->load->view('frontend/auth/registrasi');
		$this->load->view('templates/footer_login');
		}
		else{
			$data = [
						//true untuk menghindari xxs chros
						'nama'=> htmlspecialchars($this->input->post('nama', true)),
						'username'=> htmlspecialchars($this->input->post('username', true)),
						'password'=>$this->input->post('password1'),
						'status_pengguna' =>3,
						// 'foto'=>'',
						'status_akun'=>0,
						];

						$this->db->insert('tb_data_anggota', $data);
						

						$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">berhasil regis, silahkan masuk</div>');
						redirect('auth');
		}

	}

	

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('status_pengguna');

		$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">berhasil keluar </div>');
		redirect('auth');

	}
}

 ?>