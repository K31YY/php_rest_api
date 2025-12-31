<?php
    include '../function.php';
    $result = array("success"=>0, "error"=>0);
    if(isset($_POST['category_id'])){
        $id = $_POST['category_id'];
        $image_name = $_POST['catImageName'];

        // creating an instance/object of class functions
        $func = new functions();

        // generate DELETE statement
        $delete = $func->delete_record('tblcategories', 'category_id', $id);
        if($delete == true){
            if($image_name != 'cate_default.png'){
                unlink("images/".$image_name);
            }
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