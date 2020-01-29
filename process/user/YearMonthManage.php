<?php
/**
 * SESSIONで年と月を管理する
 * 矢印ボタンで年月の選択する
 */
//-------------------------------------------------

// SESSIONに年、月が入ってないならデフォで現在年月を入れる。
if($_SESSION['year'] == "")
{
    $_SESSION['year'] = date('Y');
}

if($_SESSION['month'] == "")
{
    $_SESSION['month'] = date('m');
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

// 現在の年月を取得
$year = $_SESSION['year'];
$month = $_SESSION['month'];

// 月末日を取得する
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calender = array();
$j = 0;


?>