<?php

namespace VarYans\ReactPHP;

/**
 * Class React
 * @package VarYan\PHPReact
 */
class React
{
    /**
     * @var React $_instance
     */
    protected static $_instance;
    /**
     * @var \ReactJS $_react
     */
    protected $_react;

    /**
     * React constructor.
     * @param string $reactSource
     * @param string $appSource
     */
    public function __construct($reactSource = null, $appSource = null)
    {
        if (is_null($reactSource)) {
            $reactSource = Config::getReactSource();
        }

        if (is_null($appSource)) {
            $appSource = Config::getAppSource();
        }

        $this->_react = new \ReactJS($reactSource, $appSource);
        $this->setErrorHandler(null);
        self::$_instance = $this;
    }

    /**
     * @param \Closure|null $errorHandler
     */
    public function setErrorHandler(\Closure $errorHandler = null)
    {
        $errorHandler = is_callable($errorHandler)
            ? $errorHandler
            : Config::getErrorHandler();

        if (!is_callable($errorHandler))
            $errorHandler = function ($exception) {
                throw $exception;
            };

        $this->_react->setErrorHandler($errorHandler);
    }

    /**
     * @param string $component
     * @param array $props
     * @return string
     */
    public static function quickRender($component, $props)
    {
        if(!self::$_instance){
            self::$_instance = new React();
        }

        return call_user_func_array([self::$_instance,"render"],array($component,$props));
    }

    /**
     * @param string $component
     * @param array $props
     * @return string
     */
    public function render($component, $props)
    {
        $this->_react->setComponent($component, $props);
        return $this->_react->getMarkup();
    }
}