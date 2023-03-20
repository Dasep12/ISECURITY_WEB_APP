<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    
                    <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <p class="card-title">Export Biodata</p>
                            </div>
                            <p class="font-weight-500">Ini adalah menu untuk export excel data biodata</p>
                                    <?php if((substr($user->id_akun,0,-7)) == "ADM") { ?>  
                                    <form  name="exportData" action="<?= base_url('Security/Anggota/exportProfile')?>" method="POST">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <label class="col-6 col-lg-4 col-form-label" for="wilayah">Wilayah</label>
                                            <input readonly  type="text" class="form-control" name="wilayah" id="wilayah" value="<?= $areaUser->wilayah ?>" >              
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col-6 col-lg-4 col-form-label" for="area">Area Kerja</label>
                                        <input readonly  type="text" class="form-control" id="area" value="<?= $areaUser->area_kerja ?>" name="area">                
                                        <button target="_blank" class="d-inline-flex p-2 bd-highlight btn btn-info btn-icon-text text-white mt-2" type="submit">
                                            Download Biodata
                                            <i class="ti-printer btn-icon-append"></i> 
                                            </button>
                                        </div>
                                        </div>
                                      </form>
                                    <?php } ?>

                                    <div class="d-flex justify-content-between mt-5 ">
                                    <p class="card-title">Export Absensi</p>
                                    </div>

                                    <?php if((substr($user->id_akun,0,-7)) == "ADM") { ?>  
                                    <form  name="exportData" action="<?= base_url('Security/Anggota/exportProfile')?>" method="POST">
                                        <div class="row">
                                        <div class="col-lg-6">
                                            <label class="col-6 col-lg-4 col-form-label" for="wilayah">Wilayah</label>
                                            <input readonly  type="text" class="form-control" name="wilayah" id="wilayah" value="<?= $areaUser->wilayah ?>" >              
                                        </div>
                                        <div class="col-lg-6">
                                        <label class="col-6 col-lg-4 col-form-label" for="area">Area Kerja</label>
                                        <input readonly  type="text" class="form-control" id="area" value="<?= $areaUser->area_kerja ?>" name="area">                
                                        <button target="_blank" class="d-inline-flex p-2 bd-highlight btn btn-info btn-icon-text text-white mt-2" type="submit">
                                            Download Biodata
                                            <i class="ti-printer btn-icon-append"></i> 
                                            </button>
                                        </div>
                                        </div>
                                      </form>
                                    <?php } ?>

                            </div>
                        </div>
                        </div>

                        <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <p class="card-title">Sales Report</p>
                            <a href="#" class="text-info">View all</a>
                            </div>
                            <p class="font-weight-500">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                            <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                        </div>
    
                    </div>
                
                </div>
            </div>
        </div>
    </div>
</div>

