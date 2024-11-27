<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .todo-body {
            max-width: 60%;
            background-color: #ffffff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .todo-title {
            font-weight: bold;
            color: #495057;
        }

        .form-control, .form-select, .btn {
            border-radius: 8px;
        }

        li {
            border: none;
            margin-bottom: 10px;
            border-radius: 12px;
            background-color: #ffffff;
            padding: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .task-completed {
            text-decoration: line-through;
            color: #adb5bd;
        }

        .btn-status {
            margin: 0 3px;
            font-size: 0.85rem;
            padding: 5px 10px;
        }

        .badge {
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="todo-body">
            <h1 class="text-center todo-title mb-4">Todo App</h1>
            <p class="text-center text-muted">Easily manage your tasks and deadlines.</p>

            <!-- Task Input Form -->
            <form method="POST" action="/store" class="mb-4">
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Enter task title" required>
                </div>
                <div class="mb-3">
                    <input type="datetime-local" class="form-control" name="due_date" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="status" required>
                        <option value="pending" selected>Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100">Add Task</button>
            </form>

            <!-- Task List -->
            <ul class="list-group">
                <?php /** @var TYPE_NAME $todos */
                foreach ($todos as $task): ?>
                    <?php $taskClass = $task['status'] === 'completed' ? 'task-completed' : ''; ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center <?= $taskClass ?>">
                        <div>
                            <strong><?= htmlspecialchars($task['title']) ?></strong>
                            <br>
                            <small class="text-muted">Due: <?= date('Y-m-d H:i', strtotime($task['due_date'])) ?></small>
                        </div>
                        <div>
                            <span class="badge bg-<?= $task['status'] === 'completed' ? 'success' : ($task['status'] === 'in_progress' ? 'primary' : 'warning') ?>">
                                <?= ucfirst($task['status']) ?>
                            </span>
                        </div>
                        <div>
                            <?php if ($task['status'] !== 'completed'): ?>
                                <a href="/update-status?id=<?= $task['id'] ?>&status=completed" class="btn btn-success btn-sm btn-status">Complete</a>
                            <?php endif; ?>
                            <?php if ($task['status'] !== 'pending'): ?>
                                <a href="/update-status?id=<?= $task['id'] ?>&status=pending" class="btn btn-warning btn-sm btn-status">Pending</a>
                            <?php endif; ?>
                            <?php if ($task['status'] !== 'in_progress'): ?>
                                <a href="/update-status?id=<?= $task['id'] ?>&status=in_progress" class="btn btn-primary btn-sm btn-status">In Progress</a>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
