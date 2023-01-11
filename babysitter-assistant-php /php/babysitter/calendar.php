<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['babysitter_id'];
$child_id = $_SESSION['child_id'];

if (!isset($user_id)) {
    header('location:../common/login.php');
}

if (isset($_POST['log_activity'])) {
    $_SESSION['child_id'] = $_POST['child_id'];
    header('location:calendar_log_activity.php');
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/style.css">
    <!-- <script src="../../dist/calendar.js"></script> -->

</head>

<body>
    <?php include 'babysitter_header.php'; ?>

    <div class="log-activity" id="log-activity">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="child_id" value="<?php echo $child_id; ?>">
            <input type="submit" value="Log Activit" name="log_activity" class="btn">
        </form>
    </div>
    <?php include '../common/calendar.php'; ?>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>