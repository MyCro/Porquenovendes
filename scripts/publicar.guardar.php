<?php
require includeLib($aConfiguracion,null,'inicio');

Debug($_FILES,__FILE__,__LINE__);

//print_r($_FILES-);

$subcategoria= limpiarPostTexto('subCategoria');

$titulo      = limpiarPostTexto('titulo');
$descripcion = limpiarPostTexto('descripcion');
$precio      = limpiarPostTexto('precio');
$clave       = limpiarPostTexto('pass');

$localidad   = limpiarPostTexto('localidad');

$nombre      = limpiarPostTexto('nombre');
$email       = limpiarPostEmail('email');
$numero      = limpiarPostTexto('telefono');

$aCampos = array(
    'idSubcategoria'=>$subcategoria,
    'tituloAnuncio' => $titulo,
    'clave' => $clave,
    'descripcion' => $descripcion,
    'valor' => $precio,
    'idMunicipio' => $localidad,
    'nombre' => $nombre,
    'email' => $email,
    'telefono' => $numero    
);

## Control de insercciones duplicadas ----------
foreach ($aCampos as $sData) $sMd5 .= $sData;
$sChecar = md5($sMd5);
$aCampos['checar'] = $sChecar;
## Control de insercciones duplicadas ----------

$tpl->assign('sNombre', $nombre);

$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/publicar_lateral.tpl'));
 
$sSql = "SELECT count(*) FROM anuncio WHERE checar = '$sChecar'";

if (( $iNumeroDuplicado=$db->getVar($sSql)) > 0) Debug("Numero duplicado: ".((int)$iNumeroDuplicado),__FILE__,__LINE__);

$iId = null;

if ( $iNumeroDuplicado == 0 ) {
    if ( !$iId = $db->insert('anuncio', $aCampos) ){ $sContenido = mostrarAnuncioError($tpl); }
    else{  
        // El anuncio es correcto tenemos que mostrar la URL
        $tpl->assign('urlAnuncio', obtenerUrlAnuncio($db, $iId, $subcategoria, $iUsoHorario));
        $sContenido = mostrarAnuncioCorrecto($tpl); }
} else{ 
    // Cuando el anuncio este duplicado tenemos que creat la URL
    $sSql = "SELECT idAnuncio FROM anuncio WHERE checar = '$sChecar'";
    $tpl->assign('urlAnuncio', obtenerUrlAnuncio($db, $db->getVar($sSql), $subcategoria, $iUsoHorario));
    $sContenido = mostrarAnuncioCorrecto($tpl); }


## ------ Subioda de Imagenes

$aImgOK = $aConfiguracion['imagenesPermitidas']['mime'];

$bImgPrincipal = false;



if ($iId > 0) { 
    
    
    //NO FOTO
    $existeImagen = false;
    //Si encuentra imagen TRUE y salir
    foreach($_FILES AS $aImagen){
     if($aImagen['error'] == 0){ $existeImagen = true; break; }
    }
    //NOFOTO
    
    
    Debug("Subiendo Imagenes",__FILE__,__LINE__);
    if ($existeImagen){
        foreach ($_FILES AS $aImagen) {



            if ($aImagen['error'] == 0  && !empty($aImagen['name']) && in_array($aImagen['type'], $aImgOK) ) /* Es OK */ {
                if (file_exists($aImagen['tmp_name'])) {
                    $sMd5 = md5(file_get_contents($aImagen['tmp_name']));
                    copy($aImagen['tmp_name'], './files/images/'.$sMd5);

                    $idImagen = null;

                    $aDatosImagen = array(
                        'md5'=>$sMd5,
                        'extension'=>$aImagen['type']
                    );
                    Debug("SELECT idImagen FROM imagen WHERE md5 LIKE '".$sMd5."'",__FILE__,__LINE__);
                    $idImagenExiste = $db->getVar("SELECT idImagen FROM imagen WHERE md5 LIKE '".$sMd5."'");
                    if ($idImagenExiste > 0) { 
                        $idImagen = $idImagenExiste;
                        Debug("La imagen ya existe Vite !: ".$idImagen,__FILE__,__LINE__);
                    }else $idImagen = $db->insert('imagen',$aDatosImagen);

                    if ($idImagen > 0) {   

                        $aDatosImagenAnuncio = array(
                            'idAnuncio'=>$iId,
                            'nombreOrigin'=>$aImagen['name'],
                            'idImagen'=>$idImagen,
                        );

                        //Poner principal
                        if(!$bImgPrincipal){
                            $aDatosImagenAnuncio['principal'] = 1;
                            $bImgPrincipal = true; //Princpal insertado
                        } 
                        //Poner principal


                        $iIdImagenAnuncio = $db->insert('anuncioImagen',$aDatosImagenAnuncio);

                    } //

                } //
            }


        } // 
        
    }else{
        //NO AY FOTO
        
        $aDatosImagenAnuncio = array(
            'idAnuncio'=>$iId,
            'nombreOrigin'=>'SinFoto',
            'idImagen'=>1,
            'principal'=>1
         );
        
        $iIdImagenAnuncio = $db->insert('anuncioImagen',$aDatosImagenAnuncio);
        
    }//else
    
} //



## ------ Subioda de Imagenes

## Debug -----------------------------------------------------------------------
if ($iNumeroDuplicado > 1) Debug("Numero duplicado: ".((int)$iNumeroDuplicado)-1,__FILE__,__LINE__);
if ($iId) Debug("ID de la inserccion: ".$iId,__FILE__,__LINE__);
## Debug -----------------------------------------------------------------------



function mostrarAnuncioError($tpl){
    return $tpl->getContent(RAIZ_TPL.'/publicar_error.tpl');
}

function mostrarAnuncioCorrecto($tpl){
    
    return $tpl->getContent(RAIZ_TPL.'/publicar_correcto.tpl');
}


?>

