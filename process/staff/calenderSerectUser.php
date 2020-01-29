<?php
/**
 * カレンダーの利用者をしていするセレクトボックス内の
 * 利用者名を動的にDBから取得する
 */



// 仮で配列にデータ設定
$kari_data = [
    '0'=>'利用者１',
    '1'=>'利用者２',
    '2'=>'利用者３',
    '3'=>'利用者４'
];

// 配列のデータをセレクトボックスように整形
// foreach( $kari_data as $kari_data_key => $kari_data_val )
// {
//     $kari_data = "<option value='" . $kari_data_key . "'>"
//                 . $kari_data_val . "</option>";
// }