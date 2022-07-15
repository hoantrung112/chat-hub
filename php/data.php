<?php
define('MAX_MSG_PREVIEW', 25);
define('MAX_DISPLAY_NAME', 30);


while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM messages 
                WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) 
                ORDER BY msg_id DESC 
                LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No message available";

    // handle long message preview
    $msg = (strlen($result) > MAX_MSG_PREVIEW) ? substr($result, 0, MAX_MSG_PREVIEW) . '...' : $result;
    if (isset($row2['outgoing_msg_id'])) {
        $you = ($outgoing_id == $row2['outgoing_msg_id']) ? '<i class="fa-solid fa-paper-plane mr-2"></i>You: ' : "";
    } else {
        $you = "";
    }
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

    // handle long name
    $display_name = $row['fname'] . " " . $row['lname'];
    $display_name =  (strlen($display_name) > MAX_DISPLAY_NAME)
        ? substr($display_name, 0, MAX_DISPLAY_NAME)
        : $display_name;

    // handle msg's time interval
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = strtotime(date('Y-m-d H:i:s'));
    $created_at = strtotime($row2['timestamp']);
    $interval = $now - $created_at;
    $time = "";
    if ($interval < 60) {
        $time = "Just now";
    } else if ($interval < 3600) {
        $time = round($interval / 60) . " m";
    } else if ($interval < 86400) {
        $time = round($interval / 3600) . " h";
    } else if ($interval < 86400 * 7) {
        $time = round($interval / 86400) . " d";
    } else if ($interval < 86400 * 365) {
        $time = round($interval / 86400 * 30) . " w";
    } else {
        $time = round($interval / 86400 * 30 * 12) . " y";
    }

    $output .=
        '<a href="chat.php?user_id=' . $row['unique_id'] . '">
                    <div class="content">
                    <img class="avatar" src="php/images/' . $row['img'] . '" alt="">
                    <div class="details">
                        <span><b>' . $display_name . '</b></span>
                        <p>' . $you . $msg . ' ' . '<span class="mx-2 dot"></span>' . $time . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}
