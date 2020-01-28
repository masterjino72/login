<?php
include '/conexion/cn.php';
//Recibir los datos y almacenarlos en las variables
$correo = $_POST["correo"];
$pass = $_POST["pass"];

//Busca coincidencias de correo
$verificar_correo = mysqli_query($conexion, "SELECT * FROM tblUsers WHERE correo = '$correo' AND pass = '$pass'");
if (mysqli_num_rows($verificar_correo) > 0){
    header("Location:principal.html");
}
else{
    echo '<script>
    alert("Error en tus datos de registro");
    window.history.go(-1);
    </script>';
}
//Cerrar conexion
mysqli_close($conexion);
?>

