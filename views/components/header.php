<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do list</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .todo_body {
            max-width: 950px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(5px);
            transition: backdrop-filter 0.3s ease-in-out;

        }
        .edit-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .edit-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-actions {
            display: flex;
            justify-content: space-between;
        }
        body {
            background: linear-gradient(135deg, #1f4037, #99f2c8);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: black;
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
            transform: translateY(-3px);
        }
    </style>

</head>
<body>