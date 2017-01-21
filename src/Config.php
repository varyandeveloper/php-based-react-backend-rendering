<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 1/21/2017
 * Time: 4:59 PM
 */

namespace VarYans\ReactPHP;

/**
 * Class Config
 * @package VarYans\ReactPHP
 */
class Config
{
    /**
     * @var string $_reactSource
     */
    protected static $_reactSource;
    /**
     * @var string $_appSource
     */
    protected static $_appSource;
    /**
     * @var \Closure $_errorHandler
     */
    protected static $_errorHandler;

    /**
     * @param string $appSource
     */
    public static function setAppSource($appSource)
    {
        self::$_appSource = $appSource;
    }

    /**
     * @param string $reactSource
     */
    public static function setReactSource($reactSource)
    {
        self::$_reactSource = $reactSource;
    }

    /**
     * @return string
     */
    public static function getAppSource()
    {
        return self::$_appSource;
    }

    /**
     * @return string
     */
    public static function getReactSource()
    {
        return self::$_reactSource;
    }

    /**
     * @return \Closure
     */
    public static function getErrorHandler()
    {
        return self::$_errorHandler;
    }

    /**
     * @param \Closure $errorHandler
     */
    public static function setErrorHandler(\Closure $errorHandler)
    {
        self::$_errorHandler = $errorHandler;
    }
}