<?php require 'views/components/header.php'; ?>
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="todo-body">
            <h1 class="text-center todo-title mb-4">Todo App</h1>
            <h4 class="text-center text-muted mb-4">Add tasks and track progress</h4>

            <!-- Task Input Form -->
            <form method="POST" action="" class="mb-4">
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Enter task name" required>
                </div>
                <div class="mb-3">
                    <input type="datetime-local" class="form-control" name="due_date" required>
                </div>
                <button type="submit" class="custom-button w-100 mb-4">Add Task</button>
            </form>

            <!-- Task Table -->
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr class="table-secondary">
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php
                /** @var TYPE_NAME $tasks */
                foreach($tasks as $task):
                    $statusClass = '';
                    $statusLabel = '';
                    if($task['status'] == 'pending') {
                        $statusClass = 'task-pending';
                        $statusLabel = 'Pending';
                    } elseif($task['status'] == 'in_progress') {
                        $statusClass = 'task-in-progress';
                        $statusLabel = 'In Progress';
                    } elseif($task['status'] == 'completed') {
                        $statusClass = 'task-completed';
                        $statusLabel = 'Completed';
                    }
                    ?>
                    <tr class="<?= $statusClass ?>">
                        <td>
                            <?= htmlspecialchars($task['title']) ?>
                        </td>
                        <td><?= $statusLabel ?></td>
                        <td><?= date('Y-m-d H:i', strtotime($task['due_date'])) ?></td>
                        <td>
                            <a href="/todos/<?= $task['id'] ?>/edit" class="btn btn-outline-info btn-sm">Edit</a>
                            <a href="/todos/<?= $task['id'] ?>/delete" class="btn btn-outline-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require 'views/components/footer.php'; ?>
