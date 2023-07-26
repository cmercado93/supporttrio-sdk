<?php

namespace Cmercado93\SupporttrioSdk;

class Config
{
    protected static $user;

    protected static $password;

    protected static $url;

    protected function __construct() {}

    /**
     * @param string $user
     * @param string $password
     */
    public static function setUserPassword(string $user, string $password)
    {
        static::$user = $user;
        static::$password = $password;
    }

    /**
     * @return array
     */
    public static function getUserPassword() : ?array
    {
        if (!trim(static::$user) || !trim(static::$password)) {
            return null;
        }

        return [
            'user' => static::$user,
            'password' => static::$password,
        ];
    }

    /**
     * @param string $url
     */
    public static function setUrl(string $url)
    {
        static::$url = $url;
    }

    /**
     * @return string
     */
    public static function getUrl() : ?string
    {
        return trim(static::$url) ? static::$url : null;
    }
}
