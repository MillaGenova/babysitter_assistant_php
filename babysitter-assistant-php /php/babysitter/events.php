<?php
include '../common/config.php';

session_start();

$child_id = $_SESSION['child_id'];

$select_logs = mysqli_query($conn, "SELECT * FROM `calendar` WHERE childId = '$child_id'") or die('query failed');
if (mysqli_num_rows($select_logs) > 0) {
    $data_arr = array();
    $i = 1;
    while ($fetch_log = mysqli_fetch_array($select_logs)) {
        $data_arr[$i]['event_id'] = $fetch_log['eventId'];
        $data_arr[$i]['title'] = $fetch_log['description'];
        $data_arr[$i]['start'] = $fetch_log['start'];
        $data_arr[$i]['end'] = $fetch_log['end'];
        $i++;
    }

    $data = array(
        'status' => true,
        'msg' => 'successfully!',
        'data' => $data_arr
    );
} else {
    $data = array(
        'status' => false,
        'msg' => 'Error!'
    );
}
echo json_encode($data);
?>