<?php

include 'connect.php';

if(isset($_POST ["login"])){

    $username = $_POST ["username"];
    $password = $_POST ["password"];

    /*$stmt = $conn->prepare("SELECT FACULTY_PASSWORD FROM faculty_login WHERE FACULTY_ID = ? ;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $value = $result->fetch_object();*/

    session_start();
    $_SESSION["username"] = $username;

    $sql = "SELECT * FROM faculty_login WHERE FACULTY_ID = '$username' AND FACULTY_PASSWORD = '$password'";  
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);

    if($count == 1){
        header("location: QuestionAdd.php?username='$username");
        //echo "<h1>success</h1>";
    }else{
        //header("Location: index.php?error=Incorrect User name or password");
        header("location: login.php?error=Incorrect User name or password");
        //echo "<h1>Invalid username or password</h1>";
        //echo $value;
    }

}else{
    header("location: login.php");
}