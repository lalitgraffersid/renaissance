<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit69f194acbc8e085de8c317ffd182d93c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Google_Web_Stories_Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Google_Web_Stories_Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit69f194acbc8e085de8c317ffd182d93c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Google_Web_Stories_Composer\Autoload\ClassLoader(\dirname(\dirname(__FILE__)));
        spl_autoload_unregister(array('ComposerAutoloaderInit69f194acbc8e085de8c317ffd182d93c', 'loadClassLoader'));

        $useStaticLoader = PHP_VERSION_ID >= 50600 && !defined('HHVM_VERSION') && (!function_exists('zend_loader_file_encoded') || !zend_loader_file_encoded());
        if ($useStaticLoader) {
            require __DIR__ . '/autoload_static.php';

            call_user_func(\Google_Web_Stories_Composer\Autoload\ComposerStaticInit69f194acbc8e085de8c317ffd182d93c::getInitializer($loader));
        } else {
            $classMap = require __DIR__ . '/autoload_classmap.php';
            if ($classMap) {
                $loader->addClassMap($classMap);
            }
        }

        $loader->setClassMapAuthoritative(true);
        $loader->register(true);

        return $loader;
    }
}
