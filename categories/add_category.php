<?php
    include '../function.php';
    $respone = array("success"=>0, "error"=>0);
    if(isset($_POST['category_name_new'])){
        $name = $_POST['category_name_new'];
        $desc = $_POST['desc_new'];

        if(!empty($_FILES['image_new']['name'])){
            $image = $_FILES['image_new']['name'];
            $image_name = basename($image);
            $path = "images/" . $image_name;
            if(move_uploaded_file($_FILES['image_new']['tmp_name'], $path)){
                $fields = array("category_name","description","image");
                $values = array($name, $desc, $image_name);       
            }else{
                $respone['error'] = 2;
                $respone["msg_error"] = "Image upload failed!";
                // echo json_encode($respone);
            }
    }else{
        $fields = array("category_name","description");
        $values = array($name, $desc);
    }

    // creating an instance/object of class functions
    $func = new functions();
    $insert = $func->insert_data('tblcategories', $fields, $values);
    if($insert == true){
        $respone['success'] = 1;
    $respone["msg_success"] = "Category added successfully!";
    }else{
        $respone['error'] = 3;
        $respone["msg_error"] = "Failed to add category!";
    }

    }else{
        $respone['error'] = 1;
        $respone["msg_error"] = "Access Denied!";
    }
    echo json_encode($respone);
?>