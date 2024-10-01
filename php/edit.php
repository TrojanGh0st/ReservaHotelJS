<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Reserva</title>
    <link rel="stylesheet" href="../css/styles.css"> <!-- Asegúrate de que la ruta sea correcta -->
</head>
<body>
    <div class="container">
        <h1>Editar Reserva</h1>
        <?php
        // Conexión a la base de datos y obtener la reserva que se va a editar
        require 'connection.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM reservations WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $reservation = $result->fetch_assoc();
            } else {
                echo "Reserva no encontrada.";
                exit();
            }
        }
        ?>
        <form id="edit-form" method="POST" action="php/update.php">
            <input type="hidden" name="id" value="<?php echo $reservation['id']; ?>">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="<?php echo $reservation['name']; ?>" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" value="<?php echo $reservation['email']; ?>" required>

            <label for="checkin">Fecha de Entrada:</label>
            <input type="date" id="checkin" name="checkin" value="<?php echo $reservation['checkin_date']; ?>" required>

            <label for="checkout">Fecha de Salida:</label>
            <input type="date" id="checkout" name="checkout" value="<?php echo $reservation['checkout_date']; ?>" required>

            <label for="room">Tipo de Habitación:</label>
            <select id="room" name="room">
                <option value="simple" <?php echo ($reservation['room_type'] == 'simple') ? 'selected' : ''; ?>>Simple</option>
                <option value="doble" <?php echo ($reservation['room_type'] == 'doble') ? 'selected' : ''; ?>>Doble</option>
                <option value="suite" <?php echo ($reservation['room_type'] == 'suite') ? 'selected' : ''; ?>>Suite</option>
            </select>

            <label for="guests">Número de Huéspedes:</label>
            <input type="number" id="guests" name="guests" value="<?php echo $reservation['guests']; ?>" min="1" required>

            <label for="requests">Peticiones Especiales:</label>
            <textarea id="requests" name="requests"><?php echo $reservation['special_requests']; ?></textarea>

            <button type="submit">Actualizar Reserva</button>
        </form>
        <div id="status"></div>
    </div>
</body>
</html>
