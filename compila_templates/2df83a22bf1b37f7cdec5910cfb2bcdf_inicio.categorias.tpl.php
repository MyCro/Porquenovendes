<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
<br />
<?php
					if(!isset($this->variables['consultaCategoria']))
					{
						?>{iteration:consultaCategoria}<?php
						$this->variables['consultaCategoria'] = array();
						$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['fail'] = true;
					}
				if(isset(${'consultaCategoria'})) $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['old'] = ${'consultaCategoria'};
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['iteration'] = $this->variables['consultaCategoria'];
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['i'] = 1;
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['count'] = count($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['iteration'] as ${'consultaCategoria'})
				{
					if(!isset(${'consultaCategoria'}['first']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['i'] == 1) ${'consultaCategoria'}['first'] = true;
					if(!isset(${'consultaCategoria'}['last']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['i'] == $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['count']) ${'consultaCategoria'}['last'] = true;
					if(isset(${'consultaCategoria'}['formElements']) && is_array(${'consultaCategoria'}['formElements']))
					{
						foreach(${'consultaCategoria'}['formElements'] as $name => $object)
						{
							${'consultaCategoria'}[$name] = $object->parse();
							${'consultaCategoria'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
    <hr />
    <strong><?php if(array_key_exists('imagen', (array) ${'consultaCategoria'})) { echo ${'consultaCategoria'}['imagen']; } else { ?>{$consultaCategoria->imagen}<?php } ?></strong>
    <br />
    <?php
					if(!isset(${'consultaCategoria'}['listado']))
					{
						?>{iteration:consultaCategoria->listado}<?php
						${'consultaCategoria'}['listado'] = array();
						$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['fail'] = true;
					}
				if(isset(${'consultaCategoria'}['listado'])) $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['old'] = ${'consultaCategoria'}['listado'];
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['iteration'] = ${'consultaCategoria'}['listado'];
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['i'] = 1;
				$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['count'] = count($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['iteration']);
				foreach((array) $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['iteration'] as ${'consultaCategoria'}['listado'])
				{
					if(!isset(${'consultaCategoria'}['listado']['first']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['i'] == 1) ${'consultaCategoria'}['listado']['first'] = true;
					if(!isset(${'consultaCategoria'}['listado']['last']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['i'] == $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['count']) ${'consultaCategoria'}['listado']['last'] = true;
					if(isset(${'consultaCategoria'}['listado']['formElements']) && is_array(${'consultaCategoria'}['listado']['formElements']))
					{
						foreach(${'consultaCategoria'}['listado']['formElements'] as $name => $object)
						{
							${'consultaCategoria'}['listado'][$name] = $object->parse();
							${'consultaCategoria'}['listado'][$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
        <?php if(array_key_exists('listado', (array) ${'consultaCategoria'})) { echo ${'consultaCategoria'}['listado']; } else { ?>{$consultaCategoria->listado}<?php } ?>
        <br />
    <?php
					$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['i']++;
				}
					if(isset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['fail']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['fail'] == true)
					{
						?>{/iteration:consultaCategoria->listado}<?php
					}
				if(isset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['old'])) ${'consultaCategoria'}['listado'] = $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']['old'];
				else unset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_2']['listado']);
				?>
<?php
					$this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['fail']) && $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:consultaCategoria}<?php
					}
				if(isset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['old'])) ${'consultaCategoria'} = $this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']['old'];
				else unset($this->iterations['2df83a22bf1b37f7cdec5910cfb2bcdf_inicio.categorias.tpl.php_1']);
				?>