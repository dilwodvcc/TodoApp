<?php require 'view/companent/header.php'; ?>
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
                <button type="submit" class="mb-4 custom-button btn btn-success w-100">Add</button>
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
<?php require 'view/companent/footer.php'; ?>
