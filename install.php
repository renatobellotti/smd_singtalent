<?php
    require('helpers.php');
    
    $sql = "CREATE TABLE `$dbname`.`hashes` ( `hash` VARCHAR(10) NOT NULL , `first` INT NULL , `second` INT NULL , `third` INT NULL, PRIMARY KEY (`hash`) )";
    $conn->query($sql);
    $sql = "CREATE TABLE `$dbname`.`emails` ( `email_address` VARCHAR(50) NOT NULL , PRIMARY KEY (`email_address`) );";
    $conn->query($sql);
?>
