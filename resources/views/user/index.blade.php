@extends('layout')

@section('title',"Usuarios")

@section('content')
<div class="actions">
    <!-- <p class="subtitle">Menú</p> -->
    <a href="{{route("hospital.usuario.create")}}" class="waves-effect waves-light btn"><i class="material-icons left">add</i>Registrar Nuevo Usuario</a>
</div>
<hr style="opacity: 0.2;">
<div class="data-content">
    <p class="subtitle">Datos</p>

    <table class="striped responsive-table dashboard-table">
        <thead class="main-row">
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Rol</th>
              <th>Correo</th>
              <th class="action-users">Opciones</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($model->items() as $item)
                <tr>
                <!-- DATA -->
                    
                    <th>{{$item->id}}</th>
                    <th>{{$item->name}}</th>
                    <th>{{$item->nombreRol()}}</th>
                    <th>{{$item->email}}</th>

                    
                <!-- DATA -->

                    <td class="action-users">
                        <a href="{{route("hospital.usuario.show",$item->id)}}" class="waves-effect waves-light btn"><i class="material-icons left">assignment_ind</i>Detalle</a>
                        <a href="{{route("hospital.usuario.edit",$item->id)}}" class="waves-effect waves-light btn"><i class="material-icons left">mode_edit</i>Editar</a>
                        <a onclick="confirmModal('¿Borrar registro?','{{route('hospital.usuario.delete',$item->id)}}')" class="waves-effect waves-light btn red lighten-1"><i class="material-icons left">delete</i>Borrar</a>
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