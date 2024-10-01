<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room = $_POST['room'];
    $guests = $_POST['guests'];
    $requests = $_POST['requests'];

    $sql = "INSERT INTO reservations (name, dni, phone, email, checkin_date, checkout_date, room_type, guests, special_requests)
            VALUES ('$name', '$dni', '$phone', '$email', '$checkin', '$checkout', '$room', '$guests', '$requests')";

    if ($conn->query($sql) === TRUE) {
        echo 'Reservación realizada con éxito.';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $conn->close();
}
?>
