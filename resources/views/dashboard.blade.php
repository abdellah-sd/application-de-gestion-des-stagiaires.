@extends('layouts.main')
@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            @if ( (Route::is('home')) || (Route::is('users.index')) )
            Tableau de bord
            @elseif (Route::is('responsable.dashboard'))
            Responsable
            @elseif (Route::is('employe.dashboard'))
            Employés
            @elseif (Route::is('stagiaire.dashboard'))
            Stagiaires
            @endif
        </h1>
    </div>
    <div class="row">  
        @if( (Route::is('home'))  || (Route::is('users.index')) )  
            @switch(Auth()->user()->type_user)
                @case('1')
                    @include('components.dashboards.responsables_d')
                @case('2')
                    @include('components.dashboards.employes_d')
                @case('3')
                    @include('components.dashboards.stagiaires_d')
                @default
                    @break
            @endswitch
        @elseif (Route::is('responsable.dashboard'))
            @include('components.dashboards.responsables_d')
        @elseif (Route::is('employe.dashboard'))
            @include('components.dashboards.employes_d')
        @elseif(Route::is('stagiaire.dashboard'))
            @include('components.dashboards.stagiaires_d')
        @endif
    </div>

        @if ((Route::is('home')) || (Route::is('/')) )
        
        <!-- Area Chart -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Stagiaires</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                Diagramme qui va montrer le nombre de stagiaires ajouter par mois.
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pourcentage des membres</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    Pourcentage des membres dans l'entreprise.
                </div>
            </div>
        </div>

        <!-- Donut Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pourcentage des stagiaires</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4">
                        <canvas id="myChart"></canvas>
                    </div>
                    <hr>
                    Pourcentage de l'état des stagiaires.
                </div>
            </div>
        </div>
        
    @endif



    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        var stagiaires_datas = <?php echo json_encode($stagiaires_datas ?? ''); ?>;
        function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
        }

        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");

        var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
            label: "Stagiaires",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: stagiaires_datas,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
            },
            scales: {
            xAxes: [{
                time: {
                unit: 'date'
                },
                gridLines: {
                display: false,
                drawBorder: false
                },
                ticks: {
                maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                maxTicksLimit: 5,
                padding: 10,
                // Include a dollar sign in the ticks
                callback: function(value, index, values) {
                    return number_format(value);
                }
                },
                gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
                }
            }],
            },
            legend: {
            display: false
            },
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                }
            }
            }
        }
        });

    </script>
    

    <script>
        
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';
        
        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var ct = document.getElementById("myChart");
        var nbr_stg = JSON.parse("{{ json_encode($nbr_stg ?? '') }}");
        var nbr_emp = JSON.parse("{{ json_encode($nbr_emp ?? '') }}");
        var nbr_rsp = <?php echo json_encode($nbr_rsp ?? ''); ?>;
        var nbr_stagiaire_valide = <?php echo json_encode($nbr_stagiaire_valide ?? ''); ?>;
        var nbr_stagiaire_enCours = <?php echo json_encode($nbr_stagiaire_enCours ?? ''); ?>;
        var nbr_stagiaire_refuse = <?php echo json_encode($nbr_stagiaire_refuse ?? ''); ?>;
        var myPieChart = new Chart(ctx, {
          type: 'doughnut',
          data: {
            labels: ["Stagiaires", "Utilisateur", "Responsable"],
            datasets: [{
              data: [nbr_stg, nbr_emp, nbr_rsp],
              backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
              hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });

        var myChart = new Chart(ct, {
          type: 'doughnut',
          data: {
            labels: ["Valide", "En Cours", "En Instance"],
            datasets: [{
              data: [nbr_stagiaire_valide, nbr_stagiaire_enCours, nbr_stagiaire_refuse],
              backgroundColor: ['rgb(19, 194, 19)', 'rgb(255, 251, 0)', 'rgb(202, 0, 0)'],
              hoverBackgroundColor: ['rgb(19, 194, 19)', 'rgb(255, 251, 0)', 'rgb(202, 0, 0)'],
              hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
          },
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 80,
          },
        });
    </script>


@endsection