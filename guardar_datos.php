<?php
include("db.php");

if (isset($_POST['guardar_datos'])){
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $automovil = $_POST['automovil'];
    $modelo = $_POST['modelo'];

    $query = "INSERT INTO usuarios(nombre, edad, telefono, correo, automovil, modelo) VALUES ('$nombre', '$edad', '$telefono', '$correo', '$automovil', '$modelo')";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Query Failed");
    }

    $_SESSION['message'] = 'Usuario Guardado Exitosamente';
    $_SESSION['message_type'] = 'success';
    header("Location: index.php");
}
?>