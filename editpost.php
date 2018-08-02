<?php
    require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        echo  'submitted'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'.'<br>'. 'SUBMITTED';
        // get form data
        $update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        
        $query = "UPDATE pots SET title = '$title',author = '$author',body = '$body' WHERE id = {$update_id}";
        print_r($query);
        if(mysqli_query($conn, $query)){
            header('Location: '.ROOT_URL.'');
        }else{
            echo 'ERROR: ' .mysqli_error($conn);
        }
    }

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
<?php include('inc/header.php'); ?>
    <br>
    <br>
    <br>
    <div class = "container">
    <h1>EDIT POST</h1>

    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ; ?>">
        <div class = "form-group">
            <label> Title </label>
            <input  type = "text" name = "title" class = "form-control" value = "<?php echo $post['title'];?>">
        </div>
        <div class = "form-group">
            <label> Author</label>
            <input type="text" name = "author" class = "form-control" value = "<?php echo $post['author'];?>">
        </div>
        <div class = "form-group">
            <label> Text</label>
            <textarea name="body" class = "form-control"  ><?php echo $post['body'];?></textarea>
        </div>

        <input type="hidden" name ="update_id" value ="<?php echo $post['id']; ?>" class = "btn btn-primary">
        <input type="submit" name ="submit" value ="Submit" class = "btn btn-primary">
    </form>
    </div>

<?php include('inc/footer.php');?>

