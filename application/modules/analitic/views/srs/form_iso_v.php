<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Internal Source</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="">Security Risk Survey</a></li>
                    <li class="breadcrumb-item"><a href="">Internal Source</a></li>
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
                            <strong>Success </strong>'.$this->session->tempdata('success').'
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>';
                } else if($this->session->tempdata('error')) {
                    echo '<div class="col-12">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Error </strong>'.$this->session->tempdata('error').'
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
                        <?php if(is_author() || is_super_admin()) { ?>
                        <button class="nav-link <?= is_author() ? 'active' : ''; ?>" id="nav-home-tab" data-toggle="tab" data-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Input Data</button>
                        <?php } ?>
                        <button class="nav-link <?= !is_author() ? 'active' : ''; ?>" id="nav-profile-tab" data-toggle="tab" data-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">View Data</button>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade <?= is_author() ? 'show active' : ''; ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="card">
                            <!-- <div class="card-header">
                                <h3 class="card-title">Input Data Internal Source</h3>
                            </div> -->

                            <?= form_open_multipart('analitic/srs/internal_source/save'); ?>
                            <div class="card-body px-lg-4">
                                <div class="form-row mt-2 mb-4">
                                    <!-- <div class="form-group col-12 mb-2">
                                        <h5>Event</h5>
                                    </div> -->

                                   <!--  <div class="form-group col-lg-2">
                                        <label for="no">No</label>
                                        <input name="no_urut" value="<?=$no_urut;?>" required hidden>
                                        <input id="no" class="form-control" name="no_ref" value="<?=$no_ref;?>" required readonly>
                                    </div> -->

                                    <div class="form-group col-lg-3">
                                        <label for="">Date</label>
                                        <!-- <input id="tanggal" type="datetime" name="tanggal" autocomplete="off" class="form-control"> -->
                                        <input type="text" id="datetimepicker" class="form-control" name="tanggal" autocomplete="off" required>
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="event">Event Name</label>
                                        <input id="event" class="form-control" name="event_name" autocomplete="off" required>
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="reporter">Reporter</label>
                                        <input id="reporter" class="form-control" name="reporter" autocomplete="off" >
                                    </div>
                                </div>

                                <div class="form-row mt-2 mb-4">
                                    <div class="form-group col-3">
                                        <label for="area">Area</label>
                                        <?= $select_area; ?>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="subArea1">Sub Area</label>
                                        <?= $select_subarea1; ?>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="subArea2">-</label>
                                        <select id="subArea2" class="form-control" name="sub_area2" disabled required></select>
                                    </div>
                                </div>

                                <div class="form-row mt-2 mb-4">
                                    <div class="form-group col-3">
                                        <label for="assets">Target Assets</label>
                                        <?= $select_ass; ?>
                                    </div>
                                </div>

                                <div class="form-row mt-2 mb-4">
                                    <div class="form-group col-3">
                                        <label for="riskSource">Risk Source</label>
                                        <?= $select_rso; ?>
                                    </div>
                                </div>

                                <div class="form-row mt-2 mb-4 col-12-OFF">
                                    <div class="form-group col-3">
                                        <label for="risk">Risk</label>
                                        <?= $select_ris; ?>
                                    </div>

                                    <div class="form-group col-3">
                                        <label for="riskLevel">Risk Level</label>
                                        <?= $select_rle; ?>
                                        <!-- <input id="riskLevel" class="form-control" type="text" name="risk_level" readonly required> -->
                                    </div>
                                </div>

                                <fieldset class="border p-4 mt-2 mb-4">
                                    <legend class="w-auto h5">Vulnerability Lost</legend>

                                    <div class="form-row">
                                        <div class="form-group col-3">
                                            <label for="financial" class="font-weight-normal">Financial</label>
                                            <?= $select_fin; ?>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="sdm" class="font-weight-normal">SDM</label>
                                            <?= $select_sdm; ?>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="operational" class="font-weight-normal">Operational</label>
                                            <?= $select_ope; ?>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="reputation" class="font-weight-normal">Reputation / Image</label>
                                            <?= $select_rep; ?>
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="impactLevel" class="font-weight-normal">Impact Level</label>
                                            <input id="impactLevel" class="form-control" type="text" name="impact" required readonly>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="form-row mt-2 mb-4">
                                    <div class="form-group col-7">
                                        <label for="chronology">Chronology</label>
                                        <textarea id="chronology" class="form-control" name="chronology" rows="3" required></textarea>
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

                    <div class="tab-pane fade <?= !is_author() ? 'show active' : ''; ?>" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                       <div class="card">
                            <div class="card-body px-lg-4">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                      <form id="form-filter" class="form-horizontal">
                                            <div class="form-row">
                                                <div class="form-group col-2">
                                                    <label for="area">Area</label>
                                                    <?= $select_area_filter; ?>
                                                </div>

                                                <div class="form-group col-3">
                                                    <label for="">Tanggal</label>
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

                                <div class="row mt-5">
                                    <div class="col-lg-12 mb-3">
                                        <div class="d-flex flex-row-reverse">
                                            <button id="exportExcel" class="btn btn-primary">Export Excel</button>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table id="tableIso" style="width:100%" class="table table-striped table-sm text-center">
                                              <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Event Title</th>
                                                    <th>Event Date</th>
                                                    <th>Area</th>
                                                    <th>Assets</th>
                                                    <th>Risk Source</th>
                                                    <th>Risk</th>
                                                    <th>Impact Level</th>
                                                    <th style="width:200px">Action</th>
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
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Detail Modal -->
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
            <?= form_open('analitic/srs/internal_source/approve'); ?>
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
            <?= form_open('analitic/srs/internal_source/delete'); ?>
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

<script type="text/javascript">
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

        //datatables
        table = $('#tableIso').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [],
            "autoWidth": false,
              
            "ajax": {
              "url": "<?=site_url('analitic/srs/internal_source/list_table');?>",
              "type": "POST",
              "data": function ( data ) {
                data.areafilter = $('#areaFilter').val();
                data.datefilter = $('#datePickerFilter').val();
              }
            },
            "columnDefs": [
              {
                "targets": [ 0,8 ],
                "orderable": false
              }
            ],
            createdRow: function(row, data, index) {
                // console.log(data)
                if (data[7] == 1) {
                  $('td:eq(7)', row).attr('style', 'background-color: #06a506; color: #000;');
                } else if (data[7] == 2) {
                  $('td:eq(7)', row).attr('style', 'background-color: #f3ec03; color: #000;');
                } else if (data[7] == 3) {
                  $('td:eq(7)', row).attr('style', 'background-color: #f7a91a; color: #000;');
                } else if (data[7] == 4) {
                  $('td:eq(7)', row).attr('style', 'background-color: #ff1818; color: #000;');
                } else if (data[7] == 5) {
                  $('td:eq(7)', row).attr('style', 'background-color: #c30505; color: #000;');
                } else {
                  $('td:eq(4)', row).css('background-color', 'White'); 
                }
            },
        });

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

        $('#btn-filter').click(function(){
            table.ajax.reload();  //just reload table
        });

        $('#btn-reset').click(function(){
            $('#form-filter')[0].reset();
            table.ajax.reload();  //just reload table
        });

        $('#attach').change(function(e) {
            var fileName = $(this).val().match(/[^\\/]*$/)[0];
            $('#attach').parent().children('label').text(fileName);
            // $('#attach').after('<span class="d-block w-100 mt-2">'+fileName+'</span>');
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
                url: '<?= site_url('analitic/srs/internal_source/detail'); ?>',
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
        })

        $('#approveModal').on('shown.bs.modal', function (e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')
            const title = target.data('title')

            $('.appr-title').remove()
            $('#idApprove').val(id)
            $(this).find('.modal-body h5').after(`<h6 class="appr-title">${title}</h6>`)
        })

        $('#deleteModal').on('shown.bs.modal', function (e) {
            const target = $(e.relatedTarget);
            const modal = $(this);
            const id = target.data('id')

            $('#idDelete').val(id)
        })

        $('#area').change(function (e) {
            const val = $(this).val();
            const subArea1 = $(this).parent().parent().find('.subArea1')
            subArea1.attr('disabled', true)

            if (val) {
                subArea1.removeAttr('disabled');
            }
            else
            {
                subArea1.prop('selectedIndex', 0) // reset position
            }
        });

        $('#subArea1').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const subArea2 = $('#subArea2')
            const subArea3 = $('#subArea3')
            const subArea2Label = subArea2.parents().children('label')
            // const subArea = $(this).next();
            // console.log(val)

            subArea2.empty();
            subArea2.attr('disabled', true);
            subArea2Label.empty();
            subArea2Label.append('-');

            if(subArea2.find('option:selected').text() !== 'production') {
                const subArea2 = $('#subArea2')
                subArea3.parents('.form-group').remove()
            }

            if (val) {
                $.ajax({
                    url: '<?= site_url('analitic/srs/internal_source/get_sub_area2'); ?>',
                    type: 'POST',
                    data: {
                      idcateg: val,
                    },
                    cache: false
                }).done(function(data) {
                    subArea2Label.empty();
                    subArea2.removeAttr('disabled');
                    subArea2Label.append(valTxt);
                    subArea2.append(data);
                    // subArea.html(data);
                });
            }
        });

        $('#subArea2').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const subArea2 = $('#subArea2')
            const subArea3 = $('#subArea3')
            
            subArea3.parents('.form-group').remove()
            
            $.ajax({
                url: '<?= site_url('analitic/srs/internal_source/get_sub_area3'); ?>',
                type: 'POST',
                data: {
                  idcateg: val,
                },
                cache: false
            }).done(function(data) {
                if (data) {
                    subArea2.parents('.form-group').after(data);
                }
            });
        });

        $('#assets').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const assets = $('#assets')
            const subAssets = $('#subAssets')
            const subAssetsLabel = subAssets.parents().children('label')
            const subAssets2 = $('#subAssets2')
            
            subAssets.parents('.form-group').remove()
            subAssets2.parents('.form-group').remove()

            $.ajax({
                url: '<?= site_url('analitic/srs/internal_source/get_sub_assets'); ?>',
                type: 'POST',
                data: {
                  idcateg: val,
                },
                cache: false
            }).done(function(data) {

                if(data) {
                    assets.parents('.form-group').after(data);
                    
                    $('#subAssets').change(function (e) {
                        const val = $(this).val();
                        const valTxt = $(this).find('option:selected').text();
                        const subAssets = $('#subAssets')
                        const subAssets2 = $('#subAssets2')
                        
                        subAssets2.parents('.form-group').remove()

                        $.ajax({
                            url: '<?= site_url('analitic/srs/internal_source/get_sub_assets2'); ?>',
                            type: 'POST',
                            data: {
                              idcateg: val,
                            },
                            cache: false
                        }).done(function(data) {
                            if(data) {
                                subAssets.parents('.form-group').after(data);
                            }
                            else
                            {
                                subAssets2.empty()
                                subAssets2.parents('.form-group').remove()
                            }
                        });
                    });
                }
                else
                {
                    subAssets.empty()
                    subAssets.parents('.form-group').remove()
                }
            });
        });

        $('#riskSource').change(function (e) {
            const val = $(this).val();
            const riskSource = $('#riskSource')
            const subRiskSource = $('#subRiskSource')
            const subRiskSource2 = $('#subRiskSource2')

            subRiskSource.parents('.form-group').remove()
            subRiskSource2.parents('.form-group').remove()

            $.ajax({
                url: '<?= site_url('analitic/srs/internal_source/get_sub_risksource'); ?>',
                type: 'POST',
                data: {
                  idcateg: val,
                },
                cache: false
            })
            .done(function(data) {
                if(data) {
                    const subRiskSource = $('#subRiskSource')
                    
                    subRiskSource.parents('.form-group').remove()

                    riskSource.parents('.form-group').after(data);

                    $('#subRiskSource').change(function (e) {
                        const val = $(this).val();
                        const subRiskSource = $('#subRiskSource')
                        const subRiskSource2 = $('#subRiskSource2')
                        
                        subRiskSource2.parents('.form-group').remove()
                        
                        $.ajax({
                            url: '<?= site_url('analitic/srs/internal_source/get_sub_risksource2'); ?>',
                            type: 'POST',
                            data: {
                              idcateg: val,
                            },
                            cache: false
                        }).done(function(data) {
                            if(data) {
                                subRiskSource.parents('.form-group').after(data);
                            }
                            else
                            {
                                subRiskSource2.parents('.form-group').remove()
                            }
                        });
                    })
                }
                else
                {
                    subRiskSource.empty()
                }
            });
        })
        
        $('#risk').change(function (e) {
            const val = $(this).val();
            const risk = $('#risk')
            const subRisk = $('#subRisk')
            const subRisk2 = $('#subRisk2')

            $('#riskLevel').find(":selected").text(val.split(":")[1])
            // $('#riskLevel').val(val.split(":")[1])
            // console.log(val.split(':'))

            subRisk.parents('.form-group').remove()
            subRisk2.parents('.form-group').remove()

            $.ajax({
                url: '<?= site_url('analitic/srs/internal_source/get_sub_risk'); ?>',
                type: 'POST',
                data: {
                  idcateg: val.split(":")[0],
                },
                cache: false
            })
            .done(function(data) {
                if(data) {
                    risk.parents('.form-group').after(data);

                    $('#subRisk').change(function (e) {
                        const val = $(this).val();
                        const subRisk = $('#subRisk')
                        const subRisk2 = $('#subRisk2')
                        
                        subRisk2.parents('.form-group').remove()
                        
                        $.ajax({
                            url: '<?= site_url('analitic/srs/internal_source/get_sub_risk2'); ?>',
                            type: 'POST',
                            data: {
                              idcateg: val,
                            },
                            cache: false
                        }).done(function(data) {
                            if(data) {
                                subRisk.parents('.form-group').after(data);
                            }
                            else
                            {
                                // subRisk2.parents('.form-group').remove()
                            }
                        });
                    })
                }
                else
                {
                    // subRisk.parents('.form-group').remove()
                }
            })
        })
        
        $('#financial,#sdm,#operational,#reputation,#impactLevel').change(function (e) {
            const fin = $('#financial').val();
            const sdm = $('#sdm').val();
            const ope = $('#operational').val();
            const rep = $('#reputation').val();

            const arr = [fin.split(":")[0],sdm.split(":")[0],ope.split(":")[0],rep.split(":")[0]];
            // console.log(Math.max.apply(Math,arr))
            $('#impactLevel').val(Math.max.apply(Math,arr));
        })

        $('#exportExcel').click(function(e) {
            var area = $('#areaFilter').val();
            var datefilter = $('#datePickerFilter').val();
            var param = "area="+area+"&daterange="+datefilter;
            var link = "<?= site_url('analitic/srs/internal_source/export_excel?'); ?>"+param;
            console.log(area)
            window.open(link, '_blank');
            // fetch('<?= site_url('analitic/srs/internal_source/export_excel'); ?>')
            // .then(resp => resp.blob())
            // .then(blob => {
            //     const url = window.URL.createObjectURL(blob);
            //     const a = document.createElement('a');
            //     a.style.display = 'none';
            //     a.href = url;
            //     // the filename you want
            //     a.download = 'todo-1.xlsx';
            //     document.body.appendChild(a);
            //     a.click();
            //     window.URL.revokeObjectURL(url);
            //     alert('your file has downloaded!'); // or you know, something with better UX...
            // })
            // .catch(() => alert('oh no!'));
        });
    });
</script>