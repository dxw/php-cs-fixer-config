<?php

namespace Dxw\PhpCsFixerConfig;

class Config
{
    public static function create() : \PhpCsFixer\ConfigInterface
    {
        return \PhpCsFixer\Config::create()
        ->setRules([
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
        ]);
    }
}
