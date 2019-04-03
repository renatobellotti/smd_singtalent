<?php
$servername = "smd-singtalent.loc";
$dbname = "smd_singtalent";
$username = "myuser";
$password = "mypassword";

$admin_password = '123456';

$singers = array("KandidatinIn 0", "KandidatIn 1", "KandidatIn 2", "KandidatIn 3", "KandidatIn 4");

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function ticketExists($hash) {
    global $conn;
    $res = $conn->query("SELECT * FROM hashes WHERE hash='" . $conn->escape_string($hash) . "' AND first IS NULL;");
    return mysqli_num_rows($res) != 0;
}

function saveVote($first, $second, $third, $hash) {
    global $conn;
    $first = $conn->escape_string($first);
    $second = $conn->escape_string($second);
    $third = $conn->escape_string($third);
    $hash = $conn->escape_string($hash);
    $sql = "UPDATE hashes SET first='$first', second='$second', third='$third' WHERE hash='$hash';";
    
    return $conn->query($sql);
}

function correctAdminPassword($password) {
    global $admin_password;
    return ($password == $admin_password);
}

$home_url = 'smd-singtalent.loc:8080/smd/';
?>
