<?php
abstract class Gnix_Pattern_Singleton_Abstract
{
    private static $_instances = array();

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    final public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$_instances[$class])) {
            self::$_instances[$class] = new static();
        }
        return self::$_instances[$class];
    }
}
