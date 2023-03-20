<div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="border-bottom text-center pb-4">
                        <img src="<?php echo base_url('assets/img/user/').$profile->foto ?>" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <div class="mb-3">
                          <h3><?= $profile->nama ?></h3>
                        </div>
                        <p class="w-75 mx-auto mb-3"><?= substr($profile->id_biodata,-6)?></p>
                      </div>
                      <div class="border-bottom py-4" >
                        <p>Status Penempatan</p>
                        <div style="margin:5px; padding-bottom:10px; ">
                          <label class="badge badge-outline-dark"><?= $profile->jabatan?></label>
                          <label class="badge badge-outline-dark"><?= $profile->area_kerja?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->wilayah == 'WIL1'){
                            echo 'WILAYAH 1';
                          }elseif($profile->wilayah == 'WIL2'){
                            echo 'WILAYAH 2';
                          }elseif($profile->wilayah == 'WIL3'){
                            echo 'WILAYAH 3';
                          }elseif($profile->wilayah == 'WIL4'){
                            echo 'WILAYAH 4';
                          } ?></label>
                          
                        </div>                                                               
                      </div>
                      <div class="border-bottom py-4" >
                        <p>Update Data Anggota</p>
                        <div style="margin:5px; padding-bottom:10px; ">
                          <a style="text-decoration:none" type="button" class="badge badge-outline-dark" data-bs-toggle="modal" data-bs-target="#UpdateFoto"><i class="ti-pencil-alt">Update Foto</i></a>
                          <a style="text-decoration:none" class="badge badge-outline-dark" data-bs-toggle="modal" data-bs-target="#UpdateBiodata" type="button"><i class="ti-pencil-alt"></i>Update Biodata</a>
                          <a style="text-decoration:none" class="badge badge-outline-dark" data-bs-toggle="modal" data-bs-target="#UpdateKaryawan" type="button"><i class="ti-pencil-alt"></i>Update Status Karyawan</a>
                        </div>                                                               
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="mt-2 py-2 border-top border-bottom">
                     
                     

                        <ul class="nav profile-navbar" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a  type="button" class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" role="tab" aria-controls="profile" aria-selected="true">
                              <i class="ti-user"></i>
                              Info Biodata
                            </a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a type="button" class="nav-link" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employee" role="tab" aria-controls="employee" aria-selected="false">
                              <i class="ti-receipt"></i>
                              Info Karyawan
                            </a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a type="button" class="nav-link" id="absensi-tab" data-bs-toggle="tab" data-bs-target="#absensi" role="tab" aria-controls="absensi" aria-selected="false">
                              <i class="ti-clipboard"></i>
                              Riwayat Absensi
                            </a>
                          </li>
                          <li class="nav-item" role="presentation">
                            <a type="button" class="nav-link" id="mutasi-tab" data-bs-toggle="tab" data-bs-target="#mutasi" role="tab" aria-controls="mutasi" aria-selected="false">
                              <i class="ti-comment"></i>
                              Riwayat Mutasi
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">     
                            <div class="col-lg-8 mx-4">
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nama Lengkap</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->nama?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tempat, Tanggal Lahir</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->tempat_lahir . ',' . $profile->tanggal_lahir?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Golongan Darah</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->gol_darah?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor KTP</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->ktp?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor Kartu Keluarga</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->kk?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Email</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->email?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor Handphone</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->no_hp?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor Darurat</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->no_emergency?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tinggi Badan</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->tinggi_badan?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Berat Badan</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->berat_badan?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Indeks Masa Tubuh</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->imt .' ('.$profile->keterangan.')'?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Alamat KTP</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->jl_ktp. ', '. $profile->rt_ktp. '/'. $profile->rw_ktp. ', '. $profile->kel_ktp. ', '. $profile->kec_ktp. ', '. $profile->kota_ktp. ', '. $profile->provinsi_ktp?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Alamat Domisili</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->jl_dom. ', '. $profile->rt_dom. '/'. $profile->rw_dom. ', '. $profile->kel_dom. ', '. $profile->kec_dom. ', '. $profile->kota_dom. ', '. $profile->provinsi_dom?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="employee" role="tabpanel" aria-labelledby="employee-tab">     
                            <div class="col-lg-8 mx-4">
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">NPK</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->npk?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Jabatan</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->jabatan?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Wilayah</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->wilayah?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Area Kerja</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->area_kerja?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Status Anggota</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->status_anggota?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">No Reg KTA</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->no_kta?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tanggal Berakhir KTA</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->expired_kta?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Status KTA</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->status_kta?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tanggal Masuk ADM</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->tgl_masuk_adm?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tanggal Masuk Sigap</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $profile->tgl_masuk_sigap?></p>
                                    </div>
                                </div>
                              
                            </div>
                           
                        
                      </div>

                      <div class="tab-pane fade" id="absensi" role="tabpanel" aria-labelledby="absensi-tab">     
                            <div class="col-lg-12 mx-2">
                                <form name="report_absensi" id="report_absen" action="#">
                                <div class="row">
                                        <div class="col-lg-6">
                                            <label class="col-6 col-lg-4 col-form-label" for="bulan">Bulan</label>
                                            <input type="hidden"  name="id_biodata" id="id_biodata" value="<?=$profile->id_biodata ?>"> 
                                            <select name="bulan" class="form-control" id="bulan">
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
                                        <div class="col-lg-6">
                                        <label class="col-6 col-lg-4 col-form-label" for="tahun">Tahun</label>
                                                <select name="tahun" class="form-control" id="tahun">
                                                    <option value="">Pilih Tahun</option>
                                                    <option value="2021">2021</option>
                                                    <option value="2022">2022</option>
                                                    <option value="2023">2023</option>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                </select>
                                                <button id="info"  class="d-inline-flex p-2 bd-highlight btn btn-info btn-icon-text text-white mt-2" type="submit">
                                                  Download Absensi
                                                  <i class="ti-printer btn-icon-append"></i> 
                                                  </button>
                                              </div>
                                        
                                        </div>
                                      </form> 
                                    
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-12" id="loadabsensi">

                                    </div>
                                </div>
                            </div>
                           
                      </div>

                      <div class="tab-pane fade" id="mutasi" role="tabpanel" aria-labelledby="mutasi-tab">     
                            <div class="col-lg-12 mx-2">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Riwayat Mutasi</h4>
                                  <div class="mt-2">
                                    <div class="timeline">
                                      <div class="timeline-wrapper timeline-wrapper-warning">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Beta</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Two years in the making, we finally have our first beta release of Bootstrap 5.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>19</span>
                                              <span class="ml-md-auto font-weight-bold">19 Oct 2017</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-inverted timeline-wrapper-danger">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Alpha 6</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Alpha 6 has landed, and it’s one of our biggest ships to date.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>25</span>
                                              <span class="ml-md-auto font-weight-bold">10th Aug 2017</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-wrapper-success">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Alpha 5</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Alpha 5 has arrived just over a month after Alpha 4 with some major feature improvements and a boat load of bug fixes.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>19</span>
                                              <span class="ml-md-auto font-weight-bold">5th Sep 2016</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-inverted timeline-wrapper-info">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Alpha 4</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Alpha 4 is here to address those pesky build and package errors, a few CSS bugs, and some documentation inconsistencies we introduced in our last release.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>19</span>
                                              <span class="ml-md-auto font-weight-bold">27th July 2016</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-wrapper-primary">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Alpha 3</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Alpha 3 has landed! We have an overhauled grid, updated form controls, a new font stack, tons of bug fixes, and more.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>25</span>
                                              <span class="ml-md-auto font-weight-bold">25th July 2016</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-inverted timeline-wrapper-info">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 Alpha 2</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>The general plan for v4’s development starts with a few alpha releases. We’re a little behind on that, but should be getting caught up as the year winds down.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>32</span>
                                              <span class="ml-md-auto font-weight-bold">19th Aug 2015</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="timeline-wrapper timeline-wrapper-success">
                                        <div class="timeline-badge"></div>
                                        <div class="timeline-panel">
                                          <div class="timeline-heading">
                                            <h6 class="timeline-title">Bootstrap 5 alpha 1</h6>
                                          </div>
                                          <div class="timeline-body">
                                            <p>Bootstrap 5 has been a massive undertaking that touches nearly every line of code.</p>
                                          </div>
                                          <div class="timeline-footer d-flex align-items-center flex-wrap">
                                              <i class="ti-heart text-muted me-1"></i>
                                              <span>26</span>
                                              <span class="ml-md-auto font-weight-bold">15th Jun 2015</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                    
                            </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- Modal Update Foto -->
    <div class="modal fade" id="UpdateFoto" tabindex="-1" aria-labelledby="UpdateFoto" aria-hidden="true">
      <div class="modal-dialog">
      
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UpdateFoto">Update Foto Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div id="loading" style="display:none;" class="dot-opacity-loader">
                          <span></span>
                          <span></span>
                          <span></span>
                        </div>
            <form id="updaFoto" action="" method="POST" enctype="multipart/form-data">
            <div class="mb-5">
            <input type="hidden" class="form-control"  name="id" id="id" value="<?=$profile->id_biodata ?>"> 
            <label for="Image" class="form-label">Foto</label>
            <input class="form-control" type="file" id="file" name="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- End Modal Update -->

<!-- Modal Update Biodata -->
<div class="modal fade" id="UpdateBiodata" tabindex="-1" aria-labelledby="UpdateBiodata" aria-hidden="true">
      <div class="modal-dialog">
                      
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UpdateBiodata">Update Foto Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="UpdateBiodata" action="" method="POST">
            <div class="mb-5">
            <input type="hidden" class="form-control"  name="id" id="id" value="<?=$profile->id_biodata ?>"> 
            <label for="Image" class="form-label">Foto</label>
            <input class="form-control" type="file" id="file" name="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- End Modal Update -->

<!-- Modal Update Karyawan -->
<div class="modal fade" id="UpdateKaryawan" tabindex="-1" aria-labelledby="UpdateKaryawan" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="UpdateKaryawan">Update Data Karyawan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="UpdateKaryawan" action="" method="POST">
            <div class="mb-5">
            <input type="hidden" class="form-control"  name="id" id="id" value="<?=$profile->id_biodata ?>"> 
            <label for="Image" class="form-label">Foto</label>
            <input class="form-control" type="file" id="file" name="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- End Modal Update -->


      <script>
        $(document).ready(function() {
          $('#report_absen').on('change',function(){
            var id_biodata = document.getElementById('id_biodata').value;
            var tahun = $("select[name=tahun] option:selected").val();
            var bulan = $("select[name=bulan] option:selected").val();
            $.ajax({
              "url"   : "<?= base_url('Security/Anggota/absensi')?>",
              "type"  : "POST",
              "async" : false ,
              "data"  : "id_biodata=" + id_biodata + "&bulan=" + bulan + "&tahun=" + tahun ,
              beforeSend: function() {
                document.getElementById('info').style.display = "none";
              },
              complete: function() {
                  document.getElementById('info').style.display = "block";

              },
              success : function(e){
                document.getElementById('loadabsensi').innerHTML = e;
              },
             
            })
          });

          $('#report_absen').on('submit',function(e){
            e.preventDefault();
            var id_biodata = document.getElementById('id_biodata').value;
            var tahun = $("select[name=tahun] option:selected").val();
            var bulan = $("select[name=bulan] option:selected").val();
            $.ajax({
              "url"   : "<?= base_url('Security/Anggota/Cetak')?>",
              "type"  : "POST",
              "cache" : false,
              "data"  : "id_biodata=" + id_biodata + "&bulan=" + bulan + "&tahun=" + tahun ,
              success : function(data){
                var blob = new Blob([data], { type: "application/octetstream" });
                    //Check the Browser type and download the File.
                    var isIE = false || !!document.documentMode;
                    if (isIE) {
                        window.navigator.msSaveBlob(blob, fileName);
                    }
              },
             
            })
          });

          $("#updaFoto").on('submit',function(et){
            et.preventDefault();
            var id = document.getElementById('id').value;
            var File = document.getElementById('file').value;
            $.ajax({
              url : "<?= base_url('Security/Anggota/updateFoto')?>",
              data : new FormData(this),
              method : "POST",
              processData : false,
              contentType : false,
              cache : false,
              beforeSend: function() {
                document.getElementById('loading').style.display = "block";
              },
              success : function(response){
                location.reload();
              }
            })
          })

        });
      </script>