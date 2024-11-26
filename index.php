<?php
require_once 'DB.php';
$db = new DB();

// Vazifa qo'shish
if (isset($_POST['add_task'])) {
    $title = $_POST['title'];
    $status = $_POST['status'];
    $due_date = isset($_POST['due_date']) && !empty($_POST['due_date']) ? $_POST['due_date'] : null;

    $stmt = $db->conn->prepare("INSERT INTO todo (title, status, due_date) VALUES (:title, :status, :due_date)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':due_date', $due_date);
    $stmt->execute();
}

// Vazifani bajarilgan deb belgilash
if (isset($_POST['complete_task'])) {
    $task_id = $_POST['task_id'];
    $stmt = $db->conn->prepare("UPDATE todo SET status = 'completed' WHERE id = :id");
    $stmt->bindParam(':id', $task_id);
    $stmt->execute();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .todo-body {
            max-width: 75%;
            box-shadow: 0 0 3px 3px gray;
        }

        .todo-text {
            font-weight: bold;
        }

        li {
            border-radius: 16px;
        }

        .badge-info {
            background-color: #17a2b8;
        }

        .badge-secondary {
            background-color: #6c757d;
        }

        .task-completed {
            text-decoration: line-through;
            color: #6c757d;
        }

        .btn-complete {
            background-color: #28a745;
            color: white;
        }

        .btn-complete:hover {
            background-color: #218838;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="row d-flex justify-content-center my-5">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p class="text-center">Manage your tasks and deadlines easily.</p>

            <!-- Vazifa qo'shish formasi -->
            <form method="POST" action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Enter task title" required>
                </div>
                <div class="input-group mb-3">
                    <select class="form-select" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="datetime-local" class="form-control" name="due_date" required>
                </div>
                <button type="submit" name="add_task" class="btn btn-outline-success w-100">Add Task</button>
            </form>

            <ul class="list-group mt-4">
                <?php
                $stmt = $db->conn->prepare("SELECT * FROM todo ORDER BY created_at DESC");
                $stmt->execute();
                $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($tasks as $task) {
                    $taskClass = $task['status'] === 'completed' ? 'task-completed' : '';
                    echo "<li class='list-group-item d-flex justify-content-between align-items-center $taskClass'>
                            <div>
                                <strong>" . htmlspecialchars($task['title']) . "</strong>
                                <br>
                                <small class='text-muted'>Muddat: " . date('Y-m-d H:i', strtotime($task['due_date'])) . "</small>
                            </div>
                            <div>
                                <span class='badge bg-info'>" . ucfirst($task['status']) . "</span>";

                    // Faqat "pending" yoki "in_progress" statusli vazifalar uchun tugma
                    if ($task['status'] !== 'completed') {
                        echo "<form method='POST' action='' style='display:inline;'>
                                <input type='hidden' name='task_id' value='" . $task['id'] . "'>
                                <button type='submit' name='complete_task' class='btn btn-complete btn-sm'>Complete</button>
                              </form>";
                    }

                    echo "</div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
