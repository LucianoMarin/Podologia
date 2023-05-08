<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Paciente</title>
    <link href="./css/plantilla.css" rel="stylesheet"/>
</head>
<body>
<h1 class="titulos">REGISTRO DE ATENCIONES</h1>
<h2 class="stitulos">DATOS PACIENTE</h2>
<label class="textos"> Rut: </label><label>{{$rut}}</label>
<br>
<label class="textos"> Nombre: </label><label>{{$nombreCompleto}}</label>
<br>
<label class="textos"> Discapacidad: </label><label>{{$discapacidad}}</label>
<br>
<br>
@php
$atenciones=0;
$noAtencion=0;
@endphp
@foreach($realizadas as $realizados)
@php
$atenciones+=1;
@endphp
@endforeach
<label class="">N° ATENCIONES REALIZADAS {{$atenciones}}: </label>
<br>
<br>
<table>
    <thead>
        <th class="oTexto">FECHA/HORA ASIGNADA</th>
        <th class="oTexto">BOLETA</th>
        <th class="oTexto">VALOR ATENCION</th>

    </thead>
    <tbody>
  
    @foreach($realizadas as $realizados)
    <tr>
    @php
    $fechaRealizado=date('d/m/Y', strtotime($realizados->fecha_atencion));

    if($realizados->boleta==1){
        $mPago="SI";
    }
    else{
        $mPago="NO";
    }
    @endphp
    <td>{{$fechaRealizado}}</td>

    <td>{{$mPago}}</td>

    <td>{{$realizados->precio_atencion}}</td>
</tr>
    @endforeach
</tbody>
</table>

<br>
@foreach($noRealizadas as $noRealizado)
@php
$noAtencion+=1;
@endphp
@endforeach

<label>N° ATENCIONES NO REALIZADAS {{$noAtencion}}: </label>
<br>
<br>
<table class="noRealizado">
    <thead>
        <th class="oTexto">FECHA/HORA</th>


    </thead>
    <tbody>
@foreach($noRealizadas as $noRealizado)
@php
$fechaNoRealizado=date('d/m/Y', strtotime($noRealizado->fecha_atencion));
@endphp
        <td>{{$fechaNoRealizado}}</td>
        <tr>
            @endforeach
</tbody>
</table>
</body>
</html>