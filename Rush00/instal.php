<?php
//session_start();
function ft_split($string)
{
    $str = trim($string);
    $all = explode(', ', $str);
    $arr = array_filter($all);
    sort($arr);
    return ($arr);
}

function init() {
    $pathname = "./private";
    $filename_u = "./private/user";
    $filename_p = "./private/product";
    $filename_c = "./private/category";
    $filename_o = "./private/order";
    if (!file_exists($filename_u)) {
        mkdir($pathname, 0777, true);
        $data_u[] = array("adm" => "1",
            "name" => "admin",
            "surnm" => "ok",
            "passwd" => hash("sha512", "admin"),
            "tel" => "0777777777",
            "email" => "admin");
        $data_arr = $data_u;
        $input_str = serialize($data_arr);
        file_put_contents($filename_u, $input_str);
    }
    if (!file_exists($filename_p)) {
        $data_p[] = array("id"=>"0000",
            "name"=>"NY cake",
            "price"=>"250",
            "img"=>"https://i.etsystatic.com/10559965/r/il/ce092c/1224603895/il_1588xN.1224603895_hbwl.jpg",
            "category"=>ft_split("cake"));
        $data_p[] = array("id"=>"0001",
            "name"=>"Birthday cupcake",
            "price"=>"45",
            "img"=>"https://i2.wp.com/openciencias.com/wp-content/uploads/2016/08/cupcakeopen.jpg",
            "category"=>ft_split("cupcake"));
        $data_p[] = array("id"=>"0002",
            "name"=>"Birthday cake from cupcake",
            "price"=>"300",
            "img"=>"http://www.cupcakecharlies.com/images/cupcakecake-menu1.jpg",
            "category"=>ft_split("cupcake, cake"));
        $input_str = serialize($data_p);
        file_put_contents($filename_p, $input_str);
    }
    if (!file_exists($filename_c)) {
        $data_c[] = array("name"=>"cake");
        $data_c[] = array("name"=>"cupcake");
        $input_str = serialize($data_c);
        file_put_contents($filename_c, $input_str);
    }
    if (!file_exists($filename_o)) {
        $data_o[] = array( "loggued_on_user"=>"user", "backet-item"=> array("0000", "0001", "0002"));
        $input_str = serialize($data_o);
        file_put_contents($filename_o, $input_str);
    }
}

?>