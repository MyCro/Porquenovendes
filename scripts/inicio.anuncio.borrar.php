<?php

$pass = limpiarPostTexto('pass');
$idAnuncio = limpiarPostTexto('idAnuncio');

if($db->delete('anuncio' , 'clave LIKE \'' . $pass . '\' AND idAnuncio = ' . $idAnuncio) > 0)
        $sContenido = $tpl->getContent(RAIZ_TPL.'/borrar_correcto.tpl');
else 
    $sContenido = $tpl->getContent(RAIZ_TPL.'/borrar_error.tpl');

$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/listadoAnuncios_lateral.tpl'));


?>