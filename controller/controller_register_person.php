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
           
            //Verificar que el DNI no se repita con PDO para evitar inyección SQL
            $check_dni = $pdo->prepare("SELECT us_dni FROM persona WHERE us_dni LIKE ? LIMIT 1");
            $check_dni->execute(["%" . $dni . "%"]);
            if($check_dni->rowCount() > 0){
                echo "<script>
                    alert('⚠️ El DNI ya se encuentra registrado. ⚠️');
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
