<?php
session_start();
echo session_id();
if (isset($_SESSION['mensaje'])) {
    echo $_SESSION["mensaje"];
} else {
    $_SESSION["mensaje"] = "hola Mundo";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Mario Osuna Ordóñez</h1>
</body>

</html>