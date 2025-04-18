<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit383074d32fde6273c0db0c10ed5a3d40
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Habibnote\\QuickPermalinkFlusher\\App\\' => 36,
            'Habibnote\\QuickPermalinkFlusher\\' => 32,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Habibnote\\QuickPermalinkFlusher\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Habibnote\\QuickPermalinkFlusher\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit383074d32fde6273c0db0c10ed5a3d40::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit383074d32fde6273c0db0c10ed5a3d40::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit383074d32fde6273c0db0c10ed5a3d40::$classMap;

        }, null, ClassLoader::class);
    }
}
