<?php
    $server = "localhost:3306";
    $username = "root";
    $password = "";
    $database = "rio_de_sabores";

    try {
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $direccion = $_POST["direccion"];
            $sabor = $_POST["sabor"];
            $tamaño = $_POST["tamaño"];
            $presentacion = $_POST["presentacion"];
            $tarjeta = $_POST["tarjeta"];
            $fecha_vencimiento = $_POST["fecha_vencimiento"];
            $cvv = $_POST["cvv"]; 

            $sql = "INSERT INTO pedidos (nombre, telefono, direccion, sabor, tamaño, presentacion, tarjeta, fecha_vencimiento, cvv) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $con->prepare($sql);

          

            if($stmt->execute([$nombre,$telefono,$direccion,$sabor,$tamaño,$presentacion,$tarjeta,$fecha_vencimiento,$cvv])){ 
                echo "Datos almacenados correctamente";
            } else { 
                echo "Error al almacenar los datos";    
            }
        }
    } catch(PDOException $e){
        die('Error de conexión: ' . $e->getMessage());
    }
?>
