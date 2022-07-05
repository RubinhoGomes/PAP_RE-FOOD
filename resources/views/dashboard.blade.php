@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-header p-3 pt-2">
                                <div
                                    class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                    <i class="fa fa-home"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Associações</p>
                                    <?php $valorAssoc = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorAssoc += $gerals->numAssociacoesParceiras?>
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
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
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
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
                                        {{ $valorFam }}
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
                                    <i class="fa fa-briefcase"></i>
                                </div>
                                <div class="text-end pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Parceiros Sociais</p>
                                    <?php $valorParcS = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorParcS += $gerals->numParceirosSociais?>
                                        @endforeach
                                        {{ $valorParcS }}
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
                                    <i class="fa fa-apple-alt"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Fontes de Alimentos</p>
                                    <?php $valorFontesA = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorFontesA += $gerals->numFontesAlimentos?>
                                        @endforeach
                                        {{ $valorFontesA }}
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
                                    <i class="fa fa-handshake"></i>
                                </div>
                                <div class="text-end offset-3 pt-1">
                                    <p class="text-lg mb-0 text-capitalize">Associações Parceiras</p>
                                    <?php $valorAssocP = 0;?>
                                    <h4 class="mb-0"> @foreach ($geral as $gerals)
                                        <?php  $valorAssocP += $gerals->numAssociacoesParceiras?>
                                        @endforeach
                                        {{ $valorAssocP }}
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
            </div>
        </div>
    </div>
</div>
@endsection
