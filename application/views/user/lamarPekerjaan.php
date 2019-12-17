<!-- Begin Page Content -->
<div class="page-wrapper bg-darkl p-t-100 p-b-50">
	<div class="wrapper wrapper--w900">
		<div class="card card-6">
			<div class="card-heading">
				<?php foreach ($posisi as $p) {
					if (isset($posisi_id)) {
						if ($posisi_id == $p['id']) {
							echo "<h2 class='title'>Apply job for $p[posisi]</h2>";
						}
					} else {
						if ($this->input->get('job') == $p['id']) {
							echo "<h2 class='title'>Apply job for $p[posisi]</h2>";
						}
					}
				}
				?>

			</div>
			<div class="card-body">
				<form method="POST" action="<?= base_url('user/lamarPekerjaan'); ?>" enctype="multipart/form-data">
					<div class="form-row">
						<div class="name">Nama</div>
						<div class="value">
							<input class="input--style-6" type="text" name="nama" value="<?= set_value('nama'); ?>">
							<?= form_error('nama', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Jenis Kelamin</div>
						<div class="value">
							<div class="input-group">
								<select class="input--style-6" name="jenkel" id="jenkel">
									<?php foreach ($jenis as $j) : ?>
										<option value="<?= $j['id']; ?>"><?= $j['jenis']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Alamat</div>
						<div class="value">
							<input class="input--style-6" type="text" name="alamat" value="<?= set_value('alamat'); ?>">
							<?= form_error('alamat', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="name">No Telepon</div>
						<div class="value">
							<input class="input--style-6" type="text" name="telepon" value="<?= set_value('telepon'); ?>">
							<?= form_error('telepon', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Email address</div>
						<div class="value">
							<div class="input-group">
								<input class="input--style-6" type="email" name="email" value="<?= $user['email']; ?>" readonly>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Perusahaan</div>
						<div class="value">
							<div class="input-group">
								<select class="input--style-6" name="perusahaan" id="perusahaan">
									<?php foreach ($perusahaan as $p) : ?>
										<option value="<?= $p['id']; ?>"><?= $p['perusahaan']; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Posisi</div>
						<div class="value">
							<div class="input-group">
								<select name="posisi" id="posisi" class="input--style-6">
									<?php foreach ($posisi as $p) {
																									if (isset($posisi_id)) {
																										if ($posisi_id == $p['id']) {
																											echo "<option value='$p[id]' selected>$p[posisi]</option>";
																										}
																									} else {
																										if ($this->input->get('job') == $p['id']) {
																											echo "<option value='$p[id]' selected>$p[posisi]</option>";
																										}
																									}
																								}

									?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="name">Upload CV</div>
						<div class="value">
							<div class="input-group js-input-file">
								<input class="input-file" type="file" name="ktp" id="file">
								<label class="label--file" for="file">Choose file</label>
								<span class="input-file__info">No file chosen</span>
							</div>
							<div class="label--desc">Upload your CV/Resume (.doc/.docx/.pdf). Max file size
								2 MB</div>
							<div class="alert-danger mt-2" role="alert"> <?= $error; ?></div>
						</div>
					</div>
			</div>
			<div class="card-footer">
				<button class="btn btn--radius-2 btn--blue-2" type="submit">Send Application</button>
				<a class="btn btn--radius-2 btn--red-2" type="submit" href="<?= base_url('user'); ?>">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- batas form lama -->
<!-- <div class="container-fluid"> -->
<!-- Page Heading -->
<!-- <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
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
						<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" autocomplete="off" value="<?= $user['email']; ?>" readonly>
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

</div> -->
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->