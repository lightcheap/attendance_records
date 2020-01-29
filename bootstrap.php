<?php
/**
 * アプリケーションを立ち上げるためのファイル
 */

// オートロードの設置
require $_SERVER['DOCUMENT_ROOT'] . 'attendance_record/process/ClassLoader.php';
//インスタンス
$loader = new ClassLoader();
//オートロードするディレクトリを指定する。
//登録先は配列だから、いくつでも登録は可能。
$loader->registerDir( dirname(__FILE__) . '/process');

//上で指定したディレクトリを呼び出す。
$loader->register();