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

            <table>
                <tbody>
                    <tr>
                        <td>
<!-- 
                            <div class="contenedorPrincipal">
                                <div class="contenedorFoto" id="foto">
                                    <img src="imagen.jpeg" alt="">
                                </div>
                                
                                <div class="contenedorDetalle">

                                    <div class="contenedorP">
                                        <p class="pLegajo">Legajo:45234</p>
                                        <p>Sucursal</p>
                                        <p>Ope: Venta</p>
                                    </div>
                                
                                    <div class="contenedorDiv" id="contenedorDiv" >
                                        <div class="div1 divGeneral" id="div1">
                                            <p>Amb.......................</p>
                                            <p>Calle......................</p>
                                            <p>Nro........................</p>
                                            <p>Piso.......................</p>
                                            <p>Dto........................</p>
                                            <p>Barrio....................</p>
                                        </div>
                                        <div class="div2 divGeneral" id="div2">
                                            <p>Tipo Inmueble........</p>
                                            <p>Valor......................</p>
                                            <p>Localidad...............</p>
                                            <p>Orientacion............</p>
                                            <p>Fecha Ing..............</p>
                                            <p>Ubicacion..............</p>
                                        </div>
                                        <div class="div3 divGeneral" id="div3">
                                            <p>Entre Calle 1.........</p>
                                            <p>Entre Calle 2.........</p>
                                            <p>Propietario.............</p>
                                            <p>Sub Cubierta..........</p>
                                            <p>Sup. Libre...............</p>
                                            <p>Sup. Total...............</p>
                                        </div>  
                                    </div>
                                </div>                
                            </div>

                        </td> -->
                    </tr>
                </tbody>
            </table>
        </section>

        <section name="secFormulario" class="secFormulario off" id="secFormulario">
            <div class="encabezadoModal">
                <h2>Datos de la Propiedad</h2>
                <p id="fomX">X</p>
            </div>
            <!-- FALTA EL MULTIMEDIA PARA LA FOTO EN EL FORM -->
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

                    <label for="fotos">Guardar Fotos</label>
                    <input type="file" name="imagenes[]" id="i" multiple accept="image/*">
                </div>

                <button type="submit">Enviar</button>
            </form>
        </section>
    
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./index.js"></script>
    <footer>
    
    </footer>

</body>
</html>