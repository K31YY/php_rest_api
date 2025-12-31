<?php
    include 'function.php';

    $fields = array("UserName", "UserPassword");
    $values = array("admin", "123456");

    // creating an instance/object of class functions
    $func = new functions();
    // calling the insert_data method
    $test = $func->update_data("tblusers", $fields, $values, "UserID", 1);
    echo $test;
?>