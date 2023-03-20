

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang  <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Halaman Akses Master Akun</h6>
                </div>
              </div>
            </div>
          </div>
        
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-justify card ">
                <div class="card-body">
                  <p class="card-title">Hak Akses Akun Master</p>
                        <div class="row">
                          <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">

                                    <div class="table-responsive scrollbar">
                                        <table id="AksesAdmin" class="table" >
                                                <thead >
                                                    <tr >
                                                        <th>ID Akun</th>
                                                        <th>NAMA</th>
                                                        <th>WILAYAH</th>
                                                        <th>AKSI</th>
                                                     
                                                    </tr>
                                                </thead> 
                                                
                                        </table>
                                    </div>

                          </div>
                        </div> 
                  </div>
                </div>
              </div>
            </div>
          </div>
           
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      <script>
       $(document).ready(function(){
            $('#AksesAdmin').DataTable({
                "processing" : true,
                "serverSide" : true,
                "order" 	 : [],
                "ajax"		 : {
                    "url"	 : "<?= base_url('Superadmin/ServersideAdmin')?>",
                    "type"   : "POST"
                },
                "columnDefs": [
                        { 
                            "targets": [ 0 ], //first column / numbering column
                            "orderable": false, //set not orderable
                        },
                    ],
            });
        });
      </script>