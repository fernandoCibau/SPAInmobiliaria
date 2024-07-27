//------------------------------------------------------------------
//                  FORMULARIO
//------------------------------------------------------------------

$("#formAlta").submit( e=>{
    e.preventDefault();
    let form = $("#formAlta");
    let formData = new FormData(form[0]);
    ajaxUsuarioAlta(formData);
});

//------------------------------------------------------------------
//                  FUNCIONES
//------------------------------------------------------------------

let ajaxUsuarioAlta = (formData) =>{
    $.ajax({

        url: "usuarioAlta.php",
        method: "post",
        data: formData,
        contentType: false,
        processData: false,

        success: (resultado, estado) =>{
            let datos = JSON.parse(resultado);

            console.log(resultado.mensaje);

        }

    })
}

//------------------------------------------------------------------
//                  BOTONES
//------------------------------------------------------------------
$("#cerrarSesion").click( ()=>{
    if(confirm("¿Confirmar?")){
        location.href="../cerrarSesion.php";
    }
})


