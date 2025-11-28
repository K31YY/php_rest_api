<?php
    include 'function.php';

    $fields = array("CategoryName", "cateImage");
    $values = array("Beer", "beer.png");

    // creating an instance/object of class functions
    $func = new functions();
    // calling the insert_data method
    $test = $func->insert_data("tblcategories", $fields, $values);
    echo $test;
?>