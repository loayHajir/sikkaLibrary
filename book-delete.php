<?php
include "core/connect.php";
include "core/admin.php";

if (isset ($_GET['deleteid'])){
    $id= $_GET['deleteid'];
    $sql = "delete from  `books` where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result){
        // echo "Delete successful";
        header ('location:display.php');
            $message = "Book with ID $id has been successfully deleted.";
    } else{
        die(mysqli_error($conn));
    }
}
