<?php

session_start();

if (empty($_SESSION["correo"])) {
    header("Location: login.html");
    exit();
}
echo "<br>Has iniciado sesion con este correo: <strong>" . $_SESSION["correo"] . "</strong>";
if ($_SESSION["correo"]=="admin@gmail.com"){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Admin</title>
</head>
<body>
    <p>Pagina Admin</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
<?php
}else{
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
<?php
}
?>