<?php
    include '../function.php';
    $result = array("success"=>0, "error"=>0);
    if(isset($_POST['id_update']) && isset($_POST['name_update'])){
        $id  = $_POST['id_update'];
        $name = $_POST['name_update'];
        $desc = $_POST['desc_update'];

        // creating an instance/object of class functions
        $func = new functions();
        
        if(!empty($_FILES['image']['name'])){
            $image = $_FILES['image']['name'];
            $image_name = basename($image);
            $path = "images/".$image_name;
            $row = $func->show_data_byId('tblcategories', 'category_id', $id);
            $old_image = $row['image'];

            if(move_uploaded_file($_FILES['image']['tmp_name'], $path)){
                $fields = array("category_name", "description", "image");
                $values = array($name, $desc, $image_name);
                $update = $func->update_data('tblcategories', $fields, $values, 'category_id', $id);
                if($update == true){
                    if($old_image != 'cate_default.png' && file_exists("images/".$old_image)){
                        unlink("images/".$old_image);
                    }
                    $result['success'] = 1;
                    $result["msg_success"] = "Category updated successfully!";
                }else{
                    $result['error'] = 3;
                    $result["msg_error"] = "Failed to update category!";
                }
            }else{
                $result['error'] = 2;
                $result["msg_error"] = "Failed to upload image!";
            }
        }else{
            $fields = array("category_name", "description");
                $values = array($name, $desc, $image_name);
                $update = $func->update_data('tblcategories', $fields, $values, 'category_id', $id);
                if($update == true){
                    $result['success'] = 1;
                    $result["msg_success"] = "Category updated successfully!";
                }else{
                    $result['error'] = 3;
                    $result["msg_error"] = "Failed to update category!";
                }
        }
    }else{
        $result['error'] = 1;
        $result["msg_error"] = "Access Denied!";
    }
    echo json_encode($result);
?>