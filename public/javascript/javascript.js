import {vModal} from '../javascript/modal_validate.js';
import {validacionP} from '../javascript/perfil_validate.js';
import {validarPaciente} from '../javascript/paciente.validate.js';



$(document).ready(function() {
  $('#tablaGestionarAtencion').DataTable({
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
  $(".mostrarNombre").hide();


const tipo=$(".tipo_atencion").on("change click", function(e) {
const nProyecto=document.querySelector('.nombre_proyecto');


e.preventDefault();

if(tipo.val()!=1){
  $(".mostrarNombre").hide();

}else if(tipo.val()==1){
  $(".mostrarNombre").show();


}


let data={tipo_atencion: $('.tipo_atencion').val()};

$.ajax({
  
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
  url : '/atencion/nombreProyecto',
  type : 'POST',
  dataType : 'json',
  data: data,
  success : function (data)
  { 

    $(nProyecto).empty();
    
    for(let i=0; i<=data.length-1; i++){
      var option = document.createElement("option");
      option.text=data[i].nombre;
      option.value=data[i].id;
      nProyecto.add(option);
   
    

  }


  
  }


});
});

});





$(document).ready(function(){
const fechas=document.querySelectorAll(".fecha_atencion");
for(let j=0; j<fechas.length; j++){


  $(fechas[j]).on("change", function(e) {
  
  e.preventDefault();
  
  let data={fecha_atencion: $(fechas[j]).val()};
  const hora=document.querySelectorAll('.hora');
  
  
  
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
      $(hora[j]).empty();
  
      for(let i=0; i<=data.length-1; i++){
  
        var option = document.createElement("option");
        option.text=data[i];
     

        hora[j].add(option);
      }
    
    }
    
  
  });

  });
}
  });