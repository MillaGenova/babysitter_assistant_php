<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['parent_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}

if (isset($_POST['select_babysitter'])) {
    $babysitter_id = mysqli_real_escape_string($conn, $_POST['babysitter_id']);

    mysqli_query($conn, "UPDATE `children` SET babysitterId = '$babysitter_id' WHERE parentId = '$user_id'") or die('query failed');
    $message[] = 'Babysitter successfully selected';
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

    <section class="babysitters">

        <div class="content">
            <div class="menu-element">
                <h3>
                    Suggested Babysitters
                </h3>
                <img class="image" src="../../assets/icons/babysitter.jpg" alt="">

                <div class="suggested_babysitters">

                    <?php
                    $select_babysitter = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'babysitter'") or die('query failed');
                    if (mysqli_num_rows($select_babysitter) > 0) {
                        ?>
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <?php
                            while ($fetch_babysitter = mysqli_fetch_assoc($select_babysitter)) {
                                ?>
                                <tbody>
                                    <tr class="suggested-babysitter">
                                        <td><?php echo $fetch_babysitter['fullname']; ?></td>
                                        <td>
                                            <?php echo $fetch_babysitter['phone']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_babysitter['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $fetch_babysitter['address']; ?>
                                        </td>
                                    </tr>
                                    <tr class="suggested-babysitter-selec">
                                        <td colspan="4">
                                            <form action="" method="post">
                                                <input type="hidden" name="babysitter_id"
                                                    value="<?php echo $fetch_babysitter['id']; ?>">
                                                <input type="submit" name="select_babysitter" value="select" class="option-btn">
                                            </form>
                                        </td>
                                    </tr>

                                </tbody>
                        </div>
                        <?php
                            }
                    } else {
                        echo '<p>There are no registered babysitters yet!</p>';
                    }
                    ?>
                </table>
            </div>

        </div>

    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>