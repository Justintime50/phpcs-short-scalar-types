# PHPCS Short Scalar Types Sniff

[![Version](https://img.shields.io/github/v/tag/justintime50/phpcs-short-scalar-types)](https://github.com/justintime50/phpcs-short-scalar-types/releases)
[![Licence](https://img.shields.io/github/license/justintime50/vcr-accessories-php)](LICENSE)

A PHPCS sniff to enforce the use of short scalar type names (`bool`, `int`, etc) in comments, instead of long names (`boolean`, `integer`, etc).

## Install

```sh
# Install Sniff
composer require --dev justintime50/phpcs-short-scalar-types

# Allow PHPCS to find Sniff (or use https://github.com/PHPCSStandards/composer-installer)
vendor/bin/phpcs --config-set installed_paths vendor/justintime50/phpcs-short-scalar-types/ShortTypes
```

## Usage

Add to your `phpcs.xml`:

```xml
<rule ref="ShortTypes.Commenting.ShortScalarTypes" />
```

Run PHPCS as usual. Use `--fix` to auto-correct long forms in comments.

## Example

```php
// @var boolean $flag  // Error: Use "bool" instead of "boolean".
// @var bool $flag     // OK
```

## Development

To have PHPCS pick up the local copy of this sniff, you'll need to adjust the installed paths like so:

```sh
# Set config
vendor/bin/phpcs --config-set installed_paths "$(pwd)/ShortTypes"

# Confirm ShortTypes is now available
vendor/bin/phpcs -i
```

### Testing

```sh
# Run sniff test
composer test

# Run autofix test
composer fix
```
