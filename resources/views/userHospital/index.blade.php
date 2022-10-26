@extends('layout')

@section('title',"Usuarios")

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{route("admin.usuario.create")}}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar Nuevo Usuario</a>
</div>
<hr style="opacity: 0.2;">
<div class="data-content">
    <p class="subtitle">Datos</p>

    <table class="striped responsive-table dashboard-table">
        <thead class="main-row">
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Hospital</th>
              <th>Correo</th>
              <th class="action-users">Opciones</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($model->items() as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->hospital->nombre}}</th>
                    <th>{{$item->email}}</th>
                    <td class="action-users">
                        <a href="{{route("admin.usuario.show",$item->id)}}" class="waves-effect waves-light btn"><i class="material-icons left">assignment_ind</i>Detalle</a>
                    </td>
                </tr>
            @endforeach
          
        </tbody>
    </table>
    {{$model->links('components.paginatorMaterialize')}}
</div>
@endsection
@section('modal')
    @include('components.confirm')
@endsection