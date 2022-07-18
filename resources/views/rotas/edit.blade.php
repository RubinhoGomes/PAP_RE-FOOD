@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Alterar Dados da Rota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/rotas/{{ $rotas->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                  <div class="card-body">

                    <div class="row col-lg-12">

                    <!-- Data -->
                    <div class="form-group col-lg-3">
                        <label for="data">Data</label>
                        <input type="date" class="form-control border text-center" id="data" name="data" value="{{ $rotas->data }}">
                        @error('data')
                             <p class="text-danger">{{ $errors->first('data') }} </p>
                        @enderror
                    </div>

                    <!-- Motorista -->
                    <div class="form-group col-lg-3">
                        <label for="motorista">Voluntário</label>
                        <input type="text" class="form-control border text-center" id="motorista" name="motorista" placeholder="Insira o nome do motirsta" value="{{ $rotas->motorista }}">
                        @error('motorista')
                            <p class="text-danger">{{ $errors->first('motorista') }} </p>
                        @enderror
                      </div>

                      <!-- Carrinhas -->
                      <div class="form-group col-lg-3">
                          <label for="carrinhas">Carrinhas</label>
                          <select class="form-control select2 border text-center" name="carrinhas" id="carrinhas" style="width: 100%;">
                            <option value="DO" selected="selected" disabled>Selecione uma Carrinnha</option>
                            @foreach ($carrinhas as $car)

                            @if ($rotas->carrinhas_id == $car->id)
                            <option value="{{ $car->id }}" selected>{{ $car->marca }} {{ $car->modelo }} ({{ $car->cor }})</option>
                            @else
                            <option value="{{ $car->id }}">{{ $car->marca }} {{ $car->modelo }} ({{ $car->cor }})</option>
                            @endif

                            @endforeach
                          </select>
                          @error('carrinhas')
                          <p class="text-danger">{{ $errors->first('carrinhas') }} </p>
                          @enderror
                        </div>

                      <!-- Número da Rota -->
                        <div class="form-group col-lg-3">
                          <label for="numRota">Número da Rota</label>
                          <input type="number" class="form-control border text-center" id="numRota" name="numRota" placeholder="Insira o número da rota" min="0" max="7" value="{{ $rotas->numRota }}">
                          @error('numRota')
                              <p class="text-danger">{{ $errors->first('numRota') }} </p>
                          @enderror
                        </div>


                    </div>

                    <div class="row col-lg-12">


                   <!-- KmPartida -->
                      <div class="form-group col-lg-3">
                        <label for="kmPartida">Kilométros Partida</label>
                        <input type="number" class="form-control border text-center" id="kmPartida" name="kmPartida" placeholder="Insira o número de kilométros que iniciou a viagem" step="100" value="{{ $rotas->kmPartida }}">
                        @error('kmPartida')
                            <p class="text-danger">{{ $errors->first('kmPartida') }} </p>
                        @enderror
                      </div>

                   <!-- KmChegada -->
                   <div class="form-group col-lg-3">
                    <label for="kmChegada">Kilométros Chegada</label>
                    <input type="number" class="form-control border text-center" id="kmChegada" name="kmChegada" placeholder="Insira o número de kilométros que acabou a viagem" step="100" value="{{ $rotas->kmChegada }}">
                    @error('kmChegada')
                        <p class="text-danger">{{ $errors->first('kmChegada') }} </p>
                    @enderror
                  </div>

                   <!-- HoraPartida -->
                   <div class="form-group col-lg-3">
                        <label for="horaPartida">Hora Partida</label>
                        <input type="time" class="form-control border text-center" id="horaPartida" name="horaPartida" value="{{ $rotas->horaPartida }}">
                        @error('horaPartida')
                             <p class="text-danger">{{ $errors->first('horaPartida') }} </p>
                        @enderror
                    </div>


                   <!-- HoraChegada -->
                   <div class="form-group col-lg-3">
                        <label for="horaChegada">Hora Chegada</label>
                        <input type="time" class="form-control border text-center" id="horaChegada" name="horaChegada" value="{{ $rotas->horaChegada }}">
                        @error('horaChegada')
                             <p class="text-danger">{{ $errors->first('horaChegada') }} </p>
                        @enderror
                    </div>

                    </div>

                    <div class="row col-lg-12">

                    <!-- Observações -->
                    <div class="form-group col-lg-12">
                        <label for="observacoes">Observações</label>
                        <textarea class="form-control border text-left" id="observacoes" name="observacoes">

                            {{ $rotas->observacoes }}

                        </textarea>
                        @error('observacoes')
                           <p class="text-danger">{{ $errors->first('observacoes') }} </p>
                        @enderror
                      </div>
                  </div>
                    </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success col-lg-1" name="btnEditar">Guardar</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
