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
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 4px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
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

        .custom-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.3);
            transform: skewX(-30deg);
            transition: all 0.5s ease;
        }

        .custom-button:hover::before {
            left: 100%;
        }

        .custom-button:active {
            transform: translateY(1px);
            box-shadow: 0 6px 10px rgba(85, 204, 81, 0.5);
        }

        .todo-title {
            animation: fadeIn 2s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
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
