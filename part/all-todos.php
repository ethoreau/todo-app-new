<section class="col-md-6">
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
              <a href="?todo-id=<?php echo $todo['id']; ?>"><?php echo $todo['title']; ?></a>
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
    <input type="submit" value="Update" name="update" class="btn btn-primary"/>
    <a href="?action=add-todo" class="btn btn-success">Add a todo</a>
    </form>
</section>
    