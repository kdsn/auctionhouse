<?php

class Cookie
{
    public static function put($name, $value, $time)
    {
        $cookie_name = $name;
        $cookie_value = $value;
        $secure = App::get('config')['cookie']['secure'];
        $httponly = App::get('config')['cookie']['httponly'];

        return setcookie($cookie_name, $cookie_value, time() + $time, "/", $secure, $httponly);
    }

    public static function exists($name)
    {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    public static function get($name)
    {
        return $_COOKIE[$name];
    }

    public static function delete($name)
    {
        if (self::exists($name))
        {
            setcookie($name,"",time()-1);
        }
    }

}