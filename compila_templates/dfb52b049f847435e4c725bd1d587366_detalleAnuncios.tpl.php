<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<div id="bsuperiorlistado">

    <a href="<?php echo $this->variables['urlAnterior']; ?>"><div id="flechaatras"></div></a>
    
    <div class="imgcategoriamin <?php echo $this->variables['estiloImagen']; ?>"></div>
    
    <div class="nomsubcategorialistado">
        <?php echo $this->variables['nombreSubCat']; ?></div>
    
</div>

<div id="cpublicar" style="margin-top:20px;">
    
   
    <div class="formsupinf formimgsup"></div>
    
    <div class="formcentro" style="padding-bottom: 20px;" >
        
        <div class="negrita tituloformulario" style="width:520px;color: #373737;font-size:25px; margin-right: 20px;"><?php echo $this->variables['aDatosAnuncio']['tituloAnuncio']; ?></div>
        <div class="tituloformulario" style="width:90px;color: #373737;font-size:25px; text-align: right;"><?php echo $this->variables['aDatosAnuncio']['valor']; ?> &euro;</div>
        <div class="gris" id="afecha" style=" float:left; margin-left: 2px;text-align:left;">Publicado: <?php echo $this->variables['aDatosAnuncio']['fecha']; ?></div>
        
        <div id="pseparador"></div>
        
        <div id="errorInfo" class="alerta informacionestrecha oculto"></div>
        <table class="tablaform" style="margin-left:10px;width:615px"> 
            <tr> <td colspan="<?php echo $this->variables['iNumImagenes']; ?>" style="text-align:center;"><img id="imagenVista" src="/ajax/imagen/gen.<?php echo $this->variables['aDatosAnuncio']['idimagen']; ?>.0.600.4:3" /></td> </tr> 
            <?php echo $this->variables['contenidoTablaImagen']; ?>
        </table>
         
        <div class="negrita tituloformulario tfmargen" style="margin-top:10px;font-size:14px; color: #373737;">Descripci&oacute;n</div>
        <div id="pseparador" style="width:400px;"></div>
        
        <table style="margin-left:5px; font-size:14px; float:left; width:600px">  
            <tr> <td><?php echo $this->variables['aDatosAnuncio']['descripcion']; ?></td> </tr>
        </table>
 
         <div class="gris" id="afecha" style="margin-top: 20px; float:left; margin-left: 2px;text-align:left;">Vistas de anuncio <b><span style="color: #808080;"><?php echo $this->variables['aDatosAnuncio']['vistos']; ?><span></b> veces</div>
         <div class="gris" id="afecha" style=" float:left; margin-left: 2px;text-align:left;">Emails enviados <b><span style="color: #808080;"><?php echo $this->variables['aDatosAnuncio']['emails']; ?><span></b> veces</div>
        
   
        
    </div>
        
    <div class="formsupinf formimginf"></div>


</div>