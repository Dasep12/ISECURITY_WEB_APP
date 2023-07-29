

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

                                <!-- <div class="form-group col d-flex align-items-end justify-content-end">
                                    <span class="h1 ff-fugazone title-dashboard">SOA_Dashboard</span>
                                </div> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-ver">
                            <div class="card-body">
                                <div class="img">
                                    <img src="../../assets/images/icon/soa/people.png" >
                                </div>
                                <div class="text">
                                    <span class="title">Employee ACM</span>
                                    <span id="employeeAcm" class="value">0</span>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card people-perday" style="height: 330px;">
                            <div class="card-header">
                                <h5>Traffic per month</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="peoplePerDay"></canvas>
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
<script src="<?=base_url('vendor/chartjs/dist/chartjs-plugin-labels.min.js');?>"></script>

<script type="text/javascript">

    $( document ).ready(function() {
       var field = [
            area = $("#areaFilter").val(),
            year = $("#yearFilter").val(),
            month = $("#monthFilter").val(),
            employeeAcm = $("#employeeAcm"),
            vehicleTotal = $("#vehicleTotal"),
            materialTotal = $("#materialTotal"),
            employeeTotal = $("#employeeTotal"),
            visitorTotal = $("#visitorTotal"),
            bpTotal = $("#bpTotal"),
            contractorTotal = $("#contractorTotal"),
            peoplePerDay = $("#peoplePerDay"),
        ]

        // GRAP PEOPLE PER DAY //
        var peoplePerDayId = peoplePerDay[0].getContext('2d');
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
                pointHighlightStroke:
                    'rgba(220,220,220,1)',
                // data: JSON.parse(a)
            })
        }
        var peopleCategoryDayChart = new Chart(peoplePerDayId, {
            type: 'line',
            data: {
                labels: day,
                // datasets: dataSet,
                datasets: [
                    {
                      label: 'Employee',
                      borderColor: "rgba(0, 176, 80, 1)",
                      backgroundColor: "rgba(0, 176, 80, 1)",
                    },
                    {
                      label: 'Visitor',
                      borderColor: "rgba(0, 176, 240, 1)",
                      backgroundColor: "rgba(0, 176, 240, 1)",
                    },
                    {
                      label: 'Business Partner',
                      borderColor:  "rgba(255, 0, 0, 1)",
                      backgroundColor:  "rgba(255, 0, 0, 1)",
                    },
                    {
                      label: 'contractor',
                      borderColor: "rgba(112, 48, 160, 1)",
                      backgroundColor: "rgba(112, 48, 160, 1)",
                    },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                    }
                },
            },
        });
        // GRAP PEOPLE PER DAY //

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
            ]

            people(field);
            peopleCategory(field);
            vehicle(field);
            peoplePerDays(peopleCategoryDayChart,field);
            material(field);
        })

        employeeAcmTotal(field);
        peopleCategory(field);
        vehicle(field);
        peoplePerDays(peopleCategoryDayChart,field);
    })

    function employeeAcmTotal(field) {
        $.ajax({
            url: '<?= site_url('analitic/soa/dashboard_acm/employeeAcmTotal'); ?>',
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
                
                employeeAcm.text(json[0].total)
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
                // document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)

                vehicleTotal.text(json[0].total)
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

    function peoplePerDays(peopleCategoryDayChart, field) {
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
                // $(".lds-ring").show();
                // document.getElementById("loader").style.display = "block";
            },
            complete: function() {
                // document.getElementById("loader").style.display = "none";
            },
            success: function(res) {
                var json = JSON.parse(res)

                peopleCategoryDayChart.data.datasets = json;
                peopleCategoryDayChart.update()

                // datas = json;
                // setDatas = [{
                //     label: datas.map(function(v){return v.day_num}),
                //     data: datas.map(function(v){return v.total})
                // }];

                // peoplePerDayChart.data.datasets[0].data = setDatas[0].data;
                // peoplePerDayChart.update();

            }
        });
    }
</script>