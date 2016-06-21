<?php
$servername = "localhost";
$username = "honeypot";
$password = "Dan230793";
$database = "honeypot";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

function getcount($sql) {
	global $conn;
	$results = mysqli_query($conn,$sql);
	while ($row = mysqli_fetch_array($results)) {
		return $row[0];
	}
}

$attack_types_map = array(
	0 => array( 'name'=>'None', 0=> 'none'),
	1 => array(
		'name'=>'Sql Injection',
		1 => 'Tautology',
		2 => 'Illegal/Logically incorrect query',
		3 => 'Union query',
		4 => 'Piggy backed query',
		5 => 'Stored procedure',
		6 => 'Alternate encoding',
	),
	2 => array(
		'name'=>'Password Guessing',
		1 => 'Username',
		2 => 'Password',
		3 => 'USer and Pass',
		
	),
	3 => array(
		'name'=>'Cookie Attack',
		1 => 'Cookie changed',
		2 => 'Cookie changed',
	),
	4 => array(
		'name'=>'XSS',
		0 => 'Taunt',
		1 => 'Tautology',
		2 => "Command",
		3 => 'Redirect attempt',
	),
	5 => array(
		'name'=>'Buffer Overflow',
		1 => 'GET overflow',
	),
	6 => array(
		'name'=>'Canonicalization',
		1 => 'Canonicalization',
		2 => 'Canonicalization',
	),
	7 => array(
		'name'=>'Command execution',
		1 => 'Command execution',
		2 => 'Command execution',
	),
	8 => array(
		'name'=>'Brute force',
		1 => 'Possible',
		2 => 'Certain',
	),
);