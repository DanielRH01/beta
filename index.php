<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center p-3">Hola Mundo</h1>     
    <div class="container-fluid row">
        <form class="col-3 p-4 border border-2 rounded" action="insert.php" method="post">
            <h4 class="text-center p-3">Registro</h4>
            <!-- NOMBRE DE USUARIO -->
            <div class="mb-3">
                <label for="Name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" placeholder="Escribe tu nombre">
            </div>
            <!-- APELLIDOS DE USUARIO -->
            <div class="mb-3">
                <label for="LastName" class="form-label">Apellidos</label>
                <input type="text" class="form-control" id="LastName" placeholder="Escribe tus apellidos">
            </div>
            <!-- DNI DE USUARIO -->
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" id="DNI" placeholder="Escribe tu DNI">
            </div>
            <!-- EMAIL DE USUARIO -->
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="Email" aria-describedby="emailHelp">
            </div>
            <!-- FECHA DE NACIMIENTO DE USUARIO  -->
            <div class="mb-3">
                <label for="Date" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="Date">
            </div>
            <!-- BOTON DE ENVIAR -->
            <button type="submit" class="btn btn-primary" value="OK">Registrar</button>
        </form>
        <div class="col-9 p-4">
            <!-- ESPACIO ENTRE FORMULARIO Y TABLA -->
            <table class="table ">
                <thead class="table-dark">
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Nacimiento</th>
                    <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include('model/connect.php');
                            $sql = $conn->query("Select * from persona");
                            while($datos=$sql->fetch_object()){?>
                                <tr>
                                    <td><?= $datos->us_id ?></td>
                                    <td><?= $datos->us_first_name ?></td>
                                    <td><?=$datos->us_last_name ?></td>
                                    <td><?= $datos->us_dni ?></td>
                                    <td><?= $datos->us_email ?></td>
                                    <td><?= $datos->us_date ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning">Editar</a>
                                        <a href="#" class="btn btn-danger">Eliminar</a>
                                </tr>
                            <?php
                                }
                            ?>

                    
                </tbody>
                </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>