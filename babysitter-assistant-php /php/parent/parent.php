<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['parent_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
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

    <section class="home">

        <div class="content">
            <div class="menu-element" onclick="location.href='calendar_children.php'">
                <h3>
                    Activity Calendar
                </h3>
                <img class="image" src="../../assets/icons/activities.jpg" alt="">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat perferendis iusto sit autem,
                    veniam molestias necessitatibus.</p>
            </div>
            <div class="menu-element" onclick="location.href='babysitters.php'">
                <h3>
                    Connect to babysitter
                </h3>
                <img class="image" src="../../assets/icons/babysitter.jpg" alt="">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat perferendis iusto sit autem,
                    veniam molestias necessitatibus.</p>

            </div>
            <div class="menu-element" onclick="location.href='children.php'">
                <h3>
                    Add child
                </h3>
                <img class="image" src="../../assets/icons/add-child.jpg" alt="">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat perferendis iusto sit autem,
                    veniam molestias necessitatibus.</p>

            </div>
            <div class="menu-element" onclick="location.href='profile.php'">
                <h3>
                    Edit personal data
                </h3>
                <img class="image" src="../../assets/icons/personal-data.jpg" alt="">
                <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat perferendis iusto sit autem,
                    veniam molestias necessitatibus.</p>

            </div>
        </div>
    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>