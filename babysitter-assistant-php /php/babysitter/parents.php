<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['babysitter_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}

if (isset($_POST['select_parent'])) {
    $parentId = $_POST['parentId'];
    $_SESSION['selected_parent_id'] = $_POST['parent_id'];
    $_SESSION['selected_parent_name'] = $_POST['parent_name'];
    header('location:parents-children.php');
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

    <?php include 'babysitter_header.php'; ?>

    <section class="babysitters">

        <div class="content">
            <div class="menu-element">
                <h3>
                    Connected Parents
                </h3>
                <!-- TODO: Better image -->
                <img class="image" src="../../assets/icons/babysitter.jpg" alt="">

                <div class="suggested_babysitters">
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
                        $select_connections = mysqli_query($conn, "SELECT * FROM `children` WHERE babysitterId = '$user_id'") or die('query failed');
                        $parentIds = array();
                        while ($fetch_connections = mysqli_fetch_assoc($select_connections)) {
                            array_push($parentIds, $fetch_connections['parentId']);
                        }
                        $clients = array_unique($parentIds);
                        foreach ($clients as $parentId) {
                            $select_parents = mysqli_query($conn, "SELECT * FROM `users` WHERE id = '$parentId'") or die('query failed');
                            if (mysqli_num_rows($select_parents) > 0) {

                                while ($fetch_parents = mysqli_fetch_assoc($select_parents)) {
                                    ?>
                                    <tbody>
                                        <tr class="suggested-babysitter">
                                            <td><?php echo $fetch_parents['fullname']; ?></td>
                                            <td>
                                                <?php echo $fetch_parents['phone']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fetch_parents['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $fetch_parents['address']; ?>
                                            </td>
                                        </tr>
                                        <tr class="suggested-babysitter-selec">
                                            <td colspan="4">
                                                <form action="" method="post">
                                                    <input type="hidden" name="parent_id"
                                                        value="<?php echo $fetch_parents['id']; ?>">
                                                    <input type="hidden" name="parent_name"
                                                        value="<?php echo $fetch_parents['fullname']; ?>">
                                                    <input type="submit" name="select_parent" value="See children"
                                                        class="option-btn">
                                                </form>
                                            </td>
                                        </tr>

                                    </tbody>
                            </div>
                            <?php
                                }
                            } else {
                                echo '<p>There are no connected parents yet!</p>';
                            }
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