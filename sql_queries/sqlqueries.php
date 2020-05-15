<?php
    include_once dirname(__FILE__) . '/../model/persona.php';
    function insert_into_Personas($persona)
    {
        $sql = 'INSERT INTO Personas (Nombre, Apellido, Correo_electronico, Edad, Cedula) VALUES (';
        $sql .= '\'' . $persona->nombre . '\'';
        $sql .= ', ';
        $sql .= '\'' . $persona->apellido . '\'';
        $sql .= ', ';
        $sql .= '\'' . $persona->correo_electronico . '\'';
        $sql .= ', ';
        $sql .= $persona->edad;
        $sql .= ', ';
        $sql .= $persona->cedula;
        $sql .= ')';

        // Crear conexión
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE);
        // Verificar conexión
        if (mysqli_connect_errno()) {
            echo "<br><div class=\"result_query error_text\"> Error en la conexión: " . mysqli_connect_error() . "</div>";
        } else {
            if (mysqli_query($con, $sql) ) {
                echo "<br><div class=\"result_query success_text\">¡EXITO!"  . "</div>";
            } else {
                echo "<br><div class=\"result_query error_text\">Error en la inserción: " . mysqli_error($con)  . "</div>";
            }
        }
        mysqli_close($con);
    }

    function delete_into_Personas($cedula){
        $sql = 'DELETE FROM Personas WHERE Cedula = ' . $cedula;
        // Crear conexión
        $con = mysqli_connect(HOST_DB, USUARIO_DB, USUARIO_PASS, DATABASE);
        // Verificar conexión
        if (mysqli_connect_errno()) {
            echo "<br><div class=\"result_query error_text\"> Error en la conexión: " . mysqli_connect_error() . "</div>";
        } else {
            if (mysqli_query($con, $sql)) {
                if(mysqli_affected_rows($con) > 0)
                    echo "<br><div class=\"result_query success_text\">¡EXITO!"  . "</div>";
                else
                    echo "<br><div class=\"result_query error_text\"> No se ha borrado ningún registro" . "</div>";  
            } else {
                echo "<br><div class=\"result_query error_text\">Error en la inserción: " . mysqli_error($con)  . "</div>";
            }
        }
        mysqli_close($con);
    }
?>