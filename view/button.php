<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirish qisim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <a href="/todos" class="custom-button">Go to Todo</a>
</body>
</html>

