<?php

declare(strict_types=1);

function show_task(object $pdo) {
    $userId = $_SESSION['userId'];
    $result = get_tasks($pdo, $userId);

    if (empty($result)) {
        echo '<tr><td colspan="4">No tasks found.</td></tr>';
        return;
    }

    foreach ($result as $r) {
       

        echo '<tr>
                <td>' . $r['display_id'] . '</td>
                <td>' . $r['name'] . '</td>
                <td>' . $r['due_time'] . '</td>
                <td>
                    <form method="POST">
                    <input type="hidden" name="task_id" value="'.$r['id'].'">
                     <input type="hidden" name="task_status" value="'.$r['status'].'">
                    <button type="submit"name="change_status">' . $r['status'] . '</button>
                    </form>
                </td>
                <td>
                    <form method="POST"  onsubmit="return confirm("Are you sure you want to delete this task?");">
                    <input type="hidden" name="task_id" value="'.$r['id'].'">
                    <button type="submit"name="remove_task">delete</button>
                    </form>
                </td>
            </tr>';
    }
}
