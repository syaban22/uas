<!-- Begin Page Content -->
<div class="container-fluid">
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
	<!-- Page Heading -->
	<div>
		<div class="row">
			<div class="col-md">
				<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
			</div>
			<div class="col-md-3">
				<nav aria-label="breadcrumb">
					<p>
						<span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b><a href="<?= base_url('admin');  ?>">Dashboard</a></b>
							&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>Perusahaan</b></span>
						</span>
					</p>
				</nav>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg">
			<?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>'); ?>

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#perusahaanBaru"><i class="fas fa-fw fa-plus-square"></i> Tambah Perusahaan Baru</a>

			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Menu</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1; ?>
					<?php foreach ($perusahaan as $p) : ?>
						<tr>
							<th scope="row"><?= $no; ?></th>
							<td><?= $p['perusahaan']; ?></td>
							<td>
								<a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#perusahaanEdit<?= $p['id'] ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="<?= base_url('admin/deleteP/' . $p['id']) ?>" data-nama="<?= $p['perusahaan']; ?>" class="btn btn-danger btn-sm deletePe"><i class="fa fa-fw fa-trash"></i>Delete</a>
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
				<h5 class="modal-title" id="perusahaanBaruLabel">Tambah Perusahaan Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form action="<?= base_url('admin/perusahaan'); ?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" class="form-control" name="perusahaan" id="perusahaan" placeholder="Nama Perusahaan">
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

<?php foreach ($perusahaan as $p) : ?>

	<!-- Modal Edit -->
	<div class="modal fade" id="perusahaanEdit<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="perusahaanEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="perusahaanEditLabel">Edit Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form action="<?= base_url('admin/updateP/' . $p['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<input type="text" class="form-control" name="perusahaanU" id="perusahaanU" value="<?= $p['perusahaan'] ?>">
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