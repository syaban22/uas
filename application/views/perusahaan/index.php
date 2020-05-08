<!-- Begin Page Content -->
<div class="container-fluid">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
  <?= $this->session->flashdata('mt'); ?>
  <!-- Page Heading -->
  <div class="row">
    <div class="col-md">
      <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    </div>
    <div class="col-md-3">
      <nav aria-label="breadcrumb">
        <p>
          <span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b>Menu Perusahaan</b>&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>Profile Perusahaan</b>
            </span>
        </p>
      </nav>
    </div>
  </div>
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <?php if ($cek == NULL) : ?>
          <img src="<?= base_url('asset/img/profile/') . $user['gambar']; ?>" class="card-img" alt="gambar">
        <?php elseif ($cek['gambar'] == 'bg_3.jpg') : ?>
          <img src="<?= base_url('asset/img/perusahaan_pic/') . $cek['gambar']; ?>" class="card-img" alt="gambar">
        <?php elseif ($cek != NULL) : ?>
          <img src="<?= base_url('asset/img/perusahaan_pic/') . $cek['gambar']; ?>" class="card-img" alt="gambar">
        <?php endif ?>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $user['nama']; ?></h5>
          <p class="card-text">Profil Perusahaan</p>
          <?php if ($cek['about'] != NULL) : ?>
            <p class="card-text"><small class="text-muted"><?= $cek['about']; ?></small></p>
          <?php else : ?>
            <p class="card-text"><small class="text-muted ">Tentang Perusahaan : - (harap untuk mengedit profil perusahaan)</small></p>
          <?php endif ?>
          <p class="card-text"><small class="text-muted">Terdaftar sejak <?= date('d F Y', $user['tgl_buat']); ?></small></p>
          <?php if ($cek['id'] == null) : ?>
            <a></a>
          <?php else : ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#FotoBaru">Ubah Foto Halaman Web</a>
          <?php endif ?>
          <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#PassBaru"><i class="fa fa-fw fa-key"></i> Ubah Password</a>
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

        <form action="<?= base_url('perusahaan/UbahFoto/') . $cek['id']; ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="ktp" aria-describedby="inputGroupFileAddon01" name="UbahFoto" required>
                <label class="custom-file-label" for="ktp">Choose file</label>
              </div>
            </div>
            <div class="txtprof">
              <p>*Ekstensi yang diperbolehkan .jpeg / .jpg / .png</p>
              <p>*Saran ukuran gambar 2000 x 1335 atau lebih</p>
              <p>*Maksimal 5 MB</p>
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

  <!-- Modal Password-->
  <div class="modal fade" id="PassBaru" tabindex=" -1" role="dialog" aria-labelledby="PassBaru" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="PassBaru">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="<?= base_url('perusahaan/changePassword/') . $user['id']; ?>" method="POST" class="needs-validation" novalidate>
          <div class="modal-body">
            <div class="form-group">
              <div class="form-group">
                <label for="curpass">Masukkan Password Lama</label>
                <div class="inputWithIcon">
                  <input type="password" class="form-control" id="curpass" name="curpass" placeholder="Masukan Password Lama" autocomplete="off" required>
                  <div class="invalid-feedback">
                    Masukan Password Lama
                  </div>
                  <i class=" fas fa-fw fa-unlock-alt" aria-hidden="true"></i>
                </div>
                <?= form_error('curpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('ms'); ?>
              </div>
              <div class="form-group">
                <label for="newpass">Masukkan Password Baru</label>
                <div class="inputWithIcon">
                  <input type="password" class="form-control" id="newpass" name="newpass" placeholder="Masukan Password Baru" autocomplete="off" required>
                  <div class="invalid-feedback">
                    Masukan Password Baru
                  </div>
                  <i class=" fas fa-fw fa-lock" aria-hidden="true"></i>
                </div>
                <?= form_error('newpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
                <?= $this->session->flashdata('msg'); ?>
              </div>
              <div class="form-group">
                <label for="conpass1">Ulangi Password Baru</label>
                <div class="inputWithIcon">
                  <input type="password" class="form-control" id="conass" name="conpass" placeholder="Masukan Lagi" autocomplete="off" required>
                  <div class="invalid-feedback">
                    Masukan Konfirmasi Password Baru
                  </div>
                  <i class=" fas fa-fw fa-lock" aria-hidden="true"></i>
                </div>
                <?= form_error('conpass', '<div class="alert-danger" role="alert">', '</div>'); ?>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ubah Password</button>
            </div>
        </form>

      </div>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->