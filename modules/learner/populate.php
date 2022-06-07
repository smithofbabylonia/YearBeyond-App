<?php
    session_start();
    if (isset($_SESSION["useruid"])) {
        #echo $_SESSION["useruid"];
    }else {
        header("location: http://localhost/yearbeyond/login.php");
        exit();
    }

        $yebo = $_SESSION["useruid"];

        include_once 'dbh.php';
        
        $sql = "SELECT * FROM learners;";
        $result = mysqli_query($conn,$sql);
        $checkd = mysqli_num_rows($result);
         if ($checkd > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
                 echo $row['learnersName']."<br>";
             }
         }

        
