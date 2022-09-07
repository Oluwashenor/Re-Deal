<?php
session_start();
include '.assets/config/database.php';

if (isset($_POST['submit'])){
    if(empty($_POST['username'])){
    echo "<script>alert('Username is required')</script>";
}elseif ( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    echo "<script>alert('Valid Email Required')</script>";
}elseif(strlen($_POST['password']) < 6 ){
    echo "<script>alert('password must be at least 6 characters')</script>";

}elseif(! preg_match('/[a-z]/i', $_POST['password'])){
    echo "<script>alert('password must contain at least a letter ')</script>" ;
}elseif(! preg_match('/[0-9]/', $_POST['password'])){
    echo "<script>alert ('password must contain at least a number')</script>";
}elseif($_POST['password'] !== $_POST['password_confirmation']){
    echo "<script>alert('Passwords must match')</script>";
}else{
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $password_confirmation= $_POST['password_confirmation'];
  

    $sqlQuery = "select * from `users` where email= '$email'";
    $query= mysqli_query($conn, $sqlQuery);
    
    if (mysqli_num_rows($query) >0){
        echo "<script>alert('email already exists')</script>";
    }else{
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql= "insert into `users` (username, email, password) values ('$username','$email', '$password' )";
        $result= mysqli_query($conn, $sql);
        if($result){
            echo 'User Registered';
        }else{
           die(mysqli_error($con));
        }
    }}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/styles/register.css">
</head>
<body>
    
    <form action="" method="post">
        <h2>RE-IDEA</h2>
        <h3>Register Account</h3>
        <label for="email">Email:</label><br>
        <input type="email"  name="email" id=""><br>
        <label for="name" >Username:</label><br>
        <input type="text"  name="username" id=""><br>
        <label for="password">Password:</label><br>
        <input type="password"  name="password" id=""><br>
        <label for="password-confirm">Confirm Password:</label><br>
        <input type="password"  name="password_confirmation" id=""><br>

       
        <input type="submit"  value="Submit" name="submit">
        <p>Already have an account? <a href="login.php">Login</a> </p>
    </form>

</body>
</html>