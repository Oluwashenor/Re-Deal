<!DOCTYPE html>
<?php
$servername = "localhost";
$username= "root";
$dbname = "re-idea";
try{
    $conn = mysqli_connect($servername, $username, $dbname);
    echo ("Form completedly!");
}catch(MySQLi_Sql_Exception $ex){
    echo ("Form incompleted!");
}
if(isset($_POST['submit'])){
     $first_name=$_POST['first_name'];
     $last_name=$_POST['last_name'];
     $gender=$_POST['gender'];
     $dob=$_POST['dob'];
     $re-idea.bio-data_query = "INSERT INTO `biodata`(`first_name`, `last_name`, `gender`, `dob`) VALUES ('$first_name','$last_name','$gender','$dob')"; 
     try{
        $bio-data_result = mysqli_query($conn, $bio-data_query );
        if($re-idea_result){
            if(mysqli_affected_rows($conn)>0){
                echo ("Completed!"); 
            }else{
                echo ("error");
            }
        }
     }catch(Exception $ex) {
        echo("error". $ex->getMessage());
     }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Bio-Data Form</title>
</head>
<body>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="first_name" placeholder="enter your first name"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="last_name" placeholder="enter your last name"></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><input type="radio" name="gender"
                value="Male">Male</td>
                <td><input type="radio" name="gender"
                value="female">Female</td>
                <td><input type="radio" name="gender"
                value="others">Others</td>
            </tr>
            <tr>
                <td>DOB:</td>
                <td><input type="date" name="dob" value="dob" placeholder="mm/dd/y"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Sign up"></td>
            </tr>
        </table>
    </form>
</body>
</html>