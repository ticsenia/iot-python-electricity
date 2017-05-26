<?php
	require('conexion.php');
	$query="SELECT *  FROM umg511_tbl"; 
	$resultado=$mysqli->query($query);
?>
<html>
	<head>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
		<link href="style/style.css" rel="stylesheet" charset=UTF-8>
		<title>ConfigWeb - TTU</title>
		<link rel="shortcut icon" href="/img/icon.ico" />
	</head>
    <body>
	
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="ip.php">IP</a></li>
			<li><a href="datos.php">Data</a></li>
		</ul>
	 <div class="datos">
	<table>
	 <thead>
	  <tr class="centro">
	   <td>ID</td>
	   <td>Time</td>
	   <td>Download</td>
		</tr>
	 <tbody>
		  <?php while($row=$resultado->fetch_assoc()){ ?>
		<tr>
		 <td name="id">
		  <center> <?php echo $row['umg511_id']; ?> </center>
		 </td>
		 <td name="fecha">
		  <center><?php echo $row['umg511_day'];?></center>
		 </td>
		 <td name="descargar">
		  <form action="export.php" method="POST" id="enviar">
		    <input name="idOculto" id="idOculto" type="hidden" value="<?php echo $row['umg511_id']; ?>" />
		    <input name="fecha" id="idOculto" type="hidden" value="<?php echo $row['umg511_day']; ?>" />
			<center><input type="submit" value="Download" class="btn" /></center>
		  </form>
		 </td>
		</tr>
		  <?php } ?>
	 </tbody>
	</table>	

	 </div>
	 <div class="copy">
		<a>©Created only for Tallinn University of Technology (TUT)</a>
	 </div>
 </body>
</html>