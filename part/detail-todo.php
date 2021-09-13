<?php
if (isset($_GET['todo-id']) && !empty($_GET['todo-id'])) {
    // detail of a todo
    $todoDetail = $app->getTodoById($_GET['todo-id']);

    ?>
    <a href="index.php">Back</a>
    
    <h2><?php echo $todoDetail['title']; ?></h2>

    <date>Created at <?php echo date("d-m-Y H:i:s", $todoDetail['createdDate']); ?></date>
    <date>Updated at <?php echo date("d-m-Y H:i:s", $todoDetail['updateDate']); ?></date>

    <br/>

    <div><?php echo $todoDetail['description']; ?></div>
    <?php
}
else {
    ?>
    <a href="index.php">Back</a>
    
    <h2><?php echo "Not found, sorry !"; ?></h2>
    <?php
}
?>

    
