<meta name="csrf-token" content="{{ csrf_token() }}">
@section('cHorizontal3')

@if (session('resultado'))
<div class="alert alert-success">
{{ session('resultado') }}
</div>

@elseif(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>

@elseif (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </ul>
    </div>
@endif

@stop
<form action="{{route('crear_atencion')}}" method="POST">
@csrf
<h1>Ingresar Atencion: </h1>
<br>
<div class="container">
<div class="row">
<div class="col-md-6">

<label>Nombre Completo: </label>
<br>
<input type="text" id="primer_nombre" name="primer_nombre" class="inputNombre" readonly value="{{$pacientes->primer_nombre .' '.$pacientes->segundo_nombre.' '.$pacientes->apellido_paterno .' '.$pacientes->apellido_materno}}">
<br>
<label>Fecha Atención: </label>
<br>
<input type="date" id="fecha_atencion" name="fecha_atencion" class="fecha_atencion">
<br>
<label>Hora: </label>
<br>
<select name="hora" id="hora" class="hora">
<option></option>

</select>

</div>

<div class="col-md-6">
<label>Valor Atención</label>
<br>
<input type="text" name="precio_atencion" class="inputFormularios">
<br>
<label>Nota: </label>
<br>
<textarea name="nota" class="notasA"></textarea>
<br>
<br>
<input type="hidden" name="rut" value="{{$pacientes->rut}}">
<input type="submit" value="AGENDAR" class="btnPublicar">
</form>
</div>
</div>
</div>

<br>
<br>
