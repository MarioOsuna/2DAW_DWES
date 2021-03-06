<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3aeab3bdfec2fca6068f847afae255ed
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3aeab3bdfec2fca6068f847afae255ed::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3aeab3bdfec2fca6068f847afae255ed::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3aeab3bdfec2fca6068f847afae255ed::$classMap;

        }, null, ClassLoader::class);
    }
}
