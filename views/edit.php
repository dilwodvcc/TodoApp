<?php require 'views/components/header.php'; ?>

<div class="edit-form">
    <div class="edit-container">
        <h2 class="todo-title text-center">Edit Task</h2>

        <form method="POST" action="/todos/<?= htmlspecialchars($tasks['id']) ?>/update">
            <!-- CSRF Token for security -->
            <input type="hidden" name="_method" value="PUT">

            <!-- Task Title Input -->
            <div class="form-input">
                <label for="taskName" class="form-label">Task Title</label>
                <input type="text" id="taskName" name="title" class="form-control" placeholder="Taskni kiriting" value="<?= htmlspecialchars($tasks['title']) ?>" required>
            </div>

            <!-- Task Status Input -->
            <div class="form-group">
                <label for="taskStatus" class="form-label">Status</label>
                <select id="taskStatus" class="form-select" name="status" required>
                    <option value="pending" <?= $tasks['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="completed" <?= $tasks['status'] == 'completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="in_progress" <?= $tasks['status'] == 'in_progress' ? 'selected' : '' ?>>In Progress</option>
                </select>
            </div>

            <!-- Due Date Input -->
            <div class="form-group">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="datetime-local" name="due_date" class="form-control" id="due_date" value="<?= date('Y-m-d\TH:i', strtotime($tasks['due_date'])) ?>" required>
            </div>

            <!-- Action Buttons -->
            <div class="btn-actions">
                <button type="submit" class="custom-button">Update</button>
                <a href="/todos" class="btn-cancel">Close</a>
            </div>
        </form>
    </div>
</div>

<?php require 'views/components/footer.php'; ?>
