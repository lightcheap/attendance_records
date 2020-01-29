<?php
// 一旦のこしとく
session_start();
class Session
{
    //セッションがスタートしているかどうかを
    // 静的チェックするためのプロパティ
    protected static $sessionStarted = false;
    //
    protected static $sessionIdRegenerated = false;

    // セッションがスタートしてるかチェックする。
    public function __construct()   
    {
        //もし$sessionStartedがfalseなら
        if (!self::$sessionStarted )
        {
            session_start();

            self::$sessionStarted = true;
        }
    }

    //　セッションをセットするメソ
    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    // セッションを取得するメソ。
    public function get($name, $default = null)
    {
        // セッション名が存在するなら返す
        if (isset($_SESSION[$name]))
        {
            return $_SESSION[$name];
        }
        //ないならデフォ＝nullを返す
        return $default;
    }

    // セッション名を開放するメソ
    public function remove($name)
    {
        unset($_SESSION[$name]);
    }

    // セッションそのものを消すメソ
    public function clear()
    {
        $_SESSION = array();
    }

    // セッションIDを新しく発行するためのメソ
    public function regenerate($destroy = true)
    {
        if (!self::$sessionIdRegenerated)
        {
            session_regenerate_id($destroy);

            self::$sessionIdRegenerated = true;
        }
    }

    public function setAuthenticated($bool)
    {
        $this->set('_authenticated', (bool)$bool);

        $this->regenerate();
    }

    public function isAuthenticated()
    {
        return $this->get('_authenticated', false);
    }
}
