<?php

if (!$iIdCat = obtenerIdCategoria($db, $iIdSub = obtenerIdsubcategoriaURL($db, $sId), $sNombre))
        header("Location: /error404");

        
$sImagen = dameImagenCat($iIdCat,true);

$aDatosAnuncio = obtenerListadoAnuncios($db, $iIdSub, $iUsoHorario);

if(!$aDatosAnuncio[0]['idimagen']) $aDatosAnuncio[0]['idimagen'] = 1;

$tpl->assign('aDatosAnuncio', $aDatosAnuncio);
$tpl->assign('aDatosAnuncioControl', count($aDatosAnuncio)>0);
$tpl->assign('iNumAnuncios', $iRes = $db->getVar("SELECT count(idAnuncio) FROM anuncio WHERE idSubcategoria = " . $iIdSub));
$tpl->assign('estiloImagen', $sImagen);
$tpl->assign('nombreSubCat', $sNombre);
$tpl->assign('tplInicio', "");
$tpl->assign('mayorUno', $iRes > 1);
$tpl->assign('pestana' , $sPestana);
$tpl->assign('subCat' , $sId);
$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/listadoAnuncios_lateral.tpl'));

$sContenido = $tpl->getContent($VarEntorno->sPaginaTmpl);

?>
