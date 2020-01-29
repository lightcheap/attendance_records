<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if ( $_SERVER['REQUEST_METHOD'] === 'POST' )
{
    // バリデーション
    $staff_id = null;
    if (!isset($_POST['staff_id']) || !strlen($_POST['staff_id']))
    {
        $errors['staff_id'] = 'スタッフIDが入力されていません。';
    }
    else
    {
        $staff_id = $_POST['staff_id'];
    }

    try
    {
        // インスタンス
        $db_handle = db_connect();

        $sql = 'SELECT *
                FROM staff
                ORDER BY id ASC';
        
        $stmt = $db_handle->prepare($sql);
        $stmt->execute();

        $db_handle = null;

        while($task = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $tasks[] = $task; 
        }

        // DBに入ってるスタッフデータと照合する
        foreach ( $tasks as $task )
        {
            if( $staff_id === $task['staff_id'])
            {
                // ログイン処理
                $_SESSION['staff_name'] = $task['staff_last_name'] . $task['staff_first_name'];
                $_SESSION['staff_id'] = $staff_id;

                // この先のページができたらそこにリダイレクと。今はかりで指定
                $redirect_url = '/attendance_record/view/staff/browsingUserAttendanceData.php';
                header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
                exit();
            }
        }
    }
    catch(PDOException $e)
    {
        $errors['user_id'] = 'IDがないか、間違っています。';
        // 多分ここから元ページにリダイレクトしてエラー表示する
    }

}