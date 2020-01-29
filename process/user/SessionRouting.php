<?php
//セッションがないならTOPページにリダイレクトする
if (!isset($_SESSION['user_id']) || !strlen($_SESSION['user_id'])){
    $redirect_url = '/attendance_record/view/user/loginPage.php';
    header(
        'Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url,
        true, 301
    );
    exit();
}
?>