<?php
require "vendor/autoload.php";

use TodoApp\App;
use TodoApp\Todo;
use TodoApp\FakeData;

$app = new App();
$todos = $app->getTodos();

// change state
if (!empty($_POST)) {
    $data = $_POST;
    foreach ($data as $key => $value) {
        $app->deleteTodo($value);
    }
    $todos = $app->getUpdatedList();
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
    else {
      include 'part/all-todos.php';
    }
    ?>
  </body>
</html>
