<?php require 'view/companent/header.php'; ?>
<div class="edit-form">
    <h1 class="todo-title text-center">Edit Task</h1>

    <form method="POST" action="/todos/<?= $task['id'] ?>/edit">
        <!-- Title Input -->
        <div class="form-input">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        </div>

        <!-- Due Date Input -->
        <div class="form-input">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="datetime-local" name="due_date" id="due_date" value="<?= date('Y-m-d\TH:i', strtotime($task['due_date'])) ?>" required>
        </div>

        <!-- Status Input -->
        <div class="form-input">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" required>
                <option value="pending" <?= $task['status'] === 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="in_progress" <?= $task['status'] === 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                <option value="completed" <?= $task['status'] === 'completed' ? 'selected' : '' ?>>Completed</option>
            </select>
        </div>

        <!-- Update Button -->
        <button type="submit" class="custom-button">Update Task</button>

        <!-- Cancel Button -->
        <a href="/todos" class="btn-cancel">Cancel</a>
    </form>
</div>
<?php require 'view/companent/footer.php'; ?>
