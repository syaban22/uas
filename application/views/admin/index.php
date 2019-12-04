<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div>
		<div class="row">

			<div class="col-md">
				<h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
			</div>
			<div class="col-md-2">
				<nav aria-label="breadcrumb">
					<p>
						<span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b>Dashboard</b>
						</span>
					</p>
				</nav>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md">
			<nav class="navbar navbar-light bg-light">
				<a class="navbar-brand">Hasil Pencarian : <?= $total_rows ?></a>
				<form class="form-inline" action="<?= base_url('admin'); ?>" method="post">
					<input class="form-control mr-sm-2" type="search" placeholder="Search Name" name="keyword" autocomplete="off" autofocus>
					<input type="submit" class="btn btn-primary" name="submit" value="Search">
				</form>
			</nav>
		</div>
	</div>
	<!-- <div class="col-md-2">
		<select class="form-control" name="" id="perusahaan">
			<option value="5">Tampilkan Semua</option>
			<option value="1">PT Jaya Usaha</option>
			<option value="4">PT Maju</option>
			<option value="7">PT Abadi</option>
			<option value="11">PT Sentosa</option>
			<option value="12">PT Darma</option>
			<option value="14">PT Sudarmono</option>
		</select>
	</div> -->
	<br>
	<div class="row">
		<div class="col-lg">
			<table class="table table-hover" id="perus">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nama</th>
						<th scope="col">Alamat</th>
						<th scope="col">No Telepon</th>
						<th scope="col">Email</th>
						<th scope="col">Perusahaan</th>
						<th scope="col">Posisi</th>
						<th scope="col">File</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if (empty($pelamar)) : ?>
						<tr>
							<td colspan="12">
								<div class="alert alert-danger" role="alert">
									Data not found!
								</div>
							</td>
						</tr>
					<?php endif; ?>
					<?php foreach ($pelamar as $p) : ?>
						<tr>
							<th scope="row"><?= ++$start; ?></th>
							<td><?= $p['nama']; ?></td>
							<td><?= $p['alamat']; ?></td>
							<td><?= $p['no_telp']; ?></td>
							<td><?= $p['email']; ?></td>
							<td><?= $p['perusahaan']; ?></td>
							<td><?= $p['posisi']; ?></td>
							<td><a href="<?php echo site_url('admin/get_file/' . $p['id']); ?>" class="btn btn-sm btn-info"><i class="fa fa-fw fa-download"></i> Lihat KTP</a></td>
							<td>
								<a href="" data-toggle="modal" data-target="#pelamarEdit<?= $p['id'] ?>" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a href="" data-toggle="modal" data-target="#ModalHapus<?= $p['id']; ?>" class="btn btn-danger btn-sm delete"><i class="fa fa-fw fa-trash"></i>Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>


			</table>
			<!-- <div class="col-xs-4 paging">
				<span>Halaman <?php echo $page; ?> dari <?php echo $jumlah_page; ?></span>
			</div> -->
			<?= $this->pagination->create_links(); ?>

		</div>

	</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php foreach ($pelamar as $p) :
	?>

	<!-- Modal Edit -->
	<div class="modal fade" id="pelamarEdit<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="pelamarEditLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="pelamarEditLabel">Edit Data Pelamar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="<?= base_url('admin/updatePelamar/' . $p['id']); ?>" method="POST">
					<div class="modal-body">
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>">
							<?= form_error('nama', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat" value="<?= $p['alamat']; ?>">
							<?= form_error('alamat', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label for="telepon">No Telepon</label>
							<input type="text" class="form-control" id="telepon" name="telepon" value="<?= $p['no_telp']; ?>">
							<?= form_error('telepon', '<div class="alert-danger" role="alert">', '</div>'); ?>
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?= $p['email']; ?>">
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

<?php foreach ($pelamar as $i) :
	$id = $i['id'];
	$nama = $i['nama'];
	?>
	<!--Modal Hapus Pengguna-->
	<div class="modal fade" id="ModalHapus<?= $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<?php var_dump($id); ?>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
					<h4 class="modal-title" id="myModalLabel">Hapus Data</h4>
				</div>
				<form class="form-horizontal" action="<?= base_url() . 'admin/deletePelamar/' . $id ?>" method="post" enctype="multipart/form-data">
					<div class="modal-body">
						<p>Apakah Anda yakin mau menghapus data <b><?php echo $nama; ?></b> ?</p>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php endforeach; ?>