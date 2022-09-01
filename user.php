<?php
session_start();
include './config/database.php';
if (isset($_POST['submit'])){
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];


    $query= mysqli_query($conn, "select * from `users` where email= '$email'");
    
    if (mysqli_num_rows($query) >0){
        echo "<script>alert('email already exists')</script>";
    }else{
        $sql= "insert into `users` (username, email, password) values ('$username','$email', '$password' )";
        $result= mysqli_query($conn, $sql);
        if($result){
            echo 'User Registered';
        }else{
            die(mysqli_error($con));
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body{
            background-color:lightgray;
            /* background-image:url('./images/idea.jfif');
            background-repeat: no-repeat;
            background-size: contain; */
        }
        form{
            margin: 0 auto;
            width: 40vh;
            margin-top: 20vh;
            box-sizing: border-box;
        }
        h3{
            font-family:'Courier New', Courier, monospace;
        }
        input[type="submit"]{
            margin-top: 10px;
            cursor: pointer;
            background-color: gray;
            color:white ;
            border: none;
            height: 30px;
            border-radius: 10px;

        }
        a{
            text-decoration: none;
        }
        a:hover{
            text-decoration: underline;
            color: brown;
        }
        input[type="submit"]:hover{
            background-color: whitesmoke;
            color: black;
            font-weight: bold;
            transition: .4s ease-in;
        }
    </style>
</head>
<body>
    <div class="img"></div>
    <form action="" method="post">
        <h3>Register Account</h3>
        <label for="email">Email:</label><br>
        <input type="email" required name="email" id=""><br>
        <label for="name" >Username:</label><br>
        <input type="text" required name="username" id=""><br>
        <label for="password">Password:</label><br>
        <input type="password" required name="password" id=""><br>
       
        <input type="submit"  value="Submit" name="submit">
        <p>Already have an account? <a href="login.php">Login</a> </p>
    </form>
</body>
</html>