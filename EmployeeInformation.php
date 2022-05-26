<?php
error_reporting(E_ALL);
    ini_set('display_errors', 1);
 require_once('connection.php');
    require_once ('session.php');
$Ssn=$_POST['Ssn'];
 $sql = "SELECT * FROM EMPLOYEE WHERE Ssn='$Ssn'";
    $conn = mysqli_connect('localhost','mahmoudh_Company1','Company1','mahmoudh_Company1');
    $result=mysqli_query($conn,$sql);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Company</title>
  </head>
  <body class="">
  <nav class="shift navbar navbar-expand-lg navbar-light bg-light" >
  <a class="navbar-brand" href="#">Company</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Employees</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Departments</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Projects</a>
      </li>
      
    </ul>
  </div>
</nav>
    
<table id="tables" align="center" border="1px" style="width:900px; line-height:40px;">
    <tr>
      <th colspan="10"><h2>Employee Data</h2></th>
        </tr>
      <th> Fname </th>
      <th> Minit </th>
      <th> Lname </th>
      <th> Ssn </th>
      <th> Bdate </th>
      <th> Address </th>
      <th> Sex </th>
      <th> Salary </th>
        <th>Super ssn</th>
      <th>Dno</th>
    </tr>
  <?php while($rows=mysqli_fetch_assoc($result)) 
        { 
        ?> 
        <tr> <td><?php echo $rows['Fname']; ?></td> 
        <td><?php echo $rows['Minit']; ?></td> 
        <td><?php echo $rows['Lname']; ?></td> 
        <td><?php echo $rows['Ssn']; ?></td> 
          <td><?php echo $rows['Bdate']; ?></td> 
          <td><?php echo $rows['Address']; ?></td> 
          <td><?php echo $rows['Sex']; ?></td> 
          <td><?php echo $rows['Salary']; ?></td> 
          <td><?php echo $rows['Super_ssn']; ?></td> 
          <td><?php echo $rows['Dno']; ?></td> 
        </tr> 
    <?php 
               } 
          ?> 
</table>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>