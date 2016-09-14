Test unitarios
=============

Para correr los test unitarios utilizamos la herramienta [phpunit](http://www.phpunit.de).

## Instalación

El paquete PHPUnit ya forma parte de las dependencias (de desarrollo) del proyecto por lo cual el binario se puede encontrar en `./vendor/bin/phpunit`.

## Configuración

Se debe hacer una copia del archivo `phpunit.xml.dist` a `phpunit.xml`. Este último archivo esta ignorado en el archivo `.gitignore` y no debe ser subido al repositorio.

## Ejecución

```
$ ./vendor/bin/phpunit
```

## Generar code coverage en formato html

En el archivo `phpunit.xml` agregar la siguiente lÃínea. Tener en cuenta que el directorio `./tests/coverage` esta ignorado en el archivo `.gitignore` y esta carpeta no debe ser subida al repositorio.

```
...
<logging>
    ....
    <log type="coverage-html" target="./tests/coverage" lowUpperBound="35" highLowerBound="70"/>
</logging>
...
```

Para visualizarlo en el browser simplemente entrar en el directorio coverage y hacer doble click en el archivo `index.html`
