@extends('layouts.outer');

@section('content')

<div class="container">
    <div class="rowjustify-content-center ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">{{ __('Donativos') }}</h4>
                        <div class="row">
                            <div class="col-md-1">
                                <label for="mes">Mês: </label>
                            </div>
                        <div class="form-group col-md-3">
                            <select class="form-control select2" name="mes" id="mes" style="width: 100%;">
                            <option value="DO" selected="selected" disabled>Selecione um mês</option>
                            @foreach ($donativos as $donativo)
                            @if ($donativo->first()->id == $donativo->id)

                                <option value="{{ $donativo->id }}" selected>{{ $donativo->mes }}-{{ $donativo->ano }}</option>

                            @else

                                <option value="{{ $donativo->id }}">{{ $donativo->mes }}-{{ $donativo->ano }}</option>

                            @endif
                        @endforeach
                            </select>
                            @error('mes')
                            <p class="text-danger">{{ $errors->mes }} </p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos Donativos monetários</p>
                                    <h4 class="mb-0">
                                    {{ floor($donativos->first()->valorDinheiro) }}</h4>
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
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos donativos em alimentos não Perecíveis</p>
                                    <h4 class="mb-0">
                                        {{ $donativos->first()->valorNaoPerciveis  }}
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
                                <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fas fa-truck"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Valor dos donativos em consumíveis</p>
                                    <h4 class="mb-0">
                                        {{ $donativos->first()->valorConsumiveis }}
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
                </div>
                <form role="form" method="post" action="/donativos/donativos" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-1">
                            <label for="ano">Ano: </label>
                        </div>
                        <div class="form-group col-md-2">
                        <select class="form-control select2" name="ano" id="ano" style="width: 100%;">
                        <option value="DO" selected="selected" disabled>Selecione um Ano</option>
                        @for ($i = 1912; $i <= date("Y"); $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor ($rotas as $rota)

                        </select>
                        @error('ano')
                        <p class="text-danger">{{ $errors->ano }} </p>
                        @enderror
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-1">
                            <label for="mes">Mes: </label>
                        </div>
                        <div class="form-group col-md-2">
                        <select class="form-control select2" name="mes" id="mes" style="width: 100%;">
                        <option value="DO" selected="selected" disabled>Selecione um mês</option>
                        @for ($i = 1; $i <= 12.2; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor ($rotas as $rota)

                        </select>
                        @error('mes')
                        <p class="text-danger">{{ $errors->mes }} </p>
                        @enderror
                    </div> --}}
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
