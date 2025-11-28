<?php
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$city = $_POST['city'];

$conn = new mysqli("localhost", "root", "", "eventdb");

$sql = "INSERT INTO tickets (name,phone,email,city) VALUES ('$name','$phone','$email','$city')";
$conn->query($sql);

echo "Ticket Purchased Successfully!";
?>
