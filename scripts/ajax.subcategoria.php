<?php

require includeLib($aConfiguracion,null,'inicio');

$aSubCategorias = obtenerSubcategorias($db,$_POST['idCat'],true);       

echo $jsnConsulta = json_encode($aSubCategorias);

?>