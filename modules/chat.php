<?php
    include_once '../header.php';
    if (isset($_SESSION["useruid"])!==true) {
        header("location: ../../yearbeyond/index.php");
        exit();
    }

?>
<input type="hidden" value="Chat" id="pageName">