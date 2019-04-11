<?php
$servername = "smd-singtalent.loc";
$dbname = "smd_singtalent";
$username = "myuser";
$password = "mypassword";

$admin_password = '123456';

$singers = array("Ueli", "Lisi", "King Kong", "D\'Artagnan", "Fettsack");

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function ticketExists($hash) {
    global $conn;
    $res = $conn->query("SELECT * FROM hashes WHERE hash='" . $conn->escape_string($hash) . "' AND first IS NULL;");
    return mysqli_num_rows($res) > 0;
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

function saveEmailAddress($address) {
    global $conn;
    $address = $conn->escape_string($address);
    $sql = "INSERT INTO `emails` (`email_address`) VALUES ('$address');";
    $conn->query($sql);
    
    // send confirmation email
    $msg = "Sehr geehrte Zuhörerin, sehr geehrter Zuhörer
    
    Sie haben sich soeben erfolgreich für unseren Newsletter eingetragen.
    Es freut uns sehr, dass sie auch in Zukunft über die Stadtmusik Dietikon informiert bleiben möchten.
    
    Weiterhin viel Spass beim Konzert wünscht ihnen die
    Stadtmusik Dietikon";
    $subject = "Newsletter-Registrierung SMD";
    mail($address, $subject, $msg);
    
}


$home_url = 'http://smd-singtalent.loc:8080/';
?>
