<?php
    //Botón para validar los campos del formulario al presionar "Registrar"
    if(!empty($_POST['bttmregister'])){
        if(!empty($_POST['Name']) and !empty($_POST['LastName']) and !empty($_POST['DNI']) and !empty($_POST['Email']) and !empty($_POST['Date'])){
            
            $name = $_POST['Name'];
            $lastname = $_POST['LastName'];
            $dni = $_POST['DNI'];
            $email = $_POST['Email'];
            $date= $_POST['Date'];

            $sql = $conn-> query("insert into persona(us_first_name, us_last_name, us_dni, us_email, us_date) 
            values('$name', '$lastname', '$dni', '$email', '$date')");

            if($sql == 1){
                echo '<div class="alert alert-success"> Persona registrada correctamente. </div>';
            }else{
                echo '<div class="alert alert-danger"> Error al registrar. </div>';
            }

        }else{
            echo '<div class="alert alert-danger" Faltan campos por completar. </div>';
        }
    }

?>
