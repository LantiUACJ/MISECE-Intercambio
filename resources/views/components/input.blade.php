
<div class="form-group">
    <label for="{{$field}}_input" class="{{$errors->has($field)?"text-danger":""}}">{!! $required?"<b>*</b> ":"" !!}{{$label}}</label>
    <input {{$required?"required":""}} id="{{$field}}_input" class="form-control {{$errors->has($field)?"is-invalid":""}}" type="{{$type}}" name="{{$field}}" value="{{old($field)?old($field):(isset($value)?$value:"")}}">
    @if ($errors->has($field))
        <small id="{{$field}}_help" class="text-danger">
            @foreach ($errors->get($field) as $item)
                {{$item}}
            @endforeach
        </small>
    @endif
</div>