<?php

namespace Dxw\PhpCsFixerConfig;

class Config
{
    public static function create() : \PhpCsFixer\ConfigInterface
    {
        return \PhpCsFixer\Config::create()
        ->setRiskyAllowed(true)
        ->setRules([
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
            'strict_comparison' => true,
        ]);
    }
}
