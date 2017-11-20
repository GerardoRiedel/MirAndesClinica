<?php 

//retorna los options de los bancos
function bancosOptions($conectar)
{
	$sqlBancos = mysql_query("
	SELECT 
		b.`id`, 
		b.`banco` 
	FROM 
		bancos b
	ORDER BY 
		b.`banco`
	", $conectar);
	
	while($rowBancos = mysql_fetch_array($sqlBancos))
	{
		?>
		<option value="<?php echo $rowBancos[id]; ?>"><?php echo $rowBancos[banco]; ?></option>
		<?php 
	}
}

//retorna el banco
//recibe el id del banco
function banco($id, $conectar)
{
	$sqlBancos = mysql_query("
	SELECT 
		b.`banco` 
	FROM 
		bancos b
	WHERE
		b.`id`=".$id."
	", $conectar);
	
	$rowBancos = mysql_fetch_array($sqlBancos);
	
	return $rowBancos[banco];
}

?>