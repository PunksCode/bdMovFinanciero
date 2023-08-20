<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesform.css">
    <title>Agregar Movimiento</title>
</head>
<body>
<?php
if (!isset($_GET["id"])) {
    echo "Falta id Movimiento";
} else {
    include("conexion.php");
    $enlace = conectar();
    $id_movimiento = $_GET["id"];
    $sql = "SELECT * FROM `movimientos` 
            JOIN `familiares` ON `familiares`.`id_familia` = `movimientos`.`id_familia` 
            WHERE `id_mov` = $id_movimiento";
    $resultado = mysqli_query($enlace, $sql);
    cerrarConexion($enlace);
    
    if (mysqli_num_rows($resultado) !== 1) {
        echo "No se encuentra el movimiento con el ID " . $_GET["id"];
    } else {
        $fila = mysqli_fetch_array($resultado);
    }
}
?>
<section class="container">
    <h1>Editar Movimiento</h1>  
    <form action="conexion.php" method="POST">
        <label for="id_mov">ID_mov</label>
        <input type="number" name="id_mov" id="id_mov" readonly value="<?php echo $fila["id_mov"]; ?>"><br>     
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" required value="<?php echo $fila["fecha"]; ?>"><br>          
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="ingreso" <?php if ($fila["tipo"] === "ingreso") echo "selected"; ?>>Ingreso</option>
            <option value="egreso" <?php if ($fila["tipo"] === "egreso") echo "selected"; ?>>Egreso</option>
        </select><br>         
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" required value="<?php echo $fila["descripcion"]; ?>"><br>       
        <label for="monto">Monto:</label>
        <input type="number" step="0.01" name="monto" id="monto" required value="<?php echo $fila["monto"]; ?>"><br>      
        <label for="forma_de_pago">Forma de Pago:</label>
        <select name="forma_de_pago" id="forma_de_pago" required>
            <option value="efectivo" <?php if ($fila["forma_de_pago"] === "efectivo") echo "selected"; ?>>Efectivo</option>
            <option value="cheque" <?php if ($fila["forma_de_pago"] === "cheque") echo "selected"; ?>>Cheque</option>
            <option value="tarjeta de crédito" <?php if ($fila["forma_de_pago"] === "tarjeta de crédito") echo "selected"; ?>>Tarjeta de Crédito</option>
            <option value="transferencia bancaria" <?php if ($fila["forma_de_pago"] === "transferencia bancaria") echo "selected"; ?>>Transferencia Bancaria</option>
        </select><br>      
        <label for="id_familia">ID de Familia:</label>
        <input type="number" name="id_familia" id="id_familia" readonly value="<?php echo $fila["id_familia"]; ?>"><br>      
        <input class="boton" type="submit" value="Actualizar">
    </form>
</section>
</body>
</html>