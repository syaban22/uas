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
                        <span class="posisi"><i class="fa fa-dashboard fa-md"></i> &nbsp<b>Menu Perusahaan</b>&nbsp<i class="fa fa-angle-right fa-md"></i>&nbsp<span><b>List Pelamar</b>
                            </span>
                    </p>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <nav class="navbar navbar-light bg-light">
                <?php
                    if ($keyword == null) {
                        echo '<a class="navbar-brand">Total : ' . $total_rows . '</a>';
                    } else {
                        echo '<a class="navbar-brand">Hasil Pencarian : ' . $total_rows . '</a>';
                    }
                ?>

                <form class="form-inline" action="<?= base_url('perusahaan/getPelamar'); ?>" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Nama" name="keyword" autocomplete="off" autofocus>
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
            <a href="<?= base_url('perusahaan/Export')  ?>" class="btn btn-sm btn-success mb-3"><i class="fa fa-fw fa-file-excel"></i> Export Excel</a>
            <table class="table table-hover" id="perus">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">No Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">File</th>
                        <th scope="col">Status</th>
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
                            <td><?= $p['jenis']; ?></td>
                            <td><?= $p['alamat']; ?></td>
                            <td><?= $p['no_telp']; ?></td>
                            <td><?= $p['email']; ?></td>
                            <td><?= $p['perusahaan']; ?></td>
                            <td><?= $p['posisi']; ?></td>
                            <td><a href="<?php echo site_url('perusahaan/get_file/' . $p['id']); ?>" class="btn btn-sm btn-info"><i class="fa fa-fw fa-download"></i> Lihat CV</a></td>
                            <?php if ($p['status'] == 'Diterima') : ?>
                                <td style="color: green"><?= $p['status']; ?></td>
                            <?php elseif ($p['status'] == 'Ditolak') :  ?>
                                <td style="color: red"><?= $p['status']; ?></td>
                            <?php elseif ($p['status'] == 'Menunggu') : ?>
                                <td style="color: orange"><?= $p['status']; ?></td>
                            <?php endif; ?>

                            <?php if ($p['status'] == 'Diterima' || $p['status'] == 'Ditolak') : ?>
                                <td>
                                    <a href="<?= base_url() . 'perusahaan/actionCancel/' . $p['id'] ?>" data-nama="<?= $p['nama']; ?>" class="btn btn-warning btn-sm cancel"><i class="fa fa-fw fa-undo-alt"></i> Batalkan Aksi</a>

                                </td>
                            <?php elseif ($p['status'] == 'Menunggu') : ?>
                                <td>
                                    <a href="<?= base_url() . 'perusahaan/actionTerima/' . $p['id'] . '?email=' . $p['email'] ?>" data-nama="<?= $p['nama']; ?>" class="btn btn-success btn-sm TerimaP"><i class="fa fa-fw fa-check"></i> Terima</a>
                                    <a href="<?= base_url() . 'perusahaan/actionTolak/' . $p['id'] . '?email=' . $p['email'] ?>" data-nama="<?= $p['nama']; ?>" class="btn btn-danger btn-sm TolakP"><i class="fa fa-fw fa-times"></i> Tolak</a>
                                </td>
                            <?php endif; ?>
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