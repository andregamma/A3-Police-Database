<?php
//error_reporting(E_ALL);
ini_set('display_errors',0);
ini_set('display_startup_errors',0);
$dbopts = parse_url(getenv('DATABASE_URL'));
define('HOST', $dbopts["host"]);
define('USER', $dbopts["user"]);
define('PASS', $dbopts["pass"]);
define('DB', ltrim($dbopts["path"],'/'));

function genPDO($DB = DB, $user = USER, $pass = PASS, $host = HOST) {
	$pdo = new PDO("mysql:host=".$host.";dbname=".$DB, $user, $pass);
	$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	return $pdo;
}

$pdo = genPDO();
?>
