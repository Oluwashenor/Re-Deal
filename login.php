<?php
session_start();
include 'assets/config/database.php';
if(isset($_POST['submit'])){
$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("select * from users where email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt_result = $stmt->get_result();
if($stmt_result->num_rows > 0){
    $data = $stmt_result->fetch_assoc();
    if($data['password'] === $password){
        echo "Welcome User";
    }else{
        echo "<script>alert('Invalid password')</script>";
    }
}else{
    echo "<script>alert('Invalid email')</script>";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/styles/login.css">
</head>
<body>
    <form method="post" >
<h3>Login</h3>
<label for="">Email:</label><br>
<input type="email" name="email" id=""><br>

<label for="">Password</label><br>
<input type="password" name="password" id=""><br>

<button name="submit">Submit</button><br>
<p>No Account Yet? <a href="register.php" class="Register">Register</a></p>
<a href="forgot.php" class="register">Forgot Password?</a>








    </form>


    
</body>
</html>
