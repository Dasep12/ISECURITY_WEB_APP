<style>
	.select2-container--default .select2-selection--single {
		padding: 18px !important;
	}

	.select2-container .select2-selection--single .select2-selection__rendered {
		margin-top: -14px !important;
		margin-left: -17px !important;
	}

	.select2-selection__arrow {
		margin-top: 5px !important;
	}

	#preloader2 {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background-color: #fff;
		opacity: 0.5;
		display: none;
	}

	#preloader2 .loading {
		position: absolute;
		left: 50%;
		top: 50%;
		opacity: 1;
		/* transform: translate(-50%, -50%); */
		font: 14px arial;
	}
</style>
<div id="preloader2">
	<div class="loading">
		<div style="z-index:9999;" class="row justify-content-center">
			<div class="overlay;" id="loadUpdate">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			</div>
		</div>
	</div>
</div>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<!-- <h1>Master Event</h1> -->
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<!-- <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Master</a></li>
					<li class="breadcrumb-item"><a href="<?= base_url('Mst_Settings') ?>">Settings</a></li> -->
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- Default box -->
				<?php if ($this->session->flashdata("info")) { ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('info') ?>
						<?= $this->session->unset_userdata('info') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } else if ($this->session->flashdata("fail")) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('fail') ?>
						<?= $this->session->unset_userdata('fail') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
				<a href="<?= base_url('Setting/MasterAplikasi/form_add_app') ?>" data-toggle="modal" data-target="#add-data" data-backdrop="static" data-keyboard="false" class="btn btn-sm btn-success mb-2">
					<i class="fa fa-plus"></i> Tambah Data
				</a>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Data Module</h3>
						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
								<i class="fas fa-minus"></i>
							</button>
							<!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
								<i class="fas fa-times"></i>
							</button> -->
						</div>
					</div>
					<div class="card-body">
						<table id="example2" class="table-sm  mt-1 table table-striped table-bordered">
							<thead>
								<tr>
									<th>NO</th>
									<th>NAMA</th>
									<th>APLIKASI</th>
									<th>MENU</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								foreach ($role_level as $zn) :
								?>
									<tr>
										<td><?= $no++ ?></td>
										<td><?= strtoupper($zn->nama_user) ?></td>
										<td><?= strtoupper($zn->name_app) ?></td>
										<td><?= strtoupper($zn->name_m) ?></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</section>


<!-- modal add -->
<div class="modal hide fade" id="add-data" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add</h5>
			</div>
			<form method="post" action="<?= base_url("Setting/UserRoleApp/input") ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>USER</label>
						<select class="select2 form-control" name="npk" id="npk">
							<option value="">Pilih User</option>
							<?php
							foreach ($user->result() as $us) : ?>
								<option value="<?= $us->npk ?>"><?= strtoupper($us->name) ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>LEVEL</label>
						<select class="select2 form-control" name="level_id" id="level_id">
							<option value="">Pilih Level</option>
							<?php
							foreach ($role->result() as $us) : ?>
								<option value="<?= $us->role_id ?>"><?= strtoupper($us->level) ?></option>
							<?php endforeach ?>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- edit -->


<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add</h5>
			</div>
			<form method="post" action="<?= base_url("Setting/MasterAplikasi/edit") ?>">
				<div class="modal-body">
					<div class="form-group">
						<label>NAMA APLIKASI</label>
						<input type="hidden" name="id_apps" id="id_apps">
						<input type="text" name="name_apps1" class="form-control" id="name_apps1">
					</div>
					<div class="form-group">
						<label>KODE APLIKASI</label>
						<input type="text" name="code_apps1" class="form-control" id="code_apps1">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-sm btn-primary">Submit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	$("#edit-data").on("show.bs.modal", function(event) {
		var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
		var modal = $(this);
		// Isi nilai pada field
		modal.find("#code_apps1").attr("value", div.data("code"));
		modal.find("#name_apps1").attr("value", div.data("name"));
		modal.find("#id_apps").attr("value", div.data("id"));
	});

	$("#name_apps").change(function() {
		var name = $("#name_apps").val();
		var select1 = $('#module_name');
		$.ajax({
			url: "<?= base_url('Setting/MasterRoleApp/getNameModule') ?>",
			method: "POST",
			data: {
				'id': name
			},
			success: function(e) {
				select1.empty();
				var added2 = document.createElement('option');
				added2.value = "";
				added2.innerHTML = "Pilih Modules";
				select1.append(added2);
				var result = JSON.parse(e);
				for (var i = 0; i < result.length; i++) {
					var added = document.createElement('option');
					added.value = result[i].id;
					added.innerHTML = result[i].name;
					select1.append(added);
				}
			}
		})
	})
</script>