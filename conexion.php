<?php
// Función para establecer la conexión a la base de datos
if(isset($_POST["id_mov"])){
    editar();
}
function conectar() {
    $host = 'localhost'; // Cambiar a la dirección IP si localhost no funciona
    $dbName = 'db_movimientos';
    $username = 'root'; // Tu nombre de usuario
    $password = ''; // Tu contraseña (si tienes una)

    $conexion = mysqli_connect($host, $username, $password, $dbName);

    if (!$conexion) {
        die("No pudo realizarse la conexión: " . mysqli_connect_error());
    }

    return $conexion;
}
// Función para cerrar la conexión a la base de datos
function cerrarConexion($conexion) {
    mysqli_close($conexion);
}
//Function editar 
function editar(){
    // Captura el ID del movimiento a editar
    $id_mov = $_POST["id_mov"];
    $fecha = $_POST["fecha"];
    $tipo = $_POST["tipo"];
    $descripcion = $_POST["descripcion"];
    $monto = $_POST["monto"];
    $forma_de_pago = $_POST["forma_de_pago"];
    //$id_familia = $_POST["id_familia"];

    // Realiza la conexión a la base de datos y ejecuta la actualización
    $conexion = conectar();

    // Prepara la consulta SQL utilizando consultas preparadas para evitar la inyección de SQL
    $sql = "UPDATE `movimientos` SET `fecha`='$fecha', `tipo`='$tipo', `descripcion`='$descripcion',`monto`=$monto,`forma_de_pago`='$forma_de_pago'WHERE `id_mov`=$id_mov";
    $resultado=mysqli_query($conexion, $sql);
    if($resultado){
        echo "Movimiento modificado exitosamente";
    }else{
        echo "No se pudo modificar el movimiento";
    }
    cerrarConexion($conexion);
}
?>