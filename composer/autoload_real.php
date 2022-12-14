<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit40b61f5ef4a345d63a1e7a9725594cbf
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInit40b61f5ef4a345d63a1e7a9725594cbf', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit40b61f5ef4a345d63a1e7a9725594cbf', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit40b61f5ef4a345d63a1e7a9725594cbf::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
