
$(document).ready(function(){    
    
    //Funcion que subraya las categorias al pasar el raton
        $(".contenidoimgminTitulo").hover(function(event) { 
            $(this).css("text-decoration","underline");
        },function(event) {        
            $(this).css("text-decoration","none");
        });//$(".contenidoimgminTitulo")
    
    //Al hacer click en Imagen o texto se ilumina las imagenes
        $(".imgcategoriamin").click(function(event) {iluminar($(this));Ajax($(this).attr('id'));});
        $(".contenidoimgminTitulo").click(function(event) {
            var padre = $(this).parent();
            iluminar($(padre).children('.imgcategoriamin'));
            Ajax($(padre).children('.imgcategoriamin').attr('id'));
        });//$(".imgcategoriamin")
    
    //Funcion que hace el efecto de iluminar las imagenes
    function iluminar (obj) {     
        $(".imgcategoriamin").css("background-position","50% 100%");
        obj.css("background-position","50% 0%");
        obj.unbind("hover");
        obj.css("text-decoration","underline");        
    }//function iluminar
    
    
    //Funcion ajax que rellena desplegable subcategoria
    var IntCat;
    function Ajax (id) {
        if (IntCat == id) return false;
        IntCat = id;
        var aId = id.split('_');
        var iId = aId[1];
        //alert(iId);
        $.ajax({
            url: "/ajax/subcategoria",
            data:'idCat='+iId,
            type: "POST",
            success: function(datos){
                var resultado = eval('('+datos+')');                
                $('#selectorSubCat').each(function(index){
                    $(this).children(index).remove();
                });
                $.each(resultado,function(index){
                    $('#selectorSubCat').append(new Option(resultado[index].subNombre,resultado[index].idSubcategoria));
                });                                
                $('#selectorSubCat').removeAttr('disabled');
                $('#load').remove();
            },
            error: function(objeto, quepaso, otroobj){
                alert("Estas viendo esto por que fallé");
                alert("Pasó lo siguiente: "+quepaso);
            },
            beforeSend: function () {
                if ( $('#load').empty())  
                $('#selectorSubCat').after('&nbsp;&nbsp;<span id="load">Cargando ... </span>');
                $('#selectorSubCat').attr('disabled','disabled');
            }
        });
    }//function Ajax
    
   $("#selectorPro").change(function(event) {AjaxLocalidades($(this).val());}); 
    
    
   //Esta funcion llena el desplegable Localidades por provincia
   function AjaxLocalidades(idPro){
       var iId= idPro;
       
       $.ajax({
         url:"/ajax/localidad",
         data:'idPro='+iId,
         type: "POST",
         success: function(datos){
             var resultado = eval('('+datos+')'); 
             $('#selectorLoc').each(function(index){
                    $(this).children(index).remove();
                });
                
                if(resultado == ''){
                    $('#selectorLoc').append(new Option("Seleccione localidad",""));
                    $('#selectorLoc').attr('disabled','disabled');
                }else{
                    $.each(resultado,function(index){
                        $('#selectorLoc').append(new Option(resultado[index].nombreMunicipio,resultado[index].idMunicipio));
                    });   
                    $('#selectorLoc').removeAttr('disabled');
                }//if
                
                $('#load').remove();
                
                
            },
            error: function(objeto, quepaso, otroobj){
                alert("Estas viendo esto por que fallé");
                alert("Pasó lo siguiente: "+quepaso);
            },
            beforeSend: function () {
                if ( $('#load').empty())  
                $('#selectorLoc').after('&nbsp;&nbsp;<span id="load">Cargando ... </span>');
                $('#selectorLoc').attr('disabled','disabled');
                
            }//function
       });//ajax
       
   }//function AjaxLocalidades
  
  /* 
   $('#botonPublicar').click(function (event){       
       if ($('#errorInfo').css('display') == 'none') {
           // $('#errorInfo').html('Puto !!!');       
            $('#errorInfo').fadeIn();
       }else {
           $('#errorInfo').slideUp();
       }
       
       if ( $('.nombre').val="" ) alert("Vacio agggg");
       
   });
   
   $('input').focus(function (event){
       if ($('#errorInfo').css('display') != 'none') $('#errorInfo').delay(1000).slideUp();
   });
*/    
});//$(document)


