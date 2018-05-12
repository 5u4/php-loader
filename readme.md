# PHP Loader

## Descriptions

Some helper functions for building a structured php scripts.

## Functions

### load

Require files under a directory recursively.

```php
Loader::load(string $directory [, int $depth [, array $extensions]]): void
```

### getAllChildClasses

Get all child classes' names of a class

```php
Loader::getAllChildClasses(string|object $class): array
```
