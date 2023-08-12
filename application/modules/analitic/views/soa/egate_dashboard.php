<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">

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
                                    <span class="h3 ff-fugazone title-dashboard">E-Gate Analytic</span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card card3">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                            <div class="overlay" style="display:none" id="chartPerformanceAllPlantADM_overlay">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <div class="col-lg-12">
                                <div class="chart">
                                    <div id="egateAllPie" style="height: 380px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card3">
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                            <div class="overlay" style="display:none" id="tahunPerformance_overlay">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div class="chart">
                            <div id="egateAllLine" style="height: 380px;"></div>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                <div class="card card3">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                            <div class="overlay" style="display:none" id="chartPerformanceAllPlantADM_overlay">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div class="justify-content-center">
                            <div class="col-lg-12">
                                <div class="chart">
                                    <div id="egateLineDaily" style="height: 380px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card3">
                    <div class="card-body">
                        <div style="position: absolute;left:50%;top:50%" class="row justify-content-center loader">
                            <div class="overlay" style="display:none" id="tahunPerformance_overlay">
                                <i class="fas fa-2x fa-sync-alt fa-spin"></i>
                            </div>
                        </div>
                        <div class="chart">
                            <div id="egateDoughnut" style="height: 380px;"></div>
                        </div>
                        <!-- /.chart-responsive -->
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js" integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // var field = [
        //     area = $("#areaFilter").val(),
        //     year = $("#yearFilter").val(),
        //     month = $("#monthFilter").val(),
        // ]
        const month = [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];

        let cate = [];
        for (let i = 1; i <= 31; i++) {
            cate.push(i);
        }


        // ALL CHART WHEN UPDATE FILTER //
        $("#areaFilter, #yearFilter, #monthFilter").change(function(e) {
            // var field = [
            //     area = $("#areaFilter").val(),
            //     year = $("#yearFilter").val(),
            //     month = $("#monthFilter").val(),
            // ];
        })


        var chartAllPie = Highcharts.chart('egateAllPie', {
            chart: {
                type: 'pie',
                // options3d: {
                //     enabled: true,
                //     alpha: 45
                // },
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                size: 200,
            },
            title: {
                text: 'Ticket By Plant',
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
            credits: {
                enabled: false
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
                data: [{
                        name: 'P1',
                        y: 73
                    },
                    {
                        name: 'P2',
                        y: 12
                    },
                    {
                        name: 'P3',
                        y: 4
                    },
                    {
                        name: 'P4',
                        y: 2
                    },
                    {
                        name: 'P5',
                        y: 1
                    },
                    {
                        name: 'HO',
                        y: 4
                    }
                ]
            }]
        });


        var traficAll = Highcharts.chart('egateAllLine', {
            chart: {
                type: 'spline',
                backgroundColor: 'transparent',
                height: 380,
            },
            title: {
                text: 'Trend By Month'
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
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                data: [12, 12, 31, 4, 26, 72, 82, 51, 8, 4, 22, 23],
            }]
        });


        var traficAllLineDaily = Highcharts.chart('egateLineDaily', {
            chart: {
                type: 'spline',
                backgroundColor: 'transparent',
                height: 380,
            },
            title: {
                text: 'Trend By Daily'
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
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                data: [12, 12, 31, 4, 26, 72, 82, 51, 8, 4, 22, 23, 12, 12, 31, 4, 26, 72, 82, 51, 8, 4, 22, 23, 8, 4, 22, 23, 26, 72, 82],
            }]
        });

        var chartAllPie = Highcharts.chart('egateDoughnut', {
            chart: {
                type: 'pie',
                // options3d: {
                //     enabled: true,
                //     alpha: 45
                // },
                backgroundColor: 'transparent',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                size: 200,
            },
            title: {
                text: 'Ticket By Status',
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
            credits: {
                enabled: false
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
                data: [{
                        name: 'Scan Out',
                        y: 73,
                        color: '#43f054'
                    },
                    {
                        name: 'Pending Scan',
                        y: 12,
                        color: '#f7577c',
                    }
                ]
            }]
        });

    })
</script>