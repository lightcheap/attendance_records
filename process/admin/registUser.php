<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーションやる。あとで

    $user_id = null;
    if (!isset($_POST['user_id']) || !strlen($_POST['user_id'])){
        $errors['user_id'] = 'ユーザーIDが入力されていません。';
    }else{
        $user_id = $_POST['user_id'];
    }

    $user_last_name = null;
    if (!isset($_POST['user_last_name']) || !strlen($_POST['user_last_name'])){
        $errors['user_last_name'] = '利用者の姓が入力されていません。';
    }else{
        $user_last_name = $_POST['user_last_name'];
    }

    $user_first_name = null;
    if (!isset($_POST['user_first_name']) || !strlen($_POST['user_first_name'])){
        $errors['user_first_name'] = '利用者の名が入力されていません。';
    }else{
        $user_first_name = $_POST['user_first_name'];
    }

    if (count($errors) === 0){
        try{
            // インスタンス
            $db_handle = db_connect();

            // sql発行　プリペアードステートメントで
            $sql = 'INSERT INTO user (
                user_id, user_last_name, user_first_name
                ) VALUE (
                :user_id, :user_last_name, :user_first_name
                )';
    
            $stmt = $db_handle->prepare($sql);
    
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
            $stmt->bindValue(':user_last_name', $user_last_name, PDO::PARAM_STR);
            $stmt->bindValue(':user_first_name', $user_first_name, PDO::PARAM_STR);
    
            $stmt->execute();
            $db_handle = null;
            unset($user_id, $user_first_name, $user_last_name);
            
            // 一覧表示にリダイレクトする
            $redirect_url = '/attendance_record/view/admin/userList.php';
            header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
            exit();
    
        }catch(PDOException $e){
            $errors['fault'] = 'データ保存に失敗しました。：'.$e->getMessage();
        }
    }

}