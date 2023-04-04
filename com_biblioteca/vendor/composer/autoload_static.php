<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitccb605dc96041a4cd40da0cb11f99fee
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Orhanerday\\OpenAi\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Orhanerday\\OpenAi\\' => 
        array (
            0 => __DIR__ . '/..' . '/orhanerday/open-ai/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitccb605dc96041a4cd40da0cb11f99fee::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitccb605dc96041a4cd40da0cb11f99fee::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitccb605dc96041a4cd40da0cb11f99fee::$classMap;

        }, null, ClassLoader::class);
    }
}
