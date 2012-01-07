<?php
header('Content-type:text/html;charset=utf8');
include('libreria.php');
include_once('clases/Articulo.php');
include_once('db/searchs.php');
conectarDB();
$texto = $_REQUEST['nombre'];
$sugerencias = array();
$articulos=buscarArticulosPorNombre($texto);
$size=count($articulos);
for($i=0;$i<$size;$i++){
    $sugerencias[] = $articulos[$i]->getNombre().'-'.$articulos[$i]->getPrecio().'+'.$articulos[$i]->getCantidad();
}
if(count($sugerencias)>0) {
	  echo "[ \"";
	  echo implode($sugerencias, "\", \"");
    echo "\"]";
}else {
	  echo "[]";
}
?>