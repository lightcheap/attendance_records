<?php
ini_set( 'display_errors', 1 );
// 利用者アカウントの変更のためにデータを取得
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');


if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // 値がはいってるか
    $editUserId = null;
    if(!isset($_POST['edit_user']) || !strlen($_POST['edit_user']))
    {
        $errors['edit_user'] = 'idが確定できません。';
    }else{
        $editUserId = $_POST['edit_user'];
    }

    if(count($errors) === 0)
    {
        try
        {
            $db_handle = db_connect();

            $sql = 'SELECT *
                    FROM user
                    WHERE id=:id';

            $stmt = $db_handle->prepare($sql);
            $stmt->bindValue(':id',$editUserId, PDO::PARAM_INT);

            $stmt->execute();
            $db_handle = null;
            // レコード取得
            $acquire_dbdata = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            $errors['fault'] = '情報取得に失敗しました。'. $e->getMessage();
        }
    }
}