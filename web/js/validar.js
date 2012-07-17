

$(document).ready(function () {
    
	var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
        var flag = false;
        
	$(".validar").click(function (){
            var bOk = true;
            $(".errorValidar").remove();

            var idFormulario = $(this).attr('alt');
            $("#"+idFormulario+" .requerido").each(function(index) {
                if( $(this).val() == "" ) {
                    $(this).focus().after("<span class='errorValidar'>"+txtError($(this).attr('alt'),0)+"</span>");
                    flag = true;
                    bOk = false;
                    return false;
                }else if( strpos($(this).attr('class'),'email') != false) {                    
                    if (!emailreg.test($(this).val())) {
                        $(this).focus().after("<span class='errorValidar'>"+txtError($(this).attr('alt'),0)+"</span>");
                        flag = true;
                        bOk = false;
                        return false;}                    
                }else if (strpos($(this).attr("class"),'validar_')) {
                    sClase = subStrClass($(this), 'validar_');                    
                    var resultado;
                    eval("resultado = "+sClase.replace('validar_','')+"('"+$(this).val()+"');");
                    if (!resultado) {
                        $(this).focus().after("<span class='errorValidar'>"+txtError($(this).attr('alt'),0)+"</span>");
                        bOk = false;
                        return false;
                    } //
                } //
                
            });
            var aClases = new Array();
            if(flag == false)
            $('[class*="grupo_"]').each(function(index){                   
                sClase = subStrClass($(this), 'grupo_');
                var flag2 = false;
                var sValor = "";
                
                if ( arraySearch(aClases, sClase) === false ) {
                    aClases[aClases.length] = sClase;
                    $('.'+sClase).each(function(index){                        
                        if (sValor == "") {
                        sValor = $(this).val();
                        }else{                        
                            if (sValor != $(this).val() ) flag2 = true;                       
                        } //
                    });                
                    if (flag2) {
                        bOk = false;
                        $('.'+sClase).focus().after("<span class='errorValidar'>"+txtError($(this).attr('alt'),1)+"</span>");
                    } //
                
                }
                
            });
            var aClases = new Array();
            flag = false;
            if(bOk == true) $('#'+$(this).attr('alt')).submit();
	});
        
	$(".requerido").keyup(function(){
                if( $(this).val() != "" ){
			$(".errorValidar").fadeOut();			
			return false;
                }
	});
	/* $(".requeridoEmail").keyup(function(){
                if( $(this).val() != "" && emailreg.test($(this).val())){
			$(".errorValidar").fadeOut();			
			return false;
		}		
	}); */
        
        
        
});

function strpos (haystack, needle, offset) {
  var i = (haystack+'').indexOf(needle, (offset || 0));
  return i === -1 ? false : i;
}

function arraySearch(arr,val) {
    for (var i=0; i<arr.length; i++)
    if (arr[i] == val)
    return i;
    return false;
}

function txtError (txt, num) {
    aTxt = txt.split('|');
    return aTxt[num];
}

function subStrClass (obj, marcador) {
    var iInicio = strpos(obj.attr("class"),marcador);
    if ( strpos(obj.attr("class"),' ',iInicio) != false ) 
        var iFin = strpos(obj.attr("class"),' ', iInicio);
    else var iFin = obj.attr("class").length;                
    return sClase  = obj.attr("class").substr(iInicio, iFin-iInicio);
}

function telefono(n) {
    if ( esNumero(n) && lon9(n)) return true;  
    else return false;
}


function lon9 (n) {
    if (n.length == 9) return true;
    else return false;
}
function esNumero(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
