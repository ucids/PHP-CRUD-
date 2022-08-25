<!-- Se importan los archivos necesarios para establecer la conexión con la base de datos
    y los elementos que se repiten durante la ejecución de la aplicación  -->
<?php include("db.php"); ?>
<?php include('includes/header.php'); ?>

    <main class="container p-4">
        <div class="row">
            <div class="col-md-4">
            <!-- Mensajes de la sesión -->
            <?php if (isset($_SESSION['message'])) { ?>
            <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php session_unset(); } ?>

            <!-- Formulario Agregar Usuario-->
            <div class="card card-body">
                <h1>Nuevo Usuario</h1>
                <form action="guardar_datos.php" method="POST">
                <div class="form-group">
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="edad" class="form-control" placeholder="edad" autofocus  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                </div>
                <div class="form-group">
                    <input  type="text" name="telefono" class="form-control" placeholder="Teléfono" maxlength="10"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                </div>
                <div class="form-group">
                    <input type="email" name="correo" class="form-control" placeholder="correo" autofocus>
                </div>
                <div class="form-group">
                    <table>
                        <tr>
                            <td align=left colspan=3>
                                <select name="automovil" id="automovil" onchange="cargarModelos();">
                                    <option value="">Selecciona un Automóvil...</option>
                                </select>
                            </td>
                        </tr>
                        <tr>                    
                            <td align=left colspan=3>
                                <select name="modelo" id="modelo">
                                    <option value="">Seleccione un Modelo...</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <input type="submit" name="guardar_datos" class="btn btn-success btn-block" value="Guardar Usuario">
                </form>
            </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Correo electrónico</th>
                            <th>Auto</th>
                            <th>Modelo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM usuarios";
                        $resultado_usuarios = mysqli_query($conn, $query);    
                        while($row = mysqli_fetch_assoc($resultado_usuarios)) { ?>
                        <tr>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['edad']; ?></td>
                            <td><?php echo $row['telefono']; ?></td>
                            <td><?php echo $row['correo']; ?></td>
                            <td><?php echo $row['automovil']; ?></td>
                            <td><?php echo $row['modelo']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="borrar_usuario.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

<?php include('includes/footer.php'); ?>