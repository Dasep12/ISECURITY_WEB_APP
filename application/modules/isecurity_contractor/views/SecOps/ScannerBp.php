<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h4 class="info-box-text">Selamat Datang <?= $user->nama?></h4>
       			 <h6 class="info-box-text">Ini Adalah Menu Melakukan Scanner Bisnis Partner <span class="text-primary"><?= $user->area_kerja?>!</span></h6>
			</div>
		</div>
	</div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center align-items-center">
                            <h4 class="card-description text-center"> <i class="fa fa-barcode" aria-hidden="true"></i> SCAN HERE </h4>
                                <form action="" class="form-sample" method="POST" id="PostKendaraan">
                                   <div class="row">
                                        <div class="col-sm-12">
                                            <input type="text" hidden readonly class="form-control" id="area_kerja" name="areakerja" value="<?= $user->area_kerja?>"/>
                                            <input type="text"  class="form-control" id="noBarcodeKendaraan" name="noBarcodeKendaraan"/>
                                            <!-- <video id="previewKamera" width="320" class="img-thumbnail" playsinline></video> -->
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-sm-12">
                                             <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-md-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                    <div class="table-responsive scrollbar">
                                    <table id="dataTabels" class="table table-hover" >
                                            <thead >
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NPK</th>
                                                    <th>NAMA</th>
                                                    <th>Bisnis Partner</th>
                                                    <th>Request By</th>
                                                </tr>
                                            </thead> 
                                            <tbody>
                                            
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>