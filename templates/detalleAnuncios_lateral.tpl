<div class="negrita gris centrado letrag">Contacta con el vendedor</div>

<div class="  tituloformulario tfmargen gris" style="margin-left: 16px; color: #373737;text-align:center;margin-top:16px; margin-right:20px;font-size:26px; width:284px">{$aDatosAnuncio.nombreMunicipio}</div>

                     
<div class="   tfmargen gris" style="margin-left: 16px; color: #373737;text-align:center;margin-right:20px; padding-top: 20px;font-size:14px; width:284px">Contacta con <b>{$aDatosAnuncio.nombre}</b> </div>
<div class="negrita   gris" style="padding-bottom: 10px;margin-left: 16px; color: #373737;text-align:center;margin-right:20px;font-size:20px; width:284px">{$aDatosAnuncio.telefono}</div>               
                    <div   style=" background-color:#fcfcfc;
                                    padding: 10px 0px 5px 0px;
                                    border-radius: 4px;
                                    font-weight: bold;
                                    color:#5590c7;
                                    margin-left: 16px;
                                    border: 1px solid #d8e9f8;
                                    margin-top:5px; margin-bottom: 5px; font-size:12px;text-align: center" >
                        
                     
                        
                                    
                        <form name="EnviarEmail" id="emailAnuncio" action="/inicio/anuncio/email" method="POST">
                            <span style="color: #373737; font-size:16px">Contactar por v&iacute;a Email</span>
                        <table style="margin-left:10px;font-size:14px; margin-top: 5px;">
                            <tr> <td class="aderecha">Nombre</td> <td> <input alt="Escribe tu nombre" class="bordeinput requerido" type="text" name="nombre" maxlength="50" /></td> </tr>
                            <tr> <td class="aderecha">Email</td> <td> <input alt="Escribe tu email| No es un email correcto" class="bordeinput requerido email" type="text" name="email" maxlength="50" /></td> </tr>
                        </table>
                            <input type="hidden" value="{$idAnuncio}" name="idAnuncio" />
                            <textarea class="gris" style="font-size:13px;margin-top: 10px; color: #5590c7; padding:5px 5px 5px 5px" alt="Describe lo que vendes" class="bordeinput descripcion requerido" cols="29" rows="7" name="descripcion">Hola, Estoy interesado...</textarea>
                            <br /> 
                            <input  class="boton validar" alt="emailAnuncio" id="botonEmail" style="width:120px;margin: 0px; margin-bottom: 10px; margin-top:10px" type="button" value="Enviar EMAIL" />
                          
                        </form>
                        
                        </div>
                       
                                
                    <div   style=" background-color:#fcfcfc;
                                    padding: 10px 0px 5px 0px;
                                    border-radius: 4px;
                                    font-weight: bold;
                                    color:#5590c7;
                                    margin-left: 16px;
                                    border: 1px solid #d8e9f8;
                                    margin-top:20px; margin-bottom: 5px; font-size:12px;text-align: center" >
                        
                     
                        
                                    
                        <form name="Borraranuncio" id="borrarAnuncio" action="/inicio/anuncio/borrar" method="POST">
                            <div style="margin-bottom: 10px; font-size:16px"><span style="color: #373737;">Borrar Anuncio</span><br /></div>
                            <input type="hidden" value="{$idAnuncio}" name="idAnuncio" />
                            Contrase&ntilde;a<br /><input alt="Escribe la contrase&ntilde;a" class="bordeinput requerido" type="password" name="pass" maxlength="50" />
                             
                            <br /> <input  class="boton validar" alt="borrarAnuncio" id="botonBorrar" style="width:120px;margin: 0px; margin-bottom: 10px; margin-top:10px" type="button" value="Borrar Anuncio" />
                   
                        </form>
                        
                        </div>