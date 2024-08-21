<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-escalable=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>control_temperatura</title>
    <style>

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Times New Roman", Times, serif;
    }

    .slidecontainer {
    width: 100%;
    display: flex;
    position:absolute;
    top:50%;
    justify-content: center;
    }

.slider {
  -webkit-appearance: none;
  position:absolute;
  top:10%;
  margin-top:2%;
  width: 25%;
  height: 10px;
  background: #d3d3d3;
  opacity: 0.7;
  outline: none;
  border-radius: 5px;
  -webkit-transition: .2s;
  transition: opacity .2s;

  transform: rotate(-90deg);
}

.textSlider
{
    position:fixed;
    top:15%;
    margin-top:2%;
    margin-bottom:2%;
    justify-content: center;
    box-sizing: border-box;
    font-family: "Times New Roman", Times, serif;
}

.slider:hover {
  opacity: 1;
}

    .slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 23px;
    height: 24px;
    border-radius: 50%;
    background: purple;
    cursor: pointer;
    }

    .slider::-moz-range-thumb {
    width: 23px;
    height: 24px;
    border-radius: 50%;
    background: purple;
    cursor: pointer;
    }


    .slider-marks {
    flex-direction: column-reverse;
    padding-top:47%;
    position:absolute;
    left:53%;
    color: white;
}

.mark {
    /*display: flex;
    position: relative;*/
}

.mark .line {
    /*position: absolute;
    left: 45%;
    top:-250%;
    margin-top:55%;
    transform: translateX(100%);
    width: 15%;
    height: 5%;
    background-color: white;*/
}

.span {
    font-size: 13px;
    position:absolute;
    top:-21.5%;
}

.span2
{
    font-size: 13px;
    position:absolute;
    top:-11.5%;
}

.span3
{
    font-size: 13px;
    position:absolute;
    top:-1.3%;
}

.span4
{
    font-size: 13px;
    position:absolute;
    top:8.5%;
}

.span5
{
    font-size: 13px;
    position:absolute;
    top:18.5%;
}

.span6
{
    font-size: 13px;
    position:absolute;
    top:28.3%;
}

.linea
{
    position:absolute;
    top:45%;
    right:170%;
    width: 120%;
    height: 5%;
    background: white;
}
    </style>
</head>
<body style="background-color:#6288D9;" onload="my()">
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
            <h1 style="display:inline; position: absolute;">Control Temperatura</h1>
    
        </div>
    </div>


    <div class="slidecontainer">
        <input type="range" min="10" max="35" value="25" class="slider" id="myRange">
        <div class="slider-marks" style="font-weight: bold;">
            <div class="span"><div class="linea"></div>35</div>
            <div class="span2"><div class="linea"></div>30</div>
            <div class="span3"><div class="linea"></div>25</div>
            <div class="span4"><div class="linea"></div>20</div>
            <div class="span5"><div class="linea"></div>15</div>
            <div class="span6"><div class="linea"></div>10</div>
        </div>
   
            <div class="textSlider" style="color: white;">
                <p>Valor en ºC: <span id="demo"></span></p> 
            </div>
            
    </div>
    
    

    <script>
        function my()
        {
            var el = document.getElementById("algo").textContent;
            document.getElementById('myRange').value = el;
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


        var slider = document.getElementById("myRange");
        var output = document.getElementById("demo");
        output.innerHTML = slider.value;

        slider.oninput = function() {
        output.innerHTML = this.value;
        
        var a = document.getElementById("myRange").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true); // La URL está vacía para enviar la solicitud a la misma página
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        
        xhr.send("texto=" + encodeURIComponent(a));
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

if (isset($_POST['texto'])) {
    $Temp_dessat = $_POST['texto'];
    $update = mysqli_query($conn, "UPDATE TemDeseada_val SET value = '$Temp_dessat' WHERE id = 1;");
}
 
$sql = "SELECT value FROM TemDeseada_val WHERE 1";
$result   = mysqli_query($conn, $sql);
while($row  = mysqli_fetch_assoc($result))
{
?>

<div id='algo' style="color:#6288D9;"><?php echo $row['value'] ?></div>

<?php
die();
    }
?>

</html>