<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb1a4a888ee06ff3b3fe06ad84cdcd74
{
    public static $files = array (
        'b14f525c3e432d2761f3550c36e901a5' => __DIR__ . '/../..' . '/config.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb1a4a888ee06ff3b3fe06ad84cdcd74::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb1a4a888ee06ff3b3fe06ad84cdcd74::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
