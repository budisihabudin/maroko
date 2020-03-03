<?php 

class Model_admin extends CI_Model
{

	/*create*/
	/*data kategori artikel*/
	public function masuk_datakategoriartikel()
	{
		$data = [
					'kategori' => htmlspecialchars($this->input->post('kategori'),true),
				];
				$this->db->insert('tb_kategori_artikel',$data);
	}
	/*data artikel*/
	function kirim_dataartikel($data, $table)
	{
		$this->db->insert($table, $data);
	}
	/*data dokumen*/
	function kirim_data($data, $table)
	{
		$this->db->insert($table, $data);
	}
	
	/*data daftar sekolah*/
	public function masuk_datapendidikan()
	{
		$data = [
					'pendidikan' => htmlspecialchars($this->input->post('pendidikan'),true),
					'fakultas' => htmlspecialchars($this->input->post('fakultas'),true),
					'jurusan' => htmlspecialchars($this->input->post('jurusan'),true),
					'kelas' => htmlspecialchars($this->input->post('kelas'),true),
				];
				$this->db->insert('tb_pendidikan',$data);
	}
	/*data anggota*/
	public function masuk_dataanggota()
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
					'id_anggota' => htmlspecialchars($this->input->post('id_anggota'),true),
				];
				return $this->db->insert('tb_data_anggota',$data);
	}
	/*Read */
	/*data kategori artikel*/
	public function tampil_datakategoriartikel()
	{
		return $this->db->get('tb_kategori_artikel');
	}
	/*data artikel*/
	public function tampil_dataartikel()
	{
		$this->db->select('tb_artikel.id_artikel, tb_artikel.judul, tb_artikel.isi_teks, tb_artikel.foto, tb_artikel.waktu, tb_artikel.id_anggota, tb_artikel.id_kategori_artikel,  tb_data_anggota.nama, tb_kategori_artikel.kategori');
		$this->db->from('tb_artikel');
		$this->db->join('tb_kategori_artikel','tb_kategori_artikel.id_kategori_artikel = tb_artikel.id_kategori_artikel','left');
		$this->db->join('tb_data_anggota','tb_data_anggota.id_anggota = tb_artikel.id_anggota','left');
		$this->db->order_by('id_artikel','desc');
		$query = $this->db->get()->result();
		return $query;
	}
	/*data dokumen*/
	public function tampil_datadokumen()
	{
		$this->db->select('tb_dokumen.id_dokumen, tb_dokumen.dokumen, tb_dokumen.keterangan, tb_dokumen.id_anggota, tb_dokumen.dikirim_pada, tb_data_anggota.nama');
		$this->db->from('tb_dokumen');
		$this->db->join('tb_data_anggota','tb_data_anggota.id_anggota = tb_dokumen.id_anggota','left');
		$query = $this->db->get()->result();
		return $query;
	}
	/*data kategori artikel*/
	public function tampilka()
	{
		return $this->db->get('tb_kategori_artikel');
	}
	/*data pendidikan*/
	public function tampild()
	{
		return $this->db->get('tb_pendidikan');
	}
	/*data dokumen*/
	public function tampildo()
	{
		return $this->db->get('tb_dokumen');
	}
	/*data orang tua*/
	public function tampilo()
	{
		return $this->db->get('tb_org_tua');
	}
	public function tampil_datapendidikan()
	{
		$this->db->order_by('id_pendidikan','desc');
		return $this->db->get('tb_pendidikan');
	}
	/*data org tua*/
	public function tampil_dataorgtua()
	{
		return $this->db->get('tb_org_tua');
	}
	/*data anggota*/
	public function tampila()
	{
		return $this->db->get('tb_data_anggota');
	}
	public function tampil_dataanggota()
	{
		$this->db->select('tb_data_anggota.id_anggota,tb_data_anggota.foto, tb_data_anggota.nik, tb_data_anggota.nama, tb_data_anggota.alamat_ind, tb_data_anggota.alamat_mrk, tb_data_anggota.jk, tb_data_anggota.no_telp, tb_data_anggota.nama_ayah,tb_data_anggota.nama_ibu, tb_data_anggota.pekerjaan_ayah, tb_data_anggota.pekerjaan_ibu, tb_data_anggota.id_pendidikan, tb_data_anggota.id_anggota, tb_pendidikan.pendidikan, tb_data_anggota.status_pengguna');
		$this->db->from('tb_data_anggota');
		$this->db->join('tb_pendidikan','tb_pendidikan.id_pendidikan = tb_data_anggota.id_pendidikan','left');
		/*$this->db->join('tb_data_anggota','tb_data_anggota.id_anggota = tb_data_anggota.id_anggota','left');*/

		$query = $this->db->get()->result();
		return $query;
	}
	/*data pengguna sistem*/
	public function tampilp()
	{
		return $this->db->get('tb_data_anggota');
	}
	public function tampil_datapenggunasistem()
	{
		$this->db->select('tb_data_anggota.id_anggota, tb_data_anggota.nama, tb_data_anggota.username,  tb_data_anggota.daftar_pada, tb_data_anggota.status_akun, tb_data_anggota.status_pengguna, tb_aturan_pengguna_sistem.status_pengguna');
		$this->db->from('tb_data_anggota');
		$this->db->join('tb_aturan_pengguna_sistem','tb_aturan_pengguna_sistem.status_pengguna = tb_data_anggota.status_pengguna');
		$query = $this->db->get()->result();
		return $query;
	}
	/*update*/
	/*data anggota*/
	public function update_anggota($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}
	/*data pengguna sistem*/
	public function update_datapenggunasistem($where,$data,$table)
	{
		$this->db->order_by('id_anggota','desc');
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*data daftar sekolah*/
	public function update_datapendidikan($where,$data,$table)
	{
		$this->db->order_by('id_pendidikan','desc');
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*data anggota*/
	public function edit_dataanggota($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function update_dataanggota($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	/*delete*/
	/*data kategori artikel*/
	
	public function hapus_datakategoriartikel($where,$table)
	{
		return $this->db->delete($table, $where); 
	}
	/*data dokumen*/
	public function hapus_datadokumen($where,$table)
	{
		return $this->db->delete($table, $where); 
	}
	/*data artikel*/
	public function hapus_dataartikel($where,$table)
	{
		return $this->db->delete($table, $where); 
	}
	/*data pengguna sistem*/
	public function hapus_datapenggunasistem($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	/*data daftar sekolah*/
	public function hapus_datapendidikan($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	/*data anggota*/
	public function hapus_dataanggota($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}