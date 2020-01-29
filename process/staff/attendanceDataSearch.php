<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/db_connect.php');?>
<?php
/**
 * カレンダーに表示するデータを検索する
 * 利用者側と違う点：利用者名も検索対象になる 
 */

// 検索する月の初日と最終日
$searchFirstDate = $year . "-" . $month . "-" . "01";
$searchLastDate = $year . "-" . $month . "-" . $last_day;

$db_handle = db_connect();

// 指定した利用者の、指定年月分だけのデータを取得する
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
$stmt->bindValue(':user_id', 0, PDO::PARAM_STR);
$stmt->bindValue(':search_first_date', $searchFirstDate, PDO::PARAM_STR);
$stmt->bindValue(':search_last_date', $searchLastDate, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;