<?php
require_once('../../db/dbhelper.php');

if (!empty($_GET)) {
    if (isset($_GET['id'])) {
        $action = $_GET['id'];
        $id = $_GET['id'];
        // switch ($action) {
        //     case 'delete':
        //         if (isset($_GET['id'])) {
        //             $id = $_GET['id'];
        var_dump($id);
        $sql = "delete from product where id = '$id'";
        execute($sql);
        header('location: index.php');
        // }
        // break;
    }
}
