<?php
require_once 'Todo.php';

class Control
{
    private Todo $todo;

    public function __construct()
    {
        $this->todo = new Todo();
    }

    public function home()
    {
        require 'view/button.php';
    }

    public function showTodos()
    {
        $todos = $this->todo->get();
        view('home', ['todos' => $todos]);
    }

    public function updateTodo()
    {
        if (isset($_GET['id']) && isset($_GET['status'])) {
            $this->todo->updateStatus($_GET['id'], $_GET['status']);
        }
        header('Location: /todos');
        exit();
    }

    public function storeTodo()
    {
        if (isset($_POST['title'], $_POST['due_date'], $_POST['status'])) {
            $this->todo->store($_POST['title'], $_POST['due_date'], $_POST['status']);
        }
        header('Location: /todos');
        exit();
    }
}
