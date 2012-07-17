<?php error_reporting(E_WARNING); ini_set('display_errors', 'Off'); ?>
<div id="cpublicar">
        

    <div class="formsupinf formimgsup"></div>
    
    <div class="formcentro" >
        
        <div class="negrita tituloformulario">Anuncio insertado con &eacute;xito</div>
        <div id="pseparador"></div>
        
        <table class="isubestilo">  
            <tr> <td>Estimad@ <a><?php echo $this->variables['sNombre']; ?></a>, su anuncio ha sido insertado correctamente.<br /> Podr&aacute;s visualizarlo en el listado de anuncios de la web. <br />
                <br />
                <a href="<?php echo $this->variables['urlAnuncio']; ?>">VER ANUNCIO</a>
                   
                </td> 
                
            </tr>
            <tr>
                <td><div id="imgcorrecto"></div></td>
            </tr>
        </table>
        
    </div>
        
    <div class="formsupinf formimginf"></div>  

</div>