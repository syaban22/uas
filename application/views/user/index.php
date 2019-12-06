<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('asset/img/profile/') . $user['gambar']; ?>" class="card-img" alt="gambar">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user['nama']; ?></h5>
          <p class="card-text">Pelamar kerja</p>
          <p class="card-text"><small class="text-muted">Member sejak <?= date('d F Y', $user['tgl_buat']); ?></small></p>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#FotoBaru">Ubah Foto Profil</a>
        </div>

      </div>
    </div>
  </div>

</div>
<!-- Modal -->
<div class="modal fade" id="FotoBaru" tabindex=" -1" role="dialog" aria-labelledby="FotoBaru" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="FotoBaru">Upload Foto Profil Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('user/UbahFoto/') . $user['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="ktp" aria-describedby="inputGroupFileAddon01" name="UbahFoto" required>
              <label class="custom-file-label" for="ktp">Choose file</label>
            </div>
          </div>
          <div class="txtprof">
            <p>*Ekstensi yang diperbolehkan .jpeg / .jpg / .png</p>
            <p>*Maksimal ukuran gambar 500 x 500</p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Upload Foto</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->