@extends('layouts.outer');

@section('content')

<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Despesas') }}</h4>
                    <div class="row">
                        <div class="form-group col-md-3">
                                <p>Mês: {{ $despesas->first()->mes }}/{{ $despesas->first()->ano }}</p>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Total das despesas</p>
                                    <h4 class="mb-0">
                                    {{ ($despesas->first()->rendas + $despesas->first()->eletrecidade + $despesas->first()->agua + $despesas->first()->consumiveis + $despesas->first()->manutencao + $despesas->first()->equipamentos + $despesas->first()->outras)}}</h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3%
                                    </span>than lask month</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa da Eletrecidade</p>
                                    <h4 class="mb-0">
                                        {{ $despesas->first()->eletrecidade }}
                                    </h4>
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa da Agua</p>
                                    <h4 class="mb-0">
                                        {{ $despesas->first()->agua }}
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa da Manutenção</p>
                                    <h4 class="mb-0">
                                    {{ $despesas->first()->manutencao }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa dos Consumiveis</p>
                                    <h4 class="mb-0">
                                        {{ $despesas->first()->consumiveis }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                        </div>
                    </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa da Equipamentos</p>
                                    <h4 class="mb-0">
                                    {{ $despesas->first()->equipamentos }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Despesa da Renda</p>
                                    <h4 class="mb-0">
                                    {{ $despesas->first()->rendas }}
                                </div>
                            </div>
                            <hr class="dark horizontal my-0">
                            <div class="card-footer p-3">
                                {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5%
                                    </span>than yesterday</p> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 pt-2">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Outras Despesas</p>
                                    <h4 class="mb-0">
                                    {{ $despesas->first()->outras }}
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
                <form role="form" method="post" action="/despesas/despesas" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-1">
                            <div class="mt-2 ml-2">
                                <label for="ano">Ano: </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control select2" name="ano" id="ano" style="width: 100%;">
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
            </div>
        </div>
    </div>
</div>

@endsection
