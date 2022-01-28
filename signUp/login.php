<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>

  <?php
    include 'dbcon.php';  

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email_search = " select * from registration where email='$email' ";
        $query = mysqli_query($con, $email_search);

        $email_count = mysqli_num_rows($query);

        if($email_count){
            $email_pass = mysqli_fetch_assoc($query);

            $db_pass = $email_pass['password'];

            $pass_decode = password_verify($password, $db_pass);

            if($pass_decode){
              ?>
              <script>
                alert("Login Successful");
              </script>
              <?php
            }else{
              ?>
              <script>
                alert("Password Incorrect");
              </script>
              <?php
            }
        } else{
          ?>
          <script>
            alert("Invalid Email");
          </script>
          <?php
        }
    }

  ?>

    <div class="login-box">
      <h1>Login</h1>
      <form action="" method="POST">

        <label>Email</label>
        <input type="email" placeholder="Email" name ="email" required/>

        <label>Password</label>
        <input type="password" placeholder="Password" name ="password" required/>
        
        <input type="submit" name="submit" value = "Login"/>
      
      </form>
    </div>
    <p class="para-2">
      Not have an account? <a href="regis.php">Sign Up Here</a>
    </p>
  </body>
</html>