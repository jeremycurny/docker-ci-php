# Docker CI PHP image

[![](https://images.microbadger.com/badges/image/jeremycurny/ci-php.svg)](http://microbadger.com/images/jeremycurny/ci-php)

[![Docker build](http://dockeri.co/image/jeremycurny/ci-php)](https://hub.docker.com/r/jeremycurny/ci-php/)

## Use cases

### PHPCS

```
phpcs --version
phpcs --standard=PSR2 src/
phpcs --standard=.phpcs.xml src/
```

### PHPMD

```
phpmd --version
phpmd src/ text cleancode,codesize,controversial,design,naming,unusedcode
phpmd src/ text .phpmd.xml
```

### PHPCPD

```
phpcpd --version
phpcpd src/
```

### PDEPEND

```
pdepend --version
pdepend --jdepend-xml=/tmp/pdepend.xml .
```
