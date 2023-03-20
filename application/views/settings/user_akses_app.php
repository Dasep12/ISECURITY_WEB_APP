<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <!-- <h1>Master User</h1> -->
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <!-- <li class="breadcrumb-item"><a href="<?= base_url('Mst_User') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_User') ?>">User</a></li> -->
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
                        <?= $this->session->unset_userdata('info') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif ?>
                <a href="<?= base_url('Setting/Pengguna/register') ?>" class="mb-3 btn btn-sm btn-primary" data-backdrop="static" data-keyboard="false">
                    <i class="fa fa-plus"></i> Tambah Apps
                </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Master User Apps</h3>
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
                        <table id="example2" class="mt-1 table table-sm   table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">NO</th>
                                    <th>NPK</th>
                                    <th>NAMA</th>
                                    <th>LEVEL</th>
                                    <th>APPS</th>
                                    <th>CRUD</th>
                                    <th>READ</th>
                                    <th>UPDATE</th>
                                    <th>DELETE</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
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



<!-- modal edit data user -->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
                        <label>NAMA</label>
                        <input readonly type="text" class="form-control" id="nama">
                    </div>

                    <div class="form-group">
                        <label>NPK</label>
                        <input type="text" readonly class="form-control" id="npk">
                    </div>
                    <div class="form-group">
                        <label>EMAIL</label>
                        <input type="text" readonly class="form-control" id="email">
                    </div>

                    <div class="form-group">
                        <label>WILAYAH</label>
                        <input readonly type="text" class="form-control" id="site">
                    </div>

                    <div class="form-group">
                        <label>PLANT</label>
                        <input readonly type="text" class="form-control" id="plant">
                    </div>

                    <div class="form-group">
                        <label>LEVEL</label>
                        <input readonly type="text" class="form-control" id="level">
                    </div>
                    <div class="form-group">
                        <label>GRUP PATROLI</label>
                        <input readonly type="text" class="form-control" id="grup">
                    </div>
                    <div class="form-group">
                        <label>STATUS</label>
                        <input readonly type="text" class="form-control" id="status">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- edit data object -->


    <!-- modal edit password -->
    <div class="modal fade" id="edit-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" onsubmit="return cekpassword()" action="<?= base_url('Master_user/resetPasword') ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" id="id_user2" name="id_3">
                            <label for="">NEW PASSWORD</label>
                            <input type="password" class="form-control" id="password3" name="password3">
                        </div>

                        <div class="form-group">
                            <label for="">REWRITE NEW PASSWORD</label>
                            <input type="password" class="form-control" id="password4" name="password4">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>



<script>
    function cekpassword() {
        if (document.getElementById("password3").value == "") {
            alert("isi password ");
            $("#password3").focus();
            return false
        } else if (document.getElementById("password4").value == "") {
            alert("isi password ");
            $("#password4").focus();
            return false
        } else if (document.getElementById("password3").value != document.getElementById("password4").value) {
            alert("password harus sama");
            return false
        }
        return;
    }

    $("#edit-data").on("show.bs.modal", function(event) {
        var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
        var modal = $(this);
        // Isi nilai pada field
        modal.find("#nama").attr("value", div.data("nama"));
        modal.find("#email").attr("value", div.data("email"));
        modal.find("#npk").attr("value", div.data("npk"));
        modal.find("#site").attr("value", div.data("site"));
        modal.find("#plant").attr("value", div.data("plant"));
        modal.find("#level").attr("value", div.data("level"));
        modal.find("#grup").attr("value", div.data("grup"));
        if (div.data("status") == 1) {
            modal.find("#status").attr("value", "ACTIVE");
        } else {
            modal.find("#status").attr("value", "INACTIVE");
        }
    });

    // $("#edit-password").on("show.bs.modal", function(event) {
    //     var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
    //     var modal = $(this);
    //     // Isi nilai pada field
    //     modal.find("#id_user2").attr("value", div.data("id"));
    // });
</script>