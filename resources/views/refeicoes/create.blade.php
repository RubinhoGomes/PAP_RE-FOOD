@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Nova Refeição</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/refeicoes" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body"></div>


                    <!-- Kg dos benefeciarios -->
                    <div class="form-group">
                        <label for="kgBen">Quilogramas dos Benefeciarios</label>
                        <input type="number" class="form-control" id="kgBen" name="kgBen" placeholder="Insira o número de quilogramas dos benefeciarios" value="{{ old('kgBen') }}">
                        @error('kgBen')
                            <p class="text-danger">{{ $errors->first('kgBen') }} </p>
                        @enderror
                    </div>


                    <!-- Kg das Assiciações Bolos e Pão -->
                    <div class="form-group">
                        <label for="kgAssoc">Quilogramas das Associações (Pão e Bolos)</label>
                        <input type="number" class="form-control" id="kgAssoc" name="kgAssoc" placeholder="Insira o número de quilogramas das associações" value="{{ old('kgAssoc') }}">
                        @error('kgAssoc')
                            <p class="text-danger">{{ $errors->first('kgAssoc') }} </p>
                        @enderror
                    </div>


                    <!-- Kg das Assiciações Pratos e Refeições -->
                    <div class="form-group">
                        <label for="kgAssoc2">Quilogramas das Associações (Pratos e Refeições)</label>
                        <input type="number" class="form-control" id="kgAssoc2" name="kgAssoc2" placeholder="Insira o número de quilogramas das associações" value="{{ old('kgAssoc2') }}">
                        @error('kgAssoc2')
                            <p class="text-danger">{{ $errors->first('kgAssoc2') }} </p>
                        @enderror
                    </div>


                   <!-- Data -->
                    <div class="form-group">
                        <label for="data">Data</label>
                        {{-- <input type="month" class="form-control" id="data" name="data" value="{{ old('data') }}">
                        @error('data')
                             <p class="text-danger">{{ $errors->first('data') }} </p>
                        @enderror --}}
                        <div class="row">
                            <input type="number" class="col-md-2" id="mes" name="mes" min="1" max="12" placeholder="Insira o mês" value="{{ old('mes') }}">
                            <input type="number" class="col-md-2" id="ano" name="ano" min="1912" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ old('ano') }}">
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
