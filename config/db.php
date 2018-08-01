<?php

    //create Connection

    $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


    //check connection

    if(mysqli_connect_errno()){
        echo 'Failed to connec to database' .mysqli_connect_errno();
        
    }