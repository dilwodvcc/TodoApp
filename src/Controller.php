<?php
namespace App;

class Controller
{
    private $todo;
    public function __construct($todo)
    {
        $this->todo = $todo;
    }
    public function showAll(): void
    {
        $tasks = $this->todo->getAllTodos();
        require 'views/todos.php';
    }
    public function showEdit($todoId): void
    {
        $tasks = $this->todo->edit($todoId);
        require 'views/edit.php';
    }

    public function store(): void
    {
        if (isset($_POST['title']) && isset($_POST['due_date'])) {
            $title = $_POST['title'];
            $dueDate = new \DateTime($_POST['due_date']);
            $this->todo->store($title, $dueDate->format('Y-m-d H:i:s'));
            header('Location: /todos');
            exit();
        }
    }
    public function delete($todoId): void
    {
        $this->todo->delete($todoId);
        header('Location: /todos');
        exit();
    }
    public function update($todoId): void
    {
        $this->todo->update($todoId,$_POST['title'],$_POST['status'],$_POST['due_date']);
        header('Location: /todos');
        exit();
    }
}