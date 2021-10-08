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

## Upgrading from v1.0.0 to v2.0.0

- Rename the `.php_cs` file in your project to `.php-cs-fixer.php`
- Add `.php-cs-fixer.cache` to your project's `.gitignore` file
- Run `vendor/bin/php-cs-fixer fix -v` to confirm that the only remaining deprecation warning is "PhpCsFixer\Config::create is deprecated since 2.17 and will be removed in 3.0, use the constructor instead". If there are other deprecation warnings, address them now.
- Update your project's `composer.json` file to use `dxw/php-cs-fixer-config` version `^2.0`, and run `composer update`
