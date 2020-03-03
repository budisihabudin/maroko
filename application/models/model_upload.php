<?php 


class Model_upload extends CI_model
{
	/*function lihat_data()
	{
		$id = $this->session->id;
		$this->db->where('id_pendaftar',$id);
		return $this->db->get('t_pendaftar_sd');
	}	*/
	function kirim_data($data, $table)
	{
		$this->db->insert($table, $data);
	}


	function validate()
	{
		$validation = [
			
			[
				'filed'	=> 'nama',
				'label'	=> 'nama',
				'rules' => 'required',
				'errors' => array('required' => 'Nama tidak boleh kosong')
			],				
		];

		$this->form_validation->set_rules($validation);

		return $this->form_validation->run();
	}

	// update berkas
	
	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}
	/*delete*/
	public function hapus_datadokumen($where,$table)
	{
		return $this->db->delete($table, $where); 
	}


}


 ?>