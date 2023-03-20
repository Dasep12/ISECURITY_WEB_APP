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
      <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-success elevation-1"><i class="fa fa-check-square"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tamu</span>
            <span class="info-box-number">Masuk</span>
          </div>
          </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fa fa-eye"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tamu</span>
            <span class="info-box-number">On Area</span>
          </div>
          </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-times"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Tamu</span>
            <span class="info-box-number">Keluar</span>
          </div>
          </div>
      </div>

      
    </div>
    <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-success elevation-1"><i class="fa fa-id-badge"></i></span>
          <div class="info-box-content">
          <a href="<?php echo base_url('isecurity_contractor/SecOps/Tamu/Visitor')?>" style="text-decoration:none;">
            <span class="info-box-number text-dark">Input Data Visitor</span>
           
          </a>
          </div>
          </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fa fa-eye"></i></span>
          <div class="info-box-content">
          <a href="<?php echo base_url('isecurity_contractor/SecOps/Tamu/DataTamu')?>" style="text-decoration:none;">
            <span class="info-box-number text-dark">Input Database Tamu</span>
          
          </a>
          </div>
          </div>
      </div>

      <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
          <span class="info-box-icon bg-gradient-danger elevation-1"><i class="fa fa-book"></i></span>
          <div class="info-box-content">
          <a href="<?php echo base_url('isecurity_contractor/SecOps/Tamu/ListVisitor')?>" style="text-decoration:none;">
            <span class="info-box-number text-dark">List Visitor</span>
           
          </a>
          </div>
          </div>
      </div>
      
    </div>

    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <figure class="highcharts-figure">
            <div id="chartJS"></div>
            <p class="highcharts-description">
              Chart showing data updating every second, with old data being removed.
            </p>
          </figure>
      </div>
    </div>
  </div>
</section>


         