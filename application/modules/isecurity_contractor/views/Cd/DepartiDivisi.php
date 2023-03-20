<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h4 class="info-box-text">Selamat Datang <?= $user->nama?></h4>
        <h6 class="info-box-text">Ini Adalah Menu Melakukan Administrasi Visitor <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
      </div>
    </div> 
  </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Control Department & Divisi</h4>
                    </div>
                </div>
            </div>

       
            <div class="col-6 col-lg-12 col-md-12 col-sm-12">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-10">
                                        <span class="info-box-number">Total Divisi</span>
                                    </div>
                                    <div class="col-2">
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#divisi"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Divisi</button> -->
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                <div class="table-responsive scrollbar">
                                    <table id="dataTabels" class="table table-hover" >
                                            <thead >
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID DIVISI</th>
                                                    <th>NAMA DIVISI</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($Divisi as $Divisi) : ?>
                                                <tr>
                                                        <td class="text-left"><?= $i ?></td>
                                                        <td class="text-left"><?= $Divisi->id_divisi ?></td>
                                                        <td class="text-left"><?= $Divisi->divisi?></td>
                                                        
                                                </tr>
                                                <?php
                                                $i++;
                                            endforeach ?>
                                            </tbody>
                                    </table>
                                </div>
                                </div>
                        </div>
                </div>
            </div>

            <div class="col-6 col-lg-12 col-md-12 col-sm-12">
                <div class="info-box">
                        <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="col-10">
                                        <span class="info-box-number">Total Department</span>
                                    </div>
                                    <div class="col-2">
                                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#department"><i class="fa fa-plus" aria-hidden="true"></i>Tambah Department</button> -->
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                <div class="table-responsive scrollbar">
                                    <table id="dataTabelsDepart" class="table table-hover" >
                                            <thead >
                                                <tr>
                                                    <th>NO</th>
                                                    <th>ID DEPARTMENT</th>
                                                    <th>NAMA DIVISI</th>
                                                    <th>NAMA DEPARTMENT</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                            <?php
                                                $i = 1;
                                                foreach($Depart as $Depart) : ?>
                                                <tr>
                                                        <td class="text-left"><?= $i ?></td>
                                                        <td class="text-left"><?= $Depart->id_department ?></td>
                                                        <td class="text-left"><?= $Depart->divisi ?></td>
                                                        <td class="text-left"><?= $Depart->department?></td>
                                                        
                                                </tr>
                                                <?php
                                                $i++;
                                            endforeach ?>
                                            </tbody>
                                    </table>
                                </div>
                                </div>
                        </div>
                </div>
            </div>

             <!-- Modal Divisi -->
          <div class="modal fade bd-example-modal-lg" id="divisi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Divisi</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addDivisi">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Id Divisi</label>
                      <input type="text" class="form-control" id="id_divisi" name="id_divisi">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Nama Divisi</label>
                      <input type="text" class="form-control" id="divisi" name="divisi">
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>  
            </div>
          </div>
          <!--  -->

           <!-- Modal Department -->
           <div class="modal fade bd-example-modal-lg" id="department" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg" >
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tambah Department</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form id="addDepartment">
                  <div class="form-group">
                        <label for="" class="col-sm-3 col-form-label">Divisi</label>
                        <div class="col-12">
                        <select  id="idDivisi" name="id_divisi" class="form-select" style="width: 100%">
                                <option value='0'> -- Pilih Divisi -- </option>
                        </select>
                      
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Id Department</label>
                      <input type="text" class="form-control" id="idDepartment" name="idDepartment">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Department</label>
                      <input type="text" class="form-control" id="Department" name="Department">
                    </div>
                 
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close Modal</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!--  -->

         

        </div>
    </div>
</section>