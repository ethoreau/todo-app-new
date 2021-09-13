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
    <form method="post" action="">
      <ul>
        <?php 
        // list todos
        foreach ($todos as $todo) {
          if (!$todo['deleted']) {
            // not crossed out todo
            ?>
            <li>
              <input type="checkbox" value="<?php echo $todo['id']; ?>" name="todo-<?php echo $todo['id']; ?>"/>
              <?php echo $todo['title']; ?>
            </li>
            <?php
            }
          else if ($todo['deleted']) {
            // crossed out todo
            ?>
            <li>
              <input type="checkbox" value="<?php echo $todo['id']; ?>" name="todo-<?php echo $todo['id']; ?>" checked disabled />
              <s><?php echo $todo['title']; ?></s>
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