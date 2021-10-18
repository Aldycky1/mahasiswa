<?php

class NilaiMatkul extends Controller
{
	public function __construct()
	{
		if ($_SESSION['session_login'] != 'sudah_login') {
			Flasher::setMessage('Login', 'Tidak ditemukan.', 'danger');
			header('location: ' . base_url . '/login');
			exit;
		}
	}
	public function index()
	{
		$data['title'] = 'Data Nilai Matkul';
		$data['nilai_matkul'] = $this->model('NilaiMatkulModel')->getAllNilaiMatkul();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nilaiMatkul/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Nilai Matkul';
		$data['nilai_matkul'] = $this->model('NilaiMatkulModel')->cariNilaiMatkul();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nilaiMatkul/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Nilai Matkul';
		$data['nilai_matkul'] = $this->model('NilaiMatkulModel')->getNilaiMatkulById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nilaiMatkul/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Nilai Matkul';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nilaiMatkul/create', $data);
		$this->view('templates/footer');
	}

	public function simpanNilaiMatkul()
	{
		if ($this->model('NilaiMatkulModel')->tambahNilaiMatkul($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		}
	}

	public function updateNilaiMatkul()
	{
		if ($this->model('NilaiMatkulModel')->updateDataNilaiMatkul($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('NilaiMatkulModel')->deleteNilaiMatkul($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/nilaiMatkul');
			exit;
		}
	}
}
