function mostrar(tabla1){

	valor1 = eval("document.getElementById('" + tabla1 +"').style.display");

	if (valor1 != 'none'){
		 eval("document.getElementById('" + tabla1 +"').style.display = 'none'")
	}
	else{
		 eval("document.getElementById('" + tabla1 +"').style.display = ''")
	}
}
function muestraTabla(tabla1)
{
	 eval("document.getElementById('" + tabla1 +"').style.display = ''");
}
function ocultaTabla(tabla1)
{
	eval("document.getElementById('" + tabla1 +"').style.display = 'none'");
}