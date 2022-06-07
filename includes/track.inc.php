<?php
include_once '../includes/dbh.inc.php';
include_once '../includes/functions.inc.php';

$result = getLearners($conn,$yebo);
$checkd = mysqli_num_rows($result);

if ($checkd > 0) {
    echo "<table class=\"tableax\"><thead><tr><th>No.</th><th>Learners</th><th>Grade</th><th>Level</th><th class='regis'>Mon</th><th class='regis'>Tue</th><th class='regis'>Wed</th><th class='regis'>Thu</th></tr></thead><tbody>";
    $count =1;
    $cemiss ="";
    $binReg="";
    $bin = array(1,1,1,1);
    $letters = array("A","B","C","D");
    while ($row= mysqli_fetch_assoc($result)) {
        $made = indivReg($conn,$row['learnersCemis']);#array("X","1","X",""); #get learners weekly values
        $madeIndex=0;
        $print = "<tr><td>".$count."</td><td><a href=\"learner/learner.php?cemis=".$row['learnersCemis']."\" a>".$row['learnersName']."</td><td>".$row['learnersGrade']."</td><td>".$row['learnersLevel']."</td>";
        for ($l=0; $l<4; $l++) {
            if($made[$madeIndex]=="X"){
                $print.= "<td class='regis'><select name='".$letters[$l].$row['learnersCemis']."'><option></option><option value='X' selected>X</option><option value='1'>1</option><option value='0'>0</option></select></td>";
            }elseif($made[$madeIndex]=="0"){
                $print.= "<td class='regis'><select name='".$letters[$l].$row['learnersCemis']."'><option></option><option value='X'>X</option><option value='1'>1</option><option value='0' selected>0</option></select></td>";
            }elseif($made[$madeIndex]=="1"){
                $print.= "<td class='regis'><select name='".$letters[$l].$row['learnersCemis']."'><option></option><option value='X'>X</option><option value='1' selected>1</option><option value='0'>0</option></select></td>";
            }else {
                $bin[$l]=0;
                $print.= "<td class='regis'><select name='".$letters[$l].$row['learnersCemis']."'><option></option><option value='X'>X</option><option value='1'>1</option><option value='0'>0</option></select></td>";
            }
            $madeIndex++;
        }
        $print.= "</tr>";
        echo $print;
        $count++;
        $cemiss.=$row['learnersCemis'].",";
    }
    $binReg = implode(",",$bin);
    echo "</tbody></table>";
    echo "<input type='hidden' name='cemiss' value='".$cemiss."'>";
    echo "<input type='hidden' name='binReg' value='".$binReg."'>";
}else {
    echo "<h3>No learners to show<h3>";
}