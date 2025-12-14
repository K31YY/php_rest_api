<?php
    include '../function.php';

    // creating an instance/object of class functions
    $func = new functions();
    // calling show_data method
    $data = $func->show_data('tblcategories');
    echo json_encode($data);
?>