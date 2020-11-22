<?php
include('connection.php');
include('header.php');
$limit = 3;  
if (!isset ($_GET['page']) ) {  
	$page = 1;  
} else {  
	$page = $_GET['page'];  
}   
$start_from = ($page-1) * $limit;  

$result = mysqli_query($conn,"SELECT * FROM register ORDER BY user_id ASC LIMIT $start_from, $limit");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW USER</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div align="center">
        <h1>VIEW USER</h1>
    </div>
    <div style="width=100%;">
        <table border=1 cellspacing="5px" align="center">
            <thead>
                <tr>
                    <th>User Id</th>
                    <th>Name</th>
                    <th>email</th>
                    <th>Mobile No.</th>
                    <th>Address</th>
                    <th>Qualification</th>
                    <th>Institute Name</th>
                    <th>Exprience</th>
                    <th>Resume Upload</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
        $seldata="select * from register";
        $result=mysqli_query($conn,$seldata);
       
        while($row=mysqli_fetch_assoc($result))
        
        {
        ?>
                <tr>

                    <td><?php echo $row['user_id'] ?></td>
                    <td><?php echo $row['f_nm'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['mobile_no'] ?></td>
                    <td><?php echo $row['address'] ?></td>
                    <td><?php echo $row['qul'] ?></td>
                    <td><?php echo $row['int_nm'] ?></td>
                    <td><?php echo $row['exp'] ?></td>
                    <!--<td><?php echo $row['filename'] ?></td>-->

                    <td><a href="resume/<?php echo $row['filename'] ?>">View Files </a></td>
                    <td><a href="edit.php?user_id=<?php echo $row['user_id'];?>">Edit/</a>
                        <a href="delete.php?user_id=<?php echo $row['user_id'];?>"
                            onclick="return confirmation()">/Delete</a></td>

                    <script type="text/javascript">
                        function confirmation() {
                            return confirm('Are you sure you want to delete?');
                        }
                    </script>



                </tr>

                <?php
        }
        ?>
        </table>
        <?php  

$result_db = mysqli_query($conn,"SELECT COUNT(user_id) FROM register"); 
$rowdb = mysqli_num_rows($result);
// $total_records = $row_db[0];  
$total_pages = ceil($rowdb / $limit); 






/* echo  $total_pages; */
$pagLink = "<ul class='pagination'>";  
for ($i=1; $i<=$total_pages; $i++) {
              $pagLink .= "<li class='page-item'>
              <a class='page-link' href='view.php?page=".$i."'>".$i."</a></li>";	
             
              
            }   
echo $pagLink . "</ul>";  
?>

</body>

</html>