<?php
session_start();
if (isset($_SESSION["useruid"])) {
    if (isset($_POST['submit'])) {
        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';
        $inform = getProfile($conn,$_SESSION["useruid"]);
        $fName = $_FILES['picture']['name'];
        $fTmp = $_FILES['picture']['tmp_name'];
        $fSize = $_FILES['picture']['size'];
        $fErr = $_FILES['picture']['error'];
        $string = explode('.', $fName);
        $fExt = strtolower(end($string));
        $allowed = array('jpeg','jpg','png','tiff');
        $pName = $_POST['named'];
        $pMail = $_POST['mail'];
        $pPhone = $_POST['phone'];
        $pAddress = $_POST['address'];
        $truth = false;
        $pBio = $_POST['bio']; #not working :(

    
        # upload image
        if (!($fName==null)){
            if (in_array($fExt,$allowed)) { #  avatar upload
                if ($fErr === 0) {
                    if ($fSize < 5000000) {
                        $newName = uniqid('',true).".".$fExt;
                        $destination = "../src/img/avatar/".$newName;
                        move_uploaded_file($fTmp,$destination);
                        if ($inform[3]!=="avatr.png") {
                            $path = "../src/img/".$inform[3];
                            if (!unlink($path)) {
                                header("Location: ../modules/profile.php?error=imageup");
                                exit();
                            }
                        }
                        $nameVar = "avatar/".$newName;
                        setPic($conn,$_SESSION['useruid'],$nameVar);
                        $truth =true;
                    }else {
                        header("Location: ../modules/profile.php?error=imageup");
                        exit();
                    }
                }else {
                    header("Location: ../modules/profile.php?error=imageup");
                    exit();
                }
            }else {
                header("Location: ../modules/profile.php?error=imageup");
                exit();
            }
        }
        # set name
        if ($pName!==$_SESSION['username']) {
            setName($conn,$_SESSION['useruid'],$pName);
            $truth =true;
        }
        # set email
        if ($pMail!==$inform[1]) {
            setEmail($conn,$_SESSION['useruid'],$pMail);
            $truth =true;
        }
        # set phone
        if ($pPhone!==$inform[0]) {
            setPhone($conn,$_SESSION['useruid'],$pPhone);
            $truth =true;
        }
        # set address
        if ($pAddress!==$inform[2]) {
            setAddress($conn,$_SESSION['useruid'],$pAddress);
            $truth =true;
        }
       # set bio
        if ($pBio!==$inform[2]) {
            setBio($conn,$_SESSION['useruid'],$pBio);
            $truth =true;
        }
        if ($truth) {
            header("Location: ../modules/profile.php?success");
            exit();
        }
        header("Location: ../modules/profile.php");
        exit();
        
    }
}