<?php
 
$iIdAnuncio = $mxParametro[1];
$sUrlAnterior = '/' . $sPestana . '/' .$sPagina . '/listado/' .$mxParametro[0];

$db->execute('UPDATE anuncio SET vistos = (vistos+1) WHERE idAnuncio =' . $iIdAnuncio );


$aDatosAnuncio = obtenerDetalleAnuncio($db, $iIdAnuncio, $iUsoHorario);

$sImagen = dameImagenCat($db->getVar('SELECT c.idCategoria FROM subcategoria sc INNER JOIN categoria c ON sc.idCategoria = c.idCategoria WHERE quitar_acentos(subNombre) LIKE \''.$mxParametro[0].'\''),true);
$sNombre = $db->getVar('SELECT subNombre FROM subcategoria WHERE quitar_acentos(subNombre) LIKE \''.$mxParametro[0].'\'');
$aImagenes = $db->getRecords('SELECT idImagen FROM anuncioImagen WHERE idAnuncio =' . $iIdAnuncio . ' ORDER BY principal DESC');

if( ($iNumImagenes = count($aImagenes)) > 1){
   $tpl->assign('iNumImagenes', $iNumImagenes); 
   $tpl->assign('aImagenesAnuncio', $aImagenes); 
   $tpl->assign('contenidoTablaImagen' , $tpl->getContent(RAIZ_TPL.'/anuncioImagenTabla.tpl'));
}else $tpl->assign('contenidoTablaImagen' , '');

$aDatosAnuncio['descripcion'] = nl2br($aDatosAnuncio['descripcion']);
if(!$aDatosAnuncio['idimagen']) $aDatosAnuncio['idimagen'] = 1;


$tpl->assign('estiloImagen', $sImagen);
$tpl->assign('urlAnterior' , $sUrlAnterior );
$tpl->assign('idAnuncio' , $iIdAnuncio);
$tpl->assign('aDatosAnuncio', $aDatosAnuncio);
$tpl->assign('nombreSubCat', $sNombre);

$sContenido = $tpl->getContent($VarEntorno->sPaginaTmpl);
$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/detalleAnuncios_lateral.tpl'));

?>
