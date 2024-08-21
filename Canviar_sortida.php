<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Canvi</title>
<style>

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Times New Roman", Times, serif;
    }

.container {
  display: flex;
  justify-content: space-between;
  width: 80%;
  max-width: 60%;
  margin-left: 20%;
  margin-top: 10%;
}

.button-container {
  text-align: center;
}

.button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 10px;
  background-color: #8a1dff;
  color: white;
}

.text {
  font-size: 18px;
  color: white;
  margin-bottom: 5px;
}

    </style>
</head>
<body style="background-color:#6288D9;">
    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none;z-index:5; background-color:#53A6D0; font-size:169%" id="mySidebar">
        <button class="w3-bar-item w3-button w3-xxlarge"
        onclick="w3_close()" style="color:white;">Tancar ×</button>
        <hr>
        <a href="Informacio.html" class="w3-bar-item w3-button w3-hover-light-blue" style="color:white;"><b>Informació</b></a>
        <hr>
        <a href="Grafica_T.php" class="w3-bar-item w3-button w3-hover-light-blue" style="color:white;"><b>Gràfica Temperatura</b></a>  
        <hr>       
        <a href="Grafica_H.php" class="w3-bar-item w3-button w3-hover-light-blue" style="color:white;"><b>Gràfica Humitat</b></a>
        <hr>
        <button class="w3-button w3-block w3-left-align w3-hover-light-blue" style="color:white;" onclick="myAccFunc()">
        <b>Termòstat</b> <i class="fa fa-caret-down"></i>
        </button>
        <div id="demoAcc" class="w3-hide w3-white" style="background-color: #53A6D0;">
            <a href="Control_temp.php" class="w3-bar-item w3-button w3-hover-light-blue" style="background-color: #53A6D0; color: white"><b>Control Temperatura</b></a>
            <a href="Canviar_sortida.php" class="w3-bar-item w3-button w3-hover-light-blue" style="background-color: #53A6D0; color:white"><b>Canvi de dispositiu</b></a>
        </div>
    </div>
    <div id="main">

        <div class="w3-animate-top w3-card-4" style="background:#6028DB; color: white">
            <button id="openNav" class="w3-button w3-xxlarge" style="background:#6028DB" onclick="w3_open()">☰ </button>
            <h1 style="display:inline; position: absolute;">Canvi de Dispositiu</h1>
    
        </div>
    </div>


<form class="container" method="post">
  <input id="input_left" style="background-color: #6288D9; border-color:#6288D9; border: 0px; position:absolute; top:20%" name="statusLeft" type="text">
  <div class="button-container" style="position:absolute; left: 50%; top:35%;transform: translate(-50%, -50%);">
    <div class="text"> ‎ ‎ ‎ ‎ Calefactor ‎ ‎ ‎ ‎ </div>
    <button class="button" id="leftButton" type="submit" name="button_calefactor">Desactivat</button>
  </div>
  
</form>

<form class="container" method="post">
    <input id="input_right" style="background-color: #6288D9; border-color:#6288D9; border: 0px; position:absolute; top:20%" name="statusRight" type="text">
  <div class="button-container" style="position:absolute; left: 50%; bottom:15%; transform: translate(-50%, -50%);">
    <div class="text">Aire condicionat</div>
    <button class="button" id="rightButton" type="submit" name="button_aire">Desactivat</button>
  </div>
</form>


<script>
document.addEventListener('DOMContentLoaded', (event) => {
    const leftButton = document.getElementById('leftButton');
    const rightButton = document.getElementById('rightButton');
    var inputLeft = document.getElementById('input_left');
    var inputRight = document.getElementById('input_right');

    leftButton.addEventListener('click', () => {
        if (leftButton.innerHTML === 'Activat') {
            leftButton.innerHTML = 'Desactivat';
            inputLeft.value = '0';
        } else {
            leftButton.innerHTML = 'Activat';
            inputLeft.value = '1';
        }
    });
    

    rightButton.addEventListener('click', () => {
        if (rightButton.innerHTML === 'Activat') {
            rightButton.innerHTML = 'Desactivat';
            inputRight.value = '0';
        } else {
            rightButton.innerHTML = 'Activat';
            inputRight.value = '1';
        }
    });
});

function cambiar(bool1, bool2)
{
    const leftButton = document.getElementById('leftButton');
    const rightButton = document.getElementById('rightButton');
    
    if (bool1 == 0)
    {
        leftButton.innerHTML = 'Desactivat';
    }
    else {
        leftButton.innerHTML = 'Activat';
    }
    
    if (bool2 == 0)
    {
        rightButton.innerHTML = 'Desactivat';
    }
    else {
        rightButton.innerHTML = 'Activat';
    }
}

function w3_open() {
              document.getElementById("main").style.marginLeft = "25%";
              document.getElementById("mySidebar").style.width = "25%";
              document.getElementById("mySidebar").style.display = "block";
              document.getElementById("myOverlay").style.display = "block";
              document.getElementById("openNav").style.display = 'none'
            }
            function w3_close() {
              document.getElementById("main").style.marginLeft = "0%";
              document.getElementById("mySidebar").style.display = "none";
              document.getElementById("myOverlay").style.display = "none";
              document.getElementById("openNav").style.display = "inline-block";
            }

            function myAccFunc() {
            var x = document.getElementById("demoAcc");
            if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-purple";
            } else { 
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className = 
            x.previousElementSibling.className.replace(" w3-purple", "");
            }
            }

</script>
</body>

<?php

$servername = "localhost";
$dBUsername = "id22302756_variables";
$dBPassword = "NinyoBrasil.01";
$dBName = "id22302756_tem";
$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

if (isset($_POST['button_calefactor'])){
    $Calefactor_status = $_POST['statusLeft'];
    
    
    $update = mysqli_query($conn, "UPDATE RELE1_status SET status = '$Calefactor_status' WHERE id = 1;");
    
}
if (isset($_POST['button_aire']))
{
    $Aire_status = $_POST['statusRight'];
    
    $update = mysqli_query($conn, "UPDATE RELE2_status SET status = '$Aire_status' WHERE id = 1;");
}

$sql = "SELECT status FROM RELE1_status WHERE 1";
$result   = mysqli_query($conn, $sql);

$sql = "SELECT status FROM RELE2_status WHERE 1";
$result2   = mysqli_query($conn, $sql);
$row2 = mysqli_fetch_assoc($result2);
while($row  = mysqli_fetch_assoc($result))
{
?>
<div id='algo' style="color:#6288D9;"><?php echo $row['status'] ?></div>
<div id='algo2' style="color:#6288D9;"><?php echo $row2['status'] ?></div>

<script>
    var bool1 = document.getElementById("algo").textContent;
    var bool2 = document.getElementById("algo2").textContent;
    cambiar(bool1, bool2);
</script>

<?php
die();
    }
?>
</html>