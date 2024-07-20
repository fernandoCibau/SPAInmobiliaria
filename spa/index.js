//----------------------------------------------------------
//                  FORMULARIO
//----------------------------------------------------------

$("#formAltaPropiedad").submit( (e)=>{
    e.preventDefault();
    // let imagenes = $("#i")[0].files;

    if( confirm("¿Confirmar el alta?") ){
        let form = $("#formAltaPropiedad");
        let formData = new FormData(form[0]);
        // formData.append("listaImagenes", imagenes);
        ajaxAlta( formData );
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
            alert(resultado);
            console.log(resultado)
        }
    });
}

$("#cargarDatos").click( ()=>{
    $.ajax({
        url: "cargarTodos.php",
        method: "get",
        data: "todos",

        success: ( resultado, estado )=>{
            alert(estado + " " + resultado)

            let lista = JSON.parse( resultado);

            console.log( lista)

            $("tbody").empty();
            lista.forEach( inmueble => {
                let tr = $("<tr></tr>");
                let td = $("<td></td>") ;

                // for( let datos in inmueble ){

                    let divContenedorPrincipal = $("<div></div>").attr("class","contenedorPrincipal");
                    
                    let divContenedorFoto = $("<div></div>").attr("class","contenedorFoto");
                    // divContenedorFoto.append("<img src='imagen.jpeg'></img>");
                    divContenedorFoto.append( " <img class='fotoPDF' src='data:img/jpeg;base64,"+ inmueble["imagenes"][0] + " ' ></img>" );
                    // console.log( inmueble.imagenes)
                    divContenedorPrincipal.append(divContenedorFoto);
                    
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
                // }
            });
            
        }
    })
})


//----------------------------------------------------------
//                  MODAL
//----------------------------------------------------------
$("#altaInmueble").click( ()=>{
    $("#secFormulario").attr("class", "secFormulario on", );
    $("header").attr("class", "bloqueo");
    $("#secMenu").attr("class", "secMenu bloqueo");
    $("#secTable").attr("class", "secTable bloqueo");
    $("footer").attr("class", "bloqueo");

})

$("#fomX").click( ()=>{
    $("#secFormulario").attr("class", "secFormulario off", );
    $("header").attr("class", "");
    $("#secMenu").attr("class", "secMenu ");
    $("#secTable").attr("class", "secTable ");
    $("footer").attr("class", "");
})



