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
                        <img src="<?php echo base_url('assets/img/tamu/').$ProfileTamu->foto ?>" alt="profile" class="img-lg rounded-circle mb-3"/>
                        <div class="mb-3">
                          <h3><?= $ProfileTamu->namaTamu?></h3>
                        </div>
                        <p class="w-75 mx-auto mb-3"></p>
                      </div>
                     
                      <div class="border-bottom py-4" >
                        <p>Update Data Tamu</p>
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
                            <a type="button" class="nav-link" id="absensi-tab" data-bs-toggle="tab" data-bs-target="#absensi" role="tab" aria-controls="absensi" aria-selected="false">
                              <i class="ti-clipboard"></i>
                              Riwayat Kunjungan
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
                                    <p><?= $ProfileTamu->namaTamu?></p>
                                </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Alamat Rumah</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->alamat?></p>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor KTP</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->noKtpTamu?></p>    
                                    </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor Handphone</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->noTelp?></p>   
                                </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nomor Kendaraan</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->noPolice?></p>   
                                </div>
                                </div>
                               
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Warga Negara</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= strtoupper($ProfileTamu->wargaNegara)?></p>  
                                </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Nama Perusahaan</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->perusahaan?></p>
                                </div>
                                </div>
                                <div class="row">
                                    <label  class="col-6 col-lg-4 col-form-label">Tanggal Pendaftaran</label>
                                    <div class="col-6 col-lg-6 col-form-label ">
                                    <p><?= $ProfileTamu->tglPendaftaran?></p>
                                </div>
                                </div>
                                
                            </div>
                        </div>
                       
                      <div class="tab-pane fade" id="absensi" role="tabpanel" aria-labelledby="absensi-tab">     
                            <div class="col-lg-12 mx-2">
                                <div class="row">
                                <div class="table-responsive">
                                        <table id="dataTabels" class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>ID Transaksi</th>
                                                        <th>Bertemu</th>
                                                        <th>Kepentingan</th>
                                                        <th>Tanggal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>                            
                                                <?php foreach ($TransaksiTamu as $TransaksiTamu) :  ?>
                                                  <tr>  
                                                          <td><?= $TransaksiTamu->id_transaksi?></td>
                                                          <td><?= $TransaksiTamu->nama?></td>
                                                          <td><?= $TransaksiTamu->kepentingan?></td>
                                                          <td><?= $TransaksiTamu->tanggal?></td>
                                                          <td>
                                                          <a style="text-decoration:none;" href="<?= base_url('SecOps/Tamu/ProfileTamu/').$TransaksiTamu->id_transaksi?>" class="btn-icon"> <i class="ti-info-alt"></i> Detail</a>
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
            <input type="hidden" class="form-control"  name="id" id="id" value=""> 
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
            <input type="hidden" class="form-control"  name="id" id="id" value=""> 
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
            <input type="hidden" class="form-control"  name="id" id="id" value=""> 
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