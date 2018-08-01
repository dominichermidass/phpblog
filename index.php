<?php
    require('config/config.php');
    require('config/db.php');

    // Create Result
    $query = 'SELECT * FROM pots';

    // Get results

    $result = mysqli_query($conn , $query);

    //fecth Data

    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    //Free Result from memory since we are no longer need it

    mysqli_free_result($result);

    //close connection

    mysqli_close($conn);

?>

<!-- FOOTER INCLUDE-->
<?php include('inc/header.php'); ?>
    <br>
    <br>
    <br>
    <div class = "container">
    <h1>Posts</h1>
    <?php foreach($posts as $post): ?>
        <div class= "jumbotron">
            <h3> <?php echo $post['title'] ; ?> </h3>
            <small> 
            Created on <?php echo $post['created_at'] ; ?> by 
            <?php echo $post['author'] ; ?>
            <p> <?php echo $post['body']; ?> </p>
            <a href= <?php echo ROOT_URL."post.php?id=".$post['id'];?>> Read More</a>
            </small>
        </div>
    <?php endforeach; ?>
    </div>

<?php include('inc/footer.php');?>

