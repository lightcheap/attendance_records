<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

$dbh = db_connect();

// 全データを日付順で取得する
$sql = 'SELECT id, user_id, work_date, opening_hour,
        ending_hour, training_time, consultation_time,
        rest_time, yasumi, delete_flag FROM attendance_record
        WHERE delete_flag = 0 AND user_id =:user_id ORDER BY work_date ASC';

$stmt = $dbh->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

// 配列でDBデータ取得
while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
    $tasks[] = $task;
}