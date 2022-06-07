<?php
    include_once 'dbh.inc.php';
    include_once 'functions.inc.php';

    $schlnme = getProfile($conn,$_SESSION["useruid"])[2];
    $learnerInfo = getRegistry($conn,$_SESSION["useruid"]);
    $dates = getDates(1);