<?php

class Mahasiswa extends Controller
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
		$data['title'] = 'Data Mahasiswa';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}
	public function lihatlaporan()
	{
		$data['title'] = 'Data Laporan Mahasiswa';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();
		$this->view('mahasiswa/lihatlaporan', $data);
	}

	// public function laporan()
	// {
	// 	$data['mahasiswa'] = $this->model('MahasiswaModel')->getAllMahasiswa();

	// 	$pdf = new FPDF('p', 'mm', 'A4');
	// 	// membuat halaman baru
	// 	$pdf->AddPage();
	// 	// setting jenis font yang akan digunakan
	// 	$pdf->SetFont('Arial', 'B', 14);
	// 	// mencetak string 
	// 	$pdf->Cell(190, 7, 'LAPORAN MAHASISWA', 0, 1, 'C');

	// 	// Memberikan space kebawah agar tidak terlalu rapat
	// 	$pdf->Cell(10, 7, '', 0, 1);

	// 	$pdf->SetFont('Arial', 'B', 10);
	// 	$pdf->Cell(85, 6, 'JUDUL', 1);
	// 	$pdf->Cell(30, 6, 'PENERBIT', 1);
	// 	$pdf->Cell(30, 6, 'PENGARANG', 1);
	// 	$pdf->Cell(15, 6, 'TAHUN', 1);
	// 	$pdf->Cell(25, 6, 'KATEGORI', 1);
	// 	$pdf->Ln();
	// 	$pdf->SetFont('Arial', '', 10);

	// 	foreach ($data['mahasiswa'] as $row) {
	// 		$pdf->Cell(85, 6, $row['judul'], 1);
	// 		$pdf->Cell(30, 6, $row['penerbit'], 1);
	// 		$pdf->Cell(30, 6, $row['pengarang'], 1);
	// 		$pdf->Cell(15, 6, $row['tahun'], 1);
	// 		$pdf->Cell(25, 6, $row['nama_kategori'], 1);
	// 		$pdf->Ln();
	// 	}

	// 	$pdf->Output('D', 'Laporan Mahasiswa.pdf', true);
	// }
	public function cari()
	{
		$data['title'] = 'Data Mahasiswa';
		$data['mahasiswa'] = $this->model('MahasiswaModel')->cariMahasiswa();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mahasiswa/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{

		$data['title'] = 'Detail Mahasiswa';
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['mata_kuliah'] = $this->model('MataKuliahModel')->getAllMataKuliah();
		$data['mahasiswa'] = $this->model('MahasiswaModel')->getMahasiswaById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mahasiswa/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		$data['title'] = 'Tambah Mahasiswa';
		$data['dosen'] = $this->model('DosenModel')->getAllDosen();
		$data['mata_kuliah'] = $this->model('MataKuliahModel')->getAllMataKuliah();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('mahasiswa/create', $data);
		$this->view('templates/footer');
	}

	public function simpanMahasiswa()
	{

		if ($this->model('MahasiswaModel')->tambahMahasiswa($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'ditambahkan', 'success');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'ditambahkan', 'danger');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		}
	}

	public function updateMahasiswa()
	{
		if ($this->model('MahasiswaModel')->updateDataMahasiswa($_POST) > 0) {
			Flasher::setMessage('Berhasil', 'diupdate', 'success');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'diupdate', 'danger');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($this->model('MahasiswaModel')->deleteMahasiswa($id) > 0) {
			Flasher::setMessage('Berhasil', 'dihapus', 'success');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		} else {
			Flasher::setMessage('Gagal', 'dihapus', 'danger');
			header('location: ' . base_url . '/mahasiswa');
			exit;
		}
	}
}
