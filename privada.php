<?php

session_start();

if (empty($_SESSION["email"])) {
    header("Location: formulari.html");
    exit();
}

echo "Benvingut";
?>

<p>Estas a la part privada de la pagina.</p>

<?php

include "logout.php";

?>