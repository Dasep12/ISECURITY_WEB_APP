<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Internal Source</h3>
                    </div>

                    <?= form_open('analitic/srs/internal_source/save'); ?>
                    <div class="card-body px-lg-4">
                        <div class="form-row mt-2 mb-4">
                            <!-- <div class="form-group col-12 mb-2">
                                <h5>Event</h5>
                            </div> -->

                            <div class="form-group col-3">
                                <label for="">Tanggal</label>
                                <!-- <input id="tanggal" type="datetime" name="tanggal" autocomplete="off" class="form-control"> -->
                                <input type="text" id="datetimepicker" class="form-control" name="tanggal" required>
                            </div>

                            <div class="form-group col-5">
                                <label for="event">Event Name</label>
                                <textarea id="event" class="form-control" name="event_name" rows="1" required></textarea>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-4">
                            <!-- <div class="form-group col-12 mb-2">
                                <h5>Area</h5>
                            </div> -->

                            <div class="form-group col-3">
                                <label for="area">Area</label>
                                <?= $select_area; ?>
                            </div>

                            <div class="form-group col-3">
                                <label for="subArea">Sub Area</label>
                                <?= $select_subarea; ?>
                            </div>

                            <div class="form-group col-3">
                                <label for="subAreaChild">-</label>
                                <select id="subAreaChild" class="form-control" name="sub_area_child" disabled required></select>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-4">
                            <!-- <div class="form-group col-12 mb-2">
                                <h5>Assets</h5>
                            </div> -->

                            <div class="form-group col-3">
                                <label for="assets">Assets</label>
                                <?= $select_ass; ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-4">
                            <div class="form-group col-4">
                                <label for="riskSource">Risk Source</label>
                                <?= $select_rso; ?>
                            </div>

                            <div class="form-group col-4">
                                <label for="risk">Risk</label>
                                <?= $select_ris; ?>
                            </div>

                            <div class="form-group col-4">
                                <label for="riskLevel">Risk Level</label>
                                <?= $select_rle; ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-4">
                            <div class="form-group col-3">
                                <label for="financial">Financial</label>
                                <?= $select_fin; ?>
                            </div>

                            <div class="form-group col-3">
                                <label for="sdm">SDM</label>
                                <?= $select_sdm; ?>
                            </div>

                            <div class="form-group col-3">
                                <label for="operational">Operational</label>
                                <?= $select_ope; ?>
                            </div>

                            <div class="form-group col-3">
                                <label for="reputation">Reputation</label>
                                <?= $select_rep; ?>
                            </div>
                        </div>

                        <div class="form-row mt-2 mb-4">
                            <button class="btn btn-primary px-4" type="submit">SAVE</button>
                        </div>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $( document ).ready(function() {
        $('#area').change(function (e) {
            const val = $(this).val();
            const subArea = $('#subArea')
            subArea.attr('disabled', true)

            if (val) {
                subArea.removeAttr('disabled');
            }
            else
            {
                subArea.prop('selectedIndex', 0) // reset position
            }
        });

        $('#subArea').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const subAreaChild = $('#subAreaChild')
            const subAreaChildLabel = subAreaChild.parents().children('label')
            // const subArea = $(this).next();

            subAreaChild.empty();
            subAreaChild.attr('disabled', true);
            subAreaChildLabel.empty();
            subAreaChildLabel.append('-');

            if(subAreaChild.find('option:selected').text() !== 'production') {
                const subAreaProd = $('#subAreaProd')
                subAreaProd.parents('.form-group').remove()
            }


            if (val) {
                $.ajax({
                    url: '<?= site_url('analitic/srs/internal_source/get_sub_area'); ?>',
                    type: 'POST',
                    data: {
                      idcateg: val,
                    },
                    cache: false
                }).done(function(data) {
                    subAreaChildLabel.empty();
                    subAreaChild.removeAttr('disabled');
                    subAreaChildLabel.append(valTxt);
                    subAreaChild.append(data);
                    // subArea.html(data);
                });
            }
        });

        $('#subAreaChild').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const subAreaChild = $('#subAreaChild')
            const subAreaProd = $('#subAreaProd')

            if (valTxt.toLowerCase() == 'production') {
                subAreaChild.parents('.form-group').after(`
                    <div class="form-group col-3">
                        <label for="subAreaProd">Production</label>
                        <?= $select_subarea_prod; ?>
                    </div>
                `);
            }
            else
            {
                subAreaProd.parents('.form-group').remove()
            }
        });

        $('#assets').change(function (e) {
            const val = $(this).val();
            const valTxt = $(this).find('option:selected').text();
            const assets = $('#assets')
            const subAssets = $('#subAssets')
            const subAssetsLabel = subAssets.parents().children('label')

            $.ajax({
                url: '<?= site_url('analitic/srs/internal_source/get_sub_assets'); ?>',
                type: 'POST',
                data: {
                  idcateg: val,
                },
                cache: false
            }).done(function(data) {
                subAssets.parents('.form-group').remove()

                if(data) {
                    assets.parents('.form-group').after(data);
                    
                    $('#subAssets').change(function (e) {
                        const val = $(this).val();
                        const valTxt = $(this).find('option:selected').text();
                        const subAssets = $('#subAssets')
                        const subAssets2 = $('#subAssets2')
                        const subAssetsLabel = subAssets2.parents().children('label')

                        $.ajax({
                            url: '<?= site_url('analitic/srs/internal_source/get_sub_assets2'); ?>',
                            type: 'POST',
                            data: {
                              idcateg: val,
                            },
                            cache: false
                        }).done(function(data) {
                            subAssets2.parents('.form-group').remove()

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

        
    });
</script>