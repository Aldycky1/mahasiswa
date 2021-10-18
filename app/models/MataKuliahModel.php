<?php

class MataKuliahModel
{

	private $table = 'mata_kuliah';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMataKuliah()
	{
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getMataKuliahById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahMataKuliah($data)
	{
		$query = "INSERT INTO mata_kuliah (nama_matkul) VALUES(:nama_matkul)";
		$this->db->query($query);
		$this->db->bind('nama_matkul', $data['nama_matkul']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataMataKuliah($data)
	{
		$query = "UPDATE mata_kuliah SET nama_matkul=:nama_matkul WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nama_matkul', $data['nama_matkul']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMataKuliah($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMataKuliah()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_matkul LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
