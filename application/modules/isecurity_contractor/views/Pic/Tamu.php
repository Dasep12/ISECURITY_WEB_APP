<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
            <h4 class="info-box-text">Selamat Datang <?= $user->nama?></h4>
            <h6 class="info-box-text">Ini Adalah Dashboard PIC Pada Menu Tamu <span class="text-primary"><?= $user->wilayah?>!</span></h6> 
      </div>
    </div>
  </div>
</section>


<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box">
					<span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-bell"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Temuan Hari Ini</span>
						<span class="info-box-number"><?= $data_temuan->temuan_hari_ini ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-triangle"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Total Temuan</span>
						<span class="info-box-number"><?= $data_temuan->total_temuan ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->

			<!-- fix for small devices only -->
			<div class="clearfix hidden-md-up"></div>

			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-square"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Tindakan Cepat</span>
						<span class="info-box-number"><?= $data_temuan->tindakan_cepat ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
			<div class="col-12 col-sm-6 col-md-3">
				<div class="info-box mb-3">
					<span class="info-box-icon bg-gradient-warning elevation-1 text-white"><i class="fas fa-user-friends"></i></span>

					<div class="info-box-content">
						<span class="info-box-text">Laporkan PIC</span>
						<span class="info-box-number"><?= $data_temuan->laporkan_pic ?></span>
					</div>
					<!-- /.info-box-content -->
				</div>
				<!-- /.info-box -->
			</div>
			<!-- /.col -->
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<!-- /.card-header -->
					<div class="card-body">
						<div class="">
							<p class="text-center mb-2">
								<strong>Grafik Temuan <br />Periode Tahun <?= $year; ?></strong>
							</p>

							<div class="chart">
								<canvas id="chartTemuan" style="height: 300px;"></canvas>
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
								<strong>Performance Patroli <br />Periode Tahun <?= $year; ?>
								</strong>
							</p>

							<div class="chart" style="">
								<canvas id="chartPatroli" style="height: 300px;"></canvas>
							</div>
							<!-- /.chart-responsive -->
						</div>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Temuan Group Per Plant
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanByUser" data-action="ajaxListPatroliByUser">
						</div>

						<div class="chart">
							<canvas id="chartTemuanByUser" style="height: 300px;"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Patroli Group Per Plant
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartPatroliByUser" data-action="ajaxListPatroliByUser">
						</div>

						<div class="chart">
							<canvas id="chartPatroliByUser" style="height: 300px;"></canvas>
						</div>
						<!-- /.chart-responsive -->
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Temuan Berdasarkan Plant
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanbyPlant" data-action="ajaxTemuanbyPlant">
						</div>

						<div class="chart">
							<canvas id="chartTemuanbyPlant" style="height: 300px;"></canvas>
						</div>
					</div>
				</div>
				<!-- /.chart-responsive -->
			</div>

		</div>
		<div class="row">
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Temuan Berdasarkan Kategori object
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
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Temuan Berdasarkan Zona
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTemuanZone" data-action="ajaxTemuanZone">
						</div>

						<div class="chart">
							<canvas id="chartTemuanZone" style="height: 300px;"></canvas>
						</div>
						<!-- /.chart-responsive -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Tren Temuan
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTrenTemuan" data-filterplant="true" data-action="ajaxTrenTemuan">
						</div>

						<div class="chart">
							<canvas id="chartTrenTemuan" style="height: 300px;"></canvas>
						</div>
						<!-- /.chart-responsive -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<p class="text-center mb-2">
							<strong>Tren Patroli
							</strong>
						</p>
						<div class="d-flex justify-content-center mb-2 month-picker" data-chart="chartTrenPatroli" data-filterplant="true" data-action="ajaxTrenPatroli">
						</div>

						<div class="chart">
							<canvas id="chartTrenPatroli" style="height: 300px;"></canvas>
						</div>
						<!-- /.chart-responsive -->
					</div>
				</div>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- ./card-body -->
	<div class="card-footer">
		<div class="row">
			<div class="col-sm-3 col-6">
				<div class="description-block border-right">
					<h5 class="description-header"><?= $data_temuan->temuan_selesai ?></h5>
					<span class="description-text">TEMUAN SELESAI</span>
				</div>
				<!-- /.description-block -->
			</div>
			<!-- /.col -->
			<div class="col-sm-3 col-6">
				<div class="description-block border-right">
					<h5 class="description-header"><?= $data_temuan->temuan_belum_selesai ?></h5>
					<span class="description-text">TEMUAN BELUM SELESAI</span>
				</div>
				<!-- /.description-block -->
			</div>
			<!-- /.col -->
			<div class="col-sm-3 col-6">
				<div class="description-block border-right">
					<h5 class="description-header">0</h5>
					<span class="description-text">TOTAL </span>
				</div>
				<!-- /.description-block -->
			</div>
			<!-- /.col -->
			<div class="col-sm-3 col-6">
				<div class="description-block">
					<h5 class="description-header">0</h5>
					<span class="description-text">TOTAL</span>
				</div>
				<!-- /.description-block -->
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /.card-footer -->

</section>