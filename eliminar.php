<?php
if(isset($_GET["id"])){
    include("conexion.php");
    $enlace = conectar(); // Estableces la conexión
    $sql = "DELETE FROM `movimientos` WHERE `id_mov` = ".$_GET["id"];
    $resultado = mysqli_query($enlace, $sql);
    if($resultado){
        echo "Movimiento con id " . $_GET["id"] . " eliminado con éxito.";
    } else {
        echo "No se pudo eliminar el movimiento con id " . $_GET["id"];
    }
    cerrarConexion($enlace); // Cierras la conexión
} else {
    echo "No se pasó el ID del movimiento";
    exit();
}
?>