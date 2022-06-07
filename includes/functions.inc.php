<?php

function emptyInputSignUp($name,$email,$username,$pwd,$rpwd){
	if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($rpwd)){
		return true;
	}
	return false;
}

function emptyInputLogin($name,$pwd){
	if(empty($name) || empty($pwd)){
		return true;
	}
	return false;
}

function invalidUid($username){
        if(!preg_match("/^[a-zA-Z0-9]*$/" , $username)){
                return true;
        }
        return false;
}

function invalidEmail($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                return true;
        }
        return false;
}

function pwdMatch($pwd,$rpwd){
        if($pwd !== $rpwd){
                return true;
        }
        return false;
}

function uidExists($conn,$username,$email){
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfail1");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$username,$email);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}else{
		return false;
	}
	mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
	$sql = "INSERT INTO users (usersName,usersEmail,usersUid,usersPwd) VALUES (?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfail2");
		exit();
	}
	$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

	mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$username,$hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	#  second part for profile
	$sql2 = "INSERT INTO profiles (profilesUser,profilesPic) VALUES (?,?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql2)){
		header("location: ../signup.php?error=stmtfail2");
		exit();
	}
	$defaul = "avatr.png";
	mysqli_stmt_bind_param($stmt, "ss",$username,$defaul);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location: ../signup.php?success");
	exit();
}

function loginUser($conn,$username,$pwd){
	$uidExists = uidExists($conn,$username,$username);

	if ($uidExists===false) {
		header("location: ../login.php?error=wrongid");
		exit();
	}

	$pwdHshd = $uidExists["usersPwd"];
	$checkPwd = password_verify($pwd,$pwdHshd);
	
	if (!$checkPwd) {
		header("location: ../login.php?error=wrongpwd");
		exit();
	}elseif($checkPwd){
		session_start();
		$_SESSION["userid"] = $uidExists["usersId"];
		$_SESSION["useruid"] = $uidExists["usersUid"];
		$_SESSION["username"] = $uidExists["usersName"];
		header("location: ../index.php");
		exit();
	}
}

function getProfile($conn,$user){
	# 0 phone 1 email 2 address 3 avatar 4 bio
	$first = uidExists($conn,$user,$user);
	if ($first===false) {
		header("location: ../modules/profile.php?error=unkown"); # align to right page
		exit();
	}
	$email = $first["usersEmail"];
	$sql = "SELECT * FROM profiles WHERE profilesUser = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s",$user);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	$second = mysqli_fetch_assoc($resultData);
	if ($second===false) {
		header("location: ../modules/profile.php?error=unkown"); # align to right page
		exit();
	}
	$phone = $second["contact"];
	$address = $second["address"];
	$pic = $second["profilesPic"];
	$bio = $second["bio"];
	return array($phone,$email,$address,$pic,$bio);

}

function setName($conn,$user,$var){
	$sql = "UPDATE users SET usersName= ? WHERE usersUid = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=name");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function setEmail($conn,$user,$var){
	$sql = "UPDATE users SET usersEmail= ? WHERE usersUid = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=mail");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function setPhone($conn,$user,$var){
	$sql = "UPDATE profiles SET contact = ? WHERE profilesUser = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=phone");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function setAddress($conn,$user,$var){
	$sql = "UPDATE profiles SET address = ? WHERE profilesUser = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=address");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function setPic($conn,$user,$var){
	$sql = "UPDATE profiles SET profilesPic = ? WHERE profilesUser = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=imageup");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function setBio($conn,$user,$var){
	$sql = "UPDATE profiles SET bio = ? WHERE profilesUser = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/profile.php?error=bio");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$user);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
}

function getLearners($conn,$var){
	$sql = "SELECT * FROM learners WHERE learnersYeboneer = ? ORDER BY learnersName;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	return $resultData;
}

function updateBooks($conn,$learner,$var){
	if (strlen($learner)>125) {
		return false;
	}
	$sql = "UPDATE learners SET learnersBooks = ? WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ss",$var,$learner);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function getBooks($conn,$var){
	$sql = "SELECT learnersBooks FROM learners WHERE learnersCemis= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	$row = mysqli_fetch_row($resultData);
	return $row[0];
}

function getNumeracy($conn,$var){
	$sql = "SELECT learnersNumeracy FROM learners WHERE learnersCemis= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_row($resultData)) {
		return $row[0];
	}
	return "";
}

function getLiteracy($conn,$var){#write
	$sql = "SELECT learnersLiteracy FROM learners WHERE learnersCemis= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_row($resultData)) {
		return $row[0];
	}
	return "";
}

function getSpeech($conn,$var){
	$sql = "SELECT learnersSpeech FROM learners WHERE learnersCemis= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_row($resultData)) {
		return $row[0];
	}
	return "";
}

function getComment($conn,$var){
	$sql = "SELECT learnersComment FROM learners WHERE learnersCemis= ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if ($row = mysqli_fetch_row($resultData)) {
		return $row[0];
	}
	return "";
}

function emptyInputLearn($learnername,$grade,$level,$cemis){
	if (empty($learnername)||empty($grade)||empty($level)||empty($cemis)) {
		return true;
	}
	return false;
}

function notName($name){
	if(!preg_match("/^[a-zA-Z\s]*$/" , $name)){
		return true;
	}
	return false;
}

function notCemis($name){
	if (strlen($name)===13) {
		if (preg_match("/^[a-zA-Z0-9]*$/" , $name)) {
			return false;
		}
	}
	return true;
}

function learnerExists($conn,$name){
	$sql = "SELECT * FROM learners WHERE learnersCemis = ? ;";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../track.php?error=stmtfail");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s",$name);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		return true;
	}else{
		return false;
	}
	mysqli_stmt_close($stmt); 
}

function insertLearner($conn,$cemis,$yebo,$learnername,$grade,$level){
	$sql = "INSERT INTO learners (learnersCemis,learnersName,learnersYeboneer,learnersBooks,learnersGrade,learnersLevel) VALUES (?,?,?,?,?,?);";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../track.php?error=stmtfail");
		exit();
	}
	$books = "XXX";
	mysqli_stmt_bind_param($stmt, "ssssss",$cemis,$learnername,$yebo,$books,$grade,$level);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	#header("location: ../track.php?success");
	#exit();
}

function getName($conn,$name,$opt){
	$sql = "SELECT * FROM learners WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../signup.php?error=stmtfail1");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s",$name);
	mysqli_stmt_execute($stmt);

	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		if ($row!==false) {
			if ($opt==1) {
				return $row["learnersName"];
			}
			if ($opt==2) {
				return $row["learnersBooks"];
			}
			return $row["learnersMarks"];
			mysqli_stmt_close($stmt);
		}
		return false;
		mysqli_stmt_close($stmt);
	}
}

function updateNumeracy($conn,$learner, $sessionNo, $numer){
	$oldv = getNumeracy($conn,$learner);
	if ($oldv==null) {
		$oldv = $sessionNo."+".$numer;
	}else {
		$oldv .= "-".$sessionNo."+".$numer;
	}
	$sql = "UPDATE learners SET learnersNumeracy = ? WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ss",$oldv,$learner);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function updateSpeech($conn,$learner, $numer){
	$oldv = getSpeech($conn,$learner);
	if ($oldv==null) {
		$oldv = $numer;
	}else {
		$oldv .= "+".$numer;
	}
	$sql = "UPDATE learners SET learnersSpeech = ? WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ss",$oldv,$learner);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function updateWrite($conn,$learner, $numer){
	$oldv = getLiteracy($conn,$learner);
	if ($oldv==null) {
		$oldv = $numer;
	}else {
		$oldv .= "+".$numer;
	}
	$sql = "UPDATE learners SET learnersLiteracy = ? WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ss",$oldv,$learner);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function updateComment($conn,$learner, $numer){
	$oldv = getComment($conn,$learner);
	$sql = "UPDATE learners SET learnersComment = ? WHERE learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		return false;
	}
	mysqli_stmt_bind_param($stmt, "ss",$numer,$learner);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	return true;
}

function createChart($conn,$learner){
	$numVar = getNumeracy($conn,$learner);
	$litVar = getLiteracy($conn,$learner);
	$spkVar = getSpeech($conn,$learner);
	$libVar = getBooks($conn,$learner);
	$attVar = 0;
	if ($numVar==null) {
		$numVar = 5; $attVar++;
	}else {
		$aa = explode("-",$numVar);
		$numVar =0;
		foreach ($aa as $varrd) {
			$numVar+= (int)end(explode("+",$varrd));
			$attVar++;
		}
	}
	if ($litVar==null) {
		$litVar = 5; $attVar++;
	}else {
		$aa = explode("+",$litVar);
		$litVar = 0;
		foreach ($aa as $varrd){
			$litVar += (int)$varrd;
			$attVar++;
		}
	}
	if ($spkVar==null) { # spk
		$spkVar = 5; $attVar++;
	}else {
		$aa = explode("+",$spkVar);
		$spkVar = 0;
		foreach ($aa as $varrd){
			$spkVar += (int)$varrd;
			$attVar++;
		}
	}
	if ($libVar==null) { #lib
		$libVar = 5; $attVar++;
	}else {
		$aa = explode("+",$libVar);
		$libVar = count($aa) -1;
		$attVar += count($aa) -1;
	}
	$ress = "[
	{name: 'Reading',count: ".$libVar.", color: 'blue'},
	{name: 'Speaking',count: ".$spkVar.", color: 'green'},
	{name: 'Writing',count: ".$litVar.", color: 'red'},
	{name: 'Numeracy',count: ".$numVar.", color: 'yellow'},
	{name: 'Participation',count: ".$attVar.", color: 'cyan'}] ;";
	return $ress;
}

function getTasks($conn){
	$sql = "SELECT * FROM tasks";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../../modules/track.php?error=unkown");
		exit();
	}
	//mysqli_stmt_bind_param($stmt, 's' ,$var);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	return $resultData;
}

function getRegistry($conn,$user){
	$sql = "SELECT learners.learnersCemis, learners.learnersName, learners.learnersGrade, register.regVal 
	FROM learners LEFT JOIN register ON learners.learnersCemis = register.learnersCemis 
	WHERE learners.learnersYeboneer = ? AND date(register.regDate) > date(register.regWeek) ORDER BY learners.learnersName";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../../modules/track.php?error=unkown");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$user);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	$tmpName = "";
	$mray = array();
	$numz = -1;
	while ($row = mysqli_fetch_assoc($resultData)) {
		if($tmpName !== $row["learnersCemis"]){
			$numz++;
			$mray[$numz] = array();
			#create new ray here
			$nm = explode(" ", $row["learnersName"]);
			#echo "The new ink!";
			$tmpName = $row["learnersCemis"];
			$mray[$numz][0] = $tmpName;
			$mray[$numz][] = $nm[0];
			$mray[$numz][] = end($nm);
			$mray[$numz][] = $row["learnersGrade"];
			$mray[$numz][] = "";
			$mray[$numz][] = "";
		}
		$mray[$numz][] = $row["regVal"];
	}
	return $mray;
}

function indivReg($conn,$lrnr){
	$sql = "SELECT regVal FROM register WHERE learnersCemis = ? AND date(regDate)>date(regWeek) ORDER BY regDate";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../../modules/track.php?error=learnernf");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 's' ,$lrnr);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	$ray = array();
	while ($row = mysqli_fetch_assoc($resultData)) {
		$ray[] = $row["regVal"];
	}
	mysqli_stmt_close($stmt);
	return $ray;
}

function updateWeek($conn){
	$sunday = date('Y-m-d', strtotime("last Sunday"));
	$sql = "UPDATE register SET regWeek = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../modules/track.php?error=week");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s",$sunday);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	exit();
}

function register($conn,$day,$lrnr,$val){
	$sql = "SELECT * FROM register WHERE regDate= date(?) AND learnersCemis = ?";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location: ../../modules/track.php?error=learnernf");
		exit();
	}
	mysqli_stmt_bind_param($stmt, 'ss' ,$day,$lrnr);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);
	if($row = mysqli_fetch_assoc($resultData)){
		return;
	}
	mysqli_stmt_close($stmt);
	$sql2 = "INSERT INTO register (learnersCemis, regDate, regWeek, regVal) VALUES (?,?,?,?)";
	$tmnt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($tmnt,$sql2)){
		header("location: ../../modules/track.php?error=registernf");
		exit();
	}
	$d2 = date('Y-m-d',strtotime("last Sunday"));
	mysqli_stmt_bind_param($tmnt, 'ssss', $lrnr ,$day,$d2,$val);
	mysqli_stmt_execute($tmnt);
	mysqli_stmt_close($tmnt);
}

function getDates($intV){
	$arar = array();
	$ddf = date('Y-m-d',strtotime("last Sunday"));
	for ($i=1; $i < 5; $i++) {
		if ($intV===1) {
			$arar[$i-1]= date('d/m', strtotime($ddf . ' +'.$i.' day'));
		}else {
			$arar[$i-1]= date('Y-m-d', strtotime($ddf . ' +'.$i.' day'));
		}
	}
	return $arar;
}