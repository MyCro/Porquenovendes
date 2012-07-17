<?php

$sHtmlCategoria = listadoCategorias ($db, $tpl, $sPestana);

//Conseguir anuncios para "ULTIMOS ANUNCIOS"
$aDatosArray = $db->getRecords("SELECT anuncioImagen.idimagen, idSubcategoria, anuncio.idAnuncio, CONCAT(UCASE(SUBSTRING(tituloAnuncio,1,1)),
    LOWER(SUBSTRING(tituloAnuncio,2,20)),'') as tituloAnuncio, quitar_acentos(tituloAnuncio) 
    as tituloAUrl , valor
    FROM (anuncio INNER JOIN municipio ON anuncio.idMunicipio = municipio.idMunicipio) 
    LEFT JOIN anuncioImagen ON anuncioImagen.idAnuncio = anuncio.idAnuncio  WHERE principal = 1 ORDER BY fecha DESC LIMIT 0,3");

$conta = 0;
if($aDatosArray){
    foreach($aDatosArray AS $aAnuncio){

        $sSql = "SELECT idAnuncio FROM anuncio WHERE idAnuncio = " . $aAnuncio['idAnuncio'];
        $urlAnuncio = obtenerUrlAnuncio($db, $db->getVar($sSql), $aAnuncio['idSubcategoria'], $iUsoHorario);

        $aDatosArray[$conta]['url']= $urlAnuncio;

        $conta ++;
    }


$tpl->assign('aDatosArray' , $aDatosArray);
}else $tpl->assign('aDatosArray' , 'No hay na');
$tpl->assign('tplInicio', $sHtmlCategoria);
$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/inicio_lateral.tpl'));

$sContenido = $tpl->getContent($VarEntorno->sPaginaTmpl);

?>