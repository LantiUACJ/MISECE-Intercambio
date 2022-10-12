@extends('layout')

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{url('/')}}" class="waves-effect waves-light red darken-1 btn"><i class="material-icons left">arrow_back</i>Cancelar consulta</a>
</div>
<hr style="opacity: 0.2;">
<div class="data-content">
    <p style="display: flex; align-items: center;" class="subtitle"><i class="material-icons" style="margin-right: 1rem;">account_circle
    </i>  Consulta de información de pacientes</p>
    <div class="row simple-form">
        <div class="col s12">
            <p><b>{{$nombre}}</b> introduce el código de verificación </p>
        </div>
        <form class="col s12" method="POST">
            <input type="hidden" name="curp" value="{{$curp}}">
          <div class="row">
            <div class="input-field col s6">
              <input id="curp" type="text" class="validate" name="codigo">
              <label for="curp">Código de verificación</label>
            </div>
          </div>

          <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">find_in_page</i>Verificar y ver expediente</button>
        </form>
      </div>
</div>
@endsection