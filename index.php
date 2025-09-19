<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CRUD</title>
    
    <!-- Link DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.min.css">
    
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
        <form class="col-3 p-4 bg-light border border-2 rounded" method="POST">
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
            <form action="" method="POST" role="search" class="d-flex mb-3">
                
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
                <tbody id="myTableBody">

                    <!-- Incluimos el controlador que carga los datos en la tabla -->    
                    <?php //include('controller/controller_load.php'); ?>

                </tbody>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.dataTables.min.js"></script>

    <script>
    // Ejecuta al inicio y al escribir en el input
    searchTable();
    document.getElementById("search").addEventListener("keyup", searchTable);

    // Script buscador dinámico
    function searchTable() {
        let input = document.getElementById('search').value;
        let content = document.getElementById('myTableBody'); // 👈 mejor usar <tbody>
        let url = "controller/controller_load.php";
        let formData = new FormData();
        formData.append('search', input);

        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json()) // servidor responde JSON
        .then(data => {
            // Limpiar tabla antes de agregar nuevos resultados
            content.innerHTML = "";

            // Si no hay resultados
            if (data.length === 0) {
                content.innerHTML = "<tr><td colspan='3'>No se encontraron resultados</td></tr>";
                return;
            }

            // Recorrer resultados y construir filas
            data.forEach(row => {
                let tr = `    
                    <tr>
                        <td>${row.us_id}</td>
                        <td>${row.us_first_name}</td>
                        <td>${row.us_last_name}</td>
                        <td>${row.us_dni}</td>
                        <td>${row.us_email}</td>
                        <td>${row.us_date}</td>
                        <td>
                            <a href="modify_person.php?id=${row.us_id}" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="controller/controller_delete_person.php?id=${row.us_id}" 
                                onclick="return confirm('¿Estás seguro de eliminar este registro?');"
                                class="btn btn-danger">
                                <i class="fa-solid fa-user-minus"></i>
                            </a>
                    </tr>
                `;
                content.innerHTML += tr;
            });
        })
        .catch(err => console.error("Error:", err));
    }
    </script>

</body>
</html>