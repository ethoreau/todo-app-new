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
    $updateData = [];
    foreach ($data as $key => $value) {
        $todo = $app->getTodoById($value); 
        if ($todo->getState() === "new") {
          $todo->setState("deleted");
        }
        $updateData[] = $todo;
    }
    $todos = $app->updateTodoList($updateData);
}



?>
<!doctype html>
<html>
  <head>

  </head>
  <body>
    <form method="post" action="">
      <ul>
        <?php 
        // list todos
        foreach ($todos as $todo) {
          if ($todo->getState() === "new") {
            ?>
            <li>
              <input type="checkbox" value="<?php echo $todo->getId(); ?>" name="todo-<?php echo $todo->getId(); ?>"/>
              <?php echo $todo->getTitle(); ?>
            </li>
            <?php
            }
          else if ($todo->getState() === "deleted") {
            ?>
            <li>
              <input type="checkbox" value="<?php echo $todo->getId(); ?>" name="todo-<?php echo $todo->getId(); ?>" checked disabled />
              <s><?php echo $todo->getTitle(); ?></s>
            </li>
            <?php
            }  
        }
        ?>
      </ul>
      <input type="submit" value="Update" />
    </form>
    
  </body>
</html>