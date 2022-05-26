<?php

session_start();

$mysqli = new mysqli('localhost', 'mahmoudh_Company1', 'Company1', 'mahmoudh_Company1') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$Fname = '';
$Minit = '';
$Lname = '';
$Ssn = '';
$Bdate = '';
$Address = '';
$Sex = '';
$Salary = '';

if (isset($_POST['save'])){
    $Fname = $_POST['Fname'];
    $Minit = $_POST['Minit'];
    $Lname = $_POST['Lname'];
    $Ssn = $_POST['Ssn'];
    $Bdate = $_POST['Bdate'];
    $Address = $_POST['Address'];
    $Sex = $_POST['Sex'];
    $Salary = $_POST['Salary'];

    
    $mysqli->query("INSERT INTO EMPLOYEE (Fname, Minit, Lname, Ssn, Bdate, Address, Sex, Salary) VALUES('$Fname', '$Minit', '$Lname', '$Ssn', '$Bdate', '$Address', '$Sex', '$Salary')") or
            die($mysqli->error);
        
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location: Insert.php");
    
}

if (isset($_GET['delete'])){
    $Ssn = $_GET['delete'];
    $mysqli->query("DELETE FROM EMPLOYEE WHERE Ssn=$Ssn") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: Insert.php");
}

if (isset($_GET['edit'])){
    $Ssn = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM EMPLOYEE WHERE Ssn=$Ssn") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $Fname = $row['Fname'];
        $Minit = $row['Minit'];
        $Lname = $row['Lname'];
        $Ssn = $row['Ssn'];
        $Bdate = $row['Bdate'];
        $Address = $row['Address'];
        $Sex = $row['Sex'];
        $Salary = $row['Salary'];        
    }
}

if (isset($_POST['update'])){
    $Ssn = $_POST['Ssn'];
    $Fname = $row['Fname'];
    $Minit = $row['Minit'];
    $Lname = $row['Lname'];
    $Ssn = $row['Ssn'];
    $Bdate = $row['Bdate'];
    $Address = $row['Address'];
    $Sex = $row['Sex'];
    $Salary = $row['Salary'];  
    
  
	$sql = "UPDATE EMPLOYEE
               SET Fname='$Fname', Minit='$Minit',Lname='$Lname',Ssn='$Ssn',Bdate='$Bdate',Address='$Address',Sex='$Sex',Salary='$Salary'
               WHERE Ssn=$Ssn ";
	$result = mysqli_query($conn, $sql);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: Insert.php');
}