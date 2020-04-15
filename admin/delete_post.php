<?php
    include '../libs/Database.php';
    include '../libs/config.php';
    include '../functions/function.php';

    // Creating Database Object

    $db = new Database;

    if(isset($_GET['delete_id'])){
        $del_id = $_GET['delete_id'];
  
        $delete_q = "DELETE FROM posts WHERE id = '$del_id' ";
        $run = $db->delete($delete_q);
    }
?>