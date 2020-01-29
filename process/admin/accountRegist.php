<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

ini_set( 'display_errors', 1 );
/**
 * 管理者の登録の処理関係
 * あとで消す？
 */
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーション
    $admin_name = null;
    if (!isset($_POST['admin_name']) || !strlen($_POST['admin_name'])){
        $errors['admin_name'] ='管理者名が入力されていません。';
    }else{
        $admin_name = $_POST['admin_name'];
    }

    $admin_id = null;
    if (!isset($_POST['admin_id']) || !strlen($_POST['admin_id'])){
        $errors['admin_id'] ='管理者IDが入力されていません。';
    }else{
        $admin_id = $_POST['admin_id'];
    }

    if(count($errors) === 0){
        try{
            // インスタンス
            $db_handle = db_connect();

            $sql = 'INSERT INTO admin_table (
                admin_name, admin_id)
                VALUE (
                    :admin_name, :admin_id)';

            $stmt = $db_handle->prepare($sql);
            // プレースホルダにバインド
            $stmt->bindValue(':admin_name', $admin_name, PDO::PARAM_STR);
            $stmt->bindValue(':admin_id', $admin_id, PDO::PARAM_STR);

            $stmt->execute();
            $db_handle = null;

            unset($admin_name, $admin_id);

            $redirect_url = '/attendance_record/view/admin/loginPage.php';
            header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
            exit();
        }catch(PDOException $e){
            $errors['fault'] = '情報取得に失敗しました。：'. $e->getMessage();
        }
    }
}
?>