<?php
require 'php/connection.php';

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas - Administrador</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <h1>Reservas</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Teléfono</th>
            <th>Correo Electrónico</th>
            <th>Fecha de Entrada</th>
            <th>Fecha de Salida</th>
            <th>Tipo de Habitación</th>
            <th>Número de Huéspedes</th>
            <th>Peticiones Especiales</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['dni']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['checkin_date']}</td>
                        <td>{$row['checkout_date']}</td>
                        <td>{$row['room_type']}</td>
                        <td>{$row['guests']}</td>
                        <td>{$row['special_requests']}</td>
                        <td>
                            <a href='php/edit.php?id={$row['id']}'>Editar</a>
                            <a href='php/delete.php?id={$row['id']}' onclick='return confirm(\"¿Estás seguro de eliminar esta reserva?\")'>Eliminar</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No hay reservas disponibles.</td></tr>";
        }
        ?>
    </table>

    <a href="index.html">Volver a la página de reservación</a>
</body>
</html>
