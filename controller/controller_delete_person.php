<?php
    include('../model/connect.php');

    if(!empty($_GET['id'])){
       
        $id = $_GET['id'];

        $sql = $conn->query("DELETE FROM persona WHERE us_id = '$id'");
        
        if($sql){
            echo
            "<script>
                alert('✅ Registro eliminado correctamente.');
                window.location = '../index.php';
            </script>";
            exit;
        }else{
            echo "<script>
                alert('❌ Ocurrió un error al eliminar el registro.');
                window.location = 'index.php';
              </script>";
            exit;
        }
    }

?>