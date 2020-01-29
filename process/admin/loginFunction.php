<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $admin_id = null;
    if (!isset($_POST['admin_id']) || !strlen($_POST['admin_id'])){
        $errors['admin_id'] = '管理者IDが入力されていません。';
    }else{
        $admin_id = $_POST['admin_id'];
    }

    try{
        // インスタンス
        $db_handle = db_connect();

        // 管理者IDをDB検索
        $sql = 'SELECT *
                FROM admin_table
                ORDER BY id ASC';

        $stmt = $db_handle->prepare($sql);
        $stmt->execute();
        $db_handle = null;

        while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tasks[] = $task;
        }

        foreach($tasks as $task)
        {
            if ($admin_id === $task['admin_id'])
            {
                // ログイン処理
                $_SESSION['admin_name'] = $task['admin_name'];
                $_SESSION['admin_id'] = $task['admin_id'];

                // ワンタイム的なものを発行したい

                $redirect_url = '/attendance_record/view/admin/userList.php';
                header('Location:'.'https://'.$_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
                exit();
            }else{
                $errors['login'] = 'ログインできません。IDが間違っているかアカウントがありません。';
            }
        }

    }catch(PDOException $e){
        $errors['fault'] = '情報取得に失敗しました。'. $e->getMessage();
    }
}
?>