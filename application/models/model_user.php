<?php 

class Model_user extends CI_Model
{
	/*create*/
	/*data artikel*/
	function kirim_dataartikel($data, $table)
	{
		$this->db->insert($table, $data);
	}
	/*data biodata*/
	public function kirim_databiodata($data, $table)
	{
		$this->db->insert($table, $data);
	}
	/*public function masuk_databiodata()
	{
		$data = [
					'nik' => htmlspecialchars($this->input->post('nik'),true),
					'nama' => htmlspecialchars($this->input->post('nama'),true),
					'alamat_ind' => htmlspecialchars($this->input->post('alamat_ind'),true),
					'alamat_mrk' => htmlspecialchars($this->input->post('alamat_mrk'),true),
					'jk' => htmlspecialchars($this->input->post('jk'),true),
					'no_telp' => htmlspecialchars($this->input->post('no_telp'),true),
					'nama_ayah' => htmlspecialchars($this->input->post('nama_ayah'),true),
					'nama_ibu' => htmlspecialchars($this->input->post('nama_ibu'),true),
					'pekerjaan_ayah' => htmlspecialchars($this->input->post('pekerjaan_ayah'),true),
					'pekerjaan_ibu' => htmlspecialchars($this->input->post('pekerjaan_ibu'),true),
					'id_pendidikan' => htmlspecialchars($this->input->post('id_pendidikan'),true),
					'id_pengguna' => htmlspecialchars($this->input->post('id_pengguna'),true),
				];
				$this->db->insert('tb_data_anggota',$data);
	}*/
	/*read*/
	/*profil*/
	public function tampil_dataprofil()
	{
		$id_anggota = $this->session->id_anggota;
		$this->db->select('tb_data_anggota.id_anggota, tb_data_anggota.nama, tb_data_anggota.alamat_ind, tb_data_anggota.alamat_mrk, tb_data_anggota.sd, tb_data_anggota.smp, tb_data_anggota.sma, tb_data_anggota.jk, tb_data_anggota.nik, tb_data_anggota.pgtinggi, tb_data_anggota.id_pendidikan, tb_data_anggota.id_pengguna, tb_data_anggota.id_pesantren, tb_data_anggota.id_dokumen, tb_data_anggota.status_pengguna, tb_data_anggota.username, tb_data_anggota.password, tb_data_anggota.status_akun, tb_data_anggota.foto, tb_data_anggota.no_telp, tb_data_anggota.nama_ayah, tb_data_anggota.nama_ibu, tb_data_anggota.pekerjaan_ayah, tb_data_anggota.pekerjaan_ibu, tb_pendidikan.id_pendidikan, tb_pendidikan.pendidikan, tb_pendidikan.jurusan, tb_pendidikan.fakultas, tb_pendidikan.kelas');

		$this->db->from('tb_data_anggota');
		$this->db->join('tb_pendidikan', 'tb_pendidikan.id_pendidikan = tb_data_anggota.id_pendidikan', 'left');

		$this->db->where(['tb_data_anggota.username'=> $this->session->userdata('username')]);
		$query = $this->db->get();
		// $query = $this->db->query("SELECT tb_data_anggota.*, tb_pendidikan.* 
		// 						   FROM tb_data_anggota 
		// 						   INNER JOIN tb_pendidikan ON tb_pendidikan.id_pendidikan = tb_data_anggota.id_pendidikan
		// 						   WHERE tb_data_anggota.id_anggota = ".$id_anggota."");
		return $query;
	}
	/*data artikel*/
	public function tampil_dataartikel()
	{
		$id_pengguna = $this->session->id_pengguna;

		
		/*$this->db->where('id_pengguna',$id_pengguna);
		return $this->db->get('tb_artikel');*/
		$this->db->select('tb_artikel.id_artikel, tb_artikel.judul,tb_artikel.isi_teks, tb_artikel.foto, tb_artikel.waktu, tb_artikel.id_pengguna, tb_artikel.id_kategori_artikel, tb_kategori_artikel.kategori, tb_pengguna_sistem.username');
		$this->db->from('tb_artikel');
		$this->db->join('tb_kategori_artikel','tb_kategori_artikel.id_kategori_artikel = tb_artikel.id_kategori_artikel');
		$this->db->join('tb_pengguna_sistem','tb_pengguna_sistem.id_pengguna = tb_artikel.id_pengguna');
		$this->db->where('tb_artikel.id_pengguna',$id_pengguna);
		$query = $this->db->get()->result();
		return $query;
	}
	/*data dokumen*/
	public function tampil_datadokumen()
	{
		$id_pengguna = $this->session->id_pengguna;
		$this->db->where('id_pengguna',$id_pengguna);
		return $this->db->get('tb_dokumen');
		/*$this->db->select('tb_dokumen.id_dokumen, tb_dokumen.dokumen, tb_dokumen.keterangan, tb_dokumen.id_pengguna, tb_dokumen.dikirim_pada, tb_pengguna_sistem.nama');
		$this->db->from('tb_dokumen');
		$this->db->join('tb_pengguna_sistem','tb_pengguna_sistem.id_pengguna = tb_dokumen.id_pengguna','left');
		$query = $this->db->get()->result();
		return $query;*/
	}
	/*data biodata*/
	public function tampil_databiodata()
	{
		$id_anggota = $this->session->id_anggota;
		
		$this->db->select('tb_data_anggota.id_anggota, tb_data_anggota.foto, tb_data_anggota.nik, tb_data_anggota.nama, tb_data_anggota.alamat_ind, tb_data_anggota.alamat_mrk, tb_data_anggota.jk, tb_data_anggota.no_telp, tb_data_anggota.nama_ayah,tb_data_anggota.nama_ibu, tb_data_anggota.pekerjaan_ayah,tb_data_anggota.pekerjaan_ibu,tb_data_anggota.id_pendidikan, tb_data_anggota.id_pengguna, tb_pendidikan.pendidikan,');
		$this->db->from('tb_data_anggota');
		$this->db->join('tb_pendidikan','tb_pendidikan.id_pendidikan = tb_data_anggota.id_pendidikan','left');
		$this->db->join('tb_pengguna_sistem','tb_pengguna_sistem.id_pengguna = tb_data_anggota.id_pengguna','left');
		$this->db->where('tb_data_anggota.id_anggota',$id_anggota);
		$query = $this->db->get()->result();
		return $query;
	/*	$id_pengguna = $this->session->id_pengguna;

		$this->db->where('id_pengguna',$id_pengguna);
		return $this->db->get('tb_data_anggota');*/
	}
	/*update*/
	/*data anggota*/
	public function update_dataanggota($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	/*profil*/
	public function edit_databiodata($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*data anggota*/
	public function edit_biodata($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function update_biodata($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*delete*/
	/*data anggota*/
	public function hapus_biodata($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	/*data artikel*/
	public function hapus_dataartikel($where,$table)
	{
		return $this->db->delete($table, $where); 
	}
	/*data dokumen*/
	public function hapus_datadokumen($where,$table)
	{
		return $this->db->delete($table, $where); 
	}


}