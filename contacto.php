<?php
    $server = "localhost:3306";
    $username = "Addiel";
    $password = "ajavier0880";
    $database = "rio_de_sabores";

    try {
        $con = new PDO("mysql:host=$server;dbname=$database;", $username, $password); // Corrección aquí

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];
            $mensaje = $_POST["mensaje"]; 

            $sql = "INSERT INTO mensajes_contacto (nombre, apellido, telefono, email, mensaje) 
                    VALUES (:nombre, :apellido, :telefono, :email, :mensaje)";

            $stmt = $con->prepare($sql);

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mensaje', $mensaje);

            if($stmt->execute()){ 
                echo "Datos almacenados correctamente";
            } else { 
                echo "Error al almacenar los datos";
            }
        }
    } catch(PDOException $e){
        die('Error de conexión: ' . $e->getMessage());
    }
?>
