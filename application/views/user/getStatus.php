<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
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
                <?php
                if ($keyword == null) {
                    echo '<a class="navbar-brand"></a>';
                } else {
                    echo '<a class="navbar-brand">Hasil Pencarian : ' . $total_rows . '</a>';
                }
                ?>

                <form class="form-inline" action="<?= base_url('user/getStatus'); ?>" method="post">
                    <input class="form-control mr-sm-2" type="search" placeholder="Cari Perusahaan" name="keyword" autocomplete="off" autofocus>
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
        <div class="col-md">
            <table class="table table-hover" id="perus">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Notifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($pelamar)) : ?>
                        <tr>
                            <td colspan="12">
                                <div class="alert alert-danger" role="alert">
                                    Data masih kosong.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($pelamar as $p) : ?>
                        <tr>
                            <th scope="row"><?= ++$start; ?></th>
                            <td><?= $p['perusahaan']; ?></td>
                            <td><?= $p['posisi']; ?></td>
                            <?php if ($p['status'] == 'Diterima') : ?>
                                <td style="color: green"><?= $p['status']; ?></td>
                            <?php elseif ($p['status'] == 'Ditolak') :  ?>
                                <td style="color: red"><?= $p['status']; ?></td>
                            <?php elseif ($p['status'] == 'Menunggu') : ?>
                                <td style="color: orange"><?= $p['status']; ?></td>
                            <?php endif; ?>
                            <td>
                                <?php if ($p['status'] == 'Diterima' || $p['status'] == 'Ditolak') : ?>
                                    <span>Harap cek email Anda untuk keterangan selengkapnya.</span>
                                <?php elseif ($p['status'] == 'Menunggu') : ?>
                                    <span>Harap tunggu keputusan dari perusahaan.</span>
                                <?php endif; ?>
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