<?php

class NilaiMatkulModel
{

	private $table = 'nilai_matkul';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllNilaiMatkul()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getNilaiMatkulById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahNilaiMatkul($data)
	{
		$query = "INSERT INTO nilai_matkul (nilai) VALUES(:nilai)";
		$this->db->query($query);
		$this->db->bind('nilai', $data['nilai']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataNilaiMatkul($data)
	{
		$query = "UPDATE nilai_matkul SET nilai=:nilai WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nilai', $data['nilai']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteNilaiMatkul($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariNilaiMatkul()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nilai_matkul LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
