<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<div id="bsuperiorlistado">

    <a href="/inicio"><div id="flechaatras"></div></a>
    
    <div class="imgcategoriamin <?php echo $this->variables['estiloImagen']; ?>"></div>
    
    <div class="nomsubcategorialistado">
         <?php echo $this->variables['nombreSubCat']; ?></div>
    
</div>

<div id="zonabarra">
    <div id="bizquierda"></div>
    <div id="bcentro">
        <?php echo $this->variables['iNumAnuncios']; ?> Resultado<?php
					if(isset($this->variables['mayorUno']) && count($this->variables['mayorUno']) != 0 && $this->variables['mayorUno'] != '' && $this->variables['mayorUno'] !== false)
					{
						?>s<?php } ?> <span style="margin:0 5px 0 5px;">|</span>  Anuncios por pagina
    </div>
    <div id="bderecha"></div>
</div>

    
<?php
					if(isset($this->variables['aDatosAnuncioControl']) && count($this->variables['aDatosAnuncioControl']) != 0 && $this->variables['aDatosAnuncioControl'] != '' && $this->variables['aDatosAnuncioControl'] !== false)
					{
						?>
<?php
				if(isset(${'aDatosAnuncio'})) $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['old'] = ${'aDatosAnuncio'};
				$this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['iteration'] = $this->variables['aDatosAnuncio'];
				$this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['i'] = 1;
				$this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['count'] = count($this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['iteration'] as ${'aDatosAnuncio'})
				{
					if(!isset(${'aDatosAnuncio'}['first']) && $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['i'] == 1) ${'aDatosAnuncio'}['first'] = true;
					if(!isset(${'aDatosAnuncio'}['last']) && $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['i'] == $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['count']) ${'aDatosAnuncio'}['last'] = true;
					if(isset(${'aDatosAnuncio'}['formElements']) && is_array(${'aDatosAnuncio'}['formElements']))
					{
						foreach(${'aDatosAnuncio'}['formElements'] as $name => $object)
						{
							${'aDatosAnuncio'}[$name] = $object->parse();
							${'aDatosAnuncio'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
<div id="canuncio">
    <div id="aimagen" style="height:75px;" ><a class="enlaceazul" href="/<?php echo $this->variables['pestana']; ?>/anuncio/detalle.<?php echo $this->variables['subCat']; ?>.<?php echo ${'aDatosAnuncio'}['idAnuncio']; ?>/<?php echo ${'aDatosAnuncio'}['tituloAUrl']; ?>"><img style="height:75px" src="/ajax/imagen/gen.<?php echo ${'aDatosAnuncio'}['idimagen']; ?>.0.100.4:3" /></a></div>
    <div id="atitulo"><a class="enlaceazul" href="/<?php echo $this->variables['pestana']; ?>/anuncio/detalle.<?php echo $this->variables['subCat']; ?>.<?php echo ${'aDatosAnuncio'}['idAnuncio']; ?>/<?php echo ${'aDatosAnuncio'}['tituloAUrl']; ?>"><?php echo ${'aDatosAnuncio'}['tituloAnuncio']; ?></a></div>     
    <div id="aprecio"><?php echo ${'aDatosAnuncio'}['valor']; ?> &euro;</div>      
    <div id="azona"><?php echo ${'aDatosAnuncio'}['nombreMunicipio']; ?></div>  
    <div class="gris" id="afecha"><?php echo ${'aDatosAnuncio'}['fecha']; ?></div>      
</div> 

<div id="aseparador"></div>
<?php
					$this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['old'])) ${'aDatosAnuncio'} = $this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']['old'];
				else unset($this->iterations['26504c36b859d1bc95a098c2a4046f53_listadoAnuncios.tpl.php_1']);
				?>
<?php } ?>
<?php if(!isset($this->variables['aDatosAnuncioControl']) || count($this->variables['aDatosAnuncioControl']) == 0 || $this->variables['aDatosAnuncioControl'] == '' || $this->variables['aDatosAnuncioControl'] === false): ?>
No hay registros
<?php endif; ?>



<div id="zonabarra">
    <div id="bizquierda"></div>
    <div id="bcentro"></div>
    <div id="bderecha"></div>
</div>



