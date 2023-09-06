function ValidaRut(Objeto){
	//alert(Objeto);
	var tmpstr = "";
	var intlargo = Objeto;
	if (intlargo.length> 0){
		crut = Objeto;largo = crut.length;
		if ( largo <2 ){
			//alert('Rut inválido');
			return false;
		}for ( i=0; i <crut.length ; i++ )
		if ( crut.charAt(i) != ' ' && crut.charAt(i) != '.' && crut.charAt(i) != '-' ){
			tmpstr = tmpstr + crut.charAt(i);
		}rut = tmpstr;crut=tmpstr;largo = crut.length;
		if ( largo> 2 ) rut = crut.substring(0, largo - 1);
		else rut = crut.charAt(0);
		dv = crut.charAt(largo-1);	 
		if ( rut == null || dv == null )
		return 0;	
		var dvr = '0';suma = 0;mul  = 2;
		for (i= rut.length-1 ; i>= 0; i--){
			suma = suma + rut.charAt(i) * mul;
			if(mul == 7) mul = 2;
			else mul++;
		}res = suma % 11;
		if (res==1) dvr = 'k';
		else if (res==0) dvr = '0';
		else{ dvi = 11-res;dvr = dvi + "";}	
		if ( dvr != dv.toLowerCase() ){
			//alert('El Rut Ingreso es Invalido');
			return false;
		}return true;
	}
}


function IsRut(e){
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla ==0) return true;
	patron = /[-kK0123456789\s-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te)
} 

function IsFijo(e){
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla ==0) return true;
	patron = /[-0123456789\s\/-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te)
} 

function IsCelular(e){
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla ==0) return true;
	patron = /[-0123456789\s-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te)
} 

function getRadioButtonSelectedValue(ctrl) {
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) return ctrl[i].value;
}


function IsString(e){ 
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0) return true;
	patron = /[a-zA-ZáéíóúñÁÉÍÓÚÑ\s-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}

function IsAlphanumeric(e){
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0) return true;
	patron = /[a-zA-Z0-9_.,:;?¿!¡@áéíóúñÁÉÍÓÚÑ\s-]/;
	te = String.fromCharCode(tecla);
	return patron.test(te); 
}

function IsNumber(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0) return true;
	patron = /\d/; // Solo acepta numeros
	te = String.fromCharCode(tecla);
	return patron.test(te);
}
function IsNumberDec(e) {
	tecla = (document.all) ? e.keyCode : e.which;
	if (tecla==8 || tecla==0) return true;
	patron = /[.,0123456789]/; // Solo acepta numeros
	te = String.fromCharCode(tecla);
	return patron.test(te);
}





function isDigito(e){
	patron = /^(?:\+|-)?\d+$/;
	//te = String.fromCharCode(tecla);
	return patron.test(e)

}

 	//^(?:\+|-)?\d+$


function isEmailAddress(stremail){
var s = stremail
var filter=/^[A-Za-z][A-Za-z0-9_.]*@[A-Za-z0-9_]+\.[A-Za-z0-9_.]+[A-za-z]$/;
if (s.length == 0 ) return false;
if (filter.test(s))
return true;
else
return false;
}
