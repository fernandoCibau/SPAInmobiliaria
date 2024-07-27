//-----------------------------------------------------------------
//                      FORM
//-----------------------------------------------------------------
$("#formSesion").submit( (e)=>{
    e.preventDefault();
    let form = $("#formSesion");
    let formData = new FormData(form[0]);
    ajaxAutenticacion(formData);
})

//-----------------------------------------------------------------
//                      FUNCIONES
//-----------------------------------------------------------------
let ajaxAutenticacion = (formData)=>{
    $.ajax({

        url: "autenticacion.php",
        method: "post",
        data:  formData ,
        contentType: false,
        processData: false,

        success: (resultado, estado) => {
            
            try{
                let datos = JSON.parse( resultado);

                console.log(datos)

                if( datos.operacion ){
                    location.href="./formularioAlta";
                }
                else{
                    alert("noo");
                }


            }catch (error) {
                console.error("Error en la autenticacion de los datos:", error);
                alert("Error en la autenticacion de datos. Consulta la consola para más detalles.");
            }

        }
    })
}










