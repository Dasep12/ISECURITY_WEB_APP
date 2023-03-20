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
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
						<img src="../../../../images/faces/face11.jpg" class="img-lg rounded" alt="profile image"/>
						<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
							<a href="<?= base_url('isecurity_contractor/SecOps/Kendaraan/')?>Scanner">	
							<h6 class="mb-0">Scan</h6>
							<p class="mb-0 text-success font-weight-bold">Kendaraan</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
						<img src="../../../../images/faces/face11.jpg" class="img-lg rounded" alt="profile image"/>
						<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
							<h6 class="mb-0">Masuk</h6>
							<p class="text-muted mb-1">0</p>
							<p class="mb-0 text-success font-weight-bold">Kendaraan</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
						<img src="../../../../images/faces/face9.jpg" class="img-lg rounded" alt="profile image"/>
						<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
							<h6 class="mb-0">Keluar</h6>
							<p class="text-muted mb-1">0</p>
							<p class="mb-0 text-success font-weight-bold">Kendaraan</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
						<img src="../../../../images/faces/face12.jpg" class="img-lg rounded" alt="profile image"/>
						<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
							<h6 class="mb-0">Parkir</h6>
							<p class="text-muted mb-1">131</p>
							<p class="mb-0 text-success font-weight-bold">Free Lot Parkir</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="col-md-4 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
							<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
									<h4 class="mb-0"> Grafik Kendaraan Hari ini </h4>
									<canvas id="KendaraanPerhari"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="d-sm-flex flex-row flex-wrap text-center text-sm-left align-items-center">
							<div class="ms-sm-3 ms-md-0 ms-xl-3 mt-2 mt-sm-0 mt-md-2 mt-xl-0">
									<h4 class="mb-0"> Grafik Kendaraan Periode <?php echo date('Y')?></h4>
									<canvas id="KendaraanPeriodeTahun"></canvas>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<script>
  
</script>




