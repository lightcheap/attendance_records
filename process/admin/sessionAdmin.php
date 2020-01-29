<?php
//セッションがないならTOPページにリダイレクトする
if (!isset($_SESSION['admin_id']) || !strlen($_SESSION['admin_id']))
{
    $redirect_url = '/attendance_record/index.php';
    header(
        'Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url,
        true, 301
    );
    exit();
}
?>