<?php

$nombre = limpiarPostTexto('nombre');
$email = limpiarPostEmail('email');
$desc = limpiarPostTexto('descripcion');
$idAnuncio = limpiarPostTexto('idAnuncio');

$aAnuncio = $db->getRecord('SELECT email,tituloAnuncio FROM anuncio WHERE idAnuncio =' . $idAnuncio);

$db->execute('UPDATE anuncio SET emails = (emails+1) WHERE idAnuncio =' . $idAnuncio );

$destinatario = $aAnuncio['email'];

$asunto = "Alguien esta interesado en tu Anuncio"; 
$cuerpo = ' 
<html> 
<head> 
   <title>Alguien le interesa tu Anuncio: '.$aAnuncio['tituloAnuncio'].' </title> 
</head> 
<body> 
<h1><span style="color:green">'.$nombre .'</span> esta interesado en tu  <br /><span style="color:#5590c7">'.$aAnuncio['tituloAnuncio'].' </span></h1>
<p> 
<b>Mensaje</b> <br/>
'.nl2br($desc).'
</p> 
<br />
<br />
<p>Esto es un anuncio de PorqueNolovendes.com, si no quieres recibir más correos borra tu anuncio</p>
</body> 
</html> 
'; 

//para el envío en formato HTML 
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

//dirección del remitente 
$headers .= "From: <".$email.">\r\n"; 

mail($destinatario,$asunto,$cuerpo,$headers);

$sContenido = $tpl->getContent(RAIZ_TPL.'/emailAnuncio.tpl');

$tpl->assign('contenidolateral' , $tpl->getContent(RAIZ_TPL.'/listadoAnuncios_lateral.tpl'));

?>