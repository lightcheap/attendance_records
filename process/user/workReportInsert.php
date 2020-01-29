<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

// あとで使うかもだから用意しておく
$errors = array();

// POST処理
if ( $_SERVER['REQUEST_METHOD'] === 'POST'){
    // 入力チェック（あとで）

    try{

        $dbh = db_connect();
        
        $sql = 'INSERT INTO work_report (
            user_id, work_date,
            start_time1, end_time1, work_classification1, work_detail1,
            start_time2, end_time2, work_classification2, work_detail2,
            start_time3, end_time3, work_classification3, work_detail3,
            start_time4, end_time4, work_classification4, work_detail4,
            start_time5, end_time5, work_classification5, work_detail5,
            start_time6, end_time6, work_classification6, work_detail6,
            start_time7, end_time7, work_classification7, work_detail7,
            start_time8, end_time8, work_classification8, work_detail8,
            work_impression)
        VALUE (
            :user_id, :work_date,
            :start_time1, :end_time1, :work_classification1, :work_detail1,
            :start_time2, :end_time2, :work_classification2, :work_detail2,
            :start_time3, :end_time3, :work_classification3, :work_detail3,
            :start_time4, :end_time4, :work_classification4, :work_detail4,
            :start_time5, :end_time5, :work_classification5, :work_detail5,
            :start_time6, :end_time6, :work_classification6, :work_detail6,
            :start_time7, :end_time7, :work_classification7, :work_detail7,
            :start_time8, :end_time8, :work_classification8, :work_detail8,
            :work_impression)';

        $stmt = $dbh->prepare($sql);

        // プレースホルダーに値をバインド
        $stmt->bindValue(':user_id',$_POST['user_id'], PDO::PARAM_STR);
        $stmt->bindValue(':work_date',$_POST['work_date'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time1',$_POST['starttime1'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time1',$_POST['finishtime1'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification1',$_POST['work_section1'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail1',$_POST['workdeteil1'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time2',$_POST['starttime2'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time2',$_POST['finishtime2'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification2',$_POST['work_section2'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail2',$_POST['workdeteil2'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time3',$_POST['starttime3'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time3',$_POST['finishtime3'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification3',$_POST['work_section3'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail3',$_POST['workdeteil3'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time4',$_POST['starttime4'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time4',$_POST['finishtime4'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification4',$_POST['work_section4'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail4',$_POST['workdeteil4'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time5',$_POST['starttime5'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time5',$_POST['finishtime5'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification5',$_POST['work_section5'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail5',$_POST['workdeteil5'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time6',$_POST['starttime6'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time6',$_POST['finishtime6'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification6',$_POST['work_section6'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail6',$_POST['workdeteil6'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time7',$_POST['starttime7'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time7',$_POST['finishtime7'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification7',$_POST['work_section7'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail7',$_POST['workdeteil7'], PDO::PARAM_STR);
        $stmt->bindValue(':start_time8',$_POST['starttime8'], PDO::PARAM_STR);
        $stmt->bindValue(':end_time8',$_POST['finishtime8'], PDO::PARAM_STR);
        $stmt->bindValue(':work_classification8',$_POST['work_section8'], PDO::PARAM_STR);
        $stmt->bindValue(':work_detail8',$_POST['workdeteil8'], PDO::PARAM_STR);
        $stmt->bindValue(':work_impression',$_POST['work_impression'], PDO::PARAM_STR);

        // 送信
        $stmt->execute();
        // DB遮断
        $dbh = null;
        // 各変数をnullにする
        unset(
            $_POST['user_id'], $_POST['work_date'],
            $_POST['starttime1'], $_POST['finishtime1'], $_POST['work_section1'], $_POST['workdeteil1'],
            $_POST['starttime2'], $_POST['finishtime2'], $_POST['work_section2'], $_POST['workdeteil2'],
            $_POST['starttime3'], $_POST['finishtime3'], $_POST['work_section3'], $_POST['workdeteil3'],
            $_POST['starttime4'], $_POST['finishtime4'], $_POST['work_section4'], $_POST['workdeteil4'],
            $_POST['starttime5'], $_POST['finishtime5'], $_POST['work_section5'], $_POST['workdeteil5'],
            $_POST['starttime6'], $_POST['finishtime6'], $_POST['work_section6'], $_POST['workdeteil6'],
            $_POST['starttime7'], $_POST['finishtime7'], $_POST['work_section7'], $_POST['workdeteil7'],
            $_POST['starttime8'], $_POST['finishtime8'], $_POST['work_section8'], $_POST['workdeteil8'],
            $_POST['work_impression']);

        $redirect_url = '/attendance_record/view/user/workReportDisplay.php';
        header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        // 出力を終了
        exit();
    }catch(PDOException $e){
        echo('データベース接続失敗：'. $e->getMessage());
    }

}