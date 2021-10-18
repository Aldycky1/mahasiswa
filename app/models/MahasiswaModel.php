<?php

class MahasiswaModel
{

	private $table = 'mahasiswa';
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function getAllMahasiswa()
	{
		$this->db->query("SELECT mahasiswa.*, mata_kuliah.nama_matkul, dosen.nama_dosen FROM " . $this->table . " JOIN mata_kuliah ON mata_kuliah.id = mahasiswa.id_matkul" . " JOIN dosen ON dosen.id = mahasiswa.id_dosen");
		return $this->db->resultSet();
	}

	public function getMahasiswaById($id)
	{
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		return $this->db->single();
	}

	public function tambahMahasiswa($data)
	{
		$query = "INSERT INTO mahasiswa (nama_mahasiswa, nim, id_dosen, id_matkul, nilai) VALUES(:nama_mahasiswa, :nim, :id_dosen, :id_matkul, :nilai)";
		$this->db->query($query);
		$this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('id_dosen', $data['id_dosen']);
		$this->db->bind('id_matkul', $data['id_matkul']);
		$this->db->bind('nilai', $data['nilai']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataMahasiswa($data)
	{
		$query = "UPDATE mahasiswa SET nama_mahasiswa=:nama_mahasiswa, nim=:nim, id_dosen=:id_dosen, id_matkul=:id_matkul, nilai=:nilai WHERE id=:id";
		$this->db->query($query);
		$this->db->bind('id', $data['id']);
		$this->db->bind('nama_mahasiswa', $data['nama_mahasiswa']);
		$this->db->bind('nim', $data['nim']);
		$this->db->bind('id_dosen', $data['id_dosen']);
		$this->db->bind('id_matkul', $data['id_matkul']);
		$this->db->bind('nilai', $data['nilai']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteMahasiswa($id)
	{
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
		$this->db->bind('id', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariMahasiswa()
	{
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama_mahasiswa LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}
