<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['delete'])){
        echo  'submitted'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'. 'SUBMITTED';
        // get form data
        $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);
    
        
    $query = "DELETE FROM pots WHERE id = {$delete_id}";

        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
        }else{
            echo 'ERROR: ' .mysqli_error($conn);
        }
    }

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
            <a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $post['id'] ?>" class= "btn btn-primary">Edit</a>
            <form   method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name = "delete_id" value= "<?php echo $post['id']; ?>">
                <input type="submit" name = "delete" value= "Delete" class = "btn btn-danger">

            </form>
        </div>
    </div>


<?php include('inc/footer.php');?>    
