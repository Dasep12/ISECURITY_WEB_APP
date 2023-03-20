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
            <div class="col-lg-12">
                <div class="card cardIn2">
                    <div class="card-body">
                        <form id="form-filter" class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-2">
                                    <label for="area">Area</label>
                                    <?= $select_area_filter; ?>
                                </div>

                                <div class="form-group col-2">
                                    <label for="yearFilter">Year</label>
                                    <?= $select_year_filter; ?>
                                </div>

                                <div class="form-group col-2">
                                    <label for="monthFilter">Month</label>
                                    <?= $select_month_filter; ?>
                                </div>

                                <div class="form-group col d-flex align-items-end justify-content-end">
                                    <span class="h1 ff-fugazone title-dashboard">SRS_Dashboard</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card shadow" style="height: 280px;">
                            <div class="card-body" style="padding:0">
                                <canvas id="barDonatAll"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card" style="height: 280px;">
                            <div class="card-body">
                                <canvas id="barLine"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="height: 280px;">
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="barDonatPlant" style="margin-top:-40px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card" style="height: 390px;">
                            <div class="card-body text-center">
                                <h5>Target Assets</h5>
                                <canvas id="assetChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="height: 390px;">
                            <div class="card-body text-center">
                                <h5>Risk Source</h5>
                                <canvas id="rsoChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- loading -->
                    <div class="row justify-content-center" id="loader" style="position:absolute;z-index:9999;margin-left:25%;display:none">
                        <div class="spinner-grow text-primary " role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-secondary ml-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-success ml-1 " role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-danger ml-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-warning ml-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-info ml-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                        <div class="spinner-grow text-dark ml-1" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <!--  -->
                    <div class="col-lg-4">
                        <div class="card" style="height: 390px;">
                            <div class="card-body text-center">
                                <h5>Risk</h5>
                                <canvas id="risChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card cardIn2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <!-- style="width: 100%;height:200px" -->
                                        <canvas id="grapSoi"></canvas>
                                    </div>

                                    <div class="col-lg-5 pt-4 px-5 text-center">
                                        <h5>Index Resiko ADM</h5>
                                        <input id="indexSoi" class="form-control form-control-lg" type="text" placeholder="" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card cardIn2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 pt-4 text-center">
                                        <div class="row">
                                            <?php
                                                echo '
                                                    <div class="col-lg-6 p-3">
                                                        <div class="info-box"  style="background:rgb(255 255 255 / 13%)">
                                                            <span style="background:rgba(0, 176, 80, 1)" class="info-box-icon elevation-1">
                                                                <!--<i class="fas fa-people"></i>-->
                                                                <img style="height:60%" src="../../assets/images/icon/people-white.png" >
                                                            </span>
                                                            <div class="info-box-content  text-white">
                                                                <span class="info-box-text">
                                                                PEOPLE
                                                                </span>
                                                                <span id="avgPeople" class="info-box-number">
                                                                    '.$grap_soi_avgpilar[0]->avg_people.'
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 p-3">
                                                        <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                                            <span style="background:rgba(0, 176, 240, 1)" class="info-box-icon elevation-1">
                                                                <img style="height:60%" src="../../assets/images/icon/system-white.png" >
                                                            </span>
                                                            <div class="info-box-content text-white">
                                                                <span class="info-box-text">
                                                                SYSTEM
                                                                </span>
                                                                <span id="avgSystem" class="info-box-number">
                                                                    '.$grap_soi_avgpilar[0]->avg_system.'
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 p-3">
                                                        <div class="info-box"  style="background:rgb(255 255 255 / 13%)">
                                                            <span style="background:rgba(255, 0, 0, 1)" class="info-box-icon elevation-1">
                                                                <img style="height:60%" src="../../assets/images/icon/device-white.png" >
                                                            </span>
                                                            <div class="info-box-content  text-white">
                                                                <span class="info-box-text">
                                                                DEVICE
                                                                </span>
                                                                <span id="avgDevice" class="info-box-number">
                                                                    '.$grap_soi_avgpilar[0]->avg_device.'
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-6 p-3">
                                                        <div class="info-box"  style="background:rgb(255 255 255 / 13%)">
                                                            <span style="background:rgba(112, 48, 160, 1)" class="info-box-icon elevation-1">
                                                                <img style="height:60%" src="../../assets/images/icon/network-white.png" >
                                                            </span>
                                                            <div class="info-box-content  text-white">
                                                                <span class="info-box-text">
                                                                NETWORKING
                                                                </span>
                                                                <span id="avgNetwork" class="info-box-number">
                                                                    '.$grap_soi_avgpilar[0]->avg_network.'
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                ';
                                            ?>

                                            <!-- <div class="col-lg-6 p-3">
                                                <div style="background:rgba(0, 176, 80, 1)" class="text-white mx-2 p-2">
                                                    <div id="avgPeople" class="text-white mx-2 p-2">
                                                        '.$grap_soi_avgpilar[0]->avg_people.'
                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>

                                    <div class="col-lg-7">
                                        <canvas id="grapSoiAvgMonth"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card cardIn2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 pt-4 text-center">
                                        <!-- <h5>Index Resiko ADM</h5> -->
                                        <canvas id="grapSoiArea"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="detailGrap" tabindex="-1" role="dialog" aria-labelledby="detailGrapLabel" aria-hidden="true">
        <div class="modal-dialog" style="width:70%;max-width:none;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailGrapLabel">Graphic Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h3 id="labels"></h3>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script src="<?=base_url('vendor/chartjs/dist/chart.umd.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

<script type="text/javascript">
    // INDEX BG SOI //
    const dataX = '<?=$data_soi;?>';
    const dataY = '<?=$data_index;?>';

    if((dataX <= 4 && dataY <= 2) || (dataX >= 4 && dataY >= 2))
    {
        $('#indexSoi').attr('style','background-color: rgb(233 233 9 / 69%)') // yellow
    }
    
    if(dataX >= 4 && dataY <= 2)
    {
        $('#indexSoi').attr('style','background-color: rgb(0 128 9 / 69%)') // green
    }
    
    if(dataX <= 4 && dataY >= 2)
    {
        $('#indexSoi').attr('style','background-color: rgb(255 0 9 / 69%)') // red
    }
    // INDEX BG SOI //

    const ctxSoi = document.getElementById("grapSoi");
    ctxSoi.height = 300;
    const srsChart = new Chart(ctxSoi, {
        type: 'bubble',
        data: {
            // labels: ['January', 'Fabruary', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Index Resiko',
                data: [{
                    r: 8,
                    x: <?= $data_soi; ?>,
                    y: <?= $data_index; ?>
                }],
                borderWidth: 1,
                backgroundColor: 'black',
                borderColor: 'white',
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            // aspectRatio: 2.5,
            scales: {
                y: {
                    title: {
                        display: true,
                        text: 'TREAT',
                        fontStyle: "bold",
                        font: {
                            family: 'Comic Sans MS',
                            size: 14,
                            weight: 'bold',
                            lineHeight: 1.2,
                        },
                        color: '#FFF',
                    },
                    ticks: {
                        precision: 0,
                        color: '#FFF'
                    },
                    position: 'right',
                    min: 0.0,
                    max: 5.0,
                    beginAtZero: true
                },
                x: {
                    reverse: true,
                    title: {
                        display: true,
                        text: 'SOI',
                        fontStyle: "bold",
                        font: {
                            family: 'Comic Sans MS',
                            size: 14,
                            weight: 'bold',
                            lineHeight: 1.2,
                        },
                        color: '#FFF',
                    },
                    ticks: {
                        precision: 0,
                        color: '#FFF'
                    },
                    min: 0.0,
                    max: 5.0,
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
            callbacks: {
                label: function(item) {
                    return ` SOI: ${item.raw.x}, TREAT: ${item.raw.y}`
                }
            }
        },
                autocolors: false,
                annotation: {
                    annotations: {
                        box1: {
                            type: 'box',
                            xMin: 0,
                            xMax: 4,
                            yMin: 0,
                            yMax: 2,
                            backgroundColor: 'rgba(255, 255, 23, 0.5)', // yellow bottom right
                            borderColor: 'white'
                        },
                        box2: {
                            type: 'box',
                            xMin: 5,
                            xMax: 4,
                            yMin: 5,
                            yMax: 2,
                            backgroundColor: 'rgba(255, 255, 23, 0.5)', // yellow top right
                            borderColor: 'white'
                        },
                        box3: {
                            type: 'box',
                            xMin: 0,
                            xMax: 4,
                            yMin: 2,
                            yMax: 5,
                            backgroundColor: 'rgba(255, 0, 0, 0.3)', // red right
                            borderColor: 'white'
                        },
                        box4: {
                            type: 'box',
                            xMin: 5,
                            xMax: 4,
                            yMin: 0,
                            yMax: 2,
                            backgroundColor: 'rgba(0, 255, 0, 0.3)', // green left
                            borderColor: 'white'
                        }
                    }
                },
                datalabels: {
                    color: '#FFF',
                },
                legend: {
                    display: false
                },
            }
        }
    });

    // RISK SOURCE //
    var ctxRso = document.getElementById("rsoChart");
    ctxRso.height = 250;
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = <?= $data_risk_source; ?>;
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var rsoChart = new Chart(ctxRso, {
        type: 'bar',
        data: {
            labels: <?= $data_risk_source; ?>,
            datasets: [{
                axis: 'y',
                label: '',
                data: <?= $grap_risk_source ?>,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                backgroundColor: coloR,
                // backgroundColor: [
                //   'rgba(255, 99, 132, 1)',
                //   'rgba(255, 159, 64, 1)',
                //   'rgba(255, 205, 86, 1)',
                //   'rgba(75, 192, 192, 1)',
                //   'rgba(54, 162, 235, 1)',
                //   'rgba(153, 102, 255, 1)',
                //   'rgba(153, 102, 255, 1)',
                //   'rgba(201, 203, 207, 1)'
                // ],
                borderWidth: 1
            }]
        },

        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    display: false
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#FFF'
                }
            },
        },
        plugins: [ChartDataLabels],
    });
    function datarsoChart() {
        var labelRso = <?= $data_risk_source ?>;
        var dataRso = <?= $grap_risk_source ?>;
        arrayOfObj = labelRso.map(function(d, i) {
            return {
                label: d,
                data: dataRso[i] || 0
            };
        });
        sortedArrayOfObj = arrayOfObj.sort(function(a, b) {
            return b.data - a.data;
        });

        newArrayLabelRso = [];
        newArrayDataRso = [];
        sortedArrayOfObj.forEach(function(d) {
            newArrayLabelRso.push(d.label);
            newArrayDataRso.push(d.data);
        });

        rsoChart.data.datasets[0].data = newArrayDataRso;
        rsoChart.data.labels = newArrayLabelRso
        rsoChart.update();
        // 
    }
    datarsoChart()
    // RISK SOURCE //

    // DETAIL RISK SOURCE //
    document.getElementById("rsoChart").onclick = function(evt) {
        var activePoints = rsoChart.getElementsAtEventForMode(evt, 'point', rsoChart.options);
        var firstPoint = activePoints[0];
        var label = rsoChart.data.labels[firstPoint.index];

        var area = $("#areaFilter").val()
        var year = $("#yearFilter").val()
        var month = $("#monthFilter").val()
        var labelTitle = label;

        $('#detailGrapLabel').text('')
        $('#detailGrapLabel').text(labelTitle)

        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard/grap_detail_risk_source'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
                label_fil: label,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                document.getElementById("loader").style.display = "none";

                var dataJson = JSON.parse(res)
                // console.log(dataJson.data_detail_rSosub)

                $("#detailGrap .modal-body").html("");

                $("#detailGrap").modal();

                $("#detailGrap .modal-body").append(`
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 pr-5">
                                    <canvas id="detailRiSoSub1"></canvas>
                                </div>
                                <div class="col-md-12">
                                    <canvas id="detailRiSoSub2"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7" style="height:300px;">
                            <canvas id="dtlRiSo"></canvas>
                        </div>
                    </div>
                `);

                // GRAP DETAIL RISK SOURCE //
                var detailRisk = document.getElementById("dtlRiSo").getContext('2d');
                const bgGradient = detailRisk.createLinearGradient(0, 0, 0, 400);
                bgGradient.addColorStop(0.6, 'rgba(20, 180, 60, 1)');
                bgGradient.addColorStop(0.4, 'rgba(90, 160, 90, 0.2)');
                bgGradient.addColorStop(0.1, 'blue');
                
                var riSoMthChart = new Chart(detailRisk, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            pointStyle: 'circle',
                            pointRadius: 8,
                            label: '',
                            data: dataJson.data_detail_riSo,
                            fill: true,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            tension: 0.1,
                            segment: {
                                borderColor: 'red',
                                backgroundColor: 'rgba(201, 90, 80, 0.3)',
                            },
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            },
                            y: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    precision: 0,
                                    color: '#FFF'
                                },
                                min: 0,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF'
                            }
                        },
                    }
                });
                // GRAP DETAIL RISK SOURCE //

                // DETAIL RISK SOURCE SUB 1 //
                var ctxRiSoSub = document.getElementById("detailRiSoSub1");
                ctxRiSoSub.height = 300;
                var ict_unit = [];
                var efficiency = [];
                var coloR = [];
                var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgb(" + r + "," + g + "," + b + ")";
                };
                var data = dataJson.data_detail_rSosub;
                for (var i in data) {
                    ict_unit.push("ICT Unit " + data[i].ict_unit);
                    efficiency.push(data[i].efficiency);
                    coloR.push(dynamicColors());
                }
                var riSoMntChart = new Chart(ctxRiSoSub, {
                    type: 'bar',
                    data: {
                        labels: dataJson.data_detail_rSosub_label,
                        datasets: [
                            {
                                axis: 'y',
                                label: '',
                                data: dataJson.data_detail_rSosub,
                                fill: false,
                                minBarLength: 2,
                                barThickness: 20,
                                maxBarThickness: 20,
                                // backgroundColor: coloR,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 205, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(201, 203, 207, 1)'
                                ],
                                borderWidth: 1
                            },
                            // {
                            //     axis: 'id',
                            //     data: dataJson.data_detail_rSosub.id,
                            // },
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        responsiveAnimationDuration: 5000,
                        indexAxis: 'y',
                        scales: {
                            x: {
                                display: false
                            },
                            y: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF',
                                // margin: 5
                            }
                        },
                    },
                    plugins: [ChartDataLabels],
                });
                // DETAIL RISK SOURCE SUB 1 //

                // GRAP RISK SOURCE MONTH SUB 1 //
                document.getElementById("detailRiSoSub1").onclick = function(evt) {
                    var activePoints = riSoMntChart.getElementsAtEventForMode(evt, 'point', riSoMntChart.options);
                    var firstPoint = activePoints[0];
                    var label = riSoMntChart.data.labels[firstPoint.index];

                    var area = $("#areaFilter").val()
                    var year = $("#yearFilter").val()
                    var month = $("#monthFilter").val()
                    var labelTitle = label;

                    $('#detailGrapLabel').text('')
                    $('#detailGrapLabel').text(labelTitle)

                    $.ajax({
                        url: '<?= site_url('analitic/srs/dashboard/grap_detail_risk_source'); ?>',
                        type: 'POST',
                        data: {
                            area_fil: area,
                            year_fil: year,
                            month_fil: month,
                            label_fil: label,
                        },
                        cache: false,
                        beforeSend: function() {
                            document.getElementById("loader").style.display = "block";
                        },
                        complete: function() {
                            document.getElementById("loader").style.display = "none";
                        },
                        success: function(res) {
                            var dataJson = JSON.parse(res)
                            // console.log(dataJson.data_riSo_month)

                            // GRAFIS LINE ALL MONTH //
                            riSoMthChart.data.datasets[0].data = dataJson.data_riSo_month;
                            riSoMthChart.update();
                            // GRAFIS LINE ALL MONTH //
                        }
                    })
                }
                // GRAP RISK SOURCE MONTH SUB 1 //
            }
        });
    }

    // TARGET ASSETS //
    var ctxAsset = document.getElementById("assetChart");
    ctxAsset.height = 250;
    var assetChart = new Chart(ctxAsset, {
        type: 'bar',
        data: {
            labels: <?= $target_assets; ?>,
            datasets: [{
                axis: 'y',
                label: '',
                data: <?= $grap_target_assets ?>,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                // backgroundColor: coloR,
                backgroundColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsiveAnimationDuration: 5000,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false,
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false,
                    "labels": {
                        "fontSize": 20,
                        color: '#FFF'
                    }
                },
                datalabels: {
                    color: '#FFF'
                }
            }
        },
        plugins: [ChartDataLabels],
    });
    function dataAssetChart() {
        // assets
        var labelAssets = <?= $target_assets ?>;
        var dataAssets = <?= $grap_target_assets ?>;
        arrayOfObjAssets = labelAssets.map(function(d, i) {
            return {
                label: d,
                data: dataAssets[i] || 0
            };
        });
        sortedArrayOfObjAssets = arrayOfObjAssets.sort(function(a, b) {
            return b.data - a.data;
        });
        newArrayLabelAssets = [];
        newArrayDataAssets = [];
        sortedArrayOfObjAssets.forEach(function(d) {
            newArrayLabelAssets.push(d.label);
            newArrayDataAssets.push(d.data);
        });
        assetChart.data.datasets[0].data = newArrayDataAssets;
        assetChart.data.labels = newArrayLabelAssets
        assetChart.update();
        // 
    }
    dataAssetChart()
    // TARGET ASSETS //

    // DETAIL TARGET ASSETS //
    document.getElementById("assetChart").onclick = function(evt) {
        var activePoints = assetChart.getElementsAtEventForMode(evt, 'point', assetChart.options);
        var firstPoint = activePoints[0];
        var label = assetChart.data.labels[firstPoint.index];

        var area = $("#areaFilter").val()
        var year = $("#yearFilter").val()
        var month = $("#monthFilter").val()
        var labelTitle = label;

        $('#detailGrapLabel').text('')
        $('#detailGrapLabel').text(labelTitle)

        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard/grap_detail_assets'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
                label_fil: label,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                document.getElementById("loader").style.display = "none";

                var dataJson = JSON.parse(res)
                // console.log(dataJson)

                $("#detailGrap .modal-body").html("");

                $("#detailGrap").modal();

                $("#detailGrap .modal-body").append(`
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 pr-5">
                                    <canvas id="detailAssetsSub1"></canvas>
                                </div>
                                <div class="col-md-12">
                                    <canvas id="detailAssetsSub2"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7" style="height:300px;">
                            <canvas id="detailAssets"></canvas>
                        </div>
                    </div>
                `);

                // DETAIL ASSETS MONTH //
                var detailAssets = document.getElementById("detailAssets").getContext('2d');
                const bgGradient = detailAssets.createLinearGradient(0, 0, 0, 400);
                bgGradient.addColorStop(0.6, 'rgba(20, 180, 60, 1)');
                bgGradient.addColorStop(0.4, 'rgba(90, 160, 90, 0.2)');
                bgGradient.addColorStop(0.1, 'blue');
                
                var assetsMonthChart = new Chart(detailAssets, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            pointStyle: 'circle',
                            pointRadius: 8,
                            label: '',
                            data: dataJson.data_detail_assets,
                            fill: true,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            tension: 0.1,
                            segment: {
                                borderColor: 'red',
                                backgroundColor: 'rgba(201, 90, 80, 0.3)',
                            },
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            },
                            y: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    precision: 0,
                                    color: '#FFF'
                                },
                                min: 0,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF'
                            }
                        },
                    }
                });
                // DETAIL ASSETS MONTH //

                // DETAIL TARGET ASSSES SUB 1 //
                var ctxAssetsSub = document.getElementById("detailAssetsSub1");
                ctxAssetsSub.height = 300;
                var ict_unit = [];
                var efficiency = [];
                var coloR = [];
                var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgb(" + r + "," + g + "," + b + ")";
                };
                var data = dataJson.data_detail_assetssub;
                for (var i in data) {
                    ict_unit.push("ICT Unit " + data[i].ict_unit);
                    efficiency.push(data[i].efficiency);
                    coloR.push(dynamicColors());
                }
                var assetsSub1Chart = new Chart(ctxAssetsSub, {
                    type: 'bar',
                    data: {
                        labels: dataJson.data_detail_assetssub_label,
                        datasets: [{
                            axis: 'y',
                            label: '',
                            data: dataJson.data_detail_assetssub,
                            fill: false,
                            minBarLength: 2,
                            barThickness: 20,
                            maxBarThickness: 20,
                            // backgroundColor: coloR,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            borderWidth: 1
                        }]

                        // CUSTOME DATA ARRAY //
                        // datasets: [{
                        //     data: dataJson.data_detail_assetssub_join,
                        //     parsing: {
                        //       // xAxisKey: 'id',
                        //       yAxisKey: 'y',
                        //     },
                        // }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        responsiveAnimationDuration: 5000,
                        indexAxis: 'y',
                        scales: {
                            x: {
                                display: false
                            },
                            y: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF',
                                // margin: 5
                            }
                        },
                    },
                    plugins: [ChartDataLabels],
                });
                // DETAIL SUB 1 //

                // GRAP ASSETS MONTH SUB 1 //
                document.getElementById("detailAssetsSub1").onclick = function(evt) {
                    var activePoints = assetsSub1Chart.getElementsAtEventForMode(evt, 'point', assetsSub1Chart.options);
                    var firstPoint = activePoints[0];
                    var label = assetsSub1Chart.data.labels[firstPoint.index];
                    var value = assetsSub1Chart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index];
                    // console.log(value)

                    var area = $("#areaFilter").val()
                    var year = $("#yearFilter").val()
                    var month = $("#monthFilter").val()
                    var labelTitle = label;

                    $('#detailGrapLabel').text('')
                    $('#detailGrapLabel').text(labelTitle)

                    $.ajax({
                        url: '<?= site_url('analitic/srs/dashboard/grap_detail_assets'); ?>',
                        type: 'POST',
                        data: {
                            area_fil: area,
                            year_fil: year,
                            month_fil: month,
                            label_fil: label,
                        },
                        cache: false,
                        beforeSend: function() {
                            document.getElementById("loader").style.display = "block";
                        },
                        complete: function() {
                            document.getElementById("loader").style.display = "none";
                        },
                        success: function(res) {
                            var dataJson = JSON.parse(res)

                            // GRAFIS LINE ALL MONTH //
                            assetsMonthChart.data.datasets[0].data = dataJson.data_assets_month_sub1;
                            assetsMonthChart.update();
                            // GRAFIS LINE ALL MONTH //
                        }
                    })
                }
                // GRAP ASSETS MONTH SUB 1 //
            }
        });
    };
    // DETAIL TARGET ASSETS //

    // RISK //
    var ctxRis = document.getElementById("risChart");
    ctxRis.height = 250;
    var ict_unit = [];
    var efficiency = [];
    var coloR = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        return "rgb(" + r + "," + g + "," + b + ")";
    };
    var data = <?= $data_risk; ?>;
    for (var i in data) {
        ict_unit.push("ICT Unit " + data[i].ict_unit);
        efficiency.push(data[i].efficiency);
        coloR.push(dynamicColors());
    }
    var risChart = new Chart(ctxRis, {
        type: 'bar',
        data: {
            labels: <?= $data_risk; ?>,
            datasets: [{
                axis: 'y',
                label: '',
                data: <?= $grap_risk ?>,
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
                // backgroundColor: coloR,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        },

        options: {
            responsiveAnimationDuration: 5000,
            indexAxis: 'y',
            scales: {
                x: {
                    display: false
                },
                y: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    },
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#FFF',
                    // margin: 5
                }
            },
        },
        plugins: [ChartDataLabels],
    });

    // DETAIL RISK //
    document.getElementById("risChart").onclick = function(evt) {
        var activePoints = risChart.getElementsAtEventForMode(evt, 'point', risChart.options);
        var firstPoint = activePoints[0];
        var label = risChart.data.labels[firstPoint.index];

        var area = $("#areaFilter").val()
        var year = $("#yearFilter").val()
        var month = $("#monthFilter").val()
        var labelTitle = label;
        // alert(label)
        $('#detailGrapLabel').text('')
        $('#detailGrapLabel').text(labelTitle)

        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard/grap_detail_risk'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
                label_fil: label,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                document.getElementById("loader").style.display = "none";

                var dataJson = JSON.parse(res)
                // console.log(dataJson)

                $("#detailGrap .modal-body").html("");

                $("#detailGrap").modal();

                $("#detailGrap .modal-body").append(`
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12 pr-5">
                                    <canvas id="detailRiskSub1"></canvas>
                                </div>
                                <div class="col-md-12">
                                    <canvas id="detailRiskSub2"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7" style="height:300px;">
                            <canvas id="detailRisk"></canvas>
                        </div>
                    </div>
                `);

                // GRAP DETAIL RISK //
                var detailRisk = document.getElementById("detailRisk").getContext('2d');
                const bgGradient = detailRisk.createLinearGradient(0, 0, 0, 400);
                bgGradient.addColorStop(0.6, 'rgba(20, 180, 60, 1)');
                bgGradient.addColorStop(0.4, 'rgba(90, 160, 90, 0.2)');
                bgGradient.addColorStop(0.1, 'blue');
                
                var riskMonthChart = new Chart(detailRisk, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                        datasets: [{
                            pointStyle: 'circle',
                            pointRadius: 8,
                            label: '',
                            data: dataJson.data_detail_risk,
                            fill: true,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            tension: 0.1,
                            segment: {
                                borderColor: 'red',
                                backgroundColor: 'rgba(201, 90, 80, 0.3)',
                            },
                            borderWidth: 1,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            },
                            y: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#FFF',
                                    precision: 0,
                                },
                                min: 0,
                            },
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF'
                            }
                        },
                    }
                });

                // DETAIL RISK SUB 1 //
                var ctxRisSub = document.getElementById("detailRiskSub1");
                // ctxRisSub.height = 100;
                var ict_unit = [];
                var efficiency = [];
                var coloR = [];
                var dynamicColors = function() {
                    var r = Math.floor(Math.random() * 255);
                    var g = Math.floor(Math.random() * 255);
                    var b = Math.floor(Math.random() * 255);
                    return "rgb(" + r + "," + g + "," + b + ")";
                };
                var data = dataJson.data_detail_risksub;
                for (var i in data) {
                    ict_unit.push("ICT Unit " + data[i].ict_unit);
                    efficiency.push(data[i].efficiency);
                    coloR.push(dynamicColors());
                }
                var risMntChart = new Chart(ctxRisSub, {
                    type: 'bar',
                    data: {
                        labels: dataJson.data_detail_risksub_label,
                        datasets: [{
                            axis: 'y',
                            label: '',
                            data: dataJson.data_detail_risksub,
                            fill: false,
                            minBarLength: 2,
                            barThickness: 20,
                            maxBarThickness: 20,
                            // backgroundColor: coloR,
                            backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsiveAnimationDuration: 5000,
                        indexAxis: 'y',
                        scales: {
                            x: {
                                display: false
                            },
                            y: {
                                ticks: {
                                    font: {
                                        size: 13,
                                    },
                                    color: '#FFF'
                                },
                            }
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            datalabels: {
                                color: '#FFF',
                                // margin: 5
                            }
                        },
                    },
                    plugins: [ChartDataLabels],
                });
                // DETAIL RISK SUB 1 //

                // GRAP RISK MONTH SUB 1 //
                document.getElementById("detailRiskSub1").onclick = function(evt) {
                    var activePoints = risMntChart.getElementsAtEventForMode(evt, 'point', risMntChart.options);
                    var firstPoint = activePoints[0];
                    var label = risMntChart.data.labels[firstPoint.index];

                    var area = $("#areaFilter").val()
                    var year = $("#yearFilter").val()
                    var month = $("#monthFilter").val()
                    var labelTitle = label;

                    $('#detailGrapLabel').text('')
                    $('#detailGrapLabel').text(labelTitle)

                    $.ajax({
                        url: '<?= site_url('analitic/srs/dashboard/grap_detail_risk'); ?>',
                        type: 'POST',
                        data: {
                            area_fil: area,
                            year_fil: year,
                            month_fil: month,
                            label_fil: label,
                        },
                        cache: false,
                        beforeSend: function() {
                            document.getElementById("loader").style.display = "block";
                        },
                        complete: function() {
                            document.getElementById("loader").style.display = "none";
                        },
                        success: function(res) {
                            var dataJson = JSON.parse(res)

                            // GRAFIS LINE ALL MONTH //
                            riskMonthChart.data.datasets[0].data = dataJson.data_risk_sub1_month;
                            riskMonthChart.update();
                            // GRAFIS LINE ALL MONTH //
                        }
                    })
                }
                // GRAP RISK MONTH SUB 1 //
                
                // DETAIL RISK SUB 2 //
                // var ctxRisSub2 = document.getElementById("detailRiskSub2");
                // ctxRisSub2.height = 50;
                // var ict_unit = [];
                // var efficiency = [];
                // var coloR = [];
                // var dynamicColors = function() {
                //     var r = Math.floor(Math.random() * 255);
                //     var g = Math.floor(Math.random() * 255);
                //     var b = Math.floor(Math.random() * 255);
                //     return "rgb(" + r + "," + g + "," + b + ")";
                // };
                // var data = dataJson.data_detail_risksub2;
                // for (var i in data) {
                //     ict_unit.push("ICT Unit " + data[i].ict_unit);
                //     efficiency.push(data[i].efficiency);
                //     coloR.push(dynamicColors());
                // }
                // var risSub2Chart = new Chart(ctxRisSub2, {
                //     type: 'bar',
                //     data: {
                //         labels: dataJson.data_detail_risksub2_label,
                //         datasets: [{
                //             axis: 'y',
                //             label: '',
                //             data: dataJson.data_detail_risksub2,
                //             fill: false,
                //             // backgroundColor: coloR,
                //             backgroundColor: [
                //                 'rgba(255, 99, 132, 1)',
                //                 'rgba(255, 159, 64, 1)',
                //                 'rgba(255, 205, 86, 1)',
                //                 'rgba(75, 192, 192, 1)',
                //                 'rgba(54, 162, 235, 1)',
                //                 'rgba(153, 102, 255, 1)',
                //                 'rgba(153, 102, 255, 1)',
                //                 'rgba(201, 203, 207, 1)'
                //             ],
                //             borderWidth: 1
                //         }]
                //     },
                //     options: {
                //         responsiveAnimationDuration: 5000,
                //         indexAxis: 'y',
                //         scales: {
                //             x: {
                //                 display: false
                //             },
                //             y: {
                //                 ticks: {
                //                     font: {
                //                         size: 10,
                //                     },
                //                     color: '#000'
                //                 },
                //             }
                //         },
                //         plugins: {
                //             legend: {
                //                 display: false
                //             },
                //             datalabels: {
                //                 color: '#000',
                //                 // margin: 5
                //             }
                //         },
                //     },
                //     plugins: [ChartDataLabels],
                // });
                // DETAIL RISK SUB 2 //
            }
        });
    };
    // DETAIL RISK //

    function dataRiskChart() {
        // risk
        var labelRis = <?= $data_risk ?>;
        var dataRis = <?= $grap_risk ?>;
        arrayOfObjRis = labelRis.map(function(d, i) {
            return {
                label: d,
                data: dataRis[i] || 0
            };
        });
        sortedArrayOfObjRis = arrayOfObjRis.sort(function(a, b) {
            return b.data - a.data;
        });
        newArrayLabelRis = [];
        newArrayDataRis = [];
        sortedArrayOfObjRis.forEach(function(d) {
            newArrayLabelRis.push(d.label);
            newArrayDataRis.push(d.data);
        });


        risChart.data.datasets[0].data = newArrayDataRis;
        risChart.data.labels = newArrayLabelRis
        risChart.update();
        // 
    }
    dataRiskChart()

    // line charts all area 
    var ctxLine = document.getElementById("barLine").getContext('2d');

    const bgGradient = ctxLine.createLinearGradient(0, 0, 0, 400);
    bgGradient.addColorStop(0.6, 'rgba(20, 180, 60, 1)');
    bgGradient.addColorStop(0.4, 'rgba(90, 160, 90, 0.2)');
    bgGradient.addColorStop(0.1, 'blue');

    var lineChart = new Chart(ctxLine, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                pointStyle: 'circle',
                pointRadius: 8,
                label: '',
                data: <?= $grap_trans_month ?>,
                // backgroundColor: coloR,
                fill: true,
                backgroundColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                tension: 0.1,
                segment: {
                    borderColor: 'red',
                    // backgroundColor: bgGradient,
                    backgroundColor: 'rgba(201, 90, 80, 0.3)',
                },
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    ticks: {
                        font: {
                            size: 10,
                        },
                        color: '#FFF'
                    },
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        precision: 0,
                        color: '#FFF'
                    },
                    min: 0
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                datalabels: {
                    color: '#000'
                }
            },
        }
    })

    // DOUGHNUT TOTAL //
    var ctxDoughnutAll = document.getElementById("barDonatAll").getContext('2d');
    const centerText = {
        // id = 'centerText',
        afterDatasetsDraw(chart, args, pluginOptions) {
            var {
                ctx,
                data
            } = chart;
            var count = data.datasets[0].dataDUmmy;
            // console.log(count);
            // const text = data.datasets[0].data[0] + "\n";
            const text = count.reduce((a, b) => a + b) + "\n";
            ctx.save();
            const x = (chart.getDatasetMeta(0).data[0].x)
            const y = (chart.getDatasetMeta(0).data[0].y)
            ctx.textAlign = 'center';
            ctx.font = 'bold 18px sans-serif';
            ctx.fillStyle = 'white';
            ctx.fillText(text, x, y)
        }
    }
    const doughnutLabelsLine = {
        id: 'doughnutLabelsLine',
        afterDraw(chart, args, options) {
            const {
                ctx,
                chartArea: {
                    top,
                    bottom,
                    left,
                    right,
                    width,
                    height
                }
            } = chart;
            chart.data.datasets.forEach((dataset, i) => {
                chart.getDatasetMeta(i).data.forEach((datapoint, index) => {
                    // console.log(datapoint.startAngle);
                    const {
                        x,
                        y
                    } = datapoint.tooltipPosition();
                    // } = datapoint.startAngle();
                    // ctx.fillStyle = 'black';
                    // ctx.fillRect(x, y, 2, 2)

                    const halfwidth = width / 2;
                    const halfheight = height / 2;
                    const xLine = x >= halfwidth ? x + -10 : x - 15;
                    const yLine = y >= halfheight ? y + -4 : y - 4;
                    const extraLine = x >= halfwidth ? -5 : 30;

                    // const xLine = x >= halfwidth ? x + 15 : x - 15;
                    // const yLine = y >= halfheight ? y + 15 : y - 15;
                    // const extraLine = x >= halfwidth ? 15 : -15;
                    ctx.beginPath();
                    ctx.moveTo(x, y);
                    // ctx.lineTo(xLine, yLine);
                    // ctx.lineTo(xLine + extraLine, yLine);
                    ctx.lineTo(x, y);
                    ctx.lineTo(x, y);
                    // ctx.strokeStyle = 'black';
                    ctx.strokeStyle = dougnutChartAll.data.datasets[0].backgroundColor;
                    ctx.stroke();

                    // text
                    const textWidth = ctx.measureText(chart.data.labels[index]).width;
                    const textPosition = x >= halfwidth ? 'left' : 'right';
                    ctx.font = 'bold 10px Arial';
                    ctx.textBaseLine = 'middle';
                    ctx.textAlign = textPosition;
                    ctx.fillStyle = '#FFF';
                    ctx.fillText(chart.data.labels[index] + '(' + dougnutChartAll.data.datasets[0].dataDUmmy[index] + ') ', xLine + extraLine, yLine);
                })
            })
        }
    }
    var n = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    var m = "<?= date('m') ?>";
    var dougnutChartAll = new Chart(ctxDoughnutAll, {
        type: 'doughnut',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                // data: <?= $grap_trans ?>,
                data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                dataDUmmy: <?= $grap_trans_month ?>,
                backgroundColor: [
                    n[0] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[1] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[2] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[3] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[4] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[5] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[6] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[7] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[8] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[9] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[10] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                    n[11] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
                ],
                borderColor: ['#FFF'],
                cutout: '50%',
                borderRadius: 5,
                // backgroundColor: bgGradient2,
                // backgroundColor: 'rgba(20, 90, 80, 0.9)',
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            layout: {
                padding: 20
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: "#FFF"
                    }
                },
                tooltip: {
                    enabled: false
                },
                datalabels: {
                    anchor: 'end',
                    color: '#FFF',
                }
            },

        },
        plugins: [centerText, doughnutLabelsLine]
    })
    Chart.defaults.color = '#FFF';

    // PLANT DOUGHNUT //
    var ctxDoughnutPlant = document.getElementById("barDonatPlant").getContext('2d');
    var dougnutChartPlant = new Chart(ctxDoughnutPlant, {
        type: 'polarArea',
        data: {
            labels: <?= $legend_area ?>,
            datasets: [{
                backgroundColor: [
                    "rgba(46, 204, 113, 1)",
                    "rgba(52, 152, 219, 1)",
                    "rgba(80, 165, 20, 1)",
                    "rgba(155, 89, 182, 0.9)",
                    "rgba(20, 90, 80, 0.9)",
                    "rgba(231, 20, 60, 0.9)",
                    "rgba(200, 76, 20, 0.9)",
                ],
                data: <?= $grap_trans_area ?>,
            }]
        },
        options: {
            scales: {
                r: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        display: false, //try2 i tried to set ticks for scale
                    },
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: "right",
                    "labels": {
                        "fontSize": 20,
                        color: '#FFF'
                    }
                },
                datalabels: {
                    color: '#ffffff',

                }
            },
            maintainAspectRatio: false,
        },
        plugins: [ChartDataLabels]
    })
    // PLANT DOUGHNUT //

    // SOI AVERAGE PER MONTH  //
    var grapSoiAvgMonth = document.getElementById("grapSoiAvgMonth").getContext('2d');
    var soiAvgMonthChart = new Chart(grapSoiAvgMonth, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                  label: 'PEOPLE',
                  data: <?=$grap_soi_average_month['people'];?>,
                  borderColor: "rgba(0, 176, 80, 1)",
                  backgroundColor: "rgba(0, 176, 80, 1)",
                },
                {
                  label: 'SYSTEM',
                  data: <?=$grap_soi_average_month['system'];?>,
                  borderColor: "rgba(0, 176, 240, 1)",
                  backgroundColor: "rgba(0, 176, 240, 1)",
                },
                {
                  label: 'DEVICE',
                  data: <?=$grap_soi_average_month['device'];?>,
                  borderColor:  "rgba(255, 0, 0, 1)",
                  backgroundColor:  "rgba(255, 0, 0, 1)",
                },
                {
                  label: 'NETWORKING',
                  data: <?=$grap_soi_average_month['network'];?>,
                  borderColor: "rgba(112, 48, 160, 1)",
                  backgroundColor: "rgba(112, 48, 160, 1)",
                },
            ],
        },
        options: {
            scales: {
                y: {
                    min: 0,
                    max: 5,
                    // beginAtZero: true,
                    ticks: {
                        precision: 0,
                        // stepSize: 1,
                        callback: (yValue) => {
                            return Number(yValue).toFixed(2); // format to your liking
                        },
                    },
                },
            },
            plugins: {
              filler: {
                propagate: false
              },
              'samples-filler-analyser': {
                target: 'chart-analyser'
              }
            },
            interaction: {
              intersect: false,
            },
        },
    });
    // SOI AVERAGE PER MONTH  //

    // SOI AREA //
    var grapSoiArea = document.getElementById("grapSoiArea").getContext('2d');
    var grapSoiAreahChart = new Chart(grapSoiArea, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [
                {
                  label: 'PLANT 1',
                  data: <?=$grap_soi_avg_areamonth['plant_1'];?>,
                  // borderColor: "rgba(0, 176, 80, 1)",
                  // backgroundColor: "rgba(0, 176, 80, 1)",
                },
                {
                  label: 'PLANT 2',
                  data: <?=$grap_soi_avg_areamonth['plant_2'];?>,
                  // borderColor: "rgba(0, 176, 240, 1)",
                  // backgroundColor: "rgba(0, 176, 240, 1)",
                },
                {
                  label: 'PLANT 3',
                  data: <?=$grap_soi_avg_areamonth['plant_3'];?>,
                  // borderColor:  "rgba(255, 0, 0, 1)",
                  // backgroundColor:  "rgba(255, 0, 0, 1)",
                },
                {
                  label: 'PLANT 4',
                  data: <?=$grap_soi_avg_areamonth['plant_4'];?>,
                  // borderColor: "rgba(112, 48, 160, 1)",
                  // backgroundColor: "rgba(112, 48, 160, 1)",
                },
                {
                  label: 'PLANT 5',
                  data: <?=$grap_soi_avg_areamonth['plant_5'];?>,
                  // borderColor: "rgba(112, 48, 160, 1)",
                  // backgroundColor: "rgba(112, 48, 160, 1)",
                },
                {
                  label: 'VLC',
                  data: <?=$grap_soi_avg_areamonth['vlc'];?>,
                  // borderColor: "rgba(112, 48, 160, 1)",
                  // backgroundColor: "rgba(112, 48, 160, 1)",
                },
                {
                  label: 'HEAD OFFICE',
                  data: <?=$grap_soi_avg_areamonth['head_office'];?>,
                  // borderColor: "rgba(112, 48, 160, 1)",
                  // backgroundColor: "rgba(112, 48, 160, 1)",
                },
                {
                  label: 'PART CENTER',
                  data: <?=$grap_soi_avg_areamonth['part_center'];?>,
                  // borderColor: "rgba(112, 48, 160, 1)",
                  // backgroundColor: "rgba(112, 48, 160, 1)",
                },
            ],
        },
        options: {
            scales: {
                y: {
                    min: 0,
                    max: 5,
                    // beginAtZero: true,
                    ticks: {
                        precision: 0,
                        // stepSize: 1,
                        callback: (yValue) => {
                            return Number(yValue).toFixed(2); // format to your liking
                        },
                    },
                },
            },
            plugins: {
              filler: {
                propagate: false
              },
              'samples-filler-analyser': {
                target: 'chart-analyser'
              }
            },
            interaction: {
              intersect: false,
            },
        },
    });
    // SOI AREA //

    // ALL CHART WHEN UPDATE FILTER //
    $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
        var area = $("#areaFilter").val()
        var year = $("#yearFilter").val()
        var month = $("#monthFilter").val()

        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard_dev/grap_srs'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)
                // console.log(json.data_soi[0].avg_soi)

                // SOI //
                var dataSrs = [{
                    r: 8,
                    x: json.data_soi[0].avg_soi,
                    y: json.data_index[0].max_iso
                }];
                srsChart.data.datasets[0].data = dataSrs;
                srsChart.update();

                // INDEX BG SOI //
                const dataX = json.data_soi[0].avg_soi;
                const dataY = json.data_index[0].max_iso;

                if((dataX <= 4 && dataY <= 2) || (dataX >= 4 && dataY >= 2))
                {
                    $('#indexSoi').attr('style','background-color: rgb(233 233 9 / 69%)') // yellow
                }
                
                if(dataX >= 4 && dataY <= 2)
                {
                    $('#indexSoi').attr('style','background-color: rgb(0 128 9 / 69%)') // green
                }
                
                if(dataX <= 4 && dataY >= 2)
                {
                    $('#indexSoi').attr('style','background-color: rgb(255 0 9 / 69%)') // red
                }
                // INDEX BG SOI //

                // GRAFIS SOI AVERAGE MONTH //
                soiAvgMonthChart.data.datasets = json.grap_soi_average_month;
                soiAvgMonthChart.update()
                // GRAFIS SOI AVERAGE MONTH //

                // SOI AVG PILAR //
                $('#avgPeople').text('')
                console.log(json.grap_soi_avgpilar[0].avg_people)
                $('#avgPeople').text(json.grap_soi_avgpilar[0].avg_people)
                $('#avgSystem').text('')
                $('#avgSystem').text(json.grap_soi_avgpilar[0].avg_system)
                $('#avgDevice').text('')
                $('#avgDevice').text(json.grap_soi_avgpilar[0].avg_device)
                $('#avgNetwork').text('')
                $('#avgNetwork').text(json.grap_soi_avgpilar[0].avg_network)
                // SOI AVG PILAR //

                // GRAFIS SOI AVERAGE AREA MONTH //
                grapSoiAreahChart.data.datasets = json.grap_soi_avg_areamonth;
                grapSoiAreahChart.update()
                // GRAFIS SOI AVERAGE AREA MONTH //
                // SOI //

                // RISK SOURCE //
                var labelRso = <?= $data_risk_source ?>;
                var dataRso = json.data_risk_source;
                arrayOfObj = labelRso.map(function(d, i) {
                    return {
                        label: d,
                        data: dataRso[i] || 0
                    };
                });
                sortedArrayOfObj = arrayOfObj.sort(function(a, b) {
                    return b.data - a.data;
                });
                newArrayLabelRso = [];
                newArrayDataRso = [];
                sortedArrayOfObj.forEach(function(d) {
                    newArrayLabelRso.push(d.label);
                    newArrayDataRso.push(d.data);
                });
                rsoChart.data.datasets[0].data = newArrayDataRso;
                rsoChart.data.labels = newArrayLabelRso
                rsoChart.update();
                // RISK SOURCE //

                // RISK //
                var labelRis = json.data_risk_label;
                var dataRis = json.data_risk;
                arrayOfObjRis = labelRis.map(function(d, i) {
                    return {
                        label: d,
                        data: dataRis[i] || 0
                    };
                });
                sortedArrayOfObjRis = arrayOfObjRis.sort(function(a, b) {
                    return b.data - a.data;
                });
                newArrayLabelRis = [];
                newArrayDataRis = [];
                sortedArrayOfObjRis.forEach(function(d) {
                    newArrayLabelRis.push(d.label);
                    newArrayDataRis.push(d.data);
                });
                risChart.data.datasets[0].data = newArrayDataRis;
                risChart.data.labels = newArrayLabelRis
                risChart.update();
                // RISK //

                // TARGET ASSETS //
                var labelAssets = <?= $target_assets ?>;
                var dataAssets = json.data_target_assets;
                arrayOfObjAssets = labelAssets.map(function(d, i) {
                    return {
                        label: d,
                        data: dataAssets[i] || 0
                    };
                });
                sortedArrayOfObjAssets = arrayOfObjAssets.sort(function(a, b) {
                    return b.data - a.data;
                });
                newArrayLabelAssets = [];
                newArrayDataAssets = [];
                sortedArrayOfObjAssets.forEach(function(d) {
                    newArrayLabelAssets.push(d.label);
                    newArrayDataAssets.push(d.data);
                });
                assetChart.data.datasets[0].data = newArrayDataAssets;
                assetChart.data.labels = newArrayLabelAssets
                assetChart.update();
                // TARGET ASSETS //

                // GRAFIS ALL PLANT //
                dougnutChartPlant.data.datasets[0].data = json.data_trans_area;
                dougnutChartPlant.update();
                // GRAFIS ALL PLANT //

                // GRAFIS LINE ALL MONTH //
                lineChart.data.datasets[0].data = json.data_trans_month;
                lineChart.update();
                // GRAFIS LINE ALL MONTH //

                // GRAFIS DOUGHNUT PER MONTH //
                dougnutChartAll.data.datasets[0].dataDUmmy = json.data_trans_month;
                dougnutChartAll.update();
                // GRAFIS DOUGHNUT PER MONTH //

                // RISK LEVEL //
                var labelRisLvl = json.data_risk_lbl_lvl;
                var dataRisLvl = json.data_risk_level;
                arrayOfObjRisLvl = labelRisLvl.map(function(d, i) {
                    return {
                        label: d,
                        data: dataRisLvl[i] || 0
                    };
                });
                sortedArrayOfObjRisLvl = arrayOfObjRisLvl.sort(function(a, b) {
                    return b.data - a.data;
                });
                newArrayLabelRisLvl = [];
                newArrayDataRisLvl = [];
                sortedArrayOfObjRisLvl.forEach(function(d) {
                    newArrayLabelRisLvl.push(d.label);
                    newArrayDataRisLvl.push(d.data);
                });
                // risLvlChart.data.datasets[0].data = newArrayDataRisLvl;
                // risLvlChart.data.labels = newArrayLabelRisLvl
                // risLvlChart.update();
                // RISK LEVEL //
            }
        });

    })
</script>