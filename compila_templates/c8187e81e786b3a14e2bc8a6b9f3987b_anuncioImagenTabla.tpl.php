<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<tr>
    
    <td>
        <?php
				if(isset(${'aImagenesAnuncio'})) $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['old'] = ${'aImagenesAnuncio'};
				$this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['iteration'] = $this->variables['aImagenesAnuncio'];
				$this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['i'] = 1;
				$this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['count'] = count($this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['iteration'] as ${'aImagenesAnuncio'})
				{
					if(!isset(${'aImagenesAnuncio'}['first']) && $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['i'] == 1) ${'aImagenesAnuncio'}['first'] = true;
					if(!isset(${'aImagenesAnuncio'}['last']) && $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['i'] == $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['count']) ${'aImagenesAnuncio'}['last'] = true;
					if(isset(${'aImagenesAnuncio'}['formElements']) && is_array(${'aImagenesAnuncio'}['formElements']))
					{
						foreach(${'aImagenesAnuncio'}['formElements'] as $name => $object)
						{
							${'aImagenesAnuncio'}[$name] = $object->parse();
							${'aImagenesAnuncio'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
        <img class="imagenCambia" style="margin: 1px 5px 20px 5px;padding:2px; border:2px solid #FFFFFF;" src="/ajax/imagen/gen.<?php echo ${'aImagenesAnuncio'}['idImagen']; ?>.0.100.4:3" />
        <?php
					$this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['old'])) ${'aImagenesAnuncio'} = $this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']['old'];
				else unset($this->iterations['c8187e81e786b3a14e2bc8a6b9f3987b_anuncioImagenTabla.tpl.php_1']);
				?>
    </td>      
</tr>

<script type="text/javascript">
    $(document).ready(function () {
    $(".imagenCambia:first").css('padding','2px');
        $(".imagenCambia:first").css('border','2px solid #5590C7');
	$(".imagenCambia").click(function (){
        $('#imagenVista').fadeToggle("fast");
        $('#imagenVista').attr('src',$(this).attr('src').replace('100', '600'));
        $('#imagenVista').fadeToggle("fast");
        $(".imagenCambia").css('border','2px solid #FFFFFF');
        $(this).css('border','2px solid #5590C7');
        });
    });
</script>