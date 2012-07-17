<?php 

require 'include/xml2array.php';
if (!$aConfiguracion = xml2array('configuracion.xml')) die('Configuracion no encontrada.');
if (!$aConfPaginas = xml2array('paginas.xml')) die('Conf. Paginas no encontrada.');
//Incluimos las librerias del sistema de plantillas 
//El sistema de plantillas controlara el uso de las plantillas, 
//mostrarlas y rellenarlas como queramos
require_once 'spoon/spoon.php';
require_once 'spoon/template/template.php';
require includeLib($aConfiguracion);

define("RAIZ",$aConfiguracion['directorios']['raiz']); //Define la ruta raiz de la web
define("RAIZ_TPL",RAIZ."/".$aConfiguracion['directorios']['templates']); //Define la ruta hacia las plantillas

## Ya no es necesario 
// $iDebug = false; //Activar o desactivar el iDebug (Funcion más abajo)

/* 
 * Hemos creado un .htaccess que traduce la url en parametros por GET
 * 
 * Por ejemplo: index.php/anuncio/publicar sera convertido a:
 *              index.php?pagina=anuncio&accion=publicar
 */

// Variables
$sPagina = parametrosPunto($_GET['rw-pagina']); //Recoge por GET la pagina actual en la que estamos
$sPestana = parametrosPunto($_GET['rw-pestana']);
$sAccion = parametrosPunto($_GET['rw-accion'],$mxParametro);
list($sProvincia,$sLocalidad) = $mxParametro;
$sId = $_GET['id'];
$iUsoHorario = $aConfiguracion['usoHorario'];

// Control de Debug --------------------------
$bInformacionErrores = debugWeb($sPestana);
## SPOON_DEBUG Constante que utiliza SPOON para su debug interno
if(!defined("SPOON_DEBUG")) { define("SPOON_DEBUG", $bInformacionErrores); }
// Control de Debug --------------------------å

Debug($_GET,__FILE__,__LINE__); //Muestra los valores del array pasados por GET

//Si no esta en ninguna pagina -> dirigir a pagina inicio
if (empty($sPestana)) $sPestana = 'inicio';
$Menu[$sPestana] = 'elementoseleccion'; 
//Dependendiendo de la pagina en la que estemos cambiara la clase del css

//CONEXION CON BASE DE DATOS
$aConf = $aConfiguracion['basedatos'];
$db = new SpoonDatabase('mysql', $aConf['host'], $aConf['usuario'], $aConf['clave'], $aConf['nombre']);

//Creamos la plantilla principal donde trabajaremos a lo largo de toda la web
$tpl = new SpoonTemplate(); //Creamos el objeto plantilla
$tpl->setForceCompile(true);//Indicamos una complilacion forzosa
$tpl->setCompileDirectory(RAIZ.'/compila_templates'); //Una carpeta para la caché
#################

###############################################################################

// Obtenemos el nombre del archivo PHP que controla la seccion de la Web
$sFicheroControlador = procesarValoresUrlAmigable ($_GET,$sPestana);
$sNombreControlador = 'scripts/'.$sFicheroControlador;

Debug($sFicheroControlador);

$VarEntorno->sPagina                = $sPagina;
$VarEntorno->sPestana               = $sPestana;
$VarEntorno->sAccion                = $sAccion;
$VarEntorno->sId                    = $sId;
$VarEntorno->sFicheroControlador    = $sFicheroControlador;
$VarEntorno->sPaginaTmpl            = RAIZ_TPL.'/'.$aConfPaginas[$sFicheroControlador]['tmpl'];



// Si existe el archivo lo incluimos
require includeLib($aConfiguracion,$sPestana);
if (file_exists($sNombreControlador)) require $sNombreControlador;
else Debug($aConfiguracion['string']['parametrosWeb']['noControlador']." ".$sNombreControlador,__FILE__,__LINE__);
// Si no existe muestra el error con el nombre del fichero no existe
###############################################################################

// Control Ajax
if ($sPestana == 'ajax') die();

/* Cambia el Class en los botones del menu */
$tpl->assign('fichaMenu', $Menu);
$sTitle = $aConfPaginas[$sFicheroControlador]['title'];
if (empty($sTitle)) Debug($aConfiguracion['string']['parametrosWeb']['noTitle'].$sFicheroControlador,__FILE__,__LINE__);
if (!empty($sTitle)) $sTitle = ' - '.$sTitle;
$tpl->assign('title', $aConfiguracion['string']['parametrosWeb']['titleDefault'].$sTitle);

if (empty($sContenido)) $sContenido = $aConfiguracion['string']['parametrosWeb']['sinContenido'];
$tpl->assign('contenido', $sContenido);

#################
$tpl->assign('aDirectorios' , $aConfiguracion['directorios']);

@$aFile = buscarFicheros(RAIZ.$aConfiguracion['directorios']['webcss'],'css');
$tpl->assign('aFile' , $aFile);
$sCabeceraHTML = $tpl->getContent(RAIZ_TPL.'/cabeceraCss.tpl');

if (isset($aConfPaginas[$sPestana.'.php'])) {
    $aScriptJs = $aConfPaginas[$sFicheroControlador]['scripts'];    
    // Fix de PHP para corregir los datos devueltos del parseador XML
    if (!isset($aScriptJs[0])) { $aScriptJs[0] = $aScriptJs; unset($aScriptJs['js']); }
    $aFicherosJs[]['js'] = $sPestana.'.js';
    if ($aScriptJs) $aFicherosJs = array_merge($aScriptJs,$aFicherosJs);
}else $aFicherosJs = $aFicherosJs[]['js'] = $sPestana.'.js';

if ($aFicherosJs)
foreach ($aFicherosJs AS $iPos=>$aScript) {  
    
    if(!file_exists(RAIZ.$aConfiguracion['directorios']['webjs'].'/'.$aScript['js'])) {        
        unset($aFicherosJs[$iPos]);
        Debug("El Script: ".$aScript['js'].", no existe y no se incluira.",__FILE__,__LINE__);
    } //
} // foreach

if (count($aFicherosJs) > 0) {
    $tpl->assign('aFicherosJs', $aFicherosJs);
    $sCabeceraHTML .= $tpl->getContent(RAIZ_TPL.'/cabeceraJs.tpl');
}
/*
$sCabeceraHTML = $tpl->getContent(RAIZ_TPL.'/cabeceraCss.tpl');
if(file_exists(RAIZ.$aConfiguracion['directorios']['webjs'].'/'.$sPestana.'.js')){
    $tpl->assign('sFicheroJS', $sPestana);
    $sCabeceraHTML .= $tpl->getContent(RAIZ_TPL.'/cabeceraJs.tpl');
}//if(file_exists)*/



$tpl->assign('sCabecera', $sCabeceraHTML);
$tpl->assign('sDebug', $GLOBALS['Debug'],__FILE__,__LINE__);

/* Obtiene la plantilla principal y la pega en la Web */
$tpl->display(RAIZ_TPL.'/principal.tpl');  

// Functions 
function includeLib($aConfiguracion,$sPestana = null, $sFicheroLib = null) {
    
    $sDirInclu = $aConfiguracion['directorios']['include'];
    
    if ($sFicheroLib != null && file_exists($sDirInclu.'/'.$sFicheroLib).'lib.php')
        $sFicheroIncluir = $sDirInclu.'/'.$sFicheroLib.'.lib.php';
    else if (empty($sPestana))
        $sFicheroIncluir = $sDirInclu.str_replace('.php','',$_SERVER['SCRIPT_NAME']).'.lib.php';
    else
        $sFicheroIncluir = $sDirInclu.'/'.str_replace('.php','',$sPestana).'.lib.php';
    if (file_exists($sFicheroIncluir))
        return $sFicheroIncluir;
    else 
        return $sDirInclu.'/empty.php';
    
} // function includeLib($aConfiguracion,$sFicheroControlador = null)

// Aggg
function debugWeb ($sPestana) {
    if ($sPestana == 'debug') { SpoonCookie::set('debugWeb', true); echo "Activado DebugWeb"; }
    if ($sPestana == 'undebug') { SpoonCookie::delete('debugWeb'); echo "Desactivado DebugWeb"; }
    if (SpoonCookie::exists('debugWeb')) { 
        return true;
    }else return false;
} // function debugWeb

?>