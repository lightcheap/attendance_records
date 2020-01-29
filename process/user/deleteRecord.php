<?php require($_SERVER['DOCUMENT_ROOT'] . '/attendance_record/process/core/Db_connect.php');?>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    try{
        $dbh = db_connect();

        $sql = 'UPDATE attendance_record SET
            delete_flag=:delete_flag WHERE id=:id';

        $delete_flag = 1;
    
        $stmt = $dbh->prepare($sql);
    
        $stmt->bindValue(':id', $_POST['delete_record'], PDO::PARAM_INT);
        $stmt->bindValue(':delete_flag', $delete_flag, PDO::PARAM_INT);
    
        $stmt->execute();
        $dbh = null;
    
        $redirect_url = '/attendance_record/view/user/dataDisplay.php';
        header('Location:'.'https://'. $_SERVER['HTTP_HOST'] . $redirect_url, true, 301);
        exit();
    }catch(PDOException $e){
        echo('接続失敗しました。：'. $e->getMessage());
    }

}


