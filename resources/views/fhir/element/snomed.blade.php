<?php 
    $textos = explode(">>", $texto);
    foreach($textos as $id => $txt){
        if(strpos($txt,"<<") !== false){
            $textos[$id] = [
                "pre-texto"=> explode("→", $txt)[0], 
                "texto" => explode("<<",explode("→", $txt)[1])[0], 
                "codigo" => explode("<<", str_replace("→","",$txt))[1]
            ];
        }
    }
?>

@foreach ($textos as $texto)
    @if (isset($texto["codigo"]) && isset($texto["texto"]) && isset($texto["pre-texto"]))
        {{$texto["pre-texto"]}} <a class="tooltipped" data-position="top" data-tooltip="
        @foreach($snomed as $snom)
            @if(isset($snom->id) && $snom->id == $texto["codigo"])
                {{ $snom->FSN }}
            @endif
        @endforeach
        ">{{$texto["texto"]}}</a>
    @else
        {{$texto}}
    @endif
@endforeach
