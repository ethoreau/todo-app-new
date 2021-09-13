
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
      <input type="submit" value="Update" />
    </form>
    