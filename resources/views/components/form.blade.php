
<form action="{{$action}}" method="{{$method}}">

    @csrf

    @foreach ($inputs as $input)
        @if ($input["type"]=="select")
            @include('components.select',$input)
        @endif
        @if ($input["type"]=="text" || $input["type"]=="date" || $input["type"]=="number" || $input["type"]=="email" || $input["type"]=="password")
            @include('components.input',$input)
        @endif
    @endforeach

    <input type="submit" class="btn btn-success" value="Guardar" name="Guardar">
</form>