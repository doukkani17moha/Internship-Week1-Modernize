<?php 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/config/db.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/models/admin.php';
    include $_SERVER['DOCUMENT_ROOT'] . '/admin/admin/controllers/admincontr.php';


    $login = new logincontr($username, $password);
    $login->loginadmin();

    header("location: login.php?error=none");
    exit();
}




