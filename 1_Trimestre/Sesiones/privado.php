<?
session_start();

$aut = $_SESSION["aut"] ?? false;

if (!$aut) {
   header("Location: formAutorizado.php"); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página privada</title>
</head>
<body>
    <h1>página privada</h1>
</body>
</html>