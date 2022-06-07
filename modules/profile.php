<?php
    include_once '../header.php';
    include_once '../includes/functions.inc.php';
    include_once '../includes/dbh.inc.php';
    if (isset($_SESSION["useruid"])) {
        $myname = $_SESSION["username"];
        $proDetails = getProfile($conn,$_SESSION["useruid"]);
        echo "<div class=\"profile\" ><h2 id=\"usern\">".$myname."</h2>";
    }else {
        header("location: ../../yearbeyond/login.php");
        exit();
    }
?>
    <form action="../includes/profile.inc.php" method="POST" enctype="multipart/form-data" id='informed'>
        <div class="imgenbio">
            <?php
            echo "<img src='../src/img/".$proDetails[3]."'  alt='Avatar' ondblclick='showIt()'>";
            ?>
            <div id="upload">
                <input type="file" name="picture" id="picture">
            </div>
            <br><br>
            <h3>Bio</h3>
            <textarea id="bio" name="bio" form='informed'><?php if($proDetails[4]==null){echo "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Qui magnam consequatur quos eaque alias cumque sit amet necessitatibus numquam! Quidem quasi dolor nesciunt. Earum, laborum ratione officiis iste eaque inventore!";}else {echo $proDetails[4];}?>
            </textarea><br><br>
        </div>
        <div class="details">
            <p>Full Name :</p>
            <?php
                echo "<input type='text' name='named' id='named' value='".$myname."'><br><br>";
                echo "<p>Contact No.:</p>";
                echo "<input type='text' name='phone' id='phone' value='".$proDetails[0]."'><br><br>";
                echo "<p>Email address :</p>";
                echo "<input type='email' name='mail' id='mail' value='".$proDetails[1]."'><br><br>";
                echo "<p>Assigned school :</p>";
                echo "<input type='text' name='address' id='address' value='".$proDetails[2]."'><br><br>";
                if (isset($_GET['success'])) {
                    echo "<h3 class='pass'>Information updated!</h3>";
                }
                if (isset($_GET["error"])) {
                    if ($_GET['error']==="unkown") {
                        echo "<h3 class='error'>Something went wrong!";
                    }
                    if ($_GET['error']==="imageup") {
                        echo "<h3 class='error'>Check uploaded file and try again!";
                    }
                    if ($_GET['error']==="name") {
                        echo "<h3 class='error'>Couldn't change name!";
                    }
                    if ($_GET['error']==="mail") {
                        echo "<h3 class='error'>Couldn't change email!";
                    }
                    if ($_GET['error']==="phone") {
                        echo "<h3 class='error'>Couldn't update phone number!";
                    }
                    if ($_GET['error']==="address") {
                        echo "<h3 class='error'>Something is wrong with address!";
                    }
                    if ($_GET['error']==="bio") {
                        echo "<h3 class='error'>Couldn't update bio!";
                    }
                }
            ?>
        </div>
        <input type="submit" name="submit" value="Update">
    </form>
</div>
<input type="hidden" id="pageName" value="Profile">
<?php
    include_once '../footer.php';