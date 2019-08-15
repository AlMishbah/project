<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Todo List</title>

</head>
<body>
    <div class="heading">
        <h2>Todo List Application with PHP PDO</h2>
    </div>

    <form method="POST">
    <input type="text" name="task" class="task_input" placeholder="Add Task">
  <button type="submit"  class="add_btn" name="submit">Add</button>
</form>
<?php 

if (isset($_POST['submit'])) {
    $task = $_POST['task'];

    $sql = "INSERT INTO task (task) VALUES (?)";
    $conn = new PDO ('mysql:host=localhost; dbname=todo', 'root', '');
    $statement = $conn->prepare($sql);
    $statement->execute([($task)]);
    header('location: index.php');
}

?>

<?php

$sql = "SELECT * FROM task";
$conn = new PDO ('mysql:host=localhost; dbname=todo', 'root', '');
$statement = $conn->prepare($sql);
$statement->execute();
$getData = $statement->fetchAll(PDO::FETCH_ASSOC);


?>


<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Task</th>
            <th>Action</th>
        </tr>
    </thead>
<?php foreach ($getData as $key => $data) { ?>
    <tbody>
        <td><?= $data['id'] ?></td>
        <td class="task"><?= $data['task'] ?></td>
        <td class="delete">
            <a href="delete.php?id=<?= $data['id'] ?>">X</a>
        </td>
    </tbody>
<?php } ?>
</table>

</body>
</html>