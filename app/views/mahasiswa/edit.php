  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Mahasiswa</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/mahasiswa/updateMahasiswa" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $data['mahasiswa']['id']; ?>">
          <div class="card-body">
            <div class="form-group">
              <label>Nama Mahasiswa</label>
              <input type="text" class="form-control" placeholder="masukkan nama mahasiswa..." name="nama_mahasiswa" value="<?= $data['mahasiswa']['nama_mahasiswa']; ?>">
            </div>
            <div class="form-group">
              <label>NIM</label>
              <input type="number" class="form-control" placeholder="masukkan nim mahasiswa..." name="nim" value="<?= $data['mahasiswa']['nim']; ?>">
            </div>
            <div class="form-group">
              <label>Pilih Dosen</label>
              <select class="form-control" name="id_dosen">
                <option value="">Pilih</option>
                <?php foreach ($data['dosen'] as $row) : ?>
                  <option value="<?= $row['id']; ?>" <?php if ($data['mahasiswa']['id_dosen'] == $row['id']) {
                                                        echo "selected";
                                                      } ?>><?= $row['nama_dosen']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pilih Matkul</label>
              <select class="form-control" name="id_matkul">
                <option value="">Pilih</option>
                <?php foreach ($data['mata_kuliah'] as $row) : ?>
                  <option value="<?= $row['id']; ?>" <?php if ($data['mahasiswa']['id_matkul'] == $row['id']) {
                                                        echo "selected";
                                                      } ?>><?= $row['nama_matkul']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Nilai</label>
              <input type="number" class="form-control" placeholder="masukkan nilai mahasiswa..." name="nilai" value="<?= $data['mahasiswa']['nilai']; ?>">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->