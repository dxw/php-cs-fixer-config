<?php

namespace Dxw\PhpCsFixerConfig;

final class Config
{
	public static function create(): \PhpCsFixer\ConfigInterface
	{
		$config = new \PhpCsFixer\Config();
		return $config->setRules([
			'@PSR12' => true,
			'array_syntax' => ['syntax' => 'short']
		])
		->setIndent("\t");
	}
}
