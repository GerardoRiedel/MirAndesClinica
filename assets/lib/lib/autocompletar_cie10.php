<?
session_name("agenda2");
session_start();

include('../lib/funciones.php');
include('../lib/conectar.php');
$conectar = conectar();

if(isset($_GET['getCountriesByLetters']) && isset($_GET['letters']))
{
	$letters = $_GET['letters'];
	
	$res = mysql_query("
	SELECT 
		f.`codigo`, 
		f.`tastorno`
	FROM 
		cie10 f
	WHERE 
		f.`tastorno` LIKE '%".$letters."%'
	ORDER BY
		f.`codigo` ASC
	", $conectar) or die(mysql_error());

	while($inf = mysql_fetch_array($res))
	{
		echo caracteres_html($inf["tastorno"])."###".caracteres_html($inf["tastorno"])."|";
	}	
}
?>