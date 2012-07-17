<?php

require includeLib($aConfiguracion,null,'inicio');

$aCategorias = obtenerCategorias($db);
$iLongitudNombre = '15';
foreach($aCategorias as $iKey=>$elemento){
    if (strlen($aCategorias[$iKey]['catNombre'])>$iLongitudNombre) 
        $aCategorias[$iKey]['catNombre'] = substr($aCategorias[$iKey]['catNombre'], 0, $iLongitudNombre).'.';    
    $aCategorias[$iKey]['imgmin'] = dameImagenCat($elemento['idCategoria'],true);
}//foreach*/

$aProvincias = obtenerProvincias($db); 

$tpl->assign('aProvincias', $aProvincias);
$tpl->assign('aCategorias', $aCategorias);
$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/publicar_lateral.tpl'));

$sContenido = $tpl->getContent($VarEntorno->sPaginaTmpl);


?>
