<style xmlns="http://www.w3.org/1999/html">
	.ui-datepicker-calendar {
		display: none;
	}

	.ui-datepicker {
		padding-bottom: 0.2em !important;
		font-size: 10px;
	}

	.boderSelect {
		border: 1px solid #007bff;
		color: #007bff;
	}

	.hidden {
		display: none
	}

	.table-condensed thead .prev,
	.table-condensed thead .next {
		display: none !important;
	}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Analityc Security Guard Tour</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#"></a></li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartTrendPatrolPerPlant_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row">
							<input type="hidden" value="<?= date('Y') ?>" id="valDatepickerYearTrendPatroli">
							<span style="cursor:pointer" id="datepickerYearTrendPatroli" class="commentsToggle text-primary">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>
						<div class="justify-content-center">
							<div class="col-lg-12">
								<div class="chart">
									<div id="chartLinePatrolAllPerPlant" style="height: 380px;"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartTrenPatrolAllPlant_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row">
							<span style="cursor:pointer" class="commentsToggle text-primary">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>

						<div class="justify-content-center">
							<div class="chart">
								<div id="chartTrenPatrolAllPlant" style="height: 380px;"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartTrendPatrolHarian_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row">
							<input type="hidden" value="<?= date('m') <= 9 ? date('m') : '0' .  date('m') ?>" id="valDatepickerMonthTrendPatroli">
							<span style="cursor:pointer" id="datepickerMonthTrendPatroli" class="text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>
						<div class="chart">
							<div id="patroliHarian" style="height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartPerformanceAllPlantADM_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row">
							<input type="hidden" value="<?= date('Y') ?>" id="valDatepickerYearPerformPatroli">
							<span style="cursor:pointer" id="datepickerYearPerformPatroli" class=" text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>
						<div class="justify-content-center">
							<div class="col-lg-12">
								<div class="chart">
									<div id="chartPerformanceAllLine" style="height: 380px;"></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="tahunPerformance_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row">
							<input type="hidden" value="<?= date('m') <= 9 ? date('m') : '0' .  date('m') ?>" id="valDatepickerMonthPerformPatroli">
							<span style="cursor:pointer" id="datepickerMonthPerformPatroli" class="text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>
						<div class="chart">
							<div id="PerformancePatrolHarian" style="height: 380px;"></div>
						</div>
						<!-- /.chart-responsive -->
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:block" id="chartPerformancePerPlant_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row ">
							<span style="cursor:pointer" class="text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>
						<div class="justify-content-center">
							<div class="chart">
								<div id="chartPerformanceAllBar" style="height: 380px;"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartTemuanADM_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row ">
							<input type="hidden" value="<?= date('Y') ?>" id="valDatepickerYearTemuanPatroli">
							<span style="cursor:pointer" id="datepickerYearTemuanPatroli" class="text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>

						<div class="chart">
							<div id="chartTemuanADM" style="height: 300px;"></div>
						</div>
					</div>
				</div>
				<!-- /.chart-responsive -->
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:none" id="chartTemuanRegu_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="row ">
							<input type="hidden" value="<?= date('m') <= 9 ? date('m') : '0' .  date('m') ?>" id="valDatepickerMonthTemuanPatroli">
							<span style="cursor:pointer" id="datepickerMonthTemuanPatroli" class="text-primary commentsToggle">
								<i class="fa fa-ellipsis-v"></i>
							</span>
						</div>

						<div class="chart">
							<div id="chartTemuanRegu" style="height: 300px;"></div>
						</div>
					</div>
				</div>
				<!-- /.chart-responsive -->
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:block" id="chartTemuanByUser_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-inline justify-content-center">
								<select style="border-radius: 0px;" name="tahun_patrol" class="form-control boderSelect" id="tahun_patrol">
									<option value="2022">PLANT 1</option>
									<option value="2023">PLANT 2</option>
									<option value="2024">PLANT 3</option>
									<option value="2025">PLANT 4 LINE 1</option>
								</select>
								<select style="border-radius: 0px;" name="tahun_patrol" class="form-control boderSelect" id="tahun_patrol">
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
								<button style="border-radius: 0px;padding: 7px;margin-top:0.3px;height:38px" class="btn btn-outline btn-sm btn-primary" type="button">Filter</button>
							</div>
						</div>

						<div class="chart">
							<div id="chartCloseTemuan" style="height: 300px;"></div>
						</div>
					</div>
				</div>
				<!-- /.chart-responsive -->
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-body">
						<div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
							<div class="overlay" style="display:block" id="chartTemuanByUser_overlay">
								<i class="fas fa-2x fa-sync-alt fa-spin"></i>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-inline justify-content-center">
								<select style="border-radius: 0px;" name="tahun_patrol" class="form-control boderSelect" id="tahun_patrol">
									<option value="2022">JANUARI</option>
									<option value="2023">FEBRUARI</option>
									<option value="2024">MARET</option>
									<option value="2025">APRIL</option>
								</select>
								<select style="border-radius: 0px;" name="tahun_patrol" class="form-control boderSelect" id="tahun_patrol">
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
								<button style="border-radius: 0px;padding: 7px;margin-top:0.3px;height:38px" class="btn btn-outline btn-sm btn-primary" type="button">Filter</button>
							</div>
						</div>

						<div class="chart">
							<div id="chartCloseTemuan2" style="height: 300px;"></div>
						</div>
					</div>
				</div>
				<!-- /.chart-responsive -->
			</div>
		</div>
	</div>


</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/dist/js') ?>/highcharts.js"></script>
<script src="<?= base_url('assets/dist/js') ?>/exporting.js"></script>
<script src="<?= base_url('assets/dist/js') ?>/export-data.js"></script>
<script src="<?= base_url('assets/dist/js') ?>/accessibility.js"></script>
<script src="<?= base_url('assets') ?>/dist/js/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets') ?>/dist/js/vendor/chart.js/chartjs-plugin-colorschemes.min.js"></script>
<script>
	var pl = <?= json_encode($plant) ?>;
	$('.commentsToggle').click(function() {
		// $(this).siblings(".comments").toggleClass('hidden');
		$(this).siblings(".comments").toggle('slow');
	});


	function tanggal(ttlHari) {
		const tgl = [];
		for (var i = 1; i <= ttlHari; i++) {
			tgl.push(i);
		}
		return tgl;
	}

	function convertMonth(bln) {
		let bulan = null;
		switch (bln) {
			case '01':
				bulan = 'Januari';
				break;
			case '02':
				bulan = 'Februari';
				break;
			case '03':
				bulan = 'Maret';
				break;
			case '04':
				bulan = 'April';
				break;
			case '05':
				bulan = 'Juli';
				break;
			case '06':
				bulan = 'Juni';
				break;
			case '07':
				bulan = 'Juli';
				break;
			case '08':
				bulan = 'Agustus';
				break;
			case '09':
				bulan = 'September';
				break;
			case '10':
				bulan = 'Oktober';
				break;
			case '11':
				bulan = 'November';
				break;
			case '12':
				bulan = 'Desember';
				break;
		}
		return bulan;
	}
	const month = [
		'Jan',
		'Feb',
		'Mar',
		'Apr',
		'May',
		'Jun',
		'Jul',
		'Aug',
		'Sep',
		'Oct',
		'Nov',
		'Dec'
	];

	// star trend

	// tren patroli
	var charTrendPatroliLine;
	charTrendPatroliLine = new Highcharts.chart({
		chart: {
			renderTo: 'chartLinePatrolAllPerPlant',
			type: 'line'
		},
		title: {
			text: 'Trend Patroli'
		},
		legend: {
			enabled: false
		},
		subtitle: {
			text: 'Periode ' + <?= date('Y') ?>
		},
		xAxis: {
			categories: month,
			crosshair: true
		},
		yAxis: {
			tickInterval: 25,
			min: 0,
			title: {
				text: 'TOTAL'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'TOTAL',
			data: []
		}]
	});

	var dp = $("#datepickerYearTrendPatroli").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years",
		autoclose: true,
		showButtonPanel: false,
	});
	var tr = $("#datepickerMonthTrendPatroli").datepicker({
		format: "mm",
		viewMode: "months",
		minViewMode: "months",
		autoclose: true,
		showButtonPanel: false,
	});

	dp.on('changeYear', function(e) {
		$("#valDatepickerYearTrendPatroli").val(e.format());
		charTrendPatrolAllD(e.format());
		charTrendPatrolPerPlant(e.format());
		chartTrendPatroliHarian(e.format(), $("#valDatepickerMonthTrendPatroli").val())
	});

	tr.on('changeMonth', function(e) {
		$("#valDatepickerMonthTrendPatroli").val(e.format());
		chartTrendPatroliHarian($("#valDatepickerYearTrendPatroli").val(), e.format())
	});

	function charTrendPatrolPerPlant(tahun) {
		// var tahun = dp.datepicker('getDate').getFullYear();
		// var tahun = $("#tahun_trend_patrol_Perplant").val();
		$.ajax({
			url: "<?= base_url('Dashboard/trendPatrolBulananPerPlant') ?>",
			method: "POST",
			data: {
				plant_id: '',
				tahun: tahun
			},
			beforeSend: function() {
				document.getElementById("chartTrendPatrolPerPlant_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartTrendPatrolPerPlant_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#chartLinePatrolAllPerPlant').highcharts();
				var data = JSON.parse(e);
				chartPatrolAll.series[0].update({
					name: data[0].name,
					data: data[0].data
				});
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				chartPatrolAll.redraw();
			}
		})
	}
	charTrendPatrolPerPlant(dp.datepicker('getDate').getFullYear());

	var charTotalPatrolAllBar;
	charTotalPatrolAllBar = new Highcharts.chart({
		chart: {
			renderTo: 'chartTrenPatrolAllPlant',
			type: 'column'
		},
		title: {
			text: 'Trend Patroli'
		},
		subtitle: {
			text: 'Periode' + <?= date('Y') ?>
		},
		xAxis: {
			categories: month,
			crosshair: true
		},
		yAxis: {
			tickInterval: 25,
			min: 0,
			max: 10,
			title: {
				text: 'TOTAL'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}]
	});

	function charTrendPatrolAllD(tahun) {
		var chartPatrolAll = $('#chartTrenPatrolAllPlant').highcharts();
		// var tahun = dp.datepicker('getDate').getFullYear();
		// var tahun = $("#tahun_trend_patrol").val();
		$.ajax({
			url: "<?= base_url('Dashboard/trendPatrolAllPlant') ?>",
			method: "POST",
			data: {
				tahun: tahun
			},
			beforeSend: function() {
				document.getElementById("chartTrenPatrolAllPlant_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartTrenPatrolAllPlant_overlay").style.display = "none";
			},
			success: function(e) {
				var data = JSON.parse(e);
				var maxValue = [];
				for (let i = 0; i <= 8; i++) {
					chartPatrolAll.series[i].update({
						name: data[i].plant,
						data: data[i].data
					});

					maxValue.push(Math.max.apply(null, data[i].data));
				}
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				var maxUpdate = Math.max.apply(null, maxValue)
				chartPatrolAll.yAxis[0].update({
					min: 0,
					max: maxUpdate + 50
				});
				chartPatrolAll.redraw();
			}
		})
	}
	charTrendPatrolAllD(dp.datepicker('getDate').getFullYear());

	// tren harian
	Highcharts.chart({
		chart: {
			renderTo: 'patroliHarian',
			type: 'line'
		},
		title: {
			text: 'Patroli Harian'
		},
		subtitle: {
			text: 'Periode '
		},
		xAxis: {
			categories: tanggal(<?= 28 ?>)
		},
		yAxis: {
			title: {
				text: 'Total'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">Tanggal {point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
				// stacking: 'percent'
			},

		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}]

	});

	function chartTrendPatroliHarian(tahun, bulan) {
		// var tahun = $("#tahun_trenHarian_patrol").val();
		// var bulan = $("#bulan_trenHarian_patrol").val();
		$.ajax({
			url: "<?= base_url('Dashboard/trendPatrolHarian') ?>",
			method: "POST",
			data: {
				tahun: tahun,
				bulan: bulan
			},
			beforeSend: function() {
				document.getElementById("chartTrendPatrolHarian_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartTrendPatrolHarian_overlay").style.display = "none";

			},
			success: function(e) {
				var chartTrendPatrolHarian = $('#patroliHarian').highcharts();
				var bln = $("select[name=bulan_trenHarian_patrol] option:selected").text();

				var data = JSON.parse(e);
				for (var i = 0; i <= 8; i++) {
					chartTrendPatrolHarian.series[i].update({
						name: data[i].name,
						data: data[i].data
					});
				}
				chartTrendPatrolHarian.xAxis[0].update({
					categories: tanggal(data[0].data.length)
				})
				chartTrendPatrolHarian.setTitle(null, {
					text: 'Periode ' + convertMonth($("#valDatepickerMonthTrendPatroli").val()) + ' ' + tahun
				})
				chartTrendPatrolHarian.redraw();
			}
		})
	}
	chartTrendPatroliHarian(dp.datepicker('getDate').getFullYear(), tr.datepicker('getDate').getMonth() + 1);

	// end trend



	// start performance
	// performance patroli

	var fl = $("#datepickerYearPerformPatroli").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years",
		autoclose: true,
		showButtonPanel: false,
	});
	var flt = $("#datepickerMonthPerformPatroli").datepicker({
		format: "mm",
		viewMode: "months",
		minViewMode: "months",
		autoclose: true,
		showButtonPanel: false,
	});

	fl.on('changeYear', function(e) {
		$("#valDatepickerYearPerformPatroli").val(e.format());
		charPerformancePatrolAllADM(e.format());
		charPerformancePatrolAllD(e.format());
		performanceHarian(e.format(), $("#valDatepickerMonthPerformPatroli").val());
	});

	flt.on('changeMonth', function(e) {
		$("#valDatepickerMonthPerformPatroli").val(e.format());
		performanceHarian($("#valDatepickerYearPerformPatroli").val(), e.format());
	});


	var charPerformancePatroliLine;
	charPerformancePatroliLine = new Highcharts.chart({
		chart: {
			renderTo: 'chartPerformanceAllLine',
			type: 'line'
		},
		legend: {
			enabled: false
		},
		title: {
			text: 'Performance Patroli'
		},
		subtitle: {
			text: 'Periode ' + <?= date('Y') ?>
		},
		xAxis: {
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			max: 100,
			// tickInterval: 0.25,
			labels: {
				formatter: function() {
					return this.value + '%'
				}
			},
			title: {
				text: 'TOTAL'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true,
			valueSuffix: '%'
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
				// stacking: 'percent'
			},

		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'Performance',
			data: []
		}]
	});

	function charPerformancePatrolAllADM(tahun) {
		// var tahun = $("#tahun_performance_patrol_allplant").val();
		// var plant = $("#plant_patrol_performance_patrol_allplant").val();
		$.ajax({
			url: "<?= base_url('Dashboard/perforamancePatrolBulananPerPlant') ?>",
			method: "POST",
			data: {
				tahun: tahun,
				plant_id: ''
			},
			beforeSend: function() {
				document.getElementById("chartPerformanceAllPlantADM_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartPerformanceAllPlantADM_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#chartPerformanceAllLine').highcharts();
				// console.log(e)
				var data = JSON.parse(e);
				chartPatrolAll.series[0].update({
					name: data[0].name,
					data: data[0].data
				});
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				chartPatrolAll.redraw();
			}
		})
	}
	charPerformancePatrolAllADM($("#valDatepickerYearPerformPatroli").val());

	var charPerformancePatrolAllBar;
	charPerformancePatrolAllBar = new Highcharts.chart({
		chart: {
			renderTo: 'chartPerformanceAllBar',
			type: 'line'
		},
		title: {
			text: 'Performance Patroli'
		},
		subtitle: {
			text: 'Periode ' + <?= date('Y') ?>
		},
		xAxis: {
			categories: month,
			crosshair: true
		},
		yAxis: {
			min: 0,
			max: 100,
			// tickInterval: 0.25,
			labels: {
				formatter: function() {
					return this.value + '%'
				}
			},
			title: {
				text: 'TOTAL'
			}
		},
		tooltip: {
			headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
			pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y}</b></td></tr>',
			footerFormat: '</table>',
			shared: true,
			useHTML: true,
			valueSuffix: '%'
		},
		plotOptions: {
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
				// stacking: 'percent'
			},

		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}, {
			name: '',
			data: []
		}]
	});

	function charPerformancePatrolAllD(tahun) {
		// var tahun = $("#tahun_performance_patrol_Perplant").val();
		$.ajax({
			url: "<?= base_url('Dashboard/perforamancePatrolAllPlant') ?>",
			method: "POST",

			data: {
				tahun: tahun
			},
			beforeSend: function() {
				document.getElementById("chartPerformancePerPlant_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartPerformancePerPlant_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#chartPerformanceAllBar').highcharts();
				// console.log(e)
				var data = JSON.parse(e);
				for (let i = 0; i <= 8; i++) {
					chartPatrolAll.series[i].update({
						name: data[i].plant,
						data: data[i].data
					});
				}
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				chartPatrolAll.redraw();
			}
		})
	}
	charPerformancePatrolAllD($("#valDatepickerYearPerformPatroli").val());


	function performanceHarian(tahun, bulan) {
		$.ajax({
			url: "<?= base_url('Dashboard/perFormancePatrolHarian') ?>",
			method: "POST",
			data: {
				tahun: tahun,
				bulan: bulan
			},
			beforeSend: function() {
				document.getElementById("tahunPerformance_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("tahunPerformance_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#PerformancePatrolHarian').highcharts();
				// console.log(e)
				var data = JSON.parse(e);
				for (let i = 0; i <= 8; i++) {
					chartPatrolAll.series[i].update({
						name: data[i].name,
						data: data[i].data
					});
				}
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				chartPatrolAll.xAxis[0].update({
					labels: {
						enabled: false
					},
					title: {
						text: null
					}
				});
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + convertMonth(bulan) + ' ' + tahun
				})
				chartPatrolAll.redraw();
			}
		})
	}
	performanceHarian($("#valDatepickerYearPerformPatroli").val(), $("#valDatepickerMonthPerformPatroli").val());
	Highcharts.chart({
		chart: {
			type: 'line',
			renderTo: 'PerformancePatrolHarian',
		},
		title: {
			text: 'Performance Patroli Harian'
		},
		subtitle: {
			text: 'Periode ' + <?= date('Y') ?>
		},
		xAxis: {
			// categories: tanggal(28)
		},
		yAxis: {
			min: 0,
			max: 100,
			// tickInterval: 0.25,
			labels: {
				formatter: function() {
					return this.value + '%'
				}
			},
			title: {
				text: 'TOTAL'
			}
		},
		tooltip: {
			formatter: function() {
				var tooltip = '<span style="font-size:10px">Tanggal ' + `${this.x + 1}` + '</span><table><tbody>';
				$.each(this.points, function(i, point) {
					tooltip += '<tr><td style="color:' + point.series.color + ';padding:0">' + point.series.name + ': </td><td style="padding:0"><b>' + point.y + '%</b></td></tr>'
				})
				tooltip += '</tbody></table>';
				return tooltip
			},
			// headerFormat: '<span style="font-size:10px">Tanggal {point.key + 1 year}</span><table>',
			// pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
			// 	'<td style="padding:0"><b>{point.y}</b></td></tr>',
			// footerFormat: '</table>',
			shared: true,
			useHTML: true,
			valueSuffix: '%'
		},
		plotOptions: {
			// line: {
			// 	dataLabels: {
			// 		enabled: true
			// 	},
			// 	enableMouseTracking: true
			// },
			column: {
				pointPadding: 0.2,
				borderWidth: 0,
				// stacking: 'percent'
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
				name: 'PLANT 1',
				data: []
			},
			{
				name: 'PLANT 2',
				data: []
			},
			{
				name: 'PLANT 3',
				data: []
			},
			{
				name: 'PLANT 4 LINE 1',
				data: []
			},
			{
				name: 'PLANT 4 LINE 2',
				data: []
			},
			{
				name: 'PLANT 5',
				data: []
			},
			{
				name: 'PLANT VLC',
				data: []
			},
			{
				name: 'PLANT HO',
				data: []
			},
			{
				name: 'PART CENTER',
				data: []
			}
		]

	});
	// end performance



	// start temuan patroli 
	var tp = $("#datepickerYearTemuanPatroli").datepicker({
		format: "yyyy",
		viewMode: "years",
		minViewMode: "years",
		autoclose: true,
		showButtonPanel: false,
	});
	var tpt = $("#datepickerMonthTemuanPatroli").datepicker({
		format: "mm",
		viewMode: "months",
		minViewMode: "months",
		autoclose: true,
		showButtonPanel: false,
	});

	tp.on('changeYear', function(e) {
		$("#valDatepickerYearTemuanPatroli").val(e.format());
		ajaxTemuanAdm(e.format());
		ajaxTemuanReguAdm(e.format(), $("#valDatepickerMonthTemuanPatroli").val());
	});

	tpt.on('changeMonth', function(e) {
		$("#valDatepickerMonthTemuanPatroli").val(e.format());
		ajaxTemuanReguAdm($("#valDatepickerYearTemuanPatroli").val(), e.format());
	});

	function ajaxTemuanAdm(tahun) {
		$.ajax({
			url: "<?= base_url('Dashboard/temuanPatrolAllPlant') ?>",
			method: "POST",
			data: {
				tahun: tahun
			},
			beforeSend: function() {
				document.getElementById("chartTemuanADM_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartTemuanADM_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#chartTemuanADM').highcharts();
				var data = JSON.parse(e);
				chartPatrolAll.series[0].update({
					name: 'Total',
					data: data
				});
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + tahun
				})
				chartPatrolAll.redraw();
			}
		})
	}
	ajaxTemuanAdm($("#valDatepickerYearTemuanPatroli").val());

	Highcharts.chart('chartTemuanADM', {
		chart: {
			type: 'line'
		},
		title: {
			text: 'Temuan Patroli',
			align: 'center'
		},
		subtitle: {
			text: "Periode 2023"
		},
		xAxis: {
			categories: month
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: ( // theme
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || 'gray',
					textOutline: 'none'
				}
			}
		},

		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'Total',
			data: []
		}]
	});


	function ajaxTemuanReguAdm(tahun, bulan) {
		$.ajax({
			url: "<?= base_url('Dashboard/temuanPerReguPlant') ?>",
			method: "POST",
			data: {
				tahun: tahun,
				bulan: bulan
			},
			beforeSend: function() {
				document.getElementById("chartTemuanRegu_overlay").style.display = "block";
			},
			complete: function() {
				document.getElementById("chartTemuanRegu_overlay").style.display = "none";
			},
			success: function(e) {
				var chartPatrolAll = $('#chartTemuanRegu').highcharts();
				var data = JSON.parse(e);
				let regu = ['REGU A', 'REGU B', 'REGU C', 'REGU D'];
				for (let i = 0; i < data[0].length; i++) {
					chartPatrolAll.series[i].update({
						name: regu[i],
						data: data[0][i]
					});
				}
				chartPatrolAll.setTitle(null, {
					text: 'Periode ' + convertMonth(bulan) + ' ' + tahun
				})
				chartPatrolAll.xAxis[0].update({
					categories: data[1][0]
				});
				chartPatrolAll.redraw();
			}
		})
	}
	ajaxTemuanReguAdm($("#valDatepickerYearTemuanPatroli").val(), $("#valDatepickerMonthTemuanPatroli").val());
	Highcharts.chart('chartTemuanRegu', {
		chart: {
			type: 'column',
		},
		title: {
			text: 'Temuan Patroli Per Regu',
			align: 'center'
		},
		subtitle: {
			text: "Periode " + <?= date('Y') ?>
		},
		xAxis: {
			categories: <?= $plants ?>
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: ( // theme
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || 'gray',
					textOutline: 'none'
				}
			}
		},

		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'GROUP A',
			data: []
		}, {
			name: 'GROUP B',
			data: []
		}, {
			name: 'GROUP C',
			data: []
		}, {
			name: 'GROUP D',
			data: []
		}]
	});
	// end temuan

	Highcharts.chart('chartCloseTemuan', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Temuan Per Tindakan',
			align: 'center'
		},
		subtitle: {
			text: "Periode 2023"
		},
		xAxis: {
			categories: month
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: ( // theme
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || 'gray',
					textOutline: 'none'
				}
			}
		},

		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'CLOSE',
			data: [3, 5, 1, 13, 14, 8, 8, 12, 3, 5, 1, 13]
		}, {
			name: 'OPEN',
			data: [14, 8, 8, 12, 3, 5, 1, 13, 14, 8, 8, 12]
		}]
	});

	Highcharts.chart('chartCloseTemuan2', {
		chart: {
			type: 'column'
		},
		title: {
			text: 'Temuan Per Tindakan',
			align: 'center'
		},
		subtitle: {
			text: "Periode 2023"
		},
		xAxis: {
			categories: <?= $plants ?>
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Total'
			},
			stackLabels: {
				enabled: true,
				style: {
					fontWeight: 'bold',
					color: ( // theme
						Highcharts.defaultOptions.title.style &&
						Highcharts.defaultOptions.title.style.color
					) || 'gray',
					textOutline: 'none'
				}
			}
		},

		tooltip: {
			headerFormat: '<b>{point.x}</b><br/>',
			pointFormat: '{series.name}: {point.y} TEMUAN<br/>'
		},
		plotOptions: {
			column: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		exporting: {
			buttons: {
				contextButton: {
					enabled: false
				},
			}
		},
		series: [{
			name: 'CLOSE',
			data: [3, 5, 1, 13]
		}, {
			name: 'OPEN',
			data: [14, 8, 8, 12]
		}]
	});
</script>