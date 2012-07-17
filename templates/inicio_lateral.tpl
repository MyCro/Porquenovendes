                   <div class="negrita gris centrado letrag">Seleccione Provincia</div>

                    <div id="imgmapa"></div>

                    <div id="bhorizontal"></div>

                    <div class="negrita gris centrado letrag" style="margin-bottom: 15px">Ultimos anuncios</div>
                    
                    <table style="width:200px;margin-left:20px">
                        {iteration:aDatosArray}
                        <tr>
                            <td style="text-align: center"><a href="{$aDatosArray.url}"><img  src="/ajax/imagen/gen.{$aDatosArray.idimagen}.0.75.3:2" /></a></td>
                            <td><span id="atitulo" style="width:200px"><a href="{$aDatosArray.url}">{$aDatosArray.tituloAnuncio}</a></span><br /><span id="aprecio">{$aDatosArray.valor} &euro;</span></td>
                        </tr>
                        <tr><td><br /></td></tr>
                        {/iteration:aDatosArray}
                    </table>