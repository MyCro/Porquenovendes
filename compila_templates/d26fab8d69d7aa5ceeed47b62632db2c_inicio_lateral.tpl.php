<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
                   <div class="negrita gris centrado letrag">Seleccione Provincia</div>

                    <div id="imgmapa"></div>

                    <div id="bhorizontal"></div>

                    <div class="negrita gris centrado letrag" style="margin-bottom: 15px">Ultimos anuncios</div>
                    
                    <table style="width:200px;margin-left:20px">
                        <?php
				if(isset(${'aDatosArray'})) $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['old'] = ${'aDatosArray'};
				$this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['iteration'] = $this->variables['aDatosArray'];
				$this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['i'] = 1;
				$this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['count'] = count($this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['iteration']);
				foreach((array) $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['iteration'] as ${'aDatosArray'})
				{
					if(!isset(${'aDatosArray'}['first']) && $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['i'] == 1) ${'aDatosArray'}['first'] = true;
					if(!isset(${'aDatosArray'}['last']) && $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['i'] == $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['count']) ${'aDatosArray'}['last'] = true;
					if(isset(${'aDatosArray'}['formElements']) && is_array(${'aDatosArray'}['formElements']))
					{
						foreach(${'aDatosArray'}['formElements'] as $name => $object)
						{
							${'aDatosArray'}[$name] = $object->parse();
							${'aDatosArray'}[$name .'Error'] = (is_callable(array($object, 'getErrors')) && $object->getErrors() != '') ? '<span class="formError">' . $object->getErrors() .'</span>' : '';
						}
					} ?>
                        <tr>
                            <td style="text-align: center"><a href="<?php echo ${'aDatosArray'}['url']; ?>"><img  src="/ajax/imagen/gen.<?php echo ${'aDatosArray'}['idimagen']; ?>.0.75.3:2" /></a></td>
                            <td><span id="atitulo" style="width:200px"><a href="<?php echo ${'aDatosArray'}['url']; ?>"><?php echo ${'aDatosArray'}['tituloAnuncio']; ?></a></span><br /><span id="aprecio"><?php echo ${'aDatosArray'}['valor']; ?> &euro;</span></td>
                        </tr>
                        <tr><td><br /></td></tr>
                        <?php
					$this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['i']++;
				}
				if(isset($this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['old'])) ${'aDatosArray'} = $this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']['old'];
				else unset($this->iterations['d26fab8d69d7aa5ceeed47b62632db2c_inicio_lateral.tpl.php_1']);
				?>
                    </table>