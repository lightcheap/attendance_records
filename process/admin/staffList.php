<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');
$db_handle = db_connect();


try
{
    // 在籍中のスタッフを一覧取得
    $sql = 'SELECT *
            FROM staff
            WHERE enrollment_flag = 0
            ORDER BY id ASC';

    $stmt = $db_handle->prepare($sql);
    $stmt->execute();
    $db_handle = null;

    while($staff = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $staffs[] = $staff;
    }

}catch(PDOException $e)
{
    $errors['fault'] = '情報取得に失敗しました。'. $e->getMessage();
}
