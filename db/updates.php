<?php

function actualizarCantidadArticulo($id,$cantidad){
  $sql="UPDATE Articulo SET Cantidad=$cantidad WHERE Id=$id";
  mysql_query($sql);
}

function actualizarArticulo($articulo){
  $sql="UPDATE Articulo SET Nombre='".$articulo->getNombre()."', Precio=".$articulo->getPrecio().
    ", Descripcion='".$articulo->getDescripcion()."', Cantidad=".$articulo->getCantidad().
    " WHERE Id=".$articulo->getId();
  mysql_query($sql);
}

function actualizarVendedorCifrado($vendedor){
  $sql="UPDATE Vendedor SET Nombre='".$vendedor->getNombre()."', Apellido='".$vendedor->getApellido().
    "', Cargo='".$vendedor->getCargo()."', Clave='".$vendedor->getClave()."', Nivel=".$vendedor->getNivel().
    " WHERE Cedula=".$vendedor->getCedula();
  mysql_query($sql);
}

function actualizarVendedorSinCifrar($vendedor){
  $sql="UPDATE Vendedor SET Nombre='".$vendedor->getNombre()."', Apellido='".$vendedor->getApellido().
    "', Cargo='".$vendedor->getCargo().", Clave=AES_ENCRYPT('text','".$vendedor->getClave()."'), Nivel=".$vendedor->getNivel().
    " WHERE Cedula=".$vendedor->getCedula();
  mysql_query($sql);
}

?>