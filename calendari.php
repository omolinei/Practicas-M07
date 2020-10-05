<?php
$mes=date("n");
$year=date("Y");
$diaActual=date("j");

# Obtenim el primer dia de la setmana
$diaSetmana=date("w",mktime(0,0,0,$mes,1,$year))+7;
# Obtenim el ultim dia de cada mes
$ultimDiaMes=date("d",(mktime(0,0,0,$mes+1,1,$year)-1));

$meses=array(1=>"Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol",
"Agost", "Setembre", "Octubre", "Novembre", "Decembre");
?>

<!DOCTYPE html>
<html lang="cat">
<head>
	<title>Calendari</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>

<body>
<h1>Calendari</h1>
<table id="calendari">
	<caption><?php echo $meses[$mes]." ".$year?></caption>
	<tr>
		<th>Dl</th><th>Dt</th><th>Dc</th><th>Dj</th>
		<th>Dv</th><th>Ds</th><th>Dg</th>
	</tr>
	<tr bgcolor="silver">
		<?php
		$last_cell=$diaSetmana+$ultimDiaMes;
		for($i=1;$i<=42;$i++)
		{
			if($i==$diaSetmana)
			{
				$day=1;
			}
			if($i<$diaSetmana || $i>=$last_cell)
			{
				echo "<td>&nbsp;</td>";
			}else{
				if($day==$diaActual)
					echo "<td class='avui'>$day</td>";
				else
					echo "<td>$day</td>";
				$day++;
			}
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
	?>
	</tr>
</table>
</body>
</html>
