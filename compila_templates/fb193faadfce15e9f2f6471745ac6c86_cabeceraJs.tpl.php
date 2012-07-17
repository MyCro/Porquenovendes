<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<?php
				if(isset(${'aFicherosJs'})) $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['old'] = ${'aFicherosJs'};
				$this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['iteration'] = $this->variables['aFicherosJs'];
				$this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['i'] = 1;
				$this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['count'] = count($this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['iteration'] as ${'aFicherosJs'})
				{
					if(!isset(${'aFicherosJs'}['first']) && $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['i'] == 1) ${'aFicherosJs'}['first'] = true;
					if(!isset(${'aFicherosJs'}['last']) && $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['i'] == $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['count']) ${'aFicherosJs'}['last'] = true;
					if(isset(${'aFicherosJs'}['formElements']) && is_array(${'aFicherosJs'}['formElements']))
					{
						foreach(${'aFicherosJs'}['formElements'] as $name => $object)
						{
							${'aFicherosJs'}[$name] = $object->parse();
							${'aFicherosJs'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
<script type="text/javascript" src="<?php echo $this->variables['aDirectorios']['webjs']; ?>/<?php echo ${'aFicherosJs'}['js']; ?>"></script>
<?php
					$this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['old'])) ${'aFicherosJs'} = $this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']['old'];
				else unset($this->iterations['fb193faadfce15e9f2f6471745ac6c86_cabeceraJs.tpl.php_1']);
				?>