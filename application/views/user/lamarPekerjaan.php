<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<div class="row">
		<div class="col-lg-8">
			<form method="POST" action="<?= base_url('user/lamarPekerjaan'); ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama">Nama</label>
					<div class="inputWithIcon">
						<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama" autocomplete="off" value="<?= set_value('nama'); ?>">
						<i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> </div>
					<?= form_error('nama', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<div class="inputWithIcon">
						<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat" autocomplete="off" value="<?= set_value('alamat'); ?>">
						<i class=" fas fa-fw fa-map-marked-alt" aria-hidden="true"></i> </div>
					<?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="telepon">No Telepon</label>
					<div class="inputWithIcon">
						<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan no telp" autocomplete="off" value="<?= set_value('telepon'); ?>">
						<i class=" fas fa-fw fa-phone-alt" aria-hidden="true"></i> </div>
					<?= form_error('telepon', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<div class="inputWithIcon">
						<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" autocomplete="off" value="<?= set_value('email'); ?>">
						<i class="fas fa-fw fa-envelope" aria-hidden="true"></i> </div>
					<?= form_error('email', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="perusahaan">Perusahaan</label>
					<select name="perusahaan" id="perusahaan" class="form-control">
						<?php foreach ($perusahaan as $p) : ?>
							<option value="<?= $p['id']; ?>"><?= $p['perusahaan']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="posisi">Posisi</label>
					<select name="posisi" id="posisi" class="form-control">
						<?php foreach ($posisi as $p) : ?>
							<option value="<?= $p['id']; ?>"><?= $p['posisi']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="posisi">Upload KTP</label>
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="ktp" aria-describedby="inputGroupFileAddon01" name="ktp">
						<label class="custom-file-label" for="ktp">Choose file</label>
					</div>
					<div class="alert-danger mt-2" role="alert"> <?= $error; ?></div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->