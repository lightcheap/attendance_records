<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php
/**
 * 　POSTしようとした日付先にデータがあれば
 * 　UPDATE
 * 　データがなければ
 * 　INSERT
 */

// エラーが表示されるように。あとで消す？
ini_set( 'display_errors', 1 );

$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // 入力チェック
    $day = null;
    if(!isset($_POST['day']) || !strlen($_POST['day']))
    {
        $errors['day'] = '日付が入力されていません。';
    }else{
        $day = $_POST['day'];
    }
    
    $openingHour = null;
    if(!isset($_POST['opening_hour']) || !strlen($_POST['opening_hour']))
    {
        $openingHour = '00:00';
    }else{
        $openingHour = $_POST['opening_hour'];
    }

    $endingHour = null;
    if( !isset($_POST['ending_hour']) || !strlen($_POST['ending_hour']))
    {
        $endingHour = '00:00';
    }else{
        $endingHour = $_POST['ending_hour'];
    }
    
    $trainingTime = null;
    if(!isset($_POST['training_time']) || !strlen($_POST['training_time']))
    {
        // 値を入れていないとうまくいかないので、何も入れない場合は00：00を入れる
        $trainingTime = '00:00';
    }else{
        $trainingTime = $_POST['training_time'];
    }

    $consultationTime = null;
    if(!isset($_POST['consultation_time']) || !strlen($_POST['consultation_time']))
    {
        // 値を入れていないとうまくいかないので、何も入れない場合は00：00を入れる
        $consultationTime = '00:00';
    }else{
        $consultationTime = $_POST['consultation_time'];
    }

    $restTime = null;
    if(!isset($_POST['rest_time']) || !strlen($_POST['rest_time']))
    {
        $restTime = '00:00';
    }else{
        $restTime = $_POST['rest_time'];
    }

    $yasumi = null;
    if(!isset($_POST['yasumi']) || !strlen($_POST['yasumi']))
    {
        $yasumi = '';
    }else{
        $yasumi = $_POST['yasumi'];
    }

    // エラーがなければDBにデータがないか確認
    if(count($errors) == 0)
    {    
        try
        {
            $db_handle = db_connect();

            // 投稿した日付でデータがあるかをカウントする
            $sql = 'SELECT COUNT(*)
                    FROM attendance_record
                    WHERE delete_flag = 0 AND user_id =:user_id AND work_date =:work_date';

            $stmt = $db_handle->prepare($sql);

            $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
            $stmt->bindValue(':work_date', $day, PDO::PARAM_STR);

            $stmt->execute();

            $db_handle = null;
            $dataCounter = $stmt->fetchColumn();

            $stmt = null;

            if($dataCounter != 0 )
            {
                // データがあるから更新-------------
                try
                {
                    $db_handle = db_connect();

                    $sql = 'UPDATE attendance_record
                            SET user_id=:user_id, work_date=:work_date, opening_hour=:opening_hour,
                            ending_hour=:ending_hour, training_time=:training_time,
                            consultation_time=:consultation_time, rest_time=:rest_time, yasumi=:yasumi
                            WHERE id=:id';

                    $stmt = $db_handle->prepare($sql);

                    // プレースホルダに値をバインド
                    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
                    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                    $stmt->bindValue(':work_date', $day, PDO::PARAM_STR);
                    $stmt->bindValue(':opening_hour', $openingHour, PDO::PARAM_STR);
                    $stmt->bindValue(':ending_hour', $endingHour, PDO::PARAM_STR);
                    $stmt->bindValue(':training_time', $trainingTime, PDO::PARAM_STR);
                    $stmt->bindValue(':consultation_time', $consultationTime, PDO::PARAM_STR);
                    $stmt->bindValue(':rest_time', $restTime, PDO::PARAM_STR);
                    $stmt->bindValue(':yasumi', $yasumi, PDO::PARAM_STR);

                    $stmt->execute();
                    $db_handle = null;
                    // 各変数をNULLにする
                    unset($day, $openingHour, $endingHour, $trainingTime,
                        $consultationTime, $restTime, $yasumi);

                    // ページ遷移
                    $redirect_url = '/attendance_record/view/user/attendanceCalender.php';
                    header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
                }
                catch(PDOException $e)
                {
                    $errors['fault'] ='更新失敗：'. $e->getMessage();
                }
            }

            if( $dataCounter === 0 )
            {
                // データがないから新規-------------
                try
                {
                    $db_handle = db_connect();
                    
                    $sql = 'INSERT INTO attendance_record (
                        user_id, work_date, opening_hour, ending_hour,
                        training_time, consultation_time, rest_time, yasumi)
                        VALUES (
                        :user_id, :work_date, :opening_hour, :ending_hour,
                        :training_time, :consultation_time, :rest_time, :yasumi)';

                    $stmt = $db_handle->prepare($sql);
                    // プレースホルダに値をバインド
                    $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
                    $stmt->bindValue(':work_date', $day, PDO::PARAM_STR);
                    $stmt->bindValue(':opening_hour', $openingHour, PDO::PARAM_STR);
                    $stmt->bindValue(':ending_hour', $endingHour, PDO::PARAM_STR);
                    $stmt->bindValue(':training_time', $trainingTime, PDO::PARAM_STR);
                    $stmt->bindValue(':consultation_time', $consultationTime, PDO::PARAM_STR);
                    $stmt->bindValue(':rest_time', $restTime, PDO::PARAM_STR);
                    $stmt->bindValue(':yasumi', $yasumi, PDO::PARAM_STR);

                    // 送信
                    $stmt->execute();

                    // DB遮断
                    $db_handle = null;
                    // 各変数をNULLにする
                    unset($day, $openingHour, $endingHour, $trainingTime,
                        $consultationTime, $restTime, $yasumi);

                    // ページ遷移
                    $redirect_url = '/attendance_record/view/user/attendanceCalender.php';
                    header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
                    //出力を終了
                    exit();
                }
                catch(PDOException $e)
                {
                    $errors['fault'] ='新規登録失敗：'. $e->getMessage();
                }
            }
        }
        catch(PDOException $e)
        {
            $errors['fault'] ='接続失敗：'. $e->getMessage();
        }
    }
}