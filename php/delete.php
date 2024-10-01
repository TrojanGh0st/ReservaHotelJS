<?php
require 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservations WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../admin.php?message=Reserva eliminada con éxito");
        exit();
    } else {
        echo "Error al eliminar la reserva: " . $conn->error;
    }
}

$conn->close();
?>
