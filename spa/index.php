<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Inmobiliario</title>
</head>
<body>
    
    <header>
        <h1>Inmobiliaria S.A.</h1>
        <div>
            <input type="button" value="Cargar Datos" id="cargarDatos">
            <input type="button" value="Alta Inmueble" id="altaInmueble">
        </div>
    </header>

    <main>


        <section name="menu" class="secMenu" id="secMenu" >
            <p>menu</p>
            <div id="resultado"></div>
        </section>

        <section name="table" class="secTable" id="secTable">
        <div class="contenedorBarra">
        <div class="icono"><i class="fa-duotone fa-solid fa-trash-can"></i></div>
        </div>

            <table>
                <tbody>                             
                </tbody>
            </table>
        </section>

        <section name="secFormulario" class="secFormulario off" id="secFormulario">
            <div class="encabezadoModal">
                <h2>Datos de la Propiedad</h2>
                <p id="fomX">X</p>
            </div>

            <form action="#" method="POST" id="formAltaPropiedad" enctype="multipart/form-data"> 

                <div class="form-row">
                    <label for="tipoInmueble">Tipo Inmueble:</label>
                    <select name="tipoInmueble" id="tipoInmueble">
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="casa">Casa</option>
                        <option value="departamento">Departamento</option>
                        <option value="ph">Ph</option>
                    </select>

                    <label for="ambientes">Ambientes:</label>
                    <input type="text" id="ambientes" name="ambientes">

                    <label for="departamento">Dto:</label>
                    <input type="text" id="departamento" name="departamento">

                    <label for="piso">Piso:</label>
                    <input type="text" id="piso" name="piso">
                </div>

                <div class="form-row">
                    <label for="barrio">Barrio:</label>
                    <input type="text" id="barrio" name="barrio">

                    <label for="calle">Calle:</label>
                    <input type="text" id="calle" name="calle">

                    <label for="entreCalle1">Entre Calle 1</label>
                    <input type="text" id="entreCalle1" name="entreCalle1">

                    <label for="entreCalle2">Entre Calle 2:</label>
                    <input type="text" id="entreCalle2" name="entreCalle2">

                </div>

                <div class="form-row">
                    <label for="localidad">Localidad:</label>
                    <input type="text" id="localidad" name="localidad">

                    <label for="numero">Número:</label>
                    <input type="int" id="numero" name="numero">

                    <label for="orientacion">Orientación:</label>
                    <input type="text" id="orientacion" name="orientacion">

                    <label for="ubicacion">Ubicación:</label>
                    <input type="text" id="ubicacion" name="ubicacion">
                </div>

                <div class="form-row">
                    <label for="legajo">Legajo:</label>
                    <input type="text" id="legajo" name="legajo">

                    <label for="supCubierta">Sup Cubierta:</label>
                    <input type="text" id="supCubierta" name="supCubierta">

                    <label for="supLibre">Sup. Libre:</label>
                    <input type="text" id="supLibre" name="supLibre">

                    <label for="supTotal">Sup. Total:</label>
                    <input type="text" id="supTotal" name="supTotal">

                </div>

                <div class="form-row">
                    <label for="propietario">Propietario:</label>
                    <input type="text" id="propietario" name="propietario">

                    <label for="valor">Valor:</label>
                    <input type="text" id="valor" name="valor">

                    <label for="fechaIngreso">Fecha Ing:</label>
                    <input type="date" id="fechaIngreso" name="fechaIngreso">

                    <label for="tipoOperacion">Tipo Operacion</label>
                    <select name="tipoOperacion" id="tipoOperacion">
                        <option value="" selected disabled>Selecciona una opción</option>
                        <option value="alquiler">Alquiler</option>
                        <option value="venta">Venta</option>
                    </select>

                    <label for="fotos" id="labelImagenes">Guardar Fotos</label>
                    <input type="file" name="imagenes[]" id="imagenes" multiple accept="image/*">
                </div>

                <button type="submit" id="btnForm" name="alta">Enviar</button>
            </form>
        </section>

        <section name="modalFoto" class="seccionModalFoto off" id="seccionModalFoto">
            <div class="encabezadoModalFoto">
                <p id="fotoX">X</p>
            </div>
            <div class="contenedorModalFoto" id="contenedorModalFoto">
            </div>
        </section>
    
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./index.js"></script>
    <footer>
    
    </footer>

</body>
</html>