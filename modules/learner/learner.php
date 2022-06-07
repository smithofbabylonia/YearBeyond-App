<?php
    include_once '../../header.php';
    include_once '../../includes/dbh.inc.php';
    include_once '../../includes/functions.inc.php';

    if (isset($_SESSION["useruid"])) {
        $found = getName($conn,$_GET["cemis"],1);
        if ($found==null) {
            header("location: ../../../yearbeyond/"); 
        }
        echo "<div id=\"learnerdisplay\"><h2>".$found;
    }else {
        header("location: ../../../login.php");
        exit();
    }
?>
    </h2>
    <hr>
    <div class="paired">
        <h3>Books completed</h3>
        <form action="../../includes/wdg12tf4edqwqq56ygyyi96.inc.php" method="POST" id="books">
            <input type="hidden" name="cemis" <?php echo "value='".$_GET["cemis"]."'"; ?> >
            <input type="hidden" name="listing" id="listing" value="<?php $lib = getBooks($conn,$_GET["cemis"]);if($lib!=="XXX"){echo $lib;}?>">
            <textarea name="areafiftyone" id="areafiftyone" form="books" disabled></textarea><br><br>
            <p>Add book</p>
            <select name="books" id="fiftyonebooks">
                <option value="">----------------------</option>
            </select><br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <script>
            var bookList = [];
            let selector = document.querySelector("#fiftyonebooks");
            let output = document.querySelector("#areafiftyone");
            selector.addEventListener("change", () => {
                if (selector.value==false || bookList.includes(selector.value.substring(0,4))) {    
                }else{
                    bookList.push(selector.value.substring(0,4));
                    document.getElementById("listing").value +=selector.value.substring(0,4)+"+";
                    output.innerHTML+=selector.value.substring(5) + "\n";
                }
            }); 
        </script>
    </div>
    <div class="learnersadd">
        <form action="../../includes/t67y4reeftg454ggyhgfr65.inc.php" method="POST">
            <input type="hidden" name="cemis" <?php echo "value='".$_GET["cemis"]."'"; ?> >
            <div id="numeracy">
                <h3>Numeracy</h3>
                <label>Session no : 
                <select name="dropsession" id="dropped">
                    <option value=""></option>
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>
                </select></label><br><br>
                <label>Marks :
                <input type="number" name="nmark" placeholder="00"></label>
            </div>
            <div id="speaking">
            <h3>Speaking</h3>
                <p>On a scale of 0 to 10, rate this learner's proefficiency in speaking English</p>
                <br><br><label>Score :<input type="number" name="speak" id="" min="0" max="10"></label>
            </div><br>
            <div id="writing">
                <h3>Writing</h3>
                <p>On a scale of 0 to 10, rate this learner's proefficiency in writting English</p>
                <br><br>
                <label>Score :<input type="number" name="write" id="" min="0" max="10"></label>
            </div>
            <div id="comment">
                <h3>Comment</h3>
                <textarea name="areafiftytwo" id="areafiftytwo" placeholder="Write new comment..."></textarea>
            </div>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>
    <div id="stats">
        <h3>Development Distribution</h3>
        <canvas width="250" height="250"></canvas>
		<script>

			const results = <?php echo createChart($conn,$_GET["cemis"]); ?>

			let cx = document.querySelector("canvas").getContext("2d");
			let total = results
			.reduce((sum, {count}) => sum + count, 0);
			// Start at the top
			let currentAngle = -0.5 * Math.PI;
			for (let result of results) {
			let sliceAngle = (result.count / total) * 2 * Math.PI;
                cx.beginPath();
                // center=100,100, radius=100
                // from current angle, clockwise by slice's angle
                cx.arc(125, 125, 125,
                currentAngle, currentAngle + sliceAngle);
                currentAngle += sliceAngle;
                cx.lineTo(125, 125);
                cx.fillStyle = result.color;
                cx.fill();
			}
		</script>
        <div id="labels">
            <label>Reading <img src="../../src/img/blue.png" alt="blue"></label><br>
            <label>Speaking <img src="../../src/img/green.png" alt="green"></label><br>
            <label>Writing <img src="../../src/img/red.png" alt="red"></label><br>
            <label>Numeracy <img src="../../src/img/yellow.png" alt="yellow"></label><br>
            <label>Participation <img src="../../src/img/cyan.png" alt="cyan"></label><br>
        </div>

    </div>
</div>
<input type="hidden" id="pageName" value="Learner">
<?php
    include_once '../../footer.php';