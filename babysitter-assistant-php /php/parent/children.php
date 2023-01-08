<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['parent_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}

if (isset($_POST['select_child'])) {
    $_SESSION['child_id'] = $_POST['child_id'];
    header('location:calendar.php');
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

    <section class="children">

        <div class="content">
            <div class="menu-element your-children-container">
                <h3>
                    Your registered children
                </h3>

                <div class="registered-children">
                    <?php
                    $select_child = mysqli_query($conn, "SELECT * FROM `children` WHERE parentId = '$user_id'") or die('query failed');
                    if (mysqli_num_rows($select_child) > 0) {
                        ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Babysitter</th>
                                    <th>Calendar</th>
                                </tr>
                            </thead>
                            <?php
                            while ($fetch_child = mysqli_fetch_assoc($select_child)) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fetch_child['name']; ?></td>
                                        <td>
                                            <?php echo $fetch_child['age']; ?>
                                        </td>
                                        <td>
                                            <?php
                                            $babysitter_id = $fetch_child['babysitterId'];
                                            if ($babysitter_id) {
                                                $select_babysitter = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$babysitter_id'") or die('query failed');
                                                while ($fetch_babysitter = mysqli_fetch_assoc($select_babysitter)) {
                                                    echo $fetch_babysitter['fullname'];
                                                }
                                            } else {
                                                echo "Babysitter not selected yet";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <form action="" method="post">
                                                <input type="hidden" name="child_id" value="<?php echo $fetch_child['id']; ?>">
                                                <input type="submit" name="select_child" value="open" class="option-btn">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- <div class="name"><?php echo $fetch_child['name']; ?></div>
                                                <div class="age"><?php echo $fetch_child['age']; ?></div> -->
                        </div>
                        <?php
                            }
                    } else {
                        echo '<p>You have not registered kid yet!</p>';
                    }
                    ?>
                </table>
            </div>

        </div>
        <div class="add-child-container" onclick="location.href='children.php'">
            <h3>
                Add child
            </h3>
            <img class="image" src="../../assets/icons/add-child.jpg" alt="">
            <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat perferendis iusto sit autem,
                veniam molestias necessitatibus.
            </p>
            <a href="children_add.php" class="option-btn">Add kid!</a>


        </div>

        </div>
    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>