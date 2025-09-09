<?php
    include('model/connect.php');
    
    //Botón para validar los campos del formulario al presionar "Registrar"
    if(!empty($_POST['bttmregister'])){
        if(!empty($_POST['Name']) and !empty($_POST['LastName']) and !empty($_POST['DNI']) and !empty($_POST['Email']) and !empty($_POST['Date'])){
            
            $name = $_POST['Name'];
            $lastname = $_POST['LastName'];
            $dni = $_POST['DNI'];
            $email = $_POST['Email'];
            $date= $_POST['Date'];

            //Verificar que el DNI no se repita
            $check_dni = $conn->query("SELECT us_dni FROM persona WHERE us_dni = '$dni' LIMIT 1");
            if($check_dni->num_rows > 0){
                echo "<script>
                    alert('⚠️ El DNI ya está registrado.');
                    window.location = 'index.php';
                  </script>";
                exit;
            }

            $sql = $conn-> query("insert into persona(us_first_name, us_last_name, us_dni, us_email, us_date) 
            values('$name', '$lastname', '$dni', '$email', '$date')");

            if($sql){
                echo "<script>
                    alert('Registro agregado correctamente.');    //Mostrar alerta en js.
                    window.location = 'index.php';                    //Redirigir a index.php inmediatamente.
                </script>";
            }else{
                echo 
            "<script>
                alert('⚠️ Ocurrió un error.');
            </script>";
            }

        }else{
            echo 
            "<script>
                alert('⚠️ Debe completar todos los campos.');
            </script>";
        }
    }

?>
