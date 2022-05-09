<form class="col s12" method="POST">
    <div class="row">
    <div class="input-field col s6">
        <input id="user" type="text" class="validate" name="user" value="{{old("user", $model->user)}}">
        <label for="user">Usuario</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    <div class="input-field col s6">
        <input id="password" type="password" class="validate" name="password" value="">
        <label for="password">Contraseña</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    </div>
    <div class="row">
    <div class="input-field col s12">
        <input id="acces_point" type="text" class="validate" name="url" value="{{old("url", $model->url)}}">
        <label for="acces_point">Punto de acceso (URL)</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    </div>

    <div class="row">
    <div class="input-field col s6">
        <input id="hospital_name" type="text" class="validate" name="nombre" value="{{old("nombre", $model->nombre)}}">
        <label for="hospital_name">Nombre del Hospital / clínica</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    <div class="input-field col s6">
        <input id="hospital_phone" type="text" class="validate" name="telefono" value="{{old("telefono", $model->telefono)}}">
        <label for="hospital_phone">Teléfono</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    </div>

    <div class="row">
    <div class="input-field col s6">
        <input id="email" type="email" class="validate" name="email" value="{{old("email", $model->email)}}">
        <label for="email">Email</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    <div class="input-field col s4">
        <input id="street_name" type="text" class="validate" name="calle" value="{{old("calle", $model->calle)}}">
        <label for="street_name">Calle</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
        </div>
        <div class="input-field col s2">
        <input id="adress_number" type="text" class="validate" name="numero" value="{{old("numero", $model->numero)}}">
        <label for="adress_number">Número</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
        </div>
    </div>

    <div class="row">
    <div class="input-field col s6">
        <input id="adress_colony" type="text" class="validate" name="colonia" value="{{old("colonia", $model->colonia)}}">
        <label for="adress_colony">Colonia</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    <div class="input-field col s6">
        <input id="zip_code" type="text" class="validate" name="codigo_postal" value="{{old("codigo_postal", $model->codigo_postal)}}">
        <label for="zip_code">Código Postal</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    </div>


    <div class="row">
    <div class="input-field col s6">
        <input id="city" type="text" class="validate" name="ciudad" value="{{old("ciudad", $model->ciudad)}}">
        <label for="city">Ciudad</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    <div class="input-field col s6">
        <input id="state" type="text" class="validate" name="estado" value="{{old("estado", $model->estado)}}">
        <label for="state">Estado</label>
        <!-- <span class="error-text">Contraseña Incorrecta</span> -->
    </div>
    </div>

    <!--<button href="#modal1" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">save</i>Guardar</button>-->
    <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">save</i>Guardar</button>
</form>