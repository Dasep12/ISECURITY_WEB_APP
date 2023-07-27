<style type="text/css">
    #preloader2 {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background-color: #fff;
        opacity: 0.9;
        display: none;
    }

    #preloader2 .loading {
        position: absolute;
        left: 40%;
        top: 50%;
        /* transform: translate(-50%, -50%); */
        font: 14px arial;
    }

    .pin2 {
        position: absolute;
        top: 40%;
        left: 50%;
        margin-left: 115px;
        border-radius: 50%;
        border: 8px solid #000;
        width: 8px;
        height: 8px;
    }

    .pin2::after {
        position: absolute;
        content: '';
        width: 0px;
        height: 0px;
        bottom: -30px;
        left: -6px;
        border: 10px solid transparent;
        border-top: 17px solid #000;
    }

    .tooltiptext {
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        font-size: 10px;
        position: absolute;
        z-index: 1;
    }

    .tooltiptext::after {
        content: " ";
        position: absolute;
        text-align: wordwrap;
        top: 100%;
        /* At the bottom of the tooltip */
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .marker_map_karawang .tooltiptext {
        width: 100px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        font-size: 10px;
        position: absolute;
        z-index: 1;
    }

    .marker_map_karawang .teljambar {
        margin-left: -50px;
    }



    .marker_map_karawang .tooltiptext::after {
        content: " ";
        position: absolute;
        text-align: wordwrap;
        top: 100%;
        /* At the bottom of the tooltip */
        left: 50%;
        margin-left: 5px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .marker_map_karawang .teljambar::after {
        margin-left: 35px !important;
        content: " ";
        position: absolute;
        text-align: wordwrap;
        top: 100%;
        /* At the bottom of the tooltip */
        left: 50%;
        margin-left: 5px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .marker_map_karawang .majalaya::after {
        content: " ";
        position: absolute;
        text-align: wordwrap;
        top: 100%;
        /* At the bottom of the tooltip */
        left: 50%;
        margin-left: -25px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .lab {
        position: absolute;
        top: 25px;
        text-align: center;
        left: -20px;
        color: #FFF;
    }

    .pademangan_map {
        position: relative;
        display: wrap;
        margin-left: 38% !important;
        top: 90px;
    }

    .penjaringan_map {
        position: relative;
        top: 30px;
        left: 90px !important;
    }

    .priok_map {
        position: relative;
        display: wrap;
        margin-left: 55% !important;
        top: 90px;
    }

    .koja_map {
        position: relative;
        display: wrap;
        margin-left: 66% !important;
        top: 30px;
    }

    .gading_map {
        position: relative;
        display: wrap;
        margin-left: 65% !important;
        top: 180px;
    }

    .cilincing_map {
        position: relative;
        display: wrap;
        margin-left: 82% !important;
        top: 70px;
    }

    .teljamba_map {
        position: relative;
        display: wrap;
        margin-left: 27% !important;
        top: 140px;
    }

    .teljamti_map {
        position: relative;
        display: wrap;
        margin-left: 35% !important;
        top: 150px;
    }

    .klari_map {
        position: relative;
        display: wrap;
        margin-left: 50% !important;
        top: 210px;
    }

    .ciampel_map {
        position: relative;
        display: wrap;
        margin-left: 42% !important;
        top: 240px;
    }

    .majalaya_map {
        position: relative;
        display: wrap;
        margin-left: 47% !important;
        top: 110px;
    }

    .karaba_map {
        position: relative;
        display: wrap;
        margin-left: 35% !important;
        top: 40px;
    }

    .karatim_map {
        position: relative;
        display: wrap;
        margin-left: 43% !important;
        top: 70px;
    }

    #marker_map_karawang {
        margin-left: 50px;
    }

    @media screen and (min-width: 1920px) {
        .pademangan_map {
            position: relative;
            display: wrap;
            margin-left: 37% !important;
            top: -20px;
        }

        .penjaringan_map {
            position: relative;
            display: wrap;
            margin-left: 15% !important;
            top: -10px;
        }

        .priok_map {
            position: relative;
            display: wrap;
            margin-left: 50% !important;
            top: 10px;
        }

        .koja_map {
            position: relative;
            display: wrap;
            margin-left: 57% !important;
            top: -30px;
        }

        .gading_map {
            position: relative;
            display: wrap;
            margin-left: 57% !important;
            top: 90px;
        }

        .cilincing_map {
            position: relative;
            display: wrap;
            margin-left: 68% !important;
            top: -20px;
        }

        .teljamba_map {
            position: relative;
            display: wrap;
            margin-left: 68% !important;
            top: -20px;
        }

        .nkb_jakut {
            margin-left: 8px;
        }

        .kks_jakut {
            margin-right: -10px;
        }

        #map_jakut_img {
            margin-left: 150px !important;
            height: 600px !important;
            margin-top: -140px !important;
            height: 600px;
        }
    }
</style>
<div id="preloader2">
    <div class="loading">
        <div style="z-index:9999;" class="row justify-content-center">
            <div class="spinner-grow text-primary " role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary ml-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-success ml-1 " role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-danger ml-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-warning ml-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-info ml-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <div class="spinner-grow text-dark ml-1" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
</div>

<section class="content-header">
    <div class="container-fluid">

    </div>
</section>

<section class="content" style="margin-top:-60px">
    <div class="container-fluid">
        <div class="row  mt-5 md-2">
            <div class="col-lg-2">
                <select name="tahun" id="tahun" class="form-control">
                    <option value="">Pilih Tahun</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
            </div>
            <div class="col-lg-2">
                <select name="bulan" id="bulan" class="form-control">
                    <option value="">Pilih Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div id="jakartaUtaraSetahun"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card cardIn">
                    <div class="card-body">
                        <div id="karawangSetahun"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:-40px">
            <div class="col-lg-6">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div id="CrimeperAreaJakut"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card cardIn">
                    <div class="card-body">
                        <div id="CrimeperAreaKarawang"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:-40px;">
            <div class="col-lg-8">
                <div class="card cardIn2" style="height:560px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-11">
                            <div class="form-group text-center">
                                <h3 class="ml-2 text-center">Mapping Crime Index Jakarta Utara</h3>
                                <span class="text-center">Periode <span id="monthly_jakut">September</span> <span id="year_jakut"><?= date('Y') ?></span></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div id="maps_jakarta"></div> -->
                        <div class="marker_map" style="position: relative;">
                            <div class="penjaringan_map">
                                <span style="top:80px" class="tooltiptext">Penjaringan <span id="total_penjaringan">(0)</span></span>
                                <img height="60px" id="penjaringan_image" width="60px" src="<?= base_url('assets/img/info/marker6.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="pademangan_map">
                                <span style="top:80px" class="tooltiptext">Pademangan <span id="total_pademangan">(0)</span></span>
                                <img height="60px" id="pademangan_image" width="60px" src="<?= base_url('assets/img/info/marker2.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>


                            <div class="priok_map">
                                <span style="top:80px" class="tooltiptext">Tanjung Priok<span id="total_priok">(0)</span></span>
                                <img height="60px" id="priok_image" width="60px" src="<?= base_url('assets/img/info/marker5.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="koja_map">
                                <span style="top:80px" class="tooltiptext">Koja<span id="total_koja">(0)</span></span>
                                <img height="60px" id="koja_image" width="60px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="gading_map">
                                <span style="top:80px" class="tooltiptext">Kelapa Gading<span id="total_gading">(0)</span></span>
                                <img height="60px" id="gading_image" width="60px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="cilincing_map">
                                <span style="top:80px" class="tooltiptext">Cilincing<span id="total_cilincing">(0)</span></span>
                                <img height="60px" id="cilincing_image" width="60px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>


                            <img height="600px" id="map_jakut_img" style="margin-top: -50px;" width="800px" src="<?= base_url("assets/img/info/JAKUT.png") ?>" alt="">
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card cardIn" style="height:560px;">
                    <div class="card-body">

                        <div class="form-group ml-4">
                            <ul class="nav">
                                <li class="nav-item first">
                                    <span class="nav-link">Perjudian</span>
                                </li>
                                <li class="nav-item second">
                                    <span class="nav-link"> Pencurian</span>
                                </li>
                                <li class="nav-item third">
                                    <span class="nav-link">Penggelapan</span>
                                </li>
                                <li class="nav-item four nkb_jakut">
                                    <span class="nav-link">Narkoba</span>
                                </li>
                                <li class="nav-item five kks_jakut">
                                    <span class="nav-link"> Kekerasan</span>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="">Penjaringan</label>
                            <span id="sample"></span>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="penjaringan_perjudian" style="width:<?= $penjaringan_perjudian <= 2 ? 5 : $penjaringan_perjudian + 5 ?>%">
                                    <?= $penjaringan_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="penjaringan_pencurian" style="width:<?= $penjaringan_pencurian <= 2 ? 5 : $penjaringan_pencurian + 5 ?>%">
                                    <?= $penjaringan_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="penjaringan_penggelapan" style="width:<?= $penjaringan_penggelapan <= 2 ? 5 : $penjaringan_penggelapan + 5 ?>%">
                                    <?= $penjaringan_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="penjaringan_narkoba" style="width:<?= $penjaringan_narkoba <= 2 ? 5 : $penjaringan_narkoba + 5 ?>%">
                                    <?= $penjaringan_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="penjaringan_kekerasan" style="width:<?= $penjaringan_kekerasan <= 2 ? 5 : $penjaringan_kekerasan + 5 ?>%">
                                    <?= $penjaringan_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Koja</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="koja_perjudian" style="width:<?= $koja_perjudian <= 2 ? 5 : $koja_perjudian + 5 ?>%">
                                    <?= $koja_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="koja_pencurian" style="width:<?= $koja_pencurian <= 2 ? 5 : $koja_pencurian + 5 ?>%">
                                    <?= $koja_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="koja_penggelapan" style="width:<?= $koja_penggelapan <= 2 ? 5 : $koja_penggelapan + 5 ?>%">
                                    <?= $koja_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="koja_narkoba" style="width:<?= $koja_narkoba <= 2 ? 5 : $koja_narkoba + 5 ?>%">
                                    <?= $koja_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="koja_kekerasan" style="width:<?= $koja_kekerasan <= 2 ? 5 : $koja_kekerasan + 5 ?>%">
                                    <?= $koja_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Tanjung Priok</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="tanjung_priok_perjudian" style="width:<?= $tanjung_priok_perjudian <= 2 ? 5 : $tanjung_priok_perjudian + 5 ?>%">
                                    <?= $tanjung_priok_perjudian ?>
                                </div>
                                <div class="progress-bar  bg-success" id="tanjung_priok_pencurian" style="width:<?= $tanjung_priok_pencurian <= 2 ? 5 : $tanjung_priok_pencurian + 5 ?>%">
                                    <?= $tanjung_priok_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="tanjung_priok_penggelapan" style="width:<?= $tanjung_priok_penggelapan <= 2 ? 5 : $tanjung_priok_penggelapan + 5 ?>%">
                                    <?= $tanjung_priok_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="tanjung_priok_narkoba" style="width:<?= $tanjung_priok_narkoba <= 2 ? 5 : $tanjung_priok_narkoba + 5 ?>%">
                                    <?= $tanjung_priok_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="tanjung_priok_kekerasan" style="width:<?= $tanjung_priok_kekerasan <= 2 ? 5 : $tanjung_priok_kekerasan + 5 ?>%">
                                    <?= $tanjung_priok_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Pademangan</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="pademangan_perjudian" style="width:<?= $pademangan_perjudian <= 2 ? 5 : $pademangan_perjudian + 5 ?>%">
                                    <?= $pademangan_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="pademangan_pencurian" style="width:<?= $pademangan_pencurian <= 2 ? 5 : $pademangan_pencurian + 5 ?>%">
                                    <?= $pademangan_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="pademangan_penggelapan" style="width:<?= $pademangan_penggelapan <= 2 ? 5 : $pademangan_penggelapan + 5 ?>%">
                                    <?= $pademangan_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="pademangan_narkoba" style="width:<?= $pademangan_narkoba <= 2 ? 5 : $pademangan_narkoba + 5 ?>%">
                                    <?= $pademangan_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="pademangan_kekerasan" style="width:<?= $pademangan_kekerasan <= 2 ? 5 : $pademangan_kekerasan + 5 ?>%">
                                    <?= $pademangan_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Cilincing</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="cilincing_perjudian" style="width:<?= $cilincing_perjudian <= 2 ? 5 : $cilincing_perjudian + 5 ?>%">
                                    <?= $cilincing_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="cilincing_pencurian" style="width:<?= $cilincing_pencurian <= 2 ? 5 : $cilincing_pencurian + 5 ?>%">
                                    <?= $cilincing_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="cilincing_penggelapan" style="width:<?= $cilincing_penggelapan <= 2 ? 5 : $cilincing_penggelapan + 5 ?>%">
                                    <?= $cilincing_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="cilincing_narkoba" style="width:<?= $cilincing_narkoba <= 2 ? 5 : $cilincing_narkoba + 5 ?>%">
                                    <?= $cilincing_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="cilincing_kekerasan" style="width:<?= $cilincing_kekerasan <= 2 ? 5 : $cilincing_kekerasan + 5 ?>%">
                                    <?= $cilincing_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Kelapa Gading</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="kelapa_gading_perjudian" style="width:<?= $kelapa_gading_perjudian <= 2 ? 5 : $kelapa_gading_perjudian + 5 ?>%">
                                    <?= $kelapa_gading_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="kelapa_gading_pencurian" style="width:<?= $kelapa_gading_pencurian <= 2 ? 5 : $kelapa_gading_pencurian + 5 ?>%">
                                    <?= $kelapa_gading_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="kelapa_gading_penggelapan" style="width:<?= $kelapa_gading_penggelapan <= 2 ? 5 : $kelapa_gading_penggelapan + 5 ?>%">
                                    <?= $kelapa_gading_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="kelapa_gading_narkoba" style="width:<?= $kelapa_gading_narkoba <= 2 ? 5 : $kelapa_gading_narkoba + 5 ?>%">
                                    <?= $kelapa_gading_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="kelapa_gading_kekerasan" style="width:<?= $kelapa_gading_kekerasan <= 2 ? 5 : $kelapa_gading_kekerasan + 5 ?>%">
                                    <?= $kelapa_gading_kekerasan ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:-40px;">
            <div class="col-lg-4">
                <div class="card cardIn" style="height:620px;">
                    <div class="card-body">
                        <div class="form-group ml-4">
                            <ul class="nav">
                                <li class="nav-item first">
                                    <span class="nav-link">Perjudian</span>
                                </li>
                                <li class="nav-item second">
                                    <span class="nav-link"> Pencurian</span>
                                </li>
                                <li class="nav-item third">
                                    <span class="nav-link">Penggelapan</span>
                                </li>
                                <li class="nav-item four">
                                    <span class="nav-link">Narkoba</span>
                                </li>
                                <li class="nav-item five">
                                    <span class="nav-link">Kekerasan</span>
                                </li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="">Teluk Jambe Barat</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="teluk_jambe_barat_perjudian" id="teluk_jambe_barat_perjudian" style="width:<?= $teluk_jambe_barat_perjudian <= 2 ? 5 : $teluk_jambe_barat_perjudian + 5 ?>%">
                                    <?= $teluk_jambe_barat_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="teluk_jambe_barat_pencurian" style="width:<?= $teluk_jambe_barat_pencurian <= 2 ? 5 : $teluk_jambe_barat_pencurian + 5 ?>%">
                                    <?= $teluk_jambe_barat_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="teluk_jambe_barat_penggelapan" style="width:<?= $teluk_jambe_barat_penggelapan <= 2 ? 5 : $teluk_jambe_barat_penggelapan + 5 ?>%">
                                    <?= $teluk_jambe_barat_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="teluk_jambe_barat_narkoba" style="width:<?= $teluk_jambe_barat_narkoba <= 2 ? 5 : $teluk_jambe_barat_narkoba + 5 ?>%">
                                    <?= $teluk_jambe_barat_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="teluk_jambe_barat_kekerasan" style="width:<?= $teluk_jambe_barat_kekerasan <= 2 ? 5 : $teluk_jambe_barat_kekerasan + 5 ?>%">
                                    <?= $teluk_jambe_barat_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Teluk Jambe Timur</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="teluk_jambe_timur_perjudian" s style="width:<?= $teluk_jambe_timur_perjudian <= 2 ? 5 : $teluk_jambe_timur_perjudian + 5 ?>%">
                                    <?= $teluk_jambe_timur_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="teluk_jambe_timur_pencurian" style="width:<?= $teluk_jambe_timur_pencurian <= 2 ? 5 : $teluk_jambe_timur_pencurian + 5 ?>%">
                                    <?= $teluk_jambe_timur_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="teluk_jambe_timur_penggelapan" style="width:<?= $teluk_jambe_timur_penggelapan <= 2 ? 5 : $teluk_jambe_timur_penggelapan + 5 ?>%">
                                    <?= $teluk_jambe_timur_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="teluk_jambe_timur_narkoba" style="width:<?= $teluk_jambe_timur_narkoba <= 2 ? 5 : $teluk_jambe_timur_narkoba + 5 ?>%">
                                    <?= $teluk_jambe_timur_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="teluk_jambe_timur_kekerasan" style="width:<?= $teluk_jambe_timur_kekerasan <= 2 ? 5 : $teluk_jambe_timur_kekerasan + 5 ?>%">
                                    <?= $teluk_jambe_timur_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Klari</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="klari_perjudian" style="width:<?= $klari_perjudian <= 2 ? 5 : $klari_perjudian + 5 ?>%">
                                    <?= $klari_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="klari_pencurian" style="width:<?= $klari_pencurian <= 2 ? 5 : $klari_pencurian + 5 ?>%">
                                    <?= $klari_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="klari_penggelapan" style="width:<?= $klari_penggelapan <= 2 ? 5 : $klari_penggelapan + 5 ?>%">
                                    <?= $klari_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="klari_narkoba" style="width:<?= $klari_narkoba <= 2 ? 5 : $klari_narkoba + 5 ?>%">
                                    <?= $klari_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="klari_kekerasan" style="width:<?= $klari_kekerasan <= 2 ? 5 : $klari_kekerasan + 5 ?>%">
                                    <?= $klari_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ciampel</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="ciampel_perjudian" style="width:<?= $klari_perjudian <= 2 ? 5 : $klari_perjudian + 5 ?>%">
                                    <?= $klari_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="ciampel_pencurian" style="width:<?= $klari_pencurian <= 2 ? 5 : $klari_pencurian + 5 ?>%">
                                    <?= $klari_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="ciampel_penggelapan" style="width:<?= $klari_penggelapan <= 2 ? 5 : $klari_penggelapan + 5 ?>%">
                                    <?= $klari_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="ciampel_narkoba" style="width:<?= $klari_narkoba <= 2 ? 5 : $klari_narkoba + 5 ?>%">
                                    <?= $klari_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="ciampel_kekerasan" style="width:<?= $klari_kekerasan <= 2 ? 5 : $klari_kekerasan + 5 ?>%">
                                    <?= $klari_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Majalaya</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="majalaya_perjudian" style="width:<?= $majalaya_perjudian <= 2 ? 5 : $majalaya_perjudian + 5 ?>%">
                                    <?= $majalaya_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="majalaya_pencurian" style="width:<?= $majalaya_pencurian <= 2 ? 5 : $majalaya_pencurian + 5 ?>%">
                                    <?= $majalaya_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="majalaya_penggelapan" style="width:<?= $majalaya_penggelapan <= 2 ? 5 : $majalaya_penggelapan + 5 ?>%">
                                    <?= $majalaya_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="majalaya_narkoba" style="width:<?= $majalaya_narkoba <= 2 ? 5 : $majalaya_narkoba + 5 ?>%">
                                    <?= $majalaya_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="majalaya_kekerasan" style="width:<?= $majalaya_kekerasan <= 2 ? 5 : $majalaya_kekerasan + 5 ?>%">
                                    <?= $majalaya_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Karawang Barat</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="karawang_barat_perjudian" style="width:<?= $karawang_barat_perjudian <= 2 ? 5 : $karawang_barat_perjudian + 5 ?>%">
                                    <?= $karawang_barat_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="karawang_barat_pencurian" style="width:<?= $karawang_barat_pencurian <= 2 ? 5 : $karawang_barat_pencurian + 5 ?>%">
                                    <?= $karawang_barat_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="karawang_barat_penggelapan" style="width:<?= $karawang_barat_penggelapan <= 2 ? 5 : $karawang_barat_penggelapan + 5 ?>%">
                                    <?= $karawang_barat_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="karawang_barat_narkoba" style="width:<?= $karawang_barat_narkoba <= 2 ? 5 : $karawang_barat_narkoba + 5 ?>%">
                                    <?= $karawang_barat_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="karawang_barat_kekerasan" style="width:<?= $karawang_barat_kekerasan <= 2 ? 5 : $karawang_barat_kekerasan + 5 ?>%">
                                    <?= $karawang_barat_kekerasan ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Karawang Timur</label>
                            <div class="progress" style="max-width: 100%">
                                <div class="progress-bar" id="karawang_timur_perjudian" style="width:<?= $karawang_timur_perjudian <= 2 ? 5 : $karawang_timur_perjudian + 5 ?>%">
                                    <?= $karawang_timur_perjudian ?>
                                </div>
                                <div class="progress-bar bg-success" id="karawang_timur_pencurian" style="width:<?= $karawang_timur_pencurian <= 2 ? 5 : $karawang_timur_pencurian + 5 ?>%">
                                    <?= $karawang_timur_pencurian ?>
                                </div>
                                <div class="progress-bar bg-danger progress-bar-stripped" id="karawang_timur_penggelapan" style="width:<?= $karawang_timur_penggelapan <= 2 ? 5 : $karawang_timur_penggelapan + 5 ?>%">
                                    <?= $karawang_timur_penggelapan ?>
                                </div>
                                <div class="progress-bar bg-warning progress-bar-stripped" id="karawang_timur_narkoba" style="width:<?= $karawang_timur_narkoba <= 2 ? 5 : $karawang_timur_narkoba + 5 ?>%">
                                    <?= $karawang_timur_narkoba ?>
                                </div>
                                <div class="progress-bar bg-dark progress-bar-stripped" id="karawang_timur_kekerasan" style="width:<?= $karawang_timur_kekerasan <= 2 ? 5 : $karawang_timur_kekerasan + 5 ?>%">
                                    <?= $karawang_timur_kekerasan ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card cardIn2" style="height:620px;">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <h3 class="ml-2 text-center">Mapping Crime Index Karawang</h3>
                                <span class="text-center">Periode <span id="monthly_karawang"></span> 2022</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- <div id="map_karawang"></div> -->
                        <div class="marker_map_karawang" style="position: absolute;">
                            <div class="teljamba_map">
                                <span style="top:85px" class="tooltiptext teljambar">Teluk Jambe Barat<span id="total_teljamba">(0)</span></span>
                                <img height="50px" id="teljamba_image" width="50px" src="<?= base_url('assets/img/info/marker6.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="teljamti_map">
                                <span style="top:85px" class="tooltiptext">Teluk Jambe Timur<span id="total_teljamti">(0)</span></span>
                                <img height="50px" id="teljamti_image" width="50px" src="<?= base_url('assets/img/info/marker2.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>


                            <div class="klari_map">
                                <span style="top:85px" class="tooltiptext">Klari<span id="total_klari">(0)</span></span>
                                <img height="50px" id="klari_image" width="50px" src="<?= base_url('assets/img/info/marker5.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="ciampel_map">
                                <span style="top:85px" class="tooltiptext">Ciampel<span id="total_ciampel">(0)</span></span>
                                <img height="50px" id="ciampel_image" width="50px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="majalaya_map">
                                <span style="top:85px;margin-left:40px" class="tooltiptext majalaya">Majalaya<span id="total_majalaya">(0)</span></span>
                                <img height="50px" id="majalaya_image" width="50px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="karaba_map">
                                <span style="top:85px" class="tooltiptext ">Karawang Barat<span id="total_karaba">(0)</span></span>
                                <img height="50px" id="karaba_image" width="50px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>

                            <div class="karatim_map">
                                <span style="top:85px" class="tooltiptext">Karawang Timur<span id="total_karatim">(0)</span></span>
                                <img height="50px" id="karatim_image" width="50px" src="<?= base_url('assets/img/info/marker1.png') ?>" alt="" style="position: absolute;top: 120px;left: 30px;">
                            </div>


                            <img height="600px" id="map_karawang_img" style="margin-top: -80px;margin-left:-40px" width="110%" src="<?= base_url("assets/img/info/map_karawang.png") ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="row" style="margin-top:-40px">
        <div class="col-lg-12">
            <div class="card cardIn2 ">
                <div class="card-body">
                    <div id="trendCrime"></div>
                </div>
            </div>
        </div>
    </div> -->

</section>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>

<script src="https://unpkg.com/leaflet@1.9.0/dist/leaflet.js" integrity="sha256-oH+m3EWgtpoAmoBO/v+u8H/AdwB/54Gc/SgqjUKbb4Y=" crossorigin=""></script>




<script>
    var thn = <?= date('Y') ?>;
    var blan = <?= date('m') ?>;

    // console.log(thn)

    // function mappingJakut(tahun, bulan) {
    //     document.getElementById("maps_jakarta").innerHTML = "<div id='map2'></div>";
    //     var mapAsal = L.map('map2').setView([-6.1387788, 106.829449], 12.4);
    //     mapAsalLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

    //     var icon_standar = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker3.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     var icon_bahaya = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker2.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     var icon_sangat_bahaya = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker4.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     L.tileLayer(
    //         'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //             attribution: '&copy; ' + mapAsalLink + ' Contributors',
    //             maxZoom: 18,
    //         }).addTo(mapAsal)
    //     $.getJSON("<?= site_url('analitic/crime/Crime/mapJakut?bulan='); ?>" + bulan + "&tahun=" + tahun)
    //         .then(function(data) {
    //             L.geoJson(data, {
    //                 pointToLayer: function(feature, latlng) {
    //                     var res = feature.properties.res;
    //                     var marker = L.marker(latlng, {
    //                         'icon': res <= 5 ? icon_standar : (res <= 10 ? icon_bahaya : icon_sangat_bahaya)
    //                     });
    //                     marker.bindTooltip(feature.properties.popupContent, {
    //                         permanent: true,
    //                         direction: 'top',
    //                         offset: L.point({
    //                             x: 0,
    //                             y: -30
    //                         })
    //                     }).openTooltip();
    //                     return marker;
    //                 }
    //             }).addTo(mapAsal);
    //         })
    //         .fail(function(err) {
    //             console.log(err.responseText)
    //         });

    //     var polygon = L.polygon([
    //         [-6.1160022, 106.7670129],
    //         [-6.166766, 106.8848369],
    //         [-6.1113905, 106.9398002]
    //     ]).addTo(mapAsal);
    //     polygon.setStyle({
    //         fillColor: 'red',
    //         lineColor: 'red'
    //     })

    // }

    function loadMapJakut(thn, blan) {
        $.ajax({
            url: "<?= base_url('analitic/crime/Crime/mapJakut') ?>",
            method: "POST",
            data: {
                tahun: thn,
                bulan: blan
            },
            success: function(e) {
                console.log(e);
                var pademangan = e[0].properties.res;
                var cilincing = e[1].properties.res;
                var penjaringan = e[2].properties.res;
                var priok = e[3].properties.res;
                var koja = e[4].properties.res;
                var gading = e[5].properties.res;
                var dangerIcon = "<?= base_url('assets/img/info/marker2.png') ?>";
                var mediumIcon = "<?= base_url('assets/img/info/marker3.png') ?>";
                var veryDangerIcon = "<?= base_url('assets/img/info/marker4.png') ?>";
                document.getElementById("total_penjaringan").innerHTML = '(' + penjaringan + ')';
                document.getElementById("total_pademangan").innerHTML = '(' + pademangan + ')';
                document.getElementById("total_priok").innerHTML = '(' + priok + ')';
                document.getElementById("total_koja").innerHTML = '(' + koja + ')';
                document.getElementById("total_gading").innerHTML = '(' + gading + ')';
                document.getElementById("total_cilincing").innerHTML = '(' + cilincing + ')';
                var iconPenjaringan = penjaringan <= 5 ? mediumIcon : (penjaringan <= 10 ? dangerIcon : veryDangerIcon);
                var iconPademangan = pademangan <= 5 ? mediumIcon : (pademangan <= 10 ? dangerIcon : veryDangerIcon);
                var iconPriok = priok <= 5 ? mediumIcon : (priok <= 10 ? dangerIcon : veryDangerIcon);
                var iconKoja = koja <= 5 ? mediumIcon : (koja <= 10 ? dangerIcon : veryDangerIcon);
                var iconGading = gading <= 5 ? mediumIcon : (gading <= 10 ? dangerIcon : veryDangerIcon);
                var iconCilincing = cilincing <= 5 ? mediumIcon : (cilincing <= 10 ? dangerIcon : veryDangerIcon);
                $('#penjaringan_image').attr('src', iconPenjaringan);
                $('#pademangan_image').attr('src', iconPademangan);
                $('#koja_image').attr('src', iconKoja);
                $('#cilincing_image').attr('src', iconCilincing);
                $('#priok_image').attr('src', iconPriok);
                $('#gading_image').attr('src', iconGading);
            }

        })
    }
    loadMapJakut(thn, blan);



    // function mappingKarawang(tahun, bulan) {

    //     // var map = L.map('map_karawang').setView([-6.3505035, 107.2483852], 11.5);
    //     // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
    //     document.getElementById("map_karawang").innerHTML = "<div id='map'></div>";
    //     var mapAsal = L.map('map').setView([-6.3505035, 107.2483852], 11.5);
    //     mapAsalLink = '<a href="http://openstreetmap.org">OpenStreetMap</a>';

    //     var icon_standar = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker3.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     var icon_bahaya = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker2.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     var icon_sangat_bahaya = L.icon({
    //         iconUrl: '<?= base_url('assets/img/info/marker4.png') ?>',
    //         iconSize: [60, 60], // size of the icon
    //         shadowSize: [50, 64], // size of the shadow
    //         iconAnchor: [30, 36], // point of the icon which will correspond to marker's location
    //         shadowAnchor: [4, 62], // the same for the shadow
    //     });

    //     L.tileLayer(
    //         'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //             attribution: '&copy; ' + mapAsalLink + ' Contributors',
    //             maxZoom: 18,
    //         }).addTo(mapAsal)
    //     $.getJSON("<?= site_url('analitic/crime/Crime/mapKarawang?bulan='); ?>" + bulan + "&tahun=" + tahun)
    //         .then(function(data) {
    //             L.geoJson(data, {
    //                 pointToLayer: function(feature, latlng) {
    //                     var res = feature.properties.res;
    //                     var marker = L.marker(latlng, {
    //                         'icon': res <= 5 ? icon_standar : (res <= 10 ? icon_bahaya : icon_sangat_bahaya)
    //                     });
    //                     marker.bindTooltip(feature.properties.popupContent, {
    //                         permanent: true,
    //                         direction: 'top',
    //                         offset: L.point({
    //                             x: 0,
    //                             y: -30
    //                         })
    //                     }).openTooltip();
    //                     return marker;
    //                 }
    //             }).addTo(mapAsal);
    //         })
    //         .fail(function(err) {
    //             console.log(err.responseText)
    //         });

    //     var polygon = L.polygon([
    //         [-6.2732436, 107.2426157],
    //         [-6.387137, 107.1218503],
    //         [-6.4809085, 107.2328302],
    //         [-6.318322, 107.3987053],
    //         // [-6.1113905, 106.9398002]
    //     ]).addTo(mapAsal);
    //     polygon.setStyle({
    //         fillColor: 'red',
    //         lineColor: 'red'
    //     })
    // }

    function loadMapKarawang(thn, bln) {
        $.ajax({
            url: "<?= base_url('analitic/crime/Crime/mapKarawang') ?>",
            method: "POST",
            data: {
                tahun: thn,
                bulan: bln
            },
            success: function(e) {
                console.log(e);
                var teljambar = e[0].properties.res;
                var teljamtim = e[1].properties.res;
                var klari = e[2].properties.res;
                var ciampel = e[3].properties.res;
                var majalaya = e[4].properties.res;
                var karaba = e[5].properties.res;
                var karatim = e[6].properties.res;
                var dangerIcon = "<?= base_url('assets/img/info/marker2.png') ?>";
                var mediumIcon = "<?= base_url('assets/img/info/marker3.png') ?>";
                var veryDangerIcon = "<?= base_url('assets/img/info/marker4.png') ?>";
                document.getElementById("total_teljamba").innerHTML = '(' + teljambar + ')';
                document.getElementById("total_teljamti").innerHTML = '(' + teljamtim + ')';
                document.getElementById("total_klari").innerHTML = '(' + klari + ')';
                document.getElementById("total_ciampel").innerHTML = '(' + ciampel + ')';
                document.getElementById("total_majalaya").innerHTML = '(' + majalaya + ')';
                document.getElementById("total_karaba").innerHTML = '(' + karaba + ')';
                document.getElementById("total_karatim").innerHTML = '(' + karatim + ')';
                var iconTeljambar = teljambar <= 5 ? mediumIcon : (teljambar <= 10 ? dangerIcon : veryDangerIcon);
                var iconTeljamtim = teljamtim <= 5 ? mediumIcon : (teljamtim <= 10 ? dangerIcon : veryDangerIcon);
                var iconKlari = klari <= 5 ? mediumIcon : (klari <= 10 ? dangerIcon : veryDangerIcon);
                var iconCiampel = ciampel <= 5 ? mediumIcon : (ciampel <= 10 ? dangerIcon : veryDangerIcon);
                var iconMajalaya = majalaya <= 5 ? mediumIcon : (majalaya <= 10 ? dangerIcon : veryDangerIcon);
                var iconKaraba = karaba <= 5 ? mediumIcon : (karaba <= 10 ? dangerIcon : veryDangerIcon);
                var iconKaratim = karatim <= 5 ? mediumIcon : (karatim <= 10 ? dangerIcon : veryDangerIcon);
                $('#teljamba_image').attr('src', iconTeljambar);
                $('#teljamti_image').attr('src', iconTeljamtim);
                $('#klari_image').attr('src', iconKlari);
                $('#ciampel_image').attr('src', iconCiampel);
                $('#majalaya_image').attr('src', iconMajalaya);
                $('#karaba_image').attr('src', iconKaraba);
                $('#karatim_image').attr('src', iconKaratim);
            }

        })
    }
    loadMapKarawang(thn, blan);


    // mappingKarawang(thn, blan);

    // mappingJakut(thn, blan)



    document.getElementById("monthly_jakut").innerHTML = bulanConvert("<?= date('m') ?>")
    document.getElementById("monthly_karawang").innerHTML = bulanConvert("<?= date('m') ?>")

    function bulanConvert(bulan) {
        var bln = "";
        switch (bulan) {
            case '01':
                bln = "Januari";
                break;
            case '02':
                bln = "Februari";
                break;
            case '03':
                bln = "Maret";
                break;
            case '04':
                bln = "April";
                break;
            case '05':
                bln = "Mei";
                break;
            case '06':
                bln = "Juni";
                break;
            case '07':
                bln = "Juli";
                break;
            case '08':
                bln = "Agustus";
                break;
            case '09':
                bln = "September";
                break;
            case '10':
                bln = "Oktober";
                break;
            case '11':
                bln = "November";
                break;
            case '12':
                bln = "Desember";
                break;
        }

        return bln;
    }

    // function filterCrimeKategori(bulan) {
    //     var id = bulan;
    //     var tahun = $("#tahun").val();
    //     $.ajax({
    //         url: "<?= base_url('analitic/crime/Crime/load_jakut') ?>",
    //         method: "POST",
    //         data: 'bulan=' + id + "&tahun=" + bulan,
    //         beforeSend: function() {
    //             $("#myDropdown").removeClass("show")
    //         },
    //         complete: function() {
    //             // console.log('end')
    //         },
    //         success: function(e) {
    //             document.getElementById("monthly_jakut").innerHTML = bulanConvert(bulan);
    //             var data = JSON.parse(e)
    //             var pademangan = data[0];
    //             var koja = data[1];
    //             var tanjung_priok = data[2];
    //             var penjaringan = data[3];
    //             var cilincing = data[4];
    //             var kelapa_gading = data[5];
    //             const kecamatan = ['penjaringan', 'koja', 'tanjung_priok', 'pademangan', 'cilincing', 'kelapa_gading'];
    //             const params = [penjaringan, koja, tanjung_priok, pademangan, cilincing, kelapa_gading];
    //             const kategori = ['perjudian']

    //             // console.log(params[0][1].perjudian);
    //             for (var i = 0; i < kecamatan.length; i++) {
    //                 // console.log(kecamatan[i] + '=' + params[i][1].narkoba + '\n');
    //                 document.getElementById(kecamatan[i] + '_perjudian').innerHTML = params[i][1].perjudian;
    //                 document.getElementById(kecamatan[i] + '_pencurian').innerHTML = params[i][1].pencurian;
    //                 document.getElementById(kecamatan[i] + '_penggelapan').innerHTML = params[i][1].penggelapan;
    //                 document.getElementById(kecamatan[i] + '_narkoba').innerHTML = params[i][1].narkoba;
    //                 document.getElementById(kecamatan[i] + '_kekerasan').innerHTML = params[i][1].kekerasan;


    //                 document.getElementById(kecamatan[i] + "_perjudian").style.width = params[i][1].perjudian < 5 ? 5 + '%' : params[i][1].perjudian + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_pencurian").style.width = params[i][1].pencurian < 5 ? 5 + '%' : params[i][1].pencurian + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_penggelapan").style.width = params[i][1].penggelapan < 5 ? 5 + '%' : params[i][1].penggelapan + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_kekerasan").style.width = params[i][1].kekerasan < 5 ? 5 + '%' : params[i][1].kekerasan + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_narkoba").style.width = params[i][1].narkoba < 5 ? 5 + '%' : params[i][1].narkoba + 5 + '%'
    //             }
    //             mappingJakut(tahun, bulan)
    //         }
    //     })
    // }

    // function filterCrimeKategoriKarawang(bulan) {
    //     var id = bulan;
    //     var tahun = $("#tahun").val();
    //     $.ajax({
    //         url: "<?= base_url('analitic/crime') ?>/Crime/load_karawang",
    //         method: "POST",
    //         data: 'bulan=' + id + "&tahun=" + tahun,
    //         beforeSend: function() {
    //             $("#myDropdown2").removeClass("show");
    //         },
    //         complete: function() {},
    //         success: function(e) {
    //             document.getElementById("monthly_karawang").innerHTML = bulanConvert(bulan);
    //             var data = JSON.parse(e)
    //             var teluk_jambe_barat = data[0];
    //             var teluk_jambe_timur = data[1];
    //             var klari = data[2];
    //             var ciampel = data[3];
    //             var majalaya = data[4];
    //             var karawang_barat = data[5];
    //             var karawang_timur = data[6];
    //             const kecamatan = ['teluk_jambe_barat', 'teluk_jambe_timur', 'klari', 'ciampel', 'majalaya', 'karawang_barat', 'karawang_timur'];
    //             const params = [teluk_jambe_barat, teluk_jambe_timur, klari, ciampel, majalaya, karawang_barat, karawang_timur];

    //             // console.log(params[0][1].perjudian);
    //             for (var i = 0; i < kecamatan.length; i++) {
    //                 // console.log(kecamatan[i] + '=' + params[i][1].narkoba + '\n');
    //                 document.getElementById(kecamatan[i] + '_perjudian').innerHTML = params[i][1].perjudian;
    //                 document.getElementById(kecamatan[i] + '_pencurian').innerHTML = params[i][1].pencurian;
    //                 document.getElementById(kecamatan[i] + '_penggelapan').innerHTML = params[i][1].penggelapan;
    //                 document.getElementById(kecamatan[i] + '_narkoba').innerHTML = params[i][1].narkoba;
    //                 document.getElementById(kecamatan[i] + '_kekerasan').innerHTML = params[i][1].kekerasan;


    //                 document.getElementById(kecamatan[i] + "_perjudian").style.width = params[i][1].perjudian < 5 ? 5 + '%' : params[i][1].perjudian + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_pencurian").style.width = params[i][1].pencurian < 5 ? 5 + '%' : params[i][1].pencurian + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_penggelapan").style.width = params[i][1].penggelapan < 5 ? 5 + '%' : params[i][1].penggelapan + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_kekerasan").style.width = params[i][1].kekerasan < 5 ? 5 + '%' : params[i][1].kekerasan + 5 + '%'
    //                 document.getElementById(kecamatan[i] + "_narkoba").style.width = params[i][1].narkoba < 5 ? 5 + '%' : params[i][1].narkoba + 5 + '%'
    //             }
    //             mappingKarawang(tahun, bulan)
    //         }
    //     })
    // }

    $(document).ready(function() {
        // karawang setahun
        var kar;
        var karawangSetahun = {
            chart: {
                renderTo: 'karawangSetahun',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },
            title: {
                text: 'Crime Index Karawang',
                align: 'center'
            },
            subtitle: {
                text: 'Periode Tahun ' + <?= date('Y') ?>
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'gray',
                        textOutline: 'none'
                    }
                }
            },
            legend: {
                align: 'center',
                x: -10,
                verticalAlign: 'top',
                y: 10,
                // floating: true,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
                // borderColor: '#CCC',
                // borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'KEKERASAN',
                data: <?= $kekerasan_karawang ?>
            }, {
                name: 'NARKOBA',
                data: <?= $narkoba_karawang ?>
            }, {
                name: 'PERJUDIAN',
                data: <?= $perjudian_karawang ?>
            }, {
                name: 'PENCURIAN',
                data: <?= $pencurian_karawang ?>
            }, {
                name: 'PENGGELAPAN',
                data: <?= $penggelapan_karawang ?>
            }]
        }
        kar = Highcharts.chart(karawangSetahun);
        // 

        // jakut setahun
        var jak
        var jakartaSetahuan = {
            chart: {
                renderTo: 'jakartaUtaraSetahun',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70
                }
            },

            title: {
                text: 'Crime Index Jakarta Utara',
                align: 'center'
            },
            subtitle: {
                text: 'Periode Tahun ' + <?= date('Y') ?>
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'gray',
                        textOutline: 'none'
                    }
                }
            },
            legend: {
                align: 'center',
                x: -10,
                verticalAlign: 'top',
                y: 20,
                // floating: true,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || 'white',
                // borderColor: '#CCC',
                // borderWidth: 1,
                shadow: false
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                name: 'KEKERASAN',
                data: <?= $kekerasan_jakut ?>
            }, {
                name: 'NARKOBA',
                data: <?= $narkoba_jakut ?>
            }, {
                name: 'PERJUDIAN',
                data: <?= $perjudian_jakut ?>
            }, {
                name: 'PENCURIAN',
                data: <?= $pencurian_jakut ?>
            }, {
                name: 'PENGGELAPAN',
                data: <?= $penggelapan_jakut ?>
            }]
        }
        jak = Highcharts.chart(jakartaSetahuan);
        // 

        var CrimeperAreaJakut
        var crimeAreaJakut
        CrimeperAreaJakut = {
            title: {
                text: 'Crime Index Per Area Jakarta Utara',
                align: 'center'
            },
            subtitle: {
                text: 'Periode ' + <?= date('Y') ?>
                // text: 'Jumlah Kasus 2022'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                max: 150,
                title: {
                    text: ''
                }
            },
            labels: {
                items: [{
                    html: '',
                    style: {
                        left: '50px',
                        top: '18px',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'black'
                    }
                }]
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    },
                    options3d: {
                        enabled: true,
                        alpha: 10,
                        beta: 25,
                        depth: 70
                    }
                },
            },
            series: [{
                    type: 'column',
                    name: 'PENJARINGAN',
                    data: <?= $penjaringan_setahun ?>
                }, {
                    type: 'column',
                    name: 'CILINCING',
                    data: <?= $cilincing_setahun ?>
                }, {
                    type: 'column',
                    name: 'KOJA',
                    data: <?= $koja_setahun ?>
                }, {
                    type: 'column',
                    name: 'PADEMANGAN',
                    data: <?= $pademangan_setahun ?>
                }, {
                    type: 'column',
                    name: 'TANJUNG PRIOK',
                    data: <?= $priok_setahun ?>
                }, {
                    type: 'column',
                    name: 'KELAPA GADING',
                    data: <?= $gading_setahun ?>
                },
                {
                    type: 'spline',
                    name: 'TOTAL',
                    data: <?= $jakut_setahun ?>,
                    marker: {
                        lineWidth: 2,
                        lineColor: Highcharts.getOptions().colors[3],
                        fillColor: 'white'
                    }
                }
            ]
        }
        crimeAreaJakut = Highcharts.chart('CrimeperAreaJakut', CrimeperAreaJakut);

        var CrimeperAreaKarawang
        var crimeAreaKarawang
        CrimeperAreaKarawang = {
            title: {
                text: 'Crime Index Per Area Karawang',
                align: 'center'
            },
            subtitle: {
                text: 'Periode ' + <?= date('Y') ?>
                // text: 'Jumlah Kasus 2022'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
            },
            yAxis: {
                max: 150,
                title: {
                    text: ''
                }
            },
            labels: {
                items: [{
                    html: '',
                    style: {
                        left: '50px',
                        top: '18px',
                        color: ( // theme
                            Highcharts.defaultOptions.title.style &&
                            Highcharts.defaultOptions.title.style.color
                        ) || 'black'
                    }
                }]
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            series: [{
                type: 'column',
                name: 'TELUK JAMBE BARAT',
                data: <?= $teljabar_setahun ?>
            }, {
                type: 'column',
                name: 'TELUK JAMBE TIMUR',
                data: <?= $teljatim_setahun ?>
            }, {
                type: 'column',
                name: 'KLARI',
                data: <?= $klari_setahun ?>
            }, {
                type: 'column',
                name: 'CIAMPEL',
                data: <?= $ciampel_setahun ?>
            }, {
                type: 'column',
                name: 'MAJALAYA',
                data: <?= $majalaya_setahun ?>
            }, {
                type: 'column',
                name: 'KARAWANG TIMUR',
                data: <?= $karatim_setahun ?>
            }, {
                type: 'column',
                name: 'KARAWANG BARAT',
                data: <?= $karaba_setahun ?>
            }, {
                type: 'spline',
                name: 'TOTAL',
                data: <?= $karawang_setahun ?>,
                marker: {
                    lineWidth: 2,
                    lineColor: Highcharts.getOptions().colors[3],
                    fillColor: 'white'
                }
            }]
        }
        crimeAreaKarawang = Highcharts.chart('CrimeperAreaKarawang', CrimeperAreaKarawang);

        $("#tahun,#bulan").change(function() {
            var karawang = $('#karawangSetahun').highcharts();
            var jakut = $('#jakartaUtaraSetahun').highcharts();
            var jakut = $('#jakartaUtaraSetahun').highcharts();
            var jakutKecSet = $('#CrimeperAreaJakut').highcharts();
            var karawangKecSet = $('#CrimeperAreaKarawang').highcharts();
            var tahun = $("#tahun").val();
            var bulan = $("#bulan").val();
            $.ajax({
                url: "<?= base_url('analitic/crime/Crime/updateGrafik') ?>",
                type: 'post',
                data: {
                    tahun: tahun,
                    bulan: bulan
                },
                beforeSend: function() {
                    document.getElementById("preloader2").style.display = "block";
                },
                complete: function() {
                    document.getElementById("preloader2").style.display = "none";
                },
                success: function(e) {
                    const data = JSON.parse(e);
                    console.log(data);
                    karawang.subtitle.update({
                        text: 'Periode Tahun ' + tahun
                    });

                    jakut.subtitle.update({
                        text: 'Periode Tahun ' + tahun
                    });

                    jakutKecSet.subtitle.update({
                        text: 'Periode Tahun ' + tahun
                    });

                    karawangKecSet.subtitle.update({
                        text: 'Periode Tahun ' + tahun
                    });

                    for (let i = 0; i < data.AreaKarawang.length; i++) {
                        karawangKecSet.series[i].update({
                            type: data.AreaKarawang[i].type,
                            name: data.AreaKarawang[i].name,
                            data: JSON.parse(data.AreaKarawang[i].data)
                        })
                    }

                    for (let i = 0; i < data.AreaJakut.length; i++) {
                        jakutKecSet.series[i].update({
                            type: data.AreaJakut[i].type,
                            name: data.AreaJakut[i].name,
                            data: JSON.parse(data.AreaJakut[i].data)
                        })
                    }
                    for (let i = 0; i < data.Jakut.length; i++) {
                        jakut.series[i].update({
                            name: data.Jakut[i].name,
                            data: JSON.parse(data.Jakut[i].data)
                        });
                    }

                    for (let i = 0; i < data.Karawang.length; i++) {
                        karawang.series[i].update({
                            name: data.Karawang[i].name,
                            data: JSON.parse(data.Karawang[i].data)
                        });
                    }


                    const kecamatan = ['pademangan', 'koja', 'tanjung_priok', 'penjaringan', 'cilincing', 'kelapa_gading'];
                    const kecamatan2 = ['teluk_jambe_barat', 'teluk_jambe_timur', 'klari', 'ciampel', 'majalaya', 'karawang_barat', 'karawang_timur'];

                    for (var i = 0; i < 6; i++) {

                        document.getElementById(kecamatan[i] + '_perjudian').innerHTML = data.MapingJakut[i][1].perjudian;
                        document.getElementById(kecamatan[i] + '_pencurian').innerHTML = data.MapingJakut[i][1].pencurian;
                        document.getElementById(kecamatan[i] + '_penggelapan').innerHTML = data.MapingJakut[i][1].penggelapan;
                        document.getElementById(kecamatan[i] + '_narkoba').innerHTML = data.MapingJakut[i][1].narkoba;
                        document.getElementById(kecamatan[i] + '_kekerasan').innerHTML = data.MapingJakut[i][1].kekerasan;

                        document.getElementById(kecamatan[i] + "_perjudian").style.width = data.MapingJakut[i][1].perjudian < 5 ? 5 + '%' : data.MapingJakut[i][1].perjudian + 5 + '%'
                        document.getElementById(kecamatan[i] + "_pencurian").style.width = data.MapingJakut[i][1].pencurian < 5 ? 5 + '%' : data.MapingJakut[i][1].pencurian + 5 + '%'
                        document.getElementById(kecamatan[i] + "_penggelapan").style.width = data.MapingJakut[i][1].penggelapan < 5 ? 5 + '%' : data.MapingJakut[i][1].penggelapan + 5 + '%'
                        document.getElementById(kecamatan[i] + "_narkoba").style.width = data.MapingJakut[i][1].narkoba < 5 ? 5 + '%' : data.MapingJakut[i][1].narkoba + 5 + '%'
                        document.getElementById(kecamatan[i] + "_penggelapan").style.width = data.MapingJakut[i][1].penggelapan < 5 ? 5 + '%' : data.MapingJakut[i][1].penggelapan + 5 + '%'
                    }

                    for (var i = 0; i < 6; i++) {

                        document.getElementById(kecamatan2[i] + '_perjudian').innerHTML = data.MapingKarawang[i][1].perjudian;
                        document.getElementById(kecamatan2[i] + '_pencurian').innerHTML = data.MapingKarawang[i][1].pencurian;
                        document.getElementById(kecamatan2[i] + '_penggelapan').innerHTML = data.MapingKarawang[i][1].penggelapan;
                        document.getElementById(kecamatan2[i] + '_narkoba').innerHTML = data.MapingKarawang[i][1].narkoba;
                        document.getElementById(kecamatan2[i] + '_kekerasan').innerHTML = data.MapingKarawang[i][1].kekerasan;

                        document.getElementById(kecamatan2[i] + "_perjudian").style.width = data.MapingKarawang[i][1].perjudian < 5 ? 5 + '%' : data.MapingKarawang[i][1].perjudian + 5 + '%'
                        document.getElementById(kecamatan2[i] + "_pencurian").style.width = data.MapingKarawang[i][1].pencurian < 5 ? 5 + '%' : data.MapingKarawang[i][1].pencurian + 5 + '%'
                        document.getElementById(kecamatan2[i] + "_penggelapan").style.width = data.MapingKarawang[i][1].penggelapan < 5 ? 5 + '%' : data.MapingKarawang[i][1].penggelapan + 5 + '%'
                        document.getElementById(kecamatan2[i] + "_narkoba").style.width = data.MapingKarawang[i][1].narkoba < 5 ? 5 + '%' : data.MapingKarawang[i][1].narkoba + 5 + '%'
                        document.getElementById(kecamatan2[i] + "_penggelapan").style.width = data.MapingKarawang[i][1].penggelapan < 5 ? 5 + '%' : data.MapingKarawang[i][1].penggelapan + 5 + '%'
                    }

                    // mappingJakut(tahun, bulan)
                    loadMapJakut(tahun, bulan);
                    loadMapKarawang(tahun, bulan);
                    // mappingKarawang(tahun, bulan);
                    document.getElementById("monthly_jakut").innerHTML = bulanConvert(bulan);
                    document.getElementById("year_jakut").innerHTML = tahun;
                }
            })

            karawang.redraw();
            jakut.redraw();
            jakutKecSet.redraw();
            karawangKecSet.redraw();
        });


    })
</script>