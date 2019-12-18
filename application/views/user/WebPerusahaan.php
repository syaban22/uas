<!-- Begin Page Content -->

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href=""><?= $nama['perusahaan']; ?></a>
  </div>
</nav>
<?php if ($detail['gambar'] != NULL) : ?>
  <section class="hero-wrap js-fullheight" style="background-image: url(<?= base_url('asset/img/perusahaan_pic/' . $detail['gambar']); ?>); background-position: cover;" data-section="home">
  <?php else : ?>
    <section class="hero-wrap js-fullheight" style="background-image: url(<?= base_url('asset/img/perusahaan_pic/bg_1.jpg'); ?>); background-position: cover;" data-section="home">
    <?php endif ?>
    <div class="container">
      <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
        <div class="col-md-6 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
          <?php if ($detail['quotes'] || $detail['about'] != NULL) : ?>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $detail['quotes']; ?></h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><?= $detail['about']; ?></p>
          <?php else : ?>
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Reputation,
              Respect, Result</h1>
            <p class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">A small river named
              Duden flows by their place and supplies it with the necessary regelialia.</p>
          <?php endif ?>
          <p style="text-align: center"><a href="<?= base_url('user#daftar') ?>" class="btn btn-primary ">Daftarkan diri Anda !</a></p>
        </div>
      </div>
    </div>
    </section>

    <section class="ftco-section ftco-counter ftco-no-pt ftco-no-pb img" id="section-counter">
      <div class="container">
        <div class="row d-md-flex align-items-center justify-content-end">
          <div class="col-lg-12">
            <div class="ftco-counter-wrap">
              <div class="row no-gutters d-md-flex align-items-center align-items-stretch">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-house"></span>
                      </div>
                      <strong class="number" data-number="20">0</strong>
                      <span>Tahun Berdiri</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-handshake"></span>
                      </div>
                      <strong class="number" data-number="10000">0</strong>
                      <span>Banyak Klien</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-lawyer"></span>
                      </div>
                      <strong class="number" data-number="50">0</strong>
                      <span>Pekerja Ahli</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18">
                    <div class="text">
                      <div class="icon d-flex justify-content-center align-items-center">
                        <span class="flaticon-medal"></span>
                      </div>
                      <strong class="number" data-number="40">0</strong>
                      <span>Prestasi</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-services" id="practice-section">
      <div class="container">
        <div class="row justify-content-center pb-5">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <span class="subheading">Practice Areas</span>
            <h2 class="mb-4">Practice Areas</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-5 col-lg-3 ftco-animate py-4 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 py-1 active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true"><span class="mr-3 flaticon-ideas"></span> Visi Perusahaan</a>

              <a class="nav-link px-4 py-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false"><span class="mr-3 flaticon-flasks"></span>
                Misi Perusahaan</a>
            </div>
          </div>
          <div class="col-md-7 col-lg-9 ftco-animate p-4 p-md-5 d-flex align-items-center">

            <div class="tab-content pl-lg-4" id="v-pills-tabContent">

              <div class="tab-pane fade show active py-0 py-lg-5" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
                <div class="d-lg-flex">
                  <div class="icon-law mr-md-4 mr-lg-5">
                    <span class="icon mb-3 d-block flaticon-family"></span>
                  </div>
                  <div class="text">
                    <h2 class="mb-4">Visi Perusahaan</h2>
                    <?php if ($detail['visi'] != NULL) : ?>
                      <p><?= $detail['visi']; ?></p>
                    <?php else : ?>
                      <p>Inventore fugit error iure nisi reiciendis fugiat illo pariatur quam sequi quod
                        iusto facilis officiis nobis sit quis molestias asperiores rem, blanditiis!
                        Commodi exercitationem vitae deserunt qui nihil ea, tempore et quam natus
                        quaerat doloremque.</p>
                    <?php endif ?>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade py-0 py-lg-5" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                <div class="d-lg-flex">
                  <div class="icon-law mr-md-4 mr-lg-5">
                    <span class="icon mb-3 d-block flaticon-auction"></span>
                  </div>
                  <div class="text">
                    <h2 class="mb-4">Misi Perusahaan</h2>
                    <?php if ($detail['misi'] != NULL) : ?>
                      <p><?= $detail['misi']; ?></p>
                    <?php else : ?>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate,
                        quibusdam sunt iste dolores consequatur.</p>
                    <?php endif ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section mt-5">
      </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->