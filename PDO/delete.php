<?php

$id = $_GET['id'];
$delete = "DELETE FROM student WHERE id= :id";
$dbConnect = new PDO('mysql:host=localhost;dbname=crud', 'root', '');
$statementReadData = $dbConnect->prepare($delete);
$statementReadData->execute([':id' => $id]);
header('location:view.php');

