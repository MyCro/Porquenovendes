<?php

function obtenerLocalidades($db, $idPro = 0, $bUFT8 = false){
    $aResultado = $db->getRecords("SELECT idMunicipio, nombreMunicipio FROM municipio WHERE idProvincia = ?", $idPro);
    if (!$bUFT8) return $aResultado;
    else {
        if (empty($aResultado)) return array();
        foreach ($aResultado as $Pos=>$aDatos) {
            $aResultado[$Pos]['nombreMunicipio'] = utf8_encode($aDatos['nombreMunicipio']);
        }    
        return $aResultado; } 
}//funcion obtenerLocalidades

function obtenerProvincias($db){
    $aResultado = $db->getRecords("SELECT idProvincia, nombreProvincia FROM provincia ORDER BY nombreProvincia");    
    return $aResultado; 
}//funcion obtenerProvincias

?>
