<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

// 見た目わかりやすくするように変数に入れる
$searchYear = $_POST['search_day'][0];
$searchMonth = $_POST['search_day'][1];
$searchDay = $_POST['search_day'][2];

// 日付が一桁の場合、頭に”0”を付ける
if( $searchDay < 10)
{
    $searchDay = str_pad($searchDay, 2, 0, STR_PAD_LEFT);
}

$searchDate = $searchYear . '-' . $searchMonth . '-' . $searchDay;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーションいるかな？

    try
    {
        $db_Handle = db_connect();

        // 検索したいデータがあるか
        $sql = 'SELECT *
                FROM attendance_record
                WHERE delete_flag = 0 AND user_id =:user_id AND work_date =:work_date
                LIMIT 1';
    
        $stmt = $db_Handle->prepare($sql);
    
        $stmt->bindValue(':user_id', $_SESSION['user_id'], PDO::PARAM_STR);
        $stmt->bindValue(':work_date', $searchDate, PDO::PARAM_STR);
    
        $stmt->execute();
    
        $dbh = null;
    
        // レコード取得
        $acquire_dbdata = $stmt->fetch(PDO::FETCH_ASSOC);

        if($acquire_dbdata)
        {
            // データがある
            $formTitle = '出退勤情報更新';
            $submitButtonNotation = '更新';
        }
        else
        {
            // データがない
            $formTitle = '出退勤情報登録';
            $submitButtonNotation = '登録';
        }
    }
    catch(PDOException $e)
    {
        $errors['fault'] ='接続失敗：'. $e->getMessage();
    }
    


}


