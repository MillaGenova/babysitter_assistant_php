<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['babysitter_id'];
$child_id = $_SESSION['child_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}

if (isset($_POST['log_activity'])) {

    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $start_time = ($_POST['start_time']);
    $end_time = ($_POST['end_time']);

    $event_start = date("Y-m-d") . "T" . $start_time . ":00";
    $event_end = date("Y-m-d") . "T" . $end_time . ":00";
    $event_id = uniqid("event_");
    mysqli_query(
        $conn,
        "INSERT INTO `calendar`(eventId, childId, description, start, end) 
           VALUES('$event_id', '$child_id', '$description','$event_start','$event_end')"
    ) or die('query failed');
    $message[] = 'Event added successfully!';
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

    <?php include 'babysitter_header.php'; ?>

    <section class="log_activity_form">


        <form action="" method="post" enctype="multipart/form-data">
            <img class="image" src="../../assets/icons/child-care.jpg" alt="">
            <p>Log activity for today!</p>
            <input type="text" name="description" placeholder="Add description" class="box" required>
            <input type="time" name="start_time" placeholder="06:00" class="box" required>
            <input type="time" name="end_time" placeholder="06:15" class="box" required>

            <input type="submit" value="add" name="log_activity" class="btn">
        </form>

    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>