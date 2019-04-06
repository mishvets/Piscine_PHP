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
            "category"=>array(ft_split("cake, To NY")));
        $input_str = serialize($data_p);
        file_put_contents($filename_p, $input_str);
    } 
}

?>