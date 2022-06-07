<?php
# details and comment
session_start();
if (isset($_SESSION['useruid'])) {
    if (isset($_POST['submit'])) {

        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';

        $sessionNo = $_POST['dropsession'];
        $numer = $_POST['nmark'];
        $speak = $_POST['speak'];
        $write = $_POST['write'];
        $comment = $_POST['areafiftytwo'];
        $learner = $_POST['cemis'];

        $result = "location: ../modules/learner/learner.php?cemis=". $learner;
        
        if ($sessionNo!=null and $numer!=null) {
            updateNumeracy($conn,$learner, $sessionNo, $numer);
            $result .= "&numeracy=";
        }
        if ($speak!=null) {
            updateSpeech($conn,$learner, $speak);
            $result .= "&speak=";
        }
        if ($write!=null) {
            updateWrite($conn,$learner, $write);
            $result .= "&write=";
        }
        if ($comment!=null) {
            updateComment($conn,$learner, $comment);
            $result .= "&commment=";
        }
        header($result);
		exit();
    }

}