<?php

function obtenerSubcategorias($db, $idCat = 0, $bUFT8 = false){
    $aResultado = $db->getRecords("SELECT s.idSubcategoria, s.subNombre, quitar_acentos(s.subNombre) as nombreURL, IF((SELECT count(*) FROM anuncio as a WHERE a.idSubcategoria = s.idSubcategoria),'true','') as numeroAnuncio FROM subcategoria as s WHERE s.idCategoria = ? ", $idCat);    

    if (!$bUFT8) return $aResultado;
    else { 
        foreach ($aResultado as $Pos=>$aDatos) {
            $aResultado[$Pos]['subNombre'] = utf8_encode($aDatos['subNombre']);
        }    
        return $aResultado; } 
}//funcion obtenerSubcategorias

function obtenerSubcategoria($db, $idSubCat = 0, $bUFT8 = false){
    $aResultado = $db->getRecord("SELECT s.idSubcategoria, s.subNombre, quitar_acentos(s.subNombre) as nombreURL, IF((SELECT count(*) FROM anuncio as a WHERE a.idSubcategoria = s.idSubcategoria),'true','') as numeroAnuncio FROM subcategoria as s WHERE s.idSubCategoria = ? ", $idSubCat);
    if (!$bUFT8) return $aResultado;
    else { $aResultado['subNombre'] = utf8_encode($aResultado['subNombre']);  return $aResultado; }
}//funcion obtenerSubcategorias

function obtenerCategorias($db){
        return $db->getRecords('SELECT idCategoria, catNombre FROM categoria ');
}//function obtenerCategorias


function obtenerListadoAnuncios($db,$iIdSub = 1,$iUsoHorario = 6){
    
    $aDatosArray = $db->getRecords("SELECT anuncioImagen.idimagen, anuncio.idAnuncio, tituloAnuncio, quitar_acentos(tituloAnuncio) as tituloAUrl , valor, nombreMunicipio, CONCAT(UCASE(SUBSTRING(descripcion,1,1)),LOWER(SUBSTRING(descripcion,2,120)),' ...'), 
    IF (DATEDIFF(DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'),DATE_FORMAT(DATE_ADD(NOW(), INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d')) =0,
    CONCAT('Hoy, ',DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%H:%i'))
    ,IF (DATEDIFF(DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'),DATE_FORMAT(DATE_ADD(NOW(), INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'))=-1 ,
    CONCAT('Ayer, ',DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%H:%i'))
    ,DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR), '%d/%m/%Y %H:%i'))) as fecha
    FROM (anuncio INNER JOIN municipio ON anuncio.idMunicipio = municipio.idMunicipio) LEFT JOIN anuncioImagen ON anuncioImagen.idAnuncio = anuncio.idAnuncio  WHERE principal = 1 AND idSubcategoria = ".$iIdSub." ORDER BY fecha DESC");
    
    return (is_array($aDatosArray))?$aDatosArray:array(); 
    
}//function ObtenerListadoAnuncios($db)

function obtenerUrlAnuncio ($db, $iId, $subcategoria, $iUsoHorario) {
    $sId = obtenerSubcategoria($db, $subcategoria);
    $iIdSub = obtenerIdsubcategoriaURL($db, $sId['subNombre']);
    $aDatosAnuncio = obtenerDetalleAnuncio($db, $iId, $iUsoHorario);
    return '/inicio/anuncio/detalle.'.$sId['nombreURL'].'.'.$iId.'/'.$aDatosAnuncio['tituloAUrl'];
} //

function obtenerDetalleAnuncio($db,$iIdAnuncio = 1,$iUsoHorario = 6){
    
    
    $aDatosArray = $db->getRecord("SELECT anuncioImagen.idimagen, descripcion,nombre, anuncio.idAnuncio,telefono,vistos,emails, tituloAnuncio, quitar_acentos(tituloAnuncio) as tituloAUrl , valor, nombreMunicipio, CONCAT(UCASE(SUBSTRING(descripcion,1,1)),LOWER(SUBSTRING(descripcion,2,120)),' ...'), 
    IF (DATEDIFF(DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'),DATE_FORMAT(DATE_ADD(NOW(), INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d')) =0,
    CONCAT('Hoy, ',DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%H:%i'))
    ,IF (DATEDIFF(DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'),DATE_FORMAT(DATE_ADD(NOW(), INTERVAL ".$iUsoHorario." HOUR),'%y-%m-%d'))=-1 ,
    CONCAT('Ayer, ',DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR),'%H:%i'))
    ,DATE_FORMAT(DATE_ADD(FPublicacion, INTERVAL ".$iUsoHorario." HOUR), '%d/%m/%Y %H:%i'))) as fecha
    FROM (anuncio INNER JOIN municipio ON anuncio.idMunicipio = municipio.idMunicipio) LEFT JOIN anuncioImagen ON anuncioImagen.idAnuncio = anuncio.idAnuncio  WHERE anuncio.idAnuncio = ".$iIdAnuncio);
    
    
    
    return (is_array($aDatosArray))?$aDatosArray:array(); 
    
}//function ObtenerListadoAnuncios($db)


function obtenerIdCategoria($db,$iIdSub = 1, &$sNombreCat){
    if (!$iIdSub) return false;
    $aDatos = $db->getRecord("SELECT idCategoria, SubNombre FROM subcategoria WHERE idSubcategoria = ".$iIdSub);
    $sNombreCat = $aDatos['SubNombre'];
    return $aDatos['idCategoria'];
}//function obtenerIdCategoria($db,$iIdSub)




function dameImagenCat($iId = 1,$bObtenerMin = false) {
    $aCategoriaestilo = Array(1=>'catelectronica', 2=>'catcasa', 3=>'cattrabajo', 4=>'catcoche',5=>'catpiso' , 6=>'catocio');   
    return ($bObtenerMin)? $aCategoriaestilo[$iId]."min":$aCategoriaestilo[$iId];
}




function obtenerIdsubcategoriaURL($db,$sId ){
    $iNumero = $db->getVar("SELECT count(*) FROM subcategoria WHERE quitar_acentos(subNombre) LIKE quitar_acentos('" .$sId."')");
    if ($iNumero < 1) return false;
    $sConsulta = "SELECT idSubcategoria FROM subcategoria WHERE quitar_acentos(subNombre) LIKE quitar_acentos('" .$sId."')";
    return $db->getVar($sConsulta);    
}//function obteneridsubcategoriaurl




function listadoCategorias ($db, $tpl, $sPestana) {
    
    /**
    DELIMITER $$

    DROP FUNCTION IF EXISTS `quitar_acentos` $$# MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).
    # MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).
    # MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).

    CREATE FUNCTION `quitar_acentos`(cadena text) RETURNS text CHARSET latin1 DETERMINISTIC
    BEGIN

    declare retorno text;

    set retorno = cadena;

    set retorno = REPLACE(retorno,' ','-');
    set retorno = REPLACE(retorno,'á','a');
    set retorno = REPLACE(retorno,'é','e');
    set retorno = REPLACE(retorno,'í','i');
    set retorno = REPLACE(retorno,'ó','o');
    set retorno = REPLACE(retorno,'ú','u');
    set retorno = REPLACE(retorno,'ñ','n');
    set retorno = REPLACE(retorno,'.','');
    set retorno = REPLACE(retorno,',','');

    return LOWER(retorno);

    END $$# MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).
    # MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).
    # MySQL ha devuelto un conjunto de valores vacío (es decir: cero columnas).


    DELIMITER ;
    */
    

    $aCategorias = obtenerCategorias($db);
    
    $sHtmlCategoria = "";

    $capafilai = '<div id="filacategorias">';
    $capafilaf = '</div>';
    $contador = 0;

    
    foreach ($aCategorias AS $aArrayDatos) {

        $tpl->assign('categoriaestilo', dameImagenCat($aArrayDatos["idCategoria"]));

        if( $contador == 0 || $contador == 3) $tpl->assign('capafilai', $capafilai);
        else $tpl->assign('capafilai', ' ');

        if( $contador == 2 || $contador == 5) $tpl->assign('capafilaf', $capafilaf);
        else $tpl->assign('capafilaf', ' ');
        
        $tpl->assign('categoriaInicio', $aArrayDatos["catNombre"]);
       
        $aSubCategorias = obtenerSubcategorias($db,$aArrayDatos["idCategoria"]);
        

        
        $tpl->assign('enableLink', count($aSubCategorias)>1);
        $tpl->assign('arraySubCategoria', $aSubCategorias);
        $tpl->assign('pestana', $sPestana);        
        $sHtmlCategoria .= $tpl->getContent(RAIZ_TPL.'/fichaCategoria.tpl');

        $contador ++;
    } //
    
    return $sHtmlCategoria;
    
} // function listadoCategorias

?>
