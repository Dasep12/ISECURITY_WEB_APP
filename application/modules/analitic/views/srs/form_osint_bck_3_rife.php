<style>
    .datepicker {
        top: 260px !important;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>OSINT</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Analytic</a></li>
                    <li class="breadcrumb-item"><a href="">Operational</a></li>
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
                            <button class="nav-link" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Input Data
                            </button>
                        <?php } ?>
                        <button class="nav-link active" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">View Data</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <?php if (is_access_privilege($this->module_code, 'crt')) { ?>
                        <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card">
                                <!-- <div class="card-header">
                                <h3 class="card-title">Input Data Internal Source</h3>
                            </div> -->

                                <?= form_open_multipart('analitic/srs/osint/save'); ?>
                                <div class="card-body px-lg-4">

                                    <div class="form-row mb-4">
                                        <div class="form-group col-lg-3">
                                            <label for="">Event Date</label>
                                            <input type="text" id="datetimepicker2" class="form-control" name="event_date" autocomplete="off" required>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="">Activities Name</label>
                                            <!-- <input type="text" id="eventName" class="form-control" name="activity_name" autocomplete="off" required> -->
                                            <textarea id="eventName" class="form-control" rows="1" name="activity_name" autocomplete="off" required></textarea>
                                        </div>
                                    </div>

                                    <!-- section 1 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-3">
                                            <label for="secInfo">Plant</label>
                                            <select required class="form-control" name="plant" id="plant">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($plant->result() as $pl) : ?>
                                                    <option value="<?= $pl->id ?>"><?= $pl->plant ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load1" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div class="form-group col-3" id="columnFirst" style="display: none;">
                                            <label required for="secInfo">Area</label>
                                            <select class="form-control" name="area" id="subArea">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($area->result() as $ar) : ?>
                                                    <option value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load2" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div style="display: none;" id="column3" class="form-group col-3">
                                            <label for="column3label" id="column3label">Restirected Area</label>
                                            <select class="form-control" name="subArea1" id="subArea1">
                                                <option value="">-- Select --</option>
                                            </select>
                                            <span id="load3" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div style="display: none;" id="column4" class=" form-group col-3">
                                            <label for="secInfo" id="column4label">Production</label>
                                            <select class="form-control" name="subArea2" id="subArea2">
                                                <option value="">-- Select --</option>
                                            </select>
                                            <span id="load4" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                    </div>

                                    <!-- section 2 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-3">
                                            <label for="area">Target Issue</label>
                                            <select required class="form-control" name="issueTarget" id="issueTarget">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($targetIssue->result() as $ar) : ?>
                                                    <option value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load5" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <div class="form-group col-3" id="column5" style="display: none;">
                                            <label required id="column5Label" for="area">Employee Issue</label>
                                            <select class="form-control" name="subIssueTarget" id="subIssueTarget">
                                                <option value="">-- Select --</option>
                                            </select>
                                            <span id="load6" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <div class="form-group col-3" id="column6" style="display: none;">
                                            <label id="column6Label" for="area">Conflict</label>
                                            <select class="form-control" name="subIssueTarget1" id="subIssueTarget1">
                                                <option value="">-- Select --</option>
                                            </select>
                                            <span id="load7" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <div class="form-group col-3" id="column7" style="display: none;">
                                            <label id="column7Label" for="area">Conflict</label>
                                            <select class="form-control" name="subIssueTarget2" id="subIssueTarget2">
                                                <option value="">-- Select --</option>
                                            </select>
                                            <span id="load8" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                    </div>

                                    <!-- section 3 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-3">
                                            <label for="area">Risk Source</label>
                                            <select required class="form-control" name="riskSource" id="riskSource">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($riskSource->result() as $ar) : ?>
                                                    <option value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load9" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <div class="form-group col-3" id="column8" style="display: none;">
                                            <label id="column8Label" for="area">Internal</label>
                                            <select required class="form-control" name="subriskSource" id="subriskSource">
                                                <option selected value="">-- Select --</option>
                                            </select>
                                            <span id="load10" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <div class="form-group col-3" id="column9" style="display: none;">
                                            <label id="column9Label" for="area">Employee</label>
                                            <select class="form-control" name="subriskSource1" id="subriskSource1">
                                                <option selected value="">-- Select --</option>
                                            </select>
                                            <span id="load11" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div class="form-group col-3" id="column09" style="display: none;">
                                            <label id="column09Label" for="area">Plant</label>
                                            <select class="form-control" name="employe_plant" id="subriskSource01">
                                                <option selected value="">-- Select --</option>
                                            </select>
                                            <span id="load011" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                    </div>

                                    <!-- section 4 -->
                                    <div class="form-row mb-4 ">
                                        <div class="form-group col-3">
                                            <label for="hatespeech">Hatespeech Type</label>
                                            <select required class="form-control" name="hatespeech" id="hatespeech">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($hatespeech->result() as $hts) : ?>
                                                    <option value="<?= $hts->sub_id ?>"><?= $hts->name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                    </div>

                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">Matriks Risk</legend>
                                            <!-- Media -->
                                            <div class="form-row mb-4">
                                                <div class="form-group col-3">
                                                    <label for="mediaIssue">Media</label>
                                                    <select required class="form-control" name="mediaIssue" id="mediaIssue">
                                                        <option selected value="">-- Select --</option>
                                                        <?php foreach ($media->result() as $m) : ?>
                                                            <option value="<?= $m->sub_id.':'.$m->level_id.':'.$m->level; ?>"><?= $m->name ?></option>
                                                        <?php endforeach ?>
                                                    </select>
                                                    <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div>

                                                <div class="form-group col-3" id="column10"  style="display: none;">
                                                    <label id="column10Label" for="area">-</label>
                                                    <select class="form-control" name="SubmediaIssue" id="SubmediaIssue">
                                                        <option selected value="">-- Select --</option>
                                                    </select>
                                                    <span id="load13" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div>

                                                <!-- <div class="form-group col-3" id="column11" style="display: none;">
                                                    <label id="column11Label" for="area">News Portal</label>
                                                    <select class="form-control" name="SubmediaIssue1" id="SubmediaIssue1">
                                                        <option selected value="">-- Select --</option>
                                                    </select>
                                                    <span id="load14" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div> -->

                                                <div class="form-row ml-1">
                                                    <div class="form-group">
                                                        <label for="mediaLevel">Media Level</label>
                                                        <input id="mediaLevel" class="form-control" type="text" name="media_level" readonly required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Regional -->
                                            <div class="form-row mb-4">
                                                <div class="form-group col-3">
                                                    <label for="regional">Regional</label>
                                                    <?= $regional; ?>
                                                    <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="regionalLevel">Regional Level</label>
                                                    <input id="regionalLevel" class="form-control" type="text" name="regional_level" readonly required>
                                                </div>
                                            </div>

                                            <!-- Legalitas -->
                                            <div class="form-row mb-4">
                                                <div class="form-group col-3">
                                                    <label for="legalitas">Legalitas</label>
                                                    <?= $legalitas; ?>
                                                    <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="legalitasLevel">Legalitas Level</label>
                                                    <input id="legalitasLevel" class="form-control" type="text" name="legalitas_level" readonly required>
                                                </div>
                                            </div>

                                            <!-- Format -->
                                            <div class="form-row mb-4">
                                                <div class="form-group col-3">
                                                    <label for="format">Format</label>
                                                    <?= $format; ?>
                                                    <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="formatLevel">Format Level</label>
                                                    <input id="formatLevel" class="form-control" type="text" name="format_level" readonly required>
                                                </div>
                                            </div>
                                    </fieldset>

                                    <!-- section 5-->
                                    <!-- <div class="form-row mb-4 ">
                                        <div class="form-group col-3">
                                            <label for=" area">Risk/Treat</label>
                                            <select required class="form-control" name="riskTreat" id="riskTreat">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($riskTarget->result() as $m) : ?>
                                                    <option value="<?= $m->sub_id ?>"><?= $m->name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load15" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div class="form-group col-3" style="display: block;" id="column13">
                                            <label id="column13Label" for="area">Risk Level</label>
                                            <select required class="form-control" name="LevelriskTreat" id="LevelriskTreat">
                                                <option selected value="">-- Select --</option>
                                            </select>
                                            <span id="load16" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                    </div> -->

                                    <!--  -->
                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">Vulnerability Lost</legend>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label for=" area">SDM Sector Effect</label>
                                                <select required class="form-control" name="sdm" id="sdm">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($sdm->result() as $m) : ?>
                                                        <option value="<?= $m->sub_id ?>"><?= $m->level . '.' . $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load17" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for=" area">Reputation / Brand Image</label>
                                                <select required class="form-control" name="reput" id="reput">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($reput->result() as $m) : ?>
                                                        <option value="<?= $m->sub_id ?>"><?= $m->level . '.' . $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load17" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>

                                        </div>

                                        <div class="form-row ml-1">
                                            <div class="form-group">
                                                <label for="">Impact Level</label>
                                                <input type="text" name="impact" id="impact" readonly class="form-control">
                                            </div>
                                        </div>

                                    </fieldset>
                                    <!-- section 7 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-7">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <div class="form-row">
                                                <div class="form-group col-12 mb-5">
                                                    <label for="attach">Attach file photo/video</label>
                                                    <style type="text/css">
                                                        .field-wrapper input[type=file]::file-selector-button {
                                                            border: 1px solid #bbbebf;
                                                            padding: .2em .4em;
                                                            border-radius: .2em;
                                                            background-color: rgb(48 67 108 / 70%);
                                                            color: #fff;
                                                        }
                                                    </style>
                                                    <div class="field-wrapper">
                                                        <div class="mb-1">
                                                            <input class="" type="file" accept="image/*,.pdf,.xls,.xlsx,.doc,.docx,.mp4" id="attach" name="attach[]">
                                                            <!-- <label class="custom-file-label">Choose file</label> -->
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-info add-button mt-3" type="button" href="javascript:void(0);">Add More</button>
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="url1">URL 1</label>
                                                    <input id="url1" class="form-control" type="text" name="url1">
                                                </div>

                                                <div class="form-group col-12">
                                                    <label for="url2">URL 2</label>
                                                    <input id="url1" class="form-control" type="text" name="url2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-row mt-2 mb-4">
                                        <button class="btn btn-primary px-4" type="submit">SAVE</button>
                                    </div>
                                </div>
                                <?= form_close(); ?>

                            </div>
                        </div>
                    <?php } ?>

                    <!-- <?= !is_access_privilege($this->module_code, 'crt') ? 'show active' : ''; ?> -->
                    <div class="tab-pane fade  show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card">
                            <div class="card-body px-lg-4">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <form id="form-filter" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-lg-3">
                                                    <label for="">Date</label>
                                                    <input type="text" id="datePickerFilter" class="form-control" name="date_filter" autocomplete="off" required>
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
                                    <table id="tableOsint" style="width:100%" class="table table-striped table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Activities</th>
                                                <th>Plant</th>
                                                <th>Media</th>
                                                <th>Platform</th>
                                                <th>Risk</th>
                                                <th>Date</th>
                                                <th>Impact Level</th>
                                                <th style="width:200px">Action</th>
                                            </tr>
                                        </thead>
                                        <!-- <tbody></tbody> -->
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
            <!-- <div class="modal-header border-0">
                <h5 class="modal-title" id="detailModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div> -->
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
            <?= form_open('analitic/srs/osint/approve'); ?>
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
            <?= form_open('analitic/srs/osint/delete'); ?>
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
    // TinyMCE //
    tinymce.init({
        selector: '#description',
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


    function openImg(image) {
        alert(image);
    }

    $(document).ready(function() {

        // $('#datetimepicker2').datepicker({
        //     // defaultDate: true,
        //     // defaultTime: false,
        //     // pickTime: false,
        //     dateFormat: 'yy-mm-dd',
        // });

        var maxField = 5;
        var addButton = $('.add-button');
        var wrapper = $('.field-wrapper');
        var fieldHTML = `<div class="d-flex flex-row justify-content-between mb-1">
            <input class="" type="file" accept="image/*,.pdf,.xls,.xlsx,.doc,.docx,.mp4" id="attach" name="attach[]">
            <a class="remove-attach text-danger" href="javascript:void(0);"><i class="fa fa-trash"></i></a>
            </div>`;
        var x = 1;

        //Once add button is clicked
        $(addButton).click(function() {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML);
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove-attach', function(e) {
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });
        //datatables
        table = $('#tableOsint').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [],
            "autoWidth": false,
            "stateSave": true,
            "ajax": {
                "url": "<?= site_url('analitic/srs/osint/list_table'); ?>",
                "type": "POST",
                "data": function(data) {
                    data.datefilter = $('#datePickerFilter').val();
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

        $('#detailModal').on('shown.bs.modal', function(e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const row = $(target).closest("tr");
            const title = row.find("td:nth-child(2)");

            // console.log(title)
            // modal.find('#detailModalLabel').text(tds.text());

            $.ajax({
                url: '<?= site_url('analitic/srs/osint/detail'); ?>',
                method: 'POST',
                data: {
                    id: id,
                },
                cache: false,
                beforeSend: function() {
                    $(".lds-ring").show();
                },
                success: function(data) {
                    // console.log(data)
                    $(".lds-ring").hide();
                    $('#detailModal .modal-body').html(data);
                    //menampilkan data ke dalam modal
                }
            });
        });

        $('#detailModal').on('hide.bs.modal', function(e) {
            $('#detailModal .modal-body').children().remove();
        })

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

        $(function() {
            moment.locale('id');
            var start = moment().subtract(1, 'days');
            var end = moment();
            $('#datePickerFilter').daterangepicker({
                autoUpdateInput: false,
                timePicker: false,
                timePicker24Hour: false,
                startDate: start,
                endDate: end,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                locale: {
                    "format": "YYYY-MM-DD",
                    // "format": "LL",
                    // "separator": " - ",
                    // "applyLabel": "Apply",
                    // "cancelLabel": "Cancel",
                    // "weekLabel": "W",
                    // "daysOfWeek": [
                    //     "Min",
                    //     "Sen",
                    //     "Sel",
                    //     "Rab",
                    //     "Kam",
                    //     "Jum",
                    //     "Sab"
                    // ],
                    // "monthNames": [
                    //     "Januari",
                    //     "Februari",
                    //     "Maret",
                    //     "April",
                    //     "Mei",
                    //     "Juni",
                    //     "Juli",
                    //     "Augustus",
                    //     "September",
                    //     "Oktober",
                    //     "November",
                    //     "Desember"
                    // ],
                    // "firstDay": 1
                },
            });
        });

        $('input[name="date_filter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD'));
        });
    });

    $(function() {
        // section 1 
        $("#plant").change(function(e) {
            var id = $(this).val();
            var text = $('option:selected', this).text();
            console.log(text);
            if (id == "" || text == "PLANT UNKNOWN") {
                document.getElementById("columnFirst").style.display = "none";
                document.getElementById("column4").style.display = "none";
                document.getElementById("column3").style.display = "none";
                // var select = $('#subArea1');
                const text = '-- Select --';
                const $select = document.querySelector('#subArea1');
                const $options = Array.from($select.options);
                const optionToSelect = $options.find(item => item.text === text);
                optionToSelect.selected = true;
            } else {
                document.getElementById("columnFirst").style.display = "block";
                document.getElementById("column3").style.display = "none";
                document.getElementById("column4").style.display = "none";
            }
        })

        // filter 1 row 1 
        $("#subArea").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_subArea') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load2").style.display = "block";
                    document.getElementById("column3").style.display = "none";
                },
                complete: function() {
                    document.getElementById("column3").style.display = "block";
                    document.getElementById("load2").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    var select = $('#subArea1');
                    document.getElementById("column3").style.display = "block";
                    document.getElementById("column3label").innerHTML = label;
                    select.empty();
                    var added = document.createElement('option');
                    added.value = "";
                    added.innerHTML = "-- Select --";
                    select.append(added);
                    var result = JSON.parse(e);
                    for (var i = 0; i < result.length; i++) {
                        var added = document.createElement('option');
                        added.value = result[i].id;
                        added.innerHTML = result[i].name;
                        select.append(added);
                    }
                }
            })
        })

        // filter 2 row 1 
        $("#subArea1").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            var plant = $("select[id=plant] option:selected").val();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_subArea1') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load3").style.display = "block";
                },
                complete: function() {
                    document.getElementById("load3").style.display = "none";
                },
                data: {
                    id: id,
                    plant: plant
                },
                success: function(e) {
                    // console.log(e);
                    if (parseInt(e) != 0) {
                        var select = $('#subArea2');
                        document.getElementById("column4").style.display = "block";
                        document.getElementById("column4label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column4").style.display = "none";
                    }
                }
            })
        })
        // 

        // section 2
        // filter 1 row 2
        $("#issueTarget").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_Issue') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load5").style.display = "block";
                    document.getElementById("column5").style.display = "none";
                    document.getElementById("column6").style.display = "none";
                    document.getElementById("column7").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load5").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    if (parseInt(e) != 0) {
                        var select = $('#subIssueTarget');
                        document.getElementById("column5").style.display = "block";
                        document.getElementById("column5Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column5").style.display = "none";
                    }

                }
            })
        })

        // filter 2 row 2
        $("#subIssueTarget").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_SubIssue') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load6").style.display = "block";
                    document.getElementById("column6").style.display = "none";
                    document.getElementById("column7").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load6").style.display = "none";
                    // document.getElementById("column6").style.display = "block";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    // console.log(e);
                    document.getElementById("column7").style.display = "none";
                    if (parseInt(e) != 0) {
                        var select = $('#subIssueTarget1');
                        document.getElementById("column6").style.display = "block";
                        document.getElementById("column6Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column6").style.display = "none";
                    }
                }
            })
        })

        // filter 3 row 2
        $("#subIssueTarget1").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_SubIssue1') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load7").style.display = "block";
                },
                complete: function() {
                    document.getElementById("load7").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    // console.log(e);
                    if (parseInt(e) != 0) {
                        var select = $('#subIssueTarget2');
                        document.getElementById("column7").style.display = "block";
                        document.getElementById("column7Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column7").style.display = "none";
                    }
                }
            })
        })

        // section 3
        // filter 1 row 3
        $("#riskSource").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_riskSource') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load9").style.display = "block";
                    document.getElementById("column8").style.display = "none";
                    document.getElementById("column9").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load9").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    // console.log(e);
                    if (parseInt(e) != 0) {
                        var select = $('#subriskSource');
                        document.getElementById("column8").style.display = "block";
                        document.getElementById("column8Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column8").style.display = "none";
                    }
                }
            })
        })

        // filter 2 row 3
        $("#subriskSource").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_riskSource1') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load10").style.display = "block";
                    document.getElementById("column9").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load10").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    // console.log(e);
                    if (parseInt(e) != 0) {
                        var select = $('#subriskSource1');
                        document.getElementById("column9").style.display = "block";
                        document.getElementById("column9Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                        var Plants = <?= json_encode($plant->result()) ?>;
                        if (label == "Employee") {
                            var select1 = $('#subriskSource01');
                            document.getElementById("column09").style.display = "block";
                            document.getElementById("column09Label").innerHTML = "Plant";
                            select1.empty();
                            var added = document.createElement('option');
                            added.value = "";
                            added.innerHTML = "-- Select --";
                            select1.append(added);
                            for (var i = 0; i < Plants.length; i++) {
                                var added = document.createElement('option');
                                added.value = Plants[i].id;
                                added.innerHTML = Plants[i].plant;
                                select1.append(added);
                            }
                        } else {
                            var select1 = $('#subriskSource01');
                            document.getElementById("column09").style.display = "none";
                            select1.empty();
                            var added = document.createElement('option');
                            added.value = "";
                            added.innerHTML = "-- Select --";
                        }

                    } else {
                        document.getElementById("column9").style.display = "none";
                    }

                }
            })
        })

        // fitler 1 row 4
        $("#mediaIssue").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();

            $('#mediaLevel').val('')

            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_issuMedia') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load12").style.display = "block";
                    document.getElementById("column10").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load12").style.display = "none";
                },
                data: {
                    id: id.split(":")[0],
                },
                success: function(e) {
                    if (parseInt(e) != 0) {
                        var select = $('#SubmediaIssue');
                        document.getElementById("column10").style.display = "block";
                        document.getElementById("column10Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        document.getElementById("column10").style.display = "none";
                        document.getElementById("column11").style.display = "none";
                        document.getElementById("column12").style.display = "none";
                    }

                }
            })
        })

        // filter 2 row 4
        $("#SubmediaIssue").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            var media = $('#mediaIssue').find('option:selected').val().split(':')[2];

            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_SubissuMedia') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load13").style.display = "block";
                    // document.getElementById("column11").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load13").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    if (parseInt(e) != 0) {
                        var select = $('#SubmediaIssue1');
                        document.getElementById("column11").style.display = "block";
                        document.getElementById("column11Label").innerHTML = label;
                        select.empty();
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].name;
                            select.append(added);
                        }
                    } else {
                        // document.getElementById("column11").style.display = "none";
                    }

                    $('#mediaLevel').val(media)

                }
            })
        })

        // $("#SubmediaIssue1").change(function(e) {
        //     var id = $(this).val();
        //     var label = $('option:selected', this).text();
        //     $.ajax({
        //         url: "<?= base_url('analitic/srs/osint/get_SubissuMedia1') ?>",
        //         method: "POST",
        //         cache: false,
        //         beforeSend: function() {
        //             document.getElementById("load14").style.display = "block";
        //             document.getElementById("column12").style.display = "none";
        //         },
        //         complete: function() {
        //             document.getElementById("load14").style.display = "none";
        //         },
        //         data: {
        //             id: id,
        //         },
        //         success: function(e) {
        //             if (parseInt(e) != 0) {
        //                 var select = $('#SubmediaIssue2');
        //                 document.getElementById("column12").style.display = "block";
        //                 document.getElementById("column12Label").innerHTML = label;
        //                 select.empty();
        //                 var added = document.createElement('option');
        //                 added.value = "";
        //                 added.innerHTML = "-- Select --";
        //                 select.append(added);
        //                 var result = JSON.parse(e);
        //                 for (var i = 0; i < result.length; i++) {
        //                     var added = document.createElement('option');
        //                     added.value = result[i].id;
        //                     added.innerHTML = result[i].name;
        //                     select.append(added);
        //                 }
        //             } else {
        //                 document.getElementById("column12").style.display = "none";
        //             }

        //         }
        //     })
        // })
        // 


        // filter 1 row 5 
        $("#riskTreat").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_LevelRisk') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load15").style.display = "block";
                    // document.getElementById("column12").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load15").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    console.log(id);
                    var select = $('#LevelriskTreat');
                    if (parseInt(e) != 0) {
                        document.getElementById("column13").style.display = "block";
                        // document.getElementById("column13Label").innerHTML = label;
                        select.empty();
                        var result = JSON.parse(e);
                        for (var i = 0; i < result.length; i++) {
                            var added = document.createElement('option');
                            added.value = result[i].id;
                            added.innerHTML = result[i].level;
                            select.append(added);
                        }
                    } else {
                        select.empty();
                        // document.getElementById("column13").style.display = "none";
                        var added = document.createElement('option');
                        added.value = "";
                        added.innerHTML = "-- Select --";
                        select.append(added);
                    }

                }
            })
        })

        // filter row 6
        $("#sdm").change(function(e) {
            var id = $(this).val();
            var levelSDM = $('option:selected', this).text().split(".")[0];
            var levelReput = $("select[name=reput] option:selected").text().split(".")[0];
            // console.log(levelReput);
            if (parseInt(levelSDM) > parseInt(levelReput)) {
                document.getElementById("impact").value = levelSDM;
            } else {
                document.getElementById("impact").value = levelReput == "-- Select --" ? '' : levelReput;
            }
        })

        // filter row 6
        $("#reput").change(function(e) {
            var id = $(this).val();
            var levelReput = $('option:selected', this).text().split(".")[0];
            var levelSDM = $("select[name=sdm] option:selected").text().split(".")[0];
            // console.log(levelReput);
            if (parseInt(levelReput) > parseInt(levelSDM)) {
                document.getElementById("impact").value = levelReput;
            } else {
                document.getElementById("impact").value = levelSDM == "-- Select --" ? '' : levelSDM;
            }
        })

        // REGIONAL LEVEL
        $("#regional").change(function(e) {
            var id = $(this).val();
            var regionalLevel = $('option:selected', this).val().split(':')[2];

            $('#regionalLevel').val('')
            $('#regionalLevel').val(regionalLevel)
        })

        // LEGALITAS
        $("#legalitas").change(function(e) {
            var id = $(this).val();
            var label = $(this).find('option:selected').text();
            var legalitas = $(this)
            var legalitasSub1 = $('#legalitasSub1')
            var legalitasLevel = $('#legalitasLevel')

            legalitasLevel.val('')
            legalitasSub1.parents('.form-group').remove()

            $.ajax({
                url: "<?= base_url('analitic/srs/osint/getCategorySub1') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load12").style.display = "block";
                    document.getElementById("column10").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load12").style.display = "none";
                },
                data: {
                    id: id.split(":")[0],
                },
                success: function(data) {
                    legalitas.parents('.form-group').after(data);
                    var legalitasSub1 = $('#legalitasSub1')
                    legalitasSub1.parents().children('label').text(label);

                    // LEGALITAS SUB1
                    $("#legalitasSub1").change(function(e) {
                        var legalitasLevelVal = $('option:selected', this).val().split(':')[2];

                        legalitasLevel.val('')
                        legalitasLevel.val(legalitasLevelVal)
                    });
                }
            })
        });

        // REGIONAL LEVEL
        $("#format").change(function(e) {
            var id = $(this).val();
            var formatLevel = $('option:selected', this).val().split(':')[2];

            $('#formatLevel').val('')
            $('#formatLevel').val(formatLevel)
        });

    })
</script>