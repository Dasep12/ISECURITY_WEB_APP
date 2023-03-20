<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <!-- <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Master</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('Mst_Event') ?>">Event</a></li>
                    <li class="breadcrumb-item"><a href="">Edit Event</a></li>
                </ol> -->
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="card cardIn2">
                    <div class="card-body">
                        <form id="form-filter" class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-12">
                                    <label for="area">Area</label>
                                    <?= $select_area_filter; ?>
                                </div>

                                <div class="form-group col-12">
                                    <label for="yearFilter">Year</label>
                                    <?= $select_year_filter; ?>
                                </div>

                                <div class="form-group col-12">
                                    <label for="monthFilter">Month</label>
                                    <?= $select_month_filter; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card cardIn2 ">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 pt-4 text-center">
                                <h5>Index Resiko ADM</h5>
                                <input class="form-control form-control-lg" type="text" placeholder="" disabled>
                            </div>

                            <div class="col-lg-7">
                                <div id='myDiv'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="row md-2">
            <div class="col-lg-6">
                <div class="card cardIn2">
                    <div class="card-body">
                        <div id="jakartaUtaraSetahun"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card cardIn">
                    <div class="card-body">
                        <div id="karawangSetahun"></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

<script type="text/javascript">
    potly_grap();
    $('#areaFilter').change(function (e) {
        const areaVal = $(this).val();

        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard_2/grap_srs'); ?>',
            type: 'POST',
            data: {
              area_fil: areaVal
            },
            cache: false,
            beforeSend: function() {
              // $(".lds-ring").show();
            },
            success : function(res){
                // $("#myDiv").fadeOut(300).fadeIn(300);
                var data = JSON.parse(res)[0];
                console.log(data)
                potly_grap(data.y, 0)
            }
        });
    });

    function potly_grap(y=0,x=0) {
        var trace1 = {
            x: [x],
            y: [y],
            mode: 'markers', //markers+text
            type: 'line',
            // name: 'Team A',
            // text: ['POINT'],
            // textposition: 'top center',
            textfont: {
                family:  'Raleway, sans-serif'
            },
            marker: {
                color: 'rgb(39 52 116)',
                size: 18,
                line: {
                  color: 'rgb(231, 99, 250)',
                  width: 3
                },
            },
          showlegend: false,
        };
        var data = [ trace1 ];
        var opct = 0.6;
        var layout = {
            xaxis: { 
                range: [ 5.00, 0.00 ],
                linecolor: '#000',
                linewidth: 1,
                gridcolor: '#000',
                gridwidth: 1,
            },
            yaxis: { 
                range: [ 0.00, 5.00 ],
                linecolor: '#000',
                linewidth: 1,
                gridcolor: '#000',
                gridwidth: 1,
            },
            legend: { 
                // y: 0.5, 
                // yref: 'paper',
                font: {
                  family: 'Arial, sans-serif',
                  size: 20,
                  color: 'red',
                },
            },
            title:'SRS Chart',
            // plot_bgcolor: '#000',
            // width: 500,
            // height: 500,
            shapes: [
                {
                    type: 'rect',
                    xref: 'x',
                    yref: 'y',
                    x0: '5.00',
                    y0: '0.00',
                    x1: '4.00',
                    y1: '2.00',
                    fillcolor: 'green',
                    opacity: opct,
                    line: { width: 0 }
                },
                {
                    type: 'rect',
                    xref: 'x',
                    yref: 'y',
                    x0: '5.00',
                    y0: '2.00',
                    x1: '4.00',
                    y1: '5.00',
                    fillcolor: 'yellow',
                    opacity: opct,
                    line: { width: 0 }
                },
                {
                    type: 'rect',
                    xref: 'x',
                    yref: 'y',
                    x0: '0.00',
                    y0: '2.00',
                    x1: '4.00',
                    y1: '5.00',
                    fillcolor: 'red',
                    opacity: opct,
                    line: { width: 0 }
                },
                {
                    type: 'rect',
                    xref: 'x',
                    yref: 'y',
                    x0: '0.00',
                    y0: '0.00',
                    x1: '4.00',
                    y1: '2.00',
                    fillcolor: 'yellow',
                    opacity: opct,
                    line: { width: 0 }
                },
            ],
        };
        var config = { responsive: true, modeBarButtonsToRemove: ['sendDataToCloud', 'autoScale2d', 'hoverClosestCartesian', 'hoverCompareCartesian', 'lasso2d', 'select2d', 'pan', 'zoom',"zoomin", "zoomout"], displaylogo: false, showTips: true }

        Plotly.newPlot('myDiv', data, layout, config);
    }
</script>