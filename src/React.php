<?php

namespace VarYans\ReactPHP;

/**
 * Class React
 * @package VarYan\PHPReact
 */
class React
{
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
     * @param array $data
     * @return string
     */
    public function render($component, $data)
    {
        $this->_react->setComponent($component, $data);
        return $this->_react->getMarkup();
    }
}