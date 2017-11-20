function calcular_edad(fecha){ 

   	//calculo la fecha de hoy 
   	hoy=new Date() 
   	//alert(hoy) 

   	//calculo la fecha que recibo 
   	//La descompongo en un array 
   	var array_fecha = fecha.split("/") 
   	//si el array no tiene tres partes, la fecha es incorrecta 
   	if (array_fecha.length!=3) 
      	 return false 

   	//compruebo que los ano, mes, dia son correctos 
   	var ano 
   	ano = parseInt(array_fecha[2]); 
   	if (isNaN(ano)) 
      	 return false 

   	var mes 
   	mes = parseInt(array_fecha[1]); 
   	if (isNaN(mes)) 
      	 return false 

   	var dia 
   	dia = parseInt(array_fecha[0]);	
   	if (isNaN(dia)) 
      	 return false 


   	//si el año de la fecha que recibo solo tiene 2 cifras hay que cambiarlo a 4 
   	if (ano<=99) 
      	 ano +=1900 

   	//resto los años de las dos fechas 
   	edad=hoy.getYear()- ano - 1; //-1 porque no se si ha cumplido años ya este año 

   	//si resto los meses y me da menor que 0 entonces no ha cumplido años. Si da mayor si ha cumplido 
   	if (hoy.getMonth() + 1 - mes < 0) //+ 1 porque los meses empiezan en 0 
      	 return edad 
   	if (hoy.getMonth() + 1 - mes > 0) 
      	 return edad+1 

   	//entonces es que eran iguales. miro los dias 
   	//si resto los dias y me da menor que 0 entonces no ha cumplido años. Si da mayor o igual si ha cumplido 
   	if (hoy.getUTCDate() - dia >= 0) 
      	 return edad + 1 

   	return edad 
} 

function inicialMayusculas(field) {

	var index;

	var tmpStr;

	var tmpChar;

	var preString;

	var postString;

	var strlen;

	tmpStr = field.value.toLowerCase();

	tmpStr = sacaEspacios(tmpStr);

	strLen = tmpStr.length;

	if (strLen > 0)  {

		for (index = 0; index < strLen; index++)  

		{

		if (index == 0)  {

			tmpChar = tmpStr.substring(0,1).toUpperCase();

			postString = tmpStr.substring(1,strLen);

			tmpStr = tmpChar + postString;

		}

		else 

		{

			tmpChar = tmpStr.substring(index, index+1);

			if (tmpChar == " " && index < (strLen-1))  

			{

				tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();

				preString = tmpStr.substring(0, index+1);

				postString = tmpStr.substring(index+2,strLen);

				tmpStr = preString + tmpChar + postString;

         	}

      	}

   	}

}

field.value = tmpStr;

}





function validaCorreo(field) 
{
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(field.value))
	{
		return (true)
	}
	return (false)
}



function largoCorrecto(texto,minimo,maximo) {



    if ((texto.length<minimo) || (texto.length>maximo)){

      return false;

    } else {

      return true;

    }

}



function sacaEspacios(cadena) {

	while(cadena.charAt(0)==' ') {

		cadena=cadena.substring(1,cadena.length);

	}

	while(cadena.charAt(cadena.length-1)==' ') {

		cadena=cadena.substring(0,cadena.length-1);

	}

	return cadena;

}





function soloCaracteresMail(field) {

var valid = ".@-_abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";

var ok = "yes";

var temp;

var largo=field.value.length;

for (var i=0; i<field.value.length; i++) {

	temp = "" + field.value.substring(i, i+1);

	if (valid.indexOf(temp) == "-1") {

		var eliminar = field.value.substring(i, i+1);

		field.value=field.value.replace(eliminar, '') ;

		}

	}

}



function soloLetrasYNumeros(field) {

var valid = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

var ok = "yes";

var temp;

var largo=field.value.length;

for (var i=0; i<field.value.length; i++) {

	temp = "" + field.value.substring(i, i+1);

	if (valid.indexOf(temp) == "-1") {

		var eliminar = field.value.substring(i, i+1);

		field.value=field.value.replace(eliminar, '') ;

		}

	}

}



function soloLetrasYEspacios(field) {

var valid = " abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

var ok = "yes";

var temp;

var largo=field.value.length;

for (var i=0; i<field.value.length; i++) {

	temp = "" + field.value.substring(i, i+1);

	if (valid.indexOf(temp) == "-1") {

		var eliminar = field.value.substring(i, i+1);

		field.value=field.value.replace(eliminar, '') ;

		}

	}

}


function soloNumerosReales(field) {

	var valid = ",0123456789"
	var ok = "yes";
	var temp;
	
	var largo=field.value.length;
	
	if (field.value.substring(0,1)==".") 
	{
	
		field.value="0,"
	
	}
	
	for (var i=0; i<field.value.length; i++) 
	{
		temp = "" + field.value.substring(i, i+1);
	
		if (valid.indexOf(temp) == "-1") 
		{
			var eliminar = field.value.substring(i, i+1);
	
			field.value=field.value.replace(eliminar, '');
	
		}
	}

	var cuentaComas = 0;	
	
	for (var j=0; j<field.value.length; j++) 
	{
		temp = "" + field.value.substring(j, j+1);
	
		if (temp==".") 
		{
			cuentaComas++;
	
		}
	}	
	
	if (cuentaComas>1) 
	{ 
			field.value=field.value.replace('.', ''); 
	}
}





function soloKyNumeros(field) {

field.value=field.value.toUpperCase();

var valid = "0123456789K"

var ok = "yes";

var temp;

var largo=field.value.length;

for (var i=0; i<field.value.length; i++) {

	temp = "" + field.value.substring(i, i+1);

	if (valid.indexOf(temp) == "-1") {

		var eliminar = field.value.substring(i, i+1);

		field.value=field.value.replace(eliminar, '') ;

		}

	}

}



function validaRutDV(rut, dv) {

    var suma = 0;

    var mul = 2;

    var i = 0;

    for (i = rut.length-1; i >= 0; i--) {

        suma = suma + rut.charAt(i) * mul;

        mul = mul==7 ? 2 : mul+1;

    }

    var dvr = '' + (11 - suma % 11);

    if (dvr == '10')

        dvr = 'K';

    else if (dvr=='11')

        dvr = '0';

    if (dvr != dv) {

        	return false;

        }

    else {

 	       return true;

		}
}

function soloNumeros(e) 
{

	tecla = (document.all) ? e.keyCode : e.which;
	
	if (tecla==8) return true;
	
	patron = /\d/; // Solo acepta números
	
	te = String.fromCharCode(tecla);
	
	return patron.test(te);

} 
