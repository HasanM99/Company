<?php
error_reporting(E_ALL);
    ini_set('display_errors', 1);
 require_once('connection.php');
    require_once ('session.php');

 $sql = "SELECT * FROM DEPARTMENT";
    $conn = mysqli_connect('localhost','mahmoudh_Company1','Company1','mahmoudh_Company1');
    $result=mysqli_query($conn,$sql);

?>

 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Departments Table</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>
   <style type="text/css"> 
<!-- 
 
 #navbar ul { 
	margin: 0; 
	padding: 5px; 
	list-style-type: none; 
	text-align: center; 
	background-color: #000; 
	} 
 
#navbar ul li {  
	display: inline; 
	} 
 
#navbar ul li a { 
	text-decoration: none; 
	padding: .2em 1em; 
	color: #fff; 
	background-color: #000; 
	} 
 
#navbar ul li a:hover { 
	color: #000; 
	background-color: #fff; 
	} 
 
--> 
</style> 
</head> 
<body> 
<div id="navbar"> 
  <ul> 
	<li><a href="index.html">Home</a></li>
        <li><a href="Employee.php">Serach Employees</a></li>
        <li><a href="Insert.php">Insert/Delete Employees</a></li>
        <li><a href="Projects.php">Search Projects</a></li> 
  </ul> 
</div> 
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Departments Table</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>Dname</td>  
                                    <td>Dnumber</td>  
                                    <td>Mgr_ssn</td>  
                                    <td>Mgr_start_date</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["Dname"].'</td>  
                                    <td>'.$row["Dnumber"].'</td>  
                                    <td>'.$row["Mgr_ssn"].'</td>  
                                    <td>'.$row["Mgr_start_date"].'</td>  
                               </tr>  
                               ';  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  