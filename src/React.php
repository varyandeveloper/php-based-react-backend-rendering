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
    public function __construct($reactSource,$appSource)
    {
        $this->_react = new \ReactJS($reactSource,$appSource);
    }

    /**
     * @param string $component
     * @param array $data
     * @return string
     */
    public function render($component,$data)
    {
        $this->_react->setComponent($component,$data);
        return $this->_react->getMarkup();
    }
}