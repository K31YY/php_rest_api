<?php
    include '../function.php';
    $result = array("success"=>0, "error"=>0);
    if(isset($_POST['category_id'])){
        $id = $_POST['category_id'];

        // creating an instance/object of class functions
        $func = new functions();

        // generate DELETE statement
        $delete = $func->delete_record('tblcategories', 'category_id', $id);
        if($delete == true){
            $result['success'] = 1;
            $result["msg_success"] = "Category deleted successfully!";
        }else{
            $result['error'] = 2;
            $result["msg_error"] = "Failed to delete category!";
        }
    }else{
        $result['error'] = 1;
        $result["msg_error"] = "Access Denied!";
    }
    echo json_encode($result);
?>