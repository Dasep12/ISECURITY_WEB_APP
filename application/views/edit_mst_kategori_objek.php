<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Master Company</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Kategori_Object') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Kategori_Object') ?>">Kategori Objek</a></li>
                    <li class="breadcrumb-item"><a href="">Edit Kategori Objek</a></li>
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
                <?php if ($this->session->flashdata("info")) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('info') ?>
                        <?php $this->session->unset_userdata('info') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <div class="card card4">
                    <div class="card-header text-white">
                        <h3 class="card-title">Edit Data</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <!-- <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                <i class="fas fa-times"></i>
                            </button> -->
                        </div>
                    </div>
                    <form onsubmit="return cek()" action="<?= base_url('Mst_Kategori_Object/update') ?>" method="post">

                        <input type="hidden" name="id" value="<?= $data->kategori_id ?>">
                        <div class="card-body">

                            <div class="form-group mt-2">
                                <label for="">NAMA KATEGORI</label>
                                <input type="text" name="kategori_name" value="<?= $data->kategori_name ?>" autocomplete="off" id="kategori_name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">STATUS</label>
                                <select name="status" class="form-control" id="">
                                    <?php if ($data->status == 1) { ?>
                                        <option selected value="<?= $data->status ?>">ACTIVE</option>
                                        <option value="0">INACTIVE</option>
                                    <?php } else if ($data->status == 0) { ?>
                                        <option value="<?= $data->status ?>">INACTIVE</option>
                                        <option value="1">ACTIVE</option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>KETERANGAN</label>
                                <textarea class="form-control" name="others" id="others"><?= $data->others ?></textarea>
                            </div>


                            <a href="<?= base_url('Mst_Kategori_Object') ?>" class="btn btn-success btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>
<script>
    function cek() {
        if (document.getElementById("plant_id").value == "") {
            Swal.fire({
                title: 'Perhatian!',
                text: 'pilih plant',
                icon: 'error',
            }).then((result) => {
                // $("#site_name").focus();
            })
            return false
        } else if (document.getElementById("zone_id").value == "") {
            Swal.fire({
                title: 'Perhatian!',
                text: 'pilih zona',
                icon: 'error',
            }).then((result) => {
                // $("#site_name").focus();
            })
            return false
        } else if (document.getElementById("kategori_name").value == "") {
            Swal.fire({
                title: 'Perhatian!',
                text: 'nama kategori harus di isi',
                icon: 'error',
            }).then((result) => {
                // $("#site_name").focus();
            })
            return false
        }
        return;
    }

    $("select[name=plant_id").on('change', function() {
        var id = $("select[name=plant_id] option:selected").val();
        // console.log(id)
        if (id == null || id == "") {
            // document.getElementById('list_zone').innerHTML = "";
        } else {
            $.ajax({
                url: "<?= base_url('Mst_Checkpoint/showZone') ?>",
                method: "POST",
                data: "id=" + id,
                beforeSend: function() {
                    document.getElementById('info').style.display = "block"
                },
                complete: function() {
                    document.getElementById('info').style.display = "none"

                },
                success: function(e) {
                    document.getElementById('list_zone').innerHTML = e;
                    console.log(e);
                }
            })
        }
    });
</script>