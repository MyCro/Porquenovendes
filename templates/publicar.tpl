

<div id="cpublicar">
    
    <form id="publicarForm" action="/publicar/guardar" method="POST" enctype="multipart/form-data" >
        
    

    <div class="formsupinf formimgsup"></div>
    
    <div class="formcentro" >
        
        <div class="negrita tituloformulario" style="color: #373737">Selecci&oacute;n de categor&iacute;a</div>
        <div id="pseparador"></div>
        
        {iteration:aCategorias}
        <div class="contenidoimgmin">
                <div class="imgcategoriamin {$aCategorias.imgmin} imgform" id="cat_{$aCategorias.idCategoria}"></div>
                <div class="contenidoimgminTitulo">{$aCategorias.catNombre}</div>
        </div>
        {/iteration:aCategorias}
        
        <table class="isubestilo">  
            <tr> <td>Subcategor&iacute;a</td> 
            <td> <select name="subCategoria" alt="Seleccione una categoria y subcategoria" class="requerido" id="selectorSubCat"><option value=''>Seleccione categor&iacute;a</option></select></td> </tr>
        </table>
        
        <div class="negrita tituloformulario tfmargen" style="color: #373737">Datos del anuncio</div>
        <div id="pseparador"></div>
        <div id="errorInfo" class="alerta informacionestrecha oculto"></div>
        <table class="tablaform" style="margin-left:10px">  
            <tr> <td class="aderecha">T&iacute;tulo anuncio</td> <td> <input alt="Escribe un titulo" class="bordeinput requerido" type="text" class="tituloa" name="titulo" size="55" maxlength="50" /></td> </tr>
            <tr> <td class="aderecha" style="vertical-align: top;">Descripci&oacute;n</td> <td> <textarea alt="Describe lo que vendes" class="bordeinput descripcion requerido" cols="45" rows="7" name="descripcion"></textarea> </td> </tr>
            <tr> <td class="aderecha">Precio</td> <td> <input alt="Escribe un precio" class="bordeinput precio requerido validar_esNumero" type="text"  name="precio" size="12" maxlength="10" />&nbsp;&euro;</td> </tr>
            <tr> <td><br /></td></tr>
            <tr> <td class="aderecha">Contrase&ntilde;a</td> <td> <input alt="Escribe la clave|Deben ser iguales" class="bordeinput precio requerido grupo_pass" type="password"  name="pass" size="12" maxlength="10" /></td> </tr>
            <tr> <td class="aderecha">Repetir</td> <td> <input alt="Repite la clave" class="bordeinput precio requerido grupo_pass" type="password"  name="rpass" size="12" maxlength="10" /></td> </tr>
        </table>
        
        <div class="negrita tituloformulario tfmargen" style="color: #373737">Fotos</div>
        <div id="pseparador"></div>
        
        <table style="margin-left:65px; font-size:14px;">  
            <tr> <td class="aderecha">Foto 1</td> <td> <input name="foto1" class="foto1" type="file" /> <span style="color: black;font-size:12px;">(Foto principal)</span></td> </tr>
            <tr> <td class="aderecha">Foto 2</td> <td> <input name="foto2" class="foto2" type="file" /> </td> </tr>
            <tr> <td class="aderecha">Foto 3</td> <td> <input name="foto3" class="foto3" type="file" /> </td> </tr>
            <tr> <td class="aderecha">Foto 4</td> <td> <input name="foto4" class="foto4" type="file" /> </td> </tr>
            <tr> <td class="aderecha">Foto 5</td> <td> <input name="foto5" class="foto5" type="file" /> </td> </tr> 
        </table>
 
   
        
        <div class="negrita tituloformulario tfmargen" style="color: #373737">Localizaci&oacute;n</div>
        <div id="pseparador"></div>
        
        <table class="tablaform" >  
            <tr> <td class="aderecha tamanoinput">Provincia</td> 
                <td> <select name="provincia" id="selectorPro" class="requerido" alt="Seleccione provincia y localidad">
                        <option value="">Seleccione provincia</option>
                    {iteration:aProvincias}    
                        <option value="{$aProvincias.idProvincia}">{$aProvincias.nombreProvincia}</option>
                    {/iteration:aProvincias} 
                    
                    </select></td> </tr>
            <tr> <td class="aderecha tamanoinput">Localidad</td> <td> <select class="requerido" alt="Seleccione provincia y localidad" name="localidad" disabled="disabled" id="selectorLoc"><option value="">Seleccione localidad</option></select></td> </tr>
        </table>
        
        
        <div class="negrita tituloformulario tfmargen" style="color: #373737">Datos de contacto</div>
        <div id="pseparador"></div>
        
        <table style="margin-left:15px; font-size:14px;">  
            <tr> <td class="aderecha">Nombre</td> <td> <input alt="Escribe tu nombre" class="bordeinput requerido" type="text" name="nombre" size="30" maxlength="50" /></td> </tr>
            <tr> <td class="aderecha">Email</td> <td> <input alt="Escribe tu email|Deben ser iguales" class="bordeinput grupo_Email requerido email" type="text" name="email" size="30" maxlength="50" /></td> </tr>
            <tr> <td class="aderecha">Confirm. Email</td> <td> <input alt="Escribe tu email" class="bordeinput requerido email grupo_Email" type="text" name="cemail" size="30" maxlength="50" /></td> </tr>
            <tr> <td class="aderecha">Tel&eacute;fono</td> <td> <input alt="Debe ser un numero de telefono" class="bordeinput validar_telefono" type="text" name="telefono" size="30" maxlength="50" /><span style="color: black;font-size:12px;">&nbsp;(Opccional)</span></td> </tr>
        </table>
        
        <div class="acentro"><input class="boton ipublicar validar" alt="publicarForm" id="botonPublicar" type="button" value="PUBLICAR ANUNCIO" /></div>
        
    </div>
        
    <div class="formsupinf formimginf"></div>

    </form>

</div>