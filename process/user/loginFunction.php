<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php
/**
 * 利用者用のログイン処理
 */

ini_set( 'display_errors', 1 );

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーション
    $user_id = null;
    if (!isset($_POST['user_id']) || !strlen($_POST['user_id'])){
        $errors['user_id'] = 'ユーザーIDが入力されていません。';
    }else{
        $user_id = $_POST['user_id'];
    }

    try{
        // インスタンス
        $db_handle = db_connect();

        // id が小さい順にユーザーIDと名前を取得
        $sql = 'SELECT id, user_id, user_last_name, user_first_name
                FROM user
                ORDER BY id ASC';

        $stmt = $db_handle->prepare($sql);
        $stmt->execute();
        $db_handle = null;

        while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
            $tasks[] = $task;
        }

        foreach($tasks as $task)
        {
            if ($user_id === $task['user_id'] )
            {
                // ログイン処理
                $_SESSION['user_name'] = $task['user_last_name'] . $task['user_first_name'];
                $_SESSION['user_id'] = $_POST['user_id'];

                //ワンタイムのID的な奴を発行したい

                $redirect_url = '/attendance_record/view/user/attendanceCalender.php';
                header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
                exit();
            }else{
                $errors['login'] = 'ログインできません。';
            }
        }
    }catch(PDOException $e){
        $errors['fault'] = '情報取得に失敗しました。：'. $e->getMessage();
    }
}
?>