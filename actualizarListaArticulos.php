<?php
include("head.html");
include("menu.html");
?>
<h2>Lista de Articulos en el Inventario</h2>
<br />
<table>
  <tr class="first">
    <td>Nombre </td>
    <td>Descripcion </td>
    <td>Cantidad </td> 
    <td>Precio Unitario Bsf</td>
  </tr>
  <tr>
    <td>Tazas</td>
    <td>Tazas Termicas que se revelan con el calor</td>
    <td>25+<input type="text" id="cantidad" style="width:24px;" name="cantidad" value="0" size="1" onkeypress="return permite(event , 'num');" /> </td>
    <td>50 </td>
  </tr>
  <tr>
    <td>Chapas</td>
    <td>Tamaño Mediano </td>
    <td>100+<input type="text" id="cantidad" style="width:24px;" name="cantidad" value="0" size="1" onkeypress="return permite(event , 'num');" /> </td>
    <td>5 </td>
  </tr>
  <tr>
    <td>Camisas S</td>
    <td>Camisas de Poliester Talla S </td>
    <td>50 </td>
    <td>60 </td>
  </tr>
  <tr>
    <td>Pendon 1m</td>
    <td>Pendones con Tamaño Igual a un metro cuadrado</td>
    <td>20 </td>
    <td>150 </td>
  </tr>
</table>
</div>
<?php
include("menuInventario.html");
include("foot.html");
?>