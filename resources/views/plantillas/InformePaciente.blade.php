<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Paciente</title>
</head>
<body>

<h1>REGISTRO DE ATENCIONES</h1>
<h2>DATOS PACIENTE</h2>
<br>
<label>Rut: {{$rut}}</label>
<br>
<label>Nombre: {{$nombreCompleto}} </label>
<br>
<label>Discapacidad: {{$discapacidad}}</label>
<br>
<br>

<label>N° ATENCIONES REALIZADAS: </label>
<table border="1px solid black">
    <thead>
        <th>FECHA/HORA ASIGNADA</th>
        <th>BOLETA</th>
        <th>VALOR ATENCION</th>

    </thead>
    @foreach($realizadas as $realizados)
    
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
    <tr>
    @endforeach
</table>

<br>

<label>N° ATENCIONES NO REALIZADAS: </label>
<table border="1px solid black">
    <thead>
        <th>FECHA/HORA</th>


    </thead>
@foreach($noRealizadas as $noRealizado)
@php
$fechaNoRealizado=date('d/m/Y', strtotime($noRealizado->fecha_atencion));
@endphp
        <td>{{$fechaNoRealizado}}</td>
        <tr>
            @endforeach
</table>
</body>
</html>