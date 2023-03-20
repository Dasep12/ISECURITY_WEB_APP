<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-md-12 grid-margin strecth-card mt-2" >
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Database Tamu</h4>
                            <p class="card-description">Data Tamu</p>

                            <div class="table-responsive">
                                        <table id="dataTabels" class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>Nama Tamu</th>
                                                        <th>No Kendaraan</th>
                                                        <th>No Telphone</th>
                                                        <th>AKSI</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                            
                                                <?php foreach ($tamu as $tamu) :  ?>
                                                    <tr>
                                                        <td class="py-1 ps-0">
                                                            <div class="d-flex align-items-center">
                                                            <img src="<?php echo base_url('assets/img/tamu/').$tamu->foto ?>" alt="profile"/>
                                                            <div class="ms-3">
                                                                <p class="mb-0"><?= $tamu->namaTamu?></p>
                                                                <p class="mb-0 text-muted text-small"><?= $tamu->perusahaan?></p>
                                                            </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?= $tamu->noPolice?>
                                                        </td>
                                                        <td>
                                                            <?= $tamu->noTelp?>
                                                        </td>
                                                        <td>
                                                        <a style="text-decoration:none;" href="<?= base_url('SecOps/Tamu/ProfileTamu/').$tamu->id_tamu?>" class="btn-icon"> <i class="ti-user"></i> Profile</a>                                                          
                                                        </td>
                                                    </tr>
                                                  <?php endforeach ?>
                                                </tbody>
                                        </table>
                                    </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
