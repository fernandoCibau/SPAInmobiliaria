//----------------------------------------------------------
//                  FORMULARIO
//----------------------------------------------------------

$("#formAltaPropiedad").submit( (e)=>{
    e.preventDefault();
    // let imagenes = $("#i")[0].files;

    if( confirm("¿Confirmar Envio ?") ){
        let form = $("#formAltaPropiedad");
        let formData = new FormData(form[0]);
        if( $("#btnForm").attr("name") == "alta")   ajaxAlta( formData );
        if( $("#btnForm").attr("name") == "modificar")  ajaxModificar( formData );
        if( $("#btnForm").attr("name") == "eliminar")  ajaxEliminar( formData );
        if( $("#btnForm").attr("name") == "PDF")  alert("PDF");
    }
} );

//----------------------------------------------------------
//                  FUNCIONES
//----------------------------------------------------------

let ajaxAlta = ( formData)=>{

    $.ajax({

        url: "propiedadAlta.php",
        method: "post",
        data:  formData ,
        contentType: false,
        processData: false,

        success: (resultado, estado) => {
            try {
                alert(estado + "\n" + resultado);
                console.log(resultado)
                modalOff();
                cargarTabla();
                vaciarForm();

            }catch (error) {
                console.error("Error en alta de los datos:", error);
                alert("Error en la carga de datos. Consulta la consola para más detalles.");
            }
        }
    });
};

let ajaxModificar = ( formData)=>{

    $.ajax({

        url: "propiedadModificar.php",
        method: "post",
        data:  formData ,
        contentType: false,
        processData: false,

        success: (resultado, estado) => {
            try {
                alert(estado + "\n" + resultado);
                console.log(resultado)
            }catch (error) {
                console.error("Error al modificar los datos:", error);
                alert("Error en la carga de datos. Consulta la consola para más detalles.");
            }
        }
    });
};

let ajaxEliminar = ( formData)=>{

    $.ajax({

        url: "propiedadEliminar.php",
        method: "post",
        data:  formData ,
        contentType: false,
        processData: false,

        success: (resultado, estado) => {
            try {
                alert(estado + "\n" + resultado);
                console.log(resultado)
                modalOff();
                cargarTabla();
            }catch (error) {
                console.error("Error al eliminar los datos:", error);
                alert("Error en la carga de datos. Consulta la consola para más detalles.");
            }
        }
    });
};

let modificar = ( inmueble ) =>{
    cargarForm( inmueble );
    modalOn();
    $("#btnForm").attr("name","modificar");
    $("#btnForm").text("Modificar");
}

let eliminar = (inmueble)=>{
    cargarForm(inmueble);
    modalOn();
    $("#btnForm").attr("name","eliminar");
    $("#btnForm").text("Eliminar");
}

let ampliar = (inmueble) =>{

    $("#seccionModalFoto").attr("class", "seccionModalFoto on");
    $("#contenedorModalFotoPrincipal").empty();
    let contenedorModalFoto = $("<div class='contenedorModalFoto' id='contenedorModalFoto'></div>")
    $("#contenedorModalFotoPrincipal").append(contenedorModalFoto);

            if(inmueble.imagenes.length > 0 ){

                contenedorModalFoto.append(`<img class='fotoModal'  src='data:image/jpeg;base64,${inmueble.imagenes[0]}' />`);

                let cont =0;
                let btnAnterior = $("<input type='button' value='<' class='btnAntModal'>").click( ()=>{
                    let cantidadDeImagenes = inmueble["imagenes"].length;
                    $("#contenedorModalFoto").empty();
                    cont--;
                    if( cont >= cantidadDeImagenes || cont < 0 ) cont = inmueble["imagenes"].length -1;
                    $("#contenedorModalFoto").append(`<img class='fotoModal'  src='data:image/jpeg;base64,${inmueble.imagenes[cont]}' />`);
                });
                
                let btnSigiente = $("<input type='button' value='>' class='btnSigModal'>").click( ()=>{
                    let cantidadDeImagenes = inmueble["imagenes"].length;
                    $("#contenedorModalFoto").empty();
                    cont++
                    if( cont >= cantidadDeImagenes ) cont = 0
                    $("#contenedorModalFoto").append(`<img class='fotoModal'  src='data:image/jpeg;base64,${inmueble.imagenes[cont]}' />`);
                    
                });

                $("#contenedorModalFotoPrincipal").append(btnAnterior);
                $("#contenedorModalFotoPrincipal").append(btnSigiente);
            }

            if( inmueble.imagenes.length == 0 ){
                contenedorModalFoto.append(`SIN FOTO`);
                contenedorModalFoto.append("<input type='button' value='Agregar Foto' id='agregarFotoVacio' class='agregarFotoVacio'> ");
            }
            $("header").attr("class", "bloqueo");
            $("#secMenu").attr("class", "secMenu bloqueo");
            $("#secTable").attr("class", "secTable bloqueo");
            $("footer").attr("class", "bloqueo");
}

let cargarForm = (inmueble) =>{
    $("#tipoInmueble").val( inmueble.tipoInmueble);
    $("#ambientes").val( inmueble.ambientes);
    $("#departamento").val( inmueble.departamento);
    $("#piso").val( inmueble.piso);

    $("#barrio").val( inmueble.barrio);
    $("#calle").val( inmueble.calle);
    $("#entreCalle1").val( inmueble.entreCalle1);
    $("#entreCalle2").val( inmueble.entreCalle2);

    $("#localidad").val( inmueble.localidad);
    $("#numero").val( inmueble.numero);
    $("#orientacion").val( inmueble.orientacion);
    $("#ubicacion").val( inmueble.ubicacion);

    $("#legajo").val( inmueble.legajo);
    $("#supCubierta").val( inmueble.supCubierta);
    $("#supLibre").val( inmueble.supLibre);
    $("#supTotal").val( inmueble.supTotal);

    $("#propietario").val( inmueble.propietario);
    $("#valor").val( inmueble.valor);
    $("#fechaIngreso").val( inmueble.fechaIngreso);
    $("#tipoOperacion").val( inmueble.tipoOperacion);

    $("#imagenes").attr("class","ocultar");
    $("#labelImagenes").attr("class","ocultar");
}

let vaciarForm = (  ) =>{
    
    $("#tipoInmueble").val( "" );
    $("#ambientes").val( "" );
    $("#departamento").val( "" );
    $("#piso").val( "" );

    $("#barrio").val( "" );
    $("#calle").val( "" );
    $("#entreCalle1").val( "" );
    $("#entreCalle2").val( "" );

    $("#localidad").val( "" );
    $("#numero").val( "" );
    $("#orientacion").val( "" );
    $("#ubicacion").val( "" );

    $("#legajo").val( "" );
    $("#supCubierta").val( "" );
    $("#supLibre").val( "" );
    $("#supTotal").val( "" );

    $("#propietario").val( "" );
    $("#valor").val( "" );
    $("#fechaIngreso").val( "" );
    $("#tipoOperacion").val( "" );

    $("#imagenes").attr("class","");
    $("#labelImagenes").attr("class","");

    $("#btnForm").attr("name","alta");
}

let cargarTabla = () =>{

    $("tbody").html("BUSCANDO...!");
    $.ajax({
        url: "cargarTodos.php",
        method: "get",
        data: "todos",

        success: ( resultado, estado )=>{
            try {
                // alert(estado + "\n " + resultado);
                
                let lista = JSON.parse( resultado);
                
                console.log( lista)
                
                $("tbody").empty();


                if( lista.resultado != false ){

                    lista.forEach( inmueble => {
                        let tr = $("<tr></tr>");
                        let td = $("<td></td>") ;
                        
                        let divContenedorPrincipal = $("<div></div>").attr("class","contenedorPrincipal");
                        let divContenedorFotoYBtn = $("<div></div>").attr("class","divContenedorFotoYBtn");
                        let divContenedorFoto = $("<div></div>").attr("class","contenedorFoto");
                        divContenedorFoto.attr("id",`${inmueble.legajo}`);
                        divContenedorFotoYBtn.append( divContenedorFoto );

                        
                        if(inmueble.imagenes.length > 0 ){
                            
                            divContenedorFoto.append(`<img class='fotoPDF'  src='data:image/jpeg;base64,${inmueble.imagenes[0]}' />`);
                            let cont =0;

                            let btnAnterior = $("<input type='button' value='<' class='btnAnterior'>").click( ()=>{
                                let cantidadDeImagenes = inmueble["imagenes"].length;
                                $("#contenedorModalFoto").append(`<img class='fotoPDF'  src='data:image/jpeg;base64,${inmueble.imagenes[0]}' />`);
                                $(`#${inmueble.legajo}`).empty();
                                cont--;
                                if( cont >= cantidadDeImagenes || cont < 0 ) cont = inmueble["imagenes"].length -1;
                                $(`#${inmueble.legajo}`).append(`<img class='fotoPDF'  src='data:image/jpeg;base64,${inmueble.imagenes[cont]}' />`);
                                
                            });
                            
                            let btnSigiente = $("<input type='button' value='>' class='btnSiguiente'>").click( ()=>{
                                let cantidadDeImagenes = inmueble["imagenes"].length;
                                $(`#${inmueble.legajo}`).empty();
                                cont++
                                if( cont >= cantidadDeImagenes ) cont = 0
                                $(`#${inmueble.legajo}`).append(`<img class='fotoPDF'  src='data:image/jpeg;base64,${inmueble.imagenes[cont]}' />`);
                                
                            });

                            divContenedorFotoYBtn.append(btnAnterior);
                            divContenedorFotoYBtn.append(btnSigiente);
                        }
                        else{
                            divContenedorFoto.append(`SIN FOTO`);
                            divContenedorFoto.append("<input type='button' value='Agregar Foto' id='agregarFotoVacio'> ");
                        }

                        divContenedorPrincipal.append(divContenedorFotoYBtn);
                        
                        let divIconos = $("<div></div>").attr("class", "contenedorIconos");
                        let btnModificar = $("<img  src='icon/modificar.png' class='iconos' id='modificar' 'alt='modificar'>").click( ()=>{
                            modificar( inmueble );
                        });
                        let btnEliminar = $("<img  src='icon/papelera.png' class='iconos' id='papelera' 'alt='papelera'>").click( ()=>{
                            eliminar( inmueble );
                        });
                        let btnPDF = $("<img  src='icon/pdf.png' class='iconos' id='pdf' 'alt='pdf'>").click( ()=>{
                            // descargaPDF();
                        });
                        let btnAmpliar = $(`<img  src='icon/ampliar.png' class='iconos' id='${inmueble.legajo}' 'alt='ampliar'>`).click( ()=>{
                            ampliar(inmueble);
                        });
                        divIconos.append(btnModificar);
                        divIconos.append(btnEliminar);
                        divIconos.append(btnPDF);
                        divIconos.append(btnAmpliar);
                        divContenedorPrincipal.append(divIconos);
                        
                        let divContenedorDetalle = $("<div></div>").attr("class","contenedorDetalle");
                        let divContenedorP = $("<div></div>").attr("class","contenedorP");
                        divContenedorP.append($("<p>Legajo : </p>").attr("class","pLegajo").append(inmueble["legajo"]) );
                        divContenedorP.append($("<p>Sucursal : Liniers</p>").attr("class","pSucursal"));
                        divContenedorP.append($("<p>Operacion : </p>").attr("class","pOperacion").append(inmueble["tipoOperacion"]));
                        divContenedorDetalle.append(divContenedorP);
                        
                        let divContenedorDiv = $("<div></div>").attr("class","contenedorDiv");
                        
                        let div1 = $("<div></div>").attr("class","div1 divGeneral");
                        div1.append( $("<p>Amb.......................</p>").append(inmueble["ambientes"]) );
                        div1.append( $("<p>Calle......................</p>").append(inmueble["calle"]) );
                        div1.append( $("<p>Nro........................</p>").append(inmueble["numero"]) );
                        div1.append( $("<p>Piso.......................</p>").append(inmueble["piso"]) );
                        div1.append( $("<p>Dto........................</p>").append(inmueble["departamento"]) );
                        div1.append( $("<p>Barrio....................</p>").append(inmueble["barrio"]) );
                        
                        let div2 = $("<div></div>").attr("class","div2 divGeneral");
                        div2.append( $("<p>Tipo Inmueble........</p>").append(inmueble["tipoInmueble"]) );
                        div2.append( $("<p>Valor......................</p>").append(inmueble["valor"]) );
                        div2.append( $("<p>Localidad...............</p>").append(inmueble["localidad"]) );
                        div2.append( $("<p>Orientacion............</p>").append(inmueble["orientacion"]) );
                        div2.append( $("<p>Fecha Ing..............</p>").append(inmueble["fechaIngreso"]) );
                        div2.append( $("<p>Ubicacion..............</p>").append(inmueble["ubicacion"]) );
                        
                        let div3 = $("<div></div>").attr("class","div3 divGeneral");
                        div3.append( $("<p>Entre Calle 1.........</p>").append(inmueble["entreCalle1"]) );
                        div3.append( $("<p>Entre Calle 2.........</p>").append(inmueble["entreCalle2"]) );
                        div3.append( $("<p>Propietario.............</p>").append(inmueble["propietario"]) );
                        div3.append( $("<p>Sub Cubierta..........</p>").append(inmueble["supCubierta"]) );
                        div3.append( $("<p>Sup. Libre...............</p>").append(inmueble["supLibre"]) );
                        div3.append( $("<p>Sup. Total...............</p>").append(inmueble["supTotal"]) );
                        
                        divContenedorDiv.append(div1);
                        divContenedorDiv.append(div2);
                        divContenedorDiv.append(div3);
    
                        divContenedorDetalle.append(divContenedorDiv);
                        
                        divContenedorPrincipal.append(divContenedorDetalle);
                        
                        td.append(divContenedorPrincipal);
                        tr.append(td);
                        $("tbody").append(tr);
                    });
                }
                else{
                    $("tbody").html(lista.mensaje);
                }
            }catch (error) {
                console.error("Error en la carga de datos:", error);
                alert("Error en la carga de datos. Consulta la consola para más detalles.");
            }
        }
    });
}

//----------------------------------------------------------
//                  BOTONES
//----------------------------------------------------------
$("#altaInmueble").click( ()=>{
    modalOn();
})

$("#cargarDatos").click( ()=>{
    cargarTabla();
});

//----------------------------------------------------------
//                  MODAL
//----------------------------------------------------------

$("#fomX").click( ()=>{
    vaciarForm()
    modalOff();
    $("#btnForm").text("Enviar");
})

$("#fotoX").click( ()=>{
    $("#contenedorModalFoto").empty();
    $("#seccionModalFoto").attr( "class", "seccionModalFoto off");
    $("header").attr("class", "");
    $("#secMenu").attr("class", "secMenu ");
    $("#secTable").attr("class", "secTable ");
    $("footer").attr("class", "");
})

let modalOn = () =>{
    $("#secFormulario").attr("class", "secFormulario on", );
    $("header").attr("class", "bloqueo");
    $("#secMenu").attr("class", "secMenu bloqueo");
    $("#secTable").attr("class", "secTable bloqueo");
    $("footer").attr("class", "bloqueo");
}

let modalOff = () =>{
    $("#secFormulario").attr("class", "secFormulario off", );
    $("header").attr("class", "");
    $("#secMenu").attr("class", "secMenu ");
    $("#secTable").attr("class", "secTable ");
    $("footer").attr("class", "");
}



