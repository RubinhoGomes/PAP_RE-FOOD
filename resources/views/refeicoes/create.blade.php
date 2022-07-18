@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title text-center">Registar Quilogramas Doados</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" action="/refeicoes" enctype="multipart/form-data">
                  @csrf

                  <div class="card-body">

                  <div class="row">

                    <!-- Kg dos benefeciarios -->
                    <div class="form-group col-lg-3">
                        <label for="kgBen">Quilogramas dos Benefeciarios</label>
                        <input type="number" class="form-control border text-center" id="kgBen" name="kgBen" placeholder="Insira o número de quilogramas dos benefeciarios" value="{{ old('kgBen') }}">
                        @error('kgBen')
                            <p class="text-danger">{{ $errors->first('kgBen') }} </p>
                        @enderror
                    </div>

                    <!-- Kg das Assiciações Bolos e Pão -->
                    <div class="form-group col-lg-3">
                        <label for="kgAssoc">Quilogramas das Associações (Pão e Bolos)</label>
                        <input type="number" class="form-control border text-center" id="kgAssoc" name="kgAssoc" placeholder="Insira o número de quilogramas das associações" value="{{ old('kgAssoc') }}">
                        @error('kgAssoc')
                            <p class="text-danger">{{ $errors->first('kgAssoc') }} </p>
                        @enderror
                    </div>

                    <!-- Kg das Assiciações Sopa e Prato -->
                    <div class="form-group col-lg-3">
                        <label for="kgAssoc2">Quilogramas das Associações (Sopa e Prato)</label>
                        <input type="number" class="form-control border text-center" id="kgAssoc2" name="kgAssoc2" placeholder="Insira o número de quilogramas das associações" value="{{ old('kgAssoc2') }}">
                        @error('kgAssoc2')
                            <p class="text-danger">{{ $errors->first('kgAssoc2') }} </p>
                        @enderror
                    </div>
                  </div>

                  <div class="row mt-2">
                   <!-- Data -->
                        <div class="row">
                            <div class="col-lg-2 d-flex align-items-center mt-2">
                                <label for="kgAssoc2">Mês:</label>
                                <input type="number" class="form-control border text-center mx-2" id="mes" name="mes" min="01" max="12" placeholder="Insira o mês" value="{{ date('m') }}">
                            </div>
                            <div class="col-lg-2 d-flex align-items-center mt-2">
                                <label for="kgAssoc2">Ano:</label>
                                <input type="number" class="form-control border text-center mx-2" id="ano" name="ano" min="1912" max="<?php echo date("Y"); ?>" placeholder="Insira o ano" value="{{ date('Y') }}">
                            </div>
                        </div>
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
