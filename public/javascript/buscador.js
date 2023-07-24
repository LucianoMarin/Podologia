export const buscar = (() => {

    'use strict';

    const buscarPaciente = document.querySelector('#buscarRut');
    const crearLista = document.querySelector('.resultados');
    let rut="";

    if (buscarPaciente) {
        buscarPaciente.addEventListener('keyup', (e) => {
            let datoUsuario = e.target.value;
            if (datoUsuario) {

                var data = data;
                let validar = false;
                let nombre='';

                $.ajax({

                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/atencion/buscar/buscarPersona",
                    type: 'GET',
                    dataType: 'json',
                    data: data,


                    success: function (data) {
                        const texto = datoUsuario.toLowerCase();



                        data.forEach(paciente => {
                            if(paciente.segundo_nombre==null){
                                paciente.segundo_nombre="";
                                nombre = paciente.primer_nombre.toLowerCase()+""+paciente.segundo_nombre.toLowerCase()
                                +""+ paciente.apellido_paterno.toLowerCase()+""+ paciente.apellido_materno.toLowerCase();
                            }else{

                
                                nombre = paciente.primer_nombre.toLowerCase()+""+paciente.segundo_nombre.toLowerCase()
                                +""+ paciente.apellido_paterno.toLowerCase()+""+ paciente.apellido_materno.toLowerCase();

                            }
                            

                

                                let verificador=paciente.rut;
                               verificador=verificador.split('')[verificador.length - 1]


                               let nRut=paciente.rut;
                               let rutS = nRut.substring(0, nRut.length - 1);
                              
                            if (nombre.indexOf(texto.split(" ").join("")) !== -1) {



                                crearLista.innerHTML = `
                                <div class="alert alert-secondary" role="alert">
                                <li id="libuscador"><b>Rut:</b> ${rutS}-${verificador}
                                <br> <b>Nombre Completo</b>: ${paciente.primer_nombre.toUpperCase()} ${paciente.segundo_nombre.toUpperCase()} 
                                ${paciente.apellido_paterno.toUpperCase()} ${paciente.apellido_materno.toUpperCase()}  </li>
                                </div>`;

                                rut=paciente.rut;

                                validar = true;

                            }



                            if (validar == false ) {
                                crearLista.innerHTML = 'SIN RESULTADOS';

                            }




                        });

                    




                    }

                });


            }
            else if (buscarPaciente.value.length == 0) {
                crearLista.innerHTML = '';

            }





        });



        
        crearLista.addEventListener('click',()=>{
            buscarPaciente.value=rut;
            alert("Se cargo el paciente");
            

        });

    }


})();