<?php
$pathname = "./private";
$filename = "./private/passwd";
if ($_POST['submit'] === "OK") {
    if (!$_POST['login'] || !$_POST['passwd']) {
        echo "ERROR\n";
    }
    $data[0] = array("login"=>$_POST['login'], "passwd"=>hash("sha256", $_POST['passwd']));
    if (!file_exists($filename)) {
        mkdir($pathname, 0777, true);
        $input_str = serialize($data);
        file_put_contents($filename, $input_str, FILE_APPEND);
        echo("OK\nCreate new!");//
    }
    else {
        $err = 0;
        $passwd_arr = unserialize(file_get_contents($filename));
        print_r($passwd_arr);//
        echo "<br />";//
        foreach ($passwd_arr as $value) {
            if ($data[0]['login'] === $value['login']) {
                $err = 1;
                echo("ERROR\n Login have been created!");
                break;
            }
        }
        if ($err) {
            echo("ERROR\n Login have been created!");
        }
        else {
            echo(" NO ERROR<br />");
            $passwd_arr[] = $data[0];
            print_r($input_str);
            $input_str = serialize($passwd_arr);
            echo("<br />");
            print_r($input_str);
            file_put_contents($filename, $input_str, FILE_APPEND);
            print_r($passwd_arr);
            echo ("OK\nCreate!");//
        }
//        file_put_contents($filename, );
    }
}
?>
