<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf81da848d1d26cd6467d6213fa3aa46c
{
    public static $files = array (
        'ceff5fb02f0000897e9ee5ad718b241c' => __DIR__ . '/../..' . '/app/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Plasticbrain\\FlashMessages\\' => 27,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Plasticbrain\\FlashMessages\\' => 
        array (
            0 => __DIR__ . '/..' . '/plasticbrain/php-flash-messages/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf81da848d1d26cd6467d6213fa3aa46c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf81da848d1d26cd6467d6213fa3aa46c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
