<?php
    require('config/config.php');
    require('config/db.php');
    // get ID

    $id = mysqli_real_escape_string($conn, $_GET['id']);
    // Create Query

    $query = "SELECT * FROM pots WHERE id =".$id;

    // Get results

    $result = mysqli_query($conn, $query);

    //fetch Data

    $post = mysqli_fetch_assoc($result);



    //Free Result from memory since we are no longer need it

    mysqli_free_result($result);

    //close connection

    mysqli_close($conn);

?>


<!-- FOOTER INCLUDE-->
<?php include('inc/header.php');?>
    <br>
    <br>
    <br>
    <br>
    <div class = "container">
        <div class= "jumbotron">
            
            <h1> <?php echo $post['title'] ; ?> </h1>
            <small> 
            Created on <?php echo $post['created_at'] ; ?> by 
            <?php echo $post['author'] ; ?>
            <p> <?php echo $post['body']; ?> </p>
            </small>
          
            <a href="<?php echo ROOT_URL;?>" class= "btn btn-primary">Back</a>
        </div>
    </div>


<?php include('inc/footer.php');?>
