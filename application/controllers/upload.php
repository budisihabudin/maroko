<?php 

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('model_upload');
	}

	function index()
	{
		/*$data['tb_pengguna_sistem'] = $this->db->get_where('tb_pengguna_sistem',['username'=>$this->session->userdata('username')])->row_array();	
		$data['tb_dokumen'] = $this->model_upload->lihat_data()->result();*/
		$title['title'] = ' | Dashboard';
		$this->load->view('templates/header_dashboard',$title);
		$this->load->view('backend/user/data/tambah_dokumen'/*,$data*/);
		$this->load->view('backend/user/sidebar');
		$this->load->view('templates/footer_dashboard');
		// $this->load->view('backend/member/data/data_member',$data);

	}

	/*dokumen*/
	public function simpan_upload()
	{
		$nik = $this->session->__ci_last_regenerate;
		$keterangan = $this->input->post('keterangan');
		$id_pengguna = $this->input->post('id_pengguna');
		$dokumen = $_FILES['dokumen'] ['name'];
		/*$this->form_validation->set_rules('id_pengguna', 'Pendaftar', "required|is_unique[tb_pengguna_sistem.id_pengguna]", array('is_unique' => 'Anda tidak bisa mengupload data dua kali'));
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect('upload/index','refresh');
		} else {*/
			if ($dokumen )
				{
					$config['upload_path']   = './upload/dokumen';
					$config['allowed_types'] = 'pdf';
					$config['encrypt_name']  = false;
					$config['file_name']     = $nik.'-'.$dokumen;

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('dokumen')) 
					{
						/*echo "download gagal"; die();
						redirect('user/lihat_dokumen');*/
						echo "Maaf Format File Harus Berupa PDF, Silahkan Pilih File PDF."; die();
					}
					else
					{
						$dokumen = $this->upload->data('file_name');
					}

						$data = array(
							
							'keterangan' =>$keterangan,
							'dokumen' =>$dokumen,
							'id_pengguna' => $id_pengguna
						);
						$this->model_upload->kirim_data($data, 'tb_dokumen');
						 $this->session->set_flashdata("sukses","Terima Kasih Data Anda Sudah Terkirim :)");
						redirect('user/lihat_dokumen');

				}
		// }
					
	}
	

	/**/
	//update berkas
	public function edit($id_pendaftar)
	{
		$data['users'] = $this->db->get_where('users',['email'=>$this->session->userdata('email')])->row_array();	
		$where = array('id_pendaftar' => $id_pendaftar);
		$data['t_pendaftar_sd'] = $this->m_upload_berkas->edit_data($where,'t_pendaftar_sd')->result();
		$data['title'] = 'Halaman | ';
		$this->load->view('templates/headerlte',$data);
		$this->load->view('backend/member/data/edit',$data);
		$this->load->view('backend/member/sidebar');
		$this->load->view('templates/footerlte');		
	}
	function simpan_edit($id)
		{

			$where = array('id_pendaftar' =>$id);
			$data = array(
				"nama" => $this->input->post('nama'),
				"alamat" => $this->input->post('alamat'),
				"jenis_kelamin" => $this->input->post('jenis_kelamin'),
				"tempat" => $this->input->post('tempat'),
				"tanggal" => $this->input->post('tanggal'),
				"bulan" => $this->input->post('bulan'),
				"tahun" => $this->input->post('tahun'),
				"agama" => $this->input->post('agama'),
				"asal_negara" => $this->input->post('asal_negara'),
				"akta" => $this->input->post('akta'),
				"nik" => $this->input->post('nik'),
				"nama_ayah" => $this->input->post('nama_ayah'),
				"nama_ibu" => $this->input->post('nama_ibu'),
				"no_telp" => $this->input->post('no_telp'),
			);
				$upload_image = $_FILES['foto']['name'];

			if($upload_image)
			{
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './upload/photo/';
				$this->load->library('upload',$config);

				if($this->upload->do_upload('foto'))
				{

					$old_image = $data['t_pendaftar_sd']['foto'];
					if ($old_image !='foto') 
					{
						unlink(FCPATH.'upload/photo/'.$old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('foto',$new_image);
				}
				else
				{
					echo $this->upload->display_errors();
				}

			}
			
			$this->m_upload_berkas->update_data($where, $data, 't_pendaftar_sd');
			redirect('user');
		}
	
	/*delete*/
	function hapus_dokumen($id_dokumen) 
		{
			$where = array ('id_dokumen' => $id_dokumen);
			//print_r($where);
			$dokumen = $this->db->where('id_dokumen', $id_dokumen)->get('tb_dokumen')->result()[0]->dokumen;
			$hapus = $this->model_upload->hapus_datadokumen($where, 'tb_dokumen');
			$this->deleteImage($dokumen);
			if ($hapus) {
				
				redirect('user/lihat_dokumen');
				
			}
		}

	public function deleteImage($filename)
	{
		if (file_exists(FCPATH.'/upload/photo/'.$filename)) {
			unlink(FCPATH.'/upload/photo/'.$filename);
		}
	}	


	


}



 ?>