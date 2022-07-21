@extends('layouts.outer')

@section('content')
<?php $valoresBen[] = 0; $valoresFam[] = 0; $valoresVol[] = 0; $valoresFontA[] = 0; $valoresParcS[] = 0; $valoresAssP[] = 0; ?>
@for ($i = 1; $i <= 12; $i++)
    <?php
        foreach ($geralG as $g ) {
            if(isset($_POST['ano']) && $g->mes == $i){

                if(empty($valoresBen[$i])){
                    $valoresBen[$i] = $g->numBeneficiarios;
                } else if(!empty($valoresBen[$i])){
                    $valoresBen[$i] += $g->numBeneficiarios;
                }

                if(empty($valoresFam[$i])){
                    $valoresFam[$i] = $g->numFamilias;
                } else if(!empty($valoresFam[$i])){
                    $valoresFam[$i] += $g->numFamilias;
                }

                if(empty($valoresVol[$i])){
                    $valoresVol[$i] = $g->numVoluntarios;
                } else if(!empty($valoresVol[$i])){
                    $valoresVol[$i] += $g->numVoluntarios;
                }

                if(empty($valoresFontA[$i])){
                    $valoresFontA[$i] = $g->numFontesAlimentos;
                } else if(!empty($valoresFontA[$i])){
                    $valoresFontA[$i] += $g->numFontesAlimentos;
                }

                if(empty($valoresParcS[$i])){
                    $valoresParcS[$i] = $g->numParceirosSociais;
                } else if(!empty($valoresParcS[$i])){
                    $valoresParcS[$i] += $g->numParceirosSociais;
                }

                if(empty($valoresAssP[$i])){
                    $valoresAssP[$i] = $g->numAssociacoesParceiras;
                } else if(!empty($valoresAssP[$i])){
                    $valoresAssP[$i] += $g->numAssociacoesParceiras;
                }

            }
            if(!isset($_POST['ano']) && $g->mes == $i){
                if(empty($valoresBen[$i])){
                    $valoresBen[$i] = $g->numBeneficiarios;
                } else if(!empty($valoresBen[$i])){
                    $valoresBen[$i] += $g->numBeneficiarios;
                }

                if(empty($valoresFam[$i])){
                    $valoresFam[$i] = $g->numFamilias;
                } else if(!empty($valoresFam[$i])){
                    $valoresFam[$i] += $g->numFamilias;
                }

                if(empty($valoresVol[$i])){
                    $valoresVol[$i] = $g->numVoluntarios;
                } else if(!empty($valoresVol[$i])){
                    $valoresVol[$i] += $g->numVoluntarios;
                }

                if(empty($valoresFontA[$i])){
                    $valoresFontA[$i] = $g->numFontesAlimentos;
                } else if(!empty($valoresFontA[$i])){
                    $valoresFontA[$i] += $g->numFontesAlimentos;
                }

                if(empty($valoresParcS[$i])){
                    $valoresParcS[$i] = $g->numParceirosSociais;
                } else if(!empty($valoresParcS[$i])){
                    $valoresParcS[$i] += $g->numParceirosSociais;
                }

                if(empty($valoresAssP[$i])){
                    $valoresAssP[$i] = $g->numAssociacoesParceiras;
                } else if(!empty($valoresAssP[$i])){
                    $valoresAssP[$i] += $g->numAssociacoesParceiras;
                }
            }
            if($g->mes != $i && empty($valoresBen[$i])){
                    $valoresBen[$i] = 0;
            }
            if($g->mes != $i && empty($valoresFam[$i])){
                $valoresFam[$i] = 0;
            }
            if($g->mes != $i && empty($valoresVol[$i])){
                $valoresVol[$i] = 0;
            }
            if($g->mes != $i && empty($valoresFontA[$i])){
                $valoresFontA[$i] = 0;
            }
            if($g->mes != $i && empty($valoresParcS[$i])){
                $valoresParcS[$i] = 0;
            }
            if($g->mes != $i && empty($valoresAssP[$i])){
                $valoresAssP[$i] = 0;
            }
        }
    ?>
@endfor
<?php array_shift($valoresBen); array_shift($valoresFam); array_shift($valoresVol); array_shift($valoresFontA); array_shift($valoresParcS); array_shift($valoresAssP);?>

<div class="container-fluid py-4">
        <h4 class="text-center">
            Visão Geral
        </h4>
        <div class="row mt-2 mb-2">
            <div class="form-group">
                    <div class="col-lg-2">
                        <form role="form" method="post" action="/" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <label for="mes" class="font-weight-bold h6">Escolha um mês:</label>
                            </div>

                            <div class="">
                                <select name="mes" id="mes" class="form-select form-select-sm">
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
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-user"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Beneficiários</p>
                            <?php $valorBenef = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorBenef += $gerals->numBeneficiarios?>
                                @endforeach
                                {{ $valorBenef }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                            </span>than lask month</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Famílias</p>
                            <?php $valorFam = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorFam += $gerals->numFamilias?>
                                @endforeach
                                {{ $valorFam }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span>
                            than yesterday</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-home"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Voluntários</p>
                            <?php $valorAssoc = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorAssoc += $gerals->numVoluntarios?>
                                @endforeach
                                {{ $valorAssoc }}
                            </h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55%
                            </span>than lask week</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 pt-2">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-apple-alt"></i>
                        </div>
                        <div class="text-end offset-3 pt-1">
                            <p class="text-lg mb-0 text-capitalize">Fontes de Alimentos</p>
                            <?php $valorFontesA = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorFontesA += $gerals->numFontesAlimentos?>
                                @endforeach
                                {{ $valorFontesA }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                            </span>than yesterday</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mt-xl-2 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-lg mb-0 text-capitalize">Parceiros Sociais</p>
                            <?php $valorParcS = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorParcS += $gerals->numParceirosSociais?>
                                @endforeach
                                {{ $valorParcS }}</h4>
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                            </span>than yesterday</p> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 pt-2">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fa fa-handshake"></i>
                        </div>
                        <div class="text-end offset-3 pt-1">
                            <p class="text-lg mb-0 text-capitalize">Associações Parceiras</p>
                            <?php $valorAssocP = 0;?>
                            <h4 class="mb-0"> @foreach ($geral as $gerals)
                                <?php  $valorAssocP += $gerals->numAssociacoesParceiras?>
                                @endforeach
                                {{ $valorAssocP }}</h4>
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

        <form role="form" method="post" action="/" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-1">
                    <div class="mt-2 ml-2">
                        <label for="ano">Ano: </label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <select class="form-control form-select" name="ano" id="ano" style="width: 100%;">
                        <option value="DO" selected="selected" disabled>Selecione um Ano</option>
                        @for ($i = 2016; $i <= date("Y"); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor ($rotas as $rota)
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
                                <canvas id="chart-Ben" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Beneficiarios </h6>
                        <p class="text-sm "> Numero de viagens</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Fam" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Familias </h6>
                        <p class="text-sm "> Numero de viagens</p>
                    </div>
                </div>
            </div>


        <div class="row">
            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-Vol" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Voluntarios </h6>
                        <p class="text-sm "> Numero de viagens</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-FontA" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Fontes de Alimentos </h6>
                        <p class="text-sm "> Numero de viagens</p>
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
                                <canvas id="chart-ParcS" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Parceiros Socias </h6>
                        <p class="text-sm "> Numero de viagens</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="chart-AssP" class="chart-canvas" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Associações Parceiras </h6>
                        <p class="text-sm "> Numero de viagens</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        {{-- <div class="row mt-4">
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="donativos-comida" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Donativos</h6>
                        <p class="text-sm "> Comida não perecível (Quantidade em Refeições) </p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> campaign sent 2 days ago </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-4 mb-4">
                <div class="card z-index-2  ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="donativos-kg" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 "> Donativos </h6>
                        <p class="text-sm "> Comida perecível (Em Kilogramas)</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm"> updated 4 min ago </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mb-3">
                <div class="card z-index-2 ">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                        <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
                            <div class="chart">
                                <canvas id="rotas-km" class="chart-canvas" height="170"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="mb-0 ">Rotas</h6>
                        <p class="text-sm ">Kilometros percoridos</p>
                        <hr class="dark horizontal">
                        <div class="d-flex ">
                            <i class="material-icons text-sm my-auto me-1">schedule</i>
                            <p class="mb-0 text-sm">just updated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- Scripts dos graficos -->

        <script src="/assets/js/plugins/chartjs.min.js"></script>
        <script>

var Ben = document.getElementById("chart-Ben").getContext("2d");

new Chart(Ben, {
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
            data: [<?php echo join(',', $valoresBen); ?>],
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

var Fam = document.getElementById("chart-Fam").getContext("2d");

new Chart(Fam, {
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
        data: [<?php echo join(',', $valoresFam); ?>],
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

var Vol = document.getElementById("chart-Vol").getContext("2d");

new Chart(Vol, {
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
        data: [<?php echo join(',', $valoresVol); ?>],
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

var FontA = document.getElementById("chart-FontA").getContext("2d");

new Chart(FontA, {
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
        data: [<?php echo join(',', $valoresFontA); ?>],
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

var ParcS = document.getElementById("chart-ParcS").getContext("2d");

new Chart(ParcS, {
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
        data: [<?php echo join(',', $valoresParcS); ?>],
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

var AssP = document.getElementById("chart-AssP").getContext("2d");

new Chart(AssP, {
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
        data: [<?php echo join(',', $valoresAssP); ?>],
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

        </script>

    <!-- End Script -->

    @endsection
