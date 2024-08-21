<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Gráfico de Líneas</title>
<style>


    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Times New Roman", Times, serif;
    }


.container {
  width: 80%;
  max-width: 65%;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 85vh;
  margin: 0;
  margin-left: 17%;
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
            <div class="w3-button w3-block w3-left-align w3-hover-light-blue" style="color:white;" onclick="myAccFunc()"><b>Termòstat  </b><i class="fa fa-caret-down"></i>
            </div>
            <div id="demoAcc" class="w3-hide w3-white" style="background-color: #53A6D0;">
                <a href="Control_temp.php" class="w3-bar-item w3-button w3-hover-light-blue" style="background-color: #53A6D0; color: white"><b>Control Temperatura</b></a>
                <a href="Canviar_sortida.php" class="w3-bar-item w3-button w3-hover-light-blue" style="background-color: #53A6D0; color:white"><b>Canvi de dispositiu</b></a>
            </div>
        </div>
        <div id="main">
    
            <div class="w3-animate-top w3-card-4" style="background:#6028DB; color: white">
                <button id="openNav" class="w3-button w3-xxlarge" style="background:#6028DB" onclick="w3_open()">☰ </button>
                <h1 style="display:inline; position: absolute;">Gràfica Temperatura</h1>
        
            </div>
        </div>


<div class="container">
  <canvas id="lineChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

// script.js
function valoresData(dato1, dato2, dato3, dato4, dato5, dato6, dato7, dato8, dato9, dato10, dato11, dato12)
{
    function myFunc() {
        const x = [];
        var i = 0;
        var now = new Date();
        var time = now.getHours();
        switch(time)
        {
            case 2:
            case 3:
                i = 1;
            break;
            
            case 4:
            case 5:
                i = 2;
            break;
            
            case 6:
            case 7:
                i = 3;
            break;
            
            case 8:
            case 9:
                i = 4;
            break;
            
            case 10:
            case 11:
                i = 5;
            break;
            
            case 12:
            case 13:
                i = 6;
            break;
            
            case 14:
            case 15:
                i = 7;
            break;
            
            case 16:
            case 17:
                i = 8;
            break;
            
            case 18:
            case 19:
                i = 9;
            break;
            
            case 20:
            case 21:
                i = 10;
            break;
            
            case 22:
            case 23:
                i = 11;
            break;
            
            case 24:
            case 0:
            case 1:
                i = 0;
            break;
        }
        var y = 0;
        
        for (var a = 0; a <= i; a++)
        {
            switch(a)
            {
                case 0: y = dato1; break;
                case 1: y = dato2; break;
                case 2: y = dato3; break;
                case 3: y = dato4; break;
                case 4: y = dato5; break;
                case 5: y = dato6; break;
                case 6: y = dato7; break;
                case 7: y = dato8; break;
                case 8: y = dato9; break;
                case 9: y = dato10; break;
                case 10: y = dato11; break;
                case 11: y = dato12; break;
            }
            x[a] = y;
        }
        return x;
    }
        
    const ctx = document.getElementById('lineChart').getContext('2d');

    const lineData = {
        labels: ['0:00 h', '2:00 h', '4:00 h', '6:00 h', '8:00 h', '10:00 h', '12:00 h', '14:00 h', '16:00 h', '18:00 h', '20:00 h', '22:00 h', '24:00 h'],
        datasets: [{
            label: 'Temperatura',
            data: myFunc(),
            //data: [dato1, dato2, dato3, dato4, dato5, dato6, dato7, dato8, dato9, dato10, dato11, dato12, dato1],
            borderColor: 'rgba(24, 73, 255)',
            backgroundColor: 'rgba(0, 215, 163, 0.2)',
            fill: true,
            tension: 0 // Ajusta la curvatura de la línea
        }]
    };
    

    const config = {
        type: 'line',
        data: lineData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        color: 'white' // Color de las etiquetas de la leyenda
                    }
                },
                title: {
                    display: true,
                    text: 'Temperatura Ambient',
                    color: 'white' // Color del título
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Temps (h)',
                        color: 'white' // Color del título del eje x
                    },
                    ticks: {
                        color: 'white' // Color de las etiquetas del eje x
                    },
                    grid: {
                        drawBorder: true,
                        color: 'rgba(255, 255, 255, 0.2)' // Color de las líneas de la cuadrícula del eje x
                    }
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Temperatura (°C)',
                        color: 'white' // Color del título del eje y
                    },
                    ticks: {
                        color: 'white' // Color de las etiquetas del eje y
                    },
                    grid: {
                        drawBorder: true,
                        color: function(context) {
                            if (context.tick.value === 0) {
                                return '#e0e0e0'; // Color de la línea del 0
                        }
                        return '#e0e0e0'; // Color de otras líneas
                        },
                        lineWidth: function(context) {
                            if (context.tick.value === 0) {
                                return 3; // Ancho de la línea del 0
                            }
                        return 1; // Ancho de otras líneas
                        }
                    },
                    suggestedMin: -10,
                    suggestedMax: 40
                }
            }
        }
    };

    const lineChart = new Chart(ctx, config);

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
    //
    $sql = "SELECT status FROM TERMISTOR_status WHERE id=1";
	$result   = mysqli_query($conn, $sql);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=2";
	$result2   = mysqli_query($conn, $sql);
	$row2 = mysqli_fetch_assoc($result2);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=3";
	$result3   = mysqli_query($conn, $sql);
	$row3 = mysqli_fetch_assoc($result3);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=4";
	$result4   = mysqli_query($conn, $sql);
	$row4 = mysqli_fetch_assoc($result4);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=5";
	$result5  = mysqli_query($conn, $sql);
	$row5 = mysqli_fetch_assoc($result5);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=6";
	$result6  = mysqli_query($conn, $sql);
	$row6 = mysqli_fetch_assoc($result6);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=7";
	$result7  = mysqli_query($conn, $sql);
	$row7 = mysqli_fetch_assoc($result7);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=8";
	$result8  = mysqli_query($conn, $sql);
	$row8 = mysqli_fetch_assoc($result8);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=9";
	$result9   = mysqli_query($conn, $sql);
	$row9 = mysqli_fetch_assoc($result9);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=10";
	$result10   = mysqli_query($conn, $sql);
	$row10 = mysqli_fetch_assoc($result10);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=11";
	$result11   = mysqli_query($conn, $sql);
	$row11 = mysqli_fetch_assoc($result11);
	//
	$sql = "SELECT status FROM TERMISTOR_status WHERE id=12";
	$result12   = mysqli_query($conn, $sql);
	$row12 = mysqli_fetch_assoc($result12);
	
	
	while($row  = mysqli_fetch_assoc($result)){


?>
<div id='algo' style="color:#6288D9;"><?php echo $row['status'] ?></div>
<div id='algo2' style="color:#6288D9;"><?php echo $row2['status'] ?></div>
<div id='algo3' style="color:#6288D9;"><?php echo $row3['status'] ?></div>
<div id='algo4' style="color:#6288D9;"><?php echo $row4['status'] ?></div>
<div id='algo5' style="color:#6288D9;"><?php echo $row5['status'] ?></div>
<div id='algo6' style="color:#6288D9;"><?php echo $row6['status'] ?></div>
<div id='algo7' style="color:#6288D9;"><?php echo $row7['status'] ?></div>
<div id='algo8' style="color:#6288D9;"><?php echo $row8['status'] ?></div>
<div id='algo9' style="color:#6288D9;"><?php echo $row9['status'] ?></div>
<div id='algo10' style="color:#6288D9;"><?php echo $row10['status'] ?></div>
<div id='algo11' style="color:#6288D9;"><?php echo $row11['status'] ?></div>
<div id='algo12' style="color:#6288D9;"><?php echo $row12['status'] ?></div>
<script>
    var dato1 = document.getElementById("algo").textContent;
    var dato2 = document.getElementById("algo2").textContent;
    var dato3 = document.getElementById("algo3").textContent;
    var dato4 = document.getElementById("algo4").textContent;
    var dato5 = document.getElementById("algo5").textContent;
    var dato6 = document.getElementById("algo6").textContent;
    var dato7 = document.getElementById("algo7").textContent;
    var dato8 = document.getElementById("algo8").textContent;
    var dato9 = document.getElementById("algo9").textContent;
    var dato10 = document.getElementById("algo10").textContent;
    var dato11 = document.getElementById("algo11").textContent;
    var dato12 = document.getElementById("algo12").textContent;
    valoresData(dato1, dato2, dato3, dato4, dato5, dato6, dato7, dato8, dato9, dato10, dato11, dato12);
</script>
<?php
die();
    }
?>
</html>