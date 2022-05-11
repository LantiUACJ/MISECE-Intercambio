@extends('layout')

@section('content')
<div class="data-content">
    <p style="display: flex; align-items: center;" class="subtitle"><i class="material-icons" style="margin-right: 1rem;">account_circle
    </i>  Consulta de información de pacientes</p>
    <div class="row simple-form">
        <form class="col s12" method="POST">
          <div class="row">
            <div class="input-field col s6">
              <input placeholder="Ingresa CURP del paciente" id="curp" type="text" class="validate" name="curp">
              <label for="curp">CURP</label>
            </div>
          </div>

          <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">search</i>Consultar</button>

        </form>
    </div>
</div>
@endsection