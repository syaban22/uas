<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Online Job Application <?= date('Y'); ?> | <a href="https://colorlib.com" target="_blank">Colorlib</a></span>
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

<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas icon fa-lock fa-fw"></i> Login diperlukan</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Silahkan lakukan login terlebih dahulu untuk melanjutkan.</div>
      <div class="modal-footer">
        <button class="btn" type="button" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- JavaScripts -->
<!-- <script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/jquery-1.8.3.min.js"></script> -->
<script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/jquery-3.3.1.min.js"></script>
<!-- <script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/functions.js"></script>
<script type="text/javascript" defer src="<?= base_url('asset/'); ?>js/public_js/jquery.flexslider.js"></script> -->

<!-- <script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/jquery.stellar.min.js"></script>
<script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/jquery.magnific-popup.min.js"></script> -->
<script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/aos.js"></script>
<script type="text/javascript" src="<?= base_url('asset/'); ?>js/public_js/main.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('asset/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>
<!-- <script>
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
</script> -->

<script>
  $(document).ready(function() {
    $("#load").fadeOut(1000);
  });
</script>
</body>

</html>