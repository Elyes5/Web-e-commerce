<?php
require_once'dbbcon.php';
if($_POST){
    extract($_POST);
    $sql ="INSERT INTO feedback(subject, mail, problem) VALUES ('".$subject."','".$emailadress."','".$problem."')";

    //executer
    $res = mysqli_query($conn,$sql);
    //read results
    if($res){
        header('location:contact us.php');

    }
    else{
        header('location:contact us.php');

    }
$conn->close();
}
?>