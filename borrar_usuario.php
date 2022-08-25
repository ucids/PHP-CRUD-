<?php 
    include("db.php");
    
    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "DELETE FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $query);

        if (!$resultado) {
            die("Query failed");
        }

        $_SESSION['message'] = "usuario elimiado exitosamente";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");

    }
?>