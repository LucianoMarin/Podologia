<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Paciente</title>
    <link href="./css/plantilla.css" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/estilo.css">
</head>


<body>

@php
$verificador=substr($rut,-1);
$rut=substr($rut,0,-1);
@endphp
<table class="plantilla">
<td>
<img class="imgP" src="imagenes/iconos/logo1.png">
</td>
<td><h1 class="titulos">REGISTRO DE ATENCIONES</h1>
</td>
</table>
<h2 class="stitulos">DATOS PACIENTE</h2>
<label class="textos"> Rut: </label><label>{{$rut . '-'. $verificador}}</label>
<br>
<label class="textos"> Nombre: </label><label>{{$nombreCompleto}}</label>
<br>
<label class="textos"> Discapacidad: </label><label>{{$discapacidad}}</label>
<br>
<br>
@php
$nProyecto=0;
$nDomicilio=0;
$nParticular=0;
$atenciones=0;
$noAtencion=0;
@endphp
@foreach($proyecto as $proyectos)
@php
$nProyecto++
@endphp

@endforeach

@foreach($domicilio as $domicilios)
@php
$nDomicilio++
@endphp

@endforeach

@foreach($particular as $particulares)
@php
$nParticular++
@endphp

@endforeach


<label class="">N° ATENCIONES <b>PROYECTOS</b>:  {{$nProyecto}} </label>
<br>
<br>
<table>
    <thead>
        <th class="oTexto">FECHA/HORA ASIGNADA</th>
        <th class="oTexto">NOMBRE PROYECTO</th>

    </thead>
    <tbody>
  
    @foreach($proyecto as $proyectos)
    <tr>
    @php
    $fechaRealizadop=date('d/m/Y', strtotime($proyectos->fecha_atencion));
    $horaP = substr($proyectos->hora_inicio, 0, -3);
    $horaPt = substr($proyectos->hora_termino, 0, -3);

    @endphp
    <td>{{$fechaRealizadop." ".$horaP." A ".$horaPt}}</td>
    <td>{{$proyectos->nombre}}</td>

</tr>
    @endforeach
</tbody>
</table>

<br>
<br>

<label class="">N° ATENCIONES <b>DOMICILIO</b>: {{$nDomicilio}} </label>
<br>
<br>
<table>
    <thead>
        <th class="oTexto">FECHA/HORA ASIGNADA</th>
        <th class="oTexto">BOLETA</th>
        <th class="oTexto">VALOR ATENCION</th>

    </thead>
    <tbody>
  
    @foreach($domicilio as $domicilios)
    <tr>
    @php
    $fechaRealizadod=date('d/m/Y', strtotime($domicilios->fecha_atencion));
    $horad = substr($domicilios->hora_inicio, 0, -3);
    $horaDt = substr($domicilios->hora_termino, 0, -3);
    $valorDomicilio=number_format($domicilios->precio_atencion, 0, '.','.');

    if($domicilios->boleta==1){
        $mPago="SI";
    }
    else{
        $mPago="NO";
    }
    @endphp
    <td>{{$fechaRealizadod." ".$horad." A ".$horaDt}}</td>

    <td>{{$mPago}}</td>

    <td>{{"$".$valorDomicilio}}</td>

</tr>
    @endforeach
</tbody>
</table>

<br>
<br>



<label class="">N° ATENCIONES <b>PARTICULAR</b>: {{$nParticular}} </label>
<br>
<br>
<table>
    <thead>
        <th class="oTexto">FECHA/HORA ASIGNADA</th>
        <th class="oTexto">BOLETA</th>
        <th class="oTexto">VALOR ATENCION</th>

    </thead>
    <tbody>
  
    @foreach($particular as $particulares)
    <tr>
    @php
    $fechaRealizadopa=date('d/m/Y', strtotime($particulares->fecha_atencion));
    $horapa = substr($particulares->hora_inicio, 0, -3);
    $horaPat = substr($particulares->hora_termino, 0, -3);
    $valorParticular=number_format($particulares->precio_atencion, 0, '.','.');


    if($particulares->boleta==1){
        $mPago="SI";
    }
    else{
        $mPago="NO";
    }
    @endphp
    <td>{{$fechaRealizadopa." ".$horapa." A ".$horaPat}}</td>

    <td>{{$mPago}}</td>

    <td>{{"$".$valorParticular}}</td>

</tr>
    @endforeach
</tbody>
</table>

<br>
<br>




@foreach($realizadas as $realizados)
@php
$atenciones+=1;
@endphp
@endforeach
<label class="">N° ATENCIONES REALIZADAS {{$atenciones}}: </label>


<br>



</body>
</html>