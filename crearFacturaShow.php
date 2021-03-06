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
            <?php echo fecha_es2in($factura->getFechaRegistro()); ?></label><br />
    </div>
    <fieldset id="factura" >
        <legend align="center">Datos del Cliente</legend>
        <br />
        <label for="cedula" class="bold">Cedula o RIF: </label><label
            for="cedula_texto"><?php echo $cliente->getNacionalidad();?></label>-<label
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
                <td align="center"><?php echo number_format(($articulos[$j]->getPrecio()/1.12),2);?></td>
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
        <label for="detalles" class="bold">Detalles de Diseño y Produccion </label><br />
        <label for="detalles_texto"><?php echo $factura->getDetalles();?></label>
        <br /><br /><br />
        <label class="bold" >Abono: </label><label id="abono" class="bold" ><?php echo $abono;?></label><br />
        <label id="resta" class="bold">Resta <?php echo $total-$abono;?> </label><br />
        <br />
        <label >Estado de la Factura: </label><label id="estado" ><?php echo $factura->getEstado(); ?></label><br />
        <br /><br />
        <input type="button" value="Imprimir" onclick="ir('imprimirFactura.php?Codigo=<?php echo $codigo;?>');" /></a>
        <input type="button" value="Entregar" onclick="if(document.getElementById('estado').innerHTML!= 'Anulada'){
            if(<?php echo $total-$abono;?> == 0){
                if(confirm('¿Esta Seguro que Desea Entregar esta Factura? (Esta Accion es Irreversible)')){
                    ir('entregarFactura.php?Codigo=<?php echo $codigo;?>');}}}
            else{alert('No puedes Entregar los Productos de una Factura Anulada');}
            if(<?php echo $total-$abono;?> > 0){alert('Debe Cancelar el Total de la Factura para Poder Entregar el Producto');}"  /></a>
        <input type="button" value="Anular" onclick="if(document.getElementById('estado').innerHTML != 'Entregada'){
                if(confirm('¿Esta Seguro que Desea Anular esta Factura? (Esta Accion es Irreversible)')){
                    ir('anularFactura.php?Codigo=<?php echo $codigo;?>');}}
                else{alert('No Puedes Anular una Factura de una Venta ya Entregada');}" /></a>
        <input type="button" value="Abonar" onclick="resta = <?php echo $total-$abono;?>;
                if(resta > 0){abono = abonarCuenta(resta);
                    if(abono != 0){
                        abono = (abono*1) + (document.getElementById('abono').innerHTML*1);
                        ir('abonarFactura.php?Codigo=<?php echo $codigo;?>&Abono='+abono);}}
                else{alert('La Factura ya esta Totalmente Cancelada');}" /></a>
        <input type="button" value="Cola de Diseño" onclick="ir('coladisenio.php');" />
        <input type="button" value="Cola de Produccion" onclick="ir('colaproduccion.php');" />
        <input type="button" value="Cola de Entrega" onclick="ir('colaentrega.php');" />
        <input type="button" value="Salir" onclick="ir('facturacion.php');" />
    </fieldset>
  </form>
</div>
</div>
<?php
include('menuFacturacion.php');
include('foot.html');
?>

