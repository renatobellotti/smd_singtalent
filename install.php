<?php
    require('helpers.php');
    
    $sql = "CREATE TABLE `smd_singtalent`.`hashes` ( `hash` VARCHAR(4) NOT NULL , `first` INT NOT NULL , `second` INT NOT NULL , `third` INT NOT NULL )";
    $conn->query($sql);
?>
