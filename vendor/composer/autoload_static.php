<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf0ceb554ff4281937e1cbfaf136d0cd8
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf0ceb554ff4281937e1cbfaf136d0cd8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf0ceb554ff4281937e1cbfaf136d0cd8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf0ceb554ff4281937e1cbfaf136d0cd8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitf0ceb554ff4281937e1cbfaf136d0cd8::$classMap;

        }, null, ClassLoader::class);
    }
}