<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php
/**
 * カレンダーに表示するデータを検索する
 */

// 検索する日付を作成
$searchFirstDate = $year . "-" . $month . "-" . "01";
$searchLastDate = $year . "-" . $month . "-" . $last_day;

$db_handle = db_connect();

// その年月分だけのデータを取得する
$sql = 'SELECT
        id, user_id, work_date, opening_hour,
        ending_hour, training_time, consultation_time,
        rest_time, yasumi, delete_flag
        FROM attendance_record
        WHERE delete_flag = :delete_flag
        AND user_id =:user_id
        AND work_date BETWEEN :search_first_date AND :search_last_date
        ORDER BY work_date ASC';

$stmt = $db_handle->prepare($sql);
$stmt->bindValue(':delete_flag', 0, PDO::PARAM_INT);
$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$stmt->bindValue(':search_first_date', $searchFirstDate, PDO::PARAM_STR);
$stmt->bindValue(':search_last_date', $searchLastDate, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

$search_tasks = array();
// 配列でDBデータ取得
while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
    $search_tasks[] = array(

        'day'          => intval(date('d', strtotime($task['work_date']))),
        'opening_hour' => $task['opening_hour'],
        'ending_hour' => $task['ending_hour'],
        'yasumi'        => $task['yasumi']
    );

}
