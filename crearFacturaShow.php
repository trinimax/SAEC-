<?php
include('session.php');
include('head.html');
include('menu.php');
?>
<script type="text/javascript" src="js/validacion.js"></script>
<h2>Factura</h2>
<div id="factura">
    <div id="fecha" style="text-align:right;">
        <label for="fecha" class="bold">Fecha: </label><label for="fecha_texto">
            <?php echo @date("d-m-Y"); ?></label><br />
    </div>
    <fieldset id="factura" >
        <legend align="center">Datos del Cliente</legend>
        <br />
        <label for="cedula" class="bold">Cedula: </label><label
            for="cedula_texto"><?php echo $cliente->getCedula();?></label>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <label for="nombre" class="bold">Nombre: </label><label for="nombre_texto">
            <?php echo $cliente->getNombre();?></label>
        <br /><br />
        <label for="direccion" class="bold">Direccion: </label><label for="direccion_texto">
            <?php echo $cliente->getDireccion();?></label>
        <br /><br />
        <label for="correo" class="bold">Correo Electronico: </label><label for="correo_text">
            <?php echo $cliente->getCorreo();?></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label for="telefono" class="bold">Telefono: </label><label for="telefono_texto">
            <?php echo $cliente->getTelefono();?></label>
        <br /><br />
    </fieldset>
    <fieldset>
        <legend>Datos del Pedido</legend>
        <br />
        <label for="vendedor" class="bold">Vendedor: </label><label for="vendedor_texto">
            <?php echo $vendedor; ?></label>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <label for="fecha_entrega" class="bold">Fecha de Entrega: </label><label
            for="fecha_entrega_texto"><?php echo fecha_es2in($factura->getFechaEntrega()); ?></label>
        <br />
        <br />
        <label for="productos" class="bold">Productos</label>
        <br />
        <table>
            <tr class="first">
                <td>Cantidad </td>
                <td>Nombre </td>
                <td align="center">Precio Unitario Bsf</td>
                <td align="right" >Total Bsf</td>
            </tr>
            <?php $total=0;?>
            <?php for($j=0;$j<$k;$j++): ?>
            <tr>
                <td><?php echo $cantidad[$j]; ?></td>
                <td><?php echo $articulos[$j]->getNombre();?> </td>
                <td align="center"><?php echo number_format(($articulos[$j]->getPrecio()/1.12),3);?></td>
                <td align="right"><?php echo number_format(($articulos[$j]->getPrecio()*$cantidad[$j])/1.12,2);?></td>
                <?php $total+=($articulos[$j]->getPrecio()*$cantidad[$j]);?>
            </tr>
            <?php endfor; ?>
        </table>
        <table align="right" style="width:30%;">
            <tr>
                <td class="bold">Sub-Total</td>
                <td align="right"><?php echo number_format(($total/1.12),2);?></td><!--TODO Obtener el valor del IVA de una tabla de valores guardada en la BD-->
            </tr>
            <tr>
                <td class="bold">IVA 12%</td>
                <td align="right"><?php echo number_format($total-$total/1.12,2);?></td>
            </tr>
            <tr>
                <td class="bold">Total</td>
                <td align="right"><?php echo $total;?></td>
            </tr>
        </table>
        <br />
        <br />
        <br />
        <br />
        <label for="detalles" class="bold">Detalles de Diseño y Produccion </label><br />
        <label for="detalles_texto"><?php echo $factura->getDetalles();?></label>
        <br /><br />
        <input type="button" value="Imprimir" onclick="ir('imprimirFactura.php?Codigo=<?php echo $codigo;?>');" /></a>
        <input type="button" value="Anular" /></a>
        <input type="button" value="Salir" onclick="ir('facturacion.php');" />
    </fieldset>
  </form>
</div>
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>

