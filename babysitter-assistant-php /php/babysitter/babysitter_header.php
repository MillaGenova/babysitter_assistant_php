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

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="babysitter.php" class="logo">Babysitter Menu</a>

         <nav class="navbar">
            <a href="babysitter.php">home</a>
            <a href="parents.php">parents</a>
            <a href="children.php">children</a>
            <a href="profile.php">profile</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fa-solid fa-circle-user"></div>
         </div>

         <div class="user-box">
            <p>username : <span>
                  <?php echo $_SESSION['babysitter_name']; ?>
               </span></p>
            <p>email : <span><?php echo $_SESSION['babysitter_email']; ?></span></p>
            <a href="../common/logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>