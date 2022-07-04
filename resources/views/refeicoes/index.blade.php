@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3"> <i class="fas fa-meal"></i> Refeição</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Quilogramas Benefeciarios</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Quilogramas Associações</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Quilogramas Associações nº 2</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Data</th>
                    <th class="text-secondary opacity-9"></th>
                    <th class="text-secondary opacity-9"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($refeicoes as $refeicao)
                    <tr>
                        {{-- <td>
                          <div class="d-flex px-2 py-1">
                            <div>
                            <!-- <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1"> -->
                                <i class="fas fa-user-tie m-2"></i>
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm">{{ $rota->motorista }}</h6>
                             <!--  <p class="text-xs text-secondary mb-0">Número Rota: {{ $rota->numRota }}</p> -->
                            </div>
                          </div>
                        </td> --}}

                        {{-- <td>
                        <div class="dropdown">
                            <div class="text-secondary text-center text-xs font-weight-bold dropbtn">{{ $rota->Carrinhas->marca }}  {{ $rota->Carrinhas->modelo }}</div>
                            <div class="dropdown-content">
                                <div class="d-flex flex-column justify-content-center">
                                    <i class="text-secondary text-center text-xs font-weight-bold fas fa-car m-2 p-1"> {{ $rota->Carrinhas->cor }}<i class="fas fa-car p-1"></i></i>
                                    <i class="text-secondary text-center text-xs font-weight-bold fas fa-id-card m-2 p-1"> {{ $rota->Carrinhas->matricula }} <i class="fas fa-id-card p-1"></i></i>
                                </div>
                            </div> --}}

                            {{-- <p class="text-xs font-weight-bold mb-0">{{ $rota->Carrinhas->cor }}</>
                            <p class="text-xs text-secondary mb-0"></p> --}}
                            {{-- </div>
                        </td> --}}

                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{ $refeicao->kgBenefeciarios }}</span>
                          </td>

                        <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{ $refeicao->kgAssociacoes }}</span>
                        </td>

                        <td class="align-middle text-center text-sm">
                            <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{ $refeicao->kg2Associacoes }}</span>
                          </td>

                        <td class="align-middle text-center">
                            <div class="dropdown">
                                <div class="text-secondary text-center text-xs font-weight-bold">{{ $refeicao->mes}}<span>-</span>{{$refeicao->ano}}</div>
                                {{-- <div class="dropdown-content">
                                    <div class="d-flex flex-column justify-content-center">
                                        <i class="text-secondary text-center text-xs font-weight-bold fas fa-hourglass-start m-2"> {{ $rota->horaPartida }} - {{ $rota->horaChegada }}<i class="fas fa-hourglass-end m-1"></i></i>
                                    </div>
                                </div> --}}
                                {{-- <span class="text-secondary text-xs font-weight-bold">{{ $rota->data }}</span> --}}
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            {{--Botão Editar --}}
                             <a href="/refeicao/edit/{{ $refeicao->id }}">
                                <button type="submit" class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                </button>
                            </a>
                        </td>
                        <td class="align-middle text-left">
                            {{--Botão Remover --}}
                             <form role="form" action="/refeicao/{{ $refeicao->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger mb-0" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-trash text-xs"></i>
                                </button>
                            </form>
                        </td>
                      </tr>

                    @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
