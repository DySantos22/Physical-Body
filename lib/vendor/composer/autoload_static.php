<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7ef05c92dba0a634e2ed71419834f363
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7ef05c92dba0a634e2ed71419834f363::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7ef05c92dba0a634e2ed71419834f363::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7ef05c92dba0a634e2ed71419834f363::$classMap;

        }, null, ClassLoader::class);
    }
}
