<?php

// Model (Task.php)
class Task {
    private $tasks = [];

    public function getAllTasks(): array {
        return $this->tasks;
    }

    public function addTask(string $task): void {
        $this->tasks[] = $task;
    }

    public function deleteTask(int $index): void {
        unset($this->tasks[$index]);
        $this->tasks = array_values($this->tasks); // Re-index array after deletion
    }
}

// View (View.php)
class View {
    public function render(array $tasks): void {
        echo "<h1>Tasks List</h1>";
        echo "<ul>";
        foreach ($tasks as $task) {
            echo "<li>$task</li>";
        }
        echo "</ul>";
    }
}

// Controller (Controller.php)
class Controller {
    private $model;
    private $view;

    public function __construct(Task $model, View $view) {
        $this->model = $model;
        $this->view = $view;
    }

    public function index(): void {
        $tasks = $this->model->getAllTasks();
        $this->view->render($tasks);
    }

    public function addTask(string $task): void {
        $this->model->addTask($task);
        $this->index(); // Redirect to index after adding task
    }

    public function deleteTask(int $index): void {
        $this->model->deleteTask($index);
        $this->index(); // Redirect to index after deleting task
    }
}

// Usage
$model = new Task();
$view = new View();
$controller = new Controller($model, $view);

// Add tasks
$controller->addTask("Buy groceries");
$controller->addTask("Do laundry");
$controller->addTask("Write report");

// Delete task
$controller->deleteTask(1);