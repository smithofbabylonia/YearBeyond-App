<?php
    session_start();
    if (isset($_SESSION["useruid"])) {
        #echo $_SESSION["useruid"];
    }else {
        header("location: ../../../yearbeyond/login.php");
        exit();
    }
    if (isset($_POST["register"])) {
        header("location: ../../../yearbeyond/modules/learner/register.php");
        exit();
    }
    if (isset($_POST["submit"])) {
        include_once 'functions.inc.php';
        include_once 'dbh.inc.php';
        $noww = explode(',',$_POST["cemiss"]);
        $tuff = explode(',',$_POST["binReg"]);
        $nor = count($noww) - 1;
        $letters = array("A","B","C","D");
        $suku = getDates(0);
        $aa =0;
        while ($aa < $nor) {
            for ($let=0; $let<4; $let++) {
                if($tuff[$let]!=0) continue;
                $xr = $letters[$let].$noww[$aa];
                if($_POST[$xr]==null) continue;
                register($conn,$suku[$let],$noww[$aa], $_POST[$xr]);
            }
            $aa++;
        }
        header("location: ../../../yearbeyond/modules/track.php?registered");
		exit();
    }
