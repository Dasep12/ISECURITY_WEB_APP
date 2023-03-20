<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Dashboard</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>


<section class="content">
	<div class="container-fluid">
		<div class="row">
            <?php if(($user->role) == "ADMIN-ANGGOTA") { ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-bell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tamu Hari Ini</span>
                            <span class="info-box-number"><?= $TamuHariIni->TamuArea?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Bulan Ini</span>
						<span class="info-box-number"><?= $TamuBulanIni->TamuArea?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Request Karyawan</span>
						<span class="info-box-number">0</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>


            <?php } ?>
			
            <?php if(($user->role) == "PIC") { ?>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-bell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tamu Hari Ini</span>
                            <span class="info-box-number"><?= $TamuHariIni->TamuArea?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Bulan Ini</span>
						<span class="info-box-number"><?= $TamuBulanIni->TamuArea?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Request Karyawan</span>
						<span class="info-box-number">0</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>

               
                    <div class="col-md-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="">
                                    <p class="text-center mb-2">
                                        <strong>Grafik Tamu <br />Periode Tahun 2023</strong>
                                    </p>

                                    <div class="chart">
                                        <canvas id="chartTamu" style="height: 300px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <p class="text-center mb-2">
                                        <strong>Performance Tamu Perusahaan <br />Periode Tahun 2023 </strong>
                                    </p>

                                    <div class="chart" style="">
                                        <canvas id="chartPatroli" style="height: 300px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                            </div>
                        </div>

                    </div>
		 
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center mb-2">
                                    <strong>Kepetingan Tamu Berdasarkan Area
                                    </strong>
                                </p>
                                <div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanByKategori" data-filterplant="true" data-action="ajaxTemuanKategori">
                                </div>

                                <div class="chart">
                                    <canvas id="chartTemuanByKategori" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                  

            <?php } ?>

            <?php if(($user->role) == "SPV") { ?>

                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-bell"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Tamu Hari Ini</span>
                            <span class="info-box-number"><?= $TamuHariIni->TamuArea?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Bulan Ini</span>
						<span class="info-box-number"><?= $TamuBulanIni->TamuArea?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>

                <div class="col-12 col-sm-6 col-md-4">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fa fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Tamu Request Karyawan</span>
						<span class="info-box-number">0</span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			    </div>

                <div class="col-md-6">
                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="">
                                    <p class="text-center mb-2">
                                        <strong>Grafik Tamu <br />Periode Tahun 2023</strong>
                                    </p>

                                    <div class="chart">
                                        <canvas id="chartTamu" style="height: 300px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="">
                                    <p class="text-center mb-2">
                                        <strong>Performance Tamu Perusahaan <br />Periode Tahun 2023 </strong>
                                    </p>

                                    <div class="chart" style="">
                                        <canvas id="chartPatroli" style="height: 300px;"></canvas>
                                    </div>
                                    <!-- /.chart-responsive -->
                                </div>
                            </div>
                        </div>

                    </div>
                  
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center mb-2">
                                    <strong>Kepetingan Tamu Berdasarkan Area
                                    </strong>
                                </p>
                                <div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanByKategori" data-filterplant="true" data-action="ajaxTemuanKategori">
                                </div>

                                <div class="chart">
                                    <canvas id="chartTemuanByKategori" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.chart-responsive -->
                </div>
                <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="text-center mb-2">
                                    <strong>Kepetingan Tamu Berdasarkan Area
                                    </strong>
                                </p>
                                <div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanByKategori" data-filterplant="true" data-action="ajaxTemuanKategori">
                                </div>

                                <div class="chart">
                                    <canvas id="chartTemuanByKategori" style="height: 300px;"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                  

            <?php } ?>
		</div>
	</div>
</section>


<script>
    var MONTHS = [
		'JAN',
		'FEB',
		'MAR',
		'APR',
		'MEI',
		'JUN',
		'JUL',
		'AGU',
		'SEP',
		'OKT',
		'NOV',
		'DES'
	];

	// TEMUAN
	const ctxChartTamu = document.getElementById('chartTamu').getContext('2d');
	ctxChartTamu.height = 300;

	const chartTamu = new Chart(ctxChartTamu, {
		type: 'line',
		data: {},
		options: {
			maintainAspectRatio: true,
			responsive: true,
			legend: {
				display: true
			},
			scales: {
				xAxes: [{
					gridLines: {
						display: true
					}
				}],
				yAxes: [{
					gridLines: {
						display: false
					},
					ticks: {
						beginAtZero: true,
						// stepSize: 1
					}
				}]
			},
			tooltips: {
				callbacks: {
					title: function(tooltipItem, data) {
						return data.datasets[tooltipItem[0].datasetIndex].data[0].x;
					}
				}
			},
			plugins: {
				colorschemes: {
					scheme: 'brewer.DarkTwo5',
				}

			}
		}
	});

	function ajaxTemuanPlant() {
		$.ajax({
			url: "http://103.63.25.164/guard_tour_adm/Dashboard/temuan_plant",
			method: "GET",
			success: function(data) {
				if (data) {
					let dataset_ = []
					Object.keys(data).forEach(plant_name => {
						let ds = {
							label: plant_name,
							data: data[plant_name],
						}
						dataset_.push(ds)
					});
					chartTemuan.data = {
						datasets: dataset_,
						labels: MONTHS
					}
					chartTemuan.update()
				}
			}
		});

	}
</script>