<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{

    // 利用者のアカウントの論理削除
    try{
        // インスタンス
        $db_handle = db_connect();

        $sql = 'UPDATE user
                SET enrollment_flag=:enrollment_flag
                WHERE id=:id';
        // １は削除ステータス
        $enrollment_flag = 1;

        $stmt = $db_handle->prepare($sql);

        $stmt->bindValue(':id', $_POST['delete_user'], PDO::PARAM_INT);
        $stmt->bindValue(':enrollment_flag', $enrollment_flag, PDO::PARAM_INT);

        $stmt->execute();
        $db_handle = null;

        unset($enrollment_flag);

        // 利用者一覧にリダイレクト
        $redirect_url = '/attendance_record/view/admin/userList.php';
        header('Location:'.'https://'.$_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        exit();
    }catch(PDOException $e){
        $errors['fault'] = '接続失敗しました。：'. $e->getMessage();
    }
}