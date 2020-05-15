<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/gestor.css">
    <title>Gestor tabla personas</title>
</head>

<body>
    <h1>Gestor para la tabla personas</h1>
    <h2>Crear y actualizar personas</h2>
    <div>
        <form action="gestor.php" method="post">
            <p>
                <label>Cedula</label>
                <input id='cedula' name='cedula' required type='number'>
            </p>
            <p>
                <label>Nombre</label>
                <input id='nombre' name='nombre' required type='text'>
            </p>
            <p>
                <label>Apellido</label>
                <input id='apellido' name='apellido' required type='text'>
            </p>
            <p>
                <label>Correo electrónico</label>
                <input id='email' name='email' required type='text'>
            </p>
            <p>
                <label>Edad</label>
                <input id='edad' name='edad' required type='number'>
            </p>
            <p>
                <input class='button' type='submit' value='Enviar'>
            </p>
        </form>
    </div>

    
    <?php
    include_once dirname(__FILE__) . '/config/config.php';
    include_once dirname(__FILE__) . '/sql_queries/sqlqueries.php';
    if (isset($_POST["cedula"]) && isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_POST["edad"])) {
        $persona = new Persona;
        $persona->nombre = $_POST["nombre"];
        $persona->apellido = $_POST["apellido"];
        $persona->cedula = $_POST["cedula"];
        $persona->correo_electronico = $_POST["email"];
        $persona->edad = $_POST["edad"];
        insert_into_Personas($persona);
    }
    ?>


</body>

</html>