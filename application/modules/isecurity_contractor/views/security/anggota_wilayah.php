

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang  <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Halaman Anggota Berdasarkan Wilayah</h6>
                </div>
              </div>
            </div>
          </div>
        
          
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-justify card">
                <div class="card-body">
                  <p class="card-title ">Main Power Anggota</p>
                  <h3 class="font-weight-500 mb-xl-4 ">Anggota <?php if($user->wilayah == "WIL2"){
                                echo 'Wilayah 2';
                              }elseif ($user->wilayah == "WIL1") {
                                echo 'Wilayah 1';
                              }elseif ($user->wilayah == "WIL3") {
                                echo 'Wilayah 3';
                              }else {
                                echo 'Wilayah 4';
                              } ?></h3>
                       
                           
                        <div class="row">
                          <div class="col-md-12 col-xl-12 d-flex flex-column justify-content-start">

                                    <div class="table-responsive scrollbar">
                                        <table id="daftar_anggota" class="table table-hover" >
                                                <thead >
                                                    <tr >
                                                        <th >NPK</th>
                                                        <th>NAMA</th>
                                                        <th>AREA KERJA</th>
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
        <script type="text/javascript">
    var table;
    $(document).ready(function() {
        //datatables
        table = $('#daftar_anggota').DataTable({ 

            "processing": true, 
            "serverSide": true, 
            "order": [], 
            "ajax": {
                "url": "<?= base_url('Security/Anggota/wilayah_list')?>",
                "type": "POST"
                
            },
            "columnDefs": [ 
                    {
                        "targets": [0],
                        "orderable": false,
                   }, 
                  ],
        });
            
    });

</script>    