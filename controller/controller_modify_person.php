<?php
    include('model/connect.php');

    //Controlador encargado de modificar los datos de la persona solo si están llenos los campos
    if(!empty($_POST['bttmmodify'])){
        
        $id=$_GET['id'];
        $first_name = $_POST['Name'];
        $last_name = $_POST['LastName'];
        $email = $_POST['Email'];

        if($first_name != "" and $last_name != "" and $email != ""){
            $sql =$conn->query("UPDATE persona SET us_first_name='$first_name', us_last_name='$last_name', us_email='$email' Where us_id='$id'");
            if($sql){
                echo 
                "<script>
                    alert('Registro modificado correctamente.');    //Mostrar alerta en js.
                    window.location = 'index.php';                    //Redirigir a index.php inmediatamente.
                </script>";

                //echo '<div class="alert alert-success"> Registro modificado correctamente. </div>';   
                //header("refresh:2; url=index.php");        ->      Redirigir a index.php después de 2 segundos
            }
        }else{
            echo 
            "<script>
                alert('⚠️ Debe completar todos los campos.');
            </script>";
        }

    }