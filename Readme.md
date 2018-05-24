# Docker Apache PHP image

[![](https://images.microbadger.com/badges/image/jeremycurny/ci-php.svg)](http://microbadger.com/images/jeremycurny/ci-php)

[![Docker build](http://dockeri.co/image/jeremycurny/ci-php)](https://hub.docker.com/r/jeremycurny/ci-php/)

## Use cases

### PHPCS

```
~/.composer/vendor/bin/phpcs --version
~/.composer/vendor/bin/phpcs --standard=PSR2 src/
~/.composer/vendor/bin/phpcs --standard=.phpcs.xml src/
```

### PHPMD

```
~/.composer/vendor/bin/phpmd --version
~/.composer/vendor/bin/phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode
~/.composer/vendor/bin/phpmd src/ text .phpmd.xml
```

### PHPCPD

```
~/.composer/vendor/bin/phpcpd --version
~/.composer/vendor/bin/phpcpd src/
```
