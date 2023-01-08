<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['parent_id'];

if (!isset($user_id)) {
  header('location:../common/login.php');
}


if (isset($_POST['update_personal_data'])) {

  $update_p_id = mysqli_real_escape_string($conn, $_POST['update_p_id']);
  $update_fullname = mysqli_real_escape_string($conn, $_POST['update_fullname']);
  $update_address = mysqli_real_escape_string($conn, $_POST['update_address']);
  $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone']);
  $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
  $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

  mysqli_query($conn, "UPDATE `users` 
                      SET name = '$update_name',
                          fullname = '$update_fullname',
                          address = '$update_address',
                          phone = '$update_phone',
                          email = '$update_email'
                      WHERE id = '$update_p_id'") or die('query failed');
  header('location:parent.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <!-- custom css file link  -->
  <link rel="stylesheet" href="../../css/style.css">

</head>

<body>

  <?php include 'parent_header.php'; ?>

  <section class="edit-profile-form">

    <?php
    $update_query = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($update_query) > 0) {
      while ($fetch_update = mysqli_fetch_assoc($update_query)) {
        ?>
        <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
          <img class="image" src="../../assets/icons/personal-data.jpg" alt="">
          <input type="text" name="update_fullname" value="<?php echo $fetch_update['fullname']; ?>" class="box" required>
          <input type="text" name="update_address" value="<?php echo $fetch_update['address']; ?>" class="box" required>
          <input type="text" name="update_phone" value="<?php echo $fetch_update['phone']; ?>" class="box" required>
          <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required>
          <input type="text" name="update_email" value="<?php echo $fetch_update['email']; ?>" class="box" required>

          <input type="submit" value="update" name="update_personal_data" class="btn">
        </form>
        <?php
      }
    }
    ?>

  </section>


  <!-- <?php include 'footer.php'; ?> -->

  <!-- custom js file link  -->
  <script src="../../js/script.js"></script>

</body>

</html>