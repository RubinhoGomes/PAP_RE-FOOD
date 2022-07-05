@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Despesas</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Eletrecidade</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Agua</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Consumiveis</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Manutenção</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Equipamentos</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Outros</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Data</th>
                    <th class="text-secondary opacity-9"></th>
                    <th class="text-secondary opacity-9"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($despesas as $despesa)
                    <tr>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{  $despesa->eletrecidade }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{ $despesa->agua }}</span>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{  $despesa->consumiveis }}</span>
                    </td>                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{  $despesa->manutencao }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{ $despesa->equipamentos }}</span>
                      </td>
                      <td class="align-middle text-center text-sm">
                          <span class="text-secondary text-center text-xs font-weight-bold{{-- badge badge-sm bg-gradient-success --}}">{{  $despesa->outras }}</span>
                      </td>
                        <td class="align-middle text-center">
                            <div class="dropdown">
                                <div class="dropbtn text-secondary text-center text-xs font-weight-bold">{{ $despesa->mes }} - {{ $despesa->ano }}</div>
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
                             <a href="/despesas/edit/{{ $despesa->id }}">
                                <button type="submit" class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                </button>
                            </a>
                        </td>
                        <td class="align-middle text-left">
                            {{--Botão Remover --}}
                             <form role="form" action="/despesas/{{ $despesa->id }}" method="post">
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
