<?php

$finder = \PhpCsFixer\Finder::create()
->exclude('vendor')
->exclude('tests/test-dir')
->in(__DIR__);

return \Dxw\PhpCsFixerConfig\Config::create()
->setFinder($finder);
