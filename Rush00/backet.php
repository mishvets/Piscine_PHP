<?php
session_start();//???
function item_id_search($backet_id) {
    $filename = "./private/product";
    $product_arr = unserialize(file_get_contents($filename));
    foreach ($product_arr as $index=>$value) {
        if ($backet_id === $value['id']) {
            $data_p[] = array("id"=>"0",
                "name"=>$value['name'],
                "price"=>$value['price'],
                "img"=>$value['img'],
                "category"=>$value['categoty']);
            break;
        }
    }
    return ($data_p)
}

if ($_POST['new-item'] === "OK") {
        $_SESSION['backet-item'][] = $_POST["id"];
}

?>