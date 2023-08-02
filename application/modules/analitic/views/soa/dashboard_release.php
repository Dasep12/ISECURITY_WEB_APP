<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
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
                                    <label for="areaFilter">Area</label>
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
                                    <span class="h3 ff-fugazone title-dashboard">Security Operational Analytic</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-ver">
                            <div class="card-body people" style="cursor:pointer">
                                <div style="position: absolute;left:50%;top:40%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="totalPeople">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div class="img">
                                    <img src="<?= base_url() ?>/assets/images/icon/soa/ancestors.png">
                                </div>
                                <div class="text">
                                    <span class="title">PEOPLE</span>
                                    <span id="peopleTotal" class="value">0</span>
                                    <span>Visit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-ver">
                            <div class="card-body vehicle" style="cursor:pointer">
                                <div style="position: absolute;left:50%;top:40%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="totalVehicle">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div class="img">
                                    <img src="<?= base_url() ?>assets/images/icon/soa/pollution.png">
                                </div>
                                <div class="text">
                                    <span class="title">VEHICLE</span>
                                    <span id="vehicleTotal" class="value">0</span>
                                    <span>Unit</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card card-ver">
                            <div class="card-body document" style="cursor:pointer">
                                <div style="position: absolute;left:50%;top:40%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="totalDocument">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div class="img">
                                    <img src="<?= base_url() ?>assets/images/icon/soa/folder.png">
                                </div>
                                <div class="text">
                                    <span class="title">DOCUMENT</span>
                                    <span id="materialTotal" class="value">0</span>
                                    <span>Document</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card people-perday" style="height: 363px;">
                    <div class="card-header">
                        <h5></h5>
                    </div>
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:40%" class="row justify-content-center loader">
                            <div class="overlay" style="display:block" id="traficAllLoader">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div id="traficAll"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card people-perday" style="height: 363px;">
                    <div class="card-header">
                        <h5 id="headerDay">Traffic people per day</h5>
                    </div>
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:40%" class="row justify-content-center loader">
                            <div class="overlay" style="display:block" id="traficdayLoader">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div id="traficDay"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-hor">
                            <div class="card-body text-center">
                                <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="trafikVehicle">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div id="vehicle"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-hor">
                            <div class="card-body text-center">
                                <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="traficpeople">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div id="people"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card card-hor">
                            <div class="card-body text-center">
                                <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                                    <div class="overlay" style="display:block" id="trafikmaterial">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                                    </div>
                                </div>
                                <div id="material"></div>
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

<script src="<?= base_url('vendor/chartjs/dist/chart.umd.js'); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-annotation/2.1.0/chartjs-plugin-annotation.min.js" integrity="sha512-1uGDhRiDlpOPrTi54rJHu3oBLizqaadZDDft+j4fVeFih6eQBeRPJuuP3JcxIqJxIjzOmRq57XwwO4FT+/owIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
<script src="<?= base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js'); ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var field = [
            area = $("#areaFilter").val(),
            year = $("#yearFilter").val(),
            month = $("#monthFilter").val(),
            peopleTotal = $("#peopleTotal"),
            vehicleTotal = $("#vehicleTotal"),
            materialTotal = $("#materialTotal"),
            employeeTotal = $("#employeeTotal"),
            visitorTotal = $("#visitorTotal"),
            bpTotal = $("#bpTotal"),
            contractorTotal = $("#contractorTotal"),
            peoplePerDay = $("#peoplePerDay"),
        ]


        let isTraffic = 'people';
        let day = [];
        let dataSet = [];
        for (let i = 1; i <= 30; i++) {
            day.push(i)
            dataSet.push({
                label: 'Label ' + i,
                fillColor: 'rgba(220,220,220,0.2)',
                strokeColor: 'rgba(220,220,220,1)',
                pointColor: 'rgba(220,220,220,1)',
                pointStrokeColor: '#fff',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                // data: JSON.parse(a)
            })
        }


        // ALL CHART WHEN UPDATE FILTER //
        $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
            var field = [
                area = $("#areaFilter").val(),
                year = $("#yearFilter").val(),
                month = $("#monthFilter").val(),
                peopleTotal = $("#peopleTotal"),
                vehicleTotal = $("#vehicleTotal"),
                materialTotal = $("#materialTotal"),
                employeeTotal = $("#employeeTotal"),
                visitorTotal = $("#visitorTotal"),
                bpTotal = $("#bpTotal"),
                contractorTotal = $("#contractorTotal"),
                peoplePerDay = $("#peoplePerDay"),
            ];

            people(field);
            peopleCategory(field);
            vehicle(field);
            material(field);
            FvehiclePie(field);
            FpiePeople(field);
            FpieMaterial(field);
            FtraficAll(field)

            if (isTraffic == 'people') {
                FpeopleCategori(field);
            } else if (isTraffic == 'vehicle') {
                FvehicleCategori(field)
            } else if (isTraffic == 'document') {
                FdocumentCategori(field)
            }


        })


        // Trafice Days Update
        $(".people").on('click', function() {
            var field = [
                year = $("#yearFilter").val(),
                month = $("#monthFilter").val(),
                area = $("#areaFilter").val(),
            ]

            isTraffic = 'people';
            FpeopleCategori(field)
        })

        $(".vehicle").on('click', function() {
            var field = [
                year = $("#yearFilter").val(),
                month = $("#monthFilter").val(),
                area = $("#areaFilter").val(),
            ]
            isTraffic = 'vehicle';
            FvehicleCategori(field)
        })

        $(".document").on('click', function() {
            var field = [
                year = $("#yearFilter").val(),
                month = $("#monthFilter").val(),
                area = $("#areaFilter").val(),
            ]
            isTraffic = 'document';
            FdocumentCategori(field)
        })

        people(field);
        peopleCategory(field);
        vehicle(field);
        material(field);
        FvehiclePie(field);
        FpiePeople(field);
        FpieMaterial(field);
        FpeopleCategori(field);
        FtraficAll(field);
    })


    function people(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/people'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("totalPeople").style.display = "block";
            },
            complete: function() {
                document.getElementById("totalPeople").style.display = "none";
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
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("totalVehicle").style.display = "block";
            },
            complete: function() {
                document.getElementById("totalVehicle").style.display = "none";
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
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("totalDocument").style.display = "block";
            },
            complete: function() {
                document.getElementById("totalDocument").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)

                materialTotal.text(json[0].total)
            }
        });
    }

    function peopleCategory(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/peopleCategory'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
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
                employeeTotal.text(json[0].total_kehadiran)
                visitorTotal.text(json[1].total_kehadiran)
                bpTotal.text(json[2].total_kehadiran)
                contractorTotal.text(json[3].total_kehadiran)
            }
        });
    }



    // function peoplePerDays(peopleCategoryDayChart, field) {
    //     $.ajax({
    //         url: '<?= site_url('analitic/soa/dashboard/peopleCategoryDayTotal'); ?>',
    //         type: 'POST',
    //         data: {
    //             area_fil: area,
    //             year_fil: year,
    //             month_fil: month,
    //         },
    //         cache: false,
    //         beforeSend: function() {
    //             // $(".lds-ring").show();
    //             // document.getElementById("loader").style.display = "block";
    //         },
    //         complete: function() {
    //             // document.getElementById("loader").style.display = "none";
    //         },
    //         success: function(res) {
    //             var json = JSON.parse(res)

    //             peopleCategoryDayChart.data.datasets = json;
    //             peopleCategoryDayChart.update()

    //             // datas = json;
    //             // setDatas = [{
    //             //     label: datas.map(function(v){return v.day_num}),
    //             //     data: datas.map(function(v){return v.total})
    //             // }];

    //             // peoplePerDayChart.data.datasets[0].data = setDatas[0].data;
    //             // peoplePerDayChart.update();

    //         }
    //     });
    // }

    var vehiclePie = Highcharts.chart('vehicle', {
        chart: {
            type: 'pie',
            // options3d: {
            //     enabled: true,
            //     alpha: 45
            // },
            backgroundColor: 'transparent',
            // size: 200,

        },
        title: {
            text: 'VEHICLE',
            align: 'center',
            useHTML: true,
            style: {
                color: '#000',
                fontWeight: 'bold',
            }
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                size: 170,
                showInLegend: true,
                depth: 30,
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    // distance: -60,
                    color: "white",
                    formatter: function() {
                        return '<b>' + Highcharts.numberFormat(this.point.y, 0, '.', ',') + '<b>';
                    }
                }
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px"></span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },
        series: [{
            data: []
        }]
    });

    function FvehiclePie(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/pieVehicle'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("trafikVehicle").style.display = "block";
            },
            complete: function() {
                document.getElementById("trafikVehicle").style.display = "none";
            },
            success: function(res) {
                // console.log(res)
                let data = JSON.parse(res);
                var seriesLength = vehiclePie.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    vehiclePie.series[i].remove();
                }
                let datas = [];
                for (let i = 0; i < data.length; i++) {
                    datas.push({
                        name: data[i].label,
                        y: parseInt(data[i].total)
                    });
                }
                vehiclePie.addSeries({
                    data: datas
                });

            }
        });
    }


    var piePeople = Highcharts.chart('people', {
        chart: {
            type: 'pie',
            // options3d: {
            //     enabled: true,
            //     alpha: 45
            // },
            backgroundColor: 'transparent',
            // size: 200,

        },
        title: {
            text: 'PEOPLE',
            align: 'center',
            useHTML: true,
            style: {
                color: '#000',
                fontWeight: 'bold',
            }
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {
                showInLegend: true,
                size: 170,
                depth: 30,
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    // distance: -60,
                    color: "white",
                    formatter: function() {
                        return '<b>' + Highcharts.numberFormat(this.point.y, 0, '.', ',') + '<b>';
                    }
                }
            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px"></span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },
        series: [{
            name: 'Medals',
            data: []
        }]
    });

    function FpiePeople(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/piePeople'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("traficpeople").style.display = "block";
            },
            complete: function() {
                document.getElementById("traficpeople").style.display = "none";
            },
            success: function(res) {
                // console.log(res);

                let data = JSON.parse(res);
                // console.log(data)
                var seriesLength = piePeople.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    piePeople.series[i].remove();
                }
                let datas = [];
                for (let i = 0; i < data.length; i++) {
                    datas.push({
                        name: data[i].title,
                        y: parseInt(data[i].total_kehadiran)
                    });
                }
                piePeople.addSeries({
                    data: datas
                });

            }
        });
    }

    var pieMaterial = Highcharts.chart('material', {
        chart: {
            type: 'pie',
            // options3d: {
            //     enabled: true,
            //     alpha: 45
            // },
            backgroundColor: 'transparent',
            size: 200,

        },
        title: {
            text: 'DOCUMENT',
            align: 'center',
            useHTML: true,
            style: {
                color: '#000',
                fontWeight: 'bold',
            }
        },
        subtitle: {
            text: '',
            align: 'left'
        },
        plotOptions: {
            pie: {

                showInLegend: true,
                size: 170,
                depth: 30,
                allowPointSelect: true,
                cursor: "pointer",
                dataLabels: {
                    enabled: true,
                    // distance: -60,
                    color: "white",
                    formatter: function() {
                        return '<b>' + Highcharts.numberFormat(this.point.y, 0, '.', ',') + '<b>';
                    }
                },

            },
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px"></span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
        },
        series: [{
            name: 'Medals',
            data: []
        }]
    });

    function FpieMaterial(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/pieMaterial'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                // $(".lds-ring").show();
                document.getElementById("trafikmaterial").style.display = "block";
            },
            complete: function() {
                document.getElementById("trafikmaterial").style.display = "none";
            },
            success: function(res) {
                // console.log(res);
                let data = JSON.parse(res);
                var seriesLength = pieMaterial.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    pieMaterial.series[i].remove();
                }
                let datas = [];
                for (let i = 0; i < data.length; i++) {
                    datas.push({
                        name: data[i].title,
                        // y: data[i].total
                        y: parseInt(data[i].total)
                    });
                }
                pieMaterial.addSeries({
                    data: datas
                });

            }
        });
    }


    let cate = [];
    for (let i = 1; i <= 31; i++) {
        cate.push(i);
    }

    var traficLine = Highcharts.chart('traficDay', {
        chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 320,
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: cate
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        legend: {
            itemStyle: {
                color: '#000000',
                fontWeight: 'bold'
            }
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
        series: [{
            name: 'Business Partner',
            data: [],
        }, {
            name: 'Contractor',
            data: [],
        }, {
            name: 'Visitor',
            data: [],
        }]
    });


    // trafic people
    function FpeopleCategori(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/peopleCategoryDayTotal'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("traficdayLoader").style.display = "block";
            },
            complete: function() {
                document.getElementById("traficdayLoader").style.display = "none";
            },
            success: function(res) {
                var seriesLength = traficLine.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    traficLine.series[i].remove();
                }

                document.getElementById("headerDay").innerHTML = "Traffic People";
                let data = JSON.parse(res);
                let datas = [];
                for (let i = 0; i < data.length; i++) {
                    traficLine.addSeries({
                        name: data[i].label,
                        data: []
                    });
                    traficLine.series[i].update({
                        data: data[i].data,
                        name: data[i].label,
                        lineWidth: 2.5
                    });
                }

            }
        });
    }

    // trafic vehicle
    function FvehicleCategori(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/vehicleCategoryDayTotal'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("traficdayLoader").style.display = "block";
            },
            complete: function() {
                document.getElementById("traficdayLoader").style.display = "none";
            },
            success: function(res) {
                var seriesLength = traficLine.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    traficLine.series[i].remove();
                }
                document.getElementById("headerDay").innerHTML = "Traffic Vehicle";
                let data = JSON.parse(res);
                let datas = [];
                for (let i = 0; i < data.length; i++) {

                    traficLine.addSeries({
                        name: data[i].label,
                        data: []
                    });
                    traficLine.series[i].update({
                        data: data[i].data,
                        name: data[i].label,
                        lineWidth: 2.5
                    });
                }
            }
        });
    }

    // trafic document
    function FdocumentCategori(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard/documentCategoryDayTotal'); ?>',
            type: 'POST',
            data: {
                area_fil: area,
                year_fil: year,
                month_fil: month,
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("traficdayLoader").style.display = "block";
            },
            complete: function() {
                document.getElementById("traficdayLoader").style.display = "none";
            },
            success: function(res) {

                let data = JSON.parse(res);
                var seriesLength = traficLine.series.length;
                for (var i = seriesLength - 1; i > -1; i--) {
                    traficLine.series[i].remove();
                }

                document.getElementById("headerDay").innerHTML = "Traffic Document";
                let datas = [];
                for (let i = 0; i < data.length; i++) {
                    traficLine.addSeries({
                        name: data[i].label,
                        data: []
                    });
                    traficLine.series[i].update({
                        data: data[i].data,
                        name: data[i].label,
                        lineWidth: 2.5
                    });
                }
            }
        });
    }


    var traficAll = Highcharts.chart('traficAll', {
        chart: {
            type: 'spline',
            backgroundColor: 'transparent',
            height: 320,
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        legend: {
            itemStyle: {
                color: '#000000',
                fontWeight: 'bold'
            }
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

    function FtraficAll(field) {
        $.ajax({
            url: "<?= base_url('analitic/soa/dashboard/grapichSetahun') ?>",
            method: "POST",
            data: {
                year: year,
                plant: area
            },
            cache: false,
            beforeSend: function() {
                document.getElementById("traficAllLoader").style.display = "block";
            },
            complete: function() {
                document.getElementById("traficAllLoader").style.display = "none";
            },
            success: function(e) {
                let data = JSON.parse(e);
                console.log(e)
                let color = ["#bf061e", "#10d5eb", "#c9c016"];
                for (let i = 0; i < data.length; i++) {
                    traficAll.series[i].update({
                        name: data[i].label,
                        data: data[i].data,
                        color: color[i],
                        lineWidth: 2.5
                    });
                }
            }
        })
    }
</script>