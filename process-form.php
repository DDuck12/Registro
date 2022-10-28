<?php

$nombre = $_POST["nombre"];
$cursillo = $_POST["cursillo"];
$comunidad = $_POST["comunidad"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];
$ultreyas = $_POST["ultreyas"];
$reunionDeGrupo = $_POST["reunionDeGrupo"];

var_dump($nombre, $cursillo, $comunidad, $telefono, $correo, $ultreyas, $reunionDeGrupo);

$host = "localhost";
$dbname = "registro_db";
$username = "root@localhost";
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}

echo "Connection is succesful.";

$sql = "INSERT INTO registro (nombre, cursillo, comunidad, telefono, correo, ultreyas, reunionDeGrupo)
        VALUES (?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssssss",
                       $nombre,
                       $cursillo,
                       $comunidad,
                       $telefono,
                       $correo,
                       $ultreyas,
                       $reunionDeGrupo);
                    
mysqli_stmt_execute($stmt);

echo "Saved record";