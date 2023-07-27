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
                if($this->session->tempdata('success')) { 
                    echo '<div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success!</strong>'.$this->session->tempdata('success').'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
                } else if($this->session->tempdata('error')) {
                    echo '<div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>'.$this->session->tempdata('error').'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
                } else {}
             ?>

            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <?php if(is_access_privilege($this->module_code, 'crt')) { ?>
                        <button class="nav-link active" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Input Data</button>
                        <?php } ?>
                        <button class="nav-link" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">View Data</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <?php if(is_access_privilege($this->module_code, 'crt')) { ?>
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h3 class="card-title">Input Data Internal Source</h3>
                            </div> -->

                            <?= form_open_multipart('analitic/srs/osint/save'); ?>
                            <div class="card-body px-lg-4">

                                <div class="form-row mb-4">
                                    <div class="form-group col-lg-3">
                                        <label for="">Event Date</label>
                                        <input type="text" id="datetimepicker" class="form-control" name="event_date" autocomplete="off" required>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-3">
                                        <label for="secInfo">Security Information</label>
                                        <?= $select_security_information; ?>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-3">
                                        <label for="area">Area</label>
                                        <?= $select_area; ?>
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-7">
                                        <label for="description">Description</label>
                                        <textarea id="description" class="form-control" name="description" rows="3"></textarea>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="attach">Attach</label>
                                        <style type="text/css">
                                            .field-wrapper input[type=file]::file-selector-button 
                                            {
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
                                </div>

                                <div class="form-row mt-2 mb-4">
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
                                    <table id="tableOsi" style="width:100%" class="table table-striped table-sm text-center">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Area</th>
                                                <th>Security Information</th>
                                                <th>Security Information</th>
                                                <th>Security Information</th>
                                                <th>Date</th>
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
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        height: 300,
        extended_valid_elements : "script[src|async|defer|type|charset]",
        plugins: [
            "advlist code autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
            "table contextmenu directionality emoticons paste textcolor fullscreen"
        ],
        fullscreen_native: true,
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect ",
        toolbar2: "| print preview "
    });

    $( document ).ready(function() {
        var maxField = 5;
        var addButton = $('.add-button');
        var wrapper = $('.field-wrapper');
        var fieldHTML = `<div class="d-flex flex-row justify-content-between mb-1">
            <input class="" type="file" accept="image/*,.pdf,.xls,.xlsx,.doc,.docx,.mp4" id="attach" name="attach[]">
            <a class="remove-attach text-danger" href="javascript:void(0);"><i class="fa fa-trash"></i></a>
            </div>`;
        var x = 1;
        
        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){ 
                x++; //Increment field counter
                $(wrapper).append(fieldHTML);
            }
        });
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove-attach', function(e){
            e.preventDefault();
            $(this).parent('div').remove();
            x--;
        });

        // SECURITY INFORMATION //
        var secInfo = $('#secInfo')
        const subId1 = 'secInfoSub1';
        const subId2 = 'secInfoSub2';
        const subId3 = 'secInfoSub3';

        $('#secInfo').change(function (e) {
            var val = $(this).val();
            var sub1 = $(`#${subId1}`)
            var sub2 = $(`#${subId2}`)
            var sub3 = $(`#${subId3}`)

            // $('#riskLevel').find(":selected").text(val.split(":")[1])

            sub1.parents('.form-group').remove()
            sub2.parents('.form-group').remove()
            sub3.parents('.form-group').remove()

            $.ajax({
                url: '<?= site_url('analitic/srs/osint/get_securityinfo_sub/'); ?>',
                type: 'POST',
                data: {
                  categ_id: val,
                  sub_name: subId1,
                },
                cache: false,
                beforeSend: function() {
                    secInfo.prop('disabled', true);
                },
                complete: function() {
                    secInfo.prop('disabled', false);
                },
                success: function(data) {
                    if(data) 
                    {
                        secInfo.parents('.form-group').after(data);

                        $(`#${subId1}`).change(function (e) {
                            const val = $(this).val();
                            var sub1 = $(`#${subId1}`)
                            var sub2 = $(`#${subId2}`)
                            var sub3 = $(`#${subId3}`)
                            
                            sub2.parents('.form-group').remove()
                            sub3.parents('.form-group').remove()

                            if(val == 11)
                            {
                                $('#area').removeAttr('required');
                                $('#area').parents('.form-row').hide();
                            }
                            else
                            {
                                $('#area').parents('.form-row').show();
                            }
                            
                            $.ajax({
                                url: '<?= site_url('analitic/srs/osint/get_securityinfo_sub/'); ?>',
                                type: 'POST',
                                data: {
                                    categ_id: val,
                                    sub_name: subId2,
                                },
                                cache: false,
                                beforeSend: function() {
                                    sub1.prop('disabled', true);
                                },
                                complete: function() {
                                    sub1.prop('disabled', false);
                                },
                                success: function(data) {
                                    if(data) {
                                        sub1.parents('.form-group').after(data);

                                        $(`#${subId2}`).change(function (e) {
                                            const val = $(this).val();
                                            var sub2 = $(`#${subId2}`)
                                            var sub3 = $(`#${subId3}`)
                                            
                                            sub3.parents('.form-group').remove()
                                            
                                            $.ajax({
                                                url: '<?= site_url('analitic/srs/osint/get_securityinfo_sub/'); ?>',
                                                type: 'POST',
                                                data: {
                                                    categ_id: val,
                                                    sub_name: subId3,
                                                },
                                                cache: false
                                            }).done(function(data) {
                                                if(data) {
                                                    sub2.parents('.form-group').after(data);
                                                }
                                            });
                                        });
                                    }
                                }
                            })
                        });
                    }
                    else
                    {
                        // subRisk.parents('.form-group').remove()
                    }
                }
            })
            // .done(function(data) {
                
            // })
        });
        // SECURITY INFORMATION //

        // SELECT AREA //
        var area = $('#area')
        const areaSubId1 = 'areaSub1';
        const areaSubId2 = 'areaSub2';

        $('#area').change(function (e) {
            var val = $(this).val();
            var sub1 = $(`#${areaSubId1}`)
            var sub2 = $(`#${areaSubId2}`)

            sub1.parents('.form-group').remove()
            sub2.parents('.form-group').remove()

            $.ajax({
                url: '<?= site_url('analitic/srs/osint/get_area_sub/'); ?>',
                type: 'POST',
                data: {
                  categ_id: val,
                  sub_name: areaSubId1,
                },
                cache: false
            })
            .done(function(data) {
                if(data) {
                    area.parents('.form-group').after(data);
                }
            })
        });
        // SELECT AREA //

        //datatables
        table = $('#tableOsi').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [],
            "autoWidth": false,

            "ajax": {
              "url": "<?=site_url('analitic/srs/osint/list_table');?>",
              "type": "POST",
              "data": function ( data ) {
                data.date_filter = $('#datePickerFilter').val();
              }
            },
            "columnDefs": [
              {
                "targets": [ 0 ],
                "orderable": false
              }
            ],
        });

        $('#btn-filter').click(function(){
            table.ajax.reload();  //just reload table
        });

        $('#btn-reset').click(function(){
            $('#form-filter')[0].reset();
            table.ajax.reload();  //just reload table
        });

        $('#detailModal').on('shown.bs.modal', function (e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const row = $(target).closest("tr");
            const title = row.find("td:nth-child(2)");

            // console.log(title)
            // modal.find('#detailModalLabel').text(tds.text());

            $.ajax({
                url: '<?= site_url('analitic/srs/osint/detail'); ?>',
                type: 'POST',
                data: {
                  id: id,
                },
                cache: false,
                beforeSend: function() {
                  $(".lds-ring").show();
                },
                success : function(data){
                    $(".lds-ring").hide();
                    $('#detailModal .modal-body').html(data);//menampilkan data ke dalam modal
                }
            });
        });

        $('#detailModal').on('hide.bs.modal', function (e) {
            $('#detailModal .modal-body').children().remove();
        })
        
        $('#deleteModal').on('shown.bs.modal', function (e) {
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

        $('#approveModal').on('shown.bs.modal', function (e) {
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

        $(function () {
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
            $(this).val(picker.startDate.format('YYYY-MM-DD HH:mm') + ' - ' + picker.endDate.format('YYYY-MM-DD HH:mm'));
        });
    });

</script>