<?php 
                        if(isset($_POST['btnEnviar']))
                        {
                            try
                            {
                                include_once 'conexionBD.php';
                                
                                //SE DEBE NOMBRAR EL MISMO NOMBRE DE LAS COLUMNAS EN LOS INPUT DEL FORMULARIO EJEMPLO USUARIO EN BD Y EN INPUT USUARIO
                                $consultaSQL = "SELECT usuario, password FROM admin_info WHERE usuario=:usuario AND password=:password";
                                
                                $resultado = $pdo->prepare($consultaSQL);

                                $user = htmlentities(addslashes($_POST['usuario']));
                                $pass = htmlentities(addslashes($_POST['password']));

                                $resultado->bindValue(":usuario",$user);
                                $resultado->bindValue(":password",$pass);

                                $resultado->execute();

                                $numeroRegistro = $resultado->rowCount();

                                if($numeroRegistro!=0)
                                {
                                    session_start();
                                    $_SESSION['usuario'] = $_POST['usuario'];
                                    header("Location:admin.html");
                                }else
                                {
                                    echo "<style>
                                    .container{font-size:1.5em}
                                    </style> <div class='container text-center alert '>
                                                
                                                <a href='login.html'>Volver</a>
                                                <p>Usuario no registrado</p>
                                        </div>";  
                                }
                            }catch(Exception $e)
                            {
                                die("ERROR en iniciar sesión ".$e->getMessage());
                            }
                        }
                    ?>


public void empezarJuegos (View view){
    Intent empezarJuegos = new Intent(this, fragment_minijuegos.class);
    startActivity(empezarJuegos)
}