<?php error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On'); ?>
Hola que pasa ostia verga

<?php if(array_key_exists('variable', (array) $this->variables)) { echo $this->variables['variable']; } else { ?>{$variable}<?php } ?>

<ul>
<?php
					if(!isset($this->variables['listado']))
					{
						?>{iteration:listado}<?php
						$this->variables['listado'] = array();
						$this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['fail'] = true;
					}
				if(isset(${'listado'})) $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['old'] = ${'listado'};
				$this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['iteration'] = $this->variables['listado'];
				$this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['i'] = 1;
				$this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['count'] = count($this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['iteration'] as ${'listado'})
				{
					if(!isset(${'listado'}['first']) && $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['i'] == 1) ${'listado'}['first'] = true;
					if(!isset(${'listado'}['last']) && $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['i'] == $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['count']) ${'listado'}['last'] = true;
					if(isset(${'listado'}['formElements']) && is_array(${'listado'}['formElements']))
					{
						foreach(${'listado'}['formElements'] as $name => $object)
						{
							${'listado'}[$name] = $object->parse();
							${'listado'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
  <li><?php if(array_key_exists('name', (array) ${'listado'})) { echo ${'listado'}['name']; } else { ?>{$listado->name}<?php } ?></li>
<?php
					$this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['i']++;
				}
					if(isset($this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['fail']) && $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['fail'] == true)
					{
						?>{/iteration:listado}<?php
					}
				if(isset($this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['old'])) ${'listado'} = $this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']['old'];
				else unset($this->iterations['9c9bd90ca8f9213c6d43a6450e22427e_test.tpl.php_1']);
				?>
<ul>