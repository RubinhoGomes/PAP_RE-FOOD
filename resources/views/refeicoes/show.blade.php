@extends('layouts.outer');

@section('content')

<?php $valoresRefG[] = 0;$valoresBenG[] = 0;$valoresAssRG[] = 0;$valoresAssPeBG[] = 0;$valoresAlimSG[] = 0;?>
@for ($i = 1; $i <= 12; $i++)
    <?php
        foreach ($refeicoesG as $r ) {
            if(isset($_POST['ano']) && $r->mes == $i){

                if(empty($valoresRefG[$i])){
                    $valoresRefG[$i] = floor($r->kgBenefeciarios);
                } else if(!empty($valoresRefG[$i])){
                    $valoresRefG[$i] += floor($r->kgBenefeciarios);
                }

                if(empty($valoresBenG[$i])){
                    $valoresBenG[$i] = $r->kgBenefeciarios;
                } else if(!empty($valoresBenG[$i])){
                    $valoresBenG[$i] += $r->kgBenefeciarios;
                }

                if(empty($valoresAssRG[$i])){
                    $valoresAssRG[$i] = $r->kgAssociacoes;
                } else if(!empty($valoresAssRG[$i])){
                    $valoresAssRG[$i] += $r->kgAssociacoes;
                }

                if(empty($valoresAssPeBG[$i])){
                    $valoresAssPeBG[$i] = $r->kg2Associacoes;
                } else if(!empty($valoresAssPeBG[$i])){
                    $valoresAssPeBG[$i] += $r->kg2Associacoes;
                }

                if(empty($valoresAlimSG[$i])){
                    $valoresAlimSG[$i] = $r->kgBenefeciarios + $r->kgAssociacoes + $r->kg2Associacoes;
                } else if(!empty($valoresAlimSG[$i])){
                    $valoresAlimSG[$i] += $r->kgBenefeciarios + $r->kgAssociacoes + $r->kg2Associacoes;
                }

            }
            if(!isset($_POST['ano']) && $r->mes == $i){
                if(empty($valoresRefG[$i])){
                    $valoresRefG[$i] = floor($r->kgBenefeciarios);
                } else if(!empty($valoresRefG[$i])){
                    $valoresRefG[$i] += floor($r->kgBenefeciarios);
                }

                if(empty($valoresBenG[$i])){
                    $valoresBenG[$i] = $r->kgBenefeciarios;
                } else if(!empty($valoresBenG[$i])){
                    $valoresBenG[$i] += $r->kgBenefeciarios;
                }

                if(empty($valoresAssRG[$i])){
                    $valoresAssRG[$i] = $r->kgAssociacoes;
                } else if(!empty($valoresAssRG[$i])){
                    $valoresAssRG[$i] += $r->kgAssociacoes;
                }

                if(empty($valoresAssPeBG[$i])){
                    $valoresAssPeBG[$i] = $r->kg2Associacoes;
                } else if(!empty($valoresAssPeBG[$i])){
                    $valoresAssPeBG[$i] += $r->kg2Associacoes;
                }

                if(empty($valoresAlimSG[$i])){
                    $valoresAlimSG[$i] = $r->kgBenefeciarios + $r->kgAssociacoes + $r->kg2Associacoes;
                } else if(!empty($valoresAlimSG[$i])){
                    $valoresAlimSG[$i] += $r->kgBenefeciarios + $r->kgAssociacoes + $r->kg2Associacoes;
                }
            }
            if($r->mes != $i && empty($valoresRefG[$i])){
                $valoresRefG[$i] = 0;
            }
            if($r->mes != $i && empty($valoresBenG[$i])){
                $valoresBenG[$i] = 0;
            }
            if($r->mes != $i && empty($valoresAssRG[$i])){
                $valoresAssRG[$i] = 0;
            }
            if($r->mes != $i && empty($valoresAssPeBG[$i])){
                $valoresAssPeBG[$i] = 0;
            }
            if($r->mes != $i && empty($valoresAlimSG[$i])){
                $valoresAlimSG[$i] = 0;
            }
        }
    ?>
@endfor
<?php array_shift($valoresRefG); array_shift($valoresBenG); array_shift($valoresAssRG); array_shift($valoresAssPeBG); array_shift($valoresAlimSG);?>

<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Refeições') }}</h4>
                    <div class="row">
                        <div class="col-lg-2">
                            <form role="form" method="post" action="/refeicoes/show" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <label for="mes" class="font-weight-bold h6">Escolha um mês:</label>
                                </div>

                                <div class="">
                                    <select name="mes" id="mes" class="form-select form-select-sm text-center">
                                        @for ($i = 1; $i <= 12; $i++)

                                        @if ($i == date('m') - 1)
                                            <option value="{{ $i }}" selected>{{ $i }}</option>
                                        @else
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endif
                                        @endfor
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-primary mt-xl-2" name="btnPesquisar">Pesquisar</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total de Refeições Doadas</p>
                                    <?php $valorRef = 0;?>
                                    <h4 class="mb-0"> @foreach ($refeicoes as $r)
                                        <?php  $valorRef += floor($r->kgBenefeciarios)?>
                                        @endforeach
                                        {{ $valorRef }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                                    </span>than lask month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Kg doados aos beneficiarios</p>
                                    <?php $valorBen = 0;?>
                                    <h4 class="mb-0"> @foreach ($refeicoes as $r)
                                        <?php  $valorBen += ($r->kgBenefeciarios)?>
                                        @endforeach
                                        {{ $valorBen }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mt-xl-2 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Kg de Pão e Bolos Doados as Associações</p>
                                    <?php $valorAssPeB = 0;?>
                                    <h4 class="mb-0"> @foreach ($refeicoes as $r)
                                        <?php  $valorAssPeB += ($r->kg2Associacoes)?>
                                        @endforeach
                                        {{ $valorAssPeB }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55%
                                    </span>than lask week</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mt-xl-2 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Kg de Refeições Doados as Associaçoes</p>
                                    <?php $valorAssR = 0;?>
                                    <h4 class="mb-0"> @foreach ($refeicoes as $r)
                                        <?php  $valorAssR+= ($r->kgAssociacoes)?>
                                        @endforeach
                                        {{ $valorAssR }}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total Kg Salvos do Lixo</p>
                                    <?php $totalKg = 0;?>
                                    <h4 class="mb-0"> @foreach ($refeicoes as $r)
                                    <?php $totalKg += ($refeicoes->first()->kgBenefeciarios + $refeicoes->first()->kgAssociacoes + $refeicoes->first()->kg2Associacoes )?>
                                    @endforeach
                                    {{ $totalKg}}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <form role="form" method="post" action="/refeicoes/show" enctype="multipart/form-data">
                    {{ csrf_field() }} {{ method_field('POST') }}
                    <div class="row">
                        <p class="text-center mt-xl-4 mb-xl-4 h4">Consulte os dados anuais</p>
                        <div class="col-sm-1 text-center">
                                <div class="mt-2 ml-2">
                                    <label for="ano" class="font-weight-bold h6">Ano: </label>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <div class="form-group">
                                    <select class="form-control text-center" name="ano" id="ano">
                                    <option value="DO" selected="selected" disabled>Selecionar Ano</option>
                                    @for ($i = 2016; $i <= date("Y"); $i++)
                                    @if ($i == date('Y') - 1)
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                    @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endif
                                    @endfor
                                    </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <input class="btn btn-primary" type="submit" name="submit" value="Visualizar grafico">
                        </div>
                    </div>
                </form>


            <div class="row">

                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-Refeicoes" class="chart-canvas" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Refeições </h6>
                            <p class="text-sm "> Comida doada (Em Numero de Refeições)</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-Ben" class="chart-canvas" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Beneficiarios </h6>
                            <p class="text-sm "> Comida doada (Em Quilogramas)</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-AssR" class="chart-canvas" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Associações (Refeições) </h6>
                            <p class="text-sm "> Comida doada (Em Quilogramas)</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2  ">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <div class="chart">
                                    <canvas id="chart-AssPeB" class="chart-canvas" height="250"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 class="mb-0 "> Associações (Pão e Bolos) </h6>
                            <p class="text-sm "> Comida doada (Em Quilogramas)</p>
                        </div>
                    </div>
                </div>
            </div>



        <div class="row">

            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-AlimS" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Comida Salva do Lixo </h6>
                        <p class="text-sm "> Comida salva (Em Quilogramas)</p>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
</div>

<script src="/assets/js/plugins/chartjs.min.js"></script>

<script>
    var ref = document.getElementById("chart-Refeicoes").getContext("2d");

    new Chart(ref, {
        type: "bar",
        data: {
            labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
            datasets: [{
                label: "Sales",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "rgba(255, 255, 255, .8)",
                data: [<?php echo join(',', $valoresRefG); ?>],
                maxBarThickness: 6
            }, ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                        color: "#fff"
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });

    var Ben = document.getElementById("chart-Ben").getContext("2d");

    new Chart(Ben, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [<?php echo join(',', $valoresBenG); ?>],
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#f8f9fa',
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

var AssR = document.getElementById("chart-AssR").getContext("2d");

new Chart(AssR, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [<?php echo join(',', $valoresAssRG); ?>],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

var AssPeB = document.getElementById("chart-AssPeB").getContext("2d");

    new Chart(AssPeB, {
    type: "line",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Mobile apps",
            tension: 0,
            borderWidth: 0,
            pointRadius: 5,
            pointBackgroundColor: "rgba(255, 255, 255, .8)",
            pointBorderColor: "transparent",
            borderColor: "rgba(255, 255, 255, .8)",
            borderWidth: 4,
            backgroundColor: "transparent",
            fill: true,
            data: [<?php echo join(',', $valoresAssPeBG); ?>],
            maxBarThickness: 6

        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    padding: 10,
                    color: '#f8f9fa',
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: false,
                    drawOnChartArea: false,
                    drawTicks: false,
                    borderDash: [5, 5]
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

var AlimS = document.getElementById("chart-AlimS").getContext("2d");

new Chart(AlimS, {
    type: "bar",
    data: {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Sales",
            tension: 0.4,
            borderWidth: 0,
            borderRadius: 4,
            borderSkipped: false,
            backgroundColor: "rgba(255, 255, 255, .8)",
            data: [<?php echo join(',', $valoresAlimSG); ?>],
            maxBarThickness: 6
        }, ],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false,
            }
        },
        interaction: {
            intersect: false,
            mode: 'index',
        },
        scales: {
            y: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    suggestedMin: 0,
                    suggestedMax: 500,
                    beginAtZero: true,
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                    color: "#fff"
                },
            },
            x: {
                grid: {
                    drawBorder: false,
                    display: true,
                    drawOnChartArea: true,
                    drawTicks: false,
                    borderDash: [5, 5],
                    color: 'rgba(255, 255, 255, .2)'
                },
                ticks: {
                    display: true,
                    color: '#f8f9fa',
                    padding: 10,
                    font: {
                        size: 14,
                        weight: 300,
                        family: "Roboto",
                        style: 'normal',
                        lineHeight: 2
                    },
                }
            },
        },
    },
});

</script>

@endsection
