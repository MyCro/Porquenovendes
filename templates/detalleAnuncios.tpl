<div id="bsuperiorlistado">

    <a href="{$urlAnterior}"><div id="flechaatras"></div></a>
    
    <div class="imgcategoriamin {$estiloImagen}"></div>
    
    <div class="nomsubcategorialistado">
        {$nombreSubCat}</div>
    
</div>

<div id="cpublicar" style="margin-top:20px;">
    
   
    <div class="formsupinf formimgsup"></div>
    
    <div class="formcentro" style="padding-bottom: 20px;" >
        
        <div class="negrita tituloformulario" style="width:520px;color: #373737;font-size:25px; margin-right: 20px;">{$aDatosAnuncio.tituloAnuncio}</div>
        <div class="tituloformulario" style="width:90px;color: #373737;font-size:25px; text-align: right;">{$aDatosAnuncio.valor} &euro;</div>
        <div class="gris" id="afecha" style=" float:left; margin-left: 2px;text-align:left;">Publicado: {$aDatosAnuncio.fecha}</div>
        
        <div id="pseparador"></div>
        
        <div id="errorInfo" class="alerta informacionestrecha oculto"></div>
        <table class="tablaform" style="margin-left:10px;width:615px"> 
            <tr> <td colspan="{$iNumImagenes}" style="text-align:center;"><img id="imagenVista" src="/ajax/imagen/gen.{$aDatosAnuncio.idimagen}.0.600.4:3" /></td> </tr> 
            {$contenidoTablaImagen}
        </table>
         
        <div class="negrita tituloformulario tfmargen" style="margin-top:10px;font-size:14px; color: #373737;">Descripci&oacute;n</div>
        <div id="pseparador" style="width:400px;"></div>
        
        <table style="margin-left:5px; font-size:14px; float:left; width:600px">  
            <tr> <td>{$aDatosAnuncio.descripcion}</td> </tr>
        </table>
 
         <div class="gris" id="afecha" style="margin-top: 20px; float:left; margin-left: 2px;text-align:left;">Vistas de anuncio <b><span style="color: #808080;">{$aDatosAnuncio.vistos}<span></b> veces</div>
         <div class="gris" id="afecha" style=" float:left; margin-left: 2px;text-align:left;">Emails enviados <b><span style="color: #808080;">{$aDatosAnuncio.emails}<span></b> veces</div>
        
   
        
    </div>
        
    <div class="formsupinf formimginf"></div>


</div>