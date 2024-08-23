<?php

// este scrip te ayuda a consultar un dato de una DB usando un correo como parametro de busqueda
function e_consulta($mail, $tabla, $dato){
    // Incluir la conexión a la base de datos
    include("conexion.php");

    // Preparar la consulta SQL
    $sql = "SELECT ".$dato." FROM ".$tabla." WHERE email = ?";

    // Preparar la sentencia
    if ($stmt = $conexion->prepare($sql)) {
        
        // Vincular el parámetro
        $stmt->bind_param("s", $mail);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            
            // Obtener el resultado
            $result = $stmt->get_result();
          

            // Verificar si el correo existe en la base de datos
            if ($result->num_rows > 0) {
                // Obtener la fila resultante
                $row = $result->fetch_assoc();
                
                // Obtener el dato solicitado
                $data = $row[$dato];

                // Cerrar la declaración y la conexión
                $stmt->close();
                $conexion->close();

                return $data;
            } else {
                // No se encontraron resultados
                $stmt->close();
                $conexion->close();
                return null;
            }
        } else {
            // Error en la ejecución de la consulta
            error_log("Error ejecutando la consulta: " . $stmt->error);
            $stmt->close();
            $conexion->close();
            return null;
        }
    } else {
        // Error preparando la consulta
        error_log("Error preparando la consulta: " . $conexion->error);
        $conexion->close();
        return null;
    }
}
?>