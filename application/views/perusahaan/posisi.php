<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<!-- Page Heading -->
	<div>
		<div class="row">
			<div class="col-md">
				<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg">
			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#perusahaanBaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Posisi</a>
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Posisi</th>
						<th scope="col">Gaji</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($gaji as $p) : ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td><?= $p['posisi']; ?></td>
							<td><?= $p['ket_gaji']; ?></td>
							<td>
								<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#posisiEdit<?= $p['id'] ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url('perusahaan/deletePosisi/' . $p['id']) ?>" data-nama="<?= $p['posisi']; ?>" class="btn btn-danger btn-sm deletePo"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
						<?php $no++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="perusahaanBaru" tabindex="-1" role="dialog" aria-labelledby="perusahaanBaruLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="perusahaanBaruLabel">Tambah Posisi Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('perusahaan/posisi'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="posisi" id="posisi" placeholder="Posisi baru">
					</div>
					<div class="form-group">
						<select name="gaji" id="gaji" class="form-control">
							<?php foreach ($gajii as $g) : ?>
								<option value="<?= $g['id']; ?>"><?= $g['ket_gaji']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Tambah</button>
				</div>
			</form>

		</div>
	</div>
</div>

<?php foreach ($posisi as $p) : ?>

	<!-- Modal Edit -->
	<div class="modal fade" id="posisiEdit<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="posisiEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="posisiEditLabel">Edit Posisi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('perusahaan/updatePosisi/' . $p['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" name="posisiU" id="posisiU" value="<?= $p['posisi'] ?>">
						</div>
						<div class="form-group">
							<select name="gajiU" id="gajiU" class="form-control">
								<?php foreach ($gajii as $g) : ?>
									<option value="<?= $g['id']; ?>"><?= $g['ket_gaji']; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Edit</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php endforeach; ?>