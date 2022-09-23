<?php

            include_once ('conexionBD.php');
            try{
                if(isset($_POST['enviar'])){
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $dni = $_POST['dni'];
                    $cantPersonas = $_POST['cantPersonas'];
                    $idioma = $_POST['idioma'];
                    $dia = $_POST['dia'];
                    $hora = $_POST['hora'];
                    
                    $consultaSQL = $pdo->prepare("INSERT INTO turno (nombre, apellido, dni, cantPersonas, idioma, dia, hora) VALUES (:nombre,:apellido,:dni,:cantPersonas,:idioma,:dia,:hora)");

                    $consultaSQL->bindParam("nombre", $nombre, PDO::PARAM_STR);
                    $consultaSQL->bindParam("apellido", $apellido, PDO::PARAM_STR);
                    $consultaSQL->bindParam("dni", $dni, PDO::PARAM_STR);
                    $consultaSQL->bindParam("cantPersonas", $cantPersonas, PDO::PARAM_STR);
                    $consultaSQL->bindParam("idioma", $idioma, PDO::PARAM_STR);
                    $consultaSQL->bindParam("dia", $dia, PDO::PARAM_STR);
                    $consultaSQL->bindParam("hora", $hora, PDO::PARAM_STR);
                
                    $result = $consultaSQL->execute();
                    if($result){
                        echo '<html>
                        <head>
                        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
                        </head>
                        </html><div class="container papa">
                        <div class="hijo">
                        <p>Felicidades <?php echo $nombres;?>, ya te inscribiste para una visita!</p>
                        <p>Cuando llegués al Museo solo decínos tu DNI para verificar el turno</p>
                        <p><a href="index.html">Volver a la pagina</a></p>
                        </div>
                    </div>
                    <style>
                        a{
                            text-decoration: underline;
                            color:white;
                        }
                        a:hover{
                            color:white;
                        }
                        .papa{
                            border-radius:100px;
                            margin-top:20vh;
                            font-weight:bold;
                            font-size:1.2em;
                            color: white;
                            display:flex;
                            justify-content:center;
                            align-items:center;
                            text-align:center;
                            background-color: #007acc;
                        }

                    </style>
                    ';
                    }else{
                        echo '<div class="container alert alert-danger text-center mt-5">
                            ALGO SALIO MAL!
                        </div>';
                    }
                }
            }catch(Exception $e){
                die("Algo salio mal. Contacte al administrador ".$e->getMessage());
            }
        
        ?>
