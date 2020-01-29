<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // 値が入っているか判定。なければエラー出す。（あとで）
    try
    {
        // インスタンス
        $db_Handle = db_connect();
        // SQL発行　プリペアードステートメント
        $sql = 'UPDATE user
                SET user_id=:user_id, user_last_name=:user_last_name, user_first_name=:user_first_name
                WHERE id=:id';
        
        $stmt = $db_Handle->prepare($sql);

        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':user_id', $_POST['user_id'], PDO::PARAM_STR);
        $stmt->bindValue(':user_last_name', $_POST['user_last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':user_first_name', $_POST['user_first_name'], PDO::PARAM_STR);

        $stmt->execute();
        $db_Handle = null;
        unset($_POST['id'], $_POST['user_id'], $_POST['user_last_name'], $_POST['user_first_name']);

        $redirect_url = '/attendance_record/view/admin/userList.php';
        header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        exit();
    }catch(PDOException $e){
        $errors['fault'] = '接続失敗しました。：'. $e->getMessage();
    }
}