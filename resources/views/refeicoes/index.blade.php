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
                            </div>
                        </td>
                        <td class="align-middle text-center">
                            {{--Botão Editar --}}
                             <a href="/refeicoes/edit/{{ $refeicao->id }}">
                                <button type="submit" class="btn btn-link text-secondary mb-0" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                </button>
                            </a>
                        </td>
                        <td class="align-middle text-left">
                            {{--Botão Remover --}}
                             <form role="form" action="/refeicoes/{{ $refeicao->id }}" method="post">
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
