<?php
/**
 * Created by PhpStorm.
 * User: MaxStgs
 * Date: 04.06.2018
 * Time: 0:51
 */

session_start();

include "../model/auth.php";

if(isset($_POST['login']) && isset($_POST['pass'])){

    $User = new User();
    if($User->Get($_POST['login'], $_POST['pass'])) {
        $_SESSION['user'] = $_POST['login'];
        header("Location: ../body_shop/index.php");
        exit;
    }
    else{
        header("Location: ../controller/error.php");
        exit;
    }
}
else{
    header("Location: ../controller/error.php");
    exit;
}

?>