Código estandar
==============

Para validar el código estandar utilizamos la herramienta [phpcs](https://github.com/squizlabs/PHP_CodeSniffer).

## Instalación

El paquete PHPCS ya forma parte de las dependencias (de desarrollo) del proyecto por lo cual el binario se puede encontrar en `./vendor/bin/phpcs`.

## Configuración

Se debe hacer una copia del archivo `phpcs.ruleset.xml.dist` a `phpcs.ruleset.xml`. Este úlltimo archivo esta ignorado en el archivo `.gitignore` y no debe ser subido 

## Ejecución

```
$ ./vendor/bin/phpcs --standard=phpcs.ruleset.xml src
```

## Estandar por defecto

Por defecto se utiliza el estandar [PEAR](http://pear.php.net/manual/en/standards.php) modificado a que acepte 140 caracteres por línea, pero se puede modificar el archivo `phpcs.rulelset.xml` para utilizar el estandar que se desee. 

Los estándares recomendados son los [siguientes](http://www.phptherightway.com/#code_style_guide)
