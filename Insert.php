<!DOCTYPE html>
<html>
    <head>
        <title>Insert and Delete</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
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
        <li><a href="Employee.php">Search Employees</a></li>
        <li><a href="Departments.php">Serach Departments</a></li>
        <li><a href="Projects.php">Search Projects</a></li> 
  </ul>

</div> 
    <body>
        <?php require_once 'process.php'; ?>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','mahmoudh_Company1','Company1','mahmoudh_Company1') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM EMPLOYEE") or die($mysqli->error);
            //pre_r($result);
            ?>
        
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Fname</th>
                            <th>Minit</th>
                            <th>Lname</th>
                            <th>Ssn</th>
                            <th>Bdate</th>
                            <th>Address</th>
                            <th>Sex</th>
                            <th>Salary</th>

                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['Fname']; ?></td>
                        <td><?php echo $row['Minit']; ?></td>
                        <td><?php echo $row['Lname']; ?></td>
                        <td><?php echo $row['Ssn']; ?></td>
                        <td><?php echo $row['Bdate']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Sex']; ?></td>
                        <td><?php echo $row['Salary']; ?></td>
                        <td>
                           <!--- <a href="Insert.php?edit=<?php echo $row['Ssn']; ?>" 
								class="btn btn-info">Edit</a>--->
                            <a href="process.php?delete=<?php echo $row['Ssn']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>
            <?php
            
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        
        <div class="row justify-content-center">
        <form action="process.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>First Name</label>
            <input type="text" name="Fname" class="form-control" 
                   value="<?php echo $Fname; ?>" placeholder="Enter first name:">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Minit</label>
            <input type="text" name="Minit" class="form-control" 
                   value="<?php echo $Minit; ?>" placeholder="Enter Minit:">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="Lname" class="form-control" 
                   value="<?php echo $Lname; ?>" placeholder="Enter last name:">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Ssn</label>
            <input type="text" name="Ssn" class="form-control" 
                   value="<?php echo $Ssn; ?>" placeholder="Enter Ssn (9 digits):">
            </div>

            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
            <label>Bdate (YYYY-MM-DD)</label>
            <input type="text" name="Bdate" class="form-control" 
                   value="<?php echo $Bdate; ?>" placeholder="Enter birth date:">
            </div>

            <div class="form-group">
            <label>Address</label>
            <input type="text" name="Address" 
                   value="<?php echo $Address; ?>" class="form-control" placeholder="Enter address:">
            </div>

            <div class="form-group">
            <label>Gender</label>
            <input type="text" name="Sex" 
                   value="<?php echo $Sex; ?>" class="form-control" placeholder="Enter gender:">
            </div>

            <div class="form-group">
            <label>Salary</label>
            <input type="text" name="Salary" 
                   value="<?php echo $Salary; ?>" class="form-control" placeholder="Enter salary:">
            </div>


            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
        </div>
    </body>