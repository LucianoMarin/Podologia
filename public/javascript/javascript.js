import { vModal } from '../javascript/modal_validate.js';
import { validacionP } from '../javascript/perfil_validate.js';
import { validarPaciente } from '../javascript/paciente.validate.js';



$(document).ready(function () {
  $('#tablaGestionarAtencion').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
      "pageLength": 5,
      "responsive": true,
      "info": "Resultados Encontrados _START_ de _END_",
      "infoEmpty": "No encontrado",





    },
    "lengthMenu": [
      [1, 5],
      [1, 5],
    ],



  });
});


$(document).ready(function () {
  $('#tablaPublicacion').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
      "pageLength": 5,
      "responsive": true,
      "info": "Resultados Encontrados _START_ de _END_",
      "infoEmpty": "No encontrado",





    },
    "lengthMenu": [
      [1, 5],
      [1, 5],
    ],



  });
});




$(document).ready(function () {
  $('#tablaPaciente').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
      "pageLength": 5

    },
    "lengthMenu": [
      [1, 5],
      [1, 5],
    ],
  });
});

//tipo atencion

$(document).ready(function () {
  const tipo = document.querySelectorAll('.tipo_atencion');
  const nombre = document.querySelectorAll('.mostrarNombre');
  $(".mostrarNombre").hide();


  for (let j = 0; j <= tipo.length; j++) {

    $(tipo[j]).on("change click", function (e) {
      const nProyecto = document.querySelectorAll('.nombre_proyecto');


      e.preventDefault();

      if (tipo[j].value != 1) {
        $(nombre[j]).hide();

      } else if (tipo[j].value == 1) {
        $(nombre[j]).show();


      }


      let data = { tipo_atencion: $(tipo[j]).val() };

      $.ajax({

        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/atencion/nombreProyecto',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (data) {

          $(nProyecto[j]).empty();

          for (let i = 0; i <= data.length - 1; i++) {
            var option = document.createElement("option");
            option.text = data[i].nombre;
            option.value = data[i].id;
            nProyecto[j].add(option);


          }
        }


      });
    });
  }
});





//editando

$(document).ready(function () {
  const fechas = document.querySelectorAll(".fecha_atencion");
  const hora = document.querySelectorAll('.inicio_hora');
  const horarios = document.querySelectorAll('.horas'); //div
  const horarioFinal=document.querySelectorAll('.termino_hora');

  for (let j = 0; j < fechas.length; j++) {

    $(horarios[j]).hide();

    $(fechas[j]).on("change dblclick", function (e) {

      $(horarioFinal[j]).empty();



      e.preventDefault();
      let data = { fecha_atencion: $(fechas[j]).val() };


      if (fechas[j].value != '') {
        $(horarios[j]).show();
        
      }
      else {
        $(horarios[j]).hide();

      }



      $.ajax({

        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/atencion/buscar',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (data) {
          $(hora[j]).empty();

          for (let i = 0; i <= data.length - 1; i++) {

            var option = document.createElement("option");
            option.text = data[i];
            hora[j].add(option);

          }




        }


      });

    });
  }
});






$(document).ready(function () {
  const fechas = document.querySelectorAll(".fecha_atencion");
  const hora = document.querySelectorAll('.inicio_hora');
  const hora_final = document.querySelectorAll('.termino_hora');
  const horarios = document.querySelectorAll('.horas');

  for (let j = 0; j < fechas.length; j++) {


    $(hora[j]).on("change click", function (e) {

      e.preventDefault();
      let data = { hora_inicio: $(hora[j]).val(), fecha_atencion: $(fechas[j]).val() };


      $(horarios).show();


      $.ajax({

        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/atencion/buscar/2',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function (data) {
          $(hora_final[j]).empty();


          for (let i = 0; i <= data.length - 1; i++) {

            var option = document.createElement("option");
            option.text = data[i];
            hora_final[j].add(option);
          }


        }


      });

    });
  }
});




