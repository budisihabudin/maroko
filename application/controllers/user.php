<?php 

class User extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('status_pengguna') !="2") {
			redirect('auth','refresh');
		}
		$this->load->model('model_user');
		$this->load->library('form_validation');
		// $this->load->helper('my');
	}
	public function index()
	{
		$title['title'] = ' | Dashboard';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/home');
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	/*create*/
	/*data artikel*/
	public function tambah_artikel()
	{
		$title['title'] = ' | Lihat Artikel';
		// $data['tb_artikel'] = $this->model_admin->tampil_dataartikel();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/tambah_artikel');
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function post_artikel()
	{
		$judul = $this->input->post('judul');
		$isi_teks = $this->input->post('isi_teks');
		$waktu = $this->input->post('waktu');
		$id_pengguna = $this->input->post('id_pengguna');
		$id_kategori_artikel = $this->input->post('id_kategori_artikel');
		$foto = $_FILES['foto'] ['name'];
		/*$this->form_validation->set_rules('id_pengguna', 'Pendaftar', "required|is_unique[tb_pengguna_sistem.id_pengguna]", array('is_unique' => 'Anda tidak bisa mengupload data dua kali'));
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
						redirect('user/lihat_artikel');
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
							'id_pengguna' => $id_pengguna
						);
						$this->model_user->kirim_dataartikel($data, 'tb_artikel');
						 $this->session->set_flashdata("sukses","Terima Kasih Data Anda Sudah Terkirim :)");
						redirect('user/lihat_artikel');

				}

	}
	/*data biodata*/
	public function tambah_biodata()
	{
		$title['title'] = ' | Tambah Biodata';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/tambah_biodata');
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function simpan_databiodata()
	{
		$nik = $this->session->__ci_last_regenerate;
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');
		$alamat_ind = $this->input->post('alamat_ind');
		$alamat_mrk = $this->input->post('alamat_mrk');
		$jk = $this->input->post('jk');
		$no_telp = $this->input->post('no_telp');
		$nama_ayah = $this->input->post('nama_ayah');
		$nama_ibu = $this->input->post('nama_ibu');
		$pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
		$pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
		$id_pendidikan = $this->input->post('id_pendidikan');
		$id_pengguna = $this->input->post('id_pengguna');
		$foto = $_FILES['foto'] ['name'];
			if ($foto )
				{
					$config['upload_path']   = './upload/foto';
					$config['allowed_types'] = 'jpg|JPEG|png|jpeg';
					$config['encrypt_name']  = false;
					$config['file_name']     = $nik.'-'.$foto;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('foto')) 
					{
						echo "download gagal"; die();
						redirect('user/lihat_biodata');
					}
					else
					{
						$foto = $this->upload->data('file_name');
					}

						$data = array(
							
							'nik' =>$nik,
							'nama' =>$nama,
							'alamat_ind' =>$alamat_ind,
							'alamat_mrk' =>$alamat_mrk,
							'foto' =>$foto,
							'jk' =>$jk,
							'no_telp' =>$no_telp,
							'nama_ayah' =>$nama_ayah,
							'nama_ibu' =>$nama_ibu,
							'pekerjaan_ayah' =>$pekerjaan_ayah,
							'pekerjaan_ibu' =>$pekerjaan_ibu,
							'id_pendidikan' =>$id_pendidikan,
							'id_pengguna' => $id_pengguna
						);
						$this->model_user->kirim_databiodata($data, 'tb_data_anggota');
						 $this->session->set_flashdata("sukses","Terima Kasih Data Anda Sudah Terkirim :)");
						redirect('user/lihat_biodata');
					}

	/*
		$this->form_validation->set_message('required','Kolom {field} Harus Terisi');

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama', 'NAMA PENDAFTAR', 'trim|required');
		$this->form_validation->set_rules('alamat_ind', 'ALAMAT INDONESIA', 'trim|required');
		$this->form_validation->set_rules('alamat_mrk', 'ALAMAT MAROKO', 'trim|required');
		$this->form_validation->set_rules('jk', 'JENIS KELAMIN', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'NOMOR TELEPON', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'NAMA AYAH', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'NAMA IBU', 'trim|');
		$this->form_validation->set_rules('pekerjaan_ayah', 'PEKERJAAN AYAH', 'trim|');
		$this->form_validation->set_rules('pekerjaan_ibu', 'PEKERJAAN IBU', 'trim|');
		$this->form_validation->set_rules('id_pendidikan', 'PENDIDIKAN', 'trim|');
		$this->form_validation->set_rules('id_pengguna', 'ID PENGGUNA', 'trim|');
		if ($this->form_validation->run() ) {
			$title['title'] = ' | Data Biodata';
			$this->load->view('templates/header_dashboard',$title);
			$this->load->view('backend/user/data/data_user',$data);
			$this->load->view('backend/user/sidebar');
			$this->load->view('templates/footer_dashboard');
		} 
		else 
		{
			$this->model_user->masuk_databiodata();
			redirect('user/lihat_biodata','refresh');
		}	*/
	}

	/*read*/
	/*data artikel*/
	public function lihat_artikel()
	{
		$title['title'] = ' | Lihat Artikel';
		$data['tb_artikel'] = $this->model_user->tampil_dataartikel();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/data_artikel',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	
	/*data dokumen*/
	public function lihat_dokumen()
	{

		$title['title'] = ' | Data Dokumen';
		$data['tb_pengguna_sistem'] = $this->db->get_where('tb_pengguna_sistem',['username'=>$this->session->userdata('username')])->row_array();
		$data1['tb_dokumen'] = $this->model_user->tampil_datadokumen()->result();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/data_dokumen',$data1);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*data pendaftar*/
	public function lihat_biodata()
	{
		$title['title'] = ' | Biodata';
		// $data['tb_data_anggota'] = $this->model_user->tampil_biodata();
		$data['tb_data_anggota'] = $this->model_user->tampil_databiodata();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/data_user',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	/*detail biodara*/
	public function detail_biodata()
	{
		$title['title'] = ' | Detail Biodata';
		// $data['tb_data_anggota'] = $this->model_user->tampil_biodata();
		$data['tb_data_anggota'] = $this->model_user->tampil_databiodata();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/detail_biodata',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}

	/*update*/
	/*data anggota*/
	/*public function edit_biodata($id_anggota)
	{
		$where = array('id_anggota'=>$id_anggota);
		$data['tb_data_anggota'] = $this->model_user->edit_biodata($where,'tb_data_anggota')->result();
		$title['title'] = ' | Biodata';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/edit_biodata',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');
	}
	public function simpan_biodata($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
		$data =  array(
				'nik'=> htmlspecialchars($this->input->post('nik'),true),
				'nama'=> htmlspecialchars($this->input->post('nama'),true),
				'alamat_ind'=> htmlspecialchars($this->input->post('alamat_ind'),true),
				'alamat_mrk'=> htmlspecialchars($this->input->post('alamat_mrk'),true),
				'jk'=> htmlspecialchars($this->input->post('jk'),true),
				'no_telp'=> htmlspecialchars($this->input->post('no_telp'),true),
				'nama_ayah'=> htmlspecialchars($this->input->post('nama_ayah'),true),
				'nama_ibu'=> htmlspecialchars($this->input->post('nama_ibu'),true),
				'pekerjaan_ayah'=> htmlspecialchars($this->input->post('pekerjaan_ayah'),true),
				'pekerjaan_ibu'=> htmlspecialchars($this->input->post('pekerjaan_ibu'),true),
				'id_pendidikan'=> htmlspecialchars($this->input->post('id_pendidikan'),true),
			);
		$this->model_user->update_biodata($where,$data,'tb_data_anggota');
		redirect('user/lihat_biodata','refresh');
	}*/
		/*profil*/
	public function lihat_profil()
	{
		$title['title'] = ' | Profil ';
		//$data['tb_data_anggota'] = $this->db->get_where('tb_data_anggota',['username'=>$this->session->userdata('username')]);
		$data['tb_data_anggota'] = $this->model_user->tampil_dataprofil();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/profil',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
		/*print_r($data);
		die();*/
		
	}
	public function editprofil($id_anggota)
	{
		$title['title'] = ' | Profil ';
		//$data['tb_data_anggota'] = $this->db->get_where('tb_data_anggota',['username'=>$this->session->userdata('username')])->row_array();
		$data['tb_data_anggota'] = $this->model_user->tampil_dataprofil();
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/editprofil',$data);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');	
	}
	public function saveprofil($id_anggota)
	{
		$where = array('id_anggota' => $id_anggota);
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
		/*print_r($data);
		die();*/
		$update = $this->model_user->update_dataanggota($where,$data,'tb_data_anggota');
		if ($update) {
			redirect('user/lihat_profil','refresh');
		}
	}
	/*delete*/
	/*Biodata*/
	public function hapus_biodata($id_anggota)
	{
		$where = array('id_anggota' =>$id_anggota);
		$this->model_user->hapus_biodata($where,'tb_data_anggota');
		redirect('user/lihat_biodata','refresh');
	}
	/*artikel*/
	function hapus_artikel($id_artikel) 
		{
			$where = array ('id_artikel' => $id_artikel);
			//print_r($where);
			$artikel = $this->db->where('id_artikel', $id_artikel)->get('tb_artikel')->result()[0]->foto;
			$hapus = $this->model_user->hapus_dataartikel($where, 'tb_artikel');
			$this->deleteImageArtikel($artikel);
			if ($hapus) {
				
				redirect('user/lihat_artikel');
				
			}
		}

	public function deleteImageArtikel($filename)
	{
		if (file_exists(FCPATH.'/upload/artikel/'.$filename)) {
			unlink(FCPATH.'/upload/artikel/'.$filename);
		}
	}
	/*dokumen*/
	function hapus_dokumen($id_dokumen) 
		{
			$where = array ('id_dokumen' => $id_dokumen);
			//print_r($where);
			$dokumen = $this->db->where('id_dokumen', $id_dokumen)->get('tb_dokumen')->result()[0]->dokumen;
			$hapus = $this->model_user->hapus_datadokumen($where, 'tb_dokumen');
			$this->deleteImage($dokumen);
			if ($hapus) {
				
				redirect('user/lihat_dokumen');
				
			}
		}

	public function deleteImage($filename)
	{
		if (file_exists(FCPATH.'/upload/dokumen/'.$filename)) {
			unlink(FCPATH.'/upload/dokumen/'.$filename);
		}
	}

	

}