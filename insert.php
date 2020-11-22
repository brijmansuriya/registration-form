<?php
include('connection.php');

$f_nm=$_POST['f_nm'];
$email=$_POST['email'];
$mobile_no=$_POST['mobile_no'];
$address=$_POST['address'];
$qul=$_POST['qul'];
$int_nm=$_POST['int_nm'];
$exp=$_POST['exp'];

if($_FILES['filename']['name']){
move_uploaded_file($_FILES['filename']['tmp_name'], "resume/".$_FILES['filename']['name']);
$resume_upload=$_FILES['filename']['name'];
echo "successfully uploaded";
}
else
{
	echo "error";
}
$ins="insert into register (f_nm,email,mobile_no,address,qul,int_nm,exp,filename) values('".$f_nm."','".$email."','".$mobile_no."','".$address."','".$qul."','".$int_nm."','".$exp."','".$resume_upload."')";
if($result=mysqli_query($conn,$ins))
{
	echo "Success";
	header("Location:view.php");
}
else
{
	echo "Error";
}
?>

