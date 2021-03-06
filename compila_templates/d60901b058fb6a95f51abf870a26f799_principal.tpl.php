<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<!DOCTYPE html>
<html>
    
    <head>
        <title><?php echo $this->variables['title']; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <meta http-equiv="Content-Language" content="es-ES">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->variables['aDirectorios']['webcss']; ?>/estilo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->variables['aDirectorios']['webcss']; ?>/listadoanuncios.css" />
        <!-- JSCRIP -->        
	<?php echo $this->variables['sCabecera']; ?>
        <script type="text/javascript">
            function displayDiv (obj1) {
                obj = $(obj1).next();
                if ($(obj).css('display') == 'none') $(obj).css('display',"");
                else $(obj).css('display',"none");
            }
        </script>
    </head>
    
    <body>
        <?php echo $this->variables['sDebug']; ?>
        <div id="contenedor">
            
            <!-- TITULO -->
            <div id="titulo">
                <div id="imagentitulo"></div>
                <div id="imagentitulodos"></div>
                <div id="buscador" height="2">
                    <div id="capabtbuscar"><input class="boton buscar" type="button" value="Buscar" onclick="javascript:alert('a')" /></div>
                    <div id="capatxtbuscar"><input id="txtbuscar" type="text" /></div> 
                </div>
            </div>
            <!-- TITULO -->
            
            
            <!-- MENU -->
            <div id="menu">
                <div class="elementomenu <?php echo $this->variables['fichaMenu']['inicio']; ?>">      <a class="enlaceazul" href="/inicio/">Inicio</a>              </div>
                <div class="elementomenu <?php echo $this->variables['fichaMenu']['publicar']; ?>">    <a class="enlaceazul" href="/publicar/">Publicar Anuncio</a>  </div>
                <div class="elementomenu <?php echo $this->variables['fichaMenu']['favoritos']; ?>" style="color:#dbdbdb">   <!-- <a class="enlaceazul" href="/favoritos/">Favoritos</a> -->   Favoritos     </div>
                <div class="elementomenu <?php echo $this->variables['fichaMenu']['ayuda']; ?>" style="color:#dbdbdb">      <!-- <a class="enlaceazul" href="/ayuda/">Ayuda</a-->    Ayuda            </div>
            </div> 
            <div id="ocultaborde"></div>  <!-- CAPA OCULTADORA -->
            <!--MENU-->
            
            <!-- CENTRO -->
            <div id="centro">                          
                
                <div id="contenido">
                
                    <?php echo $this->variables['contenido']; ?>
                    
                </div>
     
                <div id="blateral"></div>
                
                <div id="contenidolateral">
                    
                    <?php echo $this->variables['contenidolateral']; ?>

                </div>
                
            </div>
            <!-- CENTRO -->
            
            <!-- PIE -->
            <div id="pie">
               � 2011 Porquenolovendes.com
            </div>
            <!-- PIE -->
            
        </div>
        
        <div id="pieimagen"></div>
        
    </body>
    
</html>