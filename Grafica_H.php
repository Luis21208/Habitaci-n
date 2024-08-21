<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="grafica_h.php">
    <title>Grafica_Humitat</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Times New Roman", Times, serif;
    }
        
        .container{
            display: flex;
            width: 420px;
            padding: 50px 0;
            border-radius: 8px;
            background: #fff;
            row-gap: 30px;
            flex-direction: column;
            align-items: center;
            margin-left: 35%;
            margin-top: 2%;
        }

        .circular-progress{
            position: relative;
            height: 250px;
            width: 250px;
            border-radius: 50%;
            background: conic-gradient(#6288D9 3.6deg, #e3e3e3 0deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circular-progress::before{
            content: "";
            position: absolute;
            height: 210px;
            width: 210px;
            border-radius: 50%;
            background-color: #fff;
        }

        .progress-value{
             position: relative;
             font-size: 40px;
             font-weight: 600;
             color: #6288D9; 
        }

        .text{
            font-size: 28px;
            font-weight: 500;
            color: #606060;
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
            <button class="w3-button w3-block w3-left-align w3-hover-light-blue" style="color:white;"onclick="myAccFunc()">
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
                <h1 style="display:inline; position: absolute;">Gràfica d'Humitat</h1>
        
            </div>
        </div>
    <div class="container" style="height: 80vh; display: flex; align-items: center; justify-content: center;">
        <div class="circular-progress">
            <span class="progress-value">0%</span>
        </div>

        <span class="text">Percentatge d'humitat</span>
    </div>
        

    <script>

        /*let circularProgress = document.querySelector(".circular-progress"),
        progressValue = document.querySelector(".progress-value");

        let progressStarValue = 0,
        progressEndValue = 100,
        speed = 10;

        let progress = setInterval(() => {          
            progressStarValue++;

            progressValue.textContent = `${progressStarValue}%` 
            circularProgress.style.background = `conic-gradient(#6288D9 ${progressStarValue * 3.6}deg, #ededed 0deg)`

        if(progressStarValue == progressEndValue){
          clearInterval(progress);
        }

        },  speed); */

            function repetir(el)
            {
                let circularProgress = document.querySelector(".circular-progress"),
                progressValue = document.querySelector(".progress-value");
                
                let progressStarValue = 0,
                speed = 10;

                let progressEndValue = parseInt(el);
        
                let progress = setInterval(() => {          
                    progressStarValue++;
        
                    progressValue.textContent = `${progressStarValue}%` 
                    circularProgress.style.background = `conic-gradient(#6288D9 ${progressStarValue * 3.6}deg, #ededed 0deg)`
        
                if(progressStarValue == progressEndValue){
                  clearInterval(progress);
                }
        
                },  speed); 
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

    $sql = "SELECT status FROM DHT_status WHERE 1";
	$result   = mysqli_query($conn, $sql);
	while($row  = mysqli_fetch_assoc($result)){


?>
<div id='algo' style="color:#6288D9;"><?php echo $row['status'] ?></div>
<script>
    var el = document.getElementById("algo").textContent;
    repetir(el);
</script>
<?php
die();
    }
?>
</html>