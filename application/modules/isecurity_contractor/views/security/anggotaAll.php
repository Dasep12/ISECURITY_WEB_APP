

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Selamat Datang <?= $user->nama?></h3>
                  <h6 class="font-weight-normal mb-0">Ini Adalah Menu  <span class="text-primary">Manager!</span></h6>
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
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <?php 
               foreach ($GroupWil as $key => $value ) : ?> 
                   <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class= "card card-tale">
                    <div class="card-body">
                      <p class="mb-4">WILAYAH KERJA</p>
                      <a href="<?php echo base_url('area/').$this->murry->enkrip($value->wilayah).'' ;?>" style="text-decoration: none;" class="text-white fs-30 mb-2" ><?= $value->wilayah ?></a>
                    </div>
                  </div>
                </div>
               <?php
                endforeach ?>
              </div>
          </div>
        </div>
          
           
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card position-relative">
                <div class="card-body">
                  <p class="card-title">Detailed Reports</p>
                  <div id="detailedReports" class="carousel slide detailed-report-carousel position-static pt-2" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <div class="row">
                          <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
                            <div class="ml-xl-4 mt-3">
                            <p class="card-title">Detailed Reports</p>
                              <h1 class="text-primary">$34040</h1>
                              <h3 class="font-weight-500 mb-xl-4 text-primary">North America</h3>
                              <p class="mb-2 mb-xl-0">The total number of sessions within the date range. It is the period time a user is actively engaged with your website, page or app, etc</p>
                            </div>  
                            </div>
                          <div class="col-md-12 col-xl-9">
                            <div class="row">
                              <div class="col-md-6 border-right">
                                <div class="table-responsive mb-3 mb-md-0 mt-3">
                                  <table class="table table-borderless report-table">
                                    <tr>
                                      <td class="text-muted">Illinois</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">713</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Washington</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">583</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Mississippi</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">924</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">California</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">664</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Maryland</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">560</h5></td>
                                    </tr>
                                    <tr>
                                      <td class="text-muted">Alaska</td>
                                      <td class="w-100 px-0">
                                        <div class="progress progress-md mx-4">
                                          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                      </td>
                                      <td><h5 class="font-weight-bold mb-0">793</h5></td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="col-md-6 mt-3">
                                <div class="echart-market-share" id="chartKta"></div>
                                <div id="north-america-legend"></div>
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
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
<script type="text/javascript">
  $(document).ready(function(){
    // Initialize the echarts instance based on the prepared dom
    var KtaChart = echarts.init(document.getElementById('chartKta'));
    // Specify the configuration items and data for the chart

    var option = {
      color : [
          utils.getColors().primary,
					utils.getColors().info,
					utils.getGrays()[300],
      ],
      tooltip : {
        trigger: "item",
					padding: [7, 10],
					backgroundColor: utils.getGrays()["100"],
					borderColor: utils.getGrays()["300"],
					textStyle: {
						color: utils.getColors().dark,
					},
					borderWidth: 1,
					transitionDuration: 0,
					formatter: function formatter(params) {
            return "<strong>"
							.concat(params.data.name, ":</strong> ")
              .concat(params.data.value," Personil") ;
					},
      },
      legend : {
        show : false,
      },
      series : [
        {
          type: "pie",
						radius: ["100%", "87%"],
						avoidLabelOverlap: false,
						hoverAnimation: false,
						itemStyle: {
							borderWidth: 2,
							borderColor: utils.getColor("card-bg"),
						},
						label: {
							normal: {
								show: false,
								position: "center",
								textStyle: {
									fontSize: "20",
									fontWeight: "500",
									color: [
                    	utils.getColors().primary,
					            utils.getColors().info,
                  ],
								},
							},
							emphasis: {
								show: false,
							},
						},
						labelLine: {
							normal: {
								show: false,
							},
						},
						data: [
							{
								value: <?= $ktaAktif->total ?>,
								name: "AKTIF",
							},
							{
								value: <?= $ktaTidakAktif->total ?>,
								name: "TIDAK AKTIF",
							},
						],
        }
      ]
    };
     // Display the chart using the configuration items and data just specified.
     myChart.setOption(option);
      //echartSetOption(chart,option, getDefaultOptions);
  });
</script>

