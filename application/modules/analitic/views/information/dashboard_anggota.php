<div class="container p-3">
    <div class="row">
        <div class="col-lg-4 gender card-small">
            <h4 class="text-center mt-3">Jenis Kelamin</h4>
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-6 position-relative text-center">
                    <span class="position-absolute val-male h4"><?= $genderLaki ?></span>
                    <img class="icon" src="<?= base_url() ?>assets/img/info/male.png">
                </div>

                <div class="col-6 position-relative text-center">
                    <img class="icon" src="<?= base_url() ?>assets/img/info/female.png">
                    <span class="position-absolute val-female h4"><?= $genderPerempuan ?></span>
                </div>
            </div>
        </div>

        <div class="col-lg-4 blood card-small p-3">
            <?php $gol = $golongan->result(); ?>
            <h4 class="text-center">Golongan Darah</h4>
            <div style="margin-left: -30px;position:relative" class="form-inline ml-1  justify-content-center ">
                <span class="badge badge-danger m-4 p-2"><?= $gol[1]->total ?></span>
                <span class="badge badge-success m-3 p-2 ml-2"><?= $gol[2]->total ?></span>
                <span class="badge badge-info m-3 p-2 ml-2"><?= $gol[0]->total ?></span>
                <span class="badge badge-warning m-3 p-2 ml-2"><?= $gol[3]->total ?></span>
            </div>
            <img style="margin-top:-40px" class="img-fluid" src="<?= base_url() ?>assets/img/info/golongan-darah.png">

        </div>

        <div class="col-lg-4 kta card-small p-3">
            <h4 class="text-center">Status KTA</h4>
            <div class="row" style="margin-bottom: 100px;">
                <div class="col-6 position-relative text-center">
                    <img class="icon" src="<?= base_url() ?>assets/img/info/kta-on.png">
                    <span class="val-on h4"><?= $statusKta->status_aktif; ?></span>
                </div>

                <div class="col-6 position-relative text-center">
                    <img class="icon" src="<?= base_url() ?>assets/img/info/kta-off.png">
                    <span class="val-off h4"><?= $statusKta->status_tdk_aktif; ?></span>
                </div>
            </div>
        </div>

        <div class="col-lg-12 card-small age">
            <?php $usia = $umur->result(); ?>

            <h2 class="text-center mt-3">Usia</h2>
            <div class="row">
                <div class="col age-1 d-flex flex-column text-center">
                    <span class="range h6"><?= $usia[0]->range_umur; ?></span>
                    <img class="icon" src="<?= base_url() ?>assets/img/info/18-30.png">
                    <span class="val"><?= $usia[0]->jumlah; ?></span>
                </div>
                <div class="col age-2 d-flex flex-column text-center">
                    <span class="range h6"><?= $usia[1]->range_umur; ?></span>
                    <img class="icon" src="<?= base_url() ?>assets/img/info/31-40.png">
                    <span class="val"><?= $usia[1]->jumlah; ?></span>
                </div>
                <div class="col age-3 d-flex flex-column text-center">
                    <span class="range h6"><?= $usia[2]->range_umur; ?></span>
                    <img class="icon" src="<?= base_url() ?>assets/img/info/41-50.png">
                    <span class="val"><?= $usia[2]->jumlah; ?></span>
                </div>
                <div class="col age-4 d-flex flex-column text-center">
                    <span class="range h6"><?= $usia[3]->range_umur; ?></span>
                    <img class="icon" src="<?= base_url() ?>assets/img/info/50.png">
                    <span class="val"><?= $usia[3]->jumlah; ?></span>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-12 religion p-3">
                    <h5 class="card-title text-center mb-5">AGAMA</h5>
                    <div class="row">
                        <?php foreach ($agama as $key => $itm) {
                            echo '<div class="col d-flex flex-column text-center">
                                <img class="icon" src="<?= base_url() ?>assets/img/info/' . $itm->icon . '">
                                <span style="font-size: 10px">' . $itm->name . '</span>
                                <span class="val h5">' . $itm->total . '</span>
                            </div>';
                        } ?>
                    </div>
                </div> -->

        <div class="col-lg-12 place p-3" style="background-color: #FFF;">
            <!-- <div class="card">
                        <div class="card-body"> -->
            <h3 class="text-center">Tempat Tinggal</h3>
            <!-- <img class="img-fluid" src="<?= base_url() ?>assets/img/info/maps.png"> -->
            <div id="map" class="mt-4"></div>
            <!-- </div>
                    </div> -->
        </div>

        <div class="small-card col-lg-12 place-from mb-4 p-3" style="background-color: #FFF;">
            <h3 class="text-center ">Tempat Asal</h3>
            <!-- <img class="img-fluid" src="<?= base_url() ?>assets/img/info/maps.png"> -->
            <div id="mapAsal" class="mt-4"></div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var planes = [

        <?php
        foreach ($tempatTinggalAll->result() as $key => $tgl) {
            if ($tgl->kota === 'BEKASI') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.2348,106.9924';
            } elseif ($tgl->kota == 'JAKARTA BARAT') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.1767,106.7552';
            } elseif ($tgl->kota == 'JAKARTA SELATAN') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.2675,106.8077';
            } elseif ($tgl->kota == 'JAKARTA UTARA') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.1392,106.8723';
            } elseif ($tgl->kota == 'JAKARTA TIMUR') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.2409,106.8942';
            } elseif ($tgl->kota == 'JAKARTA PUSAT') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.1802,106.8379';
            } elseif ($tgl->kota == 'DEPOK') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.4064,106.8159';
            } elseif ($tgl->kota == 'BOGOR') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.59627,106.79723';
            } elseif ($tgl->kota == 'KARAWANG') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.3030,107.3076';
            } elseif ($tgl->kota == 'TANGERANG') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.1754,106.6378';
            } elseif ($tgl->kota == 'SUBANG') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.5689,107.7582';
            } elseif ($tgl->kota == 'PURWAKARTA') {
                $name = $tgl->kota;
                $total = $tgl->total;
                $lang = '-6.5602,107.4429';
            }

            if (isset($name)) {
                echo '["<center>' . $name . '<br><b>' . $total . '</b></center>", ' . $lang . '],';
            }
        }
        ?>
    ];

    var map = L.map('map').setView([-6.4159, 106.9231], 9.10);
    mapLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapLink + ' Contributors',
            maxZoom: 18,
        }).addTo(map);

    for (var i = 0; i < planes.length; i++) {
        marker = new L.marker([planes[i][1], planes[i][2]])
            // .bindPopup(planes[i][0])
            .bindTooltip(planes[i][0], {
                permanent: true,
                direction: 'top'
            }).openTooltip()
            .addTo(map);
    }

    var listProvAsal = [
        <?php
        foreach ($tempatAsal as $key => $la) {
            if ($la->latitude !== '' && $la->longitude !== '')
                echo '["<center>' . $la->prov_name . '<br><b>' . $la->total . '</b></center>", ' . $la->latitude . ',' . $la->longitude . '],';
        }
        ?>
    ];

    var mapAsal = L.map('mapAsal').setView([-2.021, 114.917], 5.10);
    mapAsalLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

    L.tileLayer(
        'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; ' + mapAsalLink + ' Contributors',
            maxZoom: 18,
        }).addTo(mapAsal)

    $.getJSON("<?= site_url('analitic/information/Anggota/leflateJson'); ?>")
        .then(function(data) {
            L.geoJson(data, {
                pointToLayer: function(feature, latlng) {
                    var marker = L.marker(latlng);
                    marker.bindTooltip(feature.properties.popupContent, {
                        permanent: true,
                        direction: 'top'
                    }).openTooltip();
                    return marker;
                }
            }).addTo(mapAsal);
        })
        .fail(function(err) {
            console.log(err.responseText)
        });
</script>