<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>

<?php echo $this->variables['capafilai']; ?>
<div id="capacategoria">
    <div class="imgcategoria <?php echo $this->variables['categoriaestilo']; ?>"></div>
    <div id="nomcategoria"><?php echo $this->variables['categoriaInicio']; ?></div>
    <div id="nomsubcategoria">
        <ul>
            <?php
				if(isset(${'arraySubCategoria'})) $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['old'] = ${'arraySubCategoria'};
				$this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['iteration'] = $this->variables['arraySubCategoria'];
				$this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['i'] = 1;
				$this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['count'] = count($this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['iteration'] as ${'arraySubCategoria'})
				{
					if(!isset(${'arraySubCategoria'}['first']) && $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['i'] == 1) ${'arraySubCategoria'}['first'] = true;
					if(!isset(${'arraySubCategoria'}['last']) && $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['i'] == $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['count']) ${'arraySubCategoria'}['last'] = true;
					if(isset(${'arraySubCategoria'}['formElements']) && is_array(${'arraySubCategoria'}['formElements']))
					{
						foreach(${'arraySubCategoria'}['formElements'] as $name => $object)
						{
							${'arraySubCategoria'}[$name] = $object->parse();
							${'arraySubCategoria'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
            <?php
					if(isset(${'arraySubCategoria'}['numeroAnuncio']) && count(${'arraySubCategoria'}['numeroAnuncio']) != 0 && ${'arraySubCategoria'}['numeroAnuncio'] != '' && ${'arraySubCategoria'}['numeroAnuncio'] !== false)
					{
						?>
            <li class="flecha"><a href="/<?php echo $this->variables['pestana']; ?>/anuncio/listado/<?php echo ${'arraySubCategoria'}['nombreURL']; ?>"><?php echo ${'arraySubCategoria'}['subNombre']; ?></a></li>
            <?php } ?>
            <?php if(!isset(${'arraySubCategoria'}['numeroAnuncio']) || count(${'arraySubCategoria'}['numeroAnuncio']) == 0 || ${'arraySubCategoria'}['numeroAnuncio'] == '' || ${'arraySubCategoria'}['numeroAnuncio'] === false): ?>
            <li class="flecha disabledList"><?php echo ${'arraySubCategoria'}['subNombre']; ?></li>
            <?php endif; ?>
            <?php
					$this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['old'])) ${'arraySubCategoria'} = $this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']['old'];
				else unset($this->iterations['e32ebac69e85f0b48f5af5d9e89f9f5b_fichaCategoria.tpl.php_1']);
				?>
        </ul>
    </div>
</div>
<?php echo $this->variables['capafilaf']; ?>