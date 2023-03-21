
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
<form action="{{route('crear_paciente')}}" method="POST">
@csrf
<h1>Ingresar Atencion: </h1>
<div class="container">
<div class="row">
<div class="col-md-6">

<label>Nombre Completo: </label>
<br>
<input type="text" name="primer_nombre" readonly value="{{$pacientes->primer_nombre .' '.$pacientes->segundo_nombre.' '.$pacientes->apellido_paterno .' '.$pacientes->apellido_materno}}">
<br>
<br>
<label>Fecha Atención: </label>
<br>
<input type="date" name="fecha_atencion">
<br>
<label>Hora: </label>
<br>
<select name="hora">
<option>09:00</option>
<option>10:00</option>
<option>11:00</option>
<option>12:00</option>
<option>13:00</option>
<option>14:00</option>
<option>15:00</option>
<option>16:00</option>
<option>17:00</option>
<option>18:00</option>
<option>19:00</option>
</select>
<br>

</div>


<div class="col-md-6">
<br>
<label>Valor Atención</label>
<br>
<input type="text" name="precio_atencion">
<br>
<label>Nota: </label>
<br>
<textarea name="nota"></textarea>
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


