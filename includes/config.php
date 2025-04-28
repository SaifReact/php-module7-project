<?php
$host = 'localhost';
$db = 'photo_gallery';
$user = 'root';  // Change this to your MySQL username
$pass = '';      // Change this to your MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $db :" . $e->getMessage());
}
?>
