import {vModal} from '../javascript/modal_validate.js';
import {validacionP} from '../javascript/perfil_validate.js';
import {validarPaciente} from '../javascript/paciente.validate.js';


 $(document).ready(function() {
  $('#tablaPublicacion').DataTable({
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json",
      "pageLength": 5,
      "responsive": true,
      "info":           "Resultados Encontrados _START_ de _END_",
      "infoEmpty":      "No encontrado",



 
      
    },
    "lengthMenu": [
      [1,5],
      [1,5],
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
          [1,5],
          [1,5],
      ],
  });
});

$(document).ready(function(){
$("#fecha_atencion").on("change", function(e) {

e.preventDefault();

let data={fecha_atencion: $('#fecha_atencion').val()};
const hora=document.querySelector('#hora');




$.ajax({
  
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  url : '/atencion/buscar',
  type : 'POST',
  dataType : 'json',
  data: data,
  success : function (data)
  { 
    $("#hora").empty();

    for(let i=0; i<=data.length-1; i++){

      var option = document.createElement("option");
      option.text=data[i];
      hora.add(option);
    }
  
  }

});
});
});