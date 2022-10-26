

<div class="row">
    <form class="col s12" method="POST">
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="name" type="text" class="validate" name="name" value="{{old('name', $model->name)}}">
                <label for="name">Nombre completo</label>
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field col s12 m6">
                <input id="curp" type="text" class="validate" name="curp" value="{{old('curp', $model->curp)}}">
                <label for="curp">CURP (opcinal)</label>
                @error('curp')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6">
                <input id="email" type="email" class="validate" name="email" value="{{old('email', $model->email)}}">
                <label for="email">Correo electrónico</label>
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-field col s12 m6">
                <input id="password" type="password" class="validate" name="password">
                <label for="password">Contraseña {{$model->password?"(opcinal)":""}}</label>
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="hospital_id">
                    <option value="" disabled selected>Elije un hospital</option>
                    @foreach ($model->hospitales() as $item)
                        <option value="{{$item->id}}" {{old('hospital_id', $model->hospital_id)==$item->id?"selected":""}}>{{$item->nombre}}</option>
                    @endforeach
                </select>
                <label>Hospital</label>
                @error('hospital_id')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <button type="submit" class="waves-effect waves-light btn modal-trigger"><i class="material-icons left">save</i>Guardar</button>

    </form>
    </div>