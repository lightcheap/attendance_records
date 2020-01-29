<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/session.php');

// $_SESSION = array();

if(isset($_COOKIE['PHPSESSID']))
{
    setcookie('PHPSESSID', '', time() - 1800, '/');
}

session_destroy();

$redirect_url = '/attendance_record/view/admin/loginPage.php';
header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);

exit();