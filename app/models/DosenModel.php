<?php

class DosenModel
{

	private $table = 'dosen';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllDosen()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getDosenById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahDosen($data)
	{
		$query = "INSERT INTO dosen (nama_dosen, nip) VALUES(:nama_dosen, :nip)";
		$this->db->query($query);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('nip', $data['nip']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataDosen($data)
	{
		$query = "UPDATE dosen SET nama_dosen=:nama_dosen, nip=:nip WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nama_dosen', $data['nama_dosen']);
		$this->db->bind('nip', $data['nip']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDosen($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariDosen()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_dosen LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
