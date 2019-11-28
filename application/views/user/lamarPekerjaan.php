<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-8">
			<form method="POST" action="<?= base_url('user/lamarPekerjaan'); ?>" enctype="multipart/form-data">
				<div class="form-group">
					<label for="nama">Nama</label>
					<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama">
					<?= form_error('nama', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat">
					<?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="telepon">No Telepon</label>
					<input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan no telp">
					<?= form_error('telepon', '<div class="alert-danger" role="alert">', '</div>'); ?>
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email">
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
						<input type="file" class="custom-file-input" id="ktp" aria-describedby="inputGroupFileAddon01" name="ktp" required>
						<label class="custom-file-label" for="ktp">Choose file</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->