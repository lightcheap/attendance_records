<?php
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Session.php');
// phpspreadsheetを使用できるように
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/vendor/autoload.php');
// DB
require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');
/**
 * カレンダーで選択していた年月　の出勤簿データをエクセルシートに作成して
 * ダウンロードする
 * 
 */

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

ini_set( 'display_errors', 1) ;
// DBから指定した年と月のデータを引っ張ってくる-------------
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    // バリデーション

    // わかりやすく変数にする
    $dl_year = null;
    //$dl_year = filter_input( INPUT_POST, 'dl_date[0]' );

    $dl_year = $_POST['dl_date'][0];
    $dl_month = null;
    //$dl_month = filter_input( INPUT_POST, 'dl_date[1]' );
    $dl_month = $_POST['dl_date'][1];

    if($dl_month < 10)
    {   
        // 月が一桁の場合、頭に０を付けとく
        $dl_month = str_pad($dl_month, 2, 0, STR_PAD_LEFT);
    }

    $first_day = "01";
    // 月末日を取得する
    $last_day = date('j', mktime(0, 0, 0, $dl_month + 1, 0, $dl_year));
    $dlSearchFirstDate = $dl_year . "-" . $dl_month . "-" . $first_day;
    $dlSearchLastDate = $dl_year . "-" . $dl_month . "-" . $last_day;

    try
    {
        $db_handle = db_connect();

        // 検索したい年月分のデータのSQL発行
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
        $stmt->bindValue(':search_first_date', $dlSearchFirstDate, PDO::PARAM_STR);
        $stmt->bindValue(':search_last_date', $dlSearchLastDate, PDO::PARAM_STR);
        $stmt->execute();
        $dbh = null;

        $search_tasks = array();

        while($task = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $search_tasks[] = $task;
        }
    }
    catch(PDOException $e)
    {
        $errors['fault'] ='接続失敗：'. $e->getMessage();
    }

}
// DBデータをエクセルに---------------------

    // シート名を「〇年〇月分出勤簿（名前）.xlsx」にする
    $sheetName = $dl_year . "年"
                . $dl_month . "月分出勤簿（" . $_SESSION['user_name'] . "）.xlsx";
    // 新規シートのインスタンス
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // ここはとりあえず1行目に項目を仮に入れてみる------------
    $sheet->setCellValue( 'B1', '出勤日' )
            ->setCellValue( 'C1', '出勤時間' )
            ->setCellValue( 'D1', '退勤時間' )
            ->setCellValue( 'E1', '訓練時間' )
            ->setCellValue( 'F1', '相談時間' )
            ->setCellValue( 'G1', '休憩時間' );

    $cnt = 2;
    foreach( $search_tasks as $eachdata )
    {
        $workdateInputCell = 'B' . $cnt;
        $attendancetimeInputCell = 'C' . $cnt;
        $worktimeInputCell = 'D' . $cnt;
        $trainingtimeInputCell = 'E' . $cnt;
        $consultingtimeInputCell = 'F' . $cnt;
        $resttimeInputCell = 'G' . $cnt;

        $sheet->setCellValue( $workdateInputCell, $eachdata['work_date'] );
        $sheet->setCellValue( $attendancetimeInputCell, $eachdata['opening_hour'] );
        $sheet->setCellValue( $worktimeInputCell, $eachdata['ending_hour'] );
        $sheet->setCellValue( $trainingtimeInputCell, $eachdata['training_time'] );
        $sheet->setCellValue( $consultingtimeInputCell, $eachdata['consultation_time'] );
        $sheet->setCellValue( $resttimeInputCell, $eachdata['rest_time'] );

        $cnt ++;
    }

    $Writer = new Xlsx($spreadsheet);
    $Writer->save($sheetName);

    // ここから作ったエクセルをダウンロードしてみる---------

    /* ディレクトリトラバーサル対策 */
    $DIR_PATH='/home/users/0/main.jp-lightrelief/web/exactly-good/attendance_record/process/phpspreadsheet/';
    // open_basedirによって$DIR_PATHに設定した以外はアクセスできないようにする。
    ini_set('open_basedir',$DIR_PATH);

    function get_name($str){
        if(strpos($str, '..') !== false){
            exit();
        }
        return str_replace('\0', '', $str);

    }

    // dirname...親ディレクトリまでのパス（ファイルパスの一個まえまで）
    $dir = get_name(dirname($sheetName));
    // CSRF対策もしないと

    // 該当ディレクトリに移動
    chdir($DIR_PATH . $dir);
    // ダウンロードするファイルのmimeタイプを調べる。
    $mime_name = mime_content_type($sheetName);
    // ファイルサイズを調べる
    $file_length = filesize($sheetName);
    
    // ファイル名指定。
    header("Content-Disposition: attachment; filename=$sheetName");
    // ファイルサイズを取得し、ダウンロードの進捗を表示
    header("Content-Length:$file_length");
    // HTTPヘッダ送信。ローカルPCに保存するためのダイアログが出る。
    header("Content-type:$mime_name");
    // ファイルを読みこんで出力する。
    readfile($sheetName);
    
    // ダウンロードしたら作成したシートは削除する。
    unlink($sheetName);
    exit();



