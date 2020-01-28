<?php
include '/conexion/cn.php';
//Recibir los datos y almacenarlos en las variables
$nombres = $_POST["nombres"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$pass = $_POST["pass"];

//Consulta para insertar
$insert = "INSERT INTO tblUsers (nombres, apellidos, correo, pass) VALUES ('$nombres','$apellidos','$correo','$pass')";
//Busca coincidencias de correo

$verificar_correo = mysqli_query($conexion, "SELECT * FROM tblUsers WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0){
    echo '<script>
        alert("El correo electronico ya esta registrado");
        window.history.go(-1);
        </script>';
    exit;
}

$resultado = $conexion->query($insert);

if (!$resultado) {
    echo '<script>
        alert("Error al registrarse");
        window.history.go(-1);
        </script>';
}else {
    echo '<script>
        alert("Registro exitoso");
        window.history.go(-1);
        </script>';
    header("Location:principal.html");
}
//Cerrar conexion
mysqli_close($conexion);
?>