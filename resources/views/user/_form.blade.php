

<div class="row">
    <form class="col s12" method="POST">
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="name" type="text" class="validate" name="name" value="{{old('name', $model->name)}}">
                <label for="name">Nombre completo</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="curp" type="text" class="validate" name="curp">
                <label for="curp">CURP</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate" name="email" value="{{old('email', $model->email)}}">
                <label for="email">Correo electrónico</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Contraseña</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="rol_id">
                    <option value="" disabled selected>Elije nivel de acceso</option>
                    <option value="2" {{$model->rol_id==2?"selected":""}}>Hospital</option>
                    <option value="3" {{$model->rol_id==3?"selected":""}}>Médico</option>
                    <option value="4" {{$model->rol_id==4?"selected":""}}>Paramédico</option>
                    <option value="5" {{$model->rol_id==5?"selected":""}}>Paciente</option>
                </select>
                <label>Nivel de acceso</label>
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">save</i>Guardar</button>

    </form>
    </div>