<?php

include '../common/config.php';

session_start();

$user_id = $_SESSION['babysitter_id'];
$event_id = $_COOKIE['event_id'];

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
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- JS for jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- JS for full calender -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/style.css">

</head>

<body>

    <?php
    include 'babysitter_header.php';

    $select_event = mysqli_query($conn, "SELECT * FROM `calendar` WHERE eventId = '$event_id'") or die('query failed');
    $event = mysqli_fetch_assoc($select_event);
    ?>

    <section class="children">

        <div class="content">
            <div class="add-child-container">
                <img class="image" src="../../assets/icons/activities.jpg" alt="">
                <h3>
                    <?php echo $event['description']; ?>
                </h3>
                <p>Time</p>
                <div class="timeline">
                    <div class="ball ball-start"></div>
                    <hr class="line">
                    <div class="ball ball-end"></div>
                </div>
                <div class="time">
                    <div class="start-time">
                        <p>
                            <?php echo substr($event['start'], 11); ?>
                        </p>
                    </div>
                    <div class="end-time">
                        <p><?php echo substr($event['end'], 11); ?></p>
                    </div>
                </div>
                <p>Current comment:</p>
                <div class="current_comment">
                    <p>
                        <?php echo $event['comment']; ?>
                    </p>
                </div>
                <a href="Calendar.php" class="option-btn">Back</a>

            </div>

        </div>
    </section>

    <!-- custom js file link  -->
    <script src="../../js/script.js"></script>

</body>

</html>