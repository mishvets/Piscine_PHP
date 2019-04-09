<?php
function item_id_search($backet_id) {
    $filename = "./private/product";
    $product_arr = unserialize(file_get_contents($filename));
    foreach ($product_arr as $index=>$value) {
        if ($backet_id === $value['id']) {
            $data_p[] = array("id"=>$value['id'],
                "name"=>$value['name'],
                "price"=>$value['price'],
                "img"=>$value['img'],
                "category"=>$value['category']);
            break;
        }
    }
    return ($data_p);
}

function item_search($arr_id) {
    $filename = "./private/product";
    $product_arr = unserialize(file_get_contents($filename));
    foreach ($arr_id as $v) {
        foreach ($product_arr as $index => $value) {
            if ($v === $value['id']) {
                $data_p[] = array("id" => $value['id'],
                    "name" => $value['name'],
                    "price" => $value['price'],
                    "img" => $value['img'],
                    "category" => $value['category']);
                break;
            }
        }
    }
    return ($data_p);
}

function item_category_search($category) {
    $filename = "./private/product";
    $product_arr = unserialize(file_get_contents($filename));
    foreach ($product_arr as $index=>$value) {
        if (array_search($category, $value['category']) !== FALSE) {
            $data_p[] = array("id"=>$value['id'],
                "name"=>$value['name'],
                "price"=>$value['price'],
                "img"=>$value['img'],
                "category"=>$value['category']);
        }
    }
    return ($data_p);
}
function category_search($name)
{

    $filename = "./private/category";
    $category_arr = unserialize(file_get_contents($filename));
    if (!$name){
        return ($category_arr);
    }
    else {
        $val[] = array("name"=>$name);
//        var_dump($val);
        return ($val);
    }
}

function user_search($category) {
    $filename = "./private/user";
    $product_arr = unserialize(file_get_contents($filename));
    foreach ($product_arr as $index=>$value) {
        if (array_search($category, $value['email']) !== FALSE) {
            $data_p[] = array("name"=>$value['name'],
                "surnm"=>$value['surnm'],
                "passwd" => hash("sha512", $value['passwd']),
                "tel" => $value['tel'],
                "email" => $value['email']);
        }
    }
    return ($data_p);
}
?>
