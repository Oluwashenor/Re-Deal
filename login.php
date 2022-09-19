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
    <div class="sign-up">
    <form method="post" >


        <fieldset>


<legend><h3>Login</h3></legend>

<img src="/Re-Idea/user (1).png" alt=""><br>

<input type="email" name="email" id="" placeholder="Email"><br>


<input type="password" name="password" id="" placeholder="Password"><br>

<button name="submit">Submit</button><br>
<p class="register-cta">No Account Yet? <a href="/Re-Idea/register.html" >Register</a></p>
 <p class="register-cta."><a href="forgot.php">Forgot Password?</a></p>

</fieldset>

    </form>

</div>
    
</body>
</html>
