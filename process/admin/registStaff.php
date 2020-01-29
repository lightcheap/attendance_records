<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーションやる。あとで

    $staff_id = null;
    if (!isset($_POST['staff_id']) || !strlen($_POST['staff_id'])){
        $errors['staff_id'] = 'スタッフIDが入力されていません。';
    }else{
        $staff_id = $_POST['staff_id'];
    }

    $staff_last_name = null;
    if (!isset($_POST['staff_last_name']) || !strlen($_POST['staff_last_name'])){
        $errors['staff_last_name'] = 'スタッフの苗字が入力されていません。';
    }else{
        $staff_last_name = $_POST['staff_last_name'];
    }

    $staff_first_name = null;
    if (!isset($_POST['staff_first_name']) || !strlen($_POST['staff_first_name'])){
        $errors['staff_first_name'] = 'スタッフの名前が入力されていません。';
    }else{
        $staff_first_name = $_POST['staff_first_name'];
    }

    if (count($errors) === 0){
        try{
            // インスタンス
            $db_handle = db_connect();
            // SQL
            $sql = 'INSERT INTO staff (
                    staff_id, staff_last_name, staff_first_name
                    ) VALUE (
                    :staff_id, :staff_last_name, :staff_first_name
                    )';

            $stmt = $db_handle->prepare($sql);
            $stmt->bindValue(':staff_id', $staff_id, PDO::PARAM_STR);
            $stmt->bindValue(':staff_last_name', $staff_last_name, PDO::PARAM_STR);
            $stmt->bindValue(':staff_first_name', $staff_first_name, PDO::PARAM_STR);

            $stmt->execute();
            $db_handle = null;
            unset($staff_id, $staff_last_name, $staff_first_name);

            // 一覧表示にリダイレクトする
            $redirect_url = '/attendance_record/view/admin/staffList.php';
            header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
            exit();

        }catch(PDOException $e){
            $errors['fault'] = 'データ保存に失敗しました。：'.$e->getMessage();
        }
    }
}
