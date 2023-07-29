<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daily Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Analytic</a></li>
                    <li class="breadcrumb-item"><a href="">Operational Index</a></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <?php
            if ($this->session->tempdata('success')) {
                echo '<div class="col-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong>' . $this->session->tempdata('success') . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
            } else if ($this->session->tempdata('error')) {
                echo '<div class="col-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong>' . $this->session->tempdata('error') . '
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
            } else {
            }
            ?>

            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php if (is_access_privilege($this->module_code, 'crt')) { ?>
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Input Data</button>
                        <?php } ?>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">View Data</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <?php if (is_access_privilege($this->module_code, 'crt')) { ?>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card">
                                <?= form_open_multipart('analitic/soa/daily_report/save'); ?>
                                <div class="card-body px-lg-4">
                                    <div class="form-row mt-2 mb-4">
                                        <div class="form-group col-3">
                                            <label for="reportDate">Report Date</label>
                                            <input type="text" id="reportDate" class="form-control" name="report_date" autocomplete="off" required>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="shift">Shift</label>
                                            <?= $select_shift; ?>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="area">Area</label>
                                            <?= $select_area; ?>
                                        </div>
                                    </div>

                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">People</legend>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label for="employee" class="font-weight-normal">Employee Attendance</label>
                                                <div class="input-group">
                                                    <input id="employee" class="form-control mask-int" name="employee" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-3">
                                                <label for="contractor" class="font-weight-normal">Contractor Attendance</label>
                                                <div class="input-group">
                                                    <input id="contractor" class="form-control mask-int" name="contractor" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-3">
                                                <label for="visitor" class="font-weight-normal">Visitor Attendance</label>
                                                <div class="input-group">
                                                    <input id="visitor" class="form-control mask-int" name="visitor" autocomplete="off" required>
                                                </div>
                                            </div>

                                            <div class="form-group col-3">
                                                <label for="businessPartner" class="font-weight-normal">Business Partner Attendance</label>
                                                <div class="input-group">
                                                    <input id="businessPartner" class="form-control mask-int" name="business_partner" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">Document</legend>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label for="employee" class="font-weight-normal">PKB</label>
                                                <div class="input-group">
                                                    <input id="pkb" class="form-control mask-int" name="pkb" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="employee" class="font-weight-normal">PKO</label>
                                                <div class="input-group">
                                                    <input id="pko" class="form-control mask-int" name="pko" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="employee" class="font-weight-normal">Surat Jalan</label>
                                                <div class="input-group">
                                                    <input id="surat_jalan" class="form-control mask-int" name="surat_jalan" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">Vehicle</legend>

                                        <div class="form-row">
                                            <div class="form-group col-12">
                                                <div class="row">
                                                    <div class="col-2">
                                                        <div class="nav flex-column nav-pills people" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <button class="nav-link active" id="v-pills-employee-tab" data-toggle="pill" data-target="#v-pills-employee" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Employee</button>
                                                            <button class="nav-link" id="v-pills-visitor-tab" data-toggle="pill" data-target="#v-pills-visitor" type="button" role="tab" aria-controls="v-pills-visitor" aria-selected="false">Visitor</button>
                                                            <button class="nav-link" id="v-pills-bp-tab" data-toggle="pill" data-target="#v-pills-bp" type="button" role="tab" aria-controls="v-pills-bp" aria-selected="false">Business Partner</button>
                                                            <button class="nav-link" id="v-pills-contractor-tab" data-toggle="pill" data-target="#v-pills-contractor" type="button" role="tab" aria-controls="v-pills-contractor" aria-selected="false">Contractor</button>
                                                        </div>
                                                    </div>


                                                    <div class="col-10">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-employee" role="tabpanel" aria-labelledby="v-pills-employee-tab">
                                                                <div class="form-row">
                                                                    <div class="form-group col-3">
                                                                        <label for="car" class="font-weight-normal">Car</label>
                                                                        <div class="input-group">
                                                                            <input id="car_employee" class="form-control mask-int" name="car_employee" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="Motorcycle" class="font-weight-normal">Motorcycle</label>
                                                                        <div class="input-group">
                                                                            <input id="motorcycle_employee" class="form-control mask-int" name="motorcycle_employee" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="bicycle" class="font-weight-normal">Bicycle</label>
                                                                        <div class="input-group">
                                                                            <input id="bicycle_employee" class="form-control mask-int" name="bicycle_employee" autocomplete="off" required>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-visitor" role="tabpanel" aria-labelledby="v-pills-visitor-tab">
                                                                <div class="form-row">
                                                                    <div class="form-group col-3">
                                                                        <label for="car_visitor" class="font-weight-normal">Car</label>
                                                                        <div class="input-group">
                                                                            <input id="car_visitor" class="form-control mask-int" name="car_visitor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="Motorcycle_visitor" class="font-weight-normal">Motorcycle</label>
                                                                        <div class="input-group">
                                                                            <input id="motorcycle_visitor" class="form-control mask-int" name="motorcycle_visitor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="bicycle_visitor" class="font-weight-normal">Bicycle</label>
                                                                        <div class="input-group">
                                                                            <input id="bicycle_visitor" class="form-control mask-int" name="bicycle_visitor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="truck_visitor" class="font-weight-normal">Truck</label>
                                                                        <div class="input-group">
                                                                            <input id="truck_visitor" class="form-control mask-int" name="truck_visitor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-bp" role="tabpanel" aria-labelledby="v-pills-bp-tab">
                                                                <div class="form-row">
                                                                    <div class="form-group col-3">
                                                                        <label for="car_bp" class="font-weight-normal">Car</label>
                                                                        <div class="input-group">
                                                                            <input id="car_bp" class="form-control mask-int" name="car_bp" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="Motorcycle_bp" class="font-weight-normal">Motorcycle</label>
                                                                        <div class="input-group">
                                                                            <input id="motorcycle_bp" class="form-control mask-int" name="motorcycle_bp" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="bicycle_bp" class="font-weight-normal">Bicycle</label>
                                                                        <div class="input-group">
                                                                            <input id="bicycle_bp" class="form-control mask-int" name="bicycle_bp" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="truck_bp" class="font-weight-normal">Truck</label>
                                                                        <div class="input-group">
                                                                            <input id="truck_bp" class="form-control mask-int" name="truck_bp" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="tab-pane fade" id="v-pills-contractor" role="tabpanel" aria-labelledby="v-pills-contractor-tab">
                                                                <div class="form-row">
                                                                    <div class="form-group col-3">
                                                                        <label for="car_contractor" class="font-weight-normal">Car</label>
                                                                        <div class="input-group">
                                                                            <input id="car_contractor" class="form-control mask-int" name="car_contractor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="Motorcycle_contractor" class="font-weight-normal">Motorcycle</label>
                                                                        <div class="input-group">
                                                                            <input id="motorcycle_contractor" class="form-control mask-int" name="motorcycle_contractor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="bicycle_contractor" class="font-weight-normal">Bicycle</label>
                                                                        <div class="input-group">
                                                                            <input id="bicycle_contractor" class="form-control mask-int" name="bicycle_contractor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-3">
                                                                        <label for="truck_contractor" class="font-weight-normal">Truck</label>
                                                                        <div class="input-group">
                                                                            <input id="truck_contractor" class="form-control mask-int" name="truck_contractor" autocomplete="off" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-row mt-2 mb-4 justify-content-end">
                                        <button class="btn btn-primary px-4" type="submit">SAVE</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="tab-pane fade <?= !is_access_privilege($this->module_code, 'crt') ? 'show active' : ''; ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body px-lg-4">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <form id="form-filter" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-2">
                                                    <label for="areaFilter">Area</label>
                                                    <?= $select_area_filter; ?>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-4">
                                                    <button type="button" id="btn-filter" class="btn btn-primary px-4 mr-2">Filter</button>
                                                    <button type="button" id="btn-reset" class="btn btn-secondary px-4">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="table-responsive mt-5">
                                    <table id="tableIso" style="width:100%" class="table table-striped table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Area</th>
                                                <th>Year</th>
                                                <th>Month</th>
                                                <th>People</th>
                                                <th>System</th>
                                                <th>Device</th>
                                                <th>Network</th>
                                                <th style="width:200px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 700px;">
        <div class="modal-content">
            <div class="modal-header border-0">
                <!-- <h5 class="modal-title" id="detailModalLabel"></h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open('analitic/srs/soi/approve'); ?>
            <!-- <div class="modal-header border-0">
            <h5 class="modal-title" id="deleteModalLabel">Are you sure to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->

            <div class="modal-body">
                <h5>Are you sure to Approve?</h5>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input id="idApprove" type="text" name="id" hidden>
                <button type="submit" class="btn btn-danger px-4">Yes</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<!-- Approve Modal -->

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <?= form_open('analitic/srs/soi/delete'); ?>
            <!-- <div class="modal-header border-0">
            <h5 class="modal-title" id="deleteModalLabel">Are you sure to Delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> -->

            <div class="modal-body">
                <h5>Are you sure to Delete?</h5>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input id="idDelete" type="text" name="id" hidden>
                <button type="submit" class="btn btn-danger px-4">Yes</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url('vendor/tinymce/tinymce.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.mask-decimal').mask("#.##", {
            reverse: true
        }).attr('maxlength', 3);
        $('.mask-int').mask("###", {
            reverse: true
        }).attr('maxlength', 4);

        $("#reportDate").datepicker();

        // TinyMCE //
        tinymce.init({
            selector: '#chronology',
            setup: function(editor) {
                editor.on('change', function() {
                    tinymce.triggerSave();
                });
            },
            height: 300,
            extended_valid_elements: "script[src|async|defer|type|charset]",
            plugins: [
                "advlist code autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
                "table contextmenu directionality emoticons paste textcolor fullscreen"
            ],
            fullscreen_native: true,
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect ",
            toolbar2: "| print preview "
        });


        //datatables
        table = $('#tableIso').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [],
            "autoWidth": false,

            "ajax": {
                "url": "<?= site_url('analitic/srs/soi/list_table'); ?>",
                "type": "POST",
                "data": function(data) {
                    data.areafilter = $('#areaFilter').val();
                    data.yearfilter = $('#yearFilter').val();
                    data.monthfilter = $('#monthFilter').val();
                }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }],
        });

        $('#btn-filter').click(function() {
            table.ajax.reload(); //just reload table
        });

        $('#btn-reset').click(function() {
            $('#form-filter')[0].reset();
            table.ajax.reload(); //just reload table
        });

        // mengambil julmah rata Guard Tour
        $("#area, #years, #month").change(function(e) {
            var area = $("#area").val()
            var year = $("#years").val()
            var month = $("#month").val()
            var asm = $('#asms').val();

            if (area.length != 0 && year.length != 0 && month.length) {
                $.ajax({
                    url: '<?= site_url('analitic/srs/soi/get_performance_gt'); ?>',
                    type: 'POST',
                    data: {
                        area: area,
                        year: year,
                        month: month,
                    },
                    cache: false,
                    beforeSend: function() {
                        // document.getElementById("loader").style.display = "block";
                    },
                    complete: function() {
                        // document.getElementById("loader").style.display = "none";
                    },
                    success: function(res) {
                        var json = JSON.parse(res)

                        // jika plant 4
                        if (area === '4') {
                            var pefGt = Math.round(json.performance_gt / 2)
                        } else {
                            var pefGt = Math.round(json.performance_gt / 20)
                        }

                        var arrAvg = [(pefGt / 20)]

                        if (asm.length != 0) {
                            arrAvg.push((asm / 20));
                        }

                        var total = arrAvg.map(function(n) {
                            return n * 100;
                        }).reduce(function(a, b) {
                            return a + (b || 0);
                        });

                        const resAvg = Math.round((total / arrAvg.length)) / 100;

                        $('#guardtour').val(pefGt)
                        $('#system').val(resAvg)
                    }
                });
            }
        });

        $('#detailModal').on('shown.bs.modal', function(e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const row = $(target).closest("tr");
            const title = row.find("td:nth-child(2)");

            // console.log(title)
            // modal.find('#detailModalLabel').text(tds.text());

            $.ajax({
                url: '<?= site_url('analitic/srs/soi/detail'); ?>',
                type: 'POST',
                data: {
                    id: id,
                },
                cache: false,
                beforeSend: function() {
                    $(".lds-ring").show();
                },
                success: function(data) {
                    $(".lds-ring").hide();
                    $('#detailModal .modal-body').html(data); //menampilkan data ke dalam modal
                }
            });
        });

        $('#deleteModal').on('shown.bs.modal', function(e) {
            $('#deleteModal .modal-body .title-approve').remove()

            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const title = target.data('title')

            $('#idDelete').val(id)
            $('#deleteModal .modal-body h5').after(`
            <span class="font-weight-bold title-approve">${title}</span> 
        `)
        })

        $('#approveModal').on('shown.bs.modal', function(e) {
            $('#approveModal .modal-body .title-approve').remove()

            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const title = target.data('title')

            $('#idApprove').val(id)
            $('#approveModal .modal-body h5').after(`
            <span class="font-weight-bold title-approve">${title}</span> 
        `)
        })
    });
</script>