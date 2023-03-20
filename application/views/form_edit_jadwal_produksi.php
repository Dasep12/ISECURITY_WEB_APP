<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Master Company</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Jadwal_Produksi') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Jadwal_Produksi') ?>">Jadwal Produksi</a></li>
                    <li class="breadcrumb-item"><a href="">Edit Jadwal Produksi</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Default box -->
                <?php if ($this->session->flashdata("info")) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('info') ?>
                        <?= $this->session->unset_userdata('info') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } else if ($this->session->flashdata("fail")) { ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('fail') ?>
                        <?= $this->session->unset_userdata('fail') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php } ?>

                <div class="card card4">
                    <div class="card-header text-white">
                        <h3 class="card-title">Edit Data</h3>

                        <div class="card-tools">
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                    </div>
                    <form action="<?= base_url('Mst_Jadwal_Produksi/form_rubah_jadwal_produksi') ?>" method="post" id="updateJadwal">
                        <div class="card-body">
                            <div class="overlay-wrapper" id="overlay-wrapper" style="display:none">
                                <div class="overlay success"><i class="fas fa-3x fa-sync-alt fa-spin"></i> <br>
                                </div>
                            </div>
                            <div class="row  text-white">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">PLANT </label>
                                        <select name="plant_id" class="form-control" id="plant">
                                            <?php foreach ($plant->result() as $pl) :
                                                if ($session_plant == $pl->plant_id) { ?>
                                                    <option selected value="<?= $pl->plant_id ?>"><?= $pl->plant_name ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $pl->plant_id ?>"><?= $pl->plant_name ?></option>
                                            <?php    }
                                            endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">Tanggal </label>
                                        <input autocomplete="off" value="<?= $session_date ?>" placeholder="<?= date('Y-m-d') ?>" type="text" id="tgl1" name="date" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <a href="<?= base_url('Mst_Jadwal_Produksi') ?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" name="lihat" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari Data</button>
                            <?php
                            if (isset($_POST['lihat'])) {
                                if ($produksi->num_rows() > 0) { ?>
                                    <!-- <div class="card card4">
                                <div class="card-body">
                                    <div class="overlay-wrapper" id="overlay-wrapper" style="display:none">
                                        <div class="overlay success"><i class="fas fa-3x fa-sync-alt fa-spin"></i> <br>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div> -->
                                    <table class="mt-4 table table-sm" id="petugasTable">
                                        <thead>
                                            <tr>
                                                <th class="bdHead">NO</th>
                                                <th>PLANT</th>
                                                <th>ZONA</th>
                                                <th>SHIFT</th>
                                                <th>TANGGAL</th>
                                                <th style="width:150px;align:center">STATUS PRODUKSI</th>
                                                <th class="bdHead2" style="width:150px;align:center">STATUS ZONA</th>
                                                <!-- <th>OPSI</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            $today       = date('Y-m-d H:i:s');

                                            $tanggal_sekarang = strtotime($today);
                                            foreach ($produksi->result() as $prd) : ?>
                                                <tr>
                                                    <?php
                                                    $tanggal_terpilih = strtotime($prd->tanggal . "23:59:59");
                                                    ?>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $prd->plant ?></td>
                                                    <td><?= $prd->zona ?></td>
                                                    <td><?= $prd->shift ?></td>
                                                    <td><?= $prd->tanggal ?></td>
                                                    <td align="center">

                                                        <input <?= $prd->stat_produksi == 'PRODUKSI' ? 'checked' : ''  ?> type="checkbox" id="switch-change" name="produksi_stat" data-bootstrap-switch data-id="<?= $prd->id ?>" data-off-color="danger" data-on-color="success" <?= $tanggal_terpilih >= $tanggal_sekarang ? '' : 'disabled' ?>>
                                                    </td>
                                                    <td align="center">
                                                        <input <?= $prd->zona_status == 'ACTIVE' ? 'checked' : ''  ?> type="checkbox" id="switch-change" name="zona_stat" data-bootstrap-switch data-id="<?= $prd->id ?>" data-off-color="danger" data-on-color="success" <?= $tanggal_terpilih >= $tanggal_sekarang ? '' : 'disabled' ?>>
                                                    </td>
                                                    <!-- <td>
                                                 <?php
                                                    $tanggal_terpilih = strtotime($prd->tanggal . "23:59:59");
                                                    if ($tanggal_terpilih >= $tanggal_sekarang) { ?>
                                                        <a id="petugasData" data-toggle="modal" onclick="showuserdetail('<?= $prd->id ?>','<?= $prd->zona ?>', '<?= $prd->shift ?>','<?= $prd->tanggal ?>','<?= $prd->zona_status ?>','<?= $prd->id_produksi ?>')" href="#modal_userDetail" class="text-success" data-backdrop="static" data-keyboard="false"><i class="fa fa-edit"></i></a>
                                                    <?php } else { ?>
                                                        <span class="font-italic text-danger">exp-date</span>
                                                    <?php }
                                                    ?> 
                                                </td> -->
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                <?php } else { ?>
                                    <div class="justify-content-center mt-4 alert alert-danger alert-dismissible fade show" role="alert">
                                        Tidak ada data
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php } ?>
                            <?php
                            } ?>
                        </div>
                        <!-- /.card-body -->
                    </form>

                </div>
                <!-- /.card -->


            </div>
        </div>
    </div>
</section>

<!-- modal edit data -->
<div class="modal fade" id="modal_userDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal Produksi</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" id="bodymodal_userDetail">

            </div>
        </div>
    </div>
</div>
<!-- edit data  -->





<script>
    function showuserdetail(id, zona, shift, date, status_zona, stat_produksi) {

        $.ajax({
            type: "post",
            url: "<?= base_url('Mst_Jadwal_Produksi/load_data_produksi'); ?>",
            data: "id=" + id + "&zona=" + zona + "&shift=" + shift + "&date=" + date + "&status_zona=" + status_zona + "&stat_produksi=" + stat_produksi,
            dataType: "html",
            success: function(response) {
                $('#bodymodal_userDetail').empty();
                $('#bodymodal_userDetail').append(response);
            }
        });
    }

    $("[name = 'zona_stat'],[name = 'produksi_stat']").bootstrapSwitch();

    $("input[name = 'zona_stat']").on("switchChange.bootstrapSwitch", function(event, state) {
        $.ajax({
            url: "<?= base_url("Mst_Jadwal_Produksi/updateZonaStatus") ?>",
            method: "POST",
            beforeSend: function() {
                document.getElementById("overlay-wrapper").style.display = "block";
            },
            complete: function() {
                document.getElementById("overlay-wrapper").style.display = "none";
            },
            data: {
                id: $(this).data("id"),
                stat: state == true ? 1 : 0,
                type: 'zona'
            },
            success: function(e) {
                // console.log(e);
                if (e == 1) {
                    alert("Berhasil update zona");
                } else {
                    alert(e);
                }
            }
        })

    });

    $("input[name = 'produksi_stat']").on("switchChange.bootstrapSwitch", function(event, state) {
        $.ajax({
            url: "<?= base_url("Mst_Jadwal_Produksi/updateZonaStatus") ?>",
            method: "POST",
            beforeSend: function() {
                document.getElementById("overlay-wrapper").style.display = "block";
            },
            complete: function() {
                document.getElementById("overlay-wrapper").style.display = "none";
            },
            data: {
                id: $(this).data("id"),
                stat: state == true ? 1 : 0,
                type: 'pro'
            },
            success: function(e) {
                // console.log(e);
                if (e == 1) {
                    alert("Berhasil update data");
                } else {
                    alert(e);
                }
            }
        })

    });
</script>