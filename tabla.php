<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <script src="https://kit.fontawesome.com/af63097f6a.js" crossorigin="anonymous"></script>
    <title>Tabla-JerezAgustin</title>
</head>
<body>
    <section class="menu">
    <nav class="nav">
        <ul>
            <li class="lista" onclick="window.location.href='info.html'">Acerca de</li>
            <li class="lista" onclick="window.location.href='agregar.php'">Agregar Movimiento</li>
            <li class="lista" id="modoNocturno">Modo Nocturno</li>
        </ul>
    </nav>
    </section>
<section class="mov">
<h1 class="title1">Control de Movimientos - Lista de Movimientos</h1>
<table class="table">
        <tr class="descripcion">
            <th>ID</th>
            <th>Fecha</th>
            <th>Tipo</th>
            <th>Descripción</th>
            <th>Monto</th>
            <th>Forma de Pago</th>
            <th>ID de Familia</th>
            <th>Opciones</th>
        </tr>
<?php
    include 'conexion.php'; 

        $conexion = conectar();

        // Realizar la consulta a la base de datos
        $consulta = "SELECT * FROM movimientos";
        $resultado = mysqli_query($conexion, $consulta);

        // Recorrer los resultados y mostrarlos en la tabla
    while ($fila = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td class='select'>{$fila['id_mov']}</td>";
            echo "<td class='select'>{$fila['fecha']}</td>";
            echo "<td class='select'>{$fila['tipo']}</td>";
            echo "<td class='select'>{$fila['descripcion']}</td>";
            echo "<td class='select'>{$fila['monto']}</td>";
            echo "<td class='select'>{$fila['forma_de_pago']}</td>";
            echo "<td class='select'>{$fila['id_familia']}</td>";
            echo "<td>";
            echo "<a class='btn__edit__delet' href='editar.php?id={$fila['id_mov']}'>Editar</a>";
            echo "<a class='btn__edit__delet' href='eliminar.php?id={$fila['id_mov']}'>Eliminar</a>";
            echo "</td>";
            echo "</tr>";
        }

        cerrarConexion($conexion);
?>       
</table>
</section>
<footer>
    <div class="footer__container">
        <div class="contacto">
            <a href="https://github.com/PunksCode"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.facebook.com/agustin.jerez.37"><i class="fa-brands fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/pablo-agust%C3%ADn-jerez-482823270/"><i class="fa-brands fa-linkedin"></i></a>
            <a href="https://twitter.com/Agusxpunk"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://www.instagram.com/agustinpunks/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://api.whatsapp.com/send?phone=543884602354" class="whatsapp-link"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
        <p class="copyright">Copyright © 2023 Agustin Jerez</p>
        </div>
    </footer>
<script src="js/script.js"></script>
</body>
</html>