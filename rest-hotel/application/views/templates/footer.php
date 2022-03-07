<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>/assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/myScript.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>/assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>/assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>/assets/js/demo/chart-pie-demo.js"></script>

<script src="<?= base_url(); ?>/assets/DataTables/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatables').DataTable();
    });
</script>

<script src="<?= base_url(); ?>/assets/dist/sweetalert2.all.min.js"></script>
<script>
    const flashKamar = $('.flashdata-kamar').data('flashdata');
    const flashKamarErr = $('.flashdata-kamar').data('flasherror');

    const flashJenisKamar = $('.flashdata-jkamar').data('flashdata');
    const flashJenisKamarErr = $('.flashdata-jkamar').data('flasherror');

    const flashMakanan = $('.flashdata-makanan').data('flashdata');
    const flashMakananErr = $('.flashdata-makanan').data('flasherror');

    const flashJenisMakanan = $('.flashdata-jmakanan').data('flashdata');
    const flashJenisMakananErr = $('.flashdata-jmakanan').data('flasherror');

    const flashPesanan = $('.flashdata-pesanan').data('flashdata');
    const flashPesananErr = $('.flashdata-pesanan').data('flasherror');

    const flashCheckin = $('.flashdata-checkin').data('flashdata');
    const flashCheckinErr = $('.flashdata-checkin').data('flasherror');

    const flashCheckout = $('.flashdata-checkout').data('flashdata');
    const flashCheckoutErr = $('flashdata-checkout').data('flasherror');

    const flashRecep = $('.flashdata-recep').data('flashdata');
    const flashRecepErr = $('.flashdata-recep').data('flasherror');

    const flashAkunRecep = $('.flashdata-akunRecep').data('flashdata');
    const flashAkunRecepErr = $('.flashdata-akunRecep').data('flasherror');

    if (flashKamar) {
        Swal.fire({
            title: 'Kamar',
            text: flashKamar,
            icon: 'success'
        });
    } else if (flashKamarErr) {
        Swal.fire({
            title: 'Kamar',
            text: flashKamarErr,
            icon: 'error'
        });
    } else if (flashJenisKamar) {
        Swal.fire({
            title: 'Jenis Kamar',
            text: flashJenisKamar,
            icon: 'success'
        });
    } else if (flashJenisKamarErr) {
        Swal.fire({
            title: 'Jenis Kamar',
            text: flashJenisKamarErr,
            icon: 'error'
        });
    } else if (flashMakanan) {
        Swal.fire({
            title: 'Makanan',
            text: flashMakanan,
            icon: 'success'
        });
    } else if (flashMakananErr) {
        Swal.fire({
            title: 'Makanan',
            text: flashMakananErr,
            icon: 'error'
        });
    } else if (flashJenisMakanan) {
        Swal.fire({
            title: 'Jenis Makanan',
            text: flashJenisMakanan,
            icon: 'success'
        });
    } else if (flashJenisMakananErr) {
        Swal.fire({
            title: 'Jenis Makanan',
            text: flashJenisMakananErr,
            icon: 'error'
        });
    } else if (flashPesanan) {
        Swal.fire({
            title: 'Pesanan',
            text: flashPesanan,
            icon: 'success'
        });
    } else if (flashPesananErr) {
        Swal.fire({
            title: 'Pesanan',
            text: flashPesananErr,
            icon: 'error'
        });
    } else if (flashCheckin) {
        Swal.fire({
            title: 'Checkin',
            text: flashCheckin,
            icon: 'success'
        });
    } else if (flashCheckinErr) {
        Swal.fire({
            title: 'Checkin',
            text: flashCheckinErr,
            icon: 'error'
        });
    } else if (flashCheckout) {
        Swal.fire({
            title: 'Checkout',
            text: flashCheckout,
            icon: 'success'
        });
    } else if (flashCheckoutErr) {
        Swal.fire({
            title: 'Checkout',
            text: flashCheckoutErr,
            icon: 'error'
        });
    } else if (flashRecep) {
        Swal.fire({
            title: 'Receptionist',
            text: flashRecep,
            icon: 'success'
        });
    } else if (flashRecepErr) {
        Swal.fire({
            title: 'Receptionist',
            text: flashRecepErr,
            icon: 'error'
        });
    } else if (flashAkunRecep) {
        Swal.fire({
            title: 'Akun Receptionist',
            text: flashAkunRecep,
            icon: 'success'
        });
    } else if (flashAkunRecepErr) {
        Swal.fire({
            title: 'Akun Receptionist',
            text: flashAkunRecepErr,
            icon: 'error'
        });
    }
</script>

</body>

</html>