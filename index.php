<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CRUD</title>
    
    <!-- Link DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
    
    <!-- Link FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>     
    <div class="container-fluid row m-auto border">
        <nav class="navbar navbar-dark bg-dark mb-3 border-2 rounded col-12">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Mi CRUD</a>
            </div>
        </nav>

        <!-- FORMULARIO DE REGISTRO DE PERSONA -->
        <form class="col-3 p-4 bg-light border border-2 rounded" method="post">
            <?php //Incluimos la conexión a la base de datos y el controlador que registra y elimina a la persona para validar los campos del formulario
                include('model/connect.php');
                include('controller/controller_register_person.php');
            ?>        
            <h4 class="text-center p-3">Registro</h4>
            <!-- NOMBRE DE USUARIO -->
            <div class="mb-3">
                <label for="Name" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Name" placeholder="Escribe tu nombre">
            </div>
            <!-- APELLIDOS DE USUARIO -->
            <div class="mb-3">
                <label for="LastName" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="LastName" placeholder="Escribe tus apellidos">
            </div>
            <!-- DNI DE USUARIO -->
            <div class="mb-3">
                <label for="DNI" class="form-label">DNI</label>
                <input type="text" class="form-control" name="DNI" placeholder="Escribe tu DNI">
            </div>
            <!-- EMAIL DE USUARIO -->
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="Email" aria-describedby="emailHelp">
            </div>
            <!-- FECHA DE NACIMIENTO DE USUARIO  -->
            <div class="mb-3">
                <label for="Date" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" name="Date">
            </div>
            <!-- BOTON DE ENVIAR -->
            <button type="submit" class="btn btn-primary" value="ok" name="bttmregister">Registrar</button>
        </form>
        
        <!-- ESPACIO ENTRE FORMULARIO Y TABLA -->
        
        <div class="col-9 p-2">
           
            <!-- BUSCADOR DE REGISTROS -->
            <form action="" method="post" role="search" class="d-flex mb-3">
                
                <input type="text" placeholder="Buscar" id="search" name="search" class="form-control me-2 w-25">
                <button type="submit" class="btn btn-primary" name="btndate"><i class="fa-solid fa-magnifying-glass"></i></button>

            </form>
            
            <!-- TABLA DONDE SE MUESTRAN LOS REGISTROS DE LAS PERSONAS -->
             
            <table class="table" id="myTable">
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

                    <!-- Incluimos el controlador que carga los datos en la tabla -->    
                    <?php include('controller/controller_load.php'); ?>

                </tbody>
            </table>

                <script>
                    //Llamamos a la función que carga los datos en la tabla
                    searchTable();
                    document.getElementById("search").addEveentListener("keyup", searchTable);

                    //Script para el buscador de la tabla
                    function searchTable(){
                        let input = document.getElementById('search').value;
                        let content =  document.getElemetnById('myTable');
                        let url = "controller/controller_load.php";
                        let formData = new FormData();
                        formData.append('search', input);

                        fetch(url, {
                            method: 'POST',
                            body: formData
                            }
                        ).then(response=>response.json()).then(data => {
                            content.innerHTML = data;
                        }).catch(err => console.log(err));
                    }
                </script>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>