<?php

class MataKuliah extends Controller
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
		$data['title'] = 'Data Mata Kuliah';
		$data['mata_kuliah'] = $this->model('MataKuliahModel')->getAllMataKuliah();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mataKuliah/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Mata Kuliah';
		$data['mata_kuliah'] = $this->model('MataKuliahModel')->cariMataKuliah();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mataKuliah/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Mata Kuliah';
		$data['mata_kuliah'] = $this->model('MataKuliahModel')->getMataKuliahById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mataKuliah/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Mata Kuliah';
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mataKuliah/create', $data);
		$this->view('templates/footer');
	}

	public function simpanMataKuliah()
	{
		if ($this->model('MataKuliahModel')->tambahMataKuliah($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		}
	}

	public function updateMataKuliah()
	{
		if ($this->model('MataKuliahModel')->updateDataMataKuliah($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('MataKuliahModel')->deleteMataKuliah($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/mataKuliah');
			exit;
		}
	}
}
