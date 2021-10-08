<?php

namespace Dxw\PhpCsFixerConfig;

class Config
{
    public static function create() : \PhpCsFixer\ConfigInterface
    {
        $config = new \PhpCsFixer\Config();
        return $config->setRules([
            '@PSR2' => true,
            'array_syntax' => ['syntax' => 'short'],
        ]);
    }
}
