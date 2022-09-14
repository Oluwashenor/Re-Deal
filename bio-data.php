<?php
session_start();
require_once 'assets/config/database.php';

if (isset($_POST[ 'submit' ])) {
    $first_name = $_POST[ 'first_name' ];
    $last_name = $_POST[ 'last_name' ];
    $gender = $_POST[ 'gender' ];
    $dob = $_POST[ 'dob' ];
    // print_r( $_POST ); // exit;
    //check for existing
    $sql = $conn->query( "SELECT * from biodata where first_name='$first_name' " ) or die( mysqli_error());
    if ($sql->num_rows > 0 ) {
        echo 'This record is existing';
    } else {
        //insert into biodata table...
        $addRecord = $conn->query( "INSERT INTO biodata (first_name, last_name, gender, dob) 
        VALUES('$first_name', '$last_name', '$gender', '$dob')" ) or die( mysqli_error());
        echo 'Record Saved Successfully';

    }

}
?>
<!DOCTYPE html>
    <head>
        <meta charset = 'UTF-8'>
        <meta http-equiv = 'X-UA-Compatible' content = 'IE=edge'>
        <meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
        <link rel = 'stylesheet' href = 'assets/styles/biodata.css'>
        <title>Bio-Data Form</title>
    </head>
    <body>
        
        <form method='post'>
        <div class="horse">
            <h2>BIO-DATA</h2>
            <p>Fill out your details</p>
        </div>
            <div>
                <label for="">First Name</label>
                <input type='text' name='first_name' placeholder='enter first name' />
            </div>
            <div>
                <label for="">Last Name</label>
                <input type='text' name='last_name' placeholder='enter last name' />
            </div>
            <label for="">Gender</label>
                <select name='gender'>
                <option value='male'>Male</option>
                <option value='female'>Female </option>
                </select>
            <div>
                <label for="">DOB</label>
                <input type='date' name='dob' />
            </div>
            <button type="submit" name="submit" >Submit</button>
        </form>
    </body>
</html>