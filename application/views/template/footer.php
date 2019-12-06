<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>
        <font color="blue">Copyright &copy; Online Job Application <?= date('Y'); ?></font>
      </span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keluar ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Pilih "Keluar" untuk melanjutkan</div>
      <div class="modal-footer">
        <button class="btn" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-secondary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('asset/'); ?>js/sweet/sweetalert2.all.min.js"></script>
<script src="<?= base_url('asset/'); ?>js/jsscript.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('asset/'); ?>plugin/toast/jquery.toast.min.js"></script>
<script>
  const tombol = document.querySelector('#tombol');
  tombol.addEventListener('click', function() {
    Swal.fire('Hello World', 'Latihan Sweet', 'success');
  });
</script>

<script>
  $('.form-check-input').on('click', function() {
    const menuId = $(this).data('menu');
    const levelId = $(this).data('level');

    $.ajax({
      url: "<?= base_url('admin/rubahakses'); ?>",
      type: 'post',
      data: {
        menuId: menuId,
        levelId: levelId
      },
      success: function() {
        document.location.href = "<?= base_url('admin/levelAkses/'); ?>" + levelId;
      }
    });
  });
</script>



<script>
  $(document).ready(function() {
    $("#load").fadeOut(500);
    // $('#perusahaan').on('change', function() {
    //   var id_perus = $('#perusahaan').val();
    //   if (id_perus != '') {
    //     $.ajax({
    //       url: "<?php echo base_url(); ?>admin/index",
    //       method: "POST",
    //       data: {
    //         id_perus: id_perus
    //       },
    //       success: function() {
    //         document.location.href = "<?= base_url('admin/'); ?>" + id_perus;
    //         console.log(id_perus);
    //       }
    //     });
    //   }
    // });
  });
</script>

<script>
  $('#ktp').on('change', function() {
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
  })
</script>

<?php if ($this->session->flashdata('pesan') == '<div class="alert alert-success" role="alert">Lamaran pekerjaan telah terkirim</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Berkas Berhasil dikirimkan.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>

<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-success" role="alert">Perusahaan baru ditambahkan</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Perusahaan baru berhasil ditambahkan.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-success" role="alert">Level baru ditambahkan</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Level baru berhasil ditambahkan.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-danger" role="alert">Format KTP Salah</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Alert',
      text: "Format KTP Salah.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#dc3545'
    });
  </script>
<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-success" role="alert">Level berhasil dihapus</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Success',
      text: "Berhasil menghapus Level.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-danger" role="alert">Format Foto Salah</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Gagal',
      text: "Update foto tidak berhasil.",
      showHideTransition: 'slide',
      icon: 'error',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#dc3545'
    });
  </script>
<?php elseif ($this->session->flashdata('pesan') == '<div class="alert alert-success" role="alert">Update Foto Berhasil</div>') : ?>
  <script type="text/javascript">
    $.toast({
      heading: 'Berhasil',
      text: "Update foto berhasil.",
      showHideTransition: 'slide',
      icon: 'success',
      hideAfter: false,
      position: 'bottom-right',
      bgColor: '#7EC857'
    });
  </script>
<?php endif; ?>
</body>

</html>