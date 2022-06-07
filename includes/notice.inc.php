<?php
    include_once '../includes/functions.inc.php';
    include_once '../includes/dbh.inc.php';

    $result = getTasks($conn);
    $checkd = mysqli_num_rows($result);

	if ($checkd > 0) {
        while ($row= mysqli_fetch_assoc($result)) {
            $date = date_create($row['tasksTime']);
            $d2 = date_format($date,"D j F, H:i");
            echo "<div class='task'><h5 class='highlight'>".$row['tasksName']."</h5><p>".$row['tasksMessage']."</p><p class='highlight'>Due: ".$d2."</p></div>";
        }
    }else {
        echo "<div class='task'><h5>No future events</h5></div>";
    }