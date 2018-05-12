# PHP Loader

## Descriptions

Some helper functions for building a structured php scripts.

## Use

```bash
$ composer require senhung/php-loader
```

```php
<?php

require_once 'vendor/autoload.php';

use Senhung\Loader\Loader;

/* Load all files under current directory */
Loader::load('.', -1);
```

## Functions

### load

Require files under a directory recursively.

```php
Loader::load(string $directory [, int $depth [, array $priorityFiles [, array $extensions]]]): void
```

### getAllChildClasses

Get all child classes' names of a class

```php
Loader::getAllChildClasses(string|object $class): array
```
