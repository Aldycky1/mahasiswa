<?php

class Dosen extends Controller
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
		$data['title'] = 'Data Dosen';
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('dosen/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Dosen';
		$data['dosen'] = $this->model('DosenModel')->cariDosen();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('dosen/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Dosen';
		$data['dosen'] = $this->model('DosenModel')->getDosenById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('dosen/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Dosen';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('dosen/create', $data);
		$this->view('templates/footer');
	}

	public function simpanDosen()
	{
		if ($this->model('DosenModel')->tambahDosen($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/dosen');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/dosen');
			exit;
		}
	}

	public function updateDosen()
	{
		if ($this->model('DosenModel')->updateDataDosen($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/dosen');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/dosen');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('DosenModel')->deleteDosen($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/dosen');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/dosen');
			exit;
		}
	}
}
