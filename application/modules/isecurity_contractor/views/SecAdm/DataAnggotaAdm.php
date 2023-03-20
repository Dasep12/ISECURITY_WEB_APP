

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Menu Melakukan Administrasi Anggota <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
                </div>
                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php  echo base_url('assets/')?>people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Chicago</h4>
                        <h6 class="font-weight-normal">Illinois</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php  echo base_url('assets/')?>people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Chicago</h4>
                        <h6 class="font-weight-normal">Illinois</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Jumlah Anggota</p>
                     <a href="<?php echo base_url('agt/').$this->murry->enkrip($user->area_kerja).'' ;?>" class="text-white" style="text-decoration:none;"> <p class="fs-30 mb-2"><?= $jumlahAnggota ?></p></a>
                    </div>
                  </div>
                </div>
               

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Absensi Anggota</p>
                      <a href="#" style="text-decoration: none;" class="text-white fs-30 mb-2" >
                      <p class="fs-20 mb-0">In & Out</p>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Mutasi, Resign dan Pengembalian</p>
                      <a href="#" style="text-decoration: none;" class="text-white fs-30 mb-2" >
                      <p class="fs-20 mb-0">Perubahan Status Kerja Anggota</p>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">ANGGOTA BARU</p>
                      <a href="<?= base_url('daftar')?>" style="text-decoration: none;" class="text-white fs-30 mb-2" >
                      <p class="fs-20 mb-0">Pendaftaran Anggota</p>
                      </a>
                    </div>
                  </div>
                </div>

              </div>
          </div>
        </div>
          
           
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detail Anggota</p>
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Total Anggota </p>
                              <h1 class="text-primary"><?= $jumlahAnggota?> MP</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">Anggota <?php if($user->wilayah == "WIL2"){
                                echo 'Wilayah 2';
                              }elseif ($user->wilayah == "WIL1") {
                                echo 'Wilayah 1';
                              }elseif ($user->wilayah == "WIL3") {
                                echo 'Wilayah 3';
                              }else {
                                echo 'Wilayah 4';
                              } ?></h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
  <script>
        const labels = [
          'Kta Aktif',
          'Kta Tidak Aktif',
        ];

        const data = {
          labels: labels, 
          datasets: [{
            label: 'Status KTA Anggota',
            backgroundColor: [
              'rgb(46, 91, 242)',
              'rgb(216, 86, 86)'
             
            ],
            borderColor: [ 
              'rgb(46, 91, 242)',
              'rgb(216, 86, 86)'
             ],
            borderWidth: 1,
            cutout : '70%',
            data: [	<?= $ktaAktif->total?> ,<?= $ktaTidakAktif->total?>
            ],
          }]
        };

        // hoverLabel
        const hoverLabel = {
          id : 'hoverLabel',
          afterDraw(chart, args, options){
            const {ctx, chartArea: {left, right, top, bottom, width, height}} = chart;
            ctx.save();
            if(chart._active.length > 0) {
              const textLabel = chart.config.data.labels[chart._active[0].index];
              const numberLabel = chart.config.data.datasets[chart._active[0].datasetIndex].data[chart._active[0].index];
              const color = chart.config.data.datasets[chart._active[0].datasetIndex].borderColor[chart._active[0].index];
              ctx.font = 'bolder 24px Arial';
              ctx.fillStyle = color;
              ctx.textAlign = 'center';
              ctx.fillText(`${textLabel}: ${numberLabel}`,width / 2, height / 2 + top)
            }
            ctx.restore();
          }
        };


        // config
        const config = {
          type: 'doughnut',
          data,
          options: {
        
          },
          plugins: [hoverLabel],
        };

        const myChart = new Chart(
          document.getElementById('myChart'),
          config
        );
</script>


