<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

global $wpdb;

$result = $wpdb -> get_results("SELECT * " )
