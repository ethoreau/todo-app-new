<?php
require "vendor/autoload.php";

use TodoApp\App;
use TodoApp\Todo;

$app = new App();
// get all todos
$todos = $app->getAllTodos();

// change state
if (!empty($_POST)) {
    $data = $_POST;
    foreach ($data as $key => $value) {
        $temp = Todo::getTodoById($value);
        $todo = new Todo($temp['state'], $temp['title'], $temp['description'], $temp['createdDate'], $temp['id']);
        $todo->setState();
    }
}



?>
<!doctype html>
<html>
  <head>

  </head>
  <body>
    <ul>
      <?php 
      // list all todos
      foreach ($todos as $todo) {
        ?><li><?php echo "[".$todo['state']."] " . $todo['title']; ?></li><?php
        
      }
      ?>
    </ul>
  </body>
</html>