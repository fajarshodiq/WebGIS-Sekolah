<?= $this->extend('template/BaseView'); ?>
<?= $this->section('content'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?= $heading; ?></h1>
    </div>
    <?= $this->include('template/statusBar'); ?>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Peta Sekolah</h6>
                </div>
                <div class="card-body">
                    <div id="mapid" style=" height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- Leaflet -->
<link rel="stylesheet" href="<?= base_url('js/leaflet/leaflet.css'); ?>" />
<script src="<?= base_url('js/leaflet/leaflet.js'); ?>"></script>
<script async='async' type='text/javascript'>
    var L = window.L;
    var mymap = L.map('mapid').setView([-5.199659877215283, 104.96840229100722], 12);

    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(mymap);

    <?php foreach ($data as $i) { ?>
        L.marker([<?= $i['latitude']; ?>, <?= $i['longitude']; ?>]).bindPopup(
            "<img src='<?= base_url('img/sekolah') . "/" . $i['foto_sekolah']; ?>' class='img-fluid'>" +
            "<b><?= $i['nama_sekolah']; ?></b>" +
            "<br>Kepala Sekolah : <?= $i['kepala_sekolah']; ?>").addTo(mymap);
    <?php } ?>
</script>
<?= $this->endSection(); ?>