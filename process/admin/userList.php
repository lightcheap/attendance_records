<?php
ini_set( 'display_errors', 1 );
$db_handle = db_connect();

$errors = array();
try
{
    //　利用者の一覧を取得する
    $sql = 'SELECT id, user_id, user_last_name, user_first_name
            FROM user
            WHERE enrollment_flag = 0
            ORDER BY id ASC';

    $stmt = $db_handle->prepare($sql);
    $stmt->execute();
    $db_handle = null;

    while($user = $stmt->fetch(PDO::FETCH_ASSOC)){
    $users[] = $user;
    }
}catch(PDOException $e){
    $errors['fault'] = '情報取得に失敗しました。'. $e->getMessage();
}
