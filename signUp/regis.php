<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="code.js"></script>
  </head>
  <body>

  <?php

  include 'dbcon.php';  
    
  if(isset($_POST['submit'])){
        $fname = mysqli_real_escape_string($con, $_POST['fname']);
        $lname = mysqli_real_escape_string($con, $_POST['lname']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        

        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        $emailquery = " select * from registration where email = '$email' ";
        $query = mysqli_query($con, $emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            ?>
                    <script>
                          alert("Email already exist");
                    </script>
            <?php         
        }else{
            if($password === $cpassword){

                $insertquery = "insert into registration(fname, lname, email, password, cpassword) values('$fname', '$lname', '$email', '$pass', '$cpass')";
                $iquery = mysqli_query($con, $insertquery);

                if ($iquery) {
                    ?>
                      <script>
                          alert("Inserted Successful");
                      </script>
                    <?php
                  }else{
                    ?>
                      <script>
                          alert("No Inserted");
                      </script>
                    <?php
                  }

             }else{
                ?>
                      <script>
                          alert("Password is not matching");
                      </script>
                    <?php
            }
        }
  }
  ?>

    <div class="signup-box">
      <h1>Sign Up</h1>
      <h4>It's free and only takes a minute</h4>

      <form id="registration_form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

        <label>First Name</label>
        <input type="text" placeholder="First Name" name ="fname" id="form_fname" required/>
        <span class="error_form" id="fname_error_message"></span>

        <label>Last Name</label>
        <input type="text" placeholder="Last Name" name ="lname" id="form_lname" required/>
        <span class="error_form" id="lname_error_message"></span>

        <label>Email</label>
        <input type="email" placeholder="Email" name ="email" id="form_email" required/>
        <span class="error_form" id="email_error_message"></span>

        <label>Password</label>
        <input type="password" placeholder="Password" name ="password" id="form_password" required/>
        <span class="error_form" id="password_error_message"></span>
        <label>Confirm Password</label>

        <input type="password" placeholder="Confirm Password" name ="cpassword" required/>
        
        <input type="submit" name="submit"/>

      </form>
      <p>
        By clicking the Sign Up button,you agree to our <br />
        <a href="#">Terms and Condition</a> and <a href="#">Policy Privacy</a>
      </p>
    </div>
    <p class="para-2">
      Already have an account? <a href="login.php">Login here</a>
    </p>

    
  </body>
</html>