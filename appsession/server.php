<?php

session_start();

if(isset($_GET['logout'])) {
	session_destroy();
	die("Logout !");
}

//Credencial da Aplicação
$_SESSION['token'] = md5("1234567890");

echo "\n[Wait] Server App is Run...\n\n";

//Para App
if(!isset($_GET['system'])) {
	if($argc < 2) {
		echo("[Error] Missing Parameters...\n");
		echo("Use: php server.php \"content to database\"\n");
		die("Abort Proccess!\n\n");
	}

	$scriptname  = trim($argv[0]);
	$datacontent = trim($argv[1]);

//Para Sistema
} else {
	authSys("Devel", "123456"); //Login
	$datacontent = $_GET['datacontent'];
}

$session = (!isset($_SESSION['ctrl']['user'])) ? authApp("Devel", "123456") : $_SESSION['ctrl']['user'];

//Session que deve existir para todos os casos App ou Sistema
if($_SESSION['ctrl']['user'] != "") {
	$get = file_get_contents("db.txt");
	file_put_contents("db.txt", $get."\r\n".str_replace("_", " ", $datacontent));
} else {
	session_destroy();
	die("[Error]: Session not found !");
}

//App ativo ?
if(isset($_SESSION['ctrl']['app'])) {
	unset($_SESSION['ctrl']['user']);
	unset($_SESSION['ctrl']['num']);
	unset($_SESSION['ctrl']['app']);
	session_destroy();

	if(isset($_SESSION['ctrl']['user']) || isset($_SESSION['ctrl']['num']) || isset($_SESSION['ctrl']['app'])) {
		session_destroy();
		die("[Warning]: Session Not Unset !");
	}
}

function authSys($user, $pass) {

	if(!isset($_SESSION['ctrl']['token'])) { //Verifica se existe uma credencial
		//Base de dados fake
		$dbuser  = "Devel";
		$dbpass  = "123456";

		if(md5($user.$pass) == md5($dbuser.$dbpass)) {
			$_SESSION['ctrl']['user'] = md5($user.$pass);
			$_SESSION['ctrl']['num' ] = "123";
			return true;
		}
	}

	die("[Error] Access Denied !");
}

function authApp($user, $pass) {

	if(!isset($_SESSION['ctrl']['token'])) { //Verifica se existe uma credencial
		//Base de dados fake
		$dbuser  = "Devel";
		$dbpass  = "123456";

		if(md5($user.$pass) == md5($dbuser.$dbpass)) {
			$_SESSION['ctrl']['user'] = md5($user.$pass);
			$_SESSION['ctrl']['num' ] = "123";
			$_SESSION['ctrl']['app' ] = "active";
			return true;
		}
	}

	die("[Error] Access Denied !");
}

exit;

?>

