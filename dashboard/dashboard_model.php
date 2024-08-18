<?php

declare(strict_types=1);

function add_task(object $pdo,string $taskName,string $dueTime,int $user_id){
    $sql = "INSERT INTO tasks (name, due_time,user_id) VALUES (:name, :due_time,:user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['name' => $taskName, 'due_time' => $dueTime, 'user_id'=> $user_id]);
}

function delete_task(object $pdo,int $taskId){
    
    $sql = "DELETE FROM tasks WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $taskId]);
    
}

function get_tasks(object $pdo, int $userId): array {
    $query = "SELECT ROW_NUMBER() OVER (ORDER BY id) AS display_id,id,name,due_time,status
FROM 
    tasks
WHERE 
    user_id = :user_id
ORDER BY 
    id;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function change_status(object $pdo, int $taskId, string $status) {
    $sql = "UPDATE tasks SET status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $taskId, 'status' => $status]);
}
