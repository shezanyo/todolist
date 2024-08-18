<?php

require_once '../config/config_session.php';

if (!isset($_SESSION['userId'])) {

    header("Location: ../login/login_index.php");
    die();
}

require_once '../dbh/dbh.php';
require_once 'dashboard_contr.php';
require_once 'dashboard_handl.php';
require_once 'dashboard_model.php';
require_once 'dashboard_view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo list</title>
    <style>
        table, th, td {
            border: 1px solid cyan;
            border-radius: 10px;
            padding: 10px;
          }
    </style>
</head>
<body>
    <h1>Tasks</h1>
    <table>
        <tr>
            <th>ID</th><th>Name</th><th>Due time</th><th>Status</th><th>delete</th>
        </tr>
        <?php
        show_task($pdo);
        ?>
        
    </table>
    <h1>Add a new task</h1>
    <form method="POST">
        <label>Task name:</label><br>
        <input type="text" name="task_name"><br>
        <label>Due date:</label><br>
        <input type="text" name="due_date"><br><br>
        <input type="submit" value="Add" name="add_task">
</body>
</html>