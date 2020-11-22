<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<?php

include('connection.php');
include('header.php');
$query = $_GET['query']; 
// gets value sent over search form

$min_length = 3;
// you can set minimum length of the query if you want

if(strlen($query) >= $min_length)
  { // if query length is more or equal minimum length then
  
  $query = htmlspecialchars($query); 
  // changes characters used in html to their equivalents, for example: < to &gt;
  
  $query = mysqli_real_escape_string($conn,$query);
  // makes sure nobody uses SQL injection
  
  $raw_results = mysqli_query($conn,"SELECT * FROM register
    WHERE (`f_nm` LIKE '%".$query."%') OR 
     (`email` LIKE '%".$query."%') OR
    (`mobile_no` LIKE '%".$query."%') OR
    (`address` LIKE '%".$query."%') OR
    (`qul` LIKE '%".$query."%') OR
    (`int_nm` LIKE '%".$query."%') OR
    (`exp` LIKE '%".$query."%') OR
     (`filename` LIKE '%".$query."%')");
    
  // * means that it selects all fields, you can also write: `id`, `title`, `text`
  // articles is the name of our table
  
  // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
  // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
  // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
  
  if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
    
    while($results = mysqli_fetch_array($raw_results))
    {
    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
    
      echo "<table border=1 cellspacing='5px' align='center'><tr><td>
    <h3>".$results['f_nm']."</h3>
    <tr><td>".$results['email']."</td></tr>
    <tr><td>".$results['mobile_no']."</td></tr>
    <tr><td>".$results['address']."</td></tr>
    <tr><td> ".$results['qul']."</td></tr>
    <tr><td> ".$results['int_nm']."</td></tr>
     <tr><td>".$results['exp']."</td></tr>
     <tr><td> ".$results['filename']."</td></tr></td></tr></table>";
      // posts results gotten from database(title and text) you can also show id ($results['id'])
    }
    
  }
  else{ // if there is no matching rows do following
    echo "No results";
  }
  
}
else{ // if query length is less than minimum
  echo "Minimum length is ".$min_length;
}
?>