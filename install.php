<?php
    require('helpers.php');
    
    $sql = "CREATE TABLE `smd_singtalent`.`hashes` ( `hash` VARCHAR(10) NOT NULL , `first` INT NULL , `second` INT NULL , `third` INT NULL, PRIMARY KEY (`hash`) )";
    $conn->query($sql);
?>
