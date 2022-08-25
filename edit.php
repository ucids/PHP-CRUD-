<?php
    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM usuarios WHERE id = '$id'";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado) == 1) {
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombre'];
            $edad = $row['edad'];
            $telefono = $row['telefono'];
            $correo = $row['correo'];
            $automovil = $row['automovil'];
            $modelo = $row['modelo'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $automovil = $_POST['automovil'];
        $modelo = $_POST['modelo'];

        $query = ("UPDATE usuarios SET 
            nombre = '$nombre', 
            edad = '$edad',
            telefono = '$telefono',
            correo = '$correo',
            automovil = '$automovil',
            modelo = '$modelo'
            WHERE id = $id");
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'usuario actualizado exitosamente';
        $_SESSION['message_type'] = 'info';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php") ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <h1>Editar Usuario</h1>
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Actualiza Nombre">
                        </div>
                        <div class="form-group">
                            <input name="edad" type="text" class="form-control" value="<?php echo $edad; ?>" placeholder="Actualiza edad">
                        </div>
                        <div class="form-group">
                            <input name="telefono" type="text" class="form-control" value="<?php echo $telefono; ?>" placeholder="Actualiza Telefono">
                        </div>
                        <div class="form-group">
                            <input name="correo" type="text" class="form-control" value="<?php echo $correo; ?>" placeholder="Actualiza correo">
                        </div>
                        <div class="form-group">
                            <table>
                            <tr>
                                <td align=left colspan=3>
                                    <select name="automovil" id="automovil" onchange="cargarModelos();">
                                        <option value=""> <?php echo $automovil ?> </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>                    
                                <td align=left colspan=3>
                                    <select name="modelo" id="modelo">
                                        <option value=""> <?php echo $modelo ?> </option>
                                    </select>
                                </td>
                            </tr>
                            </table>
                        </div>
                        <button class="btn-success" name="update">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include("includes/footer.php") ?>
