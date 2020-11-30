<?php

session_start();

if (empty($_SESSION["username"])) {
    header("Location: index.html");
    exit();
}
echo "<br>Bienvenido: <strong>" . $_SESSION["username"] . "</strong>";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Usuario</title>
</head>
<body>
    <h2>Pagina Usuario</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
