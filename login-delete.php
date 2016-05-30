
<html lang = "en">
   
   <head>
      <title>login</title>
      
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: rgba(0,0,0,0.05);
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 5px;
            font-size: 16px;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
                  
         .container{
            width: 550px; margin: 50px auto; text-align: center;
         }
      </style>
      
   </head>
	
   <body>
      
      <div class = "container form-signin">
         
      <?php

    // Start the session
    session_start();

    // Defines username and password. Retrieve however you like,
    unset($username);
    unset($password);
    $username = "po";
    $password = "2";

    // Error message
    $msg = "";

    // Checks to see if the user is already logged in. If so, refirect to correct page.
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header('Location: delete_data.php');
    } 
        
    // Checks to see if the username and password have been entered.
    // If so and are equal to the username and password defined above, log them in.
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == $username && $_POST['password'] == $password) {
            $_SESSION['login'] = true;
            header('Location: delete_data.php');
        } else {
            $_SESSION['login'] = false;
            $error = "wrong username and password!";
        }
    }
?>

      </div> <!-- /container -->
      
      <div class = "container">
         <h3>User Login</h3>
         <form class = "form-signin" action = "login-delete.php" method = "post">
            <h4><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" name = "username" placeholder autofocus = "username" required></br>
            <input type = "password" class = "form-control" name = "password" placeholder = "password" required><br>
            <button type = "submit" name = "login">Login</button>
         </form>
      </div> 
      
   </body>
</html>

