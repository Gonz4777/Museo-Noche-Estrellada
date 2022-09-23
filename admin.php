<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

</html>
<?php 
        if($_POST){
            require_once('conexionBD.php');
            
            $dni  = $_POST['dni'];
            $sql = "SELECT nombre, apellido,dni, cantPersonas, idioma, dia, hora, id_turno FROM turno WHERE dni =:dni";
            $stmt = $pdo->prepare($sql);
            $result = $stmt->execute(array(':dni'=>$dni));
            $rows = $stmt->fetchAll(\PDO::FETCH_OBJ);
            if(count($rows)){
                foreach($rows AS $row){
                    echo"<style>a{font-size:1.5em}</style><a href='admin.html'>Volver</a><div class='col-md-4 container'>
                    <table class='table table-dark table-striped'>
                        <tr>
                            <th class='table-light'>NOMBRE</th>
                            <th class='table-light'>APELLIDO</th>
                            <th class='table-light'>DNI</th>
                            <th class='table-light'>C.P</th>
                        </tr>
                        <tr>
                            <td>$row->nombre</td>
                            <td>$row->apellido</td>
                            <td>$row->dni</td>
                            <td>$row->cantPersonas</td>
                        </tr>
                    </table>
                </div>
                <div class='col-md-4 container'>
                    <table class='table table-dark table-striped'>
                        <tr>
                            <th class='table-light'>IDIOMA</th>
                            <th class='table-light'>DIA</th>
                            <th class='table-light'>HORA</th>
                            <th class='table-light'>ID_TURNO</th>
                        </tr>
                        <tr>
                            <td>$row->idioma</td>
                            <td>$row->dia</td>
                            <td>$row->hora</td>
                            <td>$row->id_turno</td>
                        </tr>
                    </table>
                </div>'";
                }
            }else{
                echo "<div class='container'><a href='admin.html'>Volver</a><p>Usuario no registrado en la base de datos</p></div> <style>
                .container{font-size:1.5em}
                </style>";
            }
        }else{
            echo "<a href='admin.html'>Volver</a><p>El usuario no existe en la base de datos</p><style>
            .container{font-size:1.5em}
            </style>";
        }
    
    ?>



