<?php

class MainModel extends MY_Model
{

	/*
		Model utama dari SIK-Gamais ITB, memuat functions berikut:

		addKader($data): int
		addOrganisasi($id_kader, $data): int			
		addKepanitiaan($id_kader, $data): int
		addPembinaan($id_kader, $data): int
		updateInfoKader($id_entry, $data): int
		updateOrganisasi($id_entry, $data): int
		updateKepanitiaan($id_entry, $data): int
		updatePembinaan($id_entry, $data): int
		getInfoKader($id_kader): arr
		getRiwayatOrganisasi($id_kader): arr
		getRiwayatKepanitiaan($id_kader): arr
		getRiwayatPembinaan($id_kader): arr
		getAllKaderGamais(): arr
		uploadFotoKader($data): int (in progress)
		getFotoKader($id_kader): text (in progress)
		
		Riandy R.N. (riandyrn@gmail.com)
	*/
	
	public function addKader($data)
	{
		return $this->addData('kader', $data);
	}
	
	public function addOrganisasi($id_kader, $data)
	{
		$data['id_kader'] = $id_kader;
		return $this->addData('riwayat_organisasi', $data);
	}
	
	public function addKepanitiaan($id_kader, $data)
	{
		$data['id_kader'] = $id_kader;
		return $this->addData('riwayat_kepanitiaan', $data);
	}
	
	public function addPembinaan($id_kader, $data)
	{
		$data['id_kader'] = $id_kader;
		return $this->addData('riwayat_pembinaan', $data);
	}
	
	public function updateInfoKader($id_kader, $data)
	{
		$wheres = array
		(
			'id' => $id_kader
		);
		
		return $this->updateData('kader', $data, $wheres);
	}
	
	public function updateOrganisasi($id_entry, $data)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->updateData('riwayat_organisasi', $data, $wheres);
	}
	
	public function updateKepanitiaan($id_entry, $data)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->updateData('riwayat_kepanitiaan', $data, $wheres);	
	}
	
	public function updatePembinaan($id_entry, $data)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->updateData('riwayat_pembinaan', $data, $wheres);	
	}
	
	public function getInfoKader($id_kader)
	{
		$wheres = array
		(
			'id' => $id_kader
		);
		
		$result = $this->getData('kader', $wheres);
		return $result[0];
	}
	
	public function getRiwayatOrganisasi($id_kader)
	{
		$wheres = array
		(
			'id_kader' => $id_kader
		);
		
		return $this->getData('riwayat_organisasi', $wheres);
	}
	
	public function getRiwayatKepanitiaan($id_kader)
	{
		$wheres = array
		(
			'id_kader' => $id_kader
		);
		
		return $this->getData('riwayat_kepanitiaan', $wheres);	
	}
	
	public function getRiwayatPembinaan($id_kader)
	{
		$wheres = array
		(
			'id_kader' => $id_kader
		);
		
		return $this->getData('riwayat_pembinaan', $wheres);			
	}
	
	public function getAllKaderGamais()
	{
		return $this->getData('kader', null, 'id, nim, nama_lengkap, jurusan, angkatan, hp');
	}
	
	public function deletePembinaan($id_entry)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->deleteData('riwayat_pembinaan', $wheres);
	}
	
	public function deleteOrganisasi($id_entry)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->deleteData('riwayat_organisasi', $wheres);
	}
	
	public function deleteKepanitiaan($id_entry)
	{
		$wheres = array
		(
			'id' => $id_entry
		);
		
		return $this->deleteData('riwayat_kepanitiaan', $wheres);
	}
	
	public function deleteKader($id_kader)
	{
		
		$wheres = array
		(
			'id_kader' => $id_kader
		);
		
		$del_panitia = $this->deleteData('riwayat_kepanitiaan', $wheres);
		$del_organisasi = $this->deleteData('riwayat_organisasi', $wheres);
		$del_pembinaan = $this->deleteData('riwayat_pembinaan', $wheres);
		
		$wheres = array
		(
			'id' => $id_kader
		);
		
		$del_kader = $this->deleteData('kader', $wheres);
		
		$ret = $del_panitia && $del_organisasi && $del_pembinaan && $del_kader;
		
		return $ret;
	}
	//code by Mr.is
	public function deleteAcara($id_acara)
	{
		$query = "DELETE FROM `web_ikhwan`.`event` WHERE `event`.`id` = $id_acara ";
		$this->db->query($query);
		$this->dbforge->drop_database($id_acara);
	}
	public function deletePresensi($id_kader, $id_acara)
	{
		$wheres = array
		(
			'id' => $id_kader
		);

		return $this->deleteData($id_acara, $wheres);
	}
	function insertData($data){
        $this->db->insert('kader',$data);
        $filter = "DELETE c FROM kader c LEFT JOIN ( SELECT MIN(id) id, nim, nama_lengkap, jurusan, angkatan, hp FROM kader GROUP BY nim ) b ON c.id = b.id AND c.nim = b.nim AND c.nama_lengkap = b.nama_lengkap AND c.jurusan = b.jurusan AND c.angkatan = b.angkatan AND c.hp = b.hp WHERE b.id IS NULL";
        $this->db->query($filter);
    }
	public function getInfoAcara($id_acara)
	{
		$wheres = array
		(
			'id' => $id_acara
		);
		
		$result = $this->getData('event', $wheres);
		return $result[0];
	}

	public function getAllAcaraGamais()
	{
		return $this->getData('event', null, 'id, nama_acara, deskripsi, tanggal, target');
	}
	public function getAllHadir($id_acara)
	{
		return $this->getData($id_acara, null, 'id, nim, nama_lengkap, jurusan, angkatan, hp');
	}
	public function addAcara($data)
	{
		return $this->addData('event', $data);
	}
	public function insertAcara($data)
	{
		$this->db->insert('event', $data);
	}
	public function CreateTableAcara($id_acara)
	{
		$fields = array(
			        'id' => array(
			                'type' => 'INT',
			                'constraint' => 11,
			                'unsigned' => TRUE,
			                'auto_increment' => TRUE
			        ),
			        'nim' => array(
			                'type' => 'VARCHAR',
			                'constraint' => '255',
			        ),
			        'nama_lengkap' => array(
			                'type' =>'VARCHAR',
			                'null' => TRUE,
			                'constraint' => '255',
			        ),
			        'jurusan' => array(
			                'type' =>'VARCHAR',
			                'null' => TRUE,
			                'constraint' => '255',
			        ),
			        'angkatan' => array(
			                'type' =>'VARCHAR',
			                'null' => TRUE,
			                'constraint' => '255',
			        ),
			        'hp' => array(
			                'type' =>'VARCHAR',
			                'null' => TRUE,
			                'constraint' => '255',
			        ),
		);
		$this->dbforge->add_field($fields);
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table($id_acara, TRUE);
	}
	public function get_data($q)
	{
		$this->db->select('*');
	    $this->db->like('nim', $q);
	    $query = $this->db->get('kader');

	    $data = array();
		foreach($query->result_array() as $row){
			$data[] = $row;
		}
		return $query;
	}
	public function konfirmasi($nim, $id_acara)
	{
		$query = $this->db->where('nim',$nim)->select('nim, nama_lengkap, jurusan, angkatan, hp')->get('kader');
	   	$data = $query->result_array();

	   	if (count($data)==1)
			$this->db->insert($id_acara, $data[0]);
		
		$filter = "DELETE c FROM `$id_acara` c LEFT JOIN ( SELECT MIN(id) id, nim, nama_lengkap, jurusan, angkatan, hp FROM `$id_acara` GROUP BY nim ) b ON c.id = b.id AND c.nim = b.nim AND c.nama_lengkap = b.nama_lengkap AND c.jurusan = b.jurusan AND c.angkatan = b.angkatan AND c.hp = b.hp WHERE b.id IS NULL";
        $this->db->query($filter);
	}
	public function updateAcara($id_acara, $data)
	{
		$wheres = array
		(
			'id' => $id_acara
		);
		
		return $this->updateData('event', $data, $wheres);
	}
	//End
}

?>