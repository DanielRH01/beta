<?php 

include 'model/connect.php';

$colums = [
    'us_id',
        'us_first_name',
        'us_last_name',
        'us_dni',
        'us_email',
        'us_date'
    ];
    
    //variable para la tabla de la base de datos 
    $table = "persona";
    
    //Recepción de datos enviados mediante fetch desde index.php
    $search = isset( $_POST['search']) ? $conn->real_escape_string($_POST['search']) : null;
    
    //Condicional para la búsqueda de datos en la tabla 
    $where = '';
    if($search != null){
        $where = "WHERE (";

        $cont = count($colums);
        for($i=0; $i<$cont; $i++){
            $where .= $colums[$i] . " LIKE '%" . $search ."%' OR ";
        }
        $where = substr_replace($where, "", -3);
        $where .= ")";
    }

   //Sentencia SQL para ver los datos en la tabla
   
   $sql = $conn->query("SELECT " . implode(", ", $colums) . " FROM $table $where ");
   $rows = $sql->num_rows;
   
   if($rows > 0){
       while($rows = $sql->fetch_object()){?>
            <tr>
                <td> <?= $rows->us_id ?> </td>
                <td><?= $rows->us_first_name ?></td>
                <td><?= $rows->us_last_name ?></td>
                <td><?= $rows->us_dni ?></td>
                <td><?= $rows->us_email ?></td>
                <td><?= $rows->us_date ?></td>
                <td>
                    <a href="modify_person.php?id=<?= $rows->us_id; ?>" class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></a>
                    
                    <a href="controller/controller_delete_person.php?id=<?= $rows->us_id; ?>" 
                        onclick="return confirm('¿Estás seguro de eliminar este registro?');"
                        class="btn btn-danger">
                        <i class="fa-solid fa-user-minus"></i>
                    </a>
            </tr>
                <?php }
            }
                    
                    
                    ?>