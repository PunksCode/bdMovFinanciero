<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/stylesform.css">
    <title>Agregar Movimiento</title>
</head>
<body>
<section class="container">
  <h1>Agregar Nuevo Movimiento</h1>  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="fecha" required><br>
        
    <label for="tipo">Tipo:</label>
    <select id="tipo" name="tipo" required>
      <option value="ingreso">Ingreso</option>
      <option value="egreso">Egreso</option>
    </select><br>
        
    <label for="descripcion">Descripción:</label>
    <input type="text" id="descripcion" name="descripcion" required><br>
        
    <label for="monto">Monto:</label>
    <input type="number" step="0.01" id="monto" name="monto" required><br>
        
    <label for="forma_de_pago">Forma de Pago:</label>
    <select id="forma_de_pago" name="forma_de_pago" required>
      <option value="efectivo">Efectivo</option>
      <option value="cheque">Cheque</option>
      <option value="tarjeta de crédito">Tarjeta de Crédito</option>
      <option value="transferencia bancaria">Transferencia Bancaria</option>
    </select><br>

    <label for="id_familia">ID de Familia:</label>
    <input type="number" id="id_familia" name="id_familia" required><br>
    <input class="boton" type="submit" value="Agregar Movimiento">
  </form>
</section>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fecha = $_POST["fecha"];
        $tipo = $_POST["tipo"];
        $descripcion = $_POST["descripcion"];
        $monto = $_POST["monto"];
        $forma_de_pago = $_POST["forma_de_pago"];
        $id_familia = $_POST["id_familia"];

        // Realiza la conexión a la base de datos y ejecuta la inserción
        include 'conexion.php';
        $conexion = conectar();

        $sql = "INSERT INTO movimientos (fecha, tipo, descripcion, monto, forma_de_pago, id_familia)
                VALUES ('$fecha', '$tipo', '$descripcion', $monto, '$forma_de_pago', $id_familia)";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo movimiento agregado exitosamente.";
        } else {
            echo "Error al agregar el movimiento: " . $conexion->error;
        }

        cerrarConexion($conexion);
    }
    ?>
</body>
</html>