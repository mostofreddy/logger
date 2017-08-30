![Resty - Loggy](https://mostofreddy.github.io/loggy/images/resty_loggy_logo.png)

[![Build Status](https://travis-ci.org/mostofreddy/loggy.svg?branch=master)](https://travis-ci.org/mostofreddy/loggy)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mostofreddy/loggy/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mostofreddy/loggy/?branch=master)
[![Coverage Status](https://coveralls.io/repos/github/mostofreddy/loggy/badge.svg?branch=master)](https://coveralls.io/github/mostofreddy/loggy?branch=master)
[![Latest Stable Version](https://poser.pugx.org/mostofreddy/loggy/v/stable.svg)](https://packagist.org/packages/mostofreddy/loggy)
[![License](https://poser.pugx.org/mostofreddy/loggy/license.svg)](https://packagist.org/packages/mostofreddy/loggy)
[![Total Downloads](https://poser.pugx.org/mostofreddy/loggy/downloads.svg)](https://packagist.org/packages/mostofreddy/loggy)
[![composer.lock](https://poser.pugx.org/mostofreddy/loggy/composerlock)](https://packagist.org/packages/mostofreddy/loggy)

Logger simple y liviano, PSR-3 compatible y agnostico a cualquier Framework

Versión
-------

__2.0.0__

Requerimientos
--------------

* PHP 7.1+

Instalación
-----------

```
{
    "require": {
        "restyphp/loggy": "2.0.*"
    }
}
```

Documentación
-------------

Ver [Wiki](https://github.com/mostofreddy/loggy/wiki)

Changelog
--------

Ver [CHANGELOG.md](CHANGELOG.md)

License
-------

The MIT License (MIT). Ver el archivo [LICENSE](LICENSE.md) para más información

Test unitario
------------

Los test unitarios utilizan la versión 6.1 de [PHPUnit](https://phpunit.de/)

```
php vendor/bin/phpunit
```

PHPCS
-----

Como estándar de código se emplea [PEAR](https://pear.php.net/manual/en/standards.php) y la versión utilizada de [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer) es la 3.0

```
cp ruleset.xml.dist ruleset.xml
php vendor/bin/phpcs --standard=ruleset.xml
```
