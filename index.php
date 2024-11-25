<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TodoApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .todo-body {
            max-width: 75%;
            box-shadow: 0 0 3px 3px gray;
        }
        .todo-text {
            font-weight: bold;
        }
        li {
            border-radius: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="rox d-flex justify-content-center my-5">
        <div class="todo-body my-5 p-3">
            <h1 class="text-center todo-text">Todo App</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, at distinctio eius eos fugiat illo
                impedit molestiae non nostrum obcaecati, perspiciatis, praesentium sit sunt ut voluptates? Aspernatur
                consectetur nulla temporibus.</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username kiriting" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button type="button" class="btn btn-outline-success">Success</button>
            </div>
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between aling-items-center">
                    An item
                    <button class="btn btn-outline-primary">Success</button>
                </li>
                <li class="list-group-item d-flex justify-content-between aling-items-center">
                    An item
                    <button class="btn btn-outline-primary">Success</button>
                </li>
                <li class="list-group-item d-flex justify-content-between aling-items-center">
                    An item
                    <button class="btn btn-outline-primary">Success</button>
                </li>
                <li class="list-group-item d-flex justify-content-between aling-items-center">
                    An item
                    <button class="btn btn-outline-primary">Success</button>
                </li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>