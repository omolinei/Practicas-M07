<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <script>
    function check(){
        if(!document.forms[0].email.value.length>0){
            alert("Has d'introduir un email.");
        }else{
            location.href="recuperarPass.php?email="+document.forms[0].email.value;
        }
    }

    </script>
</head>
<body>
    <form method="post">
        <input name="email" type="email" placeholder="Escribe tu email">
        <br><br>
        <input type="button" onclick="check()" value="Enviar">
        <br>
    </form>
    <br>
</body>
</html>