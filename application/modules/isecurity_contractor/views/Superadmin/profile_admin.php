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
                        <img src="<?php echo base_url('assets/img/admin/').$data->foto ?>" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <div class="mb-3">
                          <h3><?= $data->nama ?></h3>
                        </div>
                        <p class="w-75 mx-auto mb-3"><?= substr($data->id_karyawan,0,-7)?></p>
                        <p class="w-75 mx-auto mb-3"><?= substr($data->id_karyawan,-6)?></p>
                       
                      </div>
                      <div class="border-bottom py-4" >
                        <p>Hak Akses Akun</p>
                        <div style="margin:5px; padding-bottom:10px; ">
                          <label class="badge badge-outline-dark"><?php if($profile->security_operation == 1){
                            echo 'Akses Security Operation';
                          } ?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->security_admin == 1){
                            echo 'Akses Security Admin';
                          } ?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->layanan_security == 1){
                            echo 'Akses Layanan Security';
                          } ?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->security_information == 1){
                            echo 'Akses Security Information';
                          } ?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->training == 1){
                            echo 'Akses Training';
                          } ?></label>  
                           <label class="badge badge-outline-dark"><?php if($profile->asms == 1){
                            echo 'Akses ASMS';
                          } ?></label>  
                           <label class="badge badge-outline-dark"><?php if($profile->atsg == 1){
                            echo 'Akses ATSG';
                          } ?></label>  
                           <label class="badge badge-outline-dark"><?php if($profile->smp == 1){
                            echo 'Akses SMP';
                          } ?></label> 
                           <label class="badge badge-outline-dark"><?php if($profile->control_database == 1){
                            echo 'Akses Control Database';
                          } ?></label> 
                           <label class="badge badge-outline-dark"><?php if($profile->review == 1){
                            echo 'Akses Review';
                          } ?></label> 
                           <label class="badge badge-outline-dark"><?php if($profile->control_akun == 1){
                            echo 'Akses Control Akun';
                          } ?></label> 
                           <label class="badge badge-outline-dark"><?php if($profile->lo_g == 1){
                            echo 'Akses Log';
                          } ?></label>
                          <label class="badge badge-outline-dark"><?php if($profile->syncronize == 1){
                            echo 'Akses Syncronize';
                          } ?></label>  
                        </div>                                                               
                      </div>
                    </div>
                    <div class="col-lg-8">
                      <div class="mt-2 py-2 border-top border-bottom">
                        <ul class="nav profile-navbar">
                          <li class="nav-item">
                            <a class="nav-link active" href="#">
                              <i class="ti-receipt"></i>
                              Master Akun
                            </a>
                          </li>
                        </ul>
                      </div>
                      <div class="profile-feed">
                      <form action="" id="masterAkun">  
                              <div class="row">
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Security Operation</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                            <input hidden type="text" id="id_karyawan" name="id_karyawan" value="<?= $profile->id_karyawan?>">
                                          <input class="form-check-input" id="SecOps" value="<?=$profile->security_operation?>" name="SecOps" <?php if($profile->security_operation == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Security Admin</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="SecAdm" value="<?=$profile->security_admin?>" name="SecAdm" <?php if($profile->security_admin == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Layanan Security</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="LaySec" name="LaySec" value="<?=$profile->security_admin?>" <?php if($profile->layanan_security == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Security Information</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="SecInfo" name="SecInfo" value="<?=$profile->security_information?>" <?php if($profile->security_information == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Training</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="Training" name="Training" value="<?=$profile->training?>" <?php if($profile->training == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses ASMS</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="ASMS" name="ASMS" value="<?=$profile->asms?>" <?php if($profile->asms == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses ATSG</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="ATSG" name="ATSG" value="<?=$profile->atsg?>" <?php if($profile->atsg == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses SMP</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="SMP" name="SMP" value="<?=$profile->smp?>" <?php if($profile->smp == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Control Database</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="ControlDatabase" value="<?=$profile->control_database?>" name="ControlDatabase" <?php if($profile->control_database == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Review</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="Review" name="Review" value="<?=$profile->review?>" <?php if($profile->review == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Log</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="Log" name="Log" value="<?=$profile->lo_g?>" <?php if($profile->lo_g == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                      <div class="form-group row">
                                          <label for="" class="col-lg-5 col-form-label">Akses Syncronize</label>
                                          <div class="col-sm-4 col-form-label  form-switch">
                                          <input class="form-check-input" id="Syncronize" name="Syncronize" value="<?=$profile->syncronize?>" <?php if($profile->syncronize == 1){echo 'checked';}  ?> type="checkbox" onclick='handleClick(this);'>
                                          </div>
                                      </div>
                                  </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6 d-flex start-end">
                                        <div class="form-group row">
                                       <div class="col-sm-9">
                                       <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                       </div>
                                        </div>
                                    </div>
                                    </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>