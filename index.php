<?php
include('header.php');
?>
<?php

?>
<html>
    <head>
        <title>Register Form</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
        
    </head>
    <body>
        <div><h1 align="center">Registration Form</h1></div>
        <form  class="form-group" action="insert.php" method="POST" enctype="multipart/form-data" name="myform">
            <table border="1" align="center">
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="f_nm" id="fname" required></td>
                </tr>
               
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" id="email" required></td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td><input type="text" name="mobile_no" id="num" required></td>
                </tr>
                <tr>
                    <td>Address </td>
                    <td><input type="text" id="add" name="address" reequired></td>
                </tr>
                <tr>
                <td>Qualification</td>  
                    <td><input type="radio" name="qul" value="BCA"/>BCA 
                    <input type="radio" name="qul" value="BCOM"/>BCOM 
                    <input type="radio" name="qul" value="BSC"/>BSC 
                    <input type="radio" name="qul" value="MCA"/>MCA</td>
                    </tr>
                  <tr>
                  <tr>
                    <td>Instituate Name</td>
                    <td><input type="text" name="int_nm" id="intnm" required></td>
                </tr>
                
               
                <tr>
                    <td>Experience</td>
                    <td><input type="number" name="exp" id="exp"></td>
                </tr>
               <tr>
                 
                    <td>Image</td>
                    <td><input type="file" name="filename" id="filename"></td>
              </tr>
                    <td colspan="2" rowspan="2" align="center"><input type="submit" name="btnsub" value="ADD"></td>
                </tr>
            </table>
        </form>
    </body>
    

</html>
