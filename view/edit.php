<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <style>
        body {
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: white;
            overflow: hidden;
        }

        /* Edit Form Container */
        .edit-form {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            width: 450px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .edit-form h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
            text-align: center;
            font-weight: 600;
        }

        /* Form Inputs */
        .form-input {
            width: 100%;
            margin-bottom: 20px;
        }

        .form-input input, .form-input select {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-input input:focus, .form-input select:focus {
            border-color: #39fd3d;
            outline: none;
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
            text-decoration: none;
            overflow: hidden;
        }

        .custom-button:hover {
            background: linear-gradient(90deg, #8eff75, #39fd3d);
            box-shadow: 0 12px 20px rgba(85, 204, 81, 0.6);
            transform: translateY(-3px);
        }

        .btn-cancel {
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
            text-decoration: none;
            overflow: hidden;
        }

        .btn-cancel:hover {
            background: linear-gradient(90deg, #ff757a, #fd3940);
            box-shadow: 0 12px 20px rgba(204, 81, 81, 0.6);
            transform: translateY(3px);
        }

    </style>
</head>
<body>

<div class="edit-form">
    <h1>Edit Task</h1>

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

</body>
</html>
