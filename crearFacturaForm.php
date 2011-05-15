<?php
include("head.html");
include("menu.html");
?>
<link href="css/calendario.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/calendar.js"></script>
<script type="text/javascript" src="js/calendar-es.js"></script>
<script type="text/javascript" src="js/calendar-setup.js"></script>
<h2>Crear Factura</h2>
<div id="crear">
  <form name="form" action="crearFacturaFormExecute.php" method="post" title="Permite Crear una Factura" onsubmit="return validarVacio(this);">
    <fieldset id="factura" >
      <legend align="center">Datos del Cliente</legend>
      <br />
      <label for="fecha">Fecha: </label><input type="text" id="fecha" name="fecha" onfocus="limpiar(this);" size="7" value="<?php echo @date("d-m-Y"); ?>" readonly="true" />
      <label for="cedula">Cedula: </label><input type="text" id="cedula" name="cedula" onfocus="limpiar(this);" size="9" value="123456789" readonly="true" />
      <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" onfocus="limpiar(this);" size="27" value="Pedro Perez Alfonso" />
      <br />
      <label for="direccion">Direccion: </label><input type="text" id="direccion" name="direccion" onfocus="limpiar(this);" size="57" value="Av 4 con calle 18. Casa # 100. Centro" />
      <br />
      <label for="correo">Correo Electronico: </label><input type="text" id="correo" name="correo" onfocus="limpiar(this);" size="27" value="pedroperezalfonso@hotmail.com" />
      <label for="telefono">Telefono: </label><input type="text" id="tlf_codigo" name="tlf_codigo" onfocus="limpiar(this);" size="3" value="0274" /> - <input type="text" id="tlf_numero" name="tlf_numero" onfocus="limpiar(this);" size="9" value="2442424" />
    </fieldset>
    <fieldset>
        <legend>Datos del Pedido</legend>
        <br />
        <label for="vendedor">Vendedor: </label><input type="text" id="vendedor" name="vendedor" onfocus="limpiar(this);" size="25" value="Gabriel Albornoz" readonly="true" />
        <label for="fecha_entrega">Fecha de Entrega: </label><input type="text" id="fecha_entrega" name="fecha_entrega" class="for_txtInputFecha" onfocus="limpiar(this);" size="9" value="" tabindex="2"  /> <!--Aqui debe ir readonly="readonly", se lo quite para poder probar algunas cosas TODO -->
        <img class="for_imgFecha" id="Imgfecha_entrega" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <script type="text/javascript">
            Calendar.setup({inputField:"fecha_entrega", button:"Imgfecha_entrega"});
            Calendar.setup({inputField:"fecha_entrega", eventName: "click", button:"Imgfecha_entrega"});
        </script>
<!--        <input id="fecha1" size= "9" name="fecha1" class="for_txtInputFecha" type="text" value="" tabindex="2" readonly="readonly" />
        <img class="for_imgFecha" id="Imgfecha1" src="calendario/calendario.png" title="Seleccione fecha" alt="Imagen del Calendario" aling="top" />
        <!-- definicion de los calendario en el formulario 
        <script type="text/javascript">
            Calendar.setup({inputField:"fecha1", button:"Imgfecha1"});
            Calendar.setup({inputField:"fecha1", eventName: "click", button:"Imgfecha1"});
        </script>-->
        <br />
        <label for="productos">Productos</label>
        <br />
        <table align="center">
            <tr class="first">
                <td>Cantidad </td>
                <td>Nombre </td>
                <td>Precio Unitario </td>
                <td>Total </td>
            </tr>
            <tr>
                <td>2 </td>
                <td>Tazas </td>
                <td>25 </td>
                <td>50 </td>
            </tr>
            <tr>
                <td>10</td>
                <td>Chapas </td>
                <td>10 </td>
                <td>100 </td>
            </tr>
        </table>
        <input type="button" value="Agregar" />
        <!-- TODO: Codificar los productos y boton agregar  -->
        <br />
        <label for="vendedor">Detalles de Diseño y Produccion </label><br /><textarea id="detalles" name="detalles" cols="60" rows="5" onfocus="limpiar(this); limpiarT(this);">
        Aqui se agregan los detalles del pedido.
        </textarea>
        <br /><br />
        <input type="submit" value="Facturar" />
        <input type="button" value="Cancelar" onclick="ir('facturacion.php');" />
    </fieldset>
  </form>
</div>
</div>
<?php
include("menuFacturacion.html");
include("foot.html");
// debo poder incluir productos, con sus cantidades, y mostrar el precio unitario de ese producto, fecha de entrega, y un textarea, para Detalles de Diseño y Produccion
?>
