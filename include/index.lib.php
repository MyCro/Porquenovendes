<?php




function buscarFicheros ($sRuta,$sExtension,$bAbsoluta = false) {
    $aFiles = glob($sRuta.'/*'.$sExtension);
    if ($bAbsoluta) return $aFiles;
    else {
        foreach ($aFiles as $iClave=>$sFile) {
            $aFiles[$iClave] = array('fichero'=>array_pop(explode('/', $sFile)));
        }
        return $aFiles;
    } //
} // function buscarFicheros

################################################################################

/**
 * 
 * Si envias una variable a esta funcion te mostrara lo que contiene para 
 * visualizar que todo va correctamente y encontrar indicios de error.
 *
 * EJEMPLO: Debug( Array('camion','coche','moto') , true );
 *  Resultado:          
 *      Array           
 *      (
 *          [0] => camion
 *          [1] => coche
 *          [2] => moto
 *      )
 * @param Mix $Valor
 * @param Boolean $iDebug
 * 
 */
    function Debug ($Valor,$sFichero = null, $sLinea = null, $iDebug = false,$bDump = false) {   
        $GLOBALS['Debug'] .= '';
        if(SpoonCookie::exists('debugWeb')) $iDebug = true;  
        
        if ($iDebug) {
            
            $GLOBALS['Debug'] .= "<div onclick='displayDiv(this);' style=\"border:1px solid black;\">Debug ! ... <strong>Fichero: ".$sFichero." Linea: ".$sLinea."</strong></div><div style=\"display:none;\"><pre>";        
            $GLOBALS['Debug'] .= "<hr />"; 
            if ($bDump) $GLOBALS['Debug'] .= var_dump($Valor, true);
            else {
                if (is_array($Valor)) $GLOBALS['Debug'] .= print_r($Valor, true);
                else $GLOBALS['Debug'] .= $Valor;
            }    
             $GLOBALS['Debug'] .= "</pre></div>";
             $GLOBALS['Debug'] .= "<br />";
            
        }//if ($iDebug)
        
    }//Function Debug
    
################################################################################    
/* Obtenemos el GET y las variables de la URL Amigable empiezan por
 * rw- (rewrite-) si es asi la concatenamos y le anadimos puntos (.) 
 * Ejemplo !!   inicio.categoria.php, registro.alta.php ayuda.php etc 
 */
function procesarValoresUrlAmigable ($aArrayUrl, $sDefault) {    
    foreach ($aArrayUrl as $sNombre=>$sValor) {
        if (strpos($sNombre, 'rw-') !== false && !empty($sValor)) $aNombreUrl[] = parametrosPunto($sValor);
    } // foreach ($aArrayUrl as $aArray)
    return (is_array($aNombreUrl))? implode('.', $aNombreUrl).'.php' : $sDefault.".php";
} // function procesarValoresUrlAmigable    
    
function parametrosPunto ($sNombre, &$mxParametro = null) {
    if (strpos($sNombre, '.') === false) return $sNombre;
    else {
        $aNombre = explode('.',$sNombre);
        $sReturn = $aNombre[0];
        array_shift($aNombre);
        Debug($aNombre,null,true);
        $mxParametro = $aNombre;        
        return $sReturn;
    } // if (strpos($sNombre, '.') === false)
}


/**
* Funciones de limpiado de mierda usando filtros de PHP
* @param $var String
* @param $flag FLAG
* @return String
*/

function limpiarPost($var, $flag = null) {
	if ($flag == null) 			$flag = FILTER_SANITIZE_STRING;
	else if ($flag == 'email') 	$flag = FILTER_SANITIZE_EMAIL;
	else if ($flag == 'url') 	$flag = FILTER_SANITIZE_URL;
	return filter_input(INPUT_POST, $var, $flag);
} // limpiaMierda

/**
* Funciones de limpiado de mierda especificos
* @param $var String
* @return String
*/
function limpiarPostTexto($var){return filter_input(INPUT_POST, $var, FILTER_SANITIZE_STRING);}
function limpiarPostEmail($var){return filter_input(INPUT_POST, $var, FILTER_SANITIZE_EMAIL);}
function limpiarPostUrl($var){return filter_input(INPUT_POST, $var, FILTER_SANITIZE_URL);}

?>