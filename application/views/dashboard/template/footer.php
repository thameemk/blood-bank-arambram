</div>
</div>
<!-- Right Panel -->


<script src="<?= base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>

<script src="<?= base_url() ?>assets/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/assets/vendors/jquery-validation-unobtrusive/src/jquery.validate.unobtrusive.js"></script>

<script src="<?= base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>


<?php if ($page == 'my-blood-donations' || $page='view-all-donors') { ?>
    <script src="<?= base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url() ?>assets/js/init-scripts/data-table/datatables-init.js"></script>
<?php } ?>

</body>

</html>