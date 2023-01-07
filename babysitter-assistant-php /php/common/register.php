<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $address = mysqli_real_escape_string($conn, $_POST['address']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);

   $select_users = mysqli_query(
      $conn,
      "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'"
   ) or die('query failed');

   if (mysqli_num_rows($select_users) > 0) {
      $message[] = 'User already exist!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } else {
         if ($user_type == "parent") {
            $user_id = uniqid("parent_");
         } else {
            $user_id = uniqid("babysitter_");
         }
         mysqli_query(
            $conn,
            "INSERT INTO `users`(id, fullname, address, phone, name, email, password, user_type) 
               VALUES('$user_id', '$fullname','$address','$phone','$name','$email','$cpass','$user_type')"
         ) or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
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
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../../css/style.css">

</head>

<body>
   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
      }
   }
   ?>

   <div class="form-container">
      <form action="" method="post">
         <h3>register now</h3>
         <input type="text" name="fullname" placeholder="Enter your full name" required class="box">
         <input type="text" name="address" placeholder="Enter your address" required class="box">
         <input type="text" name="phone" placeholder="Enter your phone" required class="box">
         <input type="text" name="name" placeholder="Enter your  user-name" required class="box">
         <input type="email" name="email" placeholder="enter your email" required class="box">
         <input type="password" name="password" placeholder="enter your password" required class="box">
         <input type="password" name="cpassword" placeholder="confirm your password" required class="box">
         <select name="user_type" class="box">
            <option value="parent">parent</option>
            <option value="babysitter">babysitter</option>
         </select>
         <input type="submit" name="submit" value="register now" class="btn">
         <p>Already have an account? <a href="login.php">Login now!</a></p>
      </form>
   </div>
</body>

</html>