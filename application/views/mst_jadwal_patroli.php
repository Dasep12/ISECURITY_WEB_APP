<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Master Event</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Jadwal_Patroli') ?>">Jadwal</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Jadwal_Patroli') ?>">Jadwal Patroli</a></li>
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
                <a href="<?= base_url('Mst_Jadwal_Patroli/form_rubah_jadwal_petugas') ?>" class="btn btn-sm btn-success">
                    <i class="fa fa-file-excel"></i> Koreksi Jadwal Patroli
                </a>
                <div class="card mt-2 card4">
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="<?= base_url('Mst_Jadwal_Patroli') ?>" method="post">
                            <div class="row text-white">
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">PLANT</label>
                                        <select name="plant" class="form-control" id="plant">
                                            <?php foreach ($plant->result() as $pl) :
                                                if ($pl->plant_id == $plant_id) { ?>
                                                    <option selected value="<?= $pl->plant_id ?>"><?= $pl->plant_name ?></option>
                                                <?php } else { ?>
                                                    <option value="<?= $pl->plant_id ?>"><?= $pl->plant_name ?></option>
                                            <?php  }
                                            endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">TAHUN</label>
                                        <select name="tahun" class="form-control" id="tahun">
                                            <?php for ($i = 22; $i <= 35; $i++) {

                                                if ($tahun == '20' . $i) { ?>
                                                    <option selected>20<?= $i ?></option>
                                                <?php  } else { ?>
                                                    <option>20<?= $i ?></option>
                                            <?php   }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group">
                                        <label for="">BULAN</label>
                                        <select name="bulan" class="form-control" id="bulan">
                                            <?php for ($kl = 0; $kl <= 11; $kl++) {
                                                if ($bulan == $daftar_bulan[$kl]) { ?>
                                                    <option selected><?= $daftar_bulan[$kl] ?></option>
                                                <?php } else { ?>
                                                    <option><?= $daftar_bulan[$kl] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div style="margin-top: 10px;position:absolute" class="form-group">
                                        <button name="lihat" class="btn btn-primary btn-sm mt-4"><i class="fa fa-search"></i> Lihat Jadwal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <?php
                if (isset($_POST['lihat'])) {
                    if ($user->num_rows() > 0) { ?>
                        <div class="card card4">
                            <div class="card-body">
                                <table>
                                    <tr class="text-white">
                                        <td>Tahun</td>
                                        <td>:</td>
                                        <td><?= $tahun  ?></td>
                                    </tr>
                                    <tr class="text-white">
                                        <td>Bulan</td>
                                        <td>:</td>
                                        <td><?= $bulan ?></td>
                                    </tr>
                                </table>
                                <?php
                                $kal = CAL_GREGORIAN;
                                $day = cal_days_in_month($kal, $month, date('Y'));
                                ?>
                                <!-- <a target="_blank" href="<?= base_url('Mst_Jadwal/download_jadwal?bulan=' . $bulan . '&tahun=' . $tahun . '&plant_id=' . $plant_id . '') ?>" class="btn btn-success btn-sm "><i class="fas fa-download"></i> Download Jadwal</a> -->
                                <table id="jadwal_patroli" class="table table-bordered small table-sm">
                                    <thead>
                                        <tr>
                                            <th width="90px">PLANT</th>
                                            <th>NPK</th>
                                            <th width="120px">NAMA</th>
                                            <?php for ($i = 1; $i <= $day; $i++) {  ?>
                                                <th><?= $i ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user->result() as $us) : ?>
                                            <tr>
                                                <td><?= $us->plant  ?></td>
                                                <td><?= $us->npk  ?></td>
                                                <td><?= $us->nama  ?></td>
                                                <?php for ($i = 1; $i <= $day; $i++) :
                                                    if ($i <= 9) {
                                                        $i = "0" . $i;
                                                    } else {
                                                        $i;
                                                    }
                                                ?>
                                                    <td>
                                                        <?php
                                                        $date = $tahun . "-" . $month . "-" . $i;
                                                        $shift = $this->M_patrol->detailJadwalPatroli($us->id_plant, $us->user_id, $date);
                                                        if ($shift->num_rows() > 0) {
                                                            $sh = $shift->row();
                                                            echo $sh->shift == "LIBUR" ?  "<span class='text-danger'>" . $sh->shift . "</span>" :  "<span>" . $sh->shift . "</span>";
                                                        } else {
                                                            echo    '-';
                                                        }
                                                        ?>
                                                    </td>
                                                <?php endfor; ?>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php  } else { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Tidak ada jadwal patroli di bulan ini
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php }
                }
                ?>
            </div>

        </div>

    </div>
</section>





<script>
    $(document).ready(function() {
        $('#jadwal_patroli').DataTable({
            fixedHeader: true,
            scrollX: "200px",
            scrollCollapse: false,
            paging: false,
            ordering: false,
            searching: false,
            info: false,
            fixedColumns: {
                left: 3,
                right: 2
            }
        });
    });
</script>