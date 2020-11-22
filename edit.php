<?php
include('connection.php');
$id=$_REQUEST['user_id'];
$selectqry="select * from register where user_id='".$id."'";
$result=mysqli_query($conn,$selectqry);
$row=mysqli_fetch_assoc($result);
?>
<html>
    <head>
        <title>Update Form</title>
        
    
    </head>
    <body>
        
        <div><h1 align="center">Update Register Page</h1></div>
    <?php
    if(isset($_POST['new']) && $_POST['new']==1)
    {
        $id=$_REQUEST['user_id'];
        $f_nm=$_POST['f_nm'];
        $email=$_POST['email'];
        $mobile_no=$_POST['mobile_no'];
        $address=$_POST['address'];
        $qul=$_POST['qul'];
        $int_nm=$_POST['int_nm'];
        $exp=$_POST['exp'];
        if($_FILES['filename']['name']){
        move_uploaded_file($_FILES['filename']['tmp_name'], "resume/".$_FILES['filename']['name']);
        $imgimg=$_FILES['filename']['name'];
        echo "successfully uploaded";
        }
        else
        {
            echo "error";
        }

        $upd="update register set f_nm='".$f_nm."',
        email='".$email."',
        mobile_no='".$mobile_no."',
        address='".$address."',
        qul='".$qul."' ,
        int_nm='".$int_nm."',
        exp='".$exp."',
        filename='".$filename."' where user_id='".$id."' ";
        $upqry=mysqli_query($conn,$upd);
      
        if($upqry)
        {
            echo "update record successfully";
            header("Location:view.php");
        }
        else
        {
            echo "not update";
        }
    }
    else
    {
    ?>
    <div>
        <form action="" method="POST" enctype="multipart/form-data" name="myform">
            <input type="hidden" name="new" value=1>
            <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
            <table border="1" align="center">
                 <tr>
                    <td> Name</td>
                    <td><input type="text" name="f_nm" id="f_nm"  value="<?php echo $row['f_nm']?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="email"  value="<?php echo $row['email']?>"></td>
                </tr>
                <tr>
                    <td> Moblie No</td>
                    <td><input type="text" name="mobile_no" id="mobile_no"  value="<?php echo $row['mobile_no']?>"></td>
                </tr>
    
                
                <tr>
                    <td>Address </td>
                    <td><input type="text" name="address" value="<?php echo $row['address']?>"></td>
                </tr>
                <tr>
                <td>Qualification</td>  
                    <td><input type="radio" name="qul" value="BCA" <?php if($row['qul']=="BCA"){echo "checked";} ?>/>BCA 
                    
                    <input type="radio" name="qul" value="BCOM" <?php if($row['qul']=="BCOM"){echo "checked";} ?>/>BCOM
                    <input type="radio" name="qul" value="BSC" <?php if($row['qul']=="BSC"){echo "checked";} ?>/>BSC
                    <input type="radio" name="qul" value="MCA" <?php if($row['qul']=="MCA"){echo "checked";} ?>/>MCA</td>
                    </tr>
                  <tr>
                <tr>
                    <td>Institue Name</td>
                    <td><input type="text" name="int_nm" id="int_nm"  value="<?php echo $row['int_nm']?>"></td>
                </tr>
                <tr>
                    <td>Exprience:</td>
                    <td><input type="text" name="exp" id="exp"  value="<?php echo $row['exp']?>"></td>
                </tr>
                <tr>
                 <td>Resume Upload</td>
                 <td><input type="file" name="filename" id="filename"></td>
                </tr>
                 <tr>
                    
                    <td colspan="2" rowspan="2" align="center"><input type="submit" name="btnsub" value="Update"></td>
                </tr>
            </table>
        </form>
    <?php 
    }
    
    ?>
    
    </div>
    </body>
    
</html>