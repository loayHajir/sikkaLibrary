<?php
include 'connect.php';
if (isset ($_GET['deleteid'])){
    $id= $_GET['deleteid'];

    $sql = "delete from  `books` where id=$id";
    $result=mysqli_query($conn,$sql);
    if ($result){
        // echo "Delete successful";
        header ('location:display.php');
    } else{
        die(mysqli_error($conn));
    }
}
?>