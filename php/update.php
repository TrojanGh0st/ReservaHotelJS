<?php
require 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $dni = $_POST['dni'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room = $_POST['room'];
    $guests = $_POST['guests'];
    $requests = $_POST['requests'];

    $sql = "UPDATE reservations SET 
            name='$name', 
            dni='$dni', 
            phone='$phone', 
            email='$email', 
            checkin_date='$checkin', 
            checkout_date='$checkout', 
            room_type='$room', 
            guests='$guests', 
            special_requests='$requests' 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo 'Reserva actualizada con éxito.';
    } else {
        echo 'Error: ' . $conn->error;
    }

    $conn->close();
}
?>
