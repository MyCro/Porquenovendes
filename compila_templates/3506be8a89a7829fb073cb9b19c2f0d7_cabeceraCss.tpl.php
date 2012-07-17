<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<?php
				if(isset(${'aFile'})) $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['old'] = ${'aFile'};
				$this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['iteration'] = $this->variables['aFile'];
				$this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['i'] = 1;
				$this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['count'] = count($this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['iteration'] as ${'aFile'})
				{
					if(!isset(${'aFile'}['first']) && $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['i'] == 1) ${'aFile'}['first'] = true;
					if(!isset(${'aFile'}['last']) && $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['i'] == $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['count']) ${'aFile'}['last'] = true;
					if(isset(${'aFile'}['formElements']) && is_array(${'aFile'}['formElements']))
					{
						foreach(${'aFile'}['formElements'] as $name => $object)
						{
							${'aFile'}[$name] = $object->parse();
							${'aFile'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->variables['aDirectorios']['webcss']; ?>/<?php echo ${'aFile'}['fichero']; ?>" />
<?php
					$this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['old'])) ${'aFile'} = $this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']['old'];
				else unset($this->iterations['3506be8a89a7829fb073cb9b19c2f0d7_cabeceraCss.tpl.php_1']);
				?>
