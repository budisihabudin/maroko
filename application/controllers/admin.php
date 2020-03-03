<?php 

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('status_pengguna') !="1") {
			redirect('auth','refresh');
		}
		$this->load->model('model_admin');
		$this->load->library('form_validation');
		// $this->load->helper('my');
	}
	public function index()
	{
		$title['title'] = ' | Dashboard';
		$data['jumlah_data_kategori_artikel'] = $this->model_admin->tampilka()->num_rows();
		$data['jumlah_data_anggota'] = $this->model_admin->tampila()->num_rows();
		$data['jumlah_data_pendidikan'] = $this->model_admin->tampild()->num_rows();
		$data['jumlah_data_dokumen'] = $this->model_admin->tampildo()->num_rows();
		$data['jumlah_data_orgtua'] = $this->model_admin->tampilo()->num_rows();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/admin/home',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');
	}

	/*Create*/
	/*data kategori artikel*/
	public function tambah_data_kategori()
	{
		$title['title'] = ' | Data Kategori Artikel';
		// $data['tb_artikel'] = $this->model_admin->tampil_dataartikel();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/tambah_kategori_artikel'/*,$data*/);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function simpan_data_kategori_artikel()
	{

		$this->form_validation->set_message('required','Kolom {field} Harus Terisi');
		$this->form_validation->set_rules('kategori', 'KATEGORI ARTIKEL', 'trim|required');
		if ($this->form_validation->run() ==  FALSE) {
			$title['title'] = ' | Data Kategori Artikel';
			// $data['tb_artikel'] = $this->model_admin->tampil_dataartikel();
			$this->load->view('templates/header_dashboard',$title);
			$this->load->view('backend/berkas/tambah_kategori_artikel'/*,$data*/);
			$this->load->view('backend/admin/sidebar');
			$this->load->view('templates/footer_dashboard');
		} 
		else 
		{
			$this->model_admin->masuk_datakategoriartikel();
			redirect('admin/lihat_kategori_artikel','refresh');
		}	
	}
	/*data artikel*/
	public function tambah_data_artikel()
	{
		$title['title'] = ' | Data Artikel';
		// $data['tb_artikel'] = $this->model_admin->tampil_dataartikel();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/tambah_data_artikel'/*,$data*/);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function simpan_data_artikel()
	{
		$judul = $this->input->post('judul');
		$isi_teks = $this->input->post('isi_teks');
		$waktu = $this->input->post('waktu');
		$id_anggota = $this->input->post('id_anggota');
		$id_kategori_artikel = $this->input->post('id_kategori_artikel');
		$foto = $_FILES['foto'] ['name'];
		/*$this->form_validation->set_rules('id_anggota', 'Pendaftar', "required|is_unique[tb_data_anggota.id_anggota]", array('is_unique' => 'Anda tidak bisa mengupload data dua kali'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('upload/index','refresh');
		} else {*/
			if ($foto )
				{
					$config['upload_path']='./upload/artikel';
					$config['allowed_types']='jpg|gif|png';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('foto')) 
					{
						echo "download gagal"; die();
						redirect('admin/lihat_data_artikel');
					}
					else
					{
						$artikel = $this->upload->data('file_name');
					}

						$data = array(
							
							'judul' =>$judul,
							'isi_teks' =>$isi_teks,
							'waktu' =>$waktu,
							'foto' =>$foto,
							'id_kategori_artikel' =>$id_kategori_artikel,
							'id_anggota' => $id_anggota
						);
						$this->model_admin->kirim_data($data, 'tb_artikel');
						 $this->session->set_flashdata("sukses","Terima Kasih Data Anda Sudah Terkirim :)");
						redirect('admin/lihat_data_artikel');

				}

	}
	/*data dokumen*/
	function simpan_upload()
	{
		$nik = $this->session->__ci_last_regenerate;
		$keterangan = $this->input->post('keterangan');
		$id_anggota = $this->input->post('id_anggota');
		$dokumen = $_FILES['dokumen'] ['name'];
		/*$this->form_validation->set_rules('id_anggota', 'Pendaftar', "required|is_unique[tb_data_anggota.id_anggota]", array('is_unique' => 'Anda tidak bisa mengupload data dua kali'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('upload/index','refresh');
		} else {*/
			if ($dokumen )
				{
					$config['upload_path']='./upload/dokumen';
					$config['allowed_types']='pdf';
					$config['encrypt_name']  = false;
					$config['file_name']     = $nik.'-'.$dokumen;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('dokumen')) 
					{
						echo "download gagal"; die();
						redirect('admin/lihat_data_dokumen');
					}
					else
					{
						$dokumen = $this->upload->data('file_name');
					}

						$data = array(
							
							'keterangan' =>$keterangan,
							'dokumen' =>$dokumen,
							'id_anggota' => $id_anggota
						);
						$this->model_admin->kirim_data($data, 'tb_dokumen');
						 $this->session->set_flashdata("sukses","Terima Kasih Data Anda Sudah Terkirim :)");
						redirect('admin/lihat_data_dokumen');

				}
		// }
					
	}
	/*data pengguna sistem*/
	public function tambah_pengguna_sistem(){
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
			
			$title['title'] = ' | Data Pengguna Sistem';
			$data['tb_data_anggota'] = $this->model_admin->tampil_datapenggunasistem();
			$this->load->view('templates/header_dashboard',$title);
			$this->load->view('backend/berkas/data_pengguna_sistem',$data);
			$this->load->view('backend/admin/sidebar');
			$this->load->view('templates/footer_dashboard');
		}
		else{
			$data = [
						'nama'=> htmlspecialchars($this->input->post('nama', true)),
						'username'=> htmlspecialchars($this->input->post('username', true)),
						'password'=>$this->input->post('password1'),
						'status_pengguna' =>4,
						'status_akun'=>1,
						];

						$this->db->insert('tb_data_anggota', $data);
						redirect('admin/lihat_pengguna_sistem');
		}

	}
	
	/*data daftar sekolah*/
	public function tambah_data_pendidikan()
	{
		$this->form_validation->set_message('required','Kolom {field} Harus Terisi');

		$this->form_validation->set_rules('pendidikan', 'NAMA DAFTAR SEKOLAH', 'trim|required');
		$this->form_validation->set_rules('fakultas', 'NAMA DAFTAR SEKOLAH', 'trim');
		$this->form_validation->set_rules('jurusan', 'NAMA DAFTAR SEKOLAH', 'trim');
		$this->form_validation->set_rules('kelas', 'NAMA DAFTAR SEKOLAH', 'trim');
		if ($this->form_validation->run() ==  FALSE) {
			/*$title['title'] = ' | Data Pendidikan';
			$this->load->view('templates/header_dashboard',$title);
			$this->load->view('backend/berkas/data_pendidikan');
			$this->load->view('backend/admin/sidebar');
			$this->load->view('templates/footer_dashboard');*/
			echo "error";
		} 
		else 
		{
			$this->model_admin->masuk_datapendidikan();
			redirect('admin/lihat_data_pendidikan','refresh');
		}	
	}
	/*data anggota*/
	public function tambah_anggota()
	{
		$this->form_validation->set_message('required','Kolom {field} Harus Terisi');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama', 'NAMA', 'trim|required');
		$this->form_validation->set_rules('alamat_ind', 'ALAMAT INDONESIA', 'trim|required');
		$this->form_validation->set_rules('alamat_mrk', 'ALAMAT MAROKO', 'trim|required');
		$this->form_validation->set_rules('jk', 'JENIS KELAMIN', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'NOMOR TELEPON', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'NAMA AYAH', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'NAMA IBU', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_ayah', 'PEKERJAAN AYAH', 'trim|required');
		$this->form_validation->set_rules('pekerjaan_ibu', 'PEKERJAAN IBU', 'trim|required');
		$this->form_validation->set_rules('id_pendidikan', 'PENDIDIKAN', 'trim|required');
		if ($this->form_validation->run() ==  FALSE) {
			$title['title'] = ' | Data Pengaturan Jam';
			$data['tb_data_anggota'] = $this->model_admin->tampil_dataanggota();
			$this->load->view('templates/header_dashboard',$title);
			$this->load->view('backend/berkas/data_anggota',$data);
			$this->load->view('backend/admin/sidebar');
			$this->load->view('templates/footer_dashboard');
			echo "Gagal Tambah Data";
		} 
		else 
		{
			$save = $this->model_admin->masuk_dataanggota();
			if ($save) {
 				redirect('admin/lihat_data_anggota','refresh');
				
			} else {
				echo "gagal";
			}
		}	
	}
	/*Read*/
	/*data kategori artikel*/
	public function lihat_kategori_artikel()
	{
		$title['title'] = ' | Data Kategori Artikel';
		$data['tb_kategori_artikel'] = $this->model_admin->tampil_datakategoriartikel()->result();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_kategori_artikel',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
		
	/*detail biodaraata anggota*/
	public function detail_data_anggota()
	{
		$title['title'] = ' | Detail Data Anggota';
		$data['tb_data_anggota'] = $this->model_admin->tampil_dataanggota();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/detail_data_anggota',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*data penngguna sistem*/
	public function lihat_pengguna_sistem()
	{
		$title['title'] = ' | Data Pengguna Sistem';
		$data['tb_data_anggota'] = $this->model_admin->tampil_datapenggunasistem();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_pengguna_sistem',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
		// print_r($data);
		// die();
	}
	/*data artikel*/
		public function lihat_data_artikel()
	{

		$title['title'] = ' | Data Artikel';
		$data['tb_artikel'] = $this->model_admin->tampil_dataartikel();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_artikel',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
		/*print_r($data);
		die();*/
	}
	/*data daftar sekolah*/
		public function lihat_data_pendidikan()
	{

		$title['title'] = ' | Data Daftar Sekolah';
		$data['tb_pendidikan'] = $this->model_admin->tampil_datapendidikan()->result();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_pendidikan',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*data dokumen*/
	public function lihat_data_dokumen()
	{

		$title['title'] = ' | Data Dokumen';
		$data['tb_dokumen'] = $this->model_admin->tampil_datadokumen();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_dokumen',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
		/*printf($data);
		die();*/
	}
	/*data orang tua*/
	/*public function lihat_data_orang_tua()
	{

		$title['title'] = ' | Data Orang Tua';
		$data['tb_org_tua'] = $this->model_admin->tampil_dataorgtua()->result();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_orang_tua',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}*/
	/*data anggota*/
	public function lihat_data_anggota()
	{

		$title['title'] = ' | Data Anggota';
		$data['tb_data_anggota'] = $this->model_admin->tampil_dataanggota();

		
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/data_anggota',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*update*/
	/*data pengguna sistem*/
	public function simpan_pengguna_sistem($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
		$data =  array(
				'nama'=> htmlspecialchars($this->input->post('nama'),true),
				'username'=> htmlspecialchars($this->input->post('username'),true),
				'status_akun'=> htmlspecialchars($this->input->post('status_akun'),true),
				'status_pengguna'=> htmlspecialchars($this->input->post('status_pengguna'),true),
			);
		$this->model_admin->update_datapenggunasistem($where,$data,'tb_data_anggota');
		redirect('admin/lihat_pengguna_sistem','refresh');
	}
	/*data daftar sekolah*/
	public function simpan_data_pendidikan($id_pendidikan)
	{
		$where = array('id_pendidikan' => $id_pendidikan);
		$data =  array(
					'pendidikan'=> htmlspecialchars($this->input->post('pendidikan'),true),
					'fakultas'=> htmlspecialchars($this->input->post('fakultas'),true),
					'jurusan'=> htmlspecialchars($this->input->post('jurusan'),true),
					'kelas'=> htmlspecialchars($this->input->post('kelas'),true),
			);
		$this->model_admin->update_datapendidikan($where,$data,'tb_pendidikan');
		redirect('admin/lihat_data_pendidikan','refresh');
	}
	/*data anggota*/
	public function edit($id_anggota)
	{
		$where = array('id_anggota'=>$id_anggota);
		$data['tb_data_anggota'] = $this->model_admin->edit_dataanggota($where,'tb_data_anggota')->result();	
	}
	public function edit_anggota($id_anggota)
	{
		$where = array('id_anggota'=>$id_anggota);
		$data['tb_data_anggota'] = $this->model_admin->edit_dataanggota($where,'tb_data_anggota');
		$title['title'] = ' | Data Anggota';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/berkas/edit_anggota',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function simpan_data_anggota($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
		$foto = $_FILES['foto'] ['name'];
	
			if (!empty($foto))
				{
					$config['upload_path']   = './upload/foto';
					$config['allowed_types'] = 'jpg|png';
					$config['encrypt_name']  = false;
					$config['file_name']     = date('Y-m-d').'-'.$foto;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('foto')) 
					{
						
					}
					else
					{
						$foto = $this->upload->data('file_name');
					}

					$data =  array(
						'nama'=> htmlspecialchars($this->input->post('nama'),true),
						'username'=> htmlspecialchars($this->input->post('username'),true),
						'id_pendidikan'=> htmlspecialchars($this->input->post('id_pendidikan'),true),
						'alamat_ind'=> htmlspecialchars($this->input->post('alamat_ind'),true),
						'alamat_mrk'=> htmlspecialchars($this->input->post('alamat_mrk'),true),
						'jk'=> htmlspecialchars($this->input->post('jk'),true),
						'no_telp'=> htmlspecialchars($this->input->post('no_telp'),true),
						'nama_ayah'=> htmlspecialchars($this->input->post('nama_ayah'),true),
						'nama_ibu'=> htmlspecialchars($this->input->post('nama_ibu'),true),
						'pekerjaan_ayah'=> htmlspecialchars($this->input->post('pekerjaan_ayah'),true),
						'pekerjaan_ibu'=> htmlspecialchars($this->input->post('pekerjaan_ibu'),true),
						'sd'=> htmlspecialchars($this->input->post('sd'),true),
						'smp'=> htmlspecialchars($this->input->post('smp'),true),
						'sma'=> htmlspecialchars($this->input->post('sma'),true),
						'pgtinggi'=> htmlspecialchars($this->input->post('pgtinggi'),true),
						'foto'=> ($foto),
					);
				} else {
						$data =  array(
						'nama'=> htmlspecialchars($this->input->post('nama'),true),
						'username'=> htmlspecialchars($this->input->post('username'),true),
						'id_pendidikan'=> htmlspecialchars($this->input->post('id_pendidikan'),true),
						'alamat_ind'=> htmlspecialchars($this->input->post('alamat_ind'),true),
						'alamat_mrk'=> htmlspecialchars($this->input->post('alamat_mrk'),true),
						'jk'=> htmlspecialchars($this->input->post('jk'),true),
						'no_telp'=> htmlspecialchars($this->input->post('no_telp'),true),
						'nama_ayah'=> htmlspecialchars($this->input->post('nama_ayah'),true),
						'nama_ibu'=> htmlspecialchars($this->input->post('nama_ibu'),true),
						'pekerjaan_ayah'=> htmlspecialchars($this->input->post('pekerjaan_ayah'),true),
						'pekerjaan_ibu'=> htmlspecialchars($this->input->post('pekerjaan_ibu'),true),
						'sd'=> htmlspecialchars($this->input->post('sd'),true),
						'smp'=> htmlspecialchars($this->input->post('smp'),true),
						'sma'=> htmlspecialchars($this->input->post('sma'),true),
						'pgtinggi'=> htmlspecialchars($this->input->post('pgtinggi'),true),
					);
				}
		
		/*print_r($data);
		die();*/
		$update = $this->model_admin->update_anggota($where,$data,'tb_data_anggota');
		if ($update) {
			redirect('admin/lihat_data_anggota','refresh');
		}
	}
	/*profil*/
	public function lihat_profil()
	{
		$title['title'] = ' | Profil ';
		$data['tb_data_anggota'] = $this->db->get_where('tb_data_anggota',['username'=>$this->session->userdata('username')])->row_array();
		// $data['tb_data_anggota'] = $this->model_admin->lihat_dataprofil();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/admin/profil',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*profil*/
	public function edit_profil()
	{
		$data['tb_data_anggota'] = $this->db->get_where('tb_data_anggota',['username'=>$this->session->userdata('username')])->row_array();

		$this->form_validation->set_message('required','harus diisi');

		$this->form_validation->set_rules('nama','Nama Lengkap',['required']);
		$this->form_validation->set_rules('username','Username');

		if ($this->form_validation->run()==FALSE) {
		$title['title'] = ' | Profil ';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/admin/editprofil',$data);
		$this->load->view('backend/admin/sidebar');
		$this->load->view('templates/footer_dashboard');	
		}
		else
		{
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');

			$upload_image = $_FILES['foto']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/foto_admin/';
				$this->load->library('upload',$config);

				if($this->upload->do_upload('foto')){

					$old_image = $data['tb_data_anggota']['foto'];
					if ($old_image !='default.jpg') {
						unlink(FCPATH.'assets/foto_admin/'.$old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto',$new_image);
				}else{
					echo $this->upload->display_errors();
				}

			}


			$this->db->set('nama',$nama);
			$this->db->where('username', $username);
			$this->db->update('tb_data_anggota');

			$this->session->set_flashdata("sukses","Profil berhasil diperbaharui:)");
			redirect('admin/lihat_profil');
		}
	}

	/*delete*/
	/*data kategori artikel*/
	public function hapus_kategori_artikel($id_kategori_artikel)
	{
		$where = array('id_kategori_artikel' =>$id_kategori_artikel);
		$this->model_admin->hapus_datakategoriartikel($where,'tb_kategori_artikel');
		redirect('admin/lihat_kategori_artikel','refresh');
	}
	/*data pengguna sistem*/
	public function hapus_pengguna_sistem($id_anggota)
	{
		$where = array('id_anggota' =>$id_anggota);
		$this->model_admin->hapus_datapenggunasistem($where,'tb_data_anggota');
		redirect('admin/lihat_pengguna_sistem','refresh');
	}
	/*data daftar sekolah*/
	public function hapus_data_pendidikan($id_pendidikan)
	{
		$where = array('id_pendidikan' =>$id_pendidikan);
		$this->model_admin->hapus_datapendidikan($where,'tb_pendidikan');
		redirect('admin/lihat_data_pendidikan','refresh');
	}
	/*data anggota*/
	public function hapus_anggota($id_anggota)
	{
		$where = array('id_anggota' =>$id_anggota);
		$this->model_admin->hapus_dataanggota($where,'tb_data_anggota');
		redirect('admin/lihat_data_anggota','refresh');
	}
	/*data dokumen*/
	function hapus_dokumen($id_dokumen) 
		{
			$where = array ('id_dokumen' => $id_dokumen);
			//print_r($where);
			$dokumen = $this->db->where('id_dokumen', $id_dokumen)->get('tb_dokumen')->result()[0]->dokumen;
			$hapus = $this->model_admin->hapus_datadokumen($where, 'tb_dokumen');
			$this->deleteDokumen($dokumen);
			if ($hapus) {
				
				redirect('admin/lihat_data_dokumen');
				
			}
		}

	public function deleteDokumen($filename)
	{
		if (file_exists(FCPATH.'/upload/dokumen/'.$filename)) {
			unlink(FCPATH.'/upload/dokumen/'.$filename);
		}
	}	
	/*dataa artikel*/
	function hapus_data_artikel($id_artikel) 
		{
			$where = array ('id_artikel' => $id_artikel);
			//print_r($where);
			$dokumen = $this->db->where('id_artikel', $id_artikel)->get('tb_artikel')->result()[0]->dokumen;
			$hapus = $this->model_admin->hapus_dataartikel($where, 'tb_artikel');
			$this->deleteImageArtikel($dokumen);
			if ($hapus) {
				
				redirect('admin/lihat_data_artikel');
				
			}
		}

	public function deleteImageArtikel($filename)
	{
		if (file_exists(FCPATH.'/upload/artikel/'.$filename)) {
			unlink(FCPATH.'/upload/artikel/'.$filename);
		}
	}	


}