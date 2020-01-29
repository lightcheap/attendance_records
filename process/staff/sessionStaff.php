<?php
//スタッフのセッションがないならTOPページにリダイレクトする
if (!isset($_SESSION['staff_id']) || !strlen($_SESSION['staff_id']))
{
    $redirect_url = '/attendance_record/index.php';
    header(
        'Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url,
        true, 301
    );
    exit();
}
?>