<?php
////////////////////////////////////////////////////
//Archivo de funciones generales
//Autor: Javier Pérez
//Fecha Creación: 4-7-2007
//Fecha Modificación: 06/07/2007
//Autor Modificación: Javier Pérez
////////////////////////////////////////////////////

//*********************	ARCHIVOS **********************//

function vaciarCarpeta($carpeta)
{
	$directorio = opendir($carpeta);
	while ($archivo = readdir($directorio))
	{
		if( $archivo != '.' && $archivo != '..' )
		{
			//echo $carpeta.$archivo;
			//si es un directorio, volvemos a llamar a la función para que elimine el contenido del mismo
			if (is_dir($carpeta.$archivo)) 
			{
				vaciarCarpeta($carpeta.$archivo);
			}
			//si no es un directorio, lo borramos
			unlink($carpeta.$archivo);
		}
	}
	closedir($directorio);
} 

//*********************	FIN ARCHIVOS **********************//


//*********************	AGREGAR LOG	**********************//

function agregarLog($url, $usuario, $nombreUsuario, $fecha, $descripcion, $conectar)
{
	mysql_query("
	INSERT INTO
		log
		(url, usuario, nombreUsuario, fecha, descripcion)
	VALUES
		('".$url."', '".$usuario."', '".$nombreUsuario."', '".$fecha."', '".$descripcion."')
	", $conectar);	
}


//*********************	CADENAS	**********************//

//corta una cadena, el inicio puede ser 0, si la cadena es mayor que la longitud agrega puntos suspensivos
function cortarCadena( $cadena, $inicio, $longitud )
{

	$nueva_cadena = '';
	$cuenta = 0;
	for( $contador = $inicio ; $contador < strlen($cadena) ; $contador++ )
	{
		$nueva_cadena = $nueva_cadena . $cadena[$contador];
		$cuenta = $cuenta + 1;
		if( $longitud == $cuenta )
		break;
	}
	if($longitud < strlen($cadena)){
	
		$nueva_cadena="$nueva_cadena...";
	}
	return $nueva_cadena;
}

// Convertir caracteres especiales a entidades ej. é a &eacute;
function caracteres_html($texto)
{
	$texto = htmlentities($texto); 
	return $texto;
}

// Convertir entidades a caracteres especiales ej. &eacute a é ;
function caracteres_html_inversa($texto)
{
	$texto = html_entity_decode($texto); 
	return $texto;
}

function elimina_acentos($cadena)
{
	$tofind = "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
	$replac = "AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";
	return(strtr($cadena,$tofind,$replac));
}
//*********************	FIN CADENAS	**********************//


//********************************IMAGENES****************************//

function redimensionar_jpeg($img_original, $img_nueva, $img_nueva_anchura, $img_nueva_altura, $img_nueva_calidad)
{ 
	// crear una imagen desde el original 
	$img = ImageCreateFromJPEG($img_original); 
	// crear una imagen nueva 
	$thumb = imagecreatetruecolor($img_nueva_anchura,$img_nueva_altura); 
	// redimensiona la imagen original copiandola en la imagen 
	ImageCopyResized($thumb,$img,0,0,0,0,$img_nueva_anchura,$img_nueva_altura,ImageSX($img),ImageSY($img)); 
	// guardar la nueva imagen redimensionada donde indicia $img_nueva 
	ImageJPEG($thumb,$img_nueva,$img_nueva_calidad);
	ImageDestroy($img);
}

//********************************FIN IMAGENES************************//


//*********************	FECHAS Y TIEMPO**********************//

//Retorna la fecha sumada x meses
//Recibe la fecha en formato dd/mm/YYYY
function sumarmeses($fechaini, $meses)
{
    //recortamos la cadena separandola en
    //tres variables de dia, mes y año
    $dia=substr($fechaini,0,2);
    $mes=substr($fechaini,3,2);
    $anio=substr($fechaini,6,4);
	
    //Sumamos los meses requeridos
    $tmpanio=floor($meses/12);
    $tmpmes=$meses%12;
    $anionew=$anio+$tmpanio;
    $mesnew=$mes+$tmpmes;
	
    //Comprobamos que al sumar no nos hayamos
    //pasado del año, si es así incrementamos
    //el año
	if($mesnew < 10)
	{
        $mesnew="0".$mesnew;
	}

    if ($mesnew > 12)
    {
        $mesnew=$mesnew-12;
        if ($mesnew < 10)
        $mesnew="0".$mesnew;
        $anionew=$anionew+1;
    }
		
    //Ponemos la fecha en formato americano y la devolvemos
    $fecha= $dia.'-'.$mesnew.'-'.$anionew;
    return $fecha;
}


//mandar la fecha en formato dia-mes-año o dia/mes/año
function sumaFechas($fecha,$ndias)
{

	if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha))
		list($dia,$mes,$año)=split("/", $fecha);
		
	if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha))
		list($dia,$mes,$año)=split("-",$fecha);
	
	$nueva = mktime(0,0,0, $mes,$dia,$año) + $ndias * 24 * 60 * 60;
	$nuevafecha=date("d/m/Y",$nueva);
	
	return ($nuevafecha);  
}

//Resta dos fechas en formato dd-mm-aaaa y devuelve los días de diferencia
function restaDosFechas($minuendo, $sustraendo)
{
	//Separo los días, meses y años de las dos fechas
	list( $dia1, $mes1, $ano1) = split( '[/.-]', $minuendo );
	list( $dia2, $mes2, $ano2) = split( '[/.-]', $sustraendo );
	
	//Resto las fechas en timestamp (segundos) y luego lo transformo a días
	$minuendo = mktime(0,0,0, $mes1,$dia1,$ano1);
	$sustraendo = mktime(0,0,0, $mes2,$dia2,$ano2);
	
	$resultado = $minuendo - $sustraendo;
	$resultado = $resultado / (60 * 60 * 24);
	
	return $resultado;
}

//da vuelta la fecha entregada ano-mes-dia
function VueltaFecha($fecha)
{
	
	$fecha=explode("-",$fecha);
	$fecha="$fecha[2]-$fecha[1]-$fecha[0]";
	return $fecha;
	
}

//da vuelta la fecha entregada ano-mes-dia
function VueltaFechaSlash($fecha)
{
	$fecha=explode("-",$fecha);
	$fecha="$fecha[2]/$fecha[1]/$fecha[0]";
	return $fecha;
}

//CONVIERTE UN MES EN NÚMERO A PALABRA
function MesPalabra($mes){
	
	switch($mes){
		
		case 1:
			return "Enero";
			break;
		
		case 2:
			return "Febrero";
			break;
		
		case 3:
			return "Marzo";
			break;
		
		case 4:
			return "Abril";
			break;
		
		case 5:
			return "Mayo";
			break;
		
		case 6:
			return "Junio";
			break;
		
		case 7:
			return "Julio";
			break;
		
		case 8:
			return "Agosto";
			break;
		
		case 9:
			return "Septiembre";
			break;
		
		case 10:
			return "Octubre";
			break;
		
		case 11:
			return "Noviembre";
			break;
		
		case 12:
			return "Diciembre";
			break;
	}
}

//Transforma la fecha a palabras
//Entrada 'd-m-Y'
function fecha_palabra($fecha)
{
	$fecha = explode('-',$fecha);
	$mes = $fecha[1];
	
	return $fecha[0].' de '.MesPalabra($mes).' del '.$fecha[2];
}

//Transforma el dia en ingles a español
//Entrada: dia en ingles
function diaPalabra($dia)
{
	switch($dia){
		
		case 1:
			return "Lunes";
			break;
		
		case 2:
			return "Martes";
			break;
		
		case 3:
			return "Miercoles";
			break;
		
		case 4:
			return "Jueves";
			break;
		
		case 5:
			return "Viernes";
			break;
		
		case 6:
			return "S&aacute;bado";
			break;
		
		case 0:
			return "Domingo";
			break;
	}		
}

//OPERACIONES CON TIEMPOS
function dateadd($date, $dd, $mm, $yy, $hh, $mn, $ss)
{
	$date_r = getdate(strtotime($date));
	$date_result = date("H:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),0,1,1,98));
	return $date_result;
}
	
function RestarHoras($horaini,$horafin)
{
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);

	$dif=$fin-$ini;

	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H:i:s",mktime($difh,$difm,$difs));
}	

function restaHoras($horaIni, $horaFin)
{
    return (date("H:i:s", strtotime("00:00:00") + strtotime($horaFin) - strtotime($horaIni) ));
}

//Recibe la fecha YYYY-MM-DD HH:MM:SS
function formatearFechaHora ($fecha)
{
	$fecha = explode("-",$fecha);
	$dia = explode(" ",$fecha[2]);
	$dia = $dia[0];	
	
	$tiempo = explode(" ",$fecha[2]);
	
	$ano = $fecha[0];
	$mes = $fecha[1];
	
	$hora = $dia[0];
	
	return $dia.'-'.$mes.'-'.$ano.' '.$tiempo[1];
}

//Retorna el día de la semana siendo 1=domingo
//Recibe la fecha en formato YYYY-MM-DD
function diaDeLaSemana($fecha)
{
	$sql = mysql_query("
	SELECT 
		DAYOFWEEK('$fecha') as DAY
	");
	
	$row = mysql_fetch_array($sql);
	
	return $row[DAY];
}
//*********************	FIN FECHAS **********************//


//*********************	ENCRIPTACION **********************//

//recibimos un entero
function Encriptar($i)
{
	return $i*98;
}

function Desencriptar($i)
{

	return $i/98;
}

//*********************	FIN ENCRIPTACION **********************//



//*********************	DATOS USUARIOS **********************//

function siEstaLogueado()
{
	if($_SESSION['idUsuario'])
	{
		return true;
	}
	else
	{
		return false;
	}
}

//*********************	FIN DATOS USUARIOS **********************//


//*********************	VALIDADORES **********************//

function alpha_numeric($str)
{
	return ( ! preg_match("/^([-a-z0-9])+$/i", $str)) ? FALSE : TRUE;
}

function valid_email($str)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

//RESTRINGE LAS PALABRAS QUE NO DEBEN SER USADAS
//TANTO AL CREAR UNA ADQUISICIÓN COMO OFERTAR
//O EL ENVÍO DE PREGUNTAS
function restriccionesPalabras($cadena)
{
	//VARIABLE DE BANDERA
	$bandera = 0;
	
	//SEPARO EL STRING EN PALABRAS
	$num_palabras = count(explode(' ',$cadena));
	$palabras = explode(' ',$cadena);
	
	//REVISO CADA UNA DE LAS PALABRAS
	for($i=0; $i<$num_palabras; $i++)
	{
		//EMAIL
		if(valid_email($palabras[$i]) == TRUE)
		{
			$bandera++;
		}
		//SI ES UN NUMERO MUY LARGO PUEDO ASUMIR QUE ES UN TELEFONO
		if(is_numeric($palabras[$i]) and strlen($palabras[$i]) >= 7)
		{
			$bandera++;
		}
		//SI ES UN LINK
		if(substr_count($palabras[$i], 'href') > 0 or substr_count($palabras[$i], 'HREF') > 0 or substr_count($palabras[$i], '<a') or substr_count($palabras[$i], '<A'))
		{
			$bandera++;
		}
	}
	
	return $bandera;
}
//*********************	FIN VALIDADORES **********************//


//*********************	NUMEROS	**********************//

function PonerPunto($numero)
{
	if($numero == NULL)
	{
		return 0;
	}
	else
	{
		//Si es float
		if(substr_count($numero, '.') != 0)
		{
			$numero=number_format($numero,2,",",".");
		}
		else
		{
			$numero=number_format($numero,0,",",".");
		}
		return $numero;
	}	
}

function SacarPunto($numero)
{
	
	$numero=str_replace(".","",$numero);
	return $numero;
}

function calcularPorcentaje($total, $frecuencia, $decimales)
{
	if($total == 0)
	{
		return 0;
	}
	else
	{
		return number_format($frecuencia/$total * 100, $decimales);	
	}
}

function calcularPromedio($total, $cantidad, $decimales)
{
	if($cantidad == 0)
	{
		return 0;
	}
	else
	{
		return number_format($total/$cantidad, $decimales);	
	}
}

//********************	FIN NUMEROS	********************//


//********************	MENSAJES	********************//

function mensajes($mensaje, $conectar)
{
	echo $mensaje;
	
	$_SESSION['msj'] = NULL;

	return $row[mensaje];
}

//********************	FIN MENSAJES	********************//

//********************	RUT	********************//

//retorna el dígito verificador de un RUT
//recibe el RUT en formato 15618988
function DigitoVerificador($rut) 
{

	$i = "0";
	$res = "0";
	
	while ( $rut ) {
	
		$resto = round((($rut/10)-floor($rut/10))*10);
			
		$rut = floor($rut/10);
		
		$res[$i++] = $resto;
		
	}
	
	$suma = ($res[0]*2+$res[1]*3+$res[2]*4+$res[3]*5+$res[4]*6+$res[5]*7+$res[6]*2+$res[7]*3)/11;
	
	$dv  = 11-ceil(($suma-floor($suma))*10);
	
	if ( $dv == "11" ) { $dv = "0"; }
	if ( $dv == "10" ) { $dv = "K"; }
	
	return $dv;

} 

//********************	FIN RUT	********************//

//********************	MONEDAS	********************//

//Retorna el valor del dolar con comas
function dolar()
{
	$archivo = "http://indicadores.latlink.net/variable2.asp?valor2=dolarobservado";
	
	$fp = @fopen($archivo, "r");
	$texto = fread($fp, 2000);
	$texto = nl2br($texto);
	
	$texto = str_replace("<br />","",$texto);
	$texto = str_replace("document.write('","",$texto);
	$texto = str_replace("');","",$texto);
	$texto = cortarCadena($texto,2,7);
	
	return $texto;
}

//Retorna el valor del euro con comas
function euro()
{
	$archivo = "http://indicadores.latlink.net/variable2.asp?valor2=euro";
	
	$fp = @fopen($archivo, "r");
	$texto = fread($fp, 2000);
	$texto = nl2br($texto);
	
	$texto = str_replace("<br />","",$texto);
	$texto = str_replace("document.write('","",$texto);
	$texto = str_replace("');","",$texto);
	$texto = cortarCadena($texto,2,7);

	return $texto;
}

function num2letras($num)
{
	$fem = true;
	$dec = true;
	
	//if (strlen($num) > 14) die("El n?mero introducido es demasiado grande"); 
	$matuni[2] = "dos";
	$matuni[3] = "tres";
	$matuni[4] = "cuatro";
	$matuni[5] = "cinco";
	$matuni[6] = "seis";
	$matuni[7] = "siete";
	$matuni[8] = "ocho";
	$matuni[9] = "nueve";
	$matuni[10] = "diez";
	$matuni[11] = "once";
	$matuni[12] = "doce";
	$matuni[13] = "trece";
	$matuni[14] = "catorce";
	$matuni[15] = "quince";
	$matuni[16] = "dieciseis";
	$matuni[17] = "diecisiete";
	$matuni[18] = "dieciocho";
	$matuni[19] = "diecinueve";
	$matuni[20] = "veinte";
	$matunisub[2] = "dos";
	$matunisub[3] = "tres";
	$matunisub[4] = "cuatro";
	$matunisub[5] = "quin";
	$matunisub[6] = "seis";
	$matunisub[7] = "sete";
	$matunisub[8] = "ocho";
	$matunisub[9] = "nove";
	
	$matdec[2] = "veint";
	$matdec[3] = "treinta";
	$matdec[4] = "cuarenta";
	$matdec[5] = "cincuenta";
	$matdec[6] = "sesenta";
	$matdec[7] = "setenta";
	$matdec[8] = "ochenta";
	$matdec[9] = "noventa";
	$matsub[3] = 'mill';
	$matsub[5] = 'bill';
	$matsub[7] = 'mill';
	$matsub[9] = 'trill';
	$matsub[11] = 'mill';
	$matsub[13] = 'bill';
	$matsub[15] = 'mill';
	$matmil[4] = 'millones';
	$matmil[6] = 'billones';
	$matmil[7] = 'de billones';
	$matmil[8] = 'millones de billones';
	$matmil[10] = 'trillones';
	$matmil[11] = 'de trillones';
	$matmil[12] = 'millones de trillones';
	$matmil[13] = 'de trillones';
	$matmil[14] = 'billones de trillones';
	$matmil[15] = 'de billones de trillones';
	$matmil[16] = 'millones de billones de trillones';
	
	$num = trim((string)@$num);
	if ($num[0] == '-')
	{
	  $neg = 'menos ';
	  $num = substr($num, 1);
	}
	else
	  $neg = '';
	while ($num[0] == '0')
	  $num = substr($num, 1);
	if ($num[0] < '1' or $num[0] > 9)
	  $num = '0' . $num;
	$zeros = true;
	$punt = false;
	$ent = '';
	$fra = '';
	for ($c = 0; $c < strlen($num); $c++)
	{
	  $n = $num[$c];
	  if (!(strpos(".,'''", $n) === false))
	  {
		  if ($punt)
			  break;
		  else
		  {
			  
			  $punt = true;
			  continue;
		  }
	  }
	  elseif (!(strpos('0123456789', $n) === false))
	  {
		  if ($punt)
		  {
			  if ($n != '0')
				  $zeros = false;
			  $fra .= $n;
		  }
		  else
			  $ent .= $n;
	  }
	  else
		  break;
	}
	$ent = '     ' . $ent;
	if ($dec and $fra and !$zeros)
	{
	  $fin = ' coma';
	  for ($n = 0; $n < strlen($fra); $n++)
	  {
		  if (($s = $fra[$n]) == '0')
			  $fin .= ' cero';
		  elseif ($s == '1')
			  $fin .= $fem ? ' una' : ' un';
		  else
			  $fin .= ' ' . $matuni[$s];
	  }
	}
	else
	  $fin = '';
	if ((int)$ent === 0)
	  return 'Cero ' . $fin;
	$tex = '';
	$sub = 0;
	$mils = 0;
	$neutro = false;
	while (($num = substr($ent, -3)) != '   ')
	{
	  $ent = substr($ent, 0, -3);
	  if (++$sub < 3 and $fem)
	  {
		  $matuni[1] = 'una';
		  $subcent = 'as';
	  }
	  else
	  {
		  
		  $matuni[1] = $neutro ? 'un' : 'uno';
		  $subcent = 'os';
	  }
	  $t = '';
	  $n2 = substr($num, 1);
	  if ($n2 == '00')
	  {
	  }
	  elseif ($n2 < 21)
		  $t = ' ' . $matuni[(int)$n2];
	  elseif ($n2 < 30)
	  {
		  $n3 = $num[2];
		  if ($n3 != 0)
			  $t = 'i' . $matuni[$n3];
		  $n2 = $num[1];
		  $t = ' ' . $matdec[$n2] . $t;
	  }
	  else
	  {
		  
		  $n3 = $num[2];
		  if ($n3 != 0)
			  $t = ' y ' . $matuni[$n3];
		  $n2 = $num[1];
		  $t = ' ' . $matdec[$n2] . $t;
	  }
	  $n = $num[0];
	  if ($n == 1)
	  {
		  $t = ' ciento' . $t;
	  }
	  elseif ($n == 5)
	  {
		  $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
	  }
	  elseif ($n != 0)
	  {
		  $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
	  }
	  if ($sub == 1)
	  {
	  }
	  elseif (!isset($matsub[$sub]))
	  {
		  if ($num == 1)
		  {
			  $t = ' mil';
		  }
		  elseif ($num > 1)
		  {
			  $t .= ' mil';
		  }
	  }
	  elseif ($num == 1)
	  {
		  $t .= ' ' . $matsub[$sub] . '&oacute;n';
	  }
	  elseif ($num > 1)
	  {
		  $t .= ' ' . $matsub[$sub] . 'ones';
	  }
	  if ($num == '000')
		  $mils++;
	  elseif ($mils != 0)
	  {
		  if (isset($matmil[$sub]))
			  $t .= ' ' . $matmil[$sub];
		  $mils = 0;
	  }
	  $neutro = true;
	  $tex = $t . $tex;
	}
	$tex = $neg . substr($tex, 1) . $fin;
	return ucfirst($tex);
}


//Creada el 24 de mayo
function cambiaCharset($x)
{
		$x = str_replace("±", "&ntilde", $x);
		$x = str_replace("-?","&Oacute", $x);
		$x = str_replace("+¦","±", $x);
		$x = str_replace("+æ","Ð", $x);
		
		$x = str_replace("Ð", "&Ntilde;", $x);
		$x = str_replace("-", "&Aacute;", $x);
		$x = str_replace("+ü", "&Aacute;", $x);	
		$x = str_replace("+", "&Eacute;", $x);
		$x = str_replace("+ë", "&Eacute;", $x);
		$x = str_replace("-", "&Iacute;", $x);
		$x = str_replace("Ë", "&Oacute;", $x);
		$x = str_replace("+ô", "&Oacute;", $x);
		$x = str_replace("+", "&Uacute;", $x);
		$x = str_replace("ß", "&aacute;", $x);
		$x = str_replace("Ú", "&eacute;", $x);
		$x = str_replace("Ý", "&iacute;", $x);
		$x = str_replace("¾", "&oacute;", $x);
		$x = str_replace("·", "&uacute;", $x);
		$x = str_replace("¦¦", "&acute;&acute;", $x);
		$x = str_replace("-¦-¦", "&acute;&acute;", $x);
		$x = str_replace("+æ", "&Ntilde;", $x);
		$x = str_replace("+æ +æ", "&Ntilde;", $x);
		$x = str_replace("+", "&Aacute;", $x);
		$x = str_replace("ü", "&nbsp;", $x);
		$x = str_replace("+", "&iquest;", $x);
		$x = str_replace("í", "&iexcl;", $x);
		$x = str_replace("<", "&lt;",$x);
		$x = str_replace(">", "&gt;",$x);
		$x = str_replace("-¿", "&acute;&acute;", $x);
		$x = str_replace("??", "&acute;&acute;", $x);
		$x = str_replace("¦¦", "&acute;&acute;", $x);
		$x = str_replace("¿'", "&acute;&acute;", $x);
		$x = str_replace("C&Aacute;¦digo", "C&oacute;digo", $x);
		$x = str_replace("Descripci&Aacute;¦n","Descripci&oacute;n",$x);
		$x = str_replace("Cat&Aacute;&iexcl;logo","Cat&aacute;logo",$x);
		$x = str_replace("P&Aacute;&iexcl;ginas","P&aacute;ginas",$x);
		$x = str_replace("-¦", "&deg;", $x);
		$x = str_replace("&Acirc;&deg;", "&deg;", $x);
		$x = str_replace("-¦", "&#176;", $x);
		$x = str_replace("&Acirc;&ordm;", "&#176;", $x);

	return $x;
}

function mesDeFecha($fecha)
{
	$invert = explode("-",$fecha); 
	$fecha_invert = $invert[0]."-".$invert[1]."-".$invert[2];
	$mes = $invert[1];	
	return $mes;
}

function anoDeFecha($fecha)
{
	$invert = explode("-",$fecha); 
	$fecha_invert = $invert[0]."-".$invert[1]."-".$invert[2];
	$ano = $invert[0];	
	return $ano;
}




function editames($fech)
{
	$fech =  str_replace("January", "Enero", $fech);
	$fech =  str_replace("February", "Febrero", $fech);	
	$fech =  str_replace("March", "Marzo", $fech);
	$fech =  str_replace("April", "Abril", $fech);
	$fech =  str_replace("May", "Mayo", $fech);
	$fech =  str_replace("June", "Junio", $fech);
	$fech =  str_replace("July", "Julio", $fech);
	$fech =  str_replace("August", "Agosto", $fech);
	$fech =  str_replace("September", "Septiembre", $fech);
	$fech =  str_replace("October", "Octubre", $fech);
	$fech =  str_replace("November", "Noviembre", $fech);
	$fech =  str_replace("December", "Diciembre", $fech);
	return ($fech);
}

function cambiaf_a_mysql($fecha){
	$mifecha = split("de", $fecha);
	$lafecha_2=trim($mifecha[2])."-".getMesNumero(trim($mifecha[1]))."-".trim($mifecha[0]);
	return $lafecha_2;
}

function getMesNumero($mes){
    $mes = strtoupper($mes);
    $meses = "ENERO     FEBRERO   MARZO     ABRIL     MAYO      JUNIO     JULIO     AGOSTO    SEPTIEMBREOCTUBRE   NOVIEMBRE DICIEMBRE ";
    $posicion = strpos($meses,$mes) + 10;
    return $posicion / 10;
}



?>