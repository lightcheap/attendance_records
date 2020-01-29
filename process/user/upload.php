<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 値が入っているか判定。なければエラー出す。（あとで）

    try{
        // インスタンス
        $dbh = db_connect();

        // SQL発行　プリペアードステートメント
        $sql = 'UPDATE attendance_record SET
            work_date=:work_date, opening_hour=:opening_hour, ending_hour=:ending_hour,
            training_time=:training_time, consultation_time=:consultation_time, rest_time=:rest_time,
            yasumi=:yasumi WHERE id=:id';

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $stmt->bindValue(':work_date', $_POST['day'], PDO::PARAM_STR);
        $stmt->bindValue(':opening_hour', $_POST['opening_hour'], PDO::PARAM_STR);
        $stmt->bindValue(':ending_hour', $_POST['ending_hour'], PDO::PARAM_STR);
        $stmt->bindValue(':training_time', $_POST['training_time'], PDO::PARAM_STR);
        $stmt->bindValue(':consultation_time', $_POST['consultation_time'], PDO::PARAM_STR);
        $stmt->bindValue(':rest_time', $_POST['rest_time'], PDO::PARAM_STR);
        $stmt->bindValue(':yasumi', $_POST['yasumi'], PDO::PARAM_STR);

        $stmt->execute();
        $dbh = null;
        unset($_POST['day'], $_POST['opening_hour'], $_POST['ending_hour'], $_POST['training_time'],
            $_POST['consultation_time'], $_POST['rest_time'], $_POST['yasumi']);

        $redirect_url = '/attendance_record/view/user/dataDisplay.php';
        header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        //出力を終了
        exit();

    }catch(PDOException $e){
        echo('接続失敗しました。：'. $e->getMessage());
    }
}