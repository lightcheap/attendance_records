<?php
/**
 * フロントコントローラー。
 * 全てのリクエストをまずここで受け取る。
 * ここでアプリケーションを実行する処理を書いていく。
 */
//require $_SERVER['DOCUMENT_ROOT'] . '/attendancerecord/bootstrap.php';

echo 'SCRIPT_NAME:' . $_SERVER['SCRIPT_NAME'].'<br>';
echo 'REQUEST_URI:' . $_SERVER['REQUEST_URI'].'<br>';

if (0 === strpos($_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME']))
{
    echo 'ベース：' . $_SERVER['SCRIPT_NAME'].'<br>';
}
elseif (0 === strpos($_SERVER['REQUEST_URI'], dirname($_SERVER['SCRIPT_NAME'])))
{
    echo 'ベース：' . rtrim( dirname($_SERVER['SCRIPT_NAME']), '/');
}
else
{
    echo 'false' . '<br>';
}
echo rtrim( dirname($_SERVER['SCRIPT_NAME']), '/');
echo '<br>';
echo 'ベース：' . $_SERVER['SCRIPT_NAME'].'<br>';
echo 'REQUEST_URI:' . $_SERVER['REQUEST_URI'].'<br>';

if (false !== ($pos = strpos($_SERVER['REQUEST_URI'], '?')))
{
    echo 'truepath:' . substr($_SERVER['REQUEST_URI'], 0, $pos);
}

$path_info = (string)substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));

echo $path_info;