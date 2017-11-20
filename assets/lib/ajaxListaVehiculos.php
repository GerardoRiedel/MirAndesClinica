<?

include('../lib/funciones.php');
include('../lib/conectar.php');
$conectar = conectar();

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters']))
{
	$letters = $_GET['letters'];
	$letters = caracteres_html($letters);
	
	$res = mysql_query("
	SELECT 
		c.`id`, 
		c.`placa` 
	FROM 
		vehiculos c
	WHERE 
		c.`placa` LIKE '".$letters."%'
	", $conectar) or die(mysql_error());

	while($inf = mysql_fetch_array($res))
	{
		echo $inf["id"]."###".$inf["placa"]."|";
	}	
}
?>
