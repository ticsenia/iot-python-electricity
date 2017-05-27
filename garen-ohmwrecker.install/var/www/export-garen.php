<?php
$host = 'localhost';
$user = 'garen';
$pass = 'Jan1tza511';
$db = 'janitza511';
$table = 'umg511_tbl';
$file = 'export';

$idDescargar = $_POST['idOculto'];
$fecha = $_POST['fecha'];
 
$link = mysql_connect($host, $user, $pass) or die("Can not connect." . mysql_error());
mysql_select_db($db) or die("Can not connect.");
 

$query = "SELECT * FROM umg511_tbl";
$result = $db->query($query);
if (!$result) die('Couldn\'t fetch records');
$headers = $result->fetch_fields();
foreach($headers as $header) {
    $head[] = $header->name;
}
$fp = fopen('php://output', 'w');

if ($fp && $result) {
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="export.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');
    fputcsv($fp, array_values($head)); 
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        fputcsv($fp, array_values($row));
    }
    die;
}
?>
