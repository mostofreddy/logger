Introducción
========

Logger simple y liviano para cualquier proyecto o framework PHP.

Requerimientos
--------------

* PHP 7+

Features
--------

* Simple configuración
* Distintos destinos de almacenamiento
* Implementación de PSR-3
* UID para identificar todos los logs de un request

Handlers
--------

* File: Salida a un archivo específico
* Screen: Salida por pantalla
* Dummy: Dummy

Formato de salida
-----------------

El formarto por defecto es el siguiente:

```
[<date>] <level> <channel> uid:<uid> - <message> - <context>
```

Ejemplo:

```
[2016-09-16T22:21:29+00:00] NOTICE @mychannel uid:247718aafa737ead54883d646a0ec6d1 - mensaje de alerta - {"file":"\/tmp\/asdasd","line":45}
```

__date__

Formato en estándar [ISO 8601](http://www.iso.org/iso/home/store/catalogue_tc/catalogue_detail.htm?csnumber=40874)

__level__

Nombre del nivel del log:

* debug
* info
* notice
* warning
* error
* critical
* alert
* emergency

__channel__

Nombre del canal de mensajeria

__uid__

Identificador único del request. Todos los logs de un request tienen el mismo uid para poder identificarlos facilmente

__message__

Mensaje

__context__

Contexto en formato json
