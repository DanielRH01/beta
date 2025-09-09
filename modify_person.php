<?php 
    include('model/connect.php');
    //Recibir el ID por GET
    $id = $_GET['id'];
    $sql = $conn->query("Select * from persona where us_id = '$id'");
    $datos = $sql->fetch_object();

?>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


        <div class="container-fluid row m-auto"> 
            
            <form class="col-3 p-4 border border-2 rounded m-auto" method="post">
                <?php
                    include('controller/controller_modify_person.php');
                ?>

                <h5 class="text-center p-3">Modificar Registro de persona</h5>
                

                <!-- ID DE USUARIO -->
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" name="Name" placeholder="<?= $datos->us_id?>" disabled>
                </div>
                
                <!-- NOMBRE DE USUARIO -->
                <div class="mb-3">
                    <label for="Name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="Name" value="<?= $datos->us_first_name?>">
                </div>

                <!-- APELLIDOS DE USUARIO -->
                <div class="mb-3">
                    <label for="LastName" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="LastName" value="<?= $datos->us_last_name?>">
                </div>
                
                <!-- DNI DE USUARIO -->
                <div class="mb-3">
                    <label for="DNI" class="form-label">Documento</label>
                    <input type="text" class="form-control" name="DNI" value="<?= $datos->us_dni?>" disabled>
                </div>
                
                <!-- EMAIL DE USUARIO -->
                <div class="mb-3">
                    <label for="Email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="Email" aria-describedby="emailHelp" value="<?= $datos->us_email?>">
                </div>
                
                <!-- FECHA DE NACIMIENTO DE USUARIO  -->
                <div class="mb-3">
                    <label for="Date" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" name="Date" value="<?= $datos->us_date?>" disabled>
                </div>
                
                <!-- BOTON DE ENVIAR -->
                <button type="submit" class="btn btn-primary" value="ok" name="bttmmodify">Modificar</button>
                <a href="index.php" class="btn btn-success">Regresar</a>
            </form>
        
    </div>