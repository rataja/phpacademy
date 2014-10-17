<?php

class Token
{

    public static function generate()
    {
        return $_SESSION['rataja']['token'] = base64_encode(openssl_random_pseudo_bytes(32));
    }

    public static function check($token)
    {
        if (isset($_SESSION['rataja']['token']) && $token === $_SESSION['rataja']['token'])
        {
            unset($_SESSION['rataja']['token']);
            return true;
        }
        return false;
    }

}
