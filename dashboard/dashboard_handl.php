<?php
require_once '../config/config_session.php';
require_once 'dashboard_model.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_task'])) {

    $taskName = $_POST['task_name'];
    $dueTime = $_POST['due_date'];
    $user_id=$_SESSION['userId'];

    echo $taskName;
    echo $dueTime;

    add_task($pdo,$taskName,$dueTime,$user_id);

    header("Location: dashboard_index.php");
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_task'])) {
    $taskId = $_POST['task_id'];

    delete_task($pdo,$taskId);

    header("Location: dashboard_index.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_status'])) {
    $taskId = $_POST['task_id'];
    $status=$_POST['task_status'];

    if($status==='complete'){
        $new_status="pending";
        change_status($pdo,$taskId,$new_status);
    }
    else if($status==='pending'){
        $new_status="complete";
        change_status($pdo,$taskId,$new_status);
    }
    

    header("Location: dashboard_index.php");
}
