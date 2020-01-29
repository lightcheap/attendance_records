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
        $sql = 'UPDATE staff
                SET staff_id=:staff_id, staff_last_name=:staff_last_name, staff_first_name=:staff_first_name
                WHERE id=:id';

        $stmt = $db_Handle->prepare($sql);

        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':staff_id', $_POST['staff_id'], PDO::PARAM_STR);
        $stmt->bindValue(':staff_last_name', $_POST['staff_last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':staff_first_name', $_POST['staff_first_name'], PDO::PARAM_STR);

        $stmt->execute();
        $db_Handle = null;
        unset($_POST['id'], $_POST['staff_id'], $_POST['staff_last_name'], $_POST['staff_first_name']);

        $redirect_url = '/attendance_record/view/admin/staffList.php';
        header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        exit();
    }catch(PDOException $e){
        $errors['fault'] = '接続失敗しました。：'. $e->getMessage();
    }
}
?>