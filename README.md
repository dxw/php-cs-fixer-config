# php-cs-fixer-config

dxw's standard config for [php-cs-fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

## Usage

Run this:

```
composer require --dev dxw/php-cs-fixer-config
```

Create `.php-cs-fixer.php` with these contents:

```
<?php

$finder = \PhpCsFixer\Finder::create()
->exclude('vendor')
->in(__DIR__);

return \Dxw\PhpCsFixerConfig\Config::create()
->setFinder($finder);
```
