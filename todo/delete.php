<?php

$id = $_GET['id'];
$sql = "DELETE FROM task WHERE id= :id";
$conn = new PDO ('mysql:host=localhost; dbname=todo', 'root', '');
$statement = $conn->prepare($sql);
$statement->execute([':id' => $id]);
header('location:index.php');

?>