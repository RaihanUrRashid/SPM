<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel = stylesheet href= global_bg.css?parameter=2>
</head>
<body>

    

    <form action = "redirect.php" method="POST">  
        <div class="container">
            <br>
            <img src="IUBLOGO.png" width="auto" height="150"><br><br>

            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>

            <?php } ?>

            <label>Username : </label>   
            <input type="text" placeholder="Enter Username" name="username" required><br><br>  

            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" required> <br> <br>

            <label for="sem">Semester:</label>
            <select name="login_type" id="login_type" required>
                <option value="Faculty">Faculty</option>
                <option value="Student">Student</option>
            </select> <br><br>

            <button type="login" name="login">Login</button>

            <input type="checkbox" checked="checked"> Remember me   <br><br>

            <a href="#">Forgot  password? </a>   

        </div>   
    </form>     
</body>
</html>