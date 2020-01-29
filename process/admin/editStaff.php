<?php
ini_set( 'display_errors', 1 );
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // 値がはいってるか
    $editStaffId = null;
    if(!isset($_POST['edit_staff']) || !strlen($_POST['edit_staff']))
    {
        $errors['edit_staff'] = 'idが確定できません。';
    }else{
        $editStaffId = $_POST['edit_staff'];
    }

    if(count($errors) === 0)
    {
        try
        {
            $db_handle = db_connect();

            $sql = 'SELECT *
                    FROM staff
                    WHERE id=:id';

            $stmt = $db_handle->prepare($sql);
            $stmt->bindValue(':id', $editStaffId, PDO::PARAM_INT);

            $stmt->execute();
            $db_handle = null;
            // レコード取得
            $acquire_dbdata = $stmt->fetch(PDO::FETCH_ASSOC);

        }catch(PDOException $e){
            $errors['fault'] = '情報取得に失敗しました。'. $e->getMessage();
        }
    }
}
?>