<style>
    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }

    .box-soa {
        height: 110px !important;
    }

    .box-soa .h4 {
        text-transform: uppercase !important;
        font-size: 20px !important;
        font-weight: 700;
    }

    .box-soa .card-text {
        text-transform: uppercase !important;
        font-size: 20px !important;
    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <!-- <div class="col-sm-6">
                <h1>Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </div> -->
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 filter sticky-top-OFF">
                <div class="card cardIn2">
                    <div class="card-body">
                        <form id="form-filter" class="form-horizontal">
                            <div class="form-row">
                                <div class="form-group col-12 col-md-2">
                                    <label for="area">Area</label>
                                    <?= $select_area_filter; ?>
                                </div>

                                <div class="form-group col-12 col-md-2">
                                    <label for="yearFilter">Year</label>
                                    <?= $select_year_filter; ?>
                                </div>

                                <div class="form-group col-12 col-md-2">
                                    <label for="monthFilter">Month</label>
                                    <?= $select_month_filter; ?>
                                </div>

                                <div class="form-group col-12 col-md d-flex align-items-md-end justify-content-md-end justify-content-center">
                                    <span class="h2 ff-fugazone title-dashboard">Security BigData Analytic</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card cardIn2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-7 mb-3 mb-md-0">
                                        <canvas id="grapSoi"></canvas>
                                    </div>

                                    <div class="col-lg-5 pt-4 px-5 text-center">
                                        <h5>Index Resiko ADM</h5>
                                        <input id="indexSoi" class="form-control form-control-lg" type="text" placeholder="" disabled>

                                        <div id="isoDesc" class="card mt-3" style="display: none;">
                                            <div class="card-body">
                                                <dl class="row text-white text-left">
                                                    <dt class="col-sm-1">-</dt>
                                                    <dd class="col-sm-11">Masyarakat Sunter tidak kondusif (pandemic ke endemic) dan program CSR - External</dd>

                                                    <dt class="col-sm-1">-</dt>
                                                    <dd class="col-sm-11">Narkoba (Pembubaran kampung Bahari) - External</dd>

                                                    <dt class="col-sm-1">-</dt>
                                                    <dd class="col-sm-11">Pembangunan KAP 2 - Internal</dd>

                                                    <dt class="col-sm-1">-</dt>
                                                    <dd class="col-sm-11">Serangan Ransomware - Internal</dd>
                                                </dl>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3">
                        <div class="card shadow" style="height: 280px;">
                            <div class="card-body" style="padding:0">
                                <canvas id="srsPerMonthDough"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card" style="height: 280px;">
                            <div class="card-body">
                                <canvas id="srsPerMonthLine"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card" style="height: 280px;">
                            <div class="card-body">
                                <div class="row">
                                    <canvas id="srsPerPlantDough" style="margin-top:-40px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card" style="height: 390px;">
                            <div class="card-body text-center">
                                <h5>Risk Source</h5>
                                <canvas id="rsoChart"></canvas>
                            </div>
                        </div>
                    </div>
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
                                <h5>Risk</h5>
                                <canvas id="riskChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card cardIn2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5 pt-md-4 text-center">
                                        <div class="row">
                                            <div class="col-12 mb-3">
                                                <h2 class="text-white title-dashboard">Security Operational Index</h2>
                                            </div>
                                            <div class="col-10 mx-auto mx-md-0 col-md-6">
                                                <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                                    <span style="background:rgba(0, 176, 80, 1)" class="info-box-icon elevation-1">
                                                        <img style="height:60%" src="./assets/images/icon/people-white.png">
                                                    </span>
                                                    <div class="info-box-content  text-white">
                                                        <span class="info-box-text">
                                                            PEOPLE
                                                        </span>
                                                        <span id="avgPeople" class="info-box-number">
                                                            0.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-10 mx-auto mx-md-0 col-lg-6">
                                                <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                                    <span style="background:rgba(0, 176, 240, 1)" class="info-box-icon elevation-1">
                                                        <img style="height:60%" src="./assets/images/icon/system-white.png">
                                                    </span>
                                                    <div class="info-box-content text-white">
                                                        <span class="info-box-text">
                                                            SYSTEM
                                                        </span>
                                                        <span id="avgSystem" class="info-box-number">
                                                            0.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-10 mx-auto mx-md-0 col-lg-6">
                                                <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                                    <span style="background:rgba(255, 0, 0, 1)" class="info-box-icon elevation-1">
                                                        <img style="height:60%" src="./assets/images/icon/device-white.png">
                                                    </span>
                                                    <div class="info-box-content  text-white">
                                                        <span class="info-box-text">
                                                            DEVICE
                                                        </span>
                                                        <span id="avgDevice" class="info-box-number">
                                                            0.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-10 mx-auto mx-md-0 col-lg-6">
                                                <div class="info-box" style="background:rgb(255 255 255 / 13%)">
                                                    <span style="background:rgba(112, 48, 160, 1)" class="info-box-icon elevation-1">
                                                        <img style="height:60%" src="./assets/images/icon/network-white.png">
                                                    </span>
                                                    <div class="info-box-content  text-white">
                                                        <span class="info-box-text">
                                                            NETWORKING
                                                        </span>
                                                        <span id="avgNetwork" class="info-box-number">
                                                            0.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-7 text-white">
                                        <canvas id="lineSoiAvgMonth"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--   -->
                <div class="row">
                    <div class="col-lg-9">
                        <div class="card" style="height: 370px;">
                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div id="soa_allMonth"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card flex-row justify-content-center box-soa">
                            <img style="height: 70px;width:70px" class="card-img-left example-card-img-responsive mt-3 ml-2" src="<?= base_url() ?>/assets/images/icon/soa/ancestors.png" />
                            <div class="card-body text-white text-center">
                                <h4 class="h4">Vehicle</h4>
                                <p class="card-text" id="countVehicle">0</p>
                            </div>
                        </div>
                        <div class="card flex-row box-soa">
                            <img style="height: 70px;width:70px" class="card-img-left example-card-img-responsive mt-3 ml-2" src="<?= base_url() ?>assets/images/icon/soa/pollution.png" />
                            <div class="card-body text-white text-center">
                                <h4 class="h4">People</h4>
                                <p class="card-text" id="countPeople">0</p>
                            </div>
                        </div>
                        <div class="card flex-row box-soa">
                            <img style="height: 70px;width:70px" class="card-img-left example-card-img-responsive mt-3 ml-2" src="<?= base_url() ?>assets/images/icon/soa/folder.png" />
                            <div class="card-body text-white text-center">
                                <h4 class="h4">Document</h4>
                                <p class="card-text" id="countDocument">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<div class="modal fade" id="detailGrapSmall" tabindex="-1" role="dialog" aria-labelledby="detailGrapSmallLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:50%;max-width:none;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailGrapSmallLabel">Graphic Data</h5>
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

<div class="modal fade" id="topIndexSmall" tabindex="-1" role="dialog" aria-labelledby="topIndexSmallLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:50%;max-width:none;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="topIndexSmallLabel">Graphic Data</h5>
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

<script src="<?= base_url('vendor/chartjs/dist/chart.umd.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js'); ?>"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script type="text/javascript">
    var field = [
        area = $("#areaFilter").val(),
        areas = $("#areaFilter").val(),
        year = $("#yearFilter").val(),
        years = $("#yearFilter").val(),
        month = $("#monthFilter").val(),
        months = $("#monthFilter").val(),
        peopleTotal = $("#countPeople"),
        vehicleTotal = $("#countVehicle"),
        materialTotal = $("#countDocument"),
        currYear = '<?= date('Y') ?>',
        currMonth = '<?= date('m') ?>',
    ]


    // DOUGHNAT PERMONTH TOTAL //
    var srsPerMonthDoughId = document.getElementById("srsPerMonthDough").getContext('2d');
    const centerText = {
        afterDatasetsDraw(chart, args, pluginOptions) {
            var {
                ctx,
                data
            } = chart;
            var count = data.datasets[0].dataDUmmy;
            const text = count.reduce((a, b) => a + b) + "\n";
            ctx.save();
            const x = (chart.getDatasetMeta(0).data[0].x)
            const y = (chart.getDatasetMeta(0).data[0].y)
            ctx.textAlign = 'center';
            ctx.font = 'bold 18px sans-serif';
            ctx.fillStyle = '#FFF';
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
                    const {
                        x,
                        y
                    } = datapoint.tooltipPosition();

                    const halfwidth = width / 2;
                    const halfheight = height / 2;
                    const xLine = x >= halfwidth ? x + -10 : x - 15;
                    const yLine = y >= halfheight ? y + -4 : y - 4;
                    const extraLine = x >= halfwidth ? -5 : 30;

                    ctx.beginPath();
                    ctx.moveTo(x, y);
                    ctx.lineTo(x, y);
                    ctx.lineTo(x, y);
                    ctx.strokeStyle = srsPerMonthDoughChart.data.datasets[0].backgroundColor;
                    ctx.stroke();

                    // text
                    const textWidth = ctx.measureText(chart.data.labels[index]).width;
                    const textPosition = x >= halfwidth ? 'left' : 'right';
                    ctx.font = 'bold 10px Arial';
                    ctx.textBaseLine = 'middle';
                    ctx.textAlign = textPosition;
                    ctx.fillStyle = '#FFF';
                    ctx.fillText(`${chart.data.labels[index]} (${srsPerMonthDoughChart.data.datasets[0].dataDUmmy[index]})`, xLine + extraLine, yLine);
                })
            })
        }
    }
    var n = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
    var m = currMonth;
    var srsPerMonthDoughChart = new Chart(srsPerMonthDoughId, {
        type: 'doughnut',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                data: [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30],
                dataDUmmy: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
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
            }],
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
    var ySelected = currYear;
    $("select[name=year_filter").on('change', function() {
        years2 = $("select[name=year_filter] option:selected").val();
        srsPerMonthDoughChart.data.datasets[0].backgroundColor = [
            n[0] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[1] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[2] == m && years2 == ySelected ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[3] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[4] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[5] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[6] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[7] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[8] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[9] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[10] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
            n[11] == m ? 'rgb(255,51,51)' : 'rgb(51,51,153)',
        ];
        srsPerMonthDoughChart.update();
    })
    Chart.defaults.color = '#FFF';

    $(document).ready(function() {

        SoaFtraficAll(field)
        vehicle(field);
        material(field);
        people(field);

        srsPerMonthDoughs(srsPerMonthDoughChart, srsPerMonthLineChart)
        srsPerPlantDoughs(srsPerPlantDoughChart)
        srsRiskSource(rsoChart)
        srsTargetAssets(assetChart)
        srsRisks(riskChart)
        srsSoi(soiChart)
    });
    // DOUGHNAT PERMONTH TOTAL //

    // LINE PERMONTH TOTAL 
    var srsPerMonthLine = document.getElementById("srsPerMonthLine").getContext('2d');
    const bgGradient = srsPerMonthLine.createLinearGradient(0, 0, 0, 400);
    bgGradient.addColorStop(0.6, 'rgba(20, 180, 60, 1)');
    bgGradient.addColorStop(0.4, 'rgba(90, 160, 90, 0.2)');
    bgGradient.addColorStop(0.1, 'blue');

    var srsPerMonthLineChart = new Chart(srsPerMonthLine, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                pointStyle: 'circle',
                pointRadius: 8,
                label: '',
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
                    color: '#FFF'
                }
            },
        }
    })
    // LINE PERMONTH TOTAL //

    // DOUGHNUT PER PLANT
    var srsPerPlantDough = document.getElementById("srsPerPlantDough").getContext('2d');
    var srsPerPlantDoughChart = new Chart(srsPerPlantDough, {
        type: 'polarArea',
        data: {
            // labels: ,
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
                // data: ,
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
                    color: '#FFF',
                }
            },
            maintainAspectRatio: false,
        },
        plugins: [ChartDataLabels]
    })
    // DOUGHNUT PER PLANT //

    // RISK SOURCE
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
    var rsoChart = new Chart(ctxRso, {
        type: 'bar',
        data: {
            datasets: [{
                axis: 'y',
                fill: false,
                minBarLength: 2,
                barThickness: 20,
                maxBarThickness: 20,
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
    // RISK SOURCE //

    // TARGET ASSETS //
    var ctxAsset = document.getElementById("assetChart");
    ctxAsset.height = 250;
    var assetChart = new Chart(ctxAsset, {
        type: 'bar',
        data: {
            datasets: [{
                axis: 'y',
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
    // TARGET ASSETS //

    // RISK //
    var ctxRis = document.getElementById("riskChart");
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
    var riskChart = new Chart(ctxRis, {
        type: 'bar',
        data: {
            datasets: [{
                axis: 'y',
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
    // RISK //

    // SOI //
    const ctxSoi = document.getElementById("grapSoi");
    ctxSoi.height = 300;
    const soiChart = new Chart(ctxSoi, {
        type: 'bubble',
        data: {
            // labels: ['January', 'Fabruary', 'March', 'April', 'May', 'June', 'July'],
            datasets: [{
                label: 'Index Resiko',
                data: [{
                    r: 8,

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
                        text: 'Threat',
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
                        text: 'Security Operational Index',
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
                            return ` SOI: ${item.raw.x}, THREAT: ${item.raw.y}`
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

    function srsPerMonthDoughs(srsPerMonthDoughChart, srsPerMonthLineChart) {
        $.ajax({
            url: '<?= site_url('menu/srsmonth'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                srsPerMonthLineChart.data.datasets[0].data = json;
                srsPerMonthLineChart.update();

                srsPerMonthDoughChart.data.datasets[0].dataDUmmy = json;
                srsPerMonthDoughChart.update();
            }
        });
    }

    function srsPerPlantDoughs(srsPerPlantDoughChart) {
        $.ajax({
            url: '<?= site_url('menu/srsPerPlant'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                srsPerPlantDoughChart.data.labels = json.plant;
                srsPerPlantDoughChart.data.datasets[0].data = json.total;
                srsPerPlantDoughChart.update();
            }
        });
    }

    function srsRiskSource(rsoChart) {
        $.ajax({
            url: '<?= site_url('menu/srsRiskSource'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                dataRiskSource = json;
                setRiskSource = [{
                    label: dataRiskSource.map(function(v) {
                        return v.label
                    }),
                    data: dataRiskSource.map(function(v) {
                        return v.total
                    })
                }];

                for (var i in setRiskSource[0].label) {
                    ict_unit.push("ICT Unit " + setRiskSource[0].label[i].ict_unit);
                    efficiency.push(setRiskSource[0].label[i].efficiency);
                    coloR.push(dynamicColors());
                }

                rsoChart.data.datasets[0].data = setRiskSource[0].data;
                rsoChart.data.datasets[0].backgroundColor = coloR;
                rsoChart.data.labels = setRiskSource[0].label
                rsoChart.update();
            }
        });
    }

    function srsTargetAssets(assetChart) {
        $.ajax({
            url: '<?= site_url('menu/srsTargetAssets'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                var dataAssets = json;
                var datasetsAssets = [{
                    label: dataAssets.map(function(v) {
                        return v.label
                    }),
                    data: dataAssets.map(function(v) {
                        return v.total
                    })
                }];

                // for (var i in setRiskSource[0].label) {
                //     ict_unit.push("ICT Unit " + datasetsAssets[0].label[i].ict_unit);
                //     efficiency.push(datasetsAssets[0].label[i].efficiency);
                //     coloR.push(dynamicColors());
                // }

                assetChart.data.datasets[0].data = datasetsAssets[0].data;
                // rsoChart.data.datasets[0].backgroundColor = coloR;
                assetChart.data.labels = datasetsAssets[0].label
                assetChart.update();
            }
        });
    }

    function srsRisks(riskChart) {
        $.ajax({
            url: '<?= site_url('menu/srsRisk'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                var dataRisk = json
                var setRisk = [{
                    label: dataRisk.map(function(v) {
                        return v.label
                    }),
                    data: dataRisk.map(function(v) {
                        return v.total
                    })
                }];

                riskChart.data.labels = setRisk[0].label
                riskChart.data.datasets[0].data = setRisk[0].data
                riskChart.update();
            }
        });
    }

    function srsSoi(soiChart) {
        $.ajax({
            url: '<?= site_url('menu/srsSoi'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
            },
            complete: function() {
                // $(".lds-ring").hidde();
            },
            success: function(res) {
                var json = JSON.parse(res)

                var dataX = json.data_soi;
                var dataY = json.data_index;

                var dataSrs = [{
                    r: 8,
                    x: dataX,
                    y: dataY
                }];
                soiChart.data.datasets[0].data = dataSrs;
                soiChart.update();

                // INDEX BG SOI //

                if ((dataX <= 4 && dataY <= 2) || (dataX >= 4 && dataY >= 2)) {
                    $('#indexSoi').attr('style', 'background-color: rgb(233 233 9 / 69%)') // yellow
                }

                if (dataX >= 4 && dataY <= 2) {
                    $('#indexSoi').attr('style', 'background-color: rgb(0 128 9 / 69%)') // green
                }

                if (dataX <= 4 && dataY >= 2) {
                    $('#indexSoi').attr('style', 'background-color: rgb(255 0 9 / 69%)') // red
                }
                // INDEX BG SOI //
            }
        });

        // SOI DETAIL //
        document.getElementById("grapSoi").onclick = function(evt) {
            var activePoints = soiChart.getElementsAtEventForMode(evt, 'point', soiChart.options);
            var firstPoint = activePoints[0];

            if (firstPoint) {
                var label = soiChart.data.labels[firstPoint.index];
                var data = soiChart.data.datasets[0].data[0];
                console.log(data.x)

                var area = $("#areaFilter").val();
                var year = $("#yearFilter").val();
                var month = $("#monthFilter").val();

                $.ajax({
                    url: '<?= site_url('analitic/srs/dashboard_humint/grap_trend_soi'); ?>',
                    type: 'POST',
                    data: {
                        area_fil: area,
                        year_fil: year,
                        month_fil: month,
                    },
                    cache: false,
                    beforeSend: function() {
                        // document.getElementById("loader").style.display = "block";
                    },
                    complete: function() {
                        // document.getElementById("loader").style.display = "none";
                    },
                    success: function(res) {

                        var dataJson = JSON.parse(res)

                        $("#detailGrapSmall .modal-body").html("");
                        $("#detailGrapSmall").modal();
                        $('#detailGrapSmallLabel').text('Trend Index Resiko')

                        $("#detailGrapSmall .modal-body").append(`
                            <div class="row">
                                <div class="col-12 pb-3 mt-4">
                                    <div class="row">
                                        <!--<div class="col-md-12 pb-3 mb-3 border-bottom">
                                            <span class="h5">Trend Index Resiko</span>
                                        </div>-->
                                        <div class="col-md-12" style="height:250px;">
                                            <canvas id="trendGrapSoi"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);

                        // TREND SOI YEAR //
                        var trendSoi = document.getElementById("trendGrapSoi").getContext('2d');
                        var monthList = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des']
                        var trendSoiChart = new Chart(trendSoi, {
                            type: 'line',
                            data: {
                                labels: monthList,
                                datasets: [{
                                        pointStyle: 'circle',
                                        pointRadius: 4,
                                        label: 'SOI',
                                        data: dataJson.data_soi,
                                        // fill: true,
                                        // tension: 0.1,
                                        // segment: {
                                        borderColor: 'rgba(99, 131, 255, 1)',
                                        backgroundColor: 'rgba(99, 131, 255, 0.8)',
                                        // },
                                        borderWidth: 1,
                                    },
                                    {
                                        pointStyle: 'circle',
                                        pointRadius: 4,
                                        label: 'Index',
                                        data: dataJson.data_index,
                                        // fill: true,
                                        // tension: 0.1,
                                        // segment: {
                                        borderColor: 'rgba(255, 165, 0, 1)',
                                        backgroundColor: 'rgb(255 165 0)',
                                        // },
                                        borderWidth: 1,
                                    }
                                ]
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
                                            display: true
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
                                        display: true
                                    },
                                    datalabels: {
                                        color: '#FFF'
                                    }
                                },
                            }
                        });
                        // TREND SOI YEAR //

                        document.getElementById("trendGrapSoi").onclick = function(evt) {
                            var activePoints = trendSoiChart.getElementsAtEventForMode(evt, 'point', trendSoiChart.options);
                            var firstPoint = activePoints[0];

                            if (firstPoint) {
                                var label = trendSoiChart.data.labels[firstPoint.index];
                                var data = trendSoiChart.data.datasets[0].data[0];

                                console.log(firstPoint.datasetIndex)

                                if (firstPoint.datasetIndex == 1) {
                                    $.ajax({
                                        url: '<?= site_url('analitic/srs/dashboard_humint/grap_top_index'); ?>',
                                        type: 'POST',
                                        data: {
                                            area_fil: area,
                                            year_fil: year,
                                            month_fil: label,
                                        },
                                        cache: false,
                                        beforeSend: function() {
                                            // document.getElementById("loader").style.display = "block";
                                        },
                                        complete: function() {
                                            // document.getElementById("loader").style.display = "none";
                                        },
                                        success: function(res) {
                                            $("#topIndexSmall .modal-body").html("");
                                            $("#topIndexSmall").modal();
                                            $('#topIndexSmallLabel').text('Top Index');

                                            $("#topIndexSmall .modal-body").append(res);
                                        }
                                    });
                                }
                            }
                        }

                        // document.getElementById("detailSoi").onclick = function(evt) {
                        //     $("#detailGrapSmall .modal-body").html("");
                        //     $("#detailGrapSmall").modal();
                        //     $('#detailGrapSmallLabel').text('Detail SOI');
                        // }
                    }
                });
            }
        }
        // SOI DETAIL //

        // SOI AVERAGE MONTH LINE  //
        var lineSoiAvgMonthCtx = document.getElementById("lineSoiAvgMonth").getContext('2d');
        var soiAvgMonthChart = new Chart(lineSoiAvgMonthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                        label: 'PEOPLE',
                        data: [3.00, 4.50, 2.10, 4.00, 1.00, 2.20, 2.05, 3.50, 5.00, 3.80, 1.00, 2.00],
                        borderColor: "rgba(0, 176, 80, 1)",
                        backgroundColor: "rgba(0, 176, 80, 1)",
                    },
                    {
                        label: 'SYSTEM',
                        data: [1.00, 3.50, 4.10, 4.00, 3.00, 4.20, 4.05, 2.00, 5.00, 1.80, 1.00, 2.00],
                        borderColor: "rgba(0, 176, 240, 1)",
                        backgroundColor: "rgba(0, 176, 240, 1)",
                    },
                    {
                        label: 'DEVICE',
                        data: [2.30, 4.10, 3.70, 4.00, 4.00, 4.20, 1.20, 3.00, 5.00, 2.80, 1.00, 2.00],
                        borderColor: "rgba(255, 0, 0, 1)",
                        backgroundColor: "rgba(255, 0, 0, 1)",
                    },
                    {
                        label: 'NETWORKING',
                        data: [4.03, 2.50, 1.10, 4.00, 3.80, 4.20, 3.05, 1.00, 5.00, 4.80, 1.00, 2.00],
                        borderColor: "rgba(112, 48, 160, 1)",
                        backgroundColor: "rgba(112, 48, 160, 1)",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        min: 0,
                        max: 5,
                        ticks: {
                            precision: 0,
                            callback: (yValue) => {
                                return Number(yValue).toFixed(2); // format to your liking
                            },
                            color: '#FFF',
                        },
                    },
                    x: {
                        ticks: {
                            color: '#FFF'
                        },
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: "#FFF"
                        },
                    },
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

        lineSoiAvgMonth(field)

        function lineSoiAvgMonth(field) {
            $.ajax({
                url: '<?= site_url('analitic/srs/dashboard_soi/soi_avg_month'); ?>',
                type: 'POST',
                data: {
                    area_filter: area,
                    year_filter: year,
                    month_filter: month,
                },
                cache: false,
                beforeSend: function() {
                    // $(".lds-ring").show();
                    // document.getElementById("loader").style.display = "block";
                },
                complete: function() {
                    // document.getElementById("loader").style.display = "none";
                },
                success: function(res) {
                    var json = JSON.parse(res)

                    console.log(json)

                    soiAvgMonthChart.data.datasets = json;
                    soiAvgMonthChart.update()
                }
            });
        }
        // SOI AVERAGE MONTH LINE  //

        soiAvgPillar(field)

        function soiAvgPillar(field) {
            $.ajax({
                url: '<?= site_url('analitic/srs/dashboard_soi/soi_avg_pilar'); ?>',
                type: 'POST',
                data: {
                    area_filter: area,
                    year_filter: year,
                    month_filter: month,
                },
                cache: false,
                beforeSend: function() {
                    // $(".lds-ring").show();
                    // document.getElementById("loader").style.display = "block";
                },
                complete: function() {
                    // document.getElementById("loader").style.display = "none";
                },
                success: function(res) {
                    var json = JSON.parse(res)

                    console.log(json)

                    // SOI AVG PILAR //
                    $('#avgPeople, #avgSystem, #avgDevice, #avgNetwork').text('')
                    $('#avgPeople').text(json[0].avg_people)
                    $('#avgSystem').text(json[0].avg_system)
                    $('#avgDevice').text(json[0].avg_device)
                    $('#avgNetwork').text(json[0].avg_network)
                    // SOI AVG PILAR //
                }
            });
        }
    }

    var SoatraficAll = Highcharts.chart('soa_allMonth', {
        chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 360,
        },
        title: {
            text: 'Security Operational Analytic',
            style: {
                color: '#FFF',
            }
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            labels: {
                style: {
                    color: '#FFF'
                }
            }
        },
        yAxis: {
            title: {
                text: '',
            },
            labels: {
                style: {
                    color: '#FFF'
                }
            },
            gridLineColor: 'rgba(10, 10, 10, 0.2)'
        },
        legend: {
            itemStyle: {
                color: '#FFF',
                fontWeight: 'bold'
            }
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                marker: {
                    fillColor: '#FFFFFF',
                    lineWidth: 4,
                    lineColor: null // inherit from series
                }
            }
        },
        exporting: {
            enabled: false
        },
        series: [{
            name: 'People',
            // data: [12, 12, 31, 4, 26, 72, 82, 51, 8, 4, 22, 23],
            data: [],
        }, {
            name: 'Vehicle',
            data: [],
        }, {
            name: 'Document',
            data: [],
        }]
    });

    function SoaFtraficAll(field) {
        $.ajax({
            url: "<?= base_url('analitic/soa/dashboard/grapichSetahun') ?>",
            method: "POST",
            data: {
                year: years,
                area_fill: areas
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("traficAllLoader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("traficAllLoader").style.display = "none";
            },
            success: function(e) {
                let data = JSON.parse(e);
                let color = ["#b8e30e", "#e3129d", "#eb5342"];
                for (let i = 0; i < data.length; i++) {
                    SoatraficAll.series[i].update({
                        name: data[i].label,
                        data: data[i].data,
                        color: color[i],
                        lineWidth: 2.5
                    });
                }
                SoatraficAll.redraw();

            }
        })
    }

    function people(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/people'); ?>',
            type: 'POST',
            data: {
                area_fills: areas,
                year_fil: years,
                month_fil: months,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                // document.getElementById("totalPeople").style.display = "block";
            },
            complete: function() {
                // document.getElementById("totalPeople").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)
                peopleTotal.text(json[0].total_people)
            }
        });
    }

    function vehicle(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/vehicle'); ?>',
            type: 'POST',
            data: {
                area_fills: areas,
                year_fil: years,
                month_fil: months,
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("totalVehicle").style.display = "block";
            },
            complete: function() {
                // document.getElementById("totalVehicle").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)

                vehicleTotal.text(json[0].total)
            }
        });
    }

    function material(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/material'); ?>',
            type: 'POST',
            data: {
                area_fills: areas,
                year_fil: years,
                month_fil: months,
            },
            cache: false,
            beforeSend: function() {
                // document.getElementById("totalDocument").style.display = "block";
            },
            complete: function() {
                // document.getElementById("totalDocument").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)

                materialTotal.text(json[0].total)
            }
        });
    }

    // ALL CHART WHEN UPDATE FILTER //
    $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
        var area = $("#areaFilter").val()
        var year = $("#yearFilter").val()
        var month = $("#monthFilter").val()
        var field = [
            areas = $("#areaFilter").val(),
            years = $("#yearFilter").val(),
            months = $("#monthFilter").val()
        ];

        // SOA
        SoaFtraficAll(field)
        people(field)
        vehicle(field)
        material(field)

        // SOI Deskripsi
        if (year == '2022' && month.length == 0) {
            $('#isoDesc').show()
        } else {
            $('#isoDesc').hide()
        }
        $.ajax({
            url: '<?= site_url('analitic/srs/dashboard/grap_srs'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
                is_make_code: 1, // menggunakan kode sebagai ID
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

                // SOI //
                var dataSrs = [{
                    r: 8,
                    x: parseFloat(json.data_soi[0].avg_soi),
                    y: parseFloat(json.data_index[0].max_iso)
                }];

                soiChart.data.datasets[0].data = dataSrs;
                soiChart.update();

                // INDEX BG SOI //
                const dataX = json.data_soi[0].avg_soi;
                const dataY = json.data_index[0].max_iso;

                if ((dataX <= 4 && dataY <= 2) || (dataX >= 4 && dataY >= 2)) {
                    $('#indexSoi').attr('style', 'background-color: rgb(233 233 9 / 69%)') // yellow
                }

                if (dataX >= 4 && dataY <= 2) {
                    $('#indexSoi').attr('style', 'background-color: rgb(0 128 9 / 69%)') // green
                }

                if (dataX <= 4 && dataY >= 2) {
                    $('#indexSoi').attr('style', 'background-color: rgb(255 0 9 / 69%)') // red
                }
                // INDEX BG SOI //

                // SOI AVG PILAR //
                $('#avgPeople, #avgSystem, #avgDevice, #avgNetwork').text('')
                $('#avgPeople').text(json.grap_soi_avgpilar[0].avg_people)
                $('#avgSystem').text(json.grap_soi_avgpilar[0].avg_system)
                $('#avgDevice').text(json.grap_soi_avgpilar[0].avg_device)
                $('#avgNetwork').text(json.grap_soi_avgpilar[0].avg_network)
                // SOI AVG PILAR //
                // SOI //

                // RISK SOURCE //
                dataRiskSource = json.data_risk_source;
                setRiskSource = [{
                    label: dataRiskSource.map(function(v) {
                        return v.label
                    }),
                    data: dataRiskSource.map(function(v) {
                        return v.data
                    })
                }];
                rsoChart.data.datasets[0].data = setRiskSource[0].data;
                rsoChart.data.labels = setRiskSource[0].label
                rsoChart.update();
                // RISK SOURCE //

                // RISK //
                dataRisk = json.data_risk;
                setRisk = [{
                    label: dataRisk.map(function(v) {
                        return v.label
                    }),
                    data: dataRisk.map(function(v) {
                        return v.data
                    })
                }];
                riskChart.data.labels = setRisk[0].label
                riskChart.data.datasets[0].data = setRisk[0].data
                riskChart.update();
                // RISK //

                // TARGET ASSETS //
                dataAssets = json.data_target_assets;
                datasetsAssets = [{
                    label: dataAssets.map(function(v) {
                        return v.label
                    }),
                    data: dataAssets.map(function(v) {
                        return v.data
                    })
                }];
                assetChart.data.datasets[0].data = datasetsAssets[0].data;
                assetChart.data.labels = datasetsAssets[0].label
                assetChart.update();
                // TARGET ASSETS //

                // GRAFIS ALL PLANT //
                // resAreaPolar = json.data_trans_area;
                // dataAreaPolar = [{
                //     label: resAreaPolar.map(function(v){return v.label}),
                //     data: resAreaPolar.map(function(v){return v.total})
                // }];
                // dougnutChartPlant.data.labels = dataAreaPolar[0].label;
                // dougnutChartPlant.data.datasets[0].data = dataAreaPolar[0].data;
                // dougnutChartPlant.update();
                // dougnutChartPlant.data.datasets[0].data = json.data_trans_area;
                // dougnutChartPlant.update();
                // GRAFIS ALL PLANT //

                // GRAFIS LINE ALL MONTH //
                srsPerMonthLineChart.data.datasets[0].data = json.data_trans_month;
                srsPerMonthLineChart.update();
                // GRAFIS LINE ALL MONTH //

                // GRAFIS DOUGHNUT PER MONTH //
                srsPerMonthDoughChart.data.datasets[0].dataDUmmy = json.data_trans_month;
                srsPerMonthDoughChart.update();
                // GRAFIS DOUGHNUT PER MONTH //
            }
        });
    });
</script>