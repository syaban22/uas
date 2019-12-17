<!-- Begin Page Content -->
<div class="page-wrapper bg-darkl p-t-100 p-b-50">
	<div class="wrapper wrapper--w900">
		<div class="card card-6">
			<div class="card-heading">
				<?php if ($cek == NULL) : ?>
					<h2 class='title'>Tambah Profile <?= $user['nama']; ?></h2>
				<?php elseif ($cek != NULL) : ?>
					<h2 class='title'>Update Profile <?= $user['nama']; ?></h2>
				<?php endif ?>
			</div>
			<div class="card-body">
				<?php if ($cek == NULL) : ?>
					<form method="POST" action="<?= base_url('perusahaan/EditProfile'); ?>">
					<?php elseif ($cek != NULL) : ?>
						<form method="POST" action="<?= base_url('perusahaan/UpdateProfile'); ?>">
						<?php endif ?>
						<div class="form-row">
							<div class="name">Visi Perusahaan</div>
							<div class="value">
								<?php if ($cek == NULL) : ?>
									<textarea class="textarea--style-6" name="visi" placeholder="Visi Perusahaan Anda"><?= set_value('visi'); ?></textarea>
									<?= form_error('visi', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php elseif ($cek != NULL) : ?>
									<textarea class="textarea--style-6" name="visi" placeholder="Visi Perusahaan Anda"><?= $cek['visi']; ?></textarea>
									<?= form_error('visi', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Misi Perusahaan</div>
							<div class="value">
								<?php if ($cek == NULL) : ?>
									<textarea class="textarea--style-6" name="misi" placeholder="Visi Perusahaan Anda"><?= set_value('misi'); ?></textarea>
									<?= form_error('misi', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php elseif ($cek != NULL) : ?>
									<textarea class="textarea--style-6" name="misi" placeholder="Visi Perusahaan Anda"><?= $cek['misi']; ?></textarea>
									<?= form_error('misi', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Quotes</div>
							<div class="value">
								<?php if ($cek == NULL) : ?>
									<textarea class="textarea--style-6" name="quotes" placeholder="Quotes Perusahaan Anda"><?= set_value('quotes'); ?></textarea>
									<?= form_error('quotes', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php elseif ($cek != NULL) : ?>
									<textarea class="textarea--style-6" name="quotes" placeholder="Quotes Perusahaan Anda"><?= $cek['quotes']; ?></textarea>
									<?= form_error('quotes', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
								<?php endif ?>
							</div>
						</div>
						<div class="form-row">
							<div class="name">Tentang Perusahaan</div>
							<div class="value">
								<div class="input-group">
									<?php if ($cek == NULL) : ?>
										<textarea class="textarea--style-6" name="about" placeholder="Tentang Perusahaan Anda"><?= set_value('about'); ?></textarea>
										<?= form_error('about', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
									<?php elseif ($cek != NULL) : ?>
										<textarea class="textarea--style-6" name="about" placeholder="Tentang Perusahaan Anda"><?= $cek['about']; ?></textarea>
										<?= form_error('about', '<div class="alert-danger mt-2" role="alert">', '</div>'); ?>
									<?php endif ?>
								</div>
							</div>
						</div>
			</div>
			<div class="card-footer">
				<?php if ($cek == NULL) : ?>
					<button class="btn btn--radius-2 btn--blue-2" type="submit">Tambahkan Profile</button>
				<?php elseif ($cek != NULL) : ?>
					<button class="btn btn--radius-2 btn--blue-2" type="submit">Update Profile</button>
				<?php endif ?>
				<a class="btn btn--radius-2 btn--red-2" type="submit" href="<?= base_url('perusahaan'); ?>">Cancel</a>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->