// Valida el e-mail dentro de un campo
function validarEmail(objeto) {
	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(objeto.value)){
		return true;
	} else {
		alert("La dirección de e-mail es incorrecta");
		return (false);
	}
}