<section class="col-md-6">
    <?php
    if (isset($_GET['todo-id']) && !empty($_GET['todo-id'])) {
        // detail of a todo
        $todoDetail = $app->getTodoById($_GET['todo-id']);

        ?>
        <a href="index.php" class="btn btn-secondary">Back</a>
        
        <h2><?php echo $todoDetail['title']; ?></h2>

        <small>Created at <?php echo date("d-m-Y H:i:s", $todoDetail['createdDate']); ?></small><br/>
        <small>Updated at <?php echo date("d-m-Y H:i:s", $todoDetail['updateDate']); ?></small>

        <br/><br/>

        <div class="alert alert-info"><?php echo $todoDetail['description']; ?></div>
        <?php
    }
    else {
        ?>
        <a href="index.php">Back</a>
        
        <h2><?php echo "Not found, sorry !"; ?></h2>
        <?php
    }
    ?>
</section>

    
