<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 値チェックとかバリデーションとか

    try{
        $dbh = db_connect();

        $sql = 'SELECT id, work_date, opening_hour,
            ending_hour, training_time, consultation_time,
            rest_time, yasumi FROM attendance_record WHERE id=:id';

    // プリペアードステートメントを使っているのでprepare
    $stmt = $dbh->prepare($sql);
    // プレースホルダーに値をバインド
    $stmt->bindValue(':id',$_POST['update_record'],PDO::PARAM_INT);
    // 送信
    $stmt->execute();
    // DB閉じる
    $dbh = null;

    // レコード取得
    $acquire_dbdata = $stmt->fetch(PDO::FETCH_ASSOC);

    }catch(PDOException $e){
        echo('接続失敗しました。:'. $e->getMessage());
    }
}
?>