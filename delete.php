<?php
include('connection.php');

$id=$_REQUEST['user_id'];

$del="delete from register where user_id=$id";
$res=mysqli_query($conn,$del);
if($res)
{
    echo "record delete successfully";
    header("Location:view.php");
}
else
{
    echo "record not deleted";
}
?>

