<!-- Begin Page Content -->
<div class="container-fluid">

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
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<?= $this->session->flashdata('pesan'); ?>

			<a href="" class="btn btn-primary" data-toggle="modal" data-target="#perusahaanBaru">Tambah Posisi Baru</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Posisi</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($posisi as $p) : ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td><?= $p['posisi']; ?></td>
							<td>
								<a href="" class="badge badge-success" data-toggle="modal" data-target="#posisiEdit<?= $p['id'] ?>">Edit</a>
								<a href="<?= base_url('perusahaan/deletePosisi/' . $p['id']) ?>" class="badge badge-danger">Delete</a>
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