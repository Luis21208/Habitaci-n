<?php

$servername = "localhost";
$dBUsername = "id22302756_variables";
$dBPassword = "NinyoBrasil.01";
$dBName = "id22302756_tem";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

//Read the database
if (isset($_POST['check_RELE1_status'])) {
	$rele1_id = $_POST['check_RELE1_status'];	
	$sql = "SELECT * FROM RELE1_status WHERE id = '$rele1_id';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status'] == 0){
		echo "RELE1_is_off";
	}
	else{
		echo "RELE1_is_on";
	}	
}
if (isset($_POST['check_RELE2_status'])) {
	$rele2_id = $_POST['check_RELE2_status'];	
	$sql = "SELECT * FROM RELE2_status WHERE id = '$rele2_id';";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);
	if($row['status'] == 0){
		echo "RELE2_is_off";
	}
	else{
		echo "RELE2_is_on";
	}	
}

//Update the database
if (isset($_POST['h_DHT']) && $_POST['h_DHT'] != 'nan') {
	$DHT_humidity = $_POST['h_DHT'];	
	$sql = "SELECT * FROM DHT_status WHERE id = 1;";
	$update = mysqli_query($conn, "UPDATE DHT_status SET status = '$DHT_humidity' WHERE id = 1;");
	echo'WIIIII';
}	
else
{
    echo'retrasadooo';
}
if (isset($_POST['t_TERM']) && $_POST['t_TERM'] !='nan') {
	$TERM_tem = $_POST['t_TERM'];
	$sql = "SELECT * FROM TERMISTOR_status WHERE id = 1;";
	$update = mysqli_query($conn, "UPDATE TERMISTOR_status SET status = '$TERM_tem' WHERE id = 1;");
	echo'WAAAAA';
}
else
{
	echo'subnormaaal';
}
if (isset($_POST['nom_WIFI']) && $_POST['nom_WIFI'] !='nan') {
	$WIFI_name = $_POST['nom_WIFI'];
	$sql = "SELECT * FROM WIFI_status WHERE id = 1;";
	$update = mysqli_query($conn, "UPDATE WIFI_status SET status = '$WIFI_name' WHERE id = 1;");
	echo'WIFI enviado';
}
else
{
	echo'WIFI no enviado';
}
if (isset($_POST['contra_WIFI']) && $_POST['contra_WIFI'] !='nan') {
	$PASSW_wifi = $_POST['contra_WIFI'];
	$sql = "SELECT * FROM CONTRASENYA_status WHERE id = 1;";
	$update = mysqli_query($conn, "UPDATE CONTRASENYA_status SET status = '$PASSW_wifi' WHERE id = 1;");
	echo'CONTRA puesta';
}
else
{
	echo'CONTRA no puesta';
}

?>