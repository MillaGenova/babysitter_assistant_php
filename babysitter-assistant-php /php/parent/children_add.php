<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['parent_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}


if (isset($_POST['add_child'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);

    $child_id = uniqid("child_");

    mysqli_query(
        $conn,
        "INSERT INTO `children`(id, name, age, parentId) 
           VALUES('$child_id', '$name','$age','$user_id')"
    ) or die('query failed');
    $message[] = 'Kid added successfully!';
    header('location:children.php');

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

    <section class="add-kid-form">
        <form action="" method="post" enctype="multipart/form-data">
            <img class="image" src="../../assets/icons/add-child.jpg" alt="">
            <p>Enter your kid's Name and Age</p>
            <input type="text" name="name" value="" class="box" required>
            <input type="text" name="age" value="" class="box" required>
            <input type="submit" value="Add" name="add_child" class="btn">
        </form>
    </section>


    <!-- <?php include 'footer.php'; ?> -->

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>