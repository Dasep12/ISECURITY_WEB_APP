    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang  <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Upload Anggota</h3>
                      <p class="card-description">Via Excel</p>

                      <form class="form-sample"  method="POST" enctype="multipart/form-data" action="" id="InsertExcel">
                        <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-3 col-form-label">File Excel</label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" id="fileAnggota" name="fileAnggota" />
                                            </div>
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
       





