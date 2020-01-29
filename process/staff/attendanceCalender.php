<?php
/**
 * スタッフページで閲覧する、利用者の出退勤が見れるカレンダー用。
 * とりま仮設置。利用者用と変わらないならあとで消す。
 * 
 * カレンダーで出退勤の閲覧、更新ができるようにする
 * SESSIONで年と月を管理する。
 */

// sessionに年、月が入っていないなら、デフォルトで現在の年月を入れる。
if($_SESSION['year'] == "")
{
    $_SESSION['year'] = date('Y');
}

if($_SESSION['month'] == "")
{
    $_SESSION['month'] = date('m');
}

// 一番最初にページを開いた時に user_idは入ってないので、
// 変なことにならないようにひとまず誰かをデフォルトにいれる
if($_SESSION['user_id'] =="")
{
    $_SESSION['user_id'] = 0;
}

// 先月ボタンを押したときの処理-----------------------
if(@$_POST['prev_month'])
{
    // 1月だった場合、12月になって、年を１つ減らす
    if($_SESSION['month'] == 1)
    {
        $year = $year -1;
        $_SESSION['month'] = 12;
    }
    else
    {
        $_SESSION['month'] = $_SESSION['month'] -1;
    }
}

// 来月ボタンを押したときの処理------------------------
if(@$_POST['next_month'])
{
    // 12月だった場合、1月になって年を１つ増やす。
    if($_SESSION['month'] == 12)
    {
        $year = $year + 1;
        $_SESSION['month'] = 1;
    }
    else
    {
        $_SESSION['month'] = $_SESSION['month'] + 1;
    }
}

// 現在の年月を取得----------------------------------
$year = $_SESSION['year'];
$month = $_SESSION['month'];

// 月末日を取得する----------------------------------
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calender = array();
$j = 0;


?>