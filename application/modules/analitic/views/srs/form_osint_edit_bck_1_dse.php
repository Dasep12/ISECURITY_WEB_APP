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
                            <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Edit Data</button>
                        <?php } ?>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <?php if (is_access_privilege($this->module_code, 'crt')) { ?>
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="card">
                                <!-- <div class="card-header">
                                <h3 class="card-title">Input Data Internal Source</h3>
                            </div> -->

                                <?= form_open_multipart('analitic/srs/osint/update'); ?>
                                <input type="text" hidden name="id" value="<?= $data->id ?>">
                                <div class="card-body px-lg-4">

                                    <div class="form-row mb-4">
                                        <div class="form-group col-lg-3">
                                            <label for="">Event Date</label>
                                            <input value="<?= date('Y-m-d ', strtotime($data->date)) ?>" type="text" id="datetimepicker2" class="form-control" name="event_date" autocomplete="off" required>
                                        </div>

                                        <div class="form-group col-lg-3">
                                            <label for="">Activities Name</label>
                                            <input value="<?= $data->activity_name ?>" type="text" id="eventName" class="form-control" name="activity_name" autocomplete="off" required>
                                        </div>
                                    </div>

                                    <!-- section 1 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-3">
                                            <label for="secInfo">Plant</label>
                                            <select required class="form-control" name="plant" id="plant">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($plant->result() as $pl) : ?>
                                                    <option <?= $data->plant_id == $pl->id ? "selected" : "" ?> value="<?= $pl->id ?>"><?= $pl->plant ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load1" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>


                                        <div class="form-group col-3" id="columnFirst" style="display: block;">
                                            <label required for="secInfo">Area</label>
                                            <select class="form-control" name="area" id="subArea">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($area->result() as $ar) : ?>
                                                    <option <?= $data->area_id == $ar->sub_id ? "selected" : "" ?> value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load2" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <?php
                                        if ($data->sub_area1_id != null) {
                                            $subArea1 = $this->osidb->query("select * from admisecosint_sub1_header_data where sub_header_data = $data->area_id   ")->result();
                                        ?>
                                            <div style="display: block;" id="column3" class="form-group col-3">
                                                <label for="column3label" id="column3label">Restirected Area</label>
                                                <select class="form-control" name="subArea1" id="subArea1">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($subArea1 as $su) : ?>
                                                        <option <?= $data->sub_area1_id == $su->id ? "selected" : "" ?> value="<?= $su->id ?>"><?= $su->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load3" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php  } ?>

                                        <?php

                                        if ($data->sub_area2_id != null) {
                                            $subArea2 = $this->osidb->query("select * from admisecosint_sub2_header_data where sub1_header_id = $data->sub_area1_id  and plant_id = $data->plant_id ")->result();
                                        ?>
                                            <div style="display: block;" id="column4" class=" form-group col-3">
                                                <label for="secInfo" id="column4label">Production</label>
                                                <select class="form-control" name="subArea2" id="subArea2">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($subArea2 as $su) : ?>
                                                        <option <?= $data->sub_area2_id == $su->id ? "selected" : "" ?> value="<?= $su->id ?>"><?= $su->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load4" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php  } ?>
                                    </div>

                                    <!-- section 2 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-3">
                                            <label for="area">Target Issue</label>
                                            <select required class="form-control" name="issueTarget" id="issueTarget">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($targetIssue->result() as $ar) : ?>
                                                    <option <?= $data->target_issue_id == $ar->sub_id ? "selected" : "" ?> value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load5" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <?php
                                        if ($data->sub_target_issue1_id != null) {
                                            $subTargetIssue = $this->osidb->query("select * from admisecosint_sub1_header_data where sub_header_data = $data->target_issue_id ");
                                        ?>
                                            <div class="form-group col-3" id="column5" style="display: block;">
                                                <label required id="column5Label" for="area">Employee Issue</label>
                                                <select class="form-control" name="subIssueTarget" id="subIssueTarget">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($subTargetIssue->result() as $ar) : ?>
                                                        <option <?= $data->sub_target_issue1_id == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load6" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if ($data->sub_target_issue2_id != null) {
                                            $subTargetIssue2 = $this->osidb->query("select * from admisecosint_sub2_header_data where sub1_header_id = $data->sub_target_issue1_id ");
                                        ?>
                                            <div class="form-group col-3" id="column6" style="display: block;">
                                                <label id="column6Label" for="area">Conflict</label>
                                                <select class="form-control" name="subIssueTarget1" id="subIssueTarget1">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($subTargetIssue2->result() as $ar) : ?>
                                                        <option <?= $data->sub_target_issue2_id == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load7" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($data->sub_target_issue3_id != null) {
                                            $subTargetIssue3 = $this->osidb->query("select * from admisecosint_sub3_header_data where sub2_header_id = '$data->sub_target_issue2_id' ");
                                        ?>
                                            <div class="form-group col-3" id="column7" style="display: block;">
                                                <label id="column7Label" for="area">Conflict</label>
                                                <select class="form-control" name="subIssueTarget2" id="subIssueTarget2">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($subTargetIssue3->result() as $ar) : ?>
                                                        <option <?= $data->sub_target_issue3_id == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load8" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- section 3 -->
                                    <div class="form-row mb-4">

                                        <div class="form-group col-3">
                                            <label for="area">Risk Source</label>
                                            <select required class="form-control" name="riskSource" id="riskSource">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($riskSource->result() as $ar) : ?>
                                                    <option <?= $data->risk_source == $ar->sub_id ? "selected" : "" ?> value="<?= $ar->sub_id ?>"><?= $ar->name ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span id="load9" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <?php
                                        if ($data->sub_risk_source != null) {
                                            $subRiskSource = $this->osidb->query("select * from admisecosint_sub1_header_data where sub_header_data = $data->risk_source ");
                                        ?>
                                            <div class="form-group col-3" id="column8" style="display: block;">
                                                <label id="column8Label" for="area">Internal</label>
                                                <select required class="form-control" name="subriskSource" id="subriskSource">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subRiskSource->result() as $ar) : ?>
                                                        <option <?= $data->sub_risk_source == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load10" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($data->sub_risk1_source != null) {
                                            $subRiskSource1 = $this->osidb->query("select * from admisecosint_sub2_header_data where sub1_header_id = $data->sub_risk_source ");
                                        ?>
                                            <div class="form-group col-3" id="column9" style="display: block;">
                                                <label id="column9Label" for="area">Employee</label>
                                                <select class="form-control" name="subriskSource1" id="subriskSource1">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subRiskSource1->result() as $ar) : ?>
                                                        <option <?= $data->sub_risk1_source == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->name ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load11" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>


                                        <?php
                                        if ($data->employe_plant != null) {
                                            $subRiskSource2 = $this->osidb->query("select * from admiseciso_area_sub where area_categ_id = 1 ");
                                        ?>
                                            <div class="form-group col-3" id="column09" style="display: block;">
                                                <label id="column09Label" for="area">Plant</label>
                                                <select class="form-control" name="employe_plant" id="subriskSource01">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subRiskSource2->result() as $ar) : ?>
                                                        <option <?= $data->employe_plant == $ar->id ? "selected" : "" ?> value="<?= $ar->id ?>"><?= $ar->title ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <span id="load011" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- section 4 -->

                                    <div class="form-row mb-4 ">
                                        <div class="form-group col-3">
                                            <label for="area">Media</label>
                                            <select required class="form-control" name="mediaIssue" id="mediaIssue">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($media->result() as $m) : ?>
                                                    <option <?= $data->media_id == $m->sub_id ? "selected" : "" ?> value="<?= $m->sub_id ?>"><?= $m->name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load12" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                        <?php
                                        if ($data->sub_media_id != null) {
                                            $subMedia = $this->osidb->query("select * from admisecosint_sub1_header_data where sub_header_data = $data->media_id ");
                                        ?>
                                            <div class="form-group col-3" id="column10" style="display: block;">
                                                <label id="column10Label" for="area">Online</label>
                                                <select class="form-control" name="SubmediaIssue" id="SubmediaIssue">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subMedia->result() as $m) : ?>
                                                        <option <?= $data->sub_media_id == $m->id ? "selected" : "" ?> value="<?= $m->id ?>"><?= $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load13" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($data->sub1_media_id != null) {
                                            $subMedia1 = $this->osidb->query("select * from admisecosint_sub2_header_data where sub1_header_id = $data->sub_media_id ");
                                        ?>
                                            <div class="form-group col-3" id="column11" style="display: block;">
                                                <label id="column11Label" for="area">News Portal</label>
                                                <select class="form-control" name="SubmediaIssue1" id="SubmediaIssue1">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subMedia1->result() as $m) : ?>
                                                        <option <?= $data->sub1_media_id == $m->id ? "selected" : "" ?> value="<?= $m->id ?>"><?= $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load14" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>

                                        <?php
                                        if ($data->sub2_media_id != null) {
                                            $subMedia2 = $this->osidb->query("select * from admisecosint_sub3_header_data where sub2_header_id = $data->sub1_media_id ");
                                        ?>
                                            <div class="form-group col-3" id="column12" style="display: block;">
                                                <label id="column12Label" for="area">Swasta</label>
                                                <select class="form-control" name="SubmediaIssue2" id="SubmediaIssue2">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($subMedia2->result() as $m) : ?>
                                                        <option <?= $data->sub2_media_id == $m->id ? "selected" : "" ?> value="<?= $m->id ?>"><?= $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load14" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <!-- section 5-->
                                    <div class="form-row mb-4 ">
                                        <div class="form-group col-3">
                                            <label for=" area">Risk/Treat</label>
                                            <select required class="form-control" name="riskTreat" id="riskTreat">
                                                <option selected value="">-- Select --</option>
                                                <?php foreach ($riskTarget->result() as $m) : ?>
                                                    <option <?= $data->risk_id == $m->sub_id ? "selected" : "" ?> value="<?= $m->sub_id ?>"><?= $m->name ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <span id="load15" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>

                                        <div class="form-group col-3" style="display: block;" id="column13">
                                            <label id="column13Label" for="area">Risk Level</label>
                                            <select required class="form-control" name="LevelriskTreat" id="LevelriskTreat">
                                                <option selected value="<?= $data->risk_level_id ?>"><?= $data->risk_level_id ?></option>
                                            </select>
                                            <span id="load16" style="display: none;" class="font-italic text-white">loading data</span>
                                        </div>
                                    </div>

                                    <!--  -->
                                    <fieldset class="border p-4 mt-2 mb-4">
                                        <legend class="w-auto h5">Vulnerability Lost</legend>
                                        <div class="form-row">
                                            <div class="form-group col-3">
                                                <label for=" area">SDM Sector Effect</label>
                                                <select required class="form-control" name="sdm" id="sdm">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($sdm->result() as $m) : ?>
                                                        <option <?= $data->sdm_sector_level_id == $m->sub_id ? "selected" : "" ?> value="<?= $m->sub_id ?>"><?= $m->level . '.' . $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load17" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>


                                            <div class="form-group col-3">
                                                <label for=" area">Reputation / Brand Image</label>
                                                <select required class="form-control" name="reput" id="reput">
                                                    <option selected value="">-- Select --</option>
                                                    <?php foreach ($reput->result() as $m) : ?>
                                                        <option <?= $data->reputasi_level_id == $m->sub_id ? "selected" : "" ?> value="<?= $m->sub_id ?>"><?= $m->level . '.' . $m->name ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                                <span id="load17" style="display: none;" class="font-italic text-white">loading data</span>
                                            </div>

                                        </div>
                                        <div class="form-row ml-1">
                                            <div class="form-group">
                                                <label for="">Impact Level</label>
                                                <input type="text" value="<?= $data->impact_level ?>" name="impact" id="impact" readonly class="form-control">
                                            </div>
                                        </div>

                                    </fieldset>
                                    <!-- section 7 -->
                                    <div class="form-row mb-4">
                                        <div class="form-group col-7">
                                            <label for="description">Description</label>
                                            <textarea id="description" class="form-control" name="description" rows="3"><?= $data->description ?></textarea>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="attach">Attach</label>
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
                                                    <ul class="list-group list-group-flush mb-3">
                                                        <?php
                                                        foreach ($file_edit->result() as $fle) {
                                                            if (!empty($fle->file_name))
                                                                echo '<li class="list-group-item attached-files d-flex justify-content-between">
                                                            <a class="" href="' . site_url('uploads/srs_bi/osint/' . $fle->file_name) . '" target="_blank">' . $fle->file_name . '</a>
                                                            <input type="text" name="attached[' . $fle->id . ']" value="' . $fle->file_name . '" hidden>
                                                            <button type="button" class="btn remove-attached text-danger" data-field-file="' . $fle->id . '" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></button>
                                                            </li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </div>
                                            </div>

                                            <button class="btn btn-info add-button mt-3" type="button" href="javascript:void(0);">Add More</button>

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


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="frm-dlt-attc">
                <div class="modal-body">
                    <h5>Are you sure to Delete?</h5>
                </div>
                <div id="loadingDelete" style="display: none;" class="row justify-content-center">

                    <div class="spinner-grow text-primary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <div class="spinner-grow text-secondary" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                    <div class="spinner-grow text-success" role="status">
                        <span class="visually-hidden"></span>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <input id="fileId" type="text" name="file_id" hidden>
                    <button id="btn-dlt-attc" type="button" class="btn btn-danger px-4">Yes</button>
                </div>
            </form>
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

    $(document).ready(function() {

        // $('#datetimepicker2').datetimepicker({
        //     defaultDate: true,
        //     defaultTime: false,
        //     format: 'Y-m-d h:i:s',
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


        $('#deleteModal').on('shown.bs.modal', function(e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('field-file')
            $('#fileId').val(id)
            // $('#fileId').val(id)
        })

        $('#btn-dlt-attc').click(function(e) {
            e.preventDefault();
            const id = $('#fileId').val()
            const targetParents = $(`[data-field-file='` + id + `']`).parent();
            $.ajax({
                url: "<?= site_url('analitic/srs/osint/delete_attached'); ?>",
                method: "POST",
                data: {
                    id: <?= $data->id; ?>,
                    fileId: id,
                },
                beforeSend: function() {
                    document.getElementById("loadingDelete").style.display = "block";
                },
                complete: function() {
                    document.getElementById("loadingDelete").style.display = "none";
                },
                success: function(response) {
                    // console.log(response)
                    if (parseInt(response) == 00) {
                        targetParents.remove();
                        console.log("terhapus");
                    }
                    $("#deleteModal").modal('hide');

                }
            });
        });



        $(function() {
            moment.locale('id');
            var start = moment().subtract(1, 'days');
            var end = moment();
            $('#datePickerFilter').daterangepicker({
                autoUpdateInput: false,
                timePicker: true,
                timePicker24Hour: true,
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
                    "format": "YYYY-MM-DD HH:mm",
                },
            });
        });

        $('input[name="date_filter"]').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm'));
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
                // document.getElementById("column4").style.display = "none";
                // document.getElementById("column3").style.display = "none";
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
                    // document.getElementById("load5").style.display = "block";
                    // document.getElementById("column5").style.display = "none";
                    // document.getElementById("column6").style.display = "none";
                    // document.getElementById("column7").style.display = "none";
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
                    // document.getElementById("column6").style.display = "none";
                    // document.getElementById("column7").style.display = "none";
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
                    // document.getElementById("column7").style.display = "none";
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
                        // document.getElementById("column6").style.display = "none";
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
                    id: id,
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
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_SubissuMedia') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load13").style.display = "block";
                    document.getElementById("column11").style.display = "none";
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
                        document.getElementById("column11").style.display = "none";
                    }

                }
            })
        })

        $("#SubmediaIssue1").change(function(e) {
            var id = $(this).val();
            var label = $('option:selected', this).text();
            $.ajax({
                url: "<?= base_url('analitic/srs/osint/get_SubissuMedia1') ?>",
                method: "POST",
                cache: false,
                beforeSend: function() {
                    document.getElementById("load14").style.display = "block";
                    document.getElementById("column12").style.display = "none";
                },
                complete: function() {
                    document.getElementById("load14").style.display = "none";
                },
                data: {
                    id: id,
                },
                success: function(e) {
                    if (parseInt(e) != 0) {
                        var select = $('#SubmediaIssue2');
                        document.getElementById("column12").style.display = "block";
                        document.getElementById("column12Label").innerHTML = label;
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
                        document.getElementById("column12").style.display = "none";
                    }

                }
            })
        })
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


    })
</script>