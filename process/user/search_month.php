<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');?>
<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

ini_set('display_errors',1);

// 取得したvalueは strなので intに変換
$month = intval($_POST['month']);

$dbh = db_connect();

// 全データを逆日付順で取得する
$sql = "SELECT id, user_id, work_date, opening_hour,
        ending_hour, training_time, consultation_time,
        rest_time, yasumi, delete_flag FROM attendance_record
        WHERE delete_flag = 0 AND user_id =:user_id AND (DATE_FORMAT(work_date,'%m')=:month) ORDER BY work_date ASC";

$stmt = $dbh->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$stmt->bindValue(':month', $month, PDO::PARAM_INT);
$stmt->execute();
$dbh = null;

$attendance_data = array();

while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
    $attendance_data[] = array(
        'id'            =>  $task['id'],
        'user_id'       =>  $task['user_id'],
        'work_date'     =>  $task['work_date'],
        'opening_hour'  =>  $task['opening_hour'],
        'ending_hour'   =>  $task['ending_hour'],
        'training_time' =>  $task['training_time'],
        'consultation_time' => $task['consultation_time'],
        'rest_time'     =>  $task['rest_time'],
        'yasumi'        =>  $task['yasumi']
    );
}

// ヘッダーを指定してjsonの動作を安定させる
header('Content-type: application/json');
// htmlへ渡す配列 $attendance_data をjsonに変換する
echo(json_encode($attendance_data));
