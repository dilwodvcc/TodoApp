<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            font-family: 'Arial', sans-serif;
            color: white;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .todo-body {
            max-width: 60%;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .todo-title {
            font-weight: bold;
            color: #17565e;
        }

        .form-control, .form-select {
            border-radius: 8px;
        }

        .custom-button {
            position: relative;
            background: linear-gradient(90deg, #7ef0ff, #17565e);
            color: #fff;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 15px rgba(117, 255, 149, 0.4);
            overflow: hidden;
        }

        .custom-button:hover {
            background: linear-gradient(90deg, #8eff75, #39fd3d);
            box-shadow: 0 12px 20px rgba(85, 204, 81, 0.6);
            transform: translateY(-3px);
        }

        .task-completed {
            text-decoration: line-through;
            background-color: rgba(40, 167, 69, 0.2);
            color: #155724;
        }

        .task-in-progress {
            background-color: rgba(255, 193, 7, 0.2);
            color: #856404;
        }

        .task-pending {
            background-color: rgba(220, 53, 69, 0.2);
            color: #721c24;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="todo-body">
            <h1 class="text-center todo-title mb-4">Todo App</h1>
            <p class="text-center text-muted">Vazifalarni qo'shing va kuzatib boring!</p>

            <!-- Task Input Form -->
            <form method="POST" action="/todos" class="mb-4">
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Vazifani yozing!" required>
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
                <button type="submit" class="custom-button btn btn-success w-100">Add</button>
                <form method="POST" action="/todos" class="mb-4">

            <ul class="list-group">
                <?php /** @var TYPE_NAME $todos */
                foreach ($todos as $task): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center
                        <?php
                    if ($task['status'] === 'completed') echo 'task-completed';
                    elseif ($task['status'] === 'in_progress') echo 'task-in-progress';
                    else echo 'task-pending';
                    ?>">
                        <div>
                            <strong><?= htmlspecialchars($task['title']) ?></strong>
                            <br>
                            <small class="text-muted">Muddat: <?= date('Y-m-d H:i', strtotime($task['due_date'])) ?></small>
                        </div>
                        <div>
                            <a href="/todos/<?= $task['id'] ?>/edit" class="btn btn-primary btn-sm">Edit</a>
                            <a href="/todos/<?= $task['id'] ?>/delete" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
</body>
</html>
