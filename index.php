<?php
require "vendor/autoload.php";

use TodoApp\App;
use TodoApp\Todo;
use TodoApp\FakeData;

$app = new App();
$todos = $app->getTodos();

// form
if (!empty($_POST)) {
  if (isset($_POST['update'])) {
    // update todo
    $data = $_POST;
    foreach ($data as $key => $value) {
        if ($key !== 'update') {
          $app->deleteTodo($value);
        }
    }
    $todos = $app->getUpdatedList();
  }
  else if (isset($_POST['add'])) {
    // add a todo
    $data = [
      "title" => $_POST['title'],
      "description" => $_POST["description"]
    ];
    $todo = FakeData::addTodo($data);
    if (!empty($todo)) {
      header('Location: index.php?todo-id=' . $todo['id']); exit;
    }
  } 
}



?>
<!doctype html>
<html>
  <head>

  </head>
  <body>
    <?php 
    if (isset($_GET['todo-id']) && !empty($_GET['todo-id'])) {
      include 'part/detail-todo.php';
    }
    else if (isset($_GET['action']) && $_GET['action'] === "add-todo") {
      include 'part/add-todo.php';
    }
    else {
      include 'part/all-todos.php';
    }
    ?>
  </body>
</html>
