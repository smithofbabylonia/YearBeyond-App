<?php
    session_start();
    if (isset($_SESSION["useruid"])) {
        #echo $_SESSION["useruid"];
    }else {
        header("location: ../../../yearbeyond/login.php");
        exit();
    }
    include_once '../../../yearbeyond/includes/register.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Print register</title>
        <link rel="stylesheet" type="text/css" media="print" href="../../../yearbeyond/src/print.css"/>
    </head>
    <body onload="window.print()">
        <table>
            <thead>
                <tr>
                    <td id='pic' colspan=2><img src='../../../yearbeyond/src/img/banner.png' alt='YearBeyond'></td><td class='blueb' colspan=8><h2>Daily Attendance Register</h2></td>
                </tr>
            </thead>
            <tbody>
                <tr><td id='green'  colspan=10></td></tr>
                <tr>
                    <td class='blue'>Tutor Name: </td><td colspan=2 class='detail'><?php echo $_SESSION["username"];?></td><td class='blue'>School Name: </td><td colspan=6 class='detail'><?php echo $schlnme;?></td>
                </tr>
                <tr class='blueb'>
                    <td colspan=4>Learner information</td><td colspan=2>Dropout</td><td colspan=4>Dates (Mon-Thurs)</td>
                </tr>
                <tr class='blue'>
                    <td>CEMIS</td><td>Name</td><td>Surname</td><td>Grade/Class</td><td>Date</td><td>Reason</td><td class='dates'><?php echo $dates[0];?></td><td class='dates'><?php echo $dates[1];?></td><td class='dates'><?php echo $dates[2];?></td><td class='dates'><?php echo $dates[3];?></td>
                </tr>
                <?php
                    for ($i=0; $i <20 ; $i++) { 
                        echo "<tr class='data'>";
                        for ($j=0; $j <10 ; $j++) { 
                            echo "<td>".$learnerInfo[$i][$j]."</td>";
                        }
                        echo "</tr>";
                    }
                ?>
                <tr><td colspan=10 id='bottom' class='blue'>1=Attended 0=Absent x=Not applicable</td></tr>
            </tbody>
        </table>
        <?php
            if(count($learnerInfo)>20){
                echo "<div></div><br>";
                echo "<table>
                <thead>
                    <tr>
                        <td id='pic' colspan=2><img src='../../../yearbeyond/src/img/banner.png' alt='YearBeyond'></td><td class='blueb' colspan=8><h2>Daily Attendance Register</h2></td>
                    </tr>
                </thead>
                <tbody>
                    <tr><td id='green'  colspan=10></td></tr>
                    <tr>
                        <td class='blue'>Tutor Name: </td><td colspan=2 class='detail'>".$_SESSION["username"]."</td><td class='blue'>School Name: </td><td colspan=6 class='detail'>$schlnme</td>
                    </tr>
                    <tr class='blueb'>
                        <td colspan=4>Learner information</td><td colspan=2>Dropout</td><td colspan=4>Dates (Mon-Thurs)</td>
                    </tr>
                    <tr class='blue'>
                        <td>CEMIS</td><td>Name</td><td>Surname</td><td>Grade/Class</td><td>Date</td><td>Reason</td><td class='dates'>$dates[0]</td><td class='dates'>$dates[1]</td><td class='dates'>$dates[2]</td><td class='dates'>$dates[3]</td>
                    </tr>";
                for ($i=0; $i <20 ; $i++) { 
                    echo "<tr class='data'>";
                    for ($j=0; $j <10 ; $j++) { 
                        echo "<td>".$learnerInfo[$i+20][$j]."</td>";
                    }
                    echo "</tr>";
                }
                echo "<tr><td colspan=10 id='bottom' class='blue'>1=Attended 0=Absent x=Not applicable</td></tr>
                </tbody>
            </table>";
            }
        ?>
    </body>
</html>
