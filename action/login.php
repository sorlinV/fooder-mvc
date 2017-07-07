<?php
/**
 * Created by PhpStorm.
 * User: isidoris-simplon
 * Date: 04/07/17
 * Time: 14:42
 */
include_once '../lib/Data.php';
if (!isset($data)) {
    $data = new Data();
}
if (session_status() != 2) {
    session_start();
}
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
if (isset($post['user']) && isset($post['password'])) {
    $post['password'] = hash("sha256", $post['password']);
    if ($data->verifUser($post['user'], $post['password'])) {
        $_SESSION['user'] = $data->getUser($post['user']);
    }
    header ('location: ../index.php');
}
if (isset($post['deco'])) {
    unset($_SESSION['user']);
    header ('location: ../index.php');
}
header('location: ../register.php?error=1');
