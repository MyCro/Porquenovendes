<tr>
    
    <td>
        {iteration:aImagenesAnuncio}
        <img class="imagenCambia" style="margin: 1px 5px 20px 5px;padding:2px; border:2px solid #FFFFFF;" src="/ajax/imagen/gen.{$aImagenesAnuncio.idImagen}.0.100.4:3" />
        {/iteration:aImagenesAnuncio}
    </td>      
</tr>

<script type="text/javascript">
    $(document).ready(function () {
    $(".imagenCambia:first").css('padding','2px');
        $(".imagenCambia:first").css('border','2px solid #5590C7');
	$(".imagenCambia").click(function (){
        $('#imagenVista').fadeToggle("fast");
        $('#imagenVista').attr('src',$(this).attr('src').replace('100', '600'));
        $('#imagenVista').fadeToggle("fast");
        $(".imagenCambia").css('border','2px solid #FFFFFF');
        $(this).css('border','2px solid #5590C7');
        });
    });
</script>