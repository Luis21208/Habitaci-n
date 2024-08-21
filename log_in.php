<?php

$servername = "localhost";
$dBUsername = "id22302756_variables";
$dBPassword = "NinyoBrasil.01";
$dBName = "id22302756_tem";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

if (isset($_POST['log_in'])){
    $CAJA_wifi = $_POST['wifi'];
    $CAJA_password = $_POST['contra'];
    $sql = "SELECT status FROM WIFI_status WHERE 1";
	$result   = mysqli_query($conn, $sql);
	$row  = mysqli_fetch_assoc($result);

    $sql = "SELECT status FROM CONTRASENYA_status WHERE 1";
	$result2   = mysqli_query($conn, $sql);
	$row2  = mysqli_fetch_assoc($result2);

    if ($row["status"] == $CAJA_wifi && $row2["status"] == $CAJA_password){
        header("Location:Informacio.html");
        die();
    }
    else{
        echo"Connexió invàlida, alguna de les dues informacions és errònia o totes dues són errònies. ";
        echo"$CAJA_wifi, $CAJA_password";
        echo" || ";
        echo$row["status"];
    }
}
?>