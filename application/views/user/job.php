<div class="site-wrap">
    <?php foreach ($posisi as $pos) : ?>
    <?php endforeach ?>
    <?php foreach ($gaji as $g) : ?>
    <?php endforeach ?>
    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="unit-5 overlay back2">
        <div class="container text-center">
            <h2 class="mb-2"><?= $pos['posisi']; ?></h2>
            <p class="mb-0 unit-6"><a href="<?= base_url('user');  ?>">Home</a> <span class="sep">></span> <span>Job Item</span></p>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-8 mb-5">



                    <div class="p-5 bg-white">

                        <div class="mb-4 mb-md-1 mr-0">
                            <div class="job-post-item-header d-flex align-items-center">
                                <h2 class="mr-3 text-black h4"><?= $pos['posisi']; ?></h2>
                                <div class="badge-wrap">
                                    <span class="border border-warning text-warning py-2 px-4 rounded"><?= $g['ket_gaji']; ?></span>
                                </div>
                            </div>
                            <div class="job-post-item-body d-block d-md-flex">
                                <!-- <div class="mr-3"><span class="fl-bigmug-line-portfolio23"></span> <a href="#">New York Times</a>
                                </div> -->
                                <div><span class="fl-bigmug-line-big104"></span> <span>Jakarta, Indonesia</span>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <h2>Persyaratan</h2>
                        <hr>
                        <ul>
                            <li>Laki-laki / perempuan, umur maksimal 35 tahun.</li>
                            <li>Pendidikan minimal SMA/sederajat.</li>
                            <li>Bermotivasi tinggi, jujur dan cakap.</li>
                            <li>Bersedia bekerja dengan target dan mampu bekerja di bawah tekanan.</li>
                            <li>Memiliki communication skill yang memadai.</li>
                            <li>Mempunyai kendaraan sendiri dan SIM A/C.</li>
                            <li>Mampu mengoperasikan aplikasi komputer Microsoft Office.</li>
                            <li>Berpengalaman di bidang penjualan, diutamakan penjualan property minimal 1 tahun.</li>
                        </ul>
                        <hr>
                        <h2>Fasilitas</h2>
                        <hr>
                        <ul>
                            <li>Gaji sesuai dengan UMK setempat.</li>
                            <li>Uang bensin sebesar Rp 15.000,-/hari atau Rp 330.000,-/bulan.</li>
                            <li>BPJS Tenaga Kerja & BPJS Kesehatan.</li>
                            <li>Insentif bila mencapai target.</li>
                            <li>Reward lainnya.</li>
                        </ul>

                        <p class="mt-5"><a href="<?= base_url('user/lamarPekerjaan/') . '?job=' . $pos['id'] ?>" class="btn btn-primary  py-2 px-4">Apply Job</a></p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Perusahaan Top</h3>
                        <hr>
                        <ul>
                            <?php foreach ($perusahaan as $p) : ?>
                                <li><?= $p['perusahaan']; ?></li>
                            <?php endforeach ?>
                        </ul>
                        <!-- <p><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>