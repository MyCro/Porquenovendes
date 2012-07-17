<div id="bsuperiorlistado">

    <a href="/inicio"><div id="flechaatras"></div></a>
    
    <div class="imgcategoriamin {$estiloImagen}"></div>
    
    <div class="nomsubcategorialistado">
         {$nombreSubCat}</div>
    
</div>

<div id="zonabarra">
    <div id="bizquierda"></div>
    <div id="bcentro">
        {$iNumAnuncios} Resultado{option:mayorUno}s{/option:mayorUno} <span style="margin:0 5px 0 5px;">|</span>  Anuncios por pagina
    </div>
    <div id="bderecha"></div>
</div>

    
{option:aDatosAnuncioControl}
{iteration:aDatosAnuncio}
<div id="canuncio">
    <div id="aimagen" style="height:75px;" ><a class="enlaceazul" href="/{$pestana}/anuncio/detalle.{$subCat}.{$aDatosAnuncio.idAnuncio}/{$aDatosAnuncio.tituloAUrl}"><img style="height:75px" src="/ajax/imagen/gen.{$aDatosAnuncio.idimagen}.0.100.4:3" /></a></div>
    <div id="atitulo"><a class="enlaceazul" href="/{$pestana}/anuncio/detalle.{$subCat}.{$aDatosAnuncio.idAnuncio}/{$aDatosAnuncio.tituloAUrl}">{$aDatosAnuncio.tituloAnuncio}</a></div>     
    <div id="aprecio">{$aDatosAnuncio.valor} &euro;</div>      
    <div id="azona">{$aDatosAnuncio.nombreMunicipio}</div>  
    <div class="gris" id="afecha">{$aDatosAnuncio.fecha}</div>      
</div> 

<div id="aseparador"></div>
{/iteration:aDatosAnuncio}
{/option:aDatosAnuncioControl}
{option:!aDatosAnuncioControl}
No hay registros
{/option:!aDatosAnuncioControl}



<div id="zonabarra">
    <div id="bizquierda"></div>
    <div id="bcentro"></div>
    <div id="bderecha"></div>
</div>



