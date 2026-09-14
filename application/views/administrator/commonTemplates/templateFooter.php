</div>
<!-- / Content -->
<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            ©2023, made with ❤️ by
            <a href="<?= base_url(); ?>" target="_blank" class="footer-link fw-bolder"><?= SITE_NAME; ?></a>
        </div>
        <div>
            <a href="mailto:<?= SITE_MAIL; ?>" class="footer-link me-4" target="_blank"><?= SITE_MAIL; ?></a>
        </div>
    </div>
</footer>
<!-- / Footer -->

<div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
</div>
<!-- / Layout page -->
</div>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->
<div id="toast">
    <div class="toast-icon"> <i class="fas fa-check-square"></i> </div>
    <span></span>
</div>
<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="<?= base_url("assets/administrator/"); ?>assets/vendor/libs/popper/popper.js"></script>
<script src="<?= base_url("assets/administrator/"); ?>assets/vendor/js/bootstrap.js"></script>
<script src="<?= base_url("assets/administrator/"); ?>assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="<?= base_url("assets/administrator/"); ?>assets/vendor/js/menu.js"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<!-- <script src="<?= base_url("assets/administrator/"); ?>assets/vendor/libs/apex-charts/apexcharts.js"></script> -->

<!-- Main JS -->
<script src="<?= base_url("assets/administrator/"); ?>assets/js/main.js"></script>

<!-- Page JS -->
<!-- <script src="<?= base_url("assets/administrator/"); ?>assets/js/dashboards-analytics.js"></script> -->

<script>
    let success_message = "<?= get_message("success"); ?>";
    let error_message = "<?= str_replace("/n", "", get_message("error")); ?>";
    $.urlParam = null;
</script>

<script src="<?= base_url('assets/administrator/'); ?>assets/js/custom.js"></script>

</body>

</html>