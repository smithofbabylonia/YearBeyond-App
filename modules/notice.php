<?php
    include_once '../header.php';

    if (isset($_SESSION["useruid"])) {
        echo "<h2 class='head'>Notice Board</h2>";
    }else {
        header("location: http://localhost/yearbeyond/login.php");
        exit();
    }
?>
<div class="cal-frame">
    <div class="month">
        <ul>
            <li class="prev">&#10094;</li>
            <li class="next">&#10095;</li>
            <li class="month-name">Month</li>
        </ul>
    </div>
    <ul class="weekdays">
        <li>Su</li><li>Mo</li><li>Tu</li><li>We</li><li>Th</li><li>Fr</li><li>Sa</li>
    </ul>
    <ul class="days">
        
    </ul>
</div>
<div class="notiframe">
    <h2>Tasks</h2>
    <?php
        include_once '../includes/notice.inc.php';
    ?>
</div>
<?php
    echo "<input type='hidden' id='pageName' value='Notice'>";
    include_once '../footer.php';