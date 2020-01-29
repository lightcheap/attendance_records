<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

$errors = array();

// postなら処理
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 入力してあるかチェック。

    $user_id = null;
    if ( !isset($_POST['user_id']) || !strlen($_POST['user_id'])) {
        $errors['user_id'] = 'ログインしていません。';
    }else{
        $user_id = $_POST['user_id'];
    }

    $day = null;
    if ( !isset($_POST['day']) || !strlen($_POST['day'])) {
        $errors['day'] = '日付が入力されていません。';
    }else{
        $day = $_POST['day'];
    }

    $openingHour = null;
    if ( !isset($_POST['opening_hour']) || !strlen($_POST['opening_hour'])) {
        $errors['opening_hour'] = '始業時間が入力されていません。';
    }else{
        $openingHour = $_POST['opening_hour'];
    }

    $endingHour = null;
    if ( !isset($_POST['ending_hour']) || !strlen($_POST['ending_hour'])) {
        $errors['ending_hour'] = '終業時間が入力されていません。';
    }else{
        $endingHour = $_POST['ending_hour'];
    }

    $trainingTime = null;
    if ( !isset($_POST['training_time']) || !strlen($_POST['training_time'])) {
        
    }else{
        $trainingTime = $_POST['training_time'];
    }

    $consultationTime = null;
    if ( !isset($_POST['consultation_time']) || !strlen($_POST['consultation_time'])) {
        
    }else{
        $consultationTime = $_POST['consultation_time'];
    }

    $restTime = null;
    if ( !isset($_POST['rest_time']) || !strlen($_POST['rest_time'])) {
        
    }else{
        $restTime = $_POST['rest_time'];
    }

    $yasumi = null;
    if ( !isset($_POST['yasumi']) || !strlen($_POST['yasumi'])) {
        
    }else{
        $yasumi = $_POST['yasumi'];
    }

    // エラーがなければDBにいれる
    if (count($errors) === 0){

        try{
            $dbh = db_connect();

            $sql = 'INSERT INTO attendance_record (
                user_id, work_date, opening_hour, ending_hour,
                training_time, consultation_time, rest_time, yasumi)
                VALUES (
                    :user_id, :work_date, :opening_hour, :ending_hour,
                    :training_time, :consultation_time, :rest_time, :yasumi)';

            $stmt = $dbh->prepare($sql);

            // プレースホルダに値をバインド
            $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
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
            $dbh = null;
            // 各変数をNULLにする
            unset($openingHour, $endingHour, $trainingTime, $consultationTime, $restTime, $yasumi);

            $redirect_url = '/attendance_record/view/user/dataDisplay.php';
            //header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
            
        }catch(PDOException $e){
            $errors['fault'] ='接続失敗：'. $e->getMessage();
        }
    }
}
?>


