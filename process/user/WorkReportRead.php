<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php
/**
 * 作業報告データの取得
 */
$dbh = db_connect();

// 全データを日付順で取得する
$sql = 'SELECT
    id, user_id, work_date,
    start_time1, end_time1, work_classification1, work_detail1,
    start_time2, end_time2, work_classification2, work_detail2,
    start_time3, end_time3, work_classification3, work_detail3,
    start_time4, end_time4, work_classification4, work_detail4,
    start_time5, end_time5, work_classification5, work_detail5,
    start_time6, end_time6, work_classification6, work_detail6,
    start_time7, end_time7, work_classification7, work_detail7,
    start_time8, end_time8, work_classification8, work_detail8,
    work_impression,
    delete_flag
    FROM work_report
    WHERE delete_flag = 0 AND user_id =:user_id
    ORDER BY work_date DESC';

$stmt = $dbh->prepare($sql);

$stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

// 配列でDBデータ取得
while($task = $stmt->fetch(PDO::FETCH_ASSOC)){
    $tasks[] = $task;
}