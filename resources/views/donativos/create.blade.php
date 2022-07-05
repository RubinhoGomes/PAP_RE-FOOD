@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Nova Rota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/rotas" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body">
                    <!-- Motorista -->
                    <div class="form-group">
                      <label for="motorista">Motorista</label>
                      <input type="text" class="form-control" id="motorista" name="motorista" placeholder="Insira o nome do motirsta" value="{{ old('motorista') }}">
                      @error('motorista')
                          <p class="text-danger">{{ $errors->first('motorista') }} </p>
                      @enderror
                    </div>

                    <!-- Carrinhas -->
                    <div class="form-group">
                        <label for="carrinhas">Carrinhas</label>
                        <select class="form-control select2" name="carrinhas" id="carrinhas" style="width: 100%;">
                          <option value="DO" selected="selected" disabled>Selecione uma Carrinnha</option>
                          @foreach ($carrinhas as $car)

                          @if (old('carrinhas') == $car->id)
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
                      <div class="form-group">
                        <label for="numRota">Número da Rota</label>
                        <input type="number" class="form-control" id="numRota" name="numRota" placeholder="Insira o número da rota" min="0" max="7" value="{{ old('numRota') }}">
                        @error('numRota')
                            <p class="text-danger">{{ $errors->first('numRota') }} </p>
                        @enderror
                      </div>

                   <!-- KmPartida -->
                      <div class="form-group">
                        <label for="kmPartida">Kilométros Partida</label>
                        <input type="number" class="form-control" id="kmPartida" name="kmPartida" placeholder="Insira o número de kilométros que iniciou a viagem" value="{{ old('kmPartida') }}">
                        @error('kmPartida')
                            <p class="text-danger">{{ $errors->first('kmPartida') }} </p>
                        @enderror
                      </div>

                   <!-- KmChegada -->
                   <div class="form-group">
                    <label for="kmChegada">Kilométros Chegada</label>
                    <input type="number" class="form-control" id="kmChegada" name="kmChegada" placeholder="Insira o número de kilométros que acabou a viagem" value="{{ old('kmChegada') }}">
                    @error('kmChegada')
                        <p class="text-danger">{{ $errors->first('kmChegada') }} </p>
                    @enderror
                  </div>

                   <!-- HoraPartida -->
                   <div class="form-group">
                        <label for="horaPartida">Hora Partida</label>
                        <input type="time" class="form-control" id="horaPartida" name="horaPartida" value="{{ old('horaPartida') }}">
                        @error('horaPartida')
                             <p class="text-danger">{{ $errors->first('horaPartida') }} </p>
                        @enderror
                    </div>


                   <!-- HoraChegada -->
                   <div class="form-group">
                        <label for="horaChegada">Hora Chegada</label>
                        <input type="time" class="form-control" id="horaChegada" name="horaChegada" value="{{ old('horaChegada') }}">
                        @error('horaChegada')
                             <p class="text-danger">{{ $errors->first('horaChegada') }} </p>
                        @enderror
                    </div>


                   <!-- Data -->
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="date" class="form-control" id="data" name="data" value="{{ old('data') }}">
                        @error('data')
                             <p class="text-danger">{{ $errors->first('data') }} </p>
                        @enderror
                    </div>

                    <!-- Observações -->
                    <div class="form-group">
                        <label for="observacoes">Observações</label>
                        <textarea class="form-control" id="observacoes" name="observacoes">

                          {{ old('observacoes') }}

                        </textarea>
                        @error('observacoes')
                           <p class="text-danger">{{ $errors->first('observacoes') }} </p>
                        @enderror
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-success" name="btnCriar">Criar</button>
                    <button type="button" class="btn btn-warning" name="btnLimpar" id="btnLimpar">Limpar</button>
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
